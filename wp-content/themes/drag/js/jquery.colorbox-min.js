/*!
	jQuery ColorBox v1.4.4 - 2013-03-10
	(c) 2013 Jack Moore - jacklmoore.com/colorbox
	license: http://www.opensource.org/licenses/mit-license.php
*/
(function(e,t,i){function o(i,o,n){var r=t.createElement(i);return o&&(r.id=Z+o),n&&(r.style.cssText=n),e(r)}function n(){return i.innerHeight?i.innerHeight:e(i).height()}function r(e){var t=k.length,i=(O+e)%t;return 0>i?t+i:i}function h(e,t){return Math.round((/%/.test(e)?("x"===t?E.width():n())/100:1)*parseInt(e,10))}function l(e,t){return e.photo||e.photoRegex.test(t)}function s(e,t){return e.retinaUrl&&i.devicePixelRatio>1?t.replace(e.photoRegex,e.retinaSuffix):t}function a(e){"contains"in g[0]&&!g[0].contains(e.target)&&(e.stopPropagation(),g.focus())}function d(){var t,i=e.data(A,Y);null==i?(_=e.extend({},V),console&&console.log&&console.log("Error: cboxElement missing settings object")):_=e.extend({},i);for(t in _)e.isFunction(_[t])&&"on"!==t.slice(0,2)&&(_[t]=_[t].call(A));_.rel=_.rel||A.rel||e(A).data("rel")||"nofollow",_.href=_.href||e(A).attr("href"),_.title=_.title||A.title,"string"==typeof _.href&&(_.href=e.trim(_.href))}function c(i,o){e(t).trigger(i),dt.trigger(i),e.isFunction(o)&&o.call(A)}function u(){var e,t,i,o,n,r=Z+"Slideshow_",h="click."+Z;_.slideshow&&k[1]?(t=function(){clearTimeout(e)},i=function(){(_.loop||k[O+1])&&(e=setTimeout(Q.next,_.slideshowSpeed))},o=function(){S.html(_.slideshowStop).unbind(h).one(h,n),dt.bind(ot,i).bind(it,t).bind(nt,n),g.removeClass(r+"off").addClass(r+"on")},n=function(){t(),dt.unbind(ot,i).unbind(it,t).unbind(nt,n),S.html(_.slideshowStart).unbind(h).one(h,function(){Q.next(),o()}),g.removeClass(r+"on").addClass(r+"off")},_.slideshowAuto?o():n()):g.removeClass(r+"off "+r+"on")}function f(i){$||(A=i,d(),k=e(A),O=0,"nofollow"!==_.rel&&(k=e("."+et).filter(function(){var t,i=e.data(this,Y);return i&&(t=e(this).data("rel")||i.rel||this.rel),t===_.rel}),O=k.index(A),-1===O&&(k=k.add(A),O=k.length-1)),w.css({opacity:parseFloat(_.opacity),cursor:_.overlayClose?"pointer":"auto",visibility:"visible"}).show(),q||(q=U=!0,g.css({visibility:"hidden",display:"block"}),H=o(ct,"LoadedContent","width:0; height:0; overflow:hidden").appendTo(x),z=y.height()+T.height()+x.outerHeight(!0)-x.height(),D=b.width()+C.width()+x.outerWidth(!0)-x.width(),B=H.outerHeight(!0),N=H.outerWidth(!0),_.w=h(_.initialWidth,"x"),_.h=h(_.initialHeight,"y"),Q.position(),st&&E.bind("resize."+at+" scroll."+at,function(){w.css({width:E.width(),height:n(),top:E.scrollTop(),left:E.scrollLeft()})}).trigger("resize."+at),u(),c(tt,_.onOpen),K.add(W).hide(),P.html(_.close).show(),g.focus(),t.addEventListener&&(t.addEventListener("focus",a,!0),dt.one(rt,function(){t.removeEventListener("focus",a,!0)})),_.returnFocus&&dt.one(rt,function(){e(A).focus()})),Q.load(!0))}function p(){!g&&t.body&&(J=!1,E=e(i),g=o(ct).attr({id:Y,"class":lt?Z+(st?"IE6":"IE"):"",role:"dialog",tabindex:"-1"}).hide(),w=o(ct,"Overlay",st?"position:absolute":"").hide(),L=o(ct,"LoadingOverlay").add(o(ct,"LoadingGraphic")),v=o(ct,"Wrapper"),x=o(ct,"Content").append(W=o(ct,"Title"),M=o(ct,"Current"),R=o("button","Previous"),F=o("button","Next"),S=o("button","Slideshow"),L,P=o("button","Close")),v.append(o(ct).append(o(ct,"TopLeft"),y=o(ct,"TopCenter"),o(ct,"TopRight")),o(ct,!1,"clear:left").append(b=o(ct,"MiddleLeft"),x,C=o(ct,"MiddleRight")),o(ct,!1,"clear:left").append(o(ct,"BottomLeft"),T=o(ct,"BottomCenter"),o(ct,"BottomRight"))).find("div div").css({"float":"left"}),I=o(ct,!1,"position:absolute; width:9999px; visibility:hidden; display:none"),K=F.add(R).add(M).add(S),e(t.body).append(w,g.append(v,I)))}function m(){function i(e){e.which>1||e.shiftKey||e.altKey||e.metaKey||(e.preventDefault(),f(this))}return g?(J||(J=!0,F.click(function(){Q.next()}),R.click(function(){Q.prev()}),P.click(function(){Q.close()}),w.click(function(){_.overlayClose&&Q.close()}),e(t).bind("keydown."+Z,function(e){var t=e.keyCode;q&&_.escKey&&27===t&&(e.preventDefault(),Q.close()),q&&_.arrowKey&&k[1]&&!e.altKey&&(37===t?(e.preventDefault(),R.click()):39===t&&(e.preventDefault(),F.click()))}),e.isFunction(e.fn.on)?e(t).on("click."+Z,"."+et,i):e("."+et).live("click."+Z,i)),!0):!1}var w,g,v,x,y,b,C,T,k,E,H,I,L,W,M,S,F,R,P,K,_,z,D,B,N,A,O,j,q,U,$,G,Q,X,J,V={transition:"elastic",speed:300,width:!1,initialWidth:"600",innerWidth:!1,maxWidth:!1,height:!1,initialHeight:"450",innerHeight:!1,maxHeight:!1,scalePhotos:!0,scrolling:!0,inline:!1,html:!1,iframe:!1,fastIframe:!0,photo:!1,href:!1,title:!1,rel:!1,opacity:.9,preloading:!0,className:!1,retinaImage:!1,retinaUrl:!1,retinaSuffix:"@2x.$1",current:"image {current} of {total}",previous:"previous",next:"next",close:"close",xhrError:"This content failed to load.",imgError:"This image failed to load.",open:!1,returnFocus:!0,reposition:!0,loop:!0,slideshow:!1,slideshowAuto:!0,slideshowSpeed:2500,slideshowStart:"start slideshow",slideshowStop:"stop slideshow",photoRegex:/\.(gif|png|jp(e|g|eg)|bmp|ico)((#|\?).*)?$/i,onOpen:!1,onLoad:!1,onComplete:!1,onCleanup:!1,onClosed:!1,overlayClose:!0,escKey:!0,arrowKey:!0,top:!1,bottom:!1,left:!1,right:!1,fixed:!1,data:void 0},Y="colorbox",Z="cbox",et=Z+"Element",tt=Z+"_open",it=Z+"_load",ot=Z+"_complete",nt=Z+"_cleanup",rt=Z+"_closed",ht=Z+"_purge",lt=!e.support.leadingWhitespace,st=lt&&!i.XMLHttpRequest,at=Z+"_IE6",dt=e({}),ct="div",ut=0;e.colorbox||(e(p),Q=e.fn[Y]=e[Y]=function(t,i){var o=this;if(t=t||{},p(),m()){if(e.isFunction(o))o=e("<a/>"),t.open=!0;else if(!o[0])return o;i&&(t.onComplete=i),o.each(function(){e.data(this,Y,e.extend({},e.data(this,Y)||V,t))}).addClass(et),(e.isFunction(t.open)&&t.open.call(o)||t.open)&&f(o[0])}return o},Q.position=function(e,t){function i(e){y[0].style.width=T[0].style.width=x[0].style.width=parseInt(e.style.width,10)-D+"px",x[0].style.height=b[0].style.height=C[0].style.height=parseInt(e.style.height,10)-z+"px"}var o,r,l,s=0,a=0,d=g.offset();E.unbind("resize."+Z),g.css({top:-9e4,left:-9e4}),r=E.scrollTop(),l=E.scrollLeft(),_.fixed&&!st?(d.top-=r,d.left-=l,g.css({position:"fixed"})):(s=r,a=l,g.css({position:"absolute"})),a+=_.right!==!1?Math.max(E.width()-_.w-N-D-h(_.right,"x"),0):_.left!==!1?h(_.left,"x"):Math.round(Math.max(E.width()-_.w-N-D,0)/2),s+=_.bottom!==!1?Math.max(n()-_.h-B-z-h(_.bottom,"y"),0):_.top!==!1?h(_.top,"y"):Math.round(Math.max(n()-_.h-B-z,0)/2),g.css({top:d.top,left:d.left,visibility:"visible"}),e=g.width()===_.w+N&&g.height()===_.h+B?0:e||0,v[0].style.width=v[0].style.height="9999px",o={width:_.w+N+D,height:_.h+B+z,top:s,left:a},0===e&&g.css(o),g.dequeue().animate(o,{duration:e,complete:function(){i(this),U=!1,v[0].style.width=_.w+N+D+"px",v[0].style.height=_.h+B+z+"px",_.reposition&&setTimeout(function(){E.bind("resize."+Z,Q.position)},1),t&&t()},step:function(){i(this)}})},Q.resize=function(e){q&&(e=e||{},e.width&&(_.w=h(e.width,"x")-N-D),e.innerWidth&&(_.w=h(e.innerWidth,"x")),H.css({width:_.w}),e.height&&(_.h=h(e.height,"y")-B-z),e.innerHeight&&(_.h=h(e.innerHeight,"y")),e.innerHeight||e.height||(H.css({height:"auto"}),_.h=H.height()),H.css({height:_.h}),Q.position("none"===_.transition?0:_.speed))},Q.prep=function(t){function i(){return _.w=_.w||H.width(),_.w=_.mw&&_.mw<_.w?_.mw:_.w,_.w}function n(){return _.h=_.h||H.height(),_.h=_.mh&&_.mh<_.h?_.mh:_.h,_.h}if(q){var h,a="none"===_.transition?0:_.speed;H.empty().remove(),H=o(ct,"LoadedContent").append(t),H.hide().appendTo(I.show()).css({width:i(),overflow:_.scrolling?"auto":"hidden"}).css({height:n()}).prependTo(x),I.hide(),e(j).css({"float":"none"}),h=function(){function t(){lt&&g[0].style.removeAttribute("filter")}var i,n,h=k.length,d="frameBorder",u="allowTransparency";q&&(n=function(){clearTimeout(G),L.hide(),c(ot,_.onComplete)},lt&&j&&H.fadeIn(100),W.html(_.title).add(H).show(),h>1?("string"==typeof _.current&&M.html(_.current.replace("{current}",O+1).replace("{total}",h)).show(),F[_.loop||h-1>O?"show":"hide"]().html(_.next),R[_.loop||O?"show":"hide"]().html(_.previous),_.slideshow&&S.show(),_.preloading&&e.each([r(-1),r(1)],function(){var t,i,o=k[this],n=e.data(o,Y);n&&n.href?(t=n.href,e.isFunction(t)&&(t=t.call(o))):t=e(o).attr("href"),t&&l(n,t)&&(t=s(n,t),i=new Image,i.src=t)})):K.hide(),_.iframe?(i=o("iframe")[0],d in i&&(i[d]=0),u in i&&(i[u]="true"),_.scrolling||(i.scrolling="no"),e(i).attr({src:_.href,name:(new Date).getTime(),"class":Z+"Iframe",allowFullScreen:!0,webkitAllowFullScreen:!0,mozallowfullscreen:!0}).one("load",n).appendTo(H),dt.one(ht,function(){i.src="//about:blank"}),_.fastIframe&&e(i).trigger("load")):n(),"fade"===_.transition?g.fadeTo(a,1,t):t())},"fade"===_.transition?g.fadeTo(a,0,function(){Q.position(0,h)}):Q.position(a,h)}},Q.load=function(t){var n,r,a,u=Q.prep,f=++ut;U=!0,j=!1,A=k[O],t||d(),X&&g.add(w).removeClass(X),_.className&&g.add(w).addClass(_.className),X=_.className,c(ht),c(it,_.onLoad),_.h=_.height?h(_.height,"y")-B-z:_.innerHeight&&h(_.innerHeight,"y"),_.w=_.width?h(_.width,"x")-N-D:_.innerWidth&&h(_.innerWidth,"x"),_.mw=_.w,_.mh=_.h,_.maxWidth&&(_.mw=h(_.maxWidth,"x")-N-D,_.mw=_.w&&_.w<_.mw?_.w:_.mw),_.maxHeight&&(_.mh=h(_.maxHeight,"y")-B-z,_.mh=_.h&&_.h<_.mh?_.h:_.mh),n=_.href,G=setTimeout(function(){L.show()},100),_.inline?(a=o(ct).hide().insertBefore(e(n)[0]),dt.one(ht,function(){a.replaceWith(H.children())}),u(e(n))):_.iframe?u(" "):_.html?u(_.html):l(_,n)?(n=s(_,n),e(j=new Image).addClass(Z+"Photo").bind("error",function(){_.title=!1,u(o(ct,"Error").html(_.imgError))}).one("load",function(){var e;f===ut&&(_.retinaImage&&i.devicePixelRatio>1&&(j.height=j.height/i.devicePixelRatio,j.width=j.width/i.devicePixelRatio),_.scalePhotos&&(r=function(){j.height-=j.height*e,j.width-=j.width*e},_.mw&&j.width>_.mw&&(e=(j.width-_.mw)/j.width,r()),_.mh&&j.height>_.mh&&(e=(j.height-_.mh)/j.height,r())),_.h&&(j.style.marginTop=Math.max(_.mh-j.height,0)/2+"px"),k[1]&&(_.loop||k[O+1])&&(j.style.cursor="pointer",j.onclick=function(){Q.next()}),lt&&(j.style.msInterpolationMode="bicubic"),setTimeout(function(){u(j)},1))}),setTimeout(function(){j.src=n},1)):n&&I.load(n,_.data,function(t,i){f===ut&&u("error"===i?o(ct,"Error").html(_.xhrError):e(this).contents())})},Q.next=function(){!U&&k[1]&&(_.loop||k[O+1])&&(O=r(1),Q.load())},Q.prev=function(){!U&&k[1]&&(_.loop||O)&&(O=r(-1),Q.load())},Q.close=function(){q&&!$&&($=!0,q=!1,c(nt,_.onCleanup),E.unbind("."+Z+" ."+at),w.fadeTo(200,0),g.stop().fadeTo(300,0,function(){g.add(w).css({opacity:1,cursor:"auto"}).hide(),c(ht),H.empty().remove(),setTimeout(function(){$=!1,c(rt,_.onClosed)},1)}))},Q.remove=function(){e([]).add(g).add(w).remove(),g=null,e("."+et).removeData(Y).removeClass(et),e(t).unbind("click."+Z)},Q.element=function(){return e(A)},Q.settings=V)})(jQuery,document,window);
/*
  jQuery Colorbox language configuration
	language: Spanish (es)
	translated by: migolo
*/

// Configuració de ColorBox
jQuery(document).ready(function(){
	jQuery(".novideo, .video_es, .video_cat, video_en").colorbox({
	iframe:true,
	transition:"none",
	speed: 500,
	width:"100%",
	height:"100%",
	close: "",
	imgError: "ERROR",
	returnFocus: false,
	escKey: true,
	arrowKey: false,
	current: "",
	previous: "",
	next: "",
	opacity: 0.86,
	open: false,
	fixed:true,
	reposition: true
	});
	return false;
});
jQuery(document).ready(function(){
	jQuery(".gal_img").colorbox({
	transition:"none",
	speed: 500,
	maxWidth:'90%',
	maxHeight:'90%',
	close: "",
	imgError: "ERROR",
	returnFocus: false,
	escKey: true,
	arrowKey: false,
	loop: false,
	current: "",
	previous: "",
	next: "",
	opacity: 0.86,
	open: false,
	fixed:true,
	reposition: true
	});
	return false;
});
// Colorbox Responsive
var resizeTimer;
jQuery(window).resize(function(){
    if (resizeTimer) clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
        if (jQuery('#cboxOverlay').is(':visible')) {
            jQuery.colorbox.load(true);
        }
    }, 300)
});