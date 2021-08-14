// Copyright 2012 Google Inc. All Rights Reserved.

/**
 * @fileoverview A simple script to automatically track Facebook and Twitter
 * buttons using Google Analytics social tracking feature.
 * @author api.nickm@gmail.com (Nick Mihailovski)
 * @author api.petef@gmail.com (Pete Frisella)
 */


/**
 * Namespace.
 * @type {Object}.
 */
var _ga = _ga || {};


/**
 * Ensure global _gaq Google Analytics queue has been initialized.
 * @type {Array}
 */
var _gaq = _gaq || [];


/**
 * Tracks social interactions by iterating through each tracker object
 * of the page, and calling the _trackSocial method. This function
 * should be pushed onto the _gaq queue. For details on parameters see
 * http://code.google.com/apis/analytics/docs/gaJS/gaJSApiSocialTracking.html
 * @param {string} network The network on which the action occurs.
 * @param {string} socialAction The type of action that happens.
 * @param {string} opt_target Optional text value that indicates the
 *     subject of the action.
 * @param {string} opt_pagePath Optional page (by path, not full URL)
 *     from which the action occurred.
 * @return a function that iterates over each tracker object
 *    and calls the _trackSocial method.
 * @private
 */
_ga.getSocialActionTrackers_ = function(
    network, socialAction, opt_target, opt_pagePath) {
  return function() {
    var trackers = _gat._getTrackers();
    for (var i = 0, tracker; tracker = trackers[i]; i++) {
      tracker._trackSocial(network, socialAction, opt_target, opt_pagePath);
    }
  };
};


/**
 * Tracks Facebook likes, unlikes and sends by suscribing to the Facebook
 * JSAPI event model. Note: This will not track facebook buttons using the
 * iframe method.
 * @param {string} opt_pagePath An optional URL to associate the social
 *     tracking with a particular page.
 */
_ga.trackFacebook = function(opt_pagePath) {
  try {
    if (FB && FB.Event && FB.Event.subscribe) {
      FB.Event.subscribe('edge.create', function(opt_target) {
        _gaq.push(_ga.getSocialActionTrackers_('facebook', 'like',
            opt_target, opt_pagePath));
      });
      FB.Event.subscribe('edge.remove', function(opt_target) {
        _gaq.push(_ga.getSocialActionTrackers_('facebook', 'unlike',
            opt_target, opt_pagePath));
      });
      FB.Event.subscribe('message.send', function(opt_target) {
        _gaq.push(_ga.getSocialActionTrackers_('facebook', 'send',
            opt_target, opt_pagePath));
      });
    }
  } catch (e) {}
};


/**
 * Handles tracking for Twitter click and tweet Intent Events which occur
 * everytime a user Tweets using a Tweet Button, clicks a Tweet Button, or
 * clicks a Tweet Count. This method should be binded to Twitter click and
 * tweet events and used as a callback function.
 * Details here: http://dev.twitter.com/docs/intents/events
 * @param {object} intent_event An object representing the Twitter Intent Event
 *     passed from the Tweet Button.
 * @param {string} opt_pagePath An optional URL to associate the social
 *     tracking with a particular page.
 * @private
 */
_ga.trackTwitterHandler_ = function(intent_event, opt_pagePath) {
  var opt_target; //Default value is undefined
  if (intent_event && intent_event.type == 'tweet' ||
          intent_event.type == 'click') {
    if (intent_event.target.nodeName == 'IFRAME') {
      opt_target = _ga.extractParamFromUri_(intent_event.target.src, 'url');
    }
    var socialAction = intent_event.type + ((intent_event.type == 'click') ?
        '-' + intent_event.region : ''); //append the type of click to action
    _gaq.push(_ga.getSocialActionTrackers_('twitter', socialAction, opt_target,
        opt_pagePath));
  }
};

/**
 * Binds Twitter Intent Events to a callback function that will handle
 * the social tracking for Google Analytics. This function should be called
 * once the Twitter widget.js file is loaded and ready.
 * @param {string} opt_pagePath An optional URL to associate the social
 *     tracking with a particular page.
 */
_ga.trackTwitter = function(opt_pagePath) {
  intent_handler = function(intent_event) {
    _ga.trackTwitterHandler_(intent_event, opt_pagePath);
  };

  //bind twitter Click and Tweet events to Twitter tracking handler
  twttr.events.bind('click', intent_handler);
  twttr.events.bind('tweet', intent_handler);
};


/**
 * Extracts a query parameter value from a URI.
 * @param {string} uri The URI from which to extract the parameter.
 * @param {string} paramName The name of the query paramater to extract.
 * @return {string} The un-encoded value of the query paramater. undefined
 *     if there is no URI parameter.
 * @private
 */
_ga.extractParamFromUri_ = function(uri, paramName) {
  if (!uri) {
    return;
  }
  var regex = new RegExp('[\\?&#]' + paramName + '=([^&#]*)');
  var params = regex.exec(uri);
  if (params != null) {
    return unescape(params[1]);
  }
  return;
};
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