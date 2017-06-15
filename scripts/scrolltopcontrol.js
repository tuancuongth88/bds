var scrolltotop={
	//startline: Integer. Number of pixels from top of doc scrollbar is scrolled before showing control
	//scrollto: Keyword (Integer, or "Scroll_to_Element_ID"). How far to scroll document up when control is clicked on (0=top).
	setting: {startline:100, scrollto: 0, scrollduration:1000, fadeduration:[500, 100]},
	controlHTML: '<img src="http://www.kenhcantho.com/imgs/layout/back_to_top.png" style="width:25px; height:25px; position:relative; z-index:999;" />', //HTML for control, which is auto wrapped in DIV w/ ID="topcontrol"
	controlattrs: {offsetx:20, offsety:60}, //offset of control relative to right/ bottom of window corner
	anchorkeyword: '#top', //Enter href value of HTML anchors on the page that should also act as "Scroll Up" links

	state: {isvisible:false, shouldvisible:false},

	scrollup:function(){
		if (!this.cssfixedsupport) //if control is positioned using JavaScript
			this.$control.css({opacity:0}) //hide control immediately after clicking it
		var dest=isNaN(this.setting.scrollto)? this.setting.scrollto : parseInt(this.setting.scrollto)
		if (typeof dest=="string" && jQuery('#'+dest).length==1) //check element set by string exists
			dest=jQuery('#'+dest).offset().top
		else
			dest=0
		this.$body.animate({scrollTop: dest}, this.setting.scrollduration);
	},
 
	keepfixed:function(){
		var $window=jQuery(window)
		var controlx=$window.scrollLeft() + $window.width() - this.$control.width() - this.controlattrs.offsetx
		var controly=$window.scrollTop() + $window.height() - this.$control.height() - this.controlattrs.offsety
		this.$control.css({left:controlx+'px', top:controly+'px'})
	},

	togglecontrol:function(){
		var scrolltop=jQuery(window).scrollTop()
		if (!this.cssfixedsupport)
			this.keepfixed()
		this.state.shouldvisible=(scrolltop>=this.setting.startline)? true : false
		if (this.state.shouldvisible && !this.state.isvisible){
			this.$control.stop().animate({opacity:1}, this.setting.fadeduration[0])
			this.state.isvisible=true
		}
		else if (this.state.shouldvisible==false && this.state.isvisible){
			this.$control.stop().animate({opacity:0}, this.setting.fadeduration[1])
			this.state.isvisible=false
		}
	},

	init:function(){
		jQuery(document).ready(function($){
			var mainobj=scrolltotop
			var iebrws=document.all
			mainobj.cssfixedsupport=!iebrws || iebrws && document.compatMode=="CSS1Compat" && window.XMLHttpRequest //not IE or IE7+ browsers in standards mode
			mainobj.$body=(window.opera)? (document.compatMode=="CSS1Compat"? $('html') : $('body')) : $('html,body')
			mainobj.$control=$('<div id="topcontrol" style="z-index:999;">'+mainobj.controlHTML+'</div>')
				.css({position:mainobj.cssfixedsupport? 'fixed' : 'absolute', bottom:mainobj.controlattrs.offsety, right:mainobj.controlattrs.offsetx, opacity:0, cursor:'pointer'})
				.attr({title:'Scroll Back to Top'})
				.click(function(){mainobj.scrollup(); return false})
				.appendTo('body')
			if (document.all && !window.XMLHttpRequest && mainobj.$control.text()!='') //loose check for IE6 and below, plus whether control contains any text
				mainobj.$control.css({width:mainobj.$control.width()}) //IE6- seems to require an explicit width on a DIV containing text
			mainobj.togglecontrol()
			$('a[href="' + mainobj.anchorkeyword +'"]').click(function(){
				mainobj.scrollup()
				return false
			})
			$(window).bind('scroll resize', function(e){
				mainobj.togglecontrol()
			})
		})
	}
}

scrolltotop.init()

// cuongnt add
$(document).ready(function() {

	//Set Default State of each portfolio piece
	$(".paging_btrix").show();
	$(".paging_btrix a:first").addClass("active");

	//Get size of images, how many there are, then determin the size of the image reel.
	var imageWidth = $(".window").width();
	var imageSum = $(".image_reel img").size();
	var imageReelWidth = imageWidth * imageSum;

	//Adjust the image reel to its new size
	$(".image_reel").css({'width' : imageReelWidth});

	//paging_btrix + Slider Function
	rotate = function(){ 
	var triggerID = $active.attr("rel") - 1; //Get number of times to slide
	var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

	$(".paging_btrix a").removeClass('active'); //Remove all active class
	$active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

	//Slider Animation
	$(".image_reel").animate({ 
	left: -image_reelPosition
	}, 500 );

	}; 

	//Rotation + Timing Event
	rotateSwitch = function(){ 
	play = setInterval(function(){ //Set timer - this will repeat itself every 3 seconds
	$active = $('.paging_btrix a.active').next();
	if ( $active.length === 0) { //If paging_btrix reaches the end...
	$active = $('.paging_btrix a:first'); //go back to first
	}
	rotate(); //Trigger the paging_btrix and slider function
	}, 5000); //Timer speed in milliseconds (3 seconds)
	};

	rotateSwitch(); //Run function on launch

	//On Hover
	$(".image_reel a").hover(function() {
	clearInterval(play); //Stop the rotation
	}, function() {
	rotateSwitch(); //Resume rotation
	}); 

	//On Click
	$(".paging_btrix a").click(function() { 
	$active = $(this); //Activate the clicked paging_btrix
	//Reset Timer
	clearInterval(play); //Stop the rotation
	rotate(); //Trigger rotation immediately
	rotateSwitch(); // Resume rotation
	return false; //Prevent browser jump to link anchor
	}); 

});