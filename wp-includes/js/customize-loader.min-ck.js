window.wp=window.wp||{},function(e,t){var n,r=wp.customize;t.extend(t.support,{history:!!window.history&&!!history.pushState,hashchange:"onhashchange"in window&&(void 0===document.documentMode||document.documentMode>7)}),n=t.extend({},r.Events,{initialize:function(){this.body=t(document.body),n.settings&&t.support.postMessage&&(t.support.cors||!n.settings.isCrossDomain)&&(this.window=t(window),this.element=t('<div id="customize-container" />').appendTo(this.body),this.bind("open",this.overlay.show),this.bind("close",this.overlay.hide),t("#wpbody").on("click",".load-customize",function(e){e.preventDefault(),n.link=t(this),n.open(n.link.attr("href"))}),t.support.history&&this.window.on("popstate",n.popstate),t.support.hashchange&&(this.window.on("hashchange",n.hashchange),this.window.triggerHandler("hashchange")))},popstate:function(e){var t=e.originalEvent.state;t&&t.customize?n.open(t.customize):n.active&&n.close()},hashchange:function(){var e=window.location.toString().split("#")[1];e&&0===e.indexOf("wp_customize=on")&&n.open(n.settings.url+"?"+e),e||t.support.history||n.close()},open:function(e){var i;if(!this.active){if(n.settings.browser.mobile)return window.location=e;this.active=!0,this.body.addClass("customize-loading"),this.iframe=t("<iframe />",{src:e}).appendTo(this.element),this.iframe.one("load",this.loaded),this.messenger=new r.Messenger({url:e,channel:"loader",targetWindow:this.iframe[0].contentWindow}),this.messenger.bind("ready",function(){n.messenger.send("back")}),this.messenger.bind("close",function(){t.support.history?history.back():t.support.hashchange?window.location.hash="":n.close()}),this.messenger.bind("activated",function(e){e&&(window.location=e)}),i=e.split("?")[1],t.support.history&&window.location.href!==e?history.pushState({customize:e},"",e):!t.support.history&&t.support.hashchange&&i&&(window.location.hash="wp_customize=on&"+i),this.trigger("open")}},opened:function(){n.body.addClass("customize-active full-overlay-active")},close:function(){this.active&&(this.active=!1,this.trigger("close"),this.link&&this.link.focus())},closed:function(){n.iframe.remove(),n.messenger.destroy(),n.iframe=null,n.messenger=null,n.body.removeClass("customize-active full-overlay-active").removeClass("customize-loading")},loaded:function(){n.body.removeClass("customize-loading")},overlay:{show:function(){this.element.fadeIn(200,n.opened)},hide:function(){this.element.fadeOut(200,n.closed)}}}),t(function(){n.settings=_wpCustomizeLoaderSettings,n.initialize()}),r.Loader=n}(wp,jQuery);