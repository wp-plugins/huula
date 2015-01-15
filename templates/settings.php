<style type="text/css">

#huula {
  width: 100%;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}

#huula .row {
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 0;
  margin-bottom: 0;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}

#huula .row .row {
  width: auto;
  margin-left: -0.9375rem;
  margin-right: -0.9375rem;
  margin-top: 0;
  margin-bottom: 0;
  max-width: none;
}

#huula .columns {
  position: relative;
  padding-left: 0.9375rem;
  padding-right: 0.9375rem;
  float: left;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}

#huula .large-4 {
  width: 33.33333%;
}

#huula .large-8 {
  width: 66.66667%;
}

#huula .large-12 {
  width: 100%;
}

#huula .th {
  line-height: 0;
  display: inline-block;
  border: solid 4px #fff;
  max-width: 100%;
  -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.2);
  box-shadow: 0 0 0 1px rgba(0,0,0,0.2);
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
}

#huula img {
  display: inline-block;
  vertical-align: middle;
  max-width: 100%;
  height: auto;
}

#huula h4 {
  font-size: 1.4375rem;
  line-height: 1.4;
  margin: .5em 0;
}

#huula .huula-instructions {
  background: #ffffd5;
  border: 1px solid #ffffa2;
  padding: .5em;
}

</style>

<div id="huula">

  <div class="wrap">
    <h2>Hu2la WordPress Plugin</h2>
    <form method="post" action="options.php">
      <?php settings_fields('huula'); ?>
      <div class="huula-instructions">
        If you already have a site ID from a previous installation and you wish to retain all your settings then enter the site ID (you can <a href="http://www.mirikle.com/me" target="_blank">find it here.</a>) above otherwise you may use a new site ID to perform a new installation.
      </div>
      <table class="form-table">
        <?php do_settings_fields('huula', 'huula-settings') ?>
      </table>
      <?php submit_button(); ?>
    </form>
  </div>

  <!-- Second Band (Image Right with Text) -->

  <div class="row">
    <div class="large-8 columns">
      <h4>Step 1. Welcome and let's get started right away!</h4>
      <div class="row">
        <div class="large-12 columns">
          <p>Go to your site now and click on the Hu2la badge in the the top right of your site.</p>
          <p>Sign up to register your account.</p>
  		    <p>If you have any issues during installation, please <a target="_blank" href="http://www.mirikle.com/help">check out our FAQ</a>.</p>
        </div>
      </div>
    </div>
    <div class="large-4 columns">
      <a class="th">
        <img src="<?php echo plugins_url('images/huula-site-badge.png', dirname(__FILE__)) ?>">
      </a>
    </div>
    <div class="large-12 columns">
      <hr />
    </div>
  </div>

</div>