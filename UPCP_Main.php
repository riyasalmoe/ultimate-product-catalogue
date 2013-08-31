<?php
/*
Plugin Name: Ultimate Product Catalogue Plugin
Plugin URI: http://www.EtoileWebDesign.com/ultimate-product-catalogue/
Description: Plugin to create a customizable product catalogue for businesses, restaurants, real estate agents, etc.
Author: Tim Ruse
Author URI: http://www.EtoileWebDesign.com/
Text Domain: UPCP
Version: 1.1
*/

global $UPCP_db_version;
global $categories_table_name, $subcategories_table_name, $items_table_name, $item_images_table_name, $catalogues_table_name, $catalogue_items_table_name, $tagged_items_table_name, $tags_table_name;
global $wpdb;
global $message;
global $Full_Version;
$categories_table_name = $wpdb->prefix . "UPCP_Categories";
$subcategories_table_name = $wpdb->prefix . "UPCP_SubCategories";
$items_table_name = $wpdb->prefix . "UPCP_Items";
$item_images_table_name = $wpdb->prefix . "UPCP_Item_Images";
$catalogues_table_name = $wpdb->prefix . "UPCP_Catalogues";
$catalogue_items_table_name = $wpdb->prefix . "UPCP_Catalogue_Items";
$tags_table_name = $wpdb->prefix . "UPCP_Tags";
$tagged_items_table_name = $wpdb->prefix . "UPCP_Tagged_Items";
$UPCP_db_version = "1.0";

/* When plugin is activated */
register_activation_hook(__FILE__,'Install_UPCP_DB');
register_activation_hook(__FILE__,'Initial_UPCP_Data');

/* When plugin is deactivation*/
register_deactivation_hook( __FILE__, 'Remove_UPCP' );

/* Creates the admin menu for the contests plugin */
if ( is_admin() ){
	  add_action('admin_menu', 'UPCP_Plugin_Menu');
		add_action('admin_head', 'UPCP_Admin_Options');
		add_action('admin_init', 'Add_UPCP_Scripts');
		add_action('widgets_init', 'Update_UPCP_Content');
		add_action('admin_notices', 'UPCP_Error_Notices');
}

function Remove_UPCP() {
  	/* Deletes the database field */
		delete_option('UPCP_db_version');
}

/* Admin Page setup */
function UPCP_Plugin_Menu() {
		add_menu_page('Ultimate Product Catalogue Plugin', 'Product Catalogue', 'administrator', 'UPCP-options', 'UPCP_Output_Options',null , '50.5');
}

/* Add localization support */
function UPCP_localization_setup() {
		load_plugin_textdomain('UPCP', false, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('after_setup_theme', 'UPCP_localization_setup');

// Add settings link on plugin page
function UPCP_plugin_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=UPCP-options">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'UPCP_plugin_settings_link' );

function Add_UPCP_Scripts() {
		$url_one = plugins_url("ultimate-product-catalogue/js/Admin.js");
		$url_two = plugins_url("ultimate-product-catalogue/js/sorttable.js");
		$url_three = plugins_url("ultimate-product-catalogue/js/get_sub_cats.js");
		wp_enqueue_script('PageSwitch', $url_one, array('jquery'));
		wp_enqueue_script('sorttable', $url_two, array('jquery'));
		wp_enqueue_script('UpdateSubCats', $url_three, array('jquery'));
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('update-catalogue-order', plugin_dir_url(__FILE__) . '/js/update-catalogue-order.js');
}

add_action( 'wp_enqueue_scripts', 'UPCP_Add_Stylesheet' );
function UPCP_Add_Stylesheet() {
    wp_register_style( 'catalogue-style', plugins_url('css/catalogue-style.css', __FILE__) );
    wp_enqueue_style( 'catalogue-style' );
}

add_action( 'wp_enqueue_scripts', 'Add_UPCP_FrontEnd_Scripts' );
function Add_UPCP_FrontEnd_Scripts() {
	wp_enqueue_script(
		'upcpjquery',
		plugins_url( '/js/upcp-jquery-functions.js' , __FILE__ ),
		array( 'jquery' )
	);
}

function UPCP_Admin_Options() {
		$url = plugins_url("ultimate-product-catalogue/css/Admin.css");
		echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
}

add_action('activated_plugin','save_error');
function save_error(){
    update_option('plugin_error',  ob_get_contents());
}

$Full_Version = get_option("UPCP_Full_Version");

//if (isset($_POST['Upgrade_To_Full'])) {
if ($Full_Version != "Yes") {
	  add_action('admin_init', 'Upgrade_To_Full');
		$Full_Version = "Yes"; //Take this out
}

include "Functions/Initial_Data.php";
include "Functions/UPCP_Output_Options.php";
include "Functions/Update_Admin_Databases.php";
include "Functions/Install_UPCP.php";
include "Functions/Error_Notices.php";
include "Functions/Update_UPCP_Content.php";
include "Functions/Prepare_Data_For_Insertion.php";
include "Functions/Process_Ajax.php";
include "Functions/Shortcodes.php";
include "Functions/Full_Upgrade.php";
?>