<?php
/* Adds a small amount of sample data to the UPCP database for demonstration purposes */
function Initial_UPCP_Data() {
		global $wpdb;
		global $items_table_name, $categories_table_name, $catalogues_table_name;
		
		$myrows = $wpdb->get_results("SELECT * FROM $items_table_name LIMIT 0,3");
		$num_rows = $wpdb->num_rows; 
		
		if ($num_rows == 0) {
			  $wpdb->insert($items_table_name,
				array(
						'Item_Name' => 'Sample Item',
						'Item_Description' => 'This is where your description of this product would go.',
						'Item_Price' => '9.99',
						'Category_ID' => '1',
						'Category_Name' => 'Sample Category',
						'Item_Date_Created' => date('d-m-Y h:i:s')
				));
		
				$wpdb->insert($categories_table_name,
				array(
						'Category_Name' => 'Sample Category',
						'Category_Description' => 'This is where your description of this category would go.',
						'Category_Item_Count' => '1',
						'Category_Date_Created' => date('d-m-Y h:i:s')
				));
		
				$wpdb->insert($catalogues_table_name,
				array(
						'Catalogue_Name' => 'Sample Catalogue',
						'Catalogue_Description' => 'This is where your description of this catalogue would go.',
						'Catalogue_Item_Count' => 0,
						'Catalogue_Layout_Format' => 'List',
						'Catalogue_Date_Created' => date('d-m-Y h:i:s')
				));
		}
}
?>