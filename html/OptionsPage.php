<?php 
		$Color = get_option("UPCP_Color_Scheme");
		$Links = get_option("UPCP_Product_Links");
		$Tags = get_option("UPCP_Tag_Logic");
		$ReadMore = get_option("UPCP_Read_More");
		$PrettyLinks = get_option("UPCP_Pretty_Links");
?>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div><h2>Settings</h2>

<form method="post" action="admin.php?page=UPCP-options&DisplayPage=Options&Action=UpdateOptions">
<table class="form-table">
<tr>
<th scope="row">Catalogue Color</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Catalogue Color</span></legend>
	<label title='Blue'><input type='radio' name='color_scheme' value='Blue' <?php if($Color == "Blue") {echo "checked='checked'";} ?> /> <span>Blue</span></label><br />
	<label title='Black'><input type='radio' name='color_scheme' value='Black' <?php if($Color == "Black") {echo "checked='checked'";} ?> /> <span>Black</span></label><br />
	<label title='Grey'><input type='radio' name='color_scheme' value='Grey' <?php if($Color == "Grey") {echo "checked='checked'";} ?> /> <span>Grey</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Product Links</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Product Links</span></legend>
	<label title='Same'><input type='radio' name='product_links' value='Same' <?php if($Links == "Same") {echo "checked='checked'";} ?> /> <span>Open in Same Window</span></label><br />
	<label title='New'><input type='radio' name='product_links' value='New' <?php if($Links == "New") {echo "checked='checked'";} ?> /> <span>Open in New Window</span></label><br />
	<!--<label title='External'><input type='radio' name='product_links' value='External' <?php if($Links == "External") {echo "checked='checked'";} ?> /> <span>Open External Links Only in New Window</span></label><br />-->
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Pretty Permalinks</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Use Pretty Permalinks for Product Pages</span></legend>
	<label title='Yes'><input type='radio' name='pretty_links' value='Yes' <?php if($PrettyLinks == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='pretty_links' value='No' <?php if($PrettyLinks == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Read More</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>"Read More" for Details view</span></legend>
	<label title='Yes'><input type='radio' name='read_more' value='Yes' <?php if($ReadMore == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='read_more' value='No' <?php if($ReadMore == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Tag Logic</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Tag Logic</span></legend>
	<label title='AND'><input type='radio' name='tag_logic' value='AND' <?php if($Tags == "AND") {echo "checked='checked'";} ?> /> <span>Selected Tags use 'AND'</span></label><br />
	<label title='OR'><input type='radio' name='tag_logic' value='OR' <?php if($Tags == "OR") {echo "checked='checked'";} ?> /> <span>Selected Tags use 'OR'</span></label><br />
	</fieldset>
</td>
</tr>
</table>


<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value="Save Changes"  /></p></form>

</div>