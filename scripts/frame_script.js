$(document).ready(function(){
	
	$(".show_user_login").click(function(e) {
		$(".m_user_login").slideToggle(300);
	});
	$(".btn_dt").click(function(e) {
		$(".f_btn_dt").slideToggle(300);
	});
	
	///// slider swiper /////
	
	var mySwiper1 = new Swiper('.swiper-container1',{
		loop: false,
		grabCursor: true,
		paginationClickable: true,
		autoplay: 3000,
		autoplayDisableOnInteraction: false,
		calculateHeight: true
	})
	$('.arrow-left').on('click', function(e){
		e.preventDefault()
		mySwiper1.swipePrev()
	})
	$('.arrow-right').on('click', function(e){
		e.preventDefault()
		mySwiper1.swipeNext()
	})
	
	var mySwiper2 = new Swiper('.swiper-container2',{
		loop: false,
		grabCursor: true,
		paginationClickable: true,
		autoplay: 3000,
		autoplayDisableOnInteraction: false,
		mode: 'vertical',
		slidesPerView: 3,
		slidesPerGroup: 1		
	})
	
	var mySwiper3 = new Swiper('.swiper-container3',{
		paginationClickable: true,
		loop: false,
		slidesPerView: 'auto',
		grabCursor: true,
		autoplay: 3000,
		autoplayDisableOnInteraction: false
	})
	$('.sc3_left').on('click', function(e){
		e.preventDefault()
		mySwiper3.swipePrev()
	})
	$('.sc3_right').on('click', function(e){
		e.preventDefault()
		mySwiper3.swipeNext()
	})
	
	///// slider swiper /////
	
	//$(".styled").customSelect();	
	
	///// MENU MOBILE /////
	
	$(".icon_menu_mobile").click(function(e) {
		$val=$(".icon_menu_mobile").attr("val");
		if($val==0){
			$(".menu_mobile").attr("style","visibility: visible;");
			$(this).attr("val",1);
			$('body').attr("class","ad_body");
		}
	});
	$(".icon_close_menu_mobile").click(function() {
		$(".menu_mobile").removeAttr("style");
		$(".icon_menu_mobile").attr("val",0);
		$('body').removeAttr("class");		
	});
	
	$( ".accordion" ).accordion({
		heightStyle: "content",
		active: false,
		//header: ".t_accordion",
		collapsible: true
	});
	$(".t_accordion").click(function() {
		window.location = $(this).attr('href');
		return false;
	});
	
	///// MENU MOBILE /////
	
	$('#gallery-1').royalSlider({
		autoScaleSlider: false,
		autoScaleSliderHeight: 500,
		controlNavigation: 'thumbnails',
		loop: false,
		imageScaleMode: 'fit-if-smaller',
		imageAlignCenter: true,
		imageScalePadding: 0,
		navigateByClick: true,
		arrowsNav: false,
		arrowsNavAutoHide: false,
		arrowsNavHideOnTouch: true,
		keyboardNavEnabled: true,
		numImagesToPreload: 0,
		thumbs: {
			appendSpan: false,
			firstMargin: 0,
			spacing: 10,
			arrowsAutoHide: true
		}
	});
	
	$('#gallery-2').royalSlider({
		autoScaleSlider: false,
		autoScaleSliderHeight: 500,
		controlNavigation: 'thumbnails',
		loop: false,
		imageScaleMode: 'fit-if-smaller',
		imageAlignCenter: true,
		imageScalePadding: 0,
		navigateByClick: true,
		arrowsNav: false,
		arrowsNavAutoHide: false,
		arrowsNavHideOnTouch: true,
		keyboardNavEnabled: true,
		numImagesToPreload: 0,
		thumbs: {
			appendSpan: false,
			firstMargin: 0,
			spacing: 10,
			arrowsAutoHide: true
		}
	});
	
	$("#content_ndb").mCustomScrollbar({
		autoHideScrollbar:true,
		theme:"dark-thin"
	});
	
});