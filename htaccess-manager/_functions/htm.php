<?php defined('ABSPATH') or die("No script kiddies please!");



add_action('admin_menu', 'add_settings_menu');
function add_settings_menu(){
     add_options_page('My Plugin Settings Page', 'htaccess Pro','manage_options', __FILE__, 'htm_settings_page');
}


function htm_settings_page()
{
  $path = get_home_path();
  $home_url =  home_url();
  $ht_url = $path . '/.htaccess';
  $site_url = site_url();
  $full_path = $site_url . '/wp-content/plugins/htaccess-manager/_functions/update-htaccess.php';
    ?>
	    <div class="wrap">
	    <h1>htaccess Pro</h1>
	    <form method="post" action=<?php echo $full_path; ?> >

					<div class="wrap">
			<h4>Use this to directly edit you .htaccess file (Apache config file). Please only use this if you know what you are doing as if anything is wrong it will cause your site to crash and burn.</h4>

			<br class="clear">


				<form name="template" id="template" action="update-htaccess.php" method="post">
				<input type="hidden" id="_wpnonce" name="_wpnonce" value="bde1a3fb18"><input type="hidden" name="_wp_http_referer" value="/wp-content/plugins/htaccess-pro/_functions/update-htaccess.php">
        <input type="hidden" id="home_url" name="home_url" value="<?php echo $home_url;?>">
				<input type="hidden" id="path" name="path" value="<?php echo $path;?>">
        <input type="checkbox" name="theme_layout" value="0" <?php checked(0, get_option('theme_layout'), true); ?> />
        <div>
					<textarea cols="70" rows="30" name="newcontent" style="width:100%" id="newcontent" aria-describedby="newcontent"><?php


            $htaccess_content = file_get_contents("$ht_url");
            echo $htaccess_content;

			       ?></textarea>
	             </div>

					<div>
					<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Update File"></p></div>
				</form>
			<br class="clear">
			</div>
			<script type="text/javascript">
			jQuery(document).ready(function($){
				$('#template').submit(function(){ $('#scrollto').val( $('#newcontent').scrollTop() ); });
				$('#newcontent').scrollTop( $('#scrollto').val() );
			});
			</script>

			<div class="clear"></div></div>
	    </form>
		</div>
	<?php
}
?>
