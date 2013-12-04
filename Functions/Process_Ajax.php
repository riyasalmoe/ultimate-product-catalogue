<?php
/* Processes the ajax requests being put out in the admin area and the front-end
*  of the UPCP plugin */

// Updates the order of items in the catalogue after a user has dragged and dropped them
function Catalogue_Save_Order() {
		global $catalogue_items_table_name;
		$Path = ABSPATH . 'wp-load.php';
		include_once($Path);
		global $wpdb;
		
		foreach ($_POST['list-item'] as $Key=>$ID) {
				$Result = $wpdb->query("UPDATE $catalogue_items_table_name SET Position='" . $Key . "' WHERE Catalogue_Item_ID=" . $ID);
		}
		
}
add_action('wp_ajax_catalogue_update_order', 'Catalogue_Save_Order');

// Records the number of times a product has been viewed
function Record_Item_View() {
		global $items_table_name;
		$Path = ABSPATH . 'wp-load.php';
		include_once($Path);
		global $wpdb;
		
		$Item_ID = $_POST['Item_ID'];
		$Item = $wpdb->get_row("SELECT Item_Views FROM $items_table_name WHERE Item_ID=" . $Item_ID);
		if ($Item->Item_Views == "") {$wpdb->query("UPDATE $items_table_name SET Item_Views=1 WHERE Item_ID=" . $Item_ID);}
		else {$wpdb->query("UPDATE $items_table_name SET Item_Views=Item_Views+1 WHERE Item_ID=" . $Item_ID);}
}
add_action('wp_ajax_record_view', 'Record_Item_View');

// Updates sub-categories drop-down box on the products pages, based on the product's category
function Get_UPCP_SubCategories() {
		global $subcategories_table_name;
		$Path = ABSPATH . 'wp-load.php';
		include_once($Path);
		global $wpdb;
		
		$SubCategories = $wpdb->get_results("SELECT SubCategory_ID, SubCategory_Name FROM $subcategories_table_name WHERE Category_ID=" . $_POST['CatID']);
		foreach ($SubCategories as $SubCategory) {$Response_Array[] = $SubCategory->SubCategory_ID; $Response_Array[] = $SubCategory->SubCategory_Name;}
		if (is_array($Response_Array)) {$Response = implode(",", $Response_Array);}
		else {$Response = "";}
		echo $Response;
}
add_action('wp_ajax_get_upcp_subcategories', 'Get_UPCP_SubCategories');

?>