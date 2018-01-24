<?php

/**
* @package Sassify
*/

/*
Plugin Name: Sassify
Plugin URI:
Description: Use the power of SCSS to customize your WP site!
Author: MOZAY
Author URI: https://mozay.com
Version: 0.1
*/
//Load admin panel

function sassify_settings() {
  register_setting( 'sassify', 'sassify_scss' );
  register_setting( 'sassify', 'sassify_less' );
}
sassify_settings();
include("sassify-admin.php");
include("scss.inc.php");
include("less.inc.php");
use Leafo\ScssPhp\Compiler;

  add_action("wp_head", "addScss");

function addScss(){
  $scss = new Compiler();
  $less = new lessc;
  $lessresult = $less->compile(get_option("sassify_less"));
  $result = $scss->compile(get_option('sassify_scss'));
  ?><!-- SASSIFY -->
  <!-- SCSS -->
  <style>
  <?php echo $result ?>
</style>
  <!-- LESS -->
  <style>
  <?php echo $lessresult ?>
  </style>
  <!-- END SASSIFY -->
  <?php
}
/*<?php echo $scss->compile(get_option("sassify_scss")); ?>*/
 ?>
