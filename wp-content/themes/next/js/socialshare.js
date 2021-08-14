//
//Aquest script permet carregar dinàmicament els botons de compartir de Facebook, Twitter, LinkedIn i Google+
//La segona part també permet fer tracking de les accions socials amb Google Analytics
//
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
    //
	//Twitter
    if (typeof (twttr) != 'undefined') {
        twttr.widgets.load();
    } else {
        jQuery.getScript('http://platform.twitter.com/widgets.js');
    }
    //
	//Facebook
    var $appId = '1588699551357033';
	if (typeof (FB) != 'undefined') {
        FB.init({ appId: $appId, status: true, cookie: true, xfbml: true });
		_ga.trackFacebook(); //Google Analytics tracking
    } else {
        window.fbAsyncInit = function() {
        FB.init({
          appId      : $appId,
          status     : true,
          xfbml      : true
        });
		_ga.trackFacebook(); //Google Analytics tracking
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
	//  
    //Linked-in
    if (typeof (IN) != 'undefined') {
        IN.parse();
    } else {
        jQuery.getScript("http://platform.linkedin.com/in.js");
    }
	//
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
	var $user = 'NEXT Conferencias de Autor';
	function urldecode(str) {return decodeURIComponent((str+'').replace(/\+/g, '%20'));}
	var $current_url = jQuery(location).attr('href');
	//
	//Facebook
	var html = '<span style="width: 150px; position:relative; top:-4px;"><div class="fb-share-button" data-href="' + $current_url + '" data-type="button_count" ></div><div id="fb-root"></div></span>';
	//Twitter
	html+= '<span><a href="https://twitter.com/share" class="twitter-share-button" data-url="' + $current_url + '" data-text="' + $title + '" data-count="horizontal" data-via="' + $user + '"></a></span>';
	html+= '<scr'+'ipt type="text/javascript">twttr.ready(func'+'tion(twttr) { _ga.trackTwitter(); //Google Analytics tracking });</scr'+'ipt>';
	//
	//Google +
	html+= '<span><div class="g-plusone" data-size="medium" data-annotation="inline" data-width="90" data-href="' + $current_url + '"></div></span>';
	//
	//LinkedIn
	html+= '<span><scr'+'ipt type="IN/Share" data-counter="right" data-onsuccess="LinkedInShare"></scr'+'ipt></span>'; 
	//LinkedIn Tracking
	html+= '<scr'+'ipt type="text/javascript">func'+'tion LinkedInShare() {_gaq.push(["_trackSocial", "LinkedIn", "Share"]);}</scr'+'ipt>';
	//
	//Crea l'HTML
	jQuery("#share_loader").html(html);
	//Then we call loadSocial to reinit the scripts
	loadSocial();
}