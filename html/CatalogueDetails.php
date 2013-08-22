<!-- If there are new products or categories to add to the catalogue, do that -->
<?php if (isset($_POST['products'])) {Add_Products_Catalogue();} ?>
<?php if (isset($_POST['categories'])) {Add_Categories_Catalogue();} ?>
<?php $Catalogue = $wpdb->get_row("SELECT * FROM $catalogues_table_name WHERE Catalogue_ID =" . $_GET['Catalogue_ID']); ?>
		
		<!-- Create the form to edit the basic catalogue details -->
		<div class="OptionTab ActiveTab" id="EditCatalogue">
				<div class="form-wrap CatalogueDetail">
						<a href="admin.php?page=UPCP-options&DisplayPage=Catalogues" class="NoUnderline">&#171; Back </a>
						<h3>Edit <?php echo $Catalogue->Catalogue_Name;?> (ID: <?php echo $Catalogue->Catalogue_ID; ?>)</h3>
						<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=EditCatalogue&DisplayPage=Catalogue" class="validate" enctype="multipart/form-data">
						<input type="hidden" name="action" value="Edit_Catalogue" />
						<input type="hidden" name="Catalogue_ID" value="<?php echo $Catalogue->Catalogue_ID; ?>" />
						<?php wp_nonce_field(); ?>
						<?php wp_referer_field(); ?>
						<table class="form-table">
						<tr>
								<th><label for="Catalogue_Name">Name</label></th>
								<td><input name="Catalogue_Name" id="Catalogue_Name" type="text" value="<?php echo $Catalogue->Catalogue_Name;?>" size="60" />
								<p>The name of the catalogue. This is for your own internal use, and to insert the catalogue into a page or post.</p></td>
						</tr>
						<tr>
								<th><label for="Catalogue_Description">Description</label></th>
								<td><textarea name="Catalogue_Description" id="Catalogue_Description" rows="5" cols="40"><?php echo $Catalogue->Catalogue_Description;?></textarea>
								<p>The description of the catalogue. What products are included in this?</p></td>
						</tr>
						<tr>
								<th><label for="Catalogue_Layout_Format">Catalogue Layout Format</label></th>
								<td> <select name="Catalogue_Layout_Format" id="Catalogue_Layout_Format">
										 <option value=""></option>
										 <option value="List" <?php if ($Catalogue->Catalogue_Layout_Format == "List") {echo "selected='selected'";} ?>>List</option>
										 <option value="Thumbnail" <?php if ($Catalogue->Catalogue_Layout_Format == "Thumbnail") {echo "selected='selected'";} ?>>Thumbnails</option>
										 </select>
								<p>The layout style for the catalogue. Different layout styles display the products in your catalogue in different ways.</p></td>
						</tr>
						<tr>
								<th><label for="Catalogue_Custom_CSS">Custom CSS</label></th>
								<td><textarea name="Catalogue_Custom_CSS" id="Catalogue_Custom_CSS" rows="5" cols="40"><?php echo $Catalogue->Catalogue_Custom_CSS;?></textarea>
								<p>Custom CSS styles that should be applied to this catalogue.</p></td>
						</tr>
						</table>
						
						<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Edit Catalogue"  /></p>
						</form>
						
						
						
						
						<div id="nav-menus-frame">
	<div id="menu-settings-column" class="metabox-holder">

		<form id="nav-menu-meta" action="admin.php?page=UPCP-options&Action=Catalogue_Details&Selected=Catalogue&Catalogue_ID=<?php echo $_GET['Catalogue_ID']; ?>" class="nav-menu-meta" method="post" enctype="multipart/form-data">		
			<div id="side-sortables" class="meta-box-sortables">

<!-- Create a box with a form that users can add products to the catalogue with -->
<div id="add-page" class="postbox " >
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Products</span></h3>
<div class="inside">
	<div id="posttype-page" class="posttypediv">
		<ul id="posttype-page-tabs" class="posttype-tabs add-menu-item-tabs">
			<!--<li  class="tabs"><a class="nav-tab-link" href="/wp-admin/nav-menus.php?page-tab=most-recent#tabs-panel-posttype-page-most-recent">Most Recent</a></li>-->
			<li class="tabs"><!--<a class="nav-tab-link" href="/wp-admin/nav-menus.php?page-tab=all#page-all">-->View All<!--</a>--></li>
			<!--<li ><a class="nav-tab-link" href="/wp-admin/nav-menus.php?page-tab=search#tabs-panel-posttype-page-search">Search</a></li>-->
		</ul>

		<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
			<ul id="pagechecklist-most-recent" class="categorychecklist form-no-clear">
				<?php $Products = $wpdb->get_results("SELECT * FROM $items_table_name ORDER BY Item_Name"); 
							foreach ($Products as $Product) {
									echo "<li><label class='menu-item-title'><input type='checkbox' class='menu-item-checkbox' name='products[]' value='" . $Product->Item_ID ."' /> " . $Product->Item_Name . "</label></li>";
							}
				?>
			</ul>
		</div><!-- /.tabs-panel -->

		<div class="tabs-panel tabs-panel-inactive" id="tabs-panel-posttype-page-search">
						<!--<p class="quick-search-wrap">
				<input type="search" class="quick-search input-with-default-title" title="Search" value="" name="quick-search-posttype-page" />
				<img class="waiting" src="http://www.etoilewebdesign.com/wp-admin/images/wpspin_light.gif" alt="" />
				<input type="submit" name="submit" id="submit-quick-search-posttype-page" class="quick-search-submit button-secondary hide-if-js" value="Search"  />			</p>-->

			<ul id="page-search-checklist" class="list:page categorychecklist form-no-clear">
						</ul>
		</div><!-- /.tabs-panel -->

		<div id="page-all" class="tabs-panel tabs-panel-view-all tabs-panel-inactive">

		</div><!-- /.tabs-panel -->

		<p class="button-controls">
			<!--<span class="list-controls">
				<a href="/wp-admin/nav-menus.php?page-tab=all&#038;selectall=1#posttype-page" class="select-all">Select All</a>
			</span>-->

			<span class="add-to-menu">
				<span class="spinner"></span>
				<input type="submit" class="button-secondary submit-add-to-menu" value="Add to Menu" name="add-post-type-menu-item" id="submit-posttype-page" />
			</span>
		</p>

	</div><!-- /.posttypediv -->
	</div>
