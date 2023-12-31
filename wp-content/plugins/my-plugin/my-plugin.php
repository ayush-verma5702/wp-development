<?php

/**
 * Plugin Name: My Plugin 
 * Description: My own Plugin
 * Version: 1.0
 * Author: Ayush Verma
 */

if (!defined('ABSPATH')) {
    header("Location: /wordpress");
    die("");
}

function my_plugin_activation()
{
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix . 'emp';

    $q = "CREATE TABLE IF NOT EXISTS `$wp_emp` (`ID` INT NOT NULL , `name` VARCHAR(50) NOT NULL ,
    `email` VARCHAR(50) NOT NULL , `status` BOOLEAN NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";

    $wpdb->query($q);

    //$q= "INSERT INTO `$wp_emp` (`name`, `email`, `status`) VALUES ('Ayush', 'ayus@xyz.com', 1);";
    $emp_details = array(
        array(
            'ID' => 1,
            'name' => 'Ayush',
            'email' => 'ayush@xyz.com',
            'status' => 1,
        ),
        array(
            'ID' => 2,
            'name' => 'Shaurya',
            'email' => 'shaurya@xyz.com',
            'status' => 1,
        )
    );
    foreach ($emp_details as $emp) {
        $wpdb->insert($wp_emp, $emp);
    }
}


register_activation_hook(__FILE__, 'my_plugin_activation');

function my_plugin_deactivation()
{
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix . 'emp';

    $q = "TRUNCATE `$wp_emp`";
    $wpdb->query($q);
}

register_deactivation_hook(__FILE__, 'my_plugin_deactivation');

//  function my_sc_fun(){

//     include 'sc_ex.php';
//  }
//  add_shortcode('my-sc','my_sc_fun');

function new_sc()
{
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix . 'emp';

    $q = "SELECT * FROM `$wp_emp`;";
    $results = $wpdb->get_results($q);

    ob_start()
?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($results as $row) :
            ?>
                <tr>
                    <td><?php echo $row->ID; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->status; ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
    <?php
    $html = ob_get_clean();
    return $html;
}
add_shortcode('my-sc', 'new_sc');

function my_posts()
{
    $args = array(
        'post_type' => 'post'
    );
    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) :
    ?>
        <ul>
            <?php
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li>' . get_the_title() . ' -> ' . get_the_content() . '</li>';
            }
            ?>
            <li></li>
        </ul>
<?php
    endif;
    wp_reset_postdata();
    $html = ob_get_clean();
    return $html;
}

add_shortcode('my_posts', 'my_posts');

function my_plugin_page_func()
{
    include 'admin/main-page.php';
}

function my_plugin_subpage_func()
{
    echo 'Hi from sub menu';
}

function my_plugin_menu()
{
    add_menu_page(
        'My Plugin Page',
        'My Plugin Page',
        'manage_options',
        'my-plugin-page',
        'my_plugin_page_func',
        '',
        6
    );

    add_submenu_page(
        'my-plugin-page',
        'All Emp',
        'All Emp',
        'manage_options',
        'my-plugin-page',
        'my_plugin_page_func'
    );

    add_submenu_page(
        'my-plugin-page',
        'My Plugin Sub page',
        'My Plugin Sub page',
        'manage_options',
        'my-plugin-subpage',
        'my_plugin_subpage_func'
    );
}
add_action('admin_menu', 'my_plugin_menu');

function new_cpt()
{
    $labels = array(
        'name' => 'Cars',
        'singular_name' => 'Car'
    );
    $supports = array('title', 'editor', 'thumbnail', 'comments', 'excerpts');
    $options = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'cars'),
        'show_in_rest' => true,
        'supports' => $supports,
        'taxonomies' => array('car_types')
    );
    register_post_type('cars', $options);
}

add_action('init', 'new_cpt');

function register_car_types()
{
    $labels = array(
        'name' => 'Car Types',
        'singular_name' => 'Car Type'
    );
    $options = array(
        'labels' => $labels,
        'hierarchichal' => true,
        'rewrite' => array('slug' => 'car-type'),
        'show_in_rest' => true
    );
    register_taxonomy('car-type', array('cars'), $options);
}

add_action('init', 'register_car_types');
