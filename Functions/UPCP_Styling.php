<?php

define('THUMBNAIL_VIEW_IMAGE_HOVER_FADE_DEFAULT', "No");
define('THUMBNAIL_VIEW_MOUSEOVER_ZOOM_DEFAULT', "No");
define('THUMBNAIL_VIEW_IMAGE_HEIGHT_DEFAULT', "180");
define('THUMBNAIL_VIEW_IMAGE_WIDTH_DEFAULT', "180");
define('THUMBNAIL_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT', "200");
define('THUMBNAIL_VIEW_IMAGE_HOLDER_WIDTH_DEFAULT', "200");
define('THUMBNAIL_VIEW_IMAGE_BORDER_DEFAULT', "No");
define('THUMBNAIL_VIEW_IMAGE_BORDER_COLOR_DEFAULT', "");
define('THUMBNAIL_VIEW_BOX_WIDTH_DEFAULT', "215");
define('THUMBNAIL_VIEW_BOX_MIN_HEIGHT_DEFAULT', "306");
define('THUMBNAIL_VIEW_BOX_MAX_HEIGHT_DEFAULT', "");
define('THUMBNAIL_VIEW_BOX_PADDING_DEFAULT', "0");
define('THUMBNAIL_VIEW_BOX_MARGIN_DEFAULT', "10 10 32");
define('THUMBNAIL_VIEW_BOX_BORDER_DEFAULT', "Yes");
define('THUMBNAIL_VIEW_BORDER_COLOR_DEFAULT', "#e0e0e0");
define('THUMBNAIL_VIEW_TITLE_FONT_SIZE_DEFAULT', "");
define('THUMBNAIL_VIEW_TITLE_COLOR_DEFAULT', "#1b8be0");
define('THUMBNAIL_VIEW_TITLE_FONT_DEFAULT', "");
define('THUMBNAIL_VIEW_PRICE_FONT_SIZE_DEFAULT', "");
define('THUMBNAIL_VIEW_PRICE_COLOR_DEFAULT', "#2e8f9a");
define('THUMBNAIL_VIEW_PRICE_FONT_DEFAULT', "");
define('THUMBNAIL_VIEW_BACKGROUND_COLOR_DEFAULT', "");
define('THUMBNAIL_VIEW_SEPARATOR_LINE_DEFAULT', "No");
define('THUMBNAIL_VIEW_DETAILS_ARROW_DEFAULT', "Original");
define('THUMBNAIL_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT', "");

define('LIST_VIEW_IMAGE_HOVER_FADE_DEFAULT', "No");
define('LIST_VIEW_MOUSEOVER_ZOOM_DEFAULT', "No");
define('LIST_VIEW_IMAGE_HEIGHT_DEFAULT', "180");
define('LIST_VIEW_IMAGE_WIDTH_DEFAULT', "100");
define('LIST_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT', "200");
define('LIST_VIEW_IMAGE_BORDER_DEFAULT', "No");
define('LIST_VIEW_IMAGE_BORDER_COLOR_DEFAULT', "");
define('LIST_VIEW_IMAGE_BACKGROUND_COLOR_DEFAULT', "#fafafa");
define('LIST_VIEW_ITEM_MARGIN_LEFT_DEFAULT', "5");
define('LIST_VIEW_ITEM_MARGIN_TOP_DEFAULT', "10");
define('LIST_VIEW_ITEM_PADDING_DEFAULT', "0");
define('LIST_VIEW_ITEM_MIN_HEIGHT_DEFAULT', "240");
define('LIST_VIEW_ITEM_MAX_HEIGHT_DEFAULT', "");
define('LIST_VIEW_ITEM_COLOR_DEFAULT', "");
define('LIST_VIEW_TITLE_FONT_SIZE_DEFAULT', "");
define('LIST_VIEW_TITLE_COLOR_DEFAULT', "#1b8be0");
define('LIST_VIEW_TITLE_FONT_DEFAULT', "");
define('LIST_VIEW_PRICE_FONT_SIZE_DEFAULT', "");
define('LIST_VIEW_PRICE_COLOR_DEFAULT', "#2e8f9a");
define('LIST_VIEW_PRICE_FONT_DEFAULT', "");
define('LIST_VIEW_BACKGROUND_COLOR_DEFAULT', "");
define('LIST_VIEW_DETAILS_ARROW_DEFAULT', "Original");
define('LIST_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT', "");

