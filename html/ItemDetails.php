
<!-- The details of a specific product for editing, based on the product ID -->
<?php if ($_GET['Selected'] == "Product") { ?>
		
		<?php $Product = $wpdb->get_row("SELECT * FROM $items_table_name WHERE Item_ID =" . $_GET['Item_ID']); ?>
		
		<div class="OptionTab ActiveTab" id="EditProduct">
				<div class="form-wrap ItemDetail">
						<a href="admin.php?page=UPCP-options&DisplayPage=Products" class="NoUnderline">&#171; <?php _e("Back", 'UPCP') ?></a>
						<h3>Edit <?php echo $Product->Product_Name;?></h3>
						<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=EditProduct&DisplayPage=Products" class="validate" enctype="multipart/form-data">
						<input type="hidden" name="action" value="Edit_Product" />
						<input type="hidden" name="Item_ID" value="<?php echo $Product->Item_ID; ?>" />
						<?php wp_nonce_field(); ?>
						<?php wp_referer_field(); ?>
						<table class="form-table">
						<tr>
								<th><label for="Item_Name"><?php _e("Name", 'UPCP') ?></label></th>
								<td><input name="Item_Name" id="Item_Name" type="text" value="<?php echo $Product->Item_Name;?>" size="60" />
								<p><?php _e("The name of the product your users will see.", 'UPCP') ?></p></td>
						</tr>
						<tr>
								<th><label for="Item_Image"><?php _e("Image", 'UPCP') ?></label></th>
								<td><input name="Item_Image" id="Item_Image" type="file" />
								<input name="Current_Image_URL" type="hidden" value="<?php echo $Product->Item_Photo_URL;?>"/>
								<p><?php _e("The main image that will be displayed in association with this product. Current Image:", 'UPCP') ?><br/><img class="PreviewImage" src="<?php echo $Product->Item_Photo_URL;?>" /></p></td>
						</tr>
						<tr>
								<th><label for="Item_Price"><?php _e("Price", 'UPCP') ?></label></th>
								<td><input name="Item_Price" id="Item_Price" type="text" value="<?php echo $Product->Item_Price;?>" size="60" />
								<p><?php _e("The price of the product.", 'UPCP') ?></p></td>
						</tr>
						<tr>
								<th><label for="Item_Description"><?php _e("Description", 'UPCP') ?></label></th>
								<td><textarea name="Item_Description" id="Item_Description" rows="5" cols="80"><?php echo $Product->Item_Description;?></textarea>
								<p><?php _e("The description of the product. What is it and what makes it worth getting?", 'UPCP') ?></p></td>
						</tr>
						<tr>
								<th><label for="Item_Link"><?php _e("Product Link", 'UPCP') ?></label></th>
								<td><input name="Item_Link" id="Item_Link" type="text" value="<?php echo $Product->Item_Link;?>" size="60" />
								<p><?php _e("A link that will replace the default product page. Useful if you participate in affiliate programs.", 'UPCP') ?></p></td>
						</tr>
						<tr>
								<th><label for="Item_Category"><?php _e("Category:", 'UPCP') ?></label></th>
								<td> <select name="Category_ID" id="Item_Category" onchange="UpdateSubCats();">
										 <option value=""></option>
										 <?php $Categories = $wpdb->get_results("SELECT * FROM $categories_table_name"); ?>
										 <?php foreach ($Categories as $Category) {
										 			 			echo "<option value='" . $Category->Category_ID . "' ";
																if ($Category->Category_ID == $Product->Category_ID) {echo "selected='selected'";}
																echo " >" . $Category->Category_Name . "</option>";
													} ?>
										 </select>
								<p><?php _e("What category is this product in? Categories help to organize your product catalogues and help your customers to find what they're looking for.", 'UPCP') ?></p></td>
						</tr>
						<tr>
								<th><label for="Item_SubCategory"><?php _e("Sub-Category:", 'UPCP') ?></label></th>
								<td> <select name="SubCategory_ID" id="Item_SubCategory">
										 <option value=""></option>
										 	<?php $SubCategories = $wpdb->get_results("SELECT * FROM $subcategories_table_name WHERE Category_ID=" . $Product->Category_ID . " ORDER BY SubCategory_Name"); ?>
										 <?php foreach ($SubCategories as $SubCategory) {
										 			 			echo "<option value='" . $SubCategory->SubCategory_ID . "' ";
																if ($SubCategory->SubCategory_ID == $Product->SubCategory_ID) {echo "selected='selected'";}
																echo " >" . $SubCategory->SubCategory_Name . "</option>";
													} ?>
										 </select>
								<p><?php _e("What sub-category is this product in? Sub-categories help to organize your product catalogues and help your customers to find what they're looking for.", 'UPCP') ?></p></td>
						</tr>
						<tr>
								<th><label for="Item_Tags"><?php _e("Tags:", 'UPCP') ?></label></th>
								<td>
								<?php $Tagged_Items = $wpdb->get_results("SELECT Tag_ID FROM $tagged_items_table_name WHERE Item_ID='" . $Product->Item_ID ."'");?>
								<?php $Tags = $wpdb->get_results("SELECT * FROM $tags_table_name"); ?>
								<?php foreach ($Tags as $Tag) {
										$Is_Tagged = false;
										foreach ($Tagged_Items as $Tagged_Item) {if ($Tagged_Item->Tag_ID == $Tag->Tag_ID) {$Is_Tagged = true;}}?>
										<input type="checkbox" class='upcp-tag-input' name="Tags[]" value="<?php echo $Tag->Tag_ID; ?>" id="Tag-<?php echo $Tag->Tag_Name; ?>" <?php if ($Is_Tagged) {echo " checked";} ?>>
										<?php echo $Tag->Tag_Name; ?></br>
								<?php } ?>
								<p><?php _e("What tags should this product have? Tags help to describe the attributes of a product.", 'UPCP') ?></p></td>
						</tr>
						</table>

						<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"  /></p>
						</form>
				</div>
				
				<!-- A form to add additional images for a product, so that they can be viewed in the FancyBox popup -->
				<?php if ($Full_Version == "Yes") { ?>
				<div class="form-wrap ItemImages">
						<h3><?php _e("Add Product Images", 'UPCP') ?></h3>
						<form id="add-image" method="post" action="admin.php?page=UPCP-options&Action=AddProductImage&DisplayPage=Products" class="validate" enctype="multipart/form-data">
								<input type="hidden" name="action" value="Add_Product_Image" />
								<input type="hidden" name="Item_ID" value="<?php echo $Product->Item_ID; ?>" />
								<?php wp_nonce_field(); ?>
								<?php wp_referer_field(); ?>
								<table class="form-table">
										<tr>
												<th><label for="Item_Image"><?php _e("Image", 'UPCP') ?></label></th>
												<td><input name="Item_Image" id="Item_Image" type="file" />
											 	<p><?php _e("The secondaries images that will be displayed if Fancybox is enabled.", 'UPCP') ?></p></td>
										</tr>
								</table>
								<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Add Image"  /></p>
						</form>
						<div class='item-image-preview'>
								<p><?php _e("Current Images:", 'UPCP') ?><p/>
													<?php $Images = $wpdb->get_results("SELECT * FROM $item_images_table_name WHERE Item_ID='" . $Product->Item_ID . "'"); 
													foreach ($Images as $Image) { ?>
													<div class="item-image">
															<img class="PreviewImage" src="<?php echo $Image->Item_Image_URL;?>" />
															<a href="admin.php?page=UPCP-options&Action=DeleteProductImage&DisplayPage=Products&Item_Image_ID=<?php echo $Image->Item_Image_ID; ?>"><?php _e("Delete", 'UPCP') ?></a>
													</div>
										<?php } ?>
						</div>
				</div>
				<?php } else { ?>
						<div class="Explanation-Div">
								<h2><?php _e("Full Version Required!", 'UPCP') ?></h2>
								<div class="upcp-full-version-explanation">
										<?php _e("The full version of the Ultimate Product Catalogue Plugin is required to additional product images. Please upgrade to unlock this page!", 'UPCP') ?>
								</div>
						</div>
				<?php } ?>
		</div>

<!-- The details of a specific category for editing, based on the product ID -->		
<?php } elseif ($_GET['Selected'] == "Category") { ?>
		
		<?php $Category = $wpdb->get_row("SELECT * FROM $categories_table_name WHERE Category_ID =" . $_GET['Category_ID']); ?>
		
		<div class="OptionTab ActiveTab" id="EditCategory">
				
				<div id="col-right">
				<div class="col-wrap">
				<div id="add-page" class="postbox metabox-holder" >
				<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span><?php _e("Products in Category", 'UPCP') ?></span></h3>
				<div class="inside">
				<div id="posttype-page" class="posttypediv">

				<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
				<ul id="pagechecklist-most-recent" class="categorychecklist form-no-clear">
				<?php $Products = $wpdb->get_results("SELECT Item_ID, Item_Name FROM $items_table_name WHERE Category_ID=" . $_GET['Category_ID']);
							foreach ($Products as $Product) {
									echo "<li><label class='menu-item-title'><a href='admin.php?page=UPCP-options&Action=Item_Details&Selected=Product&Item_ID=" . $Product->Item_ID . "'>" . $Product->Item_Name . "</a></label></li>";
							}
				?>
				</ul>
				</div><!-- /.tabs-panel -->
				</div><!-- /.posttypediv -->
				</div>
				</div>
				</div>
				</div><!-- col-right -->
				
				<div id="col-left">
				<div class="col-wrap">
				<div class="form-wrap CategoryDetail">
						<a href="admin.php?page=UPCP-options&DisplayPage=Categories" class="NoUnderline">&#171; <?php _e("Back", 'UPCP') ?></a>
						<h3>Edit <?php echo $Product->Product_Name;?></h3>
						<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=EditCategory&DisplayPage=Categories" class="validate" enctype="multipart/form-data">
						<input type="hidden" name="action" value="Edit_Category" />
						<input type="hidden" name="Category_ID" value="<?php echo $Category->Category_ID; ?>" />
						<?php wp_nonce_field(); ?>
						<?php wp_referer_field(); ?>
						<div class="form-field">
								<label for="Category_Name"><?php _e("Name", 'UPCP') ?></label>
								<input name="Category_Name" id="Category_Name" type="text" value="<?php echo $Category->Category_Name;?>" size="60" />
								<p><?php _e("The name of the category your users will see and search for.", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Category_Description"><?php _e("Description", 'UPCP') ?></label>
								<textarea name="Category_Description" id="Category_Description" rows="5" cols="40"><?php echo $Category->Category_Description;?></textarea>
								<p><?php _e("The description of the category. What products are included in this?", 'UPCP') ?></p>
						</div>

						<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes', 'UPCP') ?>" /></p>
						</form>
				</div>
				</div>
				</div>
			
		</div>

<!-- Catalogues are complicated to edit, so we pass that off to a different page in the HTML folder -->		
<?php } elseif ($_GET['Selected'] == "Catalogue") { ?>
		
		<?php include "CatalogueDetails.php"; ?>

<!-- The details of a specific sub-category for editing, based on the product ID -->		
<?php } elseif ($_GET['Selected'] == "SubCategory") { ?>
		
		<?php $SubCategory = $wpdb->get_row("SELECT * FROM $subcategories_table_name WHERE SubCategory_ID =" . $_GET['SubCategory_ID']); ?>
		
		<div class="OptionTab ActiveTab" id="EditSubCategory">
				
				<div id="col-right">
				<div class="col-wrap">
				<div id="add-page" class="postbox metabox-holder" >
				<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span><?php _e("Products in Sub-Category", 'UPCP') ?></span></h3>
				<div class="inside">
				<div id="posttype-page" class="posttypediv">

				<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
				<ul id="pagechecklist-most-recent" class="categorychecklist form-no-clear">
				<?php $Products = $wpdb->get_results("SELECT Item_ID, Item_Name FROM $items_table_name WHERE SubCategory_ID=" . $_GET['SubCategory_ID']);
							foreach ($Products as $Product) {
									echo "<li><label class='menu-item-title'><a href='admin.php?page=UPCP-options&Action=Item_Details&Selected=Product&Item_ID=" . $Product->Item_ID . "'>" . $Product->Item_Name . "</a></label></li>";
							}
				?>
				</ul>
				</div><!-- /.tabs-panel -->
				</div><!-- /.posttypediv -->
				</div>
				</div>
				</div>
				</div><!-- col-right -->
				
				<div id="col-left">
				<div class="col-wrap">
				<div class="form-wrap SubCategoryDetail">
						<a href="admin.php?page=UPCP-options&DisplayPage=SubCategories" class="NoUnderline">&#171; <?php _e("Back", 'UPCP')?></a>
						<h3>Edit <?php echo $SubCategory->SubCategory_Name;?></h3>
						<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=EditSubCategory&DisplayPage=SubCategories" class="validate" enctype="multipart/form-data">
						<input type="hidden" name="action" value="Edit_SubCategory" />
						<input type="hidden" name="SubCategory_ID" value="<?php echo $SubCategory->SubCategory_ID; ?>" />
						<?php wp_nonce_field(); ?>
						<?php wp_referer_field(); ?>
						<div class='form-field'>
								<label for="SubCategory_Name"><?php _e("Name", 'UPCP') ?></label>
								<input name="SubCategory_Name" id="SubCategory_Name" type="text" value="<?php echo $SubCategory->SubCategory_Name;?>" size="60" />
								<p><?php _e("The name of the sub-category your users will see and search for.", 'UPCP') ?></p>
						</div>
						<div class='form-field'>
								<label for="Item_Category"><?php _e("Category:", 'UPCP') ?></label>
								<select name="Category_ID" id="Item_Category">
												<option value=""></option>
												<?php $Categories = $wpdb->get_results("SELECT * FROM $categories_table_name"); ?>
												<?php foreach ($Categories as $Category) {
												echo "<option value='" . $Category->Category_ID . "' ";
												if ($Category->Category_ID == $SubCategory->Category_ID) {echo "selected='selected'";}
												echo " >" . $Category->Category_Name . "</option>";
												} ?>
										</select>
										<p><?php _e("What category is this product in? Categories help to organize your product catalogues and help your customers to find what they're looking for.", 'UPCP') ?></p>
						</div>
						<div class='form-field'>
								<label for="SubCategory_Description"><?php _e("Description", 'UPCP') ?></label>
								<textarea name="SubCategory_Description" id="SubCategory_Description" rows="5" cols="40"><?php echo $SubCategory->SubCategory_Description;?></textarea>
								<p><?php _e("The description of the sub-category. What products are included in this?", 'UPCP') ?></p>
						</div>

						<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php e_('Save Changes', 'UPCP') ?>"  /></p>
						</form>
				</div>
				</div>
				</div>
		</div>
		
<!-- The details of a specific tag for editing, based on the product ID -->		
<?php } elseif ($_GET['Selected'] == "Tag") { ?>
		
		<?php $Tag = $wpdb->get_row("SELECT * FROM $tags_table_name WHERE Tag_ID =" . $_GET['Tag_ID']); ?>
		
		<div class="OptionTab ActiveTab" id="EditTag">
				
				<div id="col-right">
				<div class="col-wrap">
				<div id="add-page" class="postbox metabox-holder" >
				<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span><?php _e("Products in Tag", 'UPCP') ?></span></h3>
				<div class="inside">
				<div id="posttype-page" class="posttypediv">

				<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
				<ul id="pagechecklist-most-recent" class="categorychecklist form-no-clear">
				<?php $Tagged_Items = $wpdb->get_results("SELECT Item_ID FROM $tagged_items_table_name WHERE Tag_ID=" . $_GET['Tag_ID']);
							foreach ($Tagged_Items as $Tagged_Item) {
									$Product = $wpdb->get_row("SELECT Item_ID, Item_Name FROM $items_table_name WHERE Item_ID=" . $Tagged_Item->Item_ID);
									echo "<li><label class='menu-item-title'><a href='admin.php?page=UPCP-options&Action=Item_Details&Selected=Product&Item_ID=" . $Product->Item_ID . "'>" . $Product->Item_Name . "</a></label></li>";
							}
				?>
				</ul>
				</div><!-- /.tabs-panel -->
				</div><!-- /.posttypediv -->
				</div>
				</div>
				</div>
				</div><!-- col-right -->
				
				<div id="col-left">
				<div class="col-wrap">
				<div class="form-wrap TagDetail">
						<a href="admin.php?page=UPCP-options&DisplayPage=Tags" class="NoUnderline">&#171; <?php _e("Back", 'UPCP') ?></a>
						<h3>Edit <?php echo $Tag->Tag_Name;?></h3>
						<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=EditTag&DisplayPage=Tags" class="validate" enctype="multipart/form-data">
						<input type="hidden" name="action" value="Edit_Tag" />
						<input type="hidden" name="Tag_ID" value="<?php echo $Tag->Tag_ID; ?>" />
						<?php wp_nonce_field(); ?>
						<?php wp_referer_field(); ?>
						<div class='form-field'>
								<label for="Tag_Name"><?php _e("Name", 'UPCP') ?></label>
								<input name="Tag_Name" id="Tag_Name" type="text" value="<?php echo $Tag->Tag_Name;?>" size="60" />
								<p><?php _e("The name of the tag your users will see and search for.", 'UPCP') ?></p>
						</div>
						<div class='form-field'>
								<label for="Tag_Description"><?php _e("Description", 'UPCP') ?></label>
								<textarea name="Tag_Description" id="Tag_Description" rows="5" cols="40"><?php echo $Tag->Tag_Description;?></textarea>
								<p><?php _e("The description of the tag. What products are included in this?", 'UPCP') ?></p>
						</div>

						<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes', 'UPCP') ?>"  /></p>
						</form>
				</div>
				</div>
				</div>
		</div>
		
<?php } ?>	