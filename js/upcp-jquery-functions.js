/*function CategorySort(Format, Checkbox, CheckboxValue) {
		
		Counter = 0;
		Cleared = true;
		
		if (Format == "List") {SeparateEvery = 1;}
		else {SeparateEvery = 3;}
		
		if (jQuery(Checkbox).prop('checked')) {
				jQuery('.clear').each(function() {jQuery(this).remove();});
				jQuery('.prod-cat-category-jquery').each(function() {
						if (jQuery(this).text() != CheckboxValue) {jQuery(this).parent().addClass('Hide-Item');}
						else {Counter++;}
						if (Counter % SeparateEvery == 0) {jQuery("<div class='clear'></div>").insertAfter(jQuery(this).parent());}
						else {Cleared = true;}
				});
		}
		else {
				jQuery('.clear').each(function() {jQuery(this).remove();});
				jQuery('.prod-cat-category-jquery').each(function() {
						jQuery(this).parent().removeClass('Hide-Item');
						Counter++;
						if (Counter % 3 == 0) {jQuery("<div class='clear'></div>").insertAfter(jQuery(this).parent());}
						else {Cleared = true;}
				});
		}
}*/

/* Called whenever a new category, sub-category or tag is selected from the catalogue
sidebar; it is used to only display the items which meet the user's search criteria */
/*function CategorySort(Format) {
		
		Cleared = true;
		Fail = false;
		var CheckedBoxes = [];
		
		jQuery('.upcp-clear').each(function() {jQuery(this).remove();});
		jQuery('.jquery-prod-cat-value').each(function() {if (jQuery(this).prop('checked')) {CheckedBoxes.push(jQuery(this).val());}});
		jQuery('.prod-cat-category-jquery').each(function(indexOne, firstValue) {
				Fail = false;
				jQuery.each(CheckedBoxes, function(indexTwo, secondValue) {if (jQuery(firstValue).text().indexOf(" "+secondValue+",") != 0) {Fail = true;}}); //Check
				if (Fail == true) {jQuery(this).parent().addClass('Hide-Item');}
				else {jQuery(this).parent().removeClass('Hide-Item'); Counter++;}
		});
}*/

function UPCP_Filer_Results() {
		
		Fail = false;
		var CatBoxValues = [];
		var SubBoxValues = [];
		var TagBoxValues = [];
		
		jQuery('.upcp-clear').each(function() {jQuery(this).remove();});
		TargetProdName = jQuery('.jquery-prod-name-text').val();
		jQuery('.jquery-prod-cat-value').each(function() {if (jQuery(this).prop('checked')) {CatBoxValues.push(jQuery(this).val());}});
		jQuery('.jquery-prod-sub-cat-value').each(function() {if (jQuery(this).prop('checked')) {SubBoxValues.push(jQuery(this).val());}});
		jQuery('.jquery-prod-tag-value').each(function() {if (jQuery(this).prop('checked')) {TagBoxValues.push(jQuery(this).val());}});
		jQuery('.prod-cat-item').each(function() {
				Fail = false;
				Categories = jQuery(this).children(".prod-cat-category-jquery").text();
				SubCats = jQuery(this).children(".prod-cat-subcategory-jquery").text();
				Tags = jQuery(this).children(".prod-cat-tag-jquery").text();
				ProdName = jQuery(this).children('.prod-cat-title').text();
				if (TargetProdName != "") {if (ProdName.indexOf(TargetProdName) == -1) {Fail = true;}}
				jQuery.each(CatBoxValues, function(indexTwo, secondValue) {if (Categories.indexOf(" "+secondValue+",") == -1) {Fail = true;}});
				jQuery.each(SubBoxValues, function(indexTwo, secondValue) {if (SubCats.indexOf(" "+secondValue+",") == -1) {Fail = true;}});
				jQuery.each(TagBoxValues, function(indexTwo, secondValue) {if (Tags.indexOf(" "+secondValue+",") == -1) {Fail = true;}});
				if (Fail == true) {jQuery(this).addClass('Hide-Item');}
				else {jQuery(this).removeClass('Hide-Item'); Counter++;}
		});
}

/* Used in the bare-list layout to show or hide extra product details */
function ToggleItem(Item_ID) {
		if (jQuery('#prod-cat-details-'+Item_ID).css('display') == "none") {
			  jQuery('#prod-cat-details-'+Item_ID).removeClass('hidden-field');
		}
		else {
				jQuery('#prod-cat-details-'+Item_ID).addClass('hidden-field');
		}
}

/* Used to track the number of times that a product is clicked in all catalogues */
function RecordView(Item_ID) {
		var order = 'Item_ID=' + Item_ID + '&action=record_view';
		jQuery.post(ajaxurl, order, function(response) {});
}

function ToggleView(DisplayType) {
		
		if (DisplayType == "Thumbnail" && jQuery('.thumb-display').hasClass('hidden-field')) {
			  jQuery('.list-display').animate({opacity: 0}, 500);
				jQuery('.detail-display').animate({opacity: 0}, 500);
				setTimeout(function(){jQuery('.thumb-display').animate({opacity: 1}, 500);})
				jQuery('.thumb-display').removeClass('hidden-field');
				setTimeout(function(){jQuery('.list-display').addClass('hidden-field');})
				setTimeout(function(){jQuery('.detail-display').addClass('hidden-field');})
		}
		if (DisplayType == "List" && jQuery('.list-display').hasClass('hidden-field')) {
			  jQuery('.thumb-display').animate({opacity: 0}, 500);
				jQuery('.detail-display').animate({opacity: 0}, 500);
				setTimeout(function(){jQuery('.list-display').animate({opacity: 1}, 500);})
				jQuery('.list-display').removeClass('hidden-field');
				setTimeout(function(){jQuery('.thumb-display').addClass('hidden-field');})
				setTimeout(function(){jQuery('.detail-display').addClass('hidden-field');})
		}
		if (DisplayType == "Detail" && jQuery('.detail-display').hasClass('hidden-field')) {
			  jQuery('.list-display').animate({opacity: 0}, 500);
				jQuery('.thumb-display').animate({opacity: 0}, 500);
				setTimeout(function(){jQuery('.detail-display').animate({opacity: 1}, 500);})
				jQuery('.detail-display').removeClass('hidden-field');
				setTimeout(function(){jQuery('.list-display').addClass('hidden-field');})
				setTimeout(function(){jQuery('.thumb-display').addClass('hidden-field');})
		}
		
		return false;
}

function ZoomImage(ProdID, ItemID) {
		if (ItemID == 0) {
			  PhotoSRC = jQuery('#prod-cat-addt-details-thumb-P'+ProdID).attr('src');
		}
		else {
				PhotoSRC = jQuery('#prod-cat-addt-details-thumb-'+ItemID).attr('src');
		}
		jQuery('#prod-cat-addt-details-main-'+ProdID).attr('src', PhotoSRC);
		html = '<div style="width:auto;height:auto;overflow: auto;position:relative;">';
		html += jQuery('#prod-cat-addt-details-'+ProdID).html();
		html += "</div>";
		jQuery("#fancybox-content").html(html);
}

jQuery(document).ready(function() 
{
     var objHeight = 0;
     jQuery.each(jQuery('.prod-cat-inner').children(), function(){
            objHeight = Math.max(jQuery(this).height(), objHeight);
     });
     jQuery('.prod-cat-inner').height(objHeight);
});
