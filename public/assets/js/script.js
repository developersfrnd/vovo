jQuery(window).on("load",function() {
	"use strict";
	jQuery(".pre-loader").fadeToggle("medium");
});
jQuery(document).ready(function(){
	"use strict";
	// Background images
	jQuery(".bg_img").each( function ( i, elem ) {
		var img = jQuery( elem );
		jQuery(this).hide();
		jQuery(this).parent().css( {
			background: "url(" + img.attr( "src" ) + ") no-repeat center center",
		});
	});

	jQuery("#stayintouch-show, #stayintouch-hide").on("click", function(e) {
		var stay_in_touch = jQuery(".stay-in-touch");
		e.preventDefault();
		stay_in_touch.toggleClass("stay-in-touch-show");
		jQuery(".aside-content").toggleClass("active");
		stay_in_touch.fadeToggle(500);
	});

	jQuery("#play-pause-button").on("click", function () {
		var media_video = jQuery("#media-video");
		if (media_video.get(0).paused) {
			media_video.get(0).play();
		} else {
			media_video.get(0).pause();
		}
	});

	var header_nav = jQuery(".header-wrap .nav a");
	var headline_wrap = jQuery(".headline-wrap");
	var nav_tab = jQuery(".nav-tab-section");
	header_nav.on("click", function () {
		headline_wrap.css({visibility: "hidden", opacity: "0"});
		header_nav.parent("li").removeClass("active");
		jQuery(this).parent("li").addClass("active");
		nav_tab.hide().removeClass("active");
		jQuery(".nav-tab-section." + jQuery(this).data("id")).addClass("active").fadeToggle("slow");
	});
	jQuery(".logo a").on("click", function () {
		headline_wrap.css({visibility: "visible", opacity: "1"});
		header_nav.parent("li").removeClass("active");
		nav_tab.hide().removeClass("active");
	});
});