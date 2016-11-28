!function($,window,document,undefined){$.fn.doubleTapToGo=function(action){return"ontouchstart"in window||navigator.msMaxTouchPoints||navigator.userAgent.toLowerCase().match(/windows phone os 7/i)?(this.each("unbind"===action?function(){$(this).off(),$(document).off("click touchstart MSPointerDown",handleTouch)}:function(){function handleTouch(e){for(var resetItem=!0,parents=$(e.target).parents(),i=0;i<parents.length;i++)parents[i]==curItem[0]&&(resetItem=!1);resetItem&&(curItem=!1)}var curItem=!1;$(this).on("click",function(e){var item=$(this);item[0]!=curItem[0]&&(e.preventDefault(),curItem=item)}),$(document).on("click touchstart MSPointerDown",handleTouch)}),this):!1}}(jQuery,window,document);

$(".menu li.folder, .widget_user_avatar .user_info a").doubleTapToGo();

if($(window).width() <= 960){
	$('.content_list.tiled .clear').remove();
	$('<div class="clear"></div>').insertAfter('.content_list.tiled .tile:nth-child(even)');
}

if($(window).width() <= 768){
	$('main .widget_user_avatar .menu .folder > a').attr('href','javascript:;');
	$('main .widget_user_avatar .menu .folder').click(function(){
		$('main .widget_user_avatar .menu .folder ul').hide();
		$(this).children("ul").toggle();
	});
}

if($(window).width() <= 540){
	$('.pagebar_nav .pagebar_page').html('<i class="fa fa-chevron-right"></i>');
	$('.pagebar_nav .pagebar_page:first-child').html('<i class="fa fa-chevron-left"></i>');
}


$(document).ready(function() {

	$(".topbar_search_button").on("click", function(){$(".topbar_search").slideToggle();});
	$(".topbar_search_close").on("click", function(){$(".topbar_search").slideToggle();});
	$(".footer_top").on("click", function(){$(".footer_top span").toggle();});
	
	$('#main_menu ul.menu, #widget_pos_left-top .menu, .tabs-menu > ul').flexMenu({'cutoff' : 1, 'linkText' : 'Еще', 'linkTitle' : 'Еще', 'linkTextAll' : '<i class="fa fa-bars"></i> &nbsp; Меню действий'});
	$('header .my_topbar .topbar_left > .menu, header .my_topbar .topbar_right > .menu').flexMenu({'cutoff' : 1, 'threshold' : 1, 'linkText' : 'Еще', 'linkTitle' : 'Еще', 'linkTextAll' : '<i class="fa fa-bars"></i>'});

});

$(function() {

	var	$menu = $('#menu_mobile'),
		$menulink = $('.menu_mobile'),
		$menuTrigger = $('#menu_mobile .menu .folder > a');
	
	$menuTrigger.attr('href','javascript:;');

	$menulink.click(function(e) {
		e.preventDefault();
		$menulink.toggleClass('is_mm');
		$menu.toggleClass('is_mm_open');
	});

	$menuTrigger.click(function(e) {
		e.preventDefault();
		var $this = $(this);
		$this.next('ul').toggleClass('is_mi_open');
	});

});

$(window).resize(function() {
		if ($(window).width() > 480) {
			$("#menu_mobile").removeClass("is_mm");
		}
});
