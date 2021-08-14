// add the class of 'cf' to use the micro-clearfix hack
// http://nicolasgallagher.com/micro-clearfix-hack/
jQuery("#subsidiary, #main").addClass('cf');


// apply fitvids functionality to .entry-content div
// https://github.com/davatron5000/FitVids.js
jQuery(".entry-content").fitVids();


// modified version of flexnav, does not have drop down functionality
// https://github.com/indyplanets/flexnav
// http://webdeveloper2.com/2011/06/trigger-javascript-on-css3-media-query-change/
detector = jQuery('.js');
compareWidth = detector.width();
smallScreen = '780';
hideSearch = '620';
jQuery('.menu-button').click(function(){
    if (!jQuery(".access-nav").is(":visible"))
		jQuery('.menu-button').addClass("nav-open");
		jQuery(".access-nav").slideToggle('fast', function() {
			if (!jQuery(".access-nav").is(":visible"))
			jQuery('.menu-button').removeClass("nav-open");
    });
});
// Boto Search
jQuery('.head-search-button').click(function(){
    if (!jQuery("#header #searchform").is(":visible"))
		jQuery('.head-search-button').addClass("nav-open");
		jQuery("#header #searchform").slideToggle('fast', function() {
			if (!jQuery("#header #searchform").is(":visible")){
				jQuery('.head-search-button').removeClass("nav-open");
			}else{
				jQuery('#header #searchform input').focus();
			}
    });
});
//Responsive Dinamic
jQuery(window).resize(function(){
    if(detector.width()!=compareWidth){
		compareWidth = detector.width();
		if (compareWidth >= smallScreen) {
			jQuery('.access-nav').show();
		}else{
			jQuery('.menu-button').removeClass("nav-open");
			jQuery('.access-nav').hide();
		}
		if (compareWidth >= hideSearch) {
			jQuery("#header #searchform").show();
		}else{
			jQuery('.head-search-button').removeClass("nav-open");
			jQuery('#header #searchform').hide();
		}
    }
});
jQuery(".readmore").click(function(){
	var $this = jQuery(this);
	var $wrap = $this.parents(".wrap_readmore");
	//window.console&&console.log($wrap);
	var $content = $wrap.children('.readmore_content');
	//window.console&&console.log($content);
	$content.slideToggle('slow', function() {
		$wrap.toggleClass('readopen');
    // Animation complete.
  });
});
// COOKIES
//Generamos la cookie de control
function setCookie(cname, cvalue, days){
    var d = new Date();
    d.setTime(d.getTime()+(days * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
} 
//Boton aceptar
jQuery("#cookie_warning").click(function() {
    //Generamos la cookie
    setCookie("i_cookies", 2, 365);
    jQuery(this).slideToggle(function(){
		jQuery('.cookie_spacer').addClass('hidden');
		});
	}).children('a').click(function(e) {
      return false;
});