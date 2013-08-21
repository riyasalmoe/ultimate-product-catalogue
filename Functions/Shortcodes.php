<?php 
/* The function that creates the HTML on the front-end, based on the parameters
* supplied in the product-catalog shortcode */
function Insert_Product_Catalog($atts) {
		// Include the required global variables, and create a few new ones
		global $wpdb, $categories_table_name, $subcategories_table_name, $tags_table_name, $tagged_items_table_name, $catalogues_table_name, $catalogue_items_table_name, $items_table_name;
		global $ReturnString, $ProdCats, $ProdSubCats, $ProdTags, $Catalogue_ID, $Catalogue_Layout_Format, $Catalogue_Sidebar;
		
		$ReturnString = "";
		$Format_Count = 3;
		
		// Get the attributes passed by the shortcode, and store them in new variables for processing
		extract( shortcode_atts( array(
														 		"id" => "1",
																"layout_format" => "None",
																"sidebar" => "Yes"),
																$atts
														)
												);
												
		$Catalogue_ID = $id;
		$Catalogue_Layout_Format = $layout_format;
		$Catalogue_Sidebar = $sidebar;
		
		// Select the catalogue information from the database 
		$Catalogue = $wpdb->get_row("SELECT * FROM $catalogues_table_name WHERE Catalogue_ID=" . $id);
		$CatalogueItems = $wpdb->get_results("SELECT * FROM $catalogue_items_table_name WHERE Catalogue_ID=" . $id . " ORDER BY Position");
		
		// Make sure that the layout is set
		if ($layout_format != "Thumbnail" and $layout_format != "List") {
			  if ($Catalogue->Catalogue_Layout_Format != "") {$format = $Catalogue->Catalogue_Layout_Format;}
				else {$format = "Thumbnail";}
		}
		else {$format = $layout_format;}
		
		// Add any additional CSS in-line
		if ($Catalogue->Catalogue_Custom_CSS != "") {
				echo "<style type='text/css'>";
				echo $Catalogue->Catalogue_Custom_CSS;
				echo "</style>";
		}
		
		// Arrays to store what categories, sub-categories and tags are applied to the product in the catalogue
		$ProdCats = array();
		$ProdSubCats = array();
		$ProdTags = array();
		
		// Create the HTML for the thumbnail layout
		//if ($format == "Thumbnail") {
			  $ProdThumbString .=  "<div id='prod-cat-" . $id . "' class='prod-cat thumb-display'>\n";
				
				foreach ($CatalogueItems as $CatalogueItem) {
						// If the item is a product, then simply call the AddProduct function to add it to the code
						if ($CatalogueItem->Item_ID != "") {
								$ProdThumbString .= AddProduct("Thumbnail", $CatalogueItem->Item_ID);
						}
						
						// If the item is a category, then add the appropriate extra HTML and call the AddProduct function
						// for each individual product in the category
						if ($CatalogueItem->Category_ID != "") {
							  $ProdThumbString .= "<div class='upcp-clear'></div>";
								$Category = $wpdb->get_row("SELECT Category_Name FROM $categories_table_name WHERE Category_ID=" . $CatalogueItem->Category_ID);
								$ProdThumbString .= "<div id='prod-cat-category-" . $CatalogueItem->Category_ID . "' class='prod-cat-category upcp-thumb-category'>\n";
										$ProdThumbString .= "<div id='prod-cat-category-label-" . $CatalogueItem->Category_ID . "' class='prod-cat-category-label upcp-thumb-category-label'>" . $Category->Category_Name ."</div>\n";
										$Products = $wpdb->get_results("SELECT Item_ID, Item_Name FROM $items_table_name WHERE Category_ID=" . $CatalogueItem->Category_ID);
										foreach ($Products as $Product) {$ProdThumbString .= AddProduct("Thumbnail", $Product->Item_ID);}
								$ProdThumbString .= "<div class='upcp-clear'></div>";
								$ProdThumbString .= "</div>";
								$Counter = 0;
						}
						
						// If the item is a sub-category, then add the appropriate extra HTML and call the AddProduct function
						// for each individual product in the sub-category
						if ($CatalogueItem->SubCategory_ID != "") {
							  $Products = $wpdb->get_results("SELECT Item_ID FROM $items_table_name WHERE SubCategory_ID=" . $CatalogueItem->SubCategory_ID);
								foreach ($Products as $Product) {$ProdThumbString .= AddProduct("Thumbnail", $Product->Item_ID);}
						}
				}
				$ProdThumbString .= "<div class='clear'></div>\n";
				$ProdThumbString .= "</div>\n";
		//}
		// Create the HTML for the list layout
		//elseif ($format == "List") {
			  $ProdListString .=  "<div id='prod-cat-" . $id . "' class='prod-cat list-display hidden-field'>\n";

				foreach ($CatalogueItems as $CatalogueItem) {
						// If the item is a product, then simply call the AddProduct function to add it to the code
						if ($CatalogueItem->Item_ID != "") {
								$ProdListString .= AddProduct("List", $CatalogueItem->Item_ID);
						}
						
						// If the item is a category, then add the appropriate extra HTML and call the AddProduct function
						// for each individual product in the category
						if ($CatalogueItem->Category_ID != "") {
								$Category = $wpdb->get_row("SELECT Category_Name FROM $categories_table_name WHERE Category_ID=" . $CatalogueItem->Category_ID);
								$ProdListString .= "<div id='prod-cat-category-" . $CatalogueItem->Category_ID . "' class='prod-cat-category upcp-list-category'>\n";
										$ProdListString .= "<div id='prod-cat-category-label-" . $CatalogueItem->Category_ID . "' class='prod-cat-category-label upcp-list-category-label'>" . $Category->Category_Name ."</div>\n";
										$Products = $wpdb->get_results("SELECT Item_ID, Item_Name FROM $items_table_name WHERE Category_ID=" . $CatalogueItem->Category_ID);
										foreach ($Products as $Product) {$ProdListString .= AddProduct("List", $Product->Item_ID);}
								$ProdListString .= "<div class='upcp-clear'></div>";
								$ProdListString .= "</div>";
								$Counter = 0;
						}
						
						// If the item is a sub-category, then add the appropriate extra HTML and call the AddProduct function
						// for each individual product in the sub-category
						if ($CatalogueItem->SubCategory_ID != "") {
							  $Products = $wpdb->get_results("SELECT Item_ID FROM $items_table_name WHERE SubCategory_ID=" . $CatalogueItem->SubCategory_ID);
								foreach ($Products as $Product) {$ProdListString .= AddProduct("List", $Product->Item_ID);}
						}
				}
				$ProdListString .= "<div class='upcp-clear'></div>";
				$ProdListString .= "</div>\n";
				
			//Create the HTML for the 'Details' layout
			$ProdListString .=  "<div id='prod-cat-" . $id . "' class='prod-cat detail-display hidden-field'>\n";

				foreach ($CatalogueItems as $CatalogueItem) {
						// If the item is a product, then simply call the AddProduct function to add it to the code
						if ($CatalogueItem->Item_ID != "") {
								$ProdListString .= AddProduct("Detail", $CatalogueItem->Item_ID);
						}
						
						// If the item is a category, then add the appropriate extra HTML and call the AddProduct function
						// for each individual product in the category
						if ($CatalogueItem->Category_ID != "") {
								$Category = $wpdb->get_row("SELECT Category_Name FROM $categories_table_name WHERE Category_ID=" . $CatalogueItem->Category_ID);
								$ProdListString .= "<div id='prod-cat-category-" . $CatalogueItem->Category_ID . "' class='prod-cat-category upcp-detail-category'>\n";
										$ProdListString .= "<div id='prod-cat-category-label-" . $CatalogueItem->Category_ID . "' class='prod-cat-category-label upcp-detail-category-label'>" . $Category->Category_Name ."</div>\n";
										$Products = $wpdb->get_results("SELECT Item_ID, Item_Name FROM $items_table_name WHERE Category_ID=" . $CatalogueItem->Category_ID);
										foreach ($Products as $Product) {$ProdListString .= AddProduct("Detail", $Product->Item_ID);}
								$ProdListString .= "<div class='upcp-clear'></div>";
								$ProdListString .= "</div>";
								$Counter = 0;
						}
						
						// If the item is a sub-category, then add the appropriate extra HTML and call the AddProduct function
						// for each individual product in the sub-category
						if ($CatalogueItem->SubCategory_ID != "") {
							  $Products = $wpdb->get_results("SELECT Item_ID FROM $items_table_name WHERE SubCategory_ID=" . $CatalogueItem->SubCategory_ID);
								foreach ($Products as $Product) {$ProdListString .= AddProduct("Detail", $Product->Item_ID);}
						}
				}
				$ProdListString .= "<div class='upcp-clear'></div>";
				$ProdListString .= "</div>\n";
		//}
		
		// Create string from the arrays, should use the implode function instead
		foreach ($ProdCats as $key=>$value) {$ProdCatString .= $key . ",";}
		$ProdCatString = trim($ProdCatString, " ,");
		foreach ($ProdSubCats as $key=>$value) {$ProdSubCatString .= $key . ",";}
		$ProdSubCatString = trim($ProdSubCatString, " ,");
		foreach ($ProdTags as $key=>$value) {$ProdTagString .= $key . ",";}
		$ProdTagString = trim($ProdTagString, " ,");
		
		// If the sidebar is requested, add it
		if ($sidebar == "Yes" or $sidebar == "yes" or $sidebar == "YES") {
				// Get the categories, sub-categories and tags that apply to the products in the catalog
				$Categories = $wpdb->get_results("SELECT Category_ID, Category_Name FROM $categories_table_name WHERE Category_ID in (" . $ProdCatString . ")");
				$SubCategories = $wpdb->get_results("SELECT SubCategory_ID, SubCategory_Name FROM $subcategories_table_name WHERE SubCategory_ID in (" . $ProdSubCatString . ")");
				if ($ProdTagString != "") {$Tags = $wpdb->get_results("SELECT Tag_ID, Tag_Name FROM $tags_table_name WHERE Tag_ID in (" . $ProdTagString . ")");}
				else {$Tags = array();}
				
				$SidebarString .= "<div id='prod-cat-sidebar-" . $id . "' class='prod-cat-sidebar'>\n";
				$SidebarString .= "<form action='#' name='Product_Catalog_Sidebar_Form'>\n";
				
				// Create the text search box
				$SidebarString .= "<div id='prod-cat-text-search' class='prod-cat-text-search'>\n";
				$SidebarString .= "Product Name: <br /><input type='text' class='jquery-prod-name-text' name='Text_Search' onkeyup='UPCP_Filer_Results();'>\n";
				$SidebarString .= "</div>\n";
				
				// Create the categories checkboxes
				if (sizeof($Categories) > 0) {
					  $SidebarString .= "<div id='prod-cat-sidebar-category-div-" . $id . "' class='prod-cat-sidebar-category-div'>\n";
						$SidebarString .= "<div id='prod-cat-sidebar-category-title-" . $id . "' class='prod-cat-sidebar-category-title'><h3>Categories:</h3></div>\n";
						foreach ($Categories as $Category) {
								$SidebarString .= "<div id='prod-cat-sidebar-category-" . $Category->Category_ID . "' class='prod-cat-sidebar-category'>\n";
								$SidebarString .= "<input type='checkbox' class='jquery-prod-cat-value' name='Category" . $Category->Category_ID . "' value='" . $Category->Category_ID . "' onclick='UPCP_Filer_Results()'>" . $Category->Category_Name . " (" . $ProdCats[$Category->Category_ID] / $Format_Count . ")\n";
								$SidebarString .= "</div>\n";
						}
						$SidebarString .= "</div>\n";
				}
				
				// Create the sub-categories checkboxes
				if (sizeof($SubCategories) > 0) {
					  $SidebarString .= "<div id='prod-cat-sidebar-subcategory-div-" . $id . "' class='prod-cat-sidebar-subcategory-div'>\n";
						$SidebarString .= "<div id='prod-cat-sidebar-subcategory-title-" . $id . "' class='prod-cat-sidebar-subcategory-title'><h3>Sub-Categories:</h3></div>\n";
						foreach ($SubCategories as $SubCategory) {
								$SidebarString .= "<div id='prod-cat-sidebar-subcategory-" . $SubCategory->SubCategory_ID . "' class='prod-cat-sidebar-subcategory'>\n";
								$SidebarString .= "<input type='checkbox' class='jquery-prod-sub-cat-value' name='SubCategory[]' value='" . $SubCategory->SubCategory_ID . "'  onclick='UPCP_Filer_Results()'> " . $SubCategory->SubCategory_Name . " (" . $ProdSubCats[$SubCategory->SubCategory_ID] / $Format_Count . ")\n";
								$SidebarString .= "</div>\n";
						}
						$SidebarString .= "</div>\n";
				}
				
				// Create the tags checkboxes
				if (sizeof($Tags) > 0) {
					  $SidebarString .= "<div id='prod-cat-sidebar-tag-div-" . $id . "' class='prod-cat-sidebar-tag-div'>\n";
						$SidebarString .= "<div id='prod-cat-sidebar-tag-title-" . $id . "' class='prod-cat-tag-sidebar-title'><h3>Tags:</h3></div>\n";
						foreach ($Tags as $Tag) {
								$SidebarString .= "<div id='prod-cat-sidebar-tag-" . $Tag->Tag_ID . "' class='prod-cat-sidebar-tag'>\n";
								$SidebarString .= "<input type='checkbox' class='jquery-prod-tag-value' name='Tag[]' value='" . $Tag->Tag_ID . "'  onclick='UPCP_Filer_Results()'>" . $Tag->Tag_Name . "\n";
								$SidebarString .= "</div>";
						}
				$SidebarString .= "</div>\n";
				}
				
				$SidebarString .= "</form>\n</div>\n";
		}
		
		$HeaderBar .= "<div class='prod-cat-header-div'>";
		$HeaderBar .= "<div class='prod-cat-header-padding'></div>";
		$HeaderBar .= "<a href='#' onclick='ToggleView(\"Thumbnail\");return false;' title='Thumbnail'><div class='upcp-thumb-toggle-icon'></div></a>";
		$HeaderBar .= "<a href='#' onclick='ToggleView(\"List\"); return false;' title='List'><div class='upcp-list-toggle-icon'></div></a>";
		$HeaderBar .= "<a href='#' onclick='ToggleView(\"Detail\"); return false;' title='Detail'><div class='upcp-details-toggle-icon'></div></a>";
		$HeaderBar .= "<div class='clear'></div>";
		$HeaderBar .= "</div>";
		
		$ReturnString .= "<div class='prod-cat-container'>";
		$ReturnString .= $HeaderBar;
		$ReturnString .= "<div class='prod-cat-inner'>" . $ProdThumbString . "<div class='clear'></div>" . $ProdListString . "<div class='clear'></div></div>";
		$ReturnString .= $SidebarString;
		$ReturnString .= "<div class='clear'></div></div>";
		
		return $ReturnString;
}

