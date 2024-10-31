<?php 
/* Plugin Name: om admin look
 * Plugin URI: http://sanditsolution.com.
 * Description: Add bootstrap to admin panel, useful if you need to use it in other admin files, with copyright message at footer for admin panel, good if  you sharing something copyrighted with your users which have admin access.
 * Version: 1.0.02
 * Author:Siddharth Singh
 * Author URI:http://sanditsolution.com/about.html
 * License: A "Slug" license name e.g. GPL2
 */ 


function om_admin_look_theme_styles() {
	global $wp_scripts;
	wp_enqueue_style( 'om-admin-bootstrap-css', plugins_url('assist/css/bootstrap.css', __FILE__), array(), '1.0.0', 'all' );	
	wp_enqueue_script( 'om-admin-bootstrap-js',plugins_url('assist/js/bootstrap.js', __FILE__), array('jquery'), '1.0.0', true );	
}
add_action('admin_enqueue_scripts', 'om_admin_look_theme_styles');


function oal_my_login_logo_url_title() {
	$site_description = get_bloginfo( 'description' );
    return $site_description;
}
add_filter( 'login_headertitle', 'oal_my_login_logo_url_title' );
include("function/copyright.php"); 

//Add action link start
add_filter( 'plugin_action_links', 'om_admin_look_add_action_plugin', 10, 5 ); 
function om_admin_look_add_action_plugin( $actions, $plugin_file ){static $plugin; if(!isset($plugin))$plugin = plugin_basename(__FILE__); 
if ($plugin == $plugin_file) { $more_product = array('more product' => '<a href="http://www.sanditsolution.com/shops/">' . __('More Product', 'General') . '</a>');$site_link = array('support' => '<a href="http://www.sanditsolution.com/contact.html" target="_blank">Support</a>');
$became_client = array('became client' => '<a href="http://doc.sanditsolution.com/register/" target="_blank">Became Client</a>');
$actions = array_merge($more_product, $actions);$actions = array_merge($site_link, $actions);$actions = array_merge($became_client, $actions);
}return $actions;}?>