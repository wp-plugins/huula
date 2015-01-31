<style type="text/css">

#huula {
  width: 100%;
}

#huula .row {
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 0;
  margin-bottom: 0;
}

#huula .row-inner{
  position: relative;
}

#huula .row .row {
  width: auto;
  margin-left: -0.9375rem;
  margin-right: -0.9375rem;
  margin-top: 0;
  margin-bottom: 0;
  max-width: none;
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

#huula .wrapper-iframe {
  width: 100%;
  height: 600px;
}

</style>

<div id="huula">

  <div class="wrap">
    <h2>
      <?php
        echo '<img src="' . plugins_url('huula/assets/icon.png') . '"></img>'
      ?>
    </h2>
    <br/>
    <form method="post" action="options.php">
      <?php settings_fields('huula'); ?>
      <div class="huula-instructions">
        If you already have a site ID from a previous installation and you wish to retain all your settings then enter the site ID ( you can <a href="http://www.huu.la/me" target="_blank">find it here.</a> ) below otherwise you may generate a new site ID to perform a new installation.
      </div>
      <table class="form-table">
        <?php do_settings_fields('huula', 'huula-settings') ?>
      </table>
      <?php submit_button(); ?>
    </form>

    <div>
      <div id="https-content">
        <div class="huula-instructions">
          You can access the following document directly
          <a href="http://www.huu.la/wordpress-manual" target="_blank">Here!</a>
        </div>
        <br/>
        <div>
          <?php
            echo '<img src="' . plugins_url('huula/assets/wordpress-manual.jpg') . '"></img>'
          ?>
        </div>
      </div>

      <div id="http-content">
        <br/>
        <div class="row">
          <div class="row-inner">
            <iframe src="http://www.huu.la/wordpress-manual?embed=true" class="wrapper-iframe"></iframe>
          </div>
        </div>
      </div>

      <script>
        if(location.protocol == "http:"){
          document.getElementById('https-content').style.display = 'none';
        }else{
          document.getElementById('http-content').style.display = 'none';
        }
      </script>
    </div>

  </div>

</div>