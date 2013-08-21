<!-- Upgrade to pro link box -->
<div id="side-sortables" class="metabox-holder ">
<div id="upcp_pro" class="postbox " >
		<div class="handlediv" title="Click to toggle"></div><h3 class='hndle'><span>Pro Version</span></h3>
		<div class="inside">
				<ul><!--<li>Upgrade to the full version to take advantage of all the available features of the Ultimate Product Catalogue for Wordpress!</li>-->
				<li>Thanks for being an early adopter! Anyone who installs our plugin before September 30th receives the pro version free of charge!</li></ul>
				<?php if ($Full_Version != "Yes") { ?>
				<div class="full-version-form-div">
						<form action="admin.php?page=UPCP-options" method="post">
								<div class="form-field form-required">
										<label for="Catalogue_Name">Product Key</label>
										<input name="Key" type="text" value="" size="40" />
								</div>							
								<input type="submit" name="Upgrade_To_Full" value="Upgrade">
						</form>
				</div>
				<?php } ?>
		</div>
</div>
</div>

<!-- List of the catalogues which have already been created -->
<div id="col-right">
<div class="col-wrap">

<?php wp_nonce_field(); ?>
<?php wp_referer_field(); ?>

<?php 
			if (isset($_GET['Page'])) {$Page = $_GET['Page'];}
			else {$Page = 1;}
			
			$Sql = "SELECT * FROM $catalogues_table_name ";
				if (isset($_GET['OrderBy'])) {$Sql .= "ORDER BY " . $_GET['OrderBy'] . " " . $_GET['Order'] . " ";}
				else {$Sql .= "ORDER BY Catalogue_Name ";}
				$Sql .= "LIMIT " . ($Page - 1)*20 . ",20";
				$myrows = $wpdb->get_results($Sql);
				$num_rows = $wpdb->num_rows; 
				$Number_of_Pages = ceil($wpdb->num_rows/20);
				$Current_Page_With_Order_By = "admin.php?page=UPCP-options&DisplayPage=Catalogues";
				if (isset($_GET['OrderBy'])) {$Current_Page_With_Order_By .= "&OrderBy=" .$_GET['OrderBy'] . "&Order=" . $_GET['Order'];}?>

<form action="admin.php?page=UPCP-options&Action=MassDeleteCatalogues" method="post">    
<div class="tablenav top">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'>Bulk Actions</option>
						<option value='delete'>Delete</option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="Apply"  />
		</div>
		<div class='tablenav-pages <?php if ($Number_of_Pages == 1) {echo "one-page";} ?>'>
				<span class="displaying-num"><?php echo $wpdb->num_rows; ?> items</span>
				<span class='pagination-links'>
						<a class='first-page <?php if ($Page == 1) {echo "disabled";} ?>' title='Go to the first page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=1'>&laquo;</a>
						<a class='prev-page <?php if ($Page < 2) {echo "disabled";} ?>' title='Go to the previous page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page-1;?>'>&lsaquo;</a>
						<span class="paging-input"><?php echo $Page; ?> of <span class='total-pages'><?php echo $Number_of_Pages; ?></span></span>
						<a class='next-page <?php if ($Page >= $Number_Of_Pages) {echo "disabled";} ?>' title='Go to the next page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page+1;?>'>&rsaquo;</a>
						<a class='last-page <?php if ($Page == $Number_of_Pages) {echo "disabled";} ?>' title='Go to the last page' href='<?php echo $Current_Page_With_Order_By . "&Page=" . $Number_of_Pages; ?>'>&raquo;</a>
				</span>
		</div>
</div>

