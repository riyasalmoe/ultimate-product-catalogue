<?php
/* Adds a the default options for the product catalogue which can be changed on the options page */
function Initial_UPCP_Options() {
		update_option("UPCP_Full_Version", "No");
		update_option("UPCP_Color_Scheme", "Blue");
		update_option("UPCP_Product_Links", "Same");
		update_option("UPCP_Tag_Logic", "AND");
		update_option("UPCP_Read_More", "Yes");
}