/* Function to add the HTML for an individual product to the catalog */
function AddProduct($format, $Item_ID) {
		// Add the required global variables
		global $wpdb, $categories_table_name, $subcategories_table_name, $tags_table_name, $tagged_items_table_name, $catalogues_table_name, $catalogue_items_table_name, $items_table_name, $item_images_table_name;
		global $ProdCats, $ProdSubCats, $ProdTags, $ReturnString;
		
		//Select the product info, tags and images for the product
		$Product = $wpdb->get_row("SELECT * FROM $items_table_name WHERE Item_ID=" . $Item_ID);
		$Tags = $wpdb->get_results("SELECT Tag_ID FROM $tagged_items_table_name WHERE Item_ID=" . $Item_ID);
		$Item_Images = $wpdb->get_results("SELECT Item_Image_URL, Item_Image_ID FROM $item_images_table_name WHERE Item_ID=" . $Item_ID);
		$TagsString = "";
		
		if ($Product->Item_Photo_URL != "") {$PhotoURL = htmlspecialchars($Product->Item_Photo_URL, ENT_QUOTES);}
		else {$PhotoURL = plugins_url('ultimate-product-catalogue/images/No-Photo-Available.jpg');}
						
		// Increment the arrays keeping count of the number of products in each 
		// category, sub-category and tag
		$ProdCats[$Product->Category_ID]++;
		$ProdSubCats[$Product->SubCategory_ID]++;
		foreach ($Tags as $Tag) {$ProdTags[$Tag->Tag_ID]++; $TagsString .= $Tag->Tag_ID . ", ";}
		$TagsString = trim($TagsString, " ,");
		
		// Check whether the FancyBox for WordPress plugin is activated
		$plugin = "fancybox-for-wordpress/fancybox.php";
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$FancyBox_Installed = is_plugin_active($plugin);

		//Create the listing for the thumbnail layout display
		if ($format == "Thumbnail") {				
				$ProductString .= "<div id='prod-cat-item-" . $Product->Item_ID . "' class='prod-cat-item upcp-thumb-item' onclick='RecordView(" . $Product->Item_ID . ");'>\n";
				$ProductString .= "<div id='prod-cat-thumb-div-" . $Product->Item_ID . "' class='prod-cat-thumb-image-div upcp-thumb-image-div'>";
				if ($FancyBox_Installed) {$ProductString .= "<a class='fancybox' href='#prod-cat-addt-details-" . $Product->Item_ID . "'>";}
				else {$ProductString .= "<a class='upcp-no-pointer' onclick='return false'>";}
				$ProductString .= "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-thumb-" . $Product->Item_ID . "' class='prod-cat-thumb-image upcp-thumb-image'>";
				$ProductString .= "</a>";	
				$ProductString .= "</div>\n";
				$ProductString .= "<div id='prod-cat-title-" . $Product->Item_ID . "' class='prod-cat-title upcp-thumb-title'>" . $Product->Item_Name . "</div>\n";
				$ProductString .= "<div id='prod-cat-price-" . $Product->Item_ID . "' class='prod-cat-price upcp-thumb-price'>" . $Product->Item_Price . "</div>\n";
				if ($FancyBox_Installed) {
					  $ProductString .= "<a class='fancybox' href='#prod-cat-addt-details-" . $Product->Item_ID . "'>";
						$ProductString .= "<div id='prod-cat-details-link-" . $Product->Item_ID . "' class='prod-cat-details-link upcp-thumb-details-link'>Details</div>\n";
						$ProductString .= "</a>";
				}
		}
		//Create the listing for the list layout display
		elseif ($format == "List") {				
				$ProductString .= "<div id='prod-cat-item-" . $Product->Item_ID . "' class='prod-cat-item upcp-list-item'>\n";
				$ProductString .= "<div id='prod-cat-title-" . $Product->Item_ID . "' class='prod-cat-title upcp-list-title' onclick='ToggleItem(" . $Product->Item_ID . ");'>" . $Product->Item_Name . "</div>\n";
				$ProductString .= "<div id='prod-cat-price-" . $Product->Item_ID . "' class='prod-cat-price upcp-list-price' onclick='ToggleItem(" . $Product->Item_ID . ");'>" . $Product->Item_Price . "</div>\n";
				$ProductString .= "<div id='prod-cat-details-" . $Product->Item_ID . "' class='prod-cat-details upcp-list-details hidden-field'>\n";
						$ProductString .= "<div id='prod-cat-thumb-div-" . $Product->Item_ID . "' class='prod-cat-thumb-image-div upcp-list-image-div'>";
						if ($FancyBox_Installed) {$ProductString .= "<a class='fancybox' href='#prod-cat-addt-details-" . $Product->Item_ID . "'>";}
						else {$ProductString .= "<a class='upcp-no-pointer' onclick='return false'>";}
						$ProductString .= "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-thumb-" . $Product->Item_ID . "' class='prod-cat-list-image upcp-list-image'>";
						$ProductString .= "</a>";
						$ProductString .= "</div>\n";
						$ProductString .= "<div id='prod-cat-desc-" . $Product->Item_ID . "' class='prod-cat-desc upcp-list-desc'>" . $Product->Item_Description . "</div>\n";
						if ($FancyBox_Installed) {
					 		  $ProductString .= "<a class='fancybox' href='#prod-cat-addt-details-" . $Product->Item_ID . "'>";
								$ProductString .= "<div id='prod-cat-details-link-" . $Product->Item_ID . "' class='prod-cat-details-link upcp-list-details-link'>Images</div>\n";
								$ProductString .= "</a>";
						}
				$ProductString .= "</div>";
		}
		//Create the listing for the detail layout display
		if ($format == "Detail") {				
				$ProductString .= "<div id='prod-cat-item-" . $Product->Item_ID . "' class='prod-cat-item upcp-detail-item' onclick='RecordView(" . $Product->Item_ID . ");'>\n";
				$ProductString .= "<div id='prod-cat-detail-div-" . $Product->Item_ID . "' class='prod-cat-detail-image-div upcp-detail-image-div'>";
				if ($FancyBox_Installed) {$ProductString .= "<a class='fancybox' href='#prod-cat-addt-details-" . $Product->Item_ID . "'>";}
				else {$ProductString .= "<a class='upcp-no-pointer' onclick='return false'>";}
				$ProductString .= "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-detail-" . $Product->Item_ID . "' class='prod-cat-thumb-image upcp-thumb-image'>";
				$ProductString .= "</a>";	
				$ProductString .= "</div>\n";
				$ProductString .= "<div id='prod-cat-mid-div-" . $Product->Item_ID . "' class='prod-cat-mid-detail-div upcp-mid-detail-div'>";
				$ProductString .= "<div id='prod-cat-title-" . $Product->Item_ID . "' class='prod-cat-title upcp-detail-title'>" . $Product->Item_Name . "</div>\n";
				$ProductString .= "<div id='prod-cat-desc-" . $Product->Item_ID . "' class='prod-cat-desc upcp-detail-desc'>" . $Product->Item_Description . "</div>\n";
				$ProductString .= "</div>";
				$ProductString .= "<div id='prod-cat-end-div-" . $Product->Item_ID . "' class='prod-cat-end-detail-div upcp-end-detail-div'>";
				$ProductString .= "<div id='prod-cat-price-" . $Product->Item_ID . "' class='prod-cat-price upcp-detail-price'>" . $Product->Item_Price . "</div>\n";
				if ($FancyBox_Installed) {
					  $ProductString .= "<a class='fancybox' href='#prod-cat-addt-details-" . $Product->Item_ID . "'>";
						$ProductString .= "<div id='prod-cat-details-link-" . $Product->Item_ID . "' class='prod-cat-details-link upcp-detail-details-link'>Details</div>\n";
						$ProductString .= "</a>";
				}
				$ProductString .= "</div>";
		}
		
		if ($FancyBox_Installed) {
			  $ProductString .= "<div style='display:none;' id='upcp-fb-" . $Product->Item_ID . "'>";
				$ProductString .= "<div id='prod-cat-addt-details-" . $Product->Item_ID . "' class='prod-cat-addt-details'>";
				$ProductString .= "<div id='prod-cat-addt-details-thumbs-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-thumbs-div'>";
				$ProductString .= "<img src='" . $PhotoURL . "' id='prod-cat-addt-details-thumb-P". $Product->Item_ID . "' class='prod-cat-addt-details-thumb' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"0\");'>";
				foreach ($Item_Images as $Image) {$ProductString .= "<img src='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) . "' id='prod-cat-addt-details-thumb-". $Image->Item_Image_ID . "' class='prod-cat-addt-details-thumb' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"" . $Image->Item_Image_ID . "\");'>";}
				$ProductString .= "</div>";
				$ProductString .= "<div id='prod-cat-addt-details-right-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-right-div'>";
				$ProductString .= "<h2 class='prod-cat-addt-details-title'>" . $Product->Item_Name . "</h2>";
				$ProductString .= "<div id='prod-cat-addt-details-main-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-main-div'>";
				$ProductString .= "<a class='upcp-no-pointer' onclick='return false'>";
				$ProductString .= "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-addt-details-main-" . $Product->Item_ID . "' class='prod-cat-addt-details-main'>";
				$ProductString .= "</a>";
				$ProductString .= "</div>";
				$ProductString .= "<div class='clear'></div>";
				$ProductString .= "<div id='prod-cat-addt-details-desc-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-desc-div'>";
				$ProductString .= $Product->Item_Description . "</div>";
				$ProductString .= "</div></div></div>";
				//$ProductString .= "</div>";
		}
		
		// Add hidden fields with the category, sub-category and tag ID's for each product		
		$ProductString .= "<div id='prod-cat-category-jquery-" . $Product->Item_ID . "' class='prod-cat-category-jquery jquery-hidden'> " . $Product->Category_ID . ",</div>\n";
		$ProductString .= "<div id='prod-cat-subcategory-jquery-" . $Product->Item_ID . "' class='prod-cat-subcategory-jquery jquery-hidden'> " . $Product->SubCategory_ID . ",</div>\n";
		$ProductString .= "<div id='prod-cat-tag-jquery-" . $Product->Item_ID . "' class='prod-cat-tag-jquery jquery-hidden'> " . $TagsString . ",</div>\n";
		$ProductString .= "<div class='clear'></div>\n";
		$ProductString .= "</div>\n";
				
		return $ProductString;
}
add_shortcode("product-catalogue", "Insert_Product_Catalog");

 ?>