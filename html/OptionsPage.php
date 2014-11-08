<?php 
		$Color = get_option("UPCP_Color_Scheme");
		$Links = get_option("UPCP_Product_Links");
		$Tags = get_option("UPCP_Tag_Logic");
		$Filter = get_option("UPCP_Filter_Type");
		$ReadMore = get_option("UPCP_Read_More");
		$Detail_Desc_Chars = get_option("UPCP_Desc_Chars");
		$Sidebar_Order = get_option("UPCP_Sidebar_Order");
		$Single_Page_Price = get_option("UPCP_Single_Page_Price");
		$PrettyLinks = get_option("UPCP_Pretty_Links");
		$XML_Sitemap_URL = get_option("UPCP_XML_Sitemap_URL");
		$Filter_Title = get_option("UPCP_Filter_Title");
		$Detail_Image = get_option("UPCP_Details_Image");
		$CaseInsensitiveSearch = get_option("UPCP_Case_Insensitive_Search");
		$InstallVersion = get_option("UPCP_First_Install_Version");
		$Custom_Product_Page = get_option("UPCP_Custom_Product_Page");
		$Products_Per_Page = get_option("UPCP_Products_Per_Page");
		$Pagination_Location = get_option("UPCP_Pagination_Location");
		$PP_Grid_Width = get_option("UPCP_PP_Grid_Width");
		$PP_Grid_Height = get_option("UPCP_PP_Grid_Height");
		$Top_Bottom_Padding = get_option("UPCP_Top_Bottom_Padding");
		$Left_Right_Padding = get_option("UPCP_Left_Right_Padding");
		$Product_Search = get_option("UPCP_Product_Search");
		$Product_Sort = get_option("UPCP_Product_Sort");
?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div><h2>Settings</h2>
<script type="text/javascript" src="js/Tooltip.js"></script>

<form method="post" action="admin.php?page=UPCP-options&DisplayPage=Options&Action=UPCP_UpdateOptions">
<table class="form-table">
<tr>
<th scope="row">Catalogue Color <br/> 
<div onMouseOver="ShowToolTip('color_scheme_exp')" onMouseOut="HideToolTip('color_scheme_exp')" class="questionMark"><br> 
<div id="color_scheme_exp" class="toolTip" >Set the color of the image and border elements</div></div>
</th>
<td >
	<fieldset><legend class="screen-reader-text"><span>Catalogue Color</span></legend>
	<label title='Blue'><input type='radio' name='color_scheme' value='Blue' <?php if($Color == "Blue") {echo "checked='checked'";} ?> /> <span>Blue</span></label><br />
	<label title='Black'><input type='radio' name='color_scheme' value='Black' <?php if($Color == "Black") {echo "checked='checked'";} ?> /> <span>Black</span></label><br />
	<label title='Grey'><input type='radio' name='color_scheme' value='Grey' <?php if($Color == "Grey") {echo "checked='checked'";} ?> /> <span>Grey</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Product Links <br>
<div onMouseOver="ShowToolTip('product_links_exp')" onMouseOut="HideToolTip('product_links_exp')" class="questionMark"><br> 
<div id="product_links_exp" class="toolTip" >Should external product links open in a new window?</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Product Links</span></legend>
	<label title='Same'><input type='radio' name='product_links' value='Same' <?php if($Links == "Same") {echo "checked='checked'";} ?> /> <span>Open in Same Window</span></label><br />
	<label title='New'><input type='radio' name='product_links' value='New' <?php if($Links == "New") {echo "checked='checked'";} ?> /> <span>Open in New Window</span></label><br />
	<!--<label title='External'><input type='radio' name='product_links' value='External' <?php if($Links == "External") {echo "checked='checked'";} ?> /> <span>Open External Links Only in New Window</span></label><br />-->
	</fieldset>