<table class="wp-list-table widefat fixed tags sorttable" cellspacing="0">
		<thead>
				<tr>
						<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
								<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
										<?php if ($_GET['OrderBy'] == "Catalogue_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Name&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Name&Order=ASC'>";} ?>
											  <span>Name</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='description' class='manage-column column-description sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "Catalogue_Description" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Description&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Description&Order=ASC'>";} ?>
											  <span>Description</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "Catalogue_Item_Count" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Item_Count&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Item_Count&Order=ASC'>";} ?>
											  <span>Products in Catalogue</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
				</tr>
		</thead>

		<tfoot>
				<tr>
						<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
								<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
										<?php if ($_GET['OrderBy'] == "Catalogue_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Name&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Name&Order=ASC'>";} ?>
											  <span>Name</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='description' class='manage-column column-description sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "Catalogue_Description" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Description&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Description&Order=ASC'>";} ?>
											  <span>Description</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "Catalogue_Item_Count" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Item_Count&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Item_Count&Order=ASC'>";} ?>
											  <span>Products in Catalogue</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
				</tr>
		</tfoot>

	<tbody id="the-list" class='list:tag'>
		
		 <?php
				if ($myrows) { 
	  			  foreach ($myrows as $Catalogue) {
								echo "<tr id='Item" . $Catalogue->Catalogue_ID ."'>";
								echo "<th scope='row' class='check-column'>";
								echo "<input type='checkbox' name='Catalogues_Bulk[]' value='" . $Catalogue->Catalogue_ID ."' />";
								echo "</th>";
								echo "<td class='name column-name'>";
								echo "<strong>";
								echo "<a class='row-title' href='admin.php?page=UPCP-options&Action=Catalogue_Details&Selected=Catalogue&Catalogue_ID=" . $Catalogue->Catalogue_ID ."' title='Edit " . $Catalogue->Catalogue_Name . "'>" . $Catalogue->Catalogue_Name . "</a></strong>";
								echo "<br />";
								echo "<div class='row-actions'>";
								/*echo "<span class='edit'>";
								echo "<a href='admin.php?page=UPCP-options&Action=Catalogue_Details&Selected=Catalogue&Catalogue_ID=" . $Catalogue->Catalogue_ID ."'>Edit</a>";
		 						echo " | </span>";*/
								echo "<span class='delete'>";
								echo "<a class='delete-tag' href='admin.php?page=UPCP-options&Action=DeleteCatalogue&DisplayPage=Catalogues&Catalogue_ID=" . $Catalogue->Catalogue_ID ."'>Delete</a>";
		 						echo "</span>";
								echo "</div>";
								echo "<div class='hidden' id='inline_" . $Catalogue->Catalogue_ID ."'>";
								echo "<div class='name'>" . $Catalogue->Catalogue_Name . "</div>";
								echo "</div>";
								echo "</td>";
								echo "<td class='description column-description'>" . $Catalogue->Catalogue_Description . "</td>";
								echo "<td class='description column-items-count'>" . $Catalogue->Catalogue_Item_Count . "</td>";
								echo "</tr>";
						}
				}
		?>

	</tbody>
</table>

<div class="tablenav bottom">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'>Bulk Actions</option>
						<option value='delete'>Delete</option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="Apply"  />
		</div>
		<div class='tablenav-pages <?php if ($Number_of_Pages == 1) {echo "one-page";} ?>'>
				<span class="displaying-num"><?php echo $wpdb->num_rows; ?> items</span>
				<span class='pagination-links'>
						<a class='first-page <?php if ($Page == 1) {echo "disabled";} ?>' title='Go to the first page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=1'>&laquo;</a>
						<a class='prev-page <?php if ($Page < 2) {echo "disabled";} ?>' title='Go to the previous page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page-1;?>'>&lsaquo;</a>
						<span class="paging-input"><?php echo $Page; ?> of <span class='total-pages'><?php echo $Number_of_Pages; ?></span></span>
						<a class='next-page <?php if ($Page >= $Number_Of_Pages) {echo "disabled";} ?>' title='Go to the next page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page+1;?>'>&rsaquo;</a>
						<a class='last-page <?php if ($Page == $Number_of_Pages) {echo "disabled";} ?>' title='Go to the last page' href='<?php echo $Current_Page_With_Order_By . "&Page=" . $Number_of_Pages; ?>'>&raquo;</a>
				</span>
		</div>
		<br class="clear" />
</div>
</form>

<br class="clear" />
</div>
</div>

<!-- A list of the products in the catalogue -->
<div id="col-left">
<div class="col-wrap">
	<div id="dashboard-products-column" class="metabox-holder">	
			<div id="side-sortables" class="meta-box-sortables">

<div id="add-page" class="postbox " >
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Popular Products</span></h3>
<div class="inside">
	<div id="posttype-page" class="posttypediv">
		<ul id="posttype-page-tabs" class="posttype-tabs add-menu-item-tabs">
			<!--<li  class="tabs"><a class="nav-tab-link" href="/wp-admin/nav-menus.php?page-tab=most-recent#tabs-panel-posttype-page-most-recent">Most Recent</a></li>-->
			<li  class="tabs"><!--<a class="nav-tab-link" href="/wp-admin/nav-menus.php?page-tab=all#page-all">-->View All<!--</a>--></li>
			<!--<li ><a class="nav-tab-link" href="/wp-admin/nav-menus.php?page-tab=search#tabs-panel-posttype-page-search">Search</a></li>-->
		</ul>

		<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
			<ul id="pagechecklist-most-recent" class="categorychecklist form-no-clear">
				<?php //$Products = $wpdb->get_results("SELECT Item_ID, Item_Name FROM $items_table_name ORDER BY Item_Views DESC"); 
							$Products = $wpdb->get_results("SELECT Item_ID, Item_Name FROM $items_table_name"); 
							foreach ($Products as $Product) {
									echo "<li><label class='menu-item-title'><a href='/wp-admin/admin.php?page=UPCP-options&Action=Item_Details&Selected=Product&Item_ID=" . $Product->Item_ID ."'> " . $Product->Item_Name . "</a></label></li>";
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

			<!--<span class="add-to-menu">
				<span class="spinner"></span>
				<input type="submit" class="button-secondary submit-add-to-menu" value="Add to Menu" name="add-post-type-menu-item" id="submit-posttype-page" />
			</span>-->
		</p>

	</div><!-- /.posttypediv -->
	</div>
</div>

</div>
</div>
</div>
</div>
