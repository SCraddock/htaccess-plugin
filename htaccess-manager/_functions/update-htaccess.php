<?php

  if(!isset($_POST['home_url'])){
    defined('ABSPATH') or die("No script kiddies please!") ;
  }
  else {


  $home_url = $_POST['home_url'];
  $newcontent = $_POST['newcontent'];
  $path = $_POST['path'];

  $goto_options = $home_url . '/wp-admin/options-general.php?page=htaccess-manager%2F_functions%2Fhtm.php';

    file_put_contents($path . '.htaccess',$newcontent);





  $goto_options = 'Location:' . $goto_options;

   header($goto_options);

}

?>
