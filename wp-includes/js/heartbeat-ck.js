/**
 * Heartbeat API
 *
 * Note: this API is "experimental" meaning it will likely change a lot
 * in the next few releases based on feedback from 3.6.0. If you intend
 * to use it, please follow the development closely.
 *
 * Heartbeat is a simple server polling API that sends XHR requests to
 * the server every 15 - 60 seconds and triggers events (or callbacks) upon
 * receiving data. Currently these 'ticks' handle transports for post locking,
 * login-expiration warnings, and related tasks while a user is logged in.
 *
 * Available PHP filters (in ajax-actions.php):
 * - heartbeat_received
 * - heartbeat_send
 * - heartbeat_tick
 * - heartbeat_nopriv_received
 * - heartbeat_nopriv_send
 * - heartbeat_nopriv_tick
 * @see wp_ajax_nopriv_heartbeat(), wp_ajax_heartbeat()
 *
 * Custom jQuery events:
 * - heartbeat-send
 * - heartbeat-tick
 * - heartbeat-error
 * - heartbeat-connection-lost
 * - heartbeat-connection-restored
 * - heartbeat-nonces-expired
 *
 * @since 3.6.0
 */(function(e,t,n){var r=function(){function s(){typeof t.pagenow=="string"&&(i.screenId=t.pagenow);typeof t.ajaxurl=="string"&&(i.url=t.ajaxurl);if(typeof t.heartbeatSettings=="object"){var n=t.heartbeatSettings;!i.url&&n.ajaxurl&&(i.url=n.ajaxurl);if(n.interval){i.mainInterval=n.interval;i.mainInterval<15?i.mainInterval=15:i.mainInterval>60&&(i.mainInterval=60)}i.screenId||(i.screenId=n.screenId||"front");n.suspension==="disable"&&(i.suspendEnabled=!1)}i.mainInterval=i.mainInterval*1e3;i.originalInterval=i.mainInterval;e(t).on("blur.wp-heartbeat-focus",function(){d();i.winBlurTimer=t.setTimeout(function(){h()},500)}).on("focus.wp-heartbeat-focus",function(){v();p()}).on("unload.wp-heartbeat",function(){i.suspend=!0;i.xhr&&i.xhr.readyState!==4&&i.xhr.abort()});t.setInterval(function(){y()},3e4);r.ready(function(){i.lastTick=o();c()})}function o(){return(new Date).getTime()}function u(e){var n,r=e.src;if(r&&/^https?:\/\//.test(r)){n=t.location.origin?t.location.origin:t.location.protocol+"//"+t.location.host;if(r.indexOf(n)!==0)return!1}try{if(e.contentWindow.document)return!0}catch(i){}return!1}function a(e,t){var n;if(e){switch(e){case"abort":break;case"timeout":n=!0;break;case"error":if(503===t&&i.hasConnected){n=!0;break};case"parsererror":case"empty":case"unknown":i.errorcount++;i.errorcount>2&&i.hasConnected&&(n=!0)}if(n&&!w()){i.connectionError=!0;r.trigger("heartbeat-connection-lost",[e,t])}}}function f(){i.hasConnected=!0;if(w()){i.errorcount=0;i.connectionError=!1;r.trigger("heartbeat-connection-restored")}}function l(){var n,s;if(i.connecting||i.suspend)return;i.lastTick=o();s=e.extend({},i.queue);i.queue={};r.trigger("heartbeat-send",[s]);n={data:s,interval:i.tempInterval?i.tempInterval/1e3:i.mainInterval/1e3,_nonce:typeof t.heartbeatSettings=="object"?t.heartbeatSettings.nonce:"",action:"heartbeat",screen_id:i.screenId,has_focus:i.hasFocus};i.connecting=!0;i.xhr=e.ajax({url:i.url,type:"post",timeout:3e4,data:n,dataType:"json"}).always(function(){i.connecting=!1;c()}).done(function(e,t,n){var i;if(!e){a("empty");return}f();if(e.nonces_expired){r.trigger("heartbeat-nonces-expired");return}if(e.heartbeat_interval){i=e.heartbeat_interval;delete e.heartbeat_interval}r.trigger("heartbeat-tick",[e,t,n]);i&&x(i)}).fail(function(e,t,n){a(t||"unknown",e.status);r.trigger("heartbeat-error",[e,t,n])})}function c(){var e=o()-i.lastTick,n=i.mainInterval;if(i.suspend)return;if(!i.hasFocus)n=12e4;else if(i.countdown>0&&i.tempInterval){n=i.tempInterval;i.countdown--;i.countdown<1&&(i.tempInterval=0)}t.clearTimeout(i.beatTimer);e<n?i.beatTimer=t.setTimeout(function(){l()},n-e):l()}function h(){m();i.hasFocus=!1}function p(){m();i.userActivity=o();i.suspend=!1;if(!i.hasFocus){i.hasFocus=!0;c()}}function d(){e("iframe").each(function(n,r){if(!u(r))return;if(e.data(r,"wp-heartbeat-focus"))return;e.data(r,"wp-heartbeat-focus",1);e(r.contentWindow).on("focus.wp-heartbeat-focus",function(){p()}).on("blur.wp-heartbeat-focus",function(){d();i.frameBlurTimer=t.setTimeout(function(){h()},500)})})}function v(){e("iframe").each(function(t,n){if(!u(n))return;e.removeData(n,"wp-heartbeat-focus");e(n.contentWindow).off(".wp-heartbeat-focus")})}function m(){t.clearTimeout(i.winBlurTimer);t.clearTimeout(i.frameBlurTimer)}function g(){i.userActivityEvents=!1;r.off(".wp-heartbeat-active");e("iframe").each(function(t,n){if(!u(n))return;e(n.contentWindow).off(".wp-heartbeat-active")});p()}function y(){var t=i.userActivity?o()-i.userActivity:0;t>3e5&&i.hasFocus&&h();i.suspendEnabled&&t>12e5&&(i.suspend=!0);if(!i.userActivityEvents){r.on("mouseover.wp-heartbeat-active keyup.wp-heartbeat-active",function(){g()});e("iframe").each(function(t,n){if(!u(n))return;e(n.contentWindow).on("mouseover.wp-heartbeat-active keyup.wp-heartbeat-active",function(){g()})});i.userActivityEvents=!0}}function b(){return i.hasFocus}function w(){return i.connectionError}function E(){i.lastTick=0;c()}function S(){i.suspendEnabled=!1}function x(e,t){var n,r=i.tempInterval?i.tempInterval:i.mainInterval;if(e){switch(e){case"fast":case 5:n=5e3;break;case 15:n=15e3;break;case 30:n=3e4;break;case 60:n=6e4;break;case"long-polling":i.mainInterval=0;return 0;default:n=i.originalInterval}if(5e3===n){t=parseInt(t,10)||30;t=t<1||t>30?30:t;i.countdown=t;i.tempInterval=n}else{i.countdown=0;i.tempInterval=0;i.mainInterval=n}n!==r&&c()}return i.tempInterval?i.tempInterval/1e3:i.mainInterval/1e3}function T(e,t,n){if(e){if(n&&this.isQueued(e))return!1;i.queue[e]=t;return!0}return!1}function N(e){if(e)return i.queue.hasOwnProperty(e)}function C(e){e&&delete i.queue[e]}function k(e){if(e)return this.isQueued(e)?i.queue[e]:n}var r=e(document),i={suspend:!1,suspendEnabled:!0,screenId:"",url:"",lastTick:0,queue:{},mainInterval:60,tempInterval:0,originalInterval:0,countdown:0,connecting:!1,connectionError:!1,errorcount:0,hasConnected:!1,hasFocus:!0,userActivity:0,userActivityEvents:!1,beatTimer:0,winBlurTimer:0,frameBlurTimer:0};s();return{hasFocus:b,connectNow:E,disableSuspend:S,interval:x,hasConnectionError:w,enqueue:T,dequeue:C,isQueued:N,getQueuedItem:k}};t.wp=t.wp||{};t.wp.heartbeat=new r})(jQuery,window);