define('DETAIL_VIEW_IMAGE_HOVER_FADE_DEFAULT', "No");
define('DETAIL_VIEW_MOUSEOVER_ZOOM_DEFAULT', "No");
define('DETAIL_VIEW_IMAGE_HEIGHT_DEFAULT', "180");
define('DETAIL_VIEW_IMAGE_WIDTH_DEFAULT', "180");
define('DETAIL_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT', "200");
define('DETAIL_VIEW_IMAGE_HOLDER_WIDTH_DEFAULT', "100");
define('DETAIL_VIEW_IMAGE_BORDER_DEFAULT', "No");
define('DETAIL_VIEW_IMAGE_BORDER_COLOR_DEFAULT', "");
define('DETAIL_VIEW_IMAGE_BACKGROUND_COLOR_DEFAULT', "");
define('DETAIL_VIEW_BOX_WIDTH_DEFAULT', "215");
define('DETAIL_VIEW_BOX_MIN_HEIGHT_DEFAULT', "13.5");
define('DETAIL_VIEW_BOX_PADDING_DEFAULT', "0");
define('DETAIL_VIEW_BOX_MARGIN_DEFAULT', "15 auto");
define('DETAIL_VIEW_BOX_BORDER_DEFAULT', "Yes");
define('DETAIL_VIEW_BORDER_COLOR_DEFAULT', "#e0e0e0");
define('DETAIL_VIEW_TITLE_FONT_SIZE_DEFAULT', "");
define('DETAIL_VIEW_TITLE_COLOR_DEFAULT', "#1b8be0");
define('DETAIL_VIEW_TITLE_FONT_DEFAULT', "");
define('DETAIL_VIEW_PRICE_FONT_SIZE_DEFAULT', "");
define('DETAIL_VIEW_PRICE_COLOR_DEFAULT', "#039cb7");
define('DETAIL_VIEW_PRICE_FONT_DEFAULT', "");
define('DETAIL_VIEW_BACKGROUND_COLOR_DEFAULT', "");
define('DETAIL_VIEW_SEPARATOR_LINE_DEFAULT', "No");
define('DETAIL_VIEW_DETAILS_ARROW_DEFAULT', "Original");
define('DETAIL_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT', "");


