var gridster;
jQuery(function(){ //DOM Ready
 
    gridster = jQuery(".gridster ul").gridster({
        widget_margins: [10, 10],
        widget_base_dimensions: [90, 35],
				helper: 'clone',
   	}).data('gridster');
		gridster.disable();
});