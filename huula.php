<?php
/*
Plugin Name: Huula
Plugin URI: http://huu.la
Description: Let there be guides!
Version: 1.0
Author: Hu2la
Author URI: http://www.huu.la
*/

if (!class_exists('WP_Plugin_HuuLa'))
{

class WP_Plugin_HuuLa {
  public function __construct()
  {
    add_action('wp_head', array(&$this, 'append_script_code'));
    add_action('admin_menu', array(&$this, 'admin_menu'));
    add_action('admin_init', array(&$this, 'admin_init'));
  }

  public static function activate()
  {
  }

  public static function deactivate()
  {
  }

  public function admin_init()
  {
    register_setting('huula', 'huula_site_id', array($this, 'sanitize_site_id'));

    $this->check_generate_site_id();

    add_settings_section(
      'huula-settings',
      'Settings',
      null,
      'huula'
    );

    add_settings_field(
      'huula-site_id',
      'Site ID',
      array(&$this, 'settings_field_site_id'),
      'huula',
      'huula-settings',
      array('field' => 'huula_site_id', 'label_for' => 'huula_site_id')
    );
  }

  public function sanitize_site_id($value)
  {
    $value = preg_replace('/[^0-9a-f]/', '', strtolower($value));

    return $value;
  }

  public function settings_field_site_id($args)
  {
    $field = $args['field'];
    $value = get_option($field);

    if (!$value) {

    }

    echo <<<EOF
<script type="text/javascript">
function huula_generate_site_id() {
  function _huula_r() {
    return (Math.random().toString(16)+"000000000").substr(2,8);
  }

  var new_huula_site_id = _huula_r() + _huula_r() + _huula_r() + _huula_r();

  document.getElementById('huula_site_id').value = new_huula_site_id;
}
</script>
EOF;
    echo sprintf('<input type="text" name="%s" id="%s" value="%s" style="width: 540px" /> <button onclick="huula_generate_site_id(); return false;" class="button">Get new site ID</button>', $field, $field, esc_attr($value));
  }

  public function admin_menu()
  {
    add_options_page('HuuLa', 'HuuLa', 'manage_options', 'huula', array(&$this, 'plugin_settings_page'));
    add_menu_page('HuuLa', 'HuuLa', 'manage_options', 'options-general.php?page=huula', '', plugins_url('huula/images/icon.png'));
  }

  public function plugin_settings_page()
  {
    if (!current_user_can('manage_options'))
    {
      wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    include(sprintf('%s/templates/settings.php', dirname(__FILE__)));
  }

  public function check_generate_site_id()
  {
    $site_id = get_option('huula_site_id');

    if (!$site_id) {
      $site_id = '';
      for ($i = 0; $i < 8; $i++) {
        $site_id .= substr(md5(uniqid()), 0, 8);
      }

      update_option('huula_site_id', $site_id);
    }
  }

  public function append_script_code()
  {
    $this->check_generate_site_id();

    $site_id = get_option('huula_site_id');

    if ($site_id) {
      echo('<script src="http://www.mirikle.com/api/v1/' . esc_attr($site_id) . '.js" async></script>');
    }
  }
}

} // end class_exists

register_activation_hook(__FILE__, array('WP_Plugin_HuuLa', 'activate'));
register_deactivation_hook(__FILE__, array('WP_Plugin_HuuLa', 'deactivate'));

$wp_plugin_huula = new WP_Plugin_HuuLa();

function huula_plugin_settings_link($links)
{
  $settings_link = '<a href="options-general.php?page=huula">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter('plugin_action_links_'.$plugin, 'huula_plugin_settings_link');