</div>

<!-- Create a box with a form that users can add categories to the catalogue with -->
<div id="add-page" class="postbox " >
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Categories</span></h3>
<div class="inside">
	<div id="posttype-page" class="posttypediv">
		<ul id="posttype-page-tabs" class="posttype-tabs add-menu-item-tabs">
			<!--<li  class="tabs"><a class="nav-tab-link" href="/wp-admin/nav-menus.php?page-tab=most-recent#tabs-panel-posttype-page-most-recent">Most Recent</a></li>-->
			<li class="tabs"><!--<a class="nav-tab-link" href="/wp-admin/nav-menus.php?page-tab=all#page-all">-->View All<!--</a>--></li>
			<!--<li ><a class="nav-tab-link" href="/wp-admin/nav-menus.php?page-tab=search#tabs-panel-posttype-page-search">Search</a></li>-->
		</ul>

		<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
			<ul id="pagechecklist-most-recent" class="categorychecklist form-no-clear">
				<?php $Categories = $wpdb->get_results("SELECT * FROM $categories_table_name ORDER BY Category_Name"); 
							foreach ($Categories as $Category) {
									echo "<li><label class='menu-item-title'><input type='checkbox' class='menu-item-checkbox' name='categories[]' value='" . $Category->Category_ID ."' /> " . $Category->Category_Name . "</label></li>";
							}
				?>
			</ul>
		</div><!-- /.tabs-panel -->

		<div class="tabs-panel tabs-panel-inactive" id="tabs-panel-posttype-page-search">
						<!--<p class="quick-search-wrap">
				<input type="search" class="quick-search input-with-default-title" title="Search" value="" name="quick-search-posttype-page" />
				<img class="waiting" src="http://www.etoilewebdesign.com/wp-admin/images/wpspin_light.gif" alt="" />
				<input type="submit" name="submit" id="submit-quick-search-posttype-page" class="quick-search-submit button-secondary hide-if-js" value="Search"  />			</p>-->

			<ul id="page-search-checklist" class="list:page categorychecklist form-no-clear">
						</ul>
		</div><!-- /.tabs-panel -->

		<div id="page-all" class="tabs-panel tabs-panel-view-all tabs-panel-inactive">

		</div><!-- /.tabs-panel -->

		<p class="button-controls">
			<!--<span class="list-controls">
				<a href="/wp-admin/nav-menus.php?page-tab=all&#038;selectall=1#posttype-page" class="select-all">Select All</a>
			</span>-->

			<span class="add-to-menu">
				<span class="spinner"></span>
				<input type="submit" class="button-secondary submit-add-to-menu" value="Add to Menu" name="add-post-type-menu-item" id="submit-posttype-page" />
			</span>
		</p>

	</div><!-- /.posttypediv -->
	</div>
</div>

</div>	</form>
</div><!-- /#menu-settings-column -->
			
<!-- Show the products and categories currently in the catalogue, give the user the
     option of deleting them or switching the order around -->
<div class="nav-tabs-wrapper">
			<div class="nav-tabs">
				<span class="nav-tab nav-tab-active"><?php echo $Catalogue->Catalogue_Name; ?></span>		
				</div>
			</div>

					
							<table class="wp-list-table widefat tags sorttable catalogue-list">
							<thead>
									<tr>
											<th>Delete?</th>
											<th>Catalogue Item Name</th>
											<th>Type of Catalogue Item</th>
									</tr>
							</thead>
							<tfoot>
									<tr>
											<th>Delete?</th>
											<th>Catalogue Item Name</th>
											<th>Type of Catalogue Item</th>
									</tr>
							</tfoot>
							<?php $CatalogueItems = $wpdb->get_results("SELECT * FROM $catalogue_items_table_name WHERE Catalogue_ID='" . $_GET['Catalogue_ID'] . "' ORDER BY Position");
										foreach ($CatalogueItems as $CatalogueItem) { 
												if (isset($CatalogueItem->Item_ID)) {$CatalogueItemType = "Product"; $CatalogueItemName = $wpdb->get_var("SELECT Item_Name from $items_table_name WHERE Item_ID=" . $CatalogueItem->Item_ID);}
												elseif (isset($CatalogueItem->Category_ID)) {$CatalogueItemType = "Category"; $CatalogueItemName = $wpdb->get_var("SELECT Category_Name from $categories_table_name WHERE Category_ID=" . $CatalogueItem->Category_ID);}
										?>
												<tr id="list-item-<?php echo $CatalogueItem->Catalogue_Item_ID; ?>" class="list-item">
																		<td class="item-delete"><a href="admin.php?page=UPCP-options&Action=DeleteCatalogueItem&DisplayPage=Catalogue&Catalogue_Item_ID=<?php echo $CatalogueItem->Catalogue_Item_ID; ?>">Delete</a></td>
																		<td class="item-title"><?php echo $CatalogueItemName; ?></td>
																		<td class="item-type"><?php echo $CatalogueItemType; ?></td>
												</tr>
										<?php } ?>
 						</table>					
	</div>

				</div>
		</div>