</td>
</tr>
<?php if ($InstallVersion <= 2.0) { ?>
<tr>
<th scope="row">Pretty Permalinks<br />
<div onMouseOver="ShowToolTip('pretty_links_exp')" onMouseOut="HideToolTip('pretty_links_exp')" class="questionMark"><br> 
<div id="pretty_links_exp" class="toolTip" >Should the plugin create SEO-friendly product page URLs?</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Use Pretty Permalinks for Product Pages</span></legend>
	<label title='Yes'><input type='radio' name='pretty_links' value='Yes' <?php if($PrettyLinks == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='pretty_links' value='No' <?php if($PrettyLinks == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	</fieldset>
</td>
</tr>
<?php } ?>
<tr>
<th scope="row">Read More <br/> 
<div onMouseOver="ShowToolTip('read_more_exp')" onMouseOut="HideToolTip('read_more_exp')" class="questionMark"><br> 
<div id="read_more_exp" class="toolTip" >In the "Details" layout, should the product description be cutoff if it's long?</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>"Read More" for Details view</span></legend>
	<label title='Yes'><input type='radio' name='read_more' value='Yes' <?php if($ReadMore == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='read_more' value='No' <?php if($ReadMore == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Product Page Price <br/> 
<div onMouseOver="ShowToolTip('single_page_price_exp')" onMouseOut="HideToolTip('single_page_price_exp')" class="questionMark"><br> 
<div id="single_page_price_exp" class="toolTip" >Should a product's price be displayed on the default product pages?</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Put Prices on the Single Product Pages</span></legend>
	<label title='Yes'><input type='radio' name='single_page_price' value='Yes' <?php if($Single_Page_Price == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='single_page_price' value='No' <?php if($Single_Page_Price == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Characters in Details Description <br/> 
<div onMouseOver="ShowToolTip('desc_count_exp')" onMouseOut="HideToolTip('desc_count_exp')" class="questionMark"><br> 
<div id="desc_count_exp" class="toolTip" >Set maximum number of characters in product description in the "Details" layout</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Characters in "Details" Description</span></legend>
	<input type='text' name='desc_count' value='<?php echo $Detail_Desc_Chars; ?>'/>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Sub-Category Style <br/> 
<div onMouseOver="ShowToolTip('sidebar_order_exp')" onMouseOut="HideToolTip('sidebar_order_exp')" class="questionMark"><br> 
<div id="sidebar_order_exp" class="toolTip" >Should categories and sub-categories be arranged hierarchically or be grouped?</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>How Should Sub-Categories be Displayed</span></legend>
	<label title='Normal'><input type='radio' name='sidebar_order' value='Normal' <?php if($Sidebar_Order == "Normal") {echo "checked='checked'";} ?> /> <span>Normal</span></label><br />
	<label title='Hierarchical'><input type='radio' name='sidebar_order' value='Hierarchical' <?php if($Sidebar_Order == "Hierarchical") {echo "checked='checked'";} ?> /> <span>Hierarchical</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Custom "Details" icon <br/> 
<div onMouseOver="ShowToolTip('Details_Image_exp')" onMouseOut="HideToolTip('Details_Image_exp')" class="questionMark"><br> 
<div id="Details_Image_exp" class="toolTip" >Image to use instead of "Details" (Optional)</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Image to use instead of "Details" (Optional)</span></legend>
	<input id="Details_Image" type="text" size="36" name="Details_Image" value='<?php if ($Detail_Image == "") {echo "http://";} else {echo $Detail_Image;} ?>' /> 
  <input id="Details_Image_button" class="button" type="button" value="Upload Image" />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Filtering Type <br/> 
<div onMouseOver="ShowToolTip('filter_type_exp')" onMouseOut="HideToolTip('filter_type_exp')" class="questionMark"><br> 
<div id="filter_type_exp" class="toolTip" >Should the plugin use AJAX (recommended) or Javascript (legacy support only) to filter products?</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Filtering Type</span></legend>
	<label title='Javascript'><input type='radio' name='filter_type' value='Javascript' <?php if($Filter == "Javascript") {echo "checked='checked'";} ?> /> <span>Javascript Filtering</span></label><br />
	<label title='AJAX'><input type='radio' name='filter_type' value='AJAX' <?php if($Filter == "AJAX") {echo "checked='checked'";} ?> /> <span>AJAX Filtering</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Case Insensitive Search (AJAX Only) <br/> 
<div onMouseOver="ShowToolTip('case_insensitive_search_exp')" onMouseOut="HideToolTip('case_insensitive_search_exp')" class="questionMark"><br> 
<div id="case_insensitive_search_exp" class="toolTip" >Compare only the letters and not their case in AJAX search</div></div>
</th>
<td >
	<fieldset><legend class="screen-reader-text"><span>Compare only the letters and not their case in AJAX search</span></legend>
	<label title='Javascript'><input type='radio' name='case_insensitive_search' value='Yes' <?php if($CaseInsensitiveSearch == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='AJAX'><input type='radio' name='case_insensitive_search' value='No' <?php if($CaseInsensitiveSearch == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Tag Logic <br/> 
<div onMouseOver="ShowToolTip('tag_logic_exp')" onMouseOut="HideToolTip('tag_logic_exp')" class="questionMark"><br> 
<div id="tag_logic_exp" class="toolTip" >Gives users the option to use multiple tags at the same time in filtering ("OR" option)</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Tag Logic</span></legend>
	<label title='AND'><input type='radio' name='tag_logic' value='AND' <?php if($Tags == "AND") {echo "checked='checked'";} ?> /> <span>Selected Tags use 'AND'</span></label><br />
	<label title='OR'><input type='radio' name='tag_logic' value='OR' <?php if($Tags == "OR") {echo "checked='checked'";} ?> /> <span>Selected Tags use 'OR'</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Product Search <br/> 
<div onMouseOver="ShowToolTip('product_search_exp')" onMouseOut="HideToolTip('product_search_exp')" class="questionMark"><br> 
<div id="product_search_exp" class="toolTip" >Set the "Product Search" text box to search either product name, product name and description or product name, description and custom fields (slowest option)</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Product Search</span></legend>
	<label title='Name'><input type='radio' name='product_search' value='name' <?php if($Product_Search == "name") {echo "checked='checked'";} ?> /> <span>Name Only</span></label><br />
	<label title='Name-and-Desc'><input type='radio' name='product_search' value='namedesc' <?php if($Product_Search == "namedesc") {echo "checked='checked'";} ?> /> <span>Name and Description</span></label><br />
	<label title='Name-Desc-and-Cust'><input type='radio' name='product_search' value='namedesccust' <?php if($Product_Search == "namedesccust") {echo "checked='checked'";} ?> /> <span>Name, Description and Custom Fields</span></label><br />
	</fieldset>
</td>
</tr>
</table>
<h3>Premium Options</h3>
<?php if ($InstallVersion >= 2.1) { ?>
<table class="form-table">
<tr>
<th scope="row">Pretty Permalinks <br/> 
<div onMouseOver="ShowToolTip('pretty_links_exp')" onMouseOut="HideToolTip('pretty_links_exp')" class="questionMark"><br> 
<div id="pretty_links_exp" class="toolTip" >Should the plugin create SEO-friendly product page URLs?</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Use Pretty Permalinks for Product Pages</span></legend>
	<label title='Yes'><input type='radio' name='pretty_links' value='Yes' <?php if($PrettyLinks == "Yes") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='pretty_links' value='No' <?php if($PrettyLinks == "No") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span>No</span></label><br />
	</fieldset>
</td>
</tr>
<?php } ?>
<tr>
<th scope="row">XML Sitemap URL <br/> 
<div onMouseOver="ShowToolTip('xml_sitemap_url_exp')" onMouseOut="HideToolTip('xml_sitemap_url_exp')" class="questionMark"><br> 
<div id="xml_sitemap_url_exp" class="toolTip" >Set the base URL path of XML sitemap that the plugin creates of all products, used for SEO purposes</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>What URL should be used at the base of the products sitemap?</span></legend>
	<input type='text' name='xml_sitemap_url' value='<?php echo $XML_Sitemap_URL; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
	</fieldset>
</td>
</tr>
<?php /*<tr>
<th scope="row">Add Product Name to Title</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Should the product name be added to the page title on individual product pages?</span></legend>
	<label title='Yes'><input type='radio' name='filter_title' value='Yes' <?php if($Filter_Title == "Yes") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='filter_title' value='No' <?php if($Filter_Title == "No") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span>No</span></label><br />
	</fieldset>
</td>
</tr> */ ?>
<tr>
<th scope="row">Custom Product Pages <br/> 
<div onMouseOver="ShowToolTip('custom_product_page_exp')" onMouseOut="HideToolTip('custom_product_page_exp')" class="questionMark"><br> 
<div id="custom_product_page_exp" class="toolTip" >Should the layout created on the "Product Pages" tab be used instead of the default plugin layout?</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Use your custom designed page (Product Page tab) instead of the default?</span></legend>
	<label title='Yes'><input type='radio' name='custom_product_page' value='Yes' <?php if($Custom_Product_Page == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='Large'><input type='radio' name='custom_product_page' value='Large' <?php if($Custom_Product_Page == "Large") {echo "checked='checked'";} ?> /> <span>Large Screen Only</span></label><br />
	<label title='No'><input type='radio' name='custom_product_page' value='No' <?php if($Custom_Product_Page == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Products per Page <br/> 
<div onMouseOver="ShowToolTip('products_per_page_exp')" onMouseOut="HideToolTip('products_per_page_exp')" class="questionMark"><br> 
<div id="products_per_page_exp" class="toolTip" >Set the maximum number of products per page for your catalogues</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>How many products should be displayed on each page of the catalogue?</span></legend>
	<input type='text' name='products_per_page' value='<?php echo $Products_Per_Page; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Pagination Location <br/> 
<div onMouseOver="ShowToolTip('pagination_location_exp')" onMouseOut="HideToolTip('pagination_location_exp')" class="questionMark"><br> 
<div id="pagination_location_exp" class="toolTip" >Set the location of pagination controls for your catalogues</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Where should the pagination controls be located?</span></legend>
	<label title='Top'><input type='radio' name='pagination_location' value='Top' <?php if($Pagination_Location == "Top") {echo "checked='checked'";} ?> /> <span>Top</span></label><br />
	<label title='Bottom'><input type='radio' name='pagination_location' value='Bottom' <?php if($Pagination_Location == "Bottom") {echo "checked='checked'";} ?> /> <span>Bottom</span></label><br />
	<label title='Both'><input type='radio' name='pagination_location' value='Both' <?php if($Pagination_Location == "Both") {echo "checked='checked'";} ?> /> <span>Top and Bottom</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Product Sorting <br/> 
<div onMouseOver="ShowToolTip('product_sort_exp')" onMouseOut="HideToolTip('product_sort_exp')" class="questionMark"><br> 
<div id="product_sort_exp" class="toolTip" >Select which sorting options are available in the "Sort By" box</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Available Sorting Options</span></legend>
	<label title='Price and Name'><input type='radio' name='product_sort' value='Price_Name' <?php if($Product_Sort == "Price_Name") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span>Price and Name</span></label><br />
	<label title='Price'><input type='radio' name='product_sort' value='Price' <?php if($Product_Sort == "Price") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span>Price</span></label><br />
	<label title='Name'><input type='radio' name='product_sort' value='Name' <?php if($Product_Sort == "Name") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span>Name</span></label><br />
	<label title='None'><input type='radio' name='product_sort' value='None' <?php if($Product_Sort == "None") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span>None</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Product Page Grid Width <br/> 
<div onMouseOver="ShowToolTip('pp_grid_width_exp')" onMouseOut="HideToolTip('pp_grid_width_exp')" class="questionMark"><br> 
<div id="pp_grid_width_exp" class="toolTip" >How wide should the grid elements used to build custom product pages be? (in pixels)</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>How wide should each product grid be? (in pixels)</span></legend>
	<input type='text' name='pp_grid_width' value='<?php echo $PP_Grid_Width; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Product Page Grid Height <br/> 
<div onMouseOver="ShowToolTip('pp_grid_height_exp')" onMouseOut="HideToolTip('pp_grid_height_exp')" class="questionMark"><br>  
<div id="pp_grid_height_exp" class="toolTip" >How tall should the grid elements used to build custom product pages be? (in pixels)</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>How tall should each product grid be? (in pixels)</span></legend>
	<input type='text' name='pp_grid_height' value='<?php echo $PP_Grid_Height; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Top and Bottom Padding <br/> 
<div onMouseOver="ShowToolTip('pp_top_bottom_padding_exp')" onMouseOut="HideToolTip('pp_top_bottom_padding_exp')" class="questionMark"><br> 
<div id="pp_top_bottom_padding_exp" class="toolTip" >How much padding should be above and below each grid element used to build custom product? (in pixels)</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>How much padding should be above and below each grid? (in pixels)</span></legend>
	<input type='text' name='pp_top_bottom_padding' value='<?php echo $Top_Bottom_Padding; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Right and Left Padding <br/> 
<div onMouseOver="ShowToolTip('pp_left_right_padding_exp')" onMouseOut="HideToolTip('pp_left_right_padding_exp')" class="questionMark"><br>  
<div id="pp_left_right_padding_exp" class="toolTip" >How much padding should be to the right and left each grid element used to build custom product? (in pixels)</div></div>
</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>How much padding should be to the right and left of each grid? (in pixels)</span></legend>
	<input type='text' name='pp_left_right_padding' value='<?php echo $Left_Right_Padding; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
	</fieldset>
</td>
</tr>


</table>


<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value="Save Changes"  /></p></form>

</div>