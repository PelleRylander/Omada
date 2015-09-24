
var $j = jQuery.noConflict();

$j(document).ready(function() {
	"use strict";
	jQuery('#click_img div').hide();
	jQuery('#click_img img').click(function(){
		jQuery('#lightbox').remove();
		jQuery(this).after('<div id="lightbox"></div>');
		jQuery('#lightbox').append(jQuery('#lightbox').siblings('div').clone());
		jQuery('#lightbox div').show();
		jQuery('#lightbox div').css('background', '#ccc9c2');
	});
	});

