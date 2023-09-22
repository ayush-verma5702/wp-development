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
   global $wpdb, $table_prefix;
   $wp_emp = $table_prefix.'emp';

   $q= "CREATE TABLE IF NOT EXISTS `$wp_emp` (`ID` INT NOT NULL , `name` VARCHAR(50) NOT NULL ,
    `email` VARCHAR(50) NOT NULL , `status` BOOLEAN NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";

   $wpdb->query($q);

   //$q= "INSERT INTO `$wp_emp` (`name`, `email`, `status`) VALUES ('Ayush', 'ayus@xyz.com', 1);";

   $data = array(
    'name' => 'Ayush',
    'email' => 'ayush@xyz.com',
    'status' => 1
   );

   $wpdb->insert($wp_emp, $data);

 }

 
 register_activation_hook(__FILE__, 'my_plugin_activation');

 function my_plugin_deactivation()
 {
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix.'emp';

    $q = "TRUNCATE `$wp_emp`";
    $wpdb->query($q);
 }

 register_deactivation_hook(__FILE__, 'my_plugin_deactivation');

 function my_sc_fun(){

    include 'sc_ex.php';
 }
 add_shortcode('my-sc','my_sc_fun');