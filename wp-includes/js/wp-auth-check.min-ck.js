!function(e){function t(){var t,r=e("#wp-auth-check"),s=e("#wp-auth-check-form"),o=i.find(".wp-auth-fallback-expired"),u=!1;s.length&&(e(window).on("beforeunload.wp-auth-check",function(e){e.originalEvent.returnValue=window.authcheckL10n.beforeunload}),t=e('<iframe id="wp-auth-check-frame" frameborder="0">').attr("title",o.text()),t.load(function(){var t,l;u=!0;try{l=e(this).contents().find("body"),t=l.height()}catch(p){return i.addClass("fallback"),r.css("max-height",""),s.remove(),o.focus(),void 0}t?l&&l.hasClass("interim-login-success")?n():r.css("max-height",t+40+"px"):l&&l.length||(i.addClass("fallback"),r.css("max-height",""),s.remove(),o.focus())}).attr("src",s.data("src")),e("#wp-auth-check-form").append(t)),i.removeClass("hidden"),t?(t.focus(),setTimeout(function(){u||(i.addClass("fallback"),s.remove(),o.focus())},1e4)):o.focus()}function n(){e(window).off("beforeunload.wp-auth-check"),"undefined"==typeof adminpage||"post-php"!==adminpage&&"post-new-php"!==adminpage||"undefined"==typeof wp||!wp.heartbeat||wp.heartbeat.connectNow(),i.fadeOut(200,function(){i.addClass("hidden").css("display",""),e("#wp-auth-check-frame").remove()})}function r(){var e=parseInt(window.authcheckL10n.interval,10)||180;s=(new Date).getTime()+1e3*e}var i,s;e(document).on("heartbeat-tick.wp-auth-check",function(e,s){"wp-auth-check"in s&&(r(),!s["wp-auth-check"]&&i.hasClass("hidden")?t():s["wp-auth-check"]&&!i.hasClass("hidden")&&n())}).on("heartbeat-send.wp-auth-check",function(e,t){(new Date).getTime()>s&&(t["wp-auth-check"]=!0)}).ready(function(){r(),i=e("#wp-auth-check-wrap"),i.find(".wp-auth-check-close").on("click",function(){n()})})}(jQuery);