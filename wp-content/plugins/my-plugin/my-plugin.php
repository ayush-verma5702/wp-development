<?php
/**
 * Plugin Name: My Plugin 
 * Description: My own Plugin
 * Version: 1.0
 * Author: Ayush Verma
 */

 if(!defined('ABSPATH')){
    header("Location: /wordpress");
    die("");
 }

 function my_plugin_activation()
 {
   //
 }

 
 register_activation_hook(__FILE__, 'my_plugin_activation');

 function my_plugin_deactivation()
 {
    // 
 }

 register_deactivation_hook(__FILE__, 'my_plugin_deactivation');

 function my_sc_fun(){
    return 'ShortCode Example';
 }
 add_shortcode('my-sc','my_sc_fun');