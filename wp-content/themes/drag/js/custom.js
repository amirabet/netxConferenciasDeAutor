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
smallScreen = '580';

jQuery('.menu-title').click(function(){
    if (!jQuery(".access-nav").is(":visible"))
        jQuery('.menu-button').addClass("nav-open");
        jQuery(".access-nav").slideToggle('fast', function() {
    if (!jQuery(".access-nav").is(":visible"))
        jQuery('.menu-button').removeClass("nav-open");
    });
});

jQuery(window).resize(function(){
    if(detector.width()!=compareWidth){
        compareWidth = detector.width();
        if (compareWidth >= smallScreen) {
            jQuery('.access-nav').show();
        }
    }
});
// Scroll To Caracteristicas
jQuery('a[href=#caracteristicas]').click(function(){
	var $body = jQuery("body, html");								 
	$body.animate({scrollTop: jQuery("#caracteristicas").offset().top}, 800);
	return false;
});
// Scroll To Top Inici Pag
jQuery('a[href=#toppage]').click(function(){
	var $body = jQuery("body, html");								 
	$body.animate({scrollTop: $body.offset().top}, 1400);
	return false;
})
// fadein despres de carregar imatge unica del flexsliderslider
jQuery("#onlyslide").ready(function(){
      jQuery(".img_fullback").fadeIn(600);
});
// Header Contacto > Readmore small screens
var $openmore = false;
jQuery(".directrius-more").click(function(){
	var $this = jQuery(this);
	var $caption = $this.parent();
	var $header = jQuery($caption).find(".header-directrius");
	var $content = jQuery($caption).find(".contact-directrius");
	if ($openmore){
		$content.fadeToggle('slow', function() {
			$header.fadeToggle('slow', function() {
				$openmore = false;
				// Animation complete.
			});
		});
	}else{
		$header.fadeToggle('slow', function() {
			$content.fadeToggle('slow', function() {
				$openmore = true;
				// Animation complete.
			});
		});
	}
});
// Carrega el Vídeo de mostra a la Capçalera PROGRAMA
// Castella
//jQuery(".video_es").click(function(){
//	var $video = jQuery(this);
//	var $videowrap = $video.parent(".mockup_wrapper");
//	var $novideo = jQuery($videowrap).find(".novideo");
//	$video.addClass('loading_video');
//	$video.css( "display", "block" );
//	$novideo.addClass('hidden');
//	var html = '<div class="dummy_yt"></div><div class="element_yt"><iframe src="//www.youtube.com/embed/mvrwWARe9sw?theme=dark&color=white&rel=0&autoplay=1&showinfo=0" frameborder="0" ></iframe></div>';
//	$video.html(html);
//	setTimeout(function(){
//			$video.removeClass('loading_video');
//	},4000);
//	return false;
//});
// Catala
//jQuery(".video_cat").click(function(){
//	var $video = jQuery(this);
//	var $videowrap = $video.parent(".mockup_wrapper");
//	var $novideo = jQuery($videowrap).find(".novideo");
//	$video.addClass('loading_video');
//	$video.css( "display", "block" );
//	$novideo.addClass('hidden');
//	var html = '<div class="dummy_yt"></div><div class="element_yt"><iframe src="//www.youtube.com/embed/mwuYNfZ8VXE?theme=dark&color=white&rel=0&autoplay=1&showinfo=0" frameborder="0" ></iframe></div>';
//	$video.html(html);
//	setTimeout(function(){
//			$video.removeClass('loading_video');
//	},4000);
//	return false;
//});
// English (enllaç del video a Castella !!!!!)
//jQuery(".video_en").click(function(){
//	var $video = jQuery(this);
//	var $videowrap = $video.parent(".mockup_wrapper");
//	var $novideo = jQuery($videowrap).find(".novideo");
//	$video.addClass('loading_video');
//	$video.css( "display", "block" );
//	$novideo.addClass('hidden');
//	var html = '<div class="dummy_yt"></div><div class="element_yt"><iframe src="//www.youtube.com/embed/mvrwWARe9sw?theme=dark&color=white&rel=0&autoplay=1&showinfo=0" frameborder="0" ></iframe></div>';
//	$video.html(html);
//	setTimeout(function(){
//			$video.removeClass('loading_video');
//	},4000);
//	return false;
//});
// Moduls Tematics Desplegables Versio SmartPhone
jQuery(".readmore").click(function(){
	var $this = jQuery(this);
	var $readplus = jQuery($this).find(".readplus");
	var $readminus = jQuery($this).find(".readminus");
	var $em = $this.parent();
	var $p = $em.parent();
	var $li = $p.parent();
	var $content = jQuery($li).find(".moduls_caract");
	$content.slideToggle('slow', function() {
		$readplus.toggleClass('hidden');
		$readminus.toggleClass('hidden');
    // Animation complete.
  });
});
// Carrega el TimeLine de Facebook
var $fb_loaded = false;
//var resizeTimer;
jQuery(".fb_loader").click(function () {
	if (!$fb_loaded){
		var $calltoact_i = jQuery(this).find(".banner_calltoact > i");
		$calltoact_i.addClass('hidden');
		var $calltoact = jQuery(this).find(".banner_calltoact");
		$calltoact.addClass('loading_lttl');
		setTimeout(function(){
			$calltoact.removeClass('loading_lttl');
			},3000);
		loadhtmlFacebook();
		$fb_loaded = true;
		// Converteix en RESPONSIVE el TimeLine de Facebook
		//if ($fb_loaded = true){
			//jQuery(window).resize(function(){
				//if (resizeTimer) clearTimeout(resizeTimer);
				//resizeTimer = setTimeout(function() {  
					//var container_width = jQuery('#loader_fb').width();    
					//jQuery('#loader_fb').html('<div class="fb-like-box"' + 'data-href="https://www.facebook.com/drag.policia.local"' + ' data-width="' + container_width + '" data-height="320" colorscheme="light" data-show-faces="false" ' + 'data-stream="true" data-header="false"></div>');
					//FB.XFBML.parse( );
				//}, 300)
			//}); 
		//}
		return false;
	}
});
// Defineix l'HTML del TimeLine de Facebook
function loadhtmlFacebook() {
	var container_width = jQuery('#loader_fb').width();
	var html = '<scr'+'ipt>(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//connect.facebook.net/es_ES/all.js#xfbml=1&appId=267000950000472";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","facebook-jssdk"))';
	html+= '</scr'+'ipt>';
	html+= '<div class="fb-like-box"' + 'data-href="https://www.facebook.com/drag.policia.local"' + ' data-width="' + container_width + '" data-height="320" colorscheme="light" data-show-faces="false" ' + 'data-stream="true" data-header="false"></div>';
	var $wrapperfb = jQuery("#loader_fb");
	$wrapperfb.html(html);
    if (typeof (FB) != 'undefined') {
        FB.init({ status: true, cookie: true, xfbml: true });
    } else {
        jQuery.getScript("http://connect.facebook.net/es_ES/all.js#xfbml=1", function () {
            FB.init({ status: true, cookie: true, xfbml: true });
        });
    }
}
// Carrega el TimeLine de Twitter
var $tw_loaded = false;
//var resizeTimer;
jQuery(".tw_loader").click(function () {
	if (!$tw_loaded){
		var $calltoact_i = jQuery(this).find(".banner_calltoact > i");
		$calltoact_i.addClass('hidden');
		var $calltoact = jQuery(this).find(".banner_calltoact");
		$calltoact.addClass('loading_lttl');
		setTimeout(function(){
			$calltoact.removeClass('loading_lttl');
			},3000);
		loadhtmlTwitter();
		$tw_loaded = true;
		// Converteix en RESPONSIVE el TimeLine de Twitter
			//if ($tw_loaded = true){
				//jQuery(window).resize(function(){
					//if (resizeTimer) clearTimeout(resizeTimer);
					//resizeTimer = setTimeout(function() {
						//var container_width = jQuery('#loader_tw').width();    
						//jQuery('#loader_tw').html('<a class="twitter-timeline"' + ' width="' + container_width + '" height="320"  href="https://twitter.com/dragdroid" data-widget-id="387515926586724352" data-link-color="#0068cf"></a><scr'+'ipt>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</scr'+'ipt>');
						//jQuery.getScript('http://platform.twitter.com/widgets.js');    
					//}, 300)
				//}); 
			//}
		return false;
	}
});
// Defineix l'HTML del TimeLine de Twitter
function loadhtmlTwitter() {
	var container_width = jQuery('#loader_tw').width();
	var html = '<a class="twitter-timeline"' + ' width="' + container_width + '" height="320" href="https://twitter.com/dragdroid" data-widget-id="387515926586724352" data-link-color="#0068cf"></a>';
	html+= '<scr'+'ipt>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</scr'+'ipt>';
	var $wrappertw = jQuery("#loader_tw");
	$wrappertw.html(html);
	if (typeof (twttr) != 'undefined') {
        twttr.widgets.load();
    } else {
        jQuery.getScript('http://platform.twitter.com/widgets.js');
    }
}
// Carrega els botons de Compartir
var $share_loaded = false;
jQuery("#share_bttn").click(function () {
	if (!$share_loaded){									  
		var $this = jQuery(this);
		var $sshare = $this.parent();
		var $sshareload = $sshare.children('#share_loader');
		$sshareload.addClass('loading_lttl2');
		setTimeout(function(){
			$sshareload.removeClass('loading_lttl2');
		},5000);
		simulateAjaxRequest();
		$share_loaded = true;
	}
});
function loadSocial() {
    //I will assume that if we have one type of button we have them all
    //If not we'll just exit
    if (jQuery(".twitter-share-button").length == 0) return;

    //Twitter
    if (typeof (twttr) != 'undefined') {
        twttr.widgets.load();
    } else {
        jQuery.getScript('http://platform.twitter.com/widgets.js');
    }

    //Facebook
    if (typeof (FB) != 'undefined') {
        FB.init({ appId: '1398228117096999', status: true, cookie: true, xfbml: true });
    } else {
        window.fbAsyncInit = function() {
        FB.init({
          appId      : '1398228117096999',
          status     : true,
          xfbml      : true
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.async=true; 
		 js.src = "http://connect.facebook.net/es_ES/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    }
  
    //Linked-in
    if (typeof (IN) != 'undefined') {
        IN.parse();
    } else {
        jQuery.getScript("http://platform.linkedin.com/in.js");
    }

    //Google - Note that the google button will not show if you are opening the page from disk - it needs to be http(s)
    if (typeof (gapi) != 'undefined') {
        jQuery(".g-plusone").each(function () {
            gapi.plusone.render($(this).get(0));
        });
    } else {
        jQuery.getScript('https://apis.google.com/js/plusone.js');
    }
}
function simulateAjaxRequest() {
	//Here we would load content from somewhere and insert that into the page.
	//In this case I will just add another couple of buttons to the loadbutton html
	var $title = document.getElementsByTagName("title")[0].innerHTML;
	function urldecode(str) {
   		return decodeURIComponent((str+'').replace(/\+/g, '%20'));
	}
	var $current_url = jQuery(location).attr('href');
	var html = '<span style="width: 150px; position:relative; top:-4px;"><div class="fb-share-button" data-href="' + $current_url + '" data-type="button_count" ></div><div id="fb-root"></div></span>';
	html+= '<span><a href="https://twitter.com/share" class="twitter-share-button" data-url="' + $current_url + '" data-text="' + $title + '" data-count="horizontal" data-via="dragdroid"></a></span>';
	html+= '<span><div class="g-plusone" data-size="medium" data-annotation="inline" data-width="90" data-href="' + $current_url + '"></div></span>';
	html+= '<span><scr'+'ipt type="IN/Share" data-counter="right"></scr'+'ipt></span>'; 
	jQuery("#share_loader").html(html);
	//Then we call loadSocial to reinit the scripts
	loadSocial();
}