function UPCP_Set_Default_Style_Values() {
	/* Thumbnail View Options */
	update_option("UPCP_Thumbnail_View_Image_Hover_Fade", THUMBNAIL_VIEW_IMAGE_HOVER_FADE_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Mouseover_Zoom", THUMBNAIL_VIEW_MOUSEOVER_ZOOM_DEFAULT);  
	update_option("UPCP_Thumbnail_View_Image_Height", THUMBNAIL_VIEW_IMAGE_HEIGHT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Image_Width", THUMBNAIL_VIEW_IMAGE_WIDTH_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Image_Holder_Height", THUMBNAIL_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Image_Holder_Width", THUMBNAIL_VIEW_IMAGE_HOLDER_WIDTH_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Image_Border", THUMBNAIL_VIEW_IMAGE_BORDER_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Image_Border_Color", THUMBNAIL_VIEW_IMAGE_BORDER_COLOR_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Width", THUMBNAIL_VIEW_BOX_WIDTH_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Min_Height", THUMBNAIL_VIEW_BOX_MIN_HEIGHT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Max_Height", THUMBNAIL_VIEW_BOX_MAX_HEIGHT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Padding", THUMBNAIL_VIEW_BOX_PADDING_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Margin", THUMBNAIL_VIEW_BOX_MARGIN_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Border", THUMBNAIL_VIEW_BOX_BORDER_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Border_Color", THUMBNAIL_VIEW_BORDER_COLOR_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Title_Font_Size", THUMBNAIL_VIEW_TITLE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Title_Color", THUMBNAIL_VIEW_TITLE_COLOR_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Price_Font", THUMBNAIL_VIEW_PRICE_FONT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Price_Font_Size", THUMBNAIL_VIEW_PRICE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Price_Color", THUMBNAIL_VIEW_PRICE_COLOR_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Background_Color", THUMBNAIL_VIEW_BACKGROUND_COLOR_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Separator_Line", THUMBNAIL_VIEW_SEPARATOR_LINE_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Details_Arrow", THUMBNAIL_VIEW_DETAILS_ARROW_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Custom_Details_Arrow", THUMBNAIL_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT); 
	
	/* List View Options */
	update_option("UPCP_List_View_Image_Hover_Fade", LIST_VIEW_IMAGE_HOVER_FADE_DEFAULT); 
	update_option("UPCP_List_View_Mouseover_Zoom", LIST_VIEW_MOUSEOVER_ZOOM_DEFAULT); 
	update_option("UPCP_List_View_Image_Height", LIST_VIEW_IMAGE_HEIGHT_DEFAULT); 
	update_option("UPCP_List_View_Image_Width", LIST_VIEW_IMAGE_WIDTH_DEFAULT); 
	update_option("UPCP_List_View_Image_Holder_Height", LIST_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT); 
	update_option("UPCP_List_View_Image_Border", LIST_VIEW_IMAGE_BORDER_DEFAULT); 
	update_option("UPCP_List_View_Image_Border_Color", LIST_VIEW_IMAGE_BORDER_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Image_Background_Color", LIST_VIEW_IMAGE_BACKGROUND_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Item_Margin_Left", LIST_VIEW_ITEM_MARGIN_LEFT_DEFAULT); 
	update_option("UPCP_List_View_Item_Margin_Top", LIST_VIEW_ITEM_MARGIN_TOP_DEFAULT); 
	update_option("UPCP_List_View_Item_Padding", LIST_VIEW_ITEM_PADDING_DEFAULT); 
	update_option("UPCP_List_View_Item_Min_Height", LIST_VIEW_ITEM_MIN_HEIGHT_DEFAULT); 
	update_option("UPCP_List_View_Item_Max_Height", LIST_VIEW_ITEM_MAX_HEIGHT_DEFAULT); 
	update_option("UPCP_List_View_Item_Color", LIST_VIEW_ITEM_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Title_Font_Size", LIST_VIEW_TITLE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_List_View_Title_Color", LIST_VIEW_TITLE_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Title_Font", LIST_VIEW_TITLE_FONT_DEFAULT); 
	update_option("UPCP_List_View_Price_Font_Size", LIST_VIEW_PRICE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_List_View_Price_Color", LIST_VIEW_PRICE_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Price_Font", LIST_VIEW_PRICE_FONT_DEFAULT); 
	update_option("UPCP_List_View_Background_Color", LIST_VIEW_BACKGROUND_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Details_Arrow", LIST_VIEW_DETAILS_ARROW_DEFAULT); 
	update_option("UPCP_List_View_Custom_Details_Arrow", LIST_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT); 
	

	/* Detail View Options */
	update_option("UPCP_Detail_View_Image_Hover_Fade", DETAIL_VIEW_IMAGE_HOVER_FADE_DEFAULT); 
	update_option("UPCP_Detail_View_Mouseover_Zoom", DETAIL_VIEW_MOUSEOVER_ZOOM_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Height", DETAIL_VIEW_IMAGE_HEIGHT_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Width", DETAIL_VIEW_IMAGE_WIDTH_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Holder_Height", DETAIL_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Holder_Width", DETAIL_VIEW_IMAGE_HOLDER_WIDTH_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Border", DETAIL_VIEW_IMAGE_BORDER_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Border_Color", DETAIL_VIEW_IMAGE_BORDER_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Background_Color", DETAIL_VIEW_IMAGE_BACKGROUND_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Box_Width", DETAIL_VIEW_BOX_WIDTH_DEFAULT); 
	update_option("UPCP_Detail_View_Box_Min_Height", DETAIL_VIEW_BOX_MIN_HEIGHT_DEFAULT); 
	update_option("UPCP_Detail_View_Box_Padding", DETAIL_VIEW_BOX_PADDING_DEFAULT); 
	update_option("UPCP_Detail_View_Box_Margin", DETAIL_VIEW_BOX_MARGIN_DEFAULT); 
	update_option("UPCP_Detail_View_Box_Border", DETAIL_VIEW_BOX_BORDER_DEFAULT); 
	update_option("UPCP_Detail_View_Border_Color", DETAIL_VIEW_BORDER_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Title_Font_Size", DETAIL_VIEW_TITLE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_Detail_View_Title_Color", DETAIL_VIEW_TITLE_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Title_Font", DETAIL_VIEW_TITLE_FONT_DEFAULT); 
	update_option("UPCP_Detail_View_Price_Font_Size", DETAIL_VIEW_PRICE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_Detail_View_Price_Color", DETAIL_VIEW_PRICE_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Price_Font", DETAIL_VIEW_PRICE_FONT_DEFAULT); 
	update_option("UPCP_Detail_View_Background_Color", DETAIL_VIEW_BACKGROUND_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Separator_Line", DETAIL_VIEW_SEPARATOR_LINE_DEFAULT); 
	update_option("UPCP_Detail_View_Details_Arrow", DETAIL_VIEW_DETAILS_ARROW_DEFAULT); 
	update_option("UPCP_Detail_View_Custom_Details_Arrow", DETAIL_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT); 

	$update = __("Styles have been succesfully reset.", 'UPCP');
	return $update;
}

function UPCP_Add_Modified_Styles() {
	
	$StylesString = "<style>";
	/* Thumbnail View Options */
	/*if (get_option("UPCP_Thumbnail_View_Image_Hover_Fade") != THUMBNAIL_VIEW_IMAGE_HOVER_FADE) {$StylesString .= get_option("UPCP_Thumbnail_View_Image_Hover_Fade");} */
	/*if (get_option("UPCP_Thumbnail_View_Mouseover_Zoom") != THUMBNAIL_VIEW_MOUSEOVER_ZOOM) {$StylesString .= get_option("UPCP_Thumbnail_View_Mouseover_Zoom");} */
	if (get_option("UPCP_Thumbnail_View_Image_Height") != THUMBNAIL_VIEW_IMAGE_HEIGHT) {$StyleString .= ".selector-here {" .  get_option("UPCP_Thumbnail_View_Image_Height") . "px;}\n";} 
	if (get_option("UPCP_Thumbnail_View_Image_Width") != THUMBNAIL_VIEW_IMAGE_WIDTH) {$StyleString .= get_option("UPCP_Thumbnail_View_Image_Width");} 
	if (get_option("UPCP_Thumbnail_View_Image_Holder_Height") != THUMBNAIL_VIEW_IMAGE_HOLDER_HEIGHT) {$StyleString .= get_option("UPCP_Thumbnail_View_Image_Holder_Height");} 
	if (get_option("UPCP_Thumbnail_View_Image_Holder_Width") != THUMBNAIL_VIEW_IMAGE_HOLDER_WIDTH) {$StyleString .= get_option("UPCP_Thumbnail_View_Image_Holder_Width");} 
	if (get_option("UPCP_Thumbnail_View_Image_Border") != THUMBNAIL_VIEW_IMAGE_BORDER) {$StyleString .= get_option("UPCP_Thumbnail_View_Image_Border");} 
	if (get_option("Thumbnail_View_Image_Border_Color") != NAIL_VIEW_IMAGE_BORDER_COLOR) {$StyleString .= get_option("Thumbnail_View_Image_Border_Color");} 
	if (get_option("UPCP_Thumbnail_View_Box_Width") != THUMBNAIL_VIEW_BOX_WIDTH) {$StyleString .= get_option("UPCP_Thumbnail_View_Box_Width");} 
	if (get_option("UPCP_Thumbnail_View_Box_Min_Height") != THUMBNAIL_VIEW_BOX_MIN_HEIGHT) {$StyleString .= get_option("UPCP_Thumbnail_View_Box_Min_Height");} 
	if (get_option("UPCP_Thumbnail_View_Box_Max_Height") != THUMBNAIL_VIEW_BOX_MAX_HEIGHT) {$StyleString .= get_option("UPCP_Thumbnail_View_Box_Max_Height");} 
	if (get_option("UPCP_Thumbnail_View_Box_Padding") != THUMBNAIL_VIEW_BOX_PADDING) {$StyleString .= get_option("UPCP_Thumbnail_View_Box_Padding");} 
	if (get_option("UPCP_Thumbnail_View_Box_Margin") != THUMBNAIL_VIEW_BOX_MARGIN) {$StyleString .= get_option("UPCP_Thumbnail_View_Box_Margin");} 
	if (get_option("UPCP_Thumbnail_View_Box_Border") != THUMBNAIL_VIEW_BOX_BORDER) {$StyleString .= get_option("UPCP_Thumbnail_View_Box_Border");} 
	if (get_option("UPCP_Thumbnail_View_Border_Color") != THUMBNAIL_VIEW_BORDER_COLOR) {$StyleString .= get_option("UPCP_Thumbnail_View_Border_Color");} 
	if (get_option("UPCP_Thumbnail_View_Title_Font_Size") != THUMBNAIL_VIEW_TITLE_FONT_SIZE) {$StyleString .= get_option("UPCP_Thumbnail_View_Title_Font_Size");} 
	if (get_option("UPCP_Thumbnail_View_Title_Color") != THUMBNAIL_VIEW_TITLE_COLOR) {$StyleString .= get_option("UPCP_Thumbnail_View_Title_Color");} 
	if (get_option("UPCP_Thumbnail_View_Price_Font") != THUMBNAIL_VIEW_PRICE_FONT) {$StyleString .= get_option("UPCP_Thumbnail_View_Price_Font");} 
	if (get_option("UPCP_Thumbnail_View_Price_Font_Size") != THUMBNAIL_VIEW_PRICE_FONT_SIZE) {$StyleString .= get_option("UPCP_Thumbnail_View_Price_Font_Size");} 
	if (get_option("UPCP_Thumbnail_View_Price_Color") != THUMBNAIL_VIEW_PRICE_COLOR) {$StyleString .= get_option("UPCP_Thumbnail_View_Price_Color");} 
	if (get_option("UPCP_Thumbnail_View_Background_Color") != THUMBNAIL_VIEW_BACKGROUND_COLOR) {$StyleString .= get_option("UPCP_Thumbnail_View_Background_Color");} 
	if (get_option("UPCP_Thumbnail_View_Separator_Line") != THUMBNAIL_VIEW_SEPARATOR_LINE) {$StyleString .= get_option("UPCP_Thumbnail_View_Separator_Line");} 
	if (get_option("UPCP_Thumbnail_View_Details_Arrow") != THUMBNAIL_VIEW_DETAILS_ARROW) {$StyleString .= get_option("UPCP_Thumbnail_View_Details_Arrow");} 
	if (get_option("UPCP_Thumbnail_View_Custom_Details_Arrow") != THUMBNAIL_VIEW_CUSTOM_DETAILS_ARROW) {$StyleString .= get_option("UPCP_Thumbnail_View_Custom_Details_Arrow");} 
	
	/* List View Options */
	if (get_option("UPCP_List_View_Image_Hover_Fade") != LIST_VIEW_IMAGE_HOVER_FADE) {$StyleString .= get_option("UPCP_List_View_Image_Hover_Fade");} 
	if (get_option("UPCP_List_View_Mouseover_Zoom") != LIST_VIEW_MOUSEOVER_ZOOM) {$StyleString .= get_option("UPCP_List_View_Mouseover_Zoom");} 
	if (get_option("UPCP_List_View_Image_Height") != LIST_VIEW_IMAGE_HEIGHT) {$StyleString .= get_option("UPCP_List_View_Image_Height");} 
	if (get_option("UPCP_List_View_Image_Width") != LIST_VIEW_IMAGE_WIDTH) {$StyleString .= get_option("UPCP_List_View_Image_Width");} 
	if (get_option("UPCP_List_View_Image_Holder_Height") != LIST_VIEW_IMAGE_HOLDER_HEIGHT) {$StyleString .= get_option("UPCP_List_View_Image_Holder_Height");} 
	if (get_option("UPCP_List_View_Image_Border") != LIST_VIEW_IMAGE_BORDER) {$StyleString .= get_option("UPCP_List_View_Image_Border");} 
	if (get_option("UPCP_List_View_Image_Border_Color") != LIST_VIEW_IMAGE_BORDER_COLOR) {$StyleString .= get_option("UPCP_List_View_Image_Border_Color");} 
	if (get_option("UPCP_List_View_Image_Background_Color") != LIST_VIEW_IMAGE_BACKGROUND_COLOR) {$StyleString .= get_option("UPCP_List_View_Image_Background_Color");} 
	if (get_option("UPCP_List_View_Item_Margin_Left") != LIST_VIEW_ITEM_MARGIN_LEFT) {$StyleString .= get_option("UPCP_List_View_Item_Margin_Left");} 
	if (get_option("UPCP_List_View_Item_Margin_Top") != LIST_VIEW_ITEM_MARGIN_TOP) {$StyleString .= get_option("UPCP_List_View_Item_Margin_Top");} 
	if (get_option("UPCP_List_View_Item_Padding") != LIST_VIEW_ITEM_PADDING) {$StyleString .= get_option("UPCP_List_View_Item_Padding");} 
	if (get_option("UPCP_List_View_Item_Min_Height") != LIST_VIEW_ITEM_MIN_HEIGHT) {$StyleString .= get_option("UPCP_List_View_Item_Min_Height");} 
	if (get_option("UPCP_List_View_Item_Max_Height") != LIST_VIEW_ITEM_MAX_HEIGHT) {$StyleString .= get_option("UPCP_List_View_Item_Max_Height");} 
	if (get_option("UPCP_List_View_Item_Color") != LIST_VIEW_ITEM_COLOR) {$StyleString .= get_option("UPCP_List_View_Item_Color");} 
	if (get_option("UPCP_List_View_Title_Font_Size") != LIST_VIEW_TITLE_FONT_SIZE) {$StyleString .= get_option("UPCP_List_View_Title_Font_Size");} 
	if (get_option("UPCP_List_View_Title_Color") != LIST_VIEW_TITLE_COLOR) {$StyleString .= get_option("UPCP_List_View_Title_Color");} 
	if (get_option("UPCP_List_View_Title_Font") != LIST_VIEW_TITLE_FONT) {$StyleString .= get_option("UPCP_List_View_Title_Font");} 
	if (get_option("UPCP_List_View_Price_Font_Size") != LIST_VIEW_PRICE_FONT_SIZE) {$StyleString .= get_option("UPCP_List_View_Price_Font_Size");} 
	if (get_option("UPCP_List_View_Price_Color") != LIST_VIEW_PRICE_COLOR) {$StyleString .= get_option("UPCP_List_View_Price_Color");} 
	if (get_option("UPCP_List_View_Price_Font") != LIST_VIEW_PRICE_FONT) {$StyleString .= get_option("UPCP_List_View_Price_Font");} 
	if (get_option("UPCP_List_View_Background_Color") != LIST_VIEW_BACKGROUND_COLOR) {$StyleString .= get_option("UPCP_List_View_Background_Color");} 
	if (get_option("UPCP_List_View_Details_Arrow") != LIST_VIEW_DETAILS_ARROW) {$StyleString .= get_option("UPCP_List_View_Details_Arrow");} 
	if (get_option("UPCP_List_View_Custom_Details_Arrow") != LIST_VIEW_CUSTOM_DETAILS_ARROW) {$StyleString .= get_option("UPCP_List_View_Custom_Details_Arrow");} 
	
	/* Detail View Options */
	if (get_option("UPCP_Detail_View_Image_Hover_Fade") != DETAIL_VIEW_IMAGE_HOVER_FADE) {$StyleString .= get_option("UPCP_Detail_View_Image_Hover_Fade");} 
	if (get_option("UPCP_Detail_View_Mouseover_Zoom") != DETAIL_VIEW_MOUSEOVER_ZOOM) {$StyleString .= get_option("UPCP_Detail_View_Mouseover_Zoom");} 
	if (get_option("UPCP_Detail_View_Image_Height") != DETAIL_VIEW_IMAGE_HEIGHT) {$StyleString .= get_option("UPCP_Detail_View_Image_Height");} 
	if (get_option("UPCP_Detail_View_Image_Width") != DETAIL_VIEW_IMAGE_WIDTH) {$StyleString .= get_option("UPCP_Detail_View_Image_Width");} 
	if (get_option("UPCP_Detail_View_Image_Holder_Height") != DETAIL_VIEW_IMAGE_HOLDER_HEIGHT) {$StyleString .= get_option("UPCP_Detail_View_Image_Holder_Height");} 
	if (get_option("UPCP_Detail_View_Image_Holder_Width") != DETAIL_VIEW_IMAGE_HOLDER_WIDTH) {$StyleString .= get_option("UPCP_Detail_View_Image_Holder_Width");} 
	if (get_option("UPCP_Detail_View_Image_Border") != DETAIL_VIEW_IMAGE_BORDER) {$StyleString .= get_option("UPCP_Detail_View_Image_Border");} 
	if (get_option("UPCP_Detail_View_Image_Border_Color") != DETAIL_VIEW_IMAGE_BORDER_COLOR) {$StyleString .= get_option("UPCP_Detail_View_Image_Border_Color");} 
	if (get_option("UPCP_Detail_View_Image_Background_Color") != DETAIL_VIEW_IMAGE_BACKGROUND_COLOR) {$StyleString .= get_option("UPCP_Detail_View_Image_Background_Color");} 
	if (get_option("UPCP_Detail_View_Box_Width") != DETAIL_VIEW_BOX_WIDTH) {$StyleString .= get_option("UPCP_Detail_View_Box_Width");} 
	if (get_option("UPCP_Detail_View_Box_Padding") != DETAIL_VIEW_BOX_PADDING) {$StyleString .= get_option("UPCP_Detail_View_Box_Padding");} 
	if (get_option("UPCP_Detail_View_Box_Margin") != DETAIL_VIEW_BOX_MARGIN) {$StyleString .= get_option("UPCP_Detail_View_Box_Margin");} 
	if (get_option("UPCP_Detail_View_Box_Border") != DETAIL_VIEW_BOX_BORDER) {$StyleString .= get_option("UPCP_Detail_View_Box_Border");} 
	if (get_option("UPCP_Detail_View_Border_Color") != DETAIL_VIEW_BORDER_COLOR) {$StyleString .= get_option("UPCP_Detail_View_Border_Color");} 
	if (get_option("UPCP_Detail_View_Title_Font_Size") != DETAIL_VIEW_TITLE_FONT_SIZE) {$StyleString .= get_option("UPCP_Detail_View_Title_Font_Size");} 
	if (get_option("UPCP_Detail_View_Title_Color") != DETAIL_VIEW_TITLE_COLOR) {$StyleString .= get_option("UPCP_Detail_View_Title_Color");} 
	if (get_option("UPCP_Detail_View_Title_Font") != DETAIL_VIEW_TITLE_FONT) {$StyleString .= get_option("UPCP_Detail_View_Title_Font");} 
	if (get_option("UPCP_Detail_View_Zoom_On_Image_Hover") != DETAIL_VIEW_ZOOM_ON_IMAGE_HOVER) {$StyleString .= get_option("UPCP_Detail_View_Zoom_On_Image_Hover");} 
	if (get_option("UPCP_Detail_View_Background_Color") != DETAIL_VIEW_BACKGROUND_COLOR) {$StyleString .= get_option("UPCP_Detail_View_Background_Color");} 
	if (get_option("UPCP_Detail_View_Separator_Line") != DETAIL_VIEW_SEPARATOR_LINE) {$StyleString .= get_option("UPCP_Detail_View_Separator_Line");} 
	if (get_option("UPCP_Detail_View_Details_Arrow") != DETAIL_VIEW_DETAILS_ARROW) {$StyleString .= get_option("UPCP_Detail_View_Details_Arrow");} 
	if (get_option("UPCP_Detail_View_Custom_Details_Arrow") != DETAIL_VIEW_CUSTOM_DETAILS_ARROW) {$StyleString .= get_option("UPCP_Detail_View_Custom_Details_Arrow");} 

	$StylesString .= "</style>";

	return $StylesString;
}