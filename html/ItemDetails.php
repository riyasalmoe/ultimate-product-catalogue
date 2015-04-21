
<!-- The details of a specific product for editing, based on the product ID -->
<?php if ($_GET['Selected'] == "Product" or $selected == "Product") { ?>
	
	<?php $Product = $wpdb->get_row($wpdb->prepare("SELECT * FROM $items_table_name WHERE Item_ID ='%d'", $_GET['Item_ID'])); ?>
	
	<div class="OptionTab ActiveTab" id="EditProduct">
		<div class="form-wrap ItemDetail">
			<a href="admin.php?page=UPCP-options&DisplayPage=Products" class="NoUnderline">&#171; <?php _e("Back", 'UPCP') ?></a>
			<h3>Edit  <?php echo $Product->Item_Name . " (ID:" . $Product->Item_ID . " )"; ?></h3>
			<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=UPCP_EditProduct&Update_Item=Product&Item_ID=<?php echo $Product->Item_ID ?>" class="validate" enctype="multipart/form-data">
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
				<th><label for="Item_Slug"><?php _e("Slug", 'UPCP') ?></label></th>
				<td><input name="Item_Slug" id="Item_Slug" type="text" value="<?php echo $Product->Item_Slug;?>" size="60" />
				<p><?php _e("The slug for your product if you use pretty permalinks.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Image"><?php _e("Image", 'UPCP') ?></label></th>
				<td><input id="Item_Image" type="text" size="36" name="Item_Image" value="<?php echo $Product->Item_Photo_URL;?>" /> 
				<input id="Item_Image_button" class="button" type="button" value="Upload Image" />
				<p><?php _e("The main image that will be displayed in association with this product. Current Image:", 'UPCP') ?><br/><img class="PreviewImage" height="100" width="100" src="<?php echo $Product->Item_Photo_URL;?>" /></p></td>
			</tr>
			<tr>
				<th><label for="Item_Price"><?php _e("Price", 'UPCP') ?></label></th>
				<td><input name="Item_Price" id="Item_Price" type="text" value="<?php echo $Product->Item_Price;?>" size="60" />
				<p><?php _e("The price of the product.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Description"><?php _e("Description", 'UPCP') ?></label></th>
				<td><?php 
					$settings = array( //'wpautotop' => false,
									'textarea_rows' => 6);																						
					wp_editor($Product->Item_Description, "Item_Description", $settings); ?>
				<p><?php _e("The description of the product. What is it and what makes it worth getting?", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_SEO_Description"><?php _e("SEO Description", 'UPCP') ?></label></th>
				<td><input name="Item_SEO_Description" id="Item_SEO_Description" type="text" value="<?php echo $Product->Item_SEO_Description;?>" size="60" />
				<p><?php _e("The description to use for this product in the SEO By Yoast meta description tag.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Link"><?php _e("Product Link", 'UPCP') ?></label></th>
				<td><input name="Item_Link" id="Item_Link" type="text" value="<?php echo $Product->Item_Link;?>" size="60" />
				<p><?php _e("A link that will replace the default product page. Useful if you participate in affiliate programs.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Display_Status"><?php _e("Display Status", 'UPCP') ?></label></th>
				<td><label title='Show'><input type='radio' name='Item_Display_Status' value='Show' <?php if($Product->Item_Display_Status == "Show" or $Product->Item_Display_Status == "") {echo "checked='checked'";} ?>/> <span>Show</span></label><br />
				<label title='Hide'><input type='radio' name='Item_Display_Status' value='Hide' <?php if($Product->Item_Display_Status == "Hide") {echo "checked='checked'";} ?>/> <span>Hide</span></label><br />
				<p><?php _e("Should this item be displayed if it's added to a catalogue?", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Category"><?php _e("Category:", 'UPCP') ?></label></th>
				<td><select name="Category_ID" id="Item_Category" onchange="UpdateSubCats();">
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
				<td><select name="SubCategory_ID" id="Item_SubCategory">
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
				<?php $TagGroupNames = $wpdb->get_results("SELECT * FROM $tag_groups_table_name ORDER BY Tag_Group_ID ASC");
				$NoTag = new stdClass(); //Create an object for the tags that don't have a group
				$NoTag->Tag_Group_ID = 0;
				$NoTag->Tag_Group_Name = "Not Assigned";
				$NoTag->Tag_Group_Order = 9999;
				$NoTag->Display_Tag_Group = "Yes";
				$TagGroupNames[] = $NoTag;?>
                <div class="Tag-Group-Holder" style="margin:10px auto;">
                <?php foreach($TagGroupNames as $TagGroupName){
					$Tags = $wpdb->get_results("SELECT * FROM $tags_table_name WHERE Tag_Group_ID=" . $TagGroupName->Tag_Group_ID . " ORDER BY Tag_Name ASC" );
					if(!empty($Tags)){?>
                    	<div style="padding:10px;" id="Tag-Group-<?php echo $TagGroupName->Tag_Group_ID; ?>">
                        <?php echo $TagGroupName->Tag_Group_Name."<br /><br />"; ?>
                        <?php foreach ($Tags as $Tag) {
                                $Is_Tagged = false;
                                foreach ($Tagged_Items as $Tagged_Item) {if ($Tagged_Item->Tag_ID == $Tag->Tag_ID) {$Is_Tagged = true;}}?>
                                <?php if($TagGroupName->Tag_Group_ID != "2"){ ?>
                                <input type="checkbox" class='upcp-tag-input' name="Tags[]" value="<?php echo $Tag->Tag_ID; ?>" id="Tag-<?php echo $Tag->Tag_Name; ?>" <?php if ($Is_Tagged) {echo " checked";} ?>>
                                <?php }else{ ?>
                                <input type="radio" class='upcp-tag-radio-input' name="Tags[]" value="<?php echo $Tag->Tag_ID; ?>" id="Tag-<?php echo $Tag->Tag_Name; ?>" <?php if ($Is_Tagged) {echo " checked"; $ESRB_Image = "http://www.atlus.com/sandbox/img/esrb/" . $Tag->Tag_Description . ".jpg";} ?>>
								<?php }?>
                                <?php echo $Tag->Tag_Name; ?></br>
                        <?php } ?>
                        </div><!-- end #Tag-Group-<?php echo $TagGroupName->Tag_Group_ID; ?> --><?php } } ?>
                </div><!-- end .Tag-Group-Holder -->
 				<p><?php _e("What tags should this product have? Tags help to describe the attributes of a product.", 'UPCP') ?></p></td>
 			</tr>
			
			<?php if ($Related_Products != "Manual") {$RelatedDisabled = "disabled";} ?>
			<?php $Related_Products_Array = explode(",", $Product->Item_Related_Products); ?>
			<tr>
				<th><label for="Item_Related_Products"><?php _e("Related Products", 'UPCP') ?></label></th>
				<td>
				<label title='Product ID'></label><input type='text' name='Item_Related_Products_1' value="<?php echo $Related_Products_Array['0']; ?>" <?php echo $RelatedDisabled; ?>/><br />
				<label title='Product ID'></label><input type='text' name='Item_Related_Products_2' value="<?php echo $Related_Products_Array['1']; ?>" <?php echo $RelatedDisabled; ?>/><br />
				<label title='Product ID'></label><input type='text' name='Item_Related_Products_3' value="<?php echo $Related_Products_Array['2']; ?>" <?php echo $RelatedDisabled; ?>/><br />
				<label title='Product ID'></label><input type='text' name='Item_Related_Products_4' value="<?php echo $Related_Products_Array['3']; ?>" <?php echo $RelatedDisabled; ?>/><br />
				<label title='Product ID'></label><input type='text' name='Item_Related_Products_5' value="<?php echo $Related_Products_Array['4']; ?>" <?php echo $RelatedDisabled; ?>/><br />
				<p><?php _e("What products are related to this one if set to manual related products? (premium feature, input product IDs)", 'UPCP') ?></p>
				</td>
			</tr>
			
			<?php if ($Next_Previous != "Manual") {$NextPreviousDisabled = "disabled";} ?>
			<tr>
				<th><label for="Item_Related_Products"><?php _e("Next/Previous Products", 'UPCP') ?></label></th>
				<td>
				<label title='Product ID'>Next Product ID:</label><input type='text' name='Item_Next_Product' value="<?php echo substr($Product->Item_Next_Previous, 0, strpos($Product->Item_Next_Previous, ',')); ?>" <?php echo $NextPreviousDisabled; ?>/><br />
				<label title='Product ID'>Previous Product ID:</label><input type='text' name='Item_Previous_Product' value="<?php echo substr($Product->Item_Next_Previous, strpos($Product->Item_Next_Previous, ',')+1); ?>" <?php echo $NextPreviousDisabled; ?>/><br />
				<p><?php _e("What products should be listed as the next/previous products? (premium feature, input product IDs)", 'UPCP') ?></p>
				</td>
			</tr>
			
			<?php
			
			$Sql = "SELECT * FROM $fields_table_name ";
			$Fields = $wpdb->get_results($Sql);
			$MetaValues = $wpdb->get_results($wpdb->prepare("SELECT Field_ID, Meta_Value FROM $fields_meta_table_name WHERE Item_ID=%d", $_GET['Item_ID']));
			foreach ($Fields as $Field) {
				$Value = "";
				if (is_array($MetaValues)) {
					foreach ($MetaValues as $Meta) {
						if ($Field->Field_ID == $Meta->Field_ID) {$Value = $Meta->Meta_Value;}
					}
				}
				$ReturnString .= "<tr><th><label for='" . $Field->Field_Name . "'>" . $Field->Field_Name . ":</label></th>";
				if ($Field->Field_Type == "text" or $Field->Field_Type == "mediumint") {
		  		  $ReturnString .= "<td><input name='" . $Field->Field_Name . "' id='upcp-input-" . $Field->Field_ID . "' class='upcp-text-input' type='text' value='" . $Value . "' /></td>";
				}
				elseif ($Field->Field_Type == "textarea") {
					$ReturnString .= "<td><textarea name='" . $Field->Field_Name . "' id='upcp-input-" . $Field->Field_ID . "' class='upcp-textarea'>" . $Value . "</textarea></td>";
				} 
				elseif ($Field->Field_Type == "select") { 
					$Options = explode(",", $Field->Field_Values);
					$ReturnString .= "<td><select name='" . $Field->Field_Name . "' id='upcp-input-" . $Field->Field_ID . "' class='upcp-select'>";
 					foreach ($Options as $Option) {
						$ReturnString .= "<option value='" . $Option . "' ";
						if (trim($Option) == trim($Value)) {$ReturnString .= "selected='selected'";}
						$ReturnString .= ">" . $Option . "</option>";
					}
					$ReturnString .= "</select></td>";
				} 
				elseif ($Field->Field_Type == "radio") {
					$Counter = 0;
					$Options = explode(",", $Field->Field_Values);
					$ReturnString .= "<td>";
					foreach ($Options as $Option) {
						if ($Counter != 0) {$ReturnString .= "<label class='radio'></label>";}
						$ReturnString .= "<input type='radio' name='" . $Field->Field_Name . "' value='" . $Option . "' class='upcp-radio' ";
						if (trim($Option) == trim($Value)) {$ReturnString .= "checked";}
						$ReturnString .= ">" . $Option;
						$Counter++;
					} 
					$ReturnString .= "</td>";
				} 
				elseif ($Field->Field_Type == "checkbox") {
					$Counter = 0;
					$Options = explode(",", $Field->Field_Values);
					$Values = explode(",", $Value);
					$ReturnString .= "<td>";
					foreach ($Options as $Option) {
						if ($Counter != 0) {$ReturnString .= "<label class='radio'></label>";}
						$ReturnString .= "<input type='checkbox' name='" . $Field->Field_Name . "[]' value='" . $Option . "' class='upcp-checkbox' ";
						if (in_array($Option, $Values)) {$ReturnString .= "checked";}
						$ReturnString .= ">" . $Option . "</br>";
						$Counter++;
					}
					$ReturnString .= "</td>";
				}
				elseif ($Field->Field_Type == "file") {
					$ReturnString .= "<td><input name='" . $Field->Field_Name . "' class='upcp-file-input' type='file' value='" . $Value . "' /><br/>Current Filename: " . $Value . "</td>";
				}
				elseif ($Field->Field_Type == "date") {
					$ReturnString .= "<td><input name='" . $Field->Field_Name . "' class='upcp-date-input' type='date' value='" . $Value . "' /></td>";
				} 
				elseif ($Field->Field_Type == "datetime") {
					$ReturnString .= "<td><input name='" . $Field->Field_Name . "' class='upcp-datetime-input' type='datetime-local' value='" . $Value . "' /></td>";
				}
			}
			echo $ReturnString;
			?>
			</table>
			<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"  /></p>
			</form>
		</div>
	
		<!-- A form to add additional images for a product, so that they can be viewed in the FancyBox popup -->
		<?php if ($Full_Version == "Yes") { ?>
       <hr /> 
        <div class="form-wrap ItemImages" style="margin:10px 0 20px;">
			<h3><?php _e("Add Product Images", 'UPCP') ?></h3>
			<form id="add-image" method="post" action="admin.php?page=UPCP-options&Action=UPCP_AddProductImage&DisplayPage=Products" class="validate" enctype="multipart/form-data">
				<input type="hidden" name="action" value="Add_Product_Image" />
				<input type="hidden" name="Item_ID" value="<?php echo $Product->Item_ID; ?>" />
				<?php wp_nonce_field(); ?>
				<?php wp_referer_field(); ?>
				<table class="form-table">
					<tr>
						<th><label for="Item_Image"><?php _e("Image", 'UPCP') ?></label></th>
						<td><input id="Item_Image_Addt" type="text" size="36" name="Item_Image[]" value="http://" /> 
						<input id="Item_Image_Addt_button" class="button" type="button" value="<?php _e('Upload Image', 'UPCP');?>" />
						<p><?php _e("The secondaries images that will be displayed.", 'UPCP') ?></p></td>
					</tr>
				</table>
				<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Add Image"  /></p>
			</form>
			<p><?php _e("Current Images:", 'UPCP') ?><p/>
<ul class="sorttable images-list" style="width:100%;">
	<?php $Images = $wpdb->get_results("SELECT * FROM $item_images_table_name WHERE Item_ID='" . $Product->Item_ID . "' ORDER BY Item_Image_Order");
	 		if(empty($Images)){ echo "<p>No Current Images are uploaded</p>"; }
			else{ foreach($Images as $Image){
				?><li id="list-item-<?php echo $Image->Item_Image_ID; ?>" class="list-item-image" style="position:relative;float:left;">
                    <div class="item-image">
                    <img class="PreviewImage upcp-sortable-preview" height="100" width="100" src="<?php echo $Image->Item_Image_URL;?>" />
                    <a href="admin.php?page=UPCP-options&Action=UPCP_DeleteProductImage&Item_Image_ID=<?php echo $Image->Item_Image_ID; ?>&Update_Item=Product&Item_ID=<?php echo $Product->Item_ID ?>&#add-image" class="confirm-delete"><?php _e("Delete", 'UPCP') ?></a>
                    </div>
				</li>
                <?php
			}
		}
	 ?>
</ul>
<div class="clear"></div>
</div>
<hr />
<div class="form-wrap ItemVideos" style="margin:10px 0 20px;">
    <h3><?php _e("Add Product Videos", 'UPCP') ?></h3>
    <form id="add-video" method="post" action="admin.php?page=UPCP-options&Action=UPCP_AddProductVideos&Update_Item=Product&Item_ID=<?php echo $Product->Item_ID ?>" class="validate" enctype="multipart/form-data">
        <input type="hidden" name="action" value="Add_Product_Videos" />
        <input type="hidden" name="Item_ID" value="<?php echo $Product->Item_ID; ?>" />
        <?php wp_nonce_field(); ?>
        <?php wp_referer_field(); ?>
        <!-- <p><?php _e("What type of video are you using?", 'UPCP') ?></p>
        <label title='YouTube'><input type='radio' name='Item_Video_Type' value='YouTube' /> <span>YouTube</span></label><br />  -->
        <table class="form-table">
            <tr>
                <th><label for="Item_Video"><?php _e("YouTube Video ID", 'UPCP') ?></label></th>
                <td>
                    <input type="text" size="36" name="Item_Video[]" value="" /><br />
                    <input type="text" size="36" name="Item_Video[]" value="" /><br />
                    <input type="text" size="36" name="Item_Video[]" value="" /><br />
                    <input type="text" size="36" name="Item_Video[]" value="" /><br />
                    <input type="text" size="36" name="Item_Video[]" value="" />
                </td>
            </tr>
         </table> 
         <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Add Video(s)"  /></p>  
    </form>
<!-- Show the videos in the current order associated with the product, give the user the
option of deleting them or switching the order around -->
<div class="nav-tabs-wrapper">
    <div id="Videos" class="nav-tabs">
    	<span class="nav-tab nav-tab-active">Videos</span>		
    </div><!-- end .nav-tabs -->
</div><!-- end .nav-tabs-wrapper -->

<table class="wp-list-table widefat tags sorttable videos-list" style="width:75%;">
    <thead>
    	<tr>
            <th class="video-delete"><?php _e("Delete?", 'UPCP') ?></th>
            <th class="video-image"><?php _e("Video Image", 'UPCP') ?></th>
            <th class="video-description"><?php _e("Video Description", 'UPCP') ?></th>
    	</tr>
    </thead>
    <tbody>
    <?php $ItemVideos = $wpdb->get_results($wpdb->prepare("SELECT * FROM $item_videos_table_name WHERE Item_ID='%d' ORDER BY Item_Video_Order ASC", $Product->Item_ID));
	if(empty($ItemVideos)){ echo "<div class='video-row list-item'><p>No current videos available<p/></div>"; }else{
    foreach ($ItemVideos as $ItemVideo) {
		$ItemVideoThumb = $ItemVideo->Item_Video_URL;
		/* Getting the title text from YouTube */
		$video_info = 'http://gdata.youtube.com/feeds/api/videos/'.$ItemVideoThumb;
		
		if($video_info != ""){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $video_info);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
			$response = curl_exec($ch);
			curl_close($ch);
			
			if ($response) {
				$xml   = new SimpleXMLElement($response);
				$ItemVideoDescription = (string) $xml->title;
			} else {
				$ItemVideoDescription = "No title available for this video";
			}
		}else{
			$ItemVideoDescription = $ItemVideoThumb;
		}
    ?>
    <tr id="video-item-<?php echo $ItemVideo->Item_Video_ID; ?>" class="video-item">
        <td class="video-delete"><a href="admin.php?page=UPCP-options&Action=UPCP_DeleteProductVideo&DisplayPage=Product&Item_Video_ID=<?php echo $ItemVideo->Item_Video_ID; ?>" class="confirm-delete"><?php _e("Delete", 'UPCP') ?></a></td>
        <td class="video-image"><?php echo "<img class='PreviewVideoImage' height='100' width='100' src='https://img.youtube.com/vi/" . $ItemVideoThumb . "/0.jpg' title='" . $ItemVideoThumb . "' />"; ?></td>
        <td class="video-description"><?php echo $ItemVideoDescription; ?></td>
    </tr>
    <?php }
	}?>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _e("Delete?", 'UPCP') ?></th>
            <th><?php _e("Video Image", 'UPCP') ?></th>
            <th><?php _e("Video Description", 'UPCP') ?></th>
        </tr>
    </tfoot>
</table>
</div>
		<?php } else { ?>
			<div class="Explanation-Div">
				<h2><?php _e("Full Version Required!", 'UPCP') ?></h2>
				<div class="upcp-full-version-explanation">
					<?php _e("The full version of the Ultimate Product Catalogue Plugin is required to additional product images.", "UPCP");?><a href="http://www.etoilewebdesign.com/ultimate-product-catalogue-plugin/"><?php _e(" Please upgrade to unlock this page!", 'UPCP'); ?></a>
				</div>
			</div>
		<?php } ?>
	</div>

<!-- The details of a specific category for editing, based on the product ID -->		
<?php } elseif ($_GET['Selected'] == "Category" or $selected == "Category") { ?>
		
		<?php $Category = $wpdb->get_row($wpdb->prepare("SELECT * FROM $categories_table_name WHERE Category_ID ='%d'", $_GET['Category_ID'])); ?>
		
		<div class="OptionTab ActiveTab" id="EditCategory">
				
				<div id="col-right">
				<div class="col-wrap">
				<div id="add-page" class="postbox metabox-holder" >
				<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span><?php _e("Products in Category", 'UPCP') ?></span></h3>
				<div class="inside">
				<div id="posttype-page" class="posttypediv">

				<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
				<ul id="pagechecklist-most-recent" class="categorychecklist form-no-clear">
				<?php 
					$Products = $wpdb->get_results($wpdb->prepare("SELECT Item_ID, Item_Name FROM $items_table_name WHERE Category_ID='%d'", $_GET['Category_ID']));
					foreach ($Products as $Product) {
						echo "<li><label class='menu-item-title'><a href='admin.php?page=UPCP-options&Action=UPCP_Item_Details&Selected=Product&Item_ID=" . $Product->Item_ID . "'>" . $Product->Item_Name . "</a></label></li>";
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
					<h3>Edit <?php echo $Category->Category_Name;echo" (ID:";echo $Category->Category_ID;echo " )";?></h3>
					<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=UPCP_EditCategory&DisplayPage=Categories" class="validate" enctype="multipart/form-data">
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
<?php } elseif ($_GET['Selected'] == "Catalogue" or $selected == "Catalogue") { ?>
		
		<?php include "CatalogueDetails.php"; ?>

<!-- The details of a specific sub-category for editing, based on the product ID -->		
<?php } elseif ($_GET['Selected'] == "SubCategory" or $selected == "SubCategory") { ?>
		
		<?php $SubCategory = $wpdb->get_row($wpdb->prepare("SELECT * FROM $subcategories_table_name WHERE SubCategory_ID ='%d'", $_GET['SubCategory_ID'])); ?>
		
		<div class="OptionTab ActiveTab" id="EditSubCategory">
				
				<div id="col-right">
				<div class="col-wrap">
				<div id="add-page" class="postbox metabox-holder" >
				<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span><?php _e("Products in Sub-Category", 'UPCP') ?></span></h3>
				<div class="inside">
				<div id="posttype-page" class="posttypediv">

				<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
				<ul id="pagechecklist-most-recent" class="categorychecklist form-no-clear">
				<?php $Products = $wpdb->get_results($wpdb->prepare("SELECT Item_ID, Item_Name FROM $items_table_name WHERE SubCategory_ID='%d'", $_GET['SubCategory_ID']));
							foreach ($Products as $Product) {
									echo "<li><label class='menu-item-title'><a href='admin.php?page=UPCP-options&Action=UPCP_Item_Details&Selected=Product&Item_ID=" . $Product->Item_ID . "'>" . $Product->Item_Name . "</a></label></li>";
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
					<h3>Edit  <?php echo $SubCategory->SubCategory_Name; echo "( ID: "; echo $SubCategory->SubCategory_ID; echo " )"; ?></h3>
					<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=UPCP_EditSubCategory&Update_Item=SubCategory&Category_ID=<?php echo $SubCategory->SubCategory_ID ?>" class="validate" enctype="multipart/form-data">
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

					<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes', 'UPCP') ?>"  /></p>
					</form>
				</div>
				</div>
				</div>
		</div>
		
<!-- The details of a specific tag for editing, based on the product ID -->		
<?php } elseif ($_GET['Selected'] == "Tag" or $selected == "Tag") { ?>
		
		<?php $Tag = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tags_table_name WHERE Tag_ID ='%d'", $_GET['Tag_ID'])); ?>
		
		<div class="OptionTab ActiveTab" id="EditTag">
				
				<div id="col-right">
				<div class="col-wrap">
				<div id="add-page" class="postbox metabox-holder" >
				<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span><?php _e("Products in Tag", 'UPCP') ?></span></h3>
				<div class="inside">
				<div id="posttype-page" class="posttypediv">

				<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
				<ul id="pagechecklist-most-recent" class="categorychecklist form-no-clear">
				<?php $Tagged_Items = $wpdb->get_results($wpdb->prepare("SELECT Item_ID FROM $tagged_items_table_name WHERE Tag_ID='%d'", $_GET['Tag_ID']));
							foreach ($Tagged_Items as $Tagged_Item) {
									$Product = $wpdb->get_row("SELECT Item_ID, Item_Name FROM $items_table_name WHERE Item_ID=" . $Tagged_Item->Item_ID);
									echo "<li><label class='menu-item-title'><a href='admin.php?page=UPCP-options&Action=UPCP_Item_Details&Selected=Product&Item_ID=" . $Product->Item_ID . "'>" . $Product->Item_Name . "</a></label></li>";
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
						<h3>Edit  <?php echo $Tag->Tag_Name; echo"( ID:"; echo $Tag->Tag_ID; echo" )";?></h3>
						<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=UPCP_EditTag&Update_Item=Tag&Tag_ID=<?php echo $Tag->Tag_ID; ?>" class="validate" enctype="multipart/form-data">
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

						<div class='form-field'>
                        	<label for="Tag_Group"><?php _e("Tag Group:", 'UPCP') ?></label>
                            <select name="Tag_Group_ID" id="Tag_Group_ID">
                            <option value="0">Uncategorized Tags</option>
                            <?php 
                            	if ($Tag->Tag_Group_ID != "") {
                                    $TagGroups = $wpdb->get_results("SELECT * FROM $tag_groups_table_name ORDER BY Tag_Group_Order");
                                    $TaggedItem = $wpdb->get_results("SELECT * FROM $tagged_item_table_name");
                                    	foreach ($TagGroups as $TagGroup) {
                                        	if($TagGroup->Tag_Group_ID != 0){
                                        	    echo "<option value='" . $TagGroup->Tag_Group_ID . "' ";
                                        	    if ($TagGroup->Tag_Group_ID == $Tag->Tag_Group_ID) {echo "selected='selected'";}
                                        	    echo " >" . $TagGroup->Tag_Group_Name . "</option>";
                                        	} 
                                    	}
                                } 
                            ?>
                            </select>
						</div>

						<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes', 'UPCP') ?>"  /></p>
						</form>
				</div>
				</div>
				</div>
		</div>

<!-- The details for editing a specific tag group -->        
<?php } elseif ($_GET['Selected'] == "Tag_Group" or $selected == "Tag_Group") { ?>
		
		<?php $Tag_Group = $wpdb->get_row($wpdb->prepare("SELECT * FROM $tag_groups_table_name WHERE Tag_Group_ID ='%d'", $_GET['Tag_Group_ID'])); ?>

		<div class="OptionTab ActiveTab" id="EditTag">
			<div id="col-right">
				<div class="col-wrap">
					<div id="add-page" class="postbox metabox-holder" >
					<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span><?php _e("Tags in Tag Group", 'UPCP') ?></span></h3>
						<div class="inside">
							<div id="posttype-page" class="posttypediv">

								<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
									<ul id="pagechecklist-most-recent" class="categorychecklist form-no-clear">
									<?php 
										$Tags = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tags_table_name WHERE Tag_Group_ID='%d'", $_GET['Tag_Group_ID']));
										foreach ($Tags as $Tag) {
											echo "<li><label class='tag-title'><a href='admin.php?page=UPCP-options&Action=UPCP_Tag_Details&Selected=Tag&Tag_ID=" . $Tag->Tag_ID . "'>" . $Tag->Tag_Name . "</a></label></li>";
										}
									?>
									</ul>
								</div><!-- /.tabs-panel -->
							</div><!-- /.posttypediv -->
						</div>
					</div>
			</div>
		</div><!-- col-right -->

		<div class="form-wrap TagGroupDetail">
        	<a href="admin.php?page=UPCP-options&DisplayPage=Tags" class="NoUnderline">&#171; <?php _e("Back", 'UPCP') ?></a>
			<h3>Edit  <?php echo $Tag_Group->Tag_Group_Name; echo"( ID:"; echo $Tag_Group->Tag_Group_ID; echo" )";?></h3>
			<form id="edittaggroup" method="post" action="admin.php?page=UPCP-options&Action=UPCP_EditTagGroup&Update_Item=Tag_Group&Tag_Group_ID=<?php echo $Tag_Group->Tag_Group_ID; ?>" class="validate" enctype="multipart/form-data">
			<input type="hidden" name="action" value="Edit_Tag_Group" />
			<input type="hidden" name="Tag_Group_ID" value="<?php echo $Tag_Group->Tag_Group_ID; ?>" />
 			<?php wp_nonce_field(); ?>
 			<?php wp_referer_field(); ?>

 			<div class='form-field'>
				<label for="Tag_Group_Name"><?php _e("Tag Group Name", 'UPCP') ?></label>
				<input name="Tag_Group_Name" id="Tag_Group_Name" type="text" value="<?php echo $Tag_Group->Tag_Group_Name;?>" size="60" />
				<p><?php _e("The name of the group of tags that have similar properties.", 'UPCP') ?></p>
			</div>

			<div class='form-field'>
				<label for="Tag_Group_Description"><?php _e("Description", 'UPCP') ?></label>
				<textarea name="Tag_Group_Description" id="Tag_Group_Description" rows="5" cols="40"><?php echo $Tag_Group->Tag_Group_Description;?></textarea>
				<p><?php _e("The description of the tag group. What tags should be included in this group?", 'UPCP') ?></p>
 			</div>

 			<label for="Tag_Group_Display_Status"><?php _e("Display Tag Group", 'UPCP') ?></label>
            <label title='Yes'><input type='radio' name='Display_Tag_Group' value='Yes' <?php if($Tag_Group->Display_Tag_Group == "Yes") {echo "checked='checked'";} ?> /> <span>Show</span></label>
            <label title='No'><input type='radio' name='Display_Tag_Group' value='No' <?php if($Tag_Group->Display_Tag_Group == "No") {echo "checked='checked'";} ?> /> <span>Hide</span></label>
            <p><?php _e("Should this tag group be displayed on the page?", 'UPCP') ?></p>
            <br />
 			<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes', 'UPCP') ?>"  /></p>
 			</form>
 		</div>


<!-- The details for editing one specific optional image -->
<?php } elseif ($_GET['Selected'] == "Item_Optional_Image" or $selected == "Item_Optional_Image") { ?>
		<?php $Item_Optional_Image = $wpdb->get_row($wpdb->prepare("SELECT * FROM $item_optional_images_table_name WHERE Item_Optional_Image_ID ='%d'", $_GET['Item_Optional_Image_ID'])); ?>
		<div class="OptionTab ActiveTab" id="EditOptionalImage">
			<div id="col-left">
				<div class="col-wrap">
					<div class="form-wrap OptionalImageDetail">
                        <a href="admin.php?page=UPCP-options&Update_Item=Product&Item_ID=<?php echo $Item_Optional_Image->Item_ID ?>" class="NoUnderline">&#171; <?php _e("Back", 'UPCP') ?></a>
						<h3>Edit  <?php echo $Item_Optional_Image->Item_Optional_Image_Name; echo"( ID:"; echo $Item_Optional_Image->Item_Optional_Image_ID; echo" )";?></h3><form id="add-optional-image" method="post" action="admin.php?page=UPCP-options&Action=UPCP_AddOptionalImage&Update_Item=Item_Optional_Image&Item_Optional_Image_ID=<?php echo $Item_Optional_Image->Item_Optional_Image_ID; ?>" class="validate" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="Edit_Optional_Image" />
                        <input type="hidden" name="Item_ID" value="<?php echo $Product->Item_ID; ?>" />
                        <?php wp_nonce_field(); ?>
                        <?php wp_referer_field(); ?>
                        <label for="Item_Optional_Image"><?php _e("Optional Image", 'UPCP') ?></label>
                        <input id="Item_Optional_Image" type="text" size="36" name="Item_Optional_Image" value="<?php echo $Item_Optional_Image->Item_Optional_Image_URL ?>" /> 
                        <input id="Item_Optional_Image_button" class="button" type="button" value="Upload Image" />
                        <p><?php _e("Optional image that you would like to edit.<br><br>Current image:<br>", 'UPCP') ?></p>
                        <div class="optional-image-holder" style="width:200px;position:relative;margin-bottom:20px;"><img src="<?php echo $Item_Optional_Image->Item_Optional_Image_URL ?>" style="width:100%;height:auto;" /></div>
                        <label for="Item_Optional_Image_Name"><?php _e("Optional Image Name", 'UPCP') ?></label>
                        <input id="Item_Optional_Image_Name" type="text" size="36" name="Item_Optional_Image_Name" value="<?php echo $Item_Optional_Image->Item_Optional_Image_Name ?>" />
                        <p><?php _e("Edit the name of the image", 'UPCP') ?></p>
                        <div class="form-field-small-buttons">
                            <label for="Item_Optional_Image_Description"><?php _e("Opitonal Image Description", 'UPCP') ?></label>
                            <?php $settings = array( //'wpautotop' => false, 
                            'textarea_rows' => 6);																						
                            wp_editor($Item_Optional_Image->Item_Optional_Image_Description, "Item_Optional_Image_Description", $settings); ?>
                            <p><?php _e("Edit the additional text to describe the image.", 'UPCP') ?></p>
                        </div><!-- end .form-field-small-buttons -->
                        <label for="Item_Display_Status"><?php _e("Display Status", 'UPCP') ?></label>
                        <label title='Yes'><input type='radio' name='Display_Image' value='Yes' <?php if($Item_Optional_Image->Display_Image == "Yes"){ echo "checked='checked'";  } ?> /> <span>Show</span></label><br />
                        <label title='No'><input type='radio' name='Display_Image' value='No' <?php if($Item_Optional_Image->Display_Image == "No"){ echo "checked='checked'"; } ?> /> <span>Hide</span></label><br />
                        <p><?php _e("Should this image be displayed on the page?", 'UPCP') ?></p>
                        <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Edit Optional Image"  /></p>
        			</form>
				</div><!-- end .TagGroupDetail -->
			</div><!-- end .col-wrap -->
		</div><!-- end .col-left -->
	</div><!-- end .OptionTab -->

<?php } elseif ($_GET['Selected'] == "CustomField") { ?>
		
		<?php $Field = $wpdb->get_row($wpdb->prepare("SELECT * FROM $fields_table_name WHERE Field_ID ='%d'", $_GET['Field_ID'])); ?>
		
		<div class="OptionTab ActiveTab" id="EditCustomField">
				
				<div id="col-left">
				<div class="col-wrap">
				<div class="form-wrap TagDetail">
						<a href="admin.php?page=UPCP-options&DisplayPage=Tags" class="NoUnderline">&#171; <?php _e("Back", 'UPCP') ?></a>
						<h3>Edit <?php echo $Field->Field_Name; echo "( ID: "; echo $Field->Field_ID; echo" )"; ?></h3>
						<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=UPCP_EditCustomField&DisplayPage=CustomFields" class="validate" enctype="multipart/form-data">
						<input type="hidden" name="action" value="Edit_Custom_Field" />
						<input type="hidden" name="Field_ID" value="<?php echo $Field->Field_ID; ?>" />
						<?php wp_nonce_field(); ?>
						<?php wp_referer_field(); ?>
						<div class="form-field form-required">
								<label for="Field_Name"><?php _e("Name", 'UPCP') ?></label>
								<input name="Field_Name" id="Field_Name" type="text" value="<?php echo $Field->Field_Name;?>" size="60" />
								<p><?php _e("The name of the field you will see.", 'UPCP') ?></p>
						</div>
						<div class="form-field form-required">
								<label for="Field_Slug"><?php _e("Slug", 'UPCP') ?></label>
								<input name="Field_Slug" id="Field_Slug" type="text" value="<?php echo $Field->Field_Slug;?>" size="60" />
								<p><?php _e("An all-lowercase name that will be used to insert the field.", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Type"><?php _e("Type", 'UPCP') ?></label>
								<select name="Field_Type" id="Field_Type">
										<option value='text' <?php if ($Field->Field_Type == "text") {echo "selected=selected";} ?>><?php _e("Short Text", 'UPCP') ?></option>
										<option value='mediumint' <?php if ($Field->Field_Type == "mediumint") {echo "selected=selected";} ?>><?php _e("Integer", 'UPCP') ?></option>
										<option value='select' <?php if ($Field->Field_Type == "select") {echo "selected=selected";} ?>><?php _e("Select Box", 'UPCP') ?></option>
										<option value='radio' <?php if ($Field->Field_Type == "radio") {echo "selected=selected";} ?>><?php _e("Radio Button", 'UPCP') ?></option>
										<option value='checkbox' <?php if ($Field->Field_Type == "checkbox") {echo "selected=selected";} ?>><?php _e("Checkbox", 'UPCP') ?></option>
										<option value='textarea' <?php if ($Field->Field_Type == "textarea") {echo "selected=selected";} ?>><?php _e("Text Area", 'UPCP') ?></option>
										<option value='file' <?php if ($Field->Field_Type == "file") {echo "selected=selected";} ?>><?php _e("File", 'UPCP') ?></option>
										<option value='date' <?php if ($Field->Field_Type == "date") {echo "selected=selected";} ?>><?php _e("Date", 'UPCP') ?></option>
										<option value='datetime' <?php if ($Field->Field_Type == "datetime") {echo "selected=selected";} ?>><?php _e("Date/Time", 'UPCP') ?></option>
								</select>
								<p><?php _e("The input method for the field and type of data that the field will hold.", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Description"><?php _e("Description", 'UPCP') ?></label>
								<textarea name="Field_Description" id="Field_Description" rows="2" cols="40"><?php echo $Field->Field_Description;?></textarea>
								<p><?php _e("The description of the field, which you will see as the instruction for the field.", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Values"><?php _e("Input Values", 'UPCP') ?></label>
								<input name="Field_Values" id="Field_Values" type="text" value="<?php echo $Field->Field_Values;?>"  size="60" />
								<p><?php _e("A comma-separated list of acceptable input values for this field. These values will be the options for select, checkbox, and radio inputs. All values will be accepted if left blank.", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Displays"><?php _e("Display?", 'UPCP') ?></label>
								<select name="Field_Displays" id="Field_Displays">
										<option value='none' <?php if ($Field->Field_Displays == "none") {echo "selected=selected";} ?>><?php _e("None", 'UPCP') ?></option>
										<option value='thumbs' <?php if ($Field->Field_Displays == "thumbs") {echo "selected=selected";} ?>><?php _e("Thumbnail View", 'UPCP') ?></option>
										<option value='details' <?php if ($Field->Field_Displays == "details") {echo "selected=selected";} ?>><?php _e("Details View", 'UPCP') ?></option>
										<option value='both' <?php if ($Field->Field_Displays == "both") {echo "selected=selected";} ?>><?php _e("Both", 'UPCP') ?></option>
								</select>
								<p><?php _e("Should this field be displayed in any of the main catalogue pages?", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Searchable"><?php _e("Searchable?", 'UPCP') ?></label>
								<select name="Field_Searchable" id="Field_Searchable">
										<option value='No' <?php if ($Field->Field_Searchable == "No") {echo "selected=selected";} ?>><?php _e("No", 'UPCP') ?></option>
										<option value='Yes' <?php if ($Field->Field_Searchable == "Yes") {echo "selected=selected";} ?>><?php _e("Yes", 'UPCP') ?></option>
								</select>
								<p><?php _e("Should this field be searchable in your catalogues?", 'UPCP') ?></p>
						</div>

						<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes', 'UPCP') ?>"  /></p>
						</form>
				</div>
				</div>
				</div>
		</div>
		
<?php } ?>	