window.wp=window.wp||{},function(e){var t={},n={};wp.mce=wp.mce||{},wp.mce.view={defaults:{pattern:{view:Backbone.View,text:function(e){return e.options.original},toView:function(e){if(this.pattern){this.pattern.lastIndex=0;var t=this.pattern.exec(e);if(t)return{index:t.index,content:t[0],options:{original:t[0],results:t}}}}},shortcode:{view:Backbone.View,text:function(e){return e.options.shortcode.string()},toView:function(e){var t=wp.shortcode.next(this.shortcode,e);if(t)return{index:t.index,content:t.content,options:{shortcode:t.shortcode}}}}},add:function(e,r){var i,s,o,u;i=r.extend?wp.mce.view.get(r.extend):r.shortcode?wp.mce.view.defaults.shortcode:wp.mce.view.defaults.pattern,_.defaults(r,i),r.id=e,u={remove:function(){return delete n[this.el.id],this.$el.parent().remove(),s&&s.apply(this,arguments),this}},_.isFunction(r.view)?o=r.view:(o=i.view,s=r.view.remove,_.defaults(u,r.view)),s||o._mceview||(s=o.prototype.remove),r.view=o.extend(u,{_mceview:!0}),t[e]=r},get:function(e){return t[e]},remove:function(e){delete t[e]},toViews:function(e){var n,r=[{content:e}];return _.each(t,function(e,t){n=r.slice(),r=[],_.each(n,function(n){var i,s=n.content;if(n.processed)return r.push(n),void 0;for(;s&&(i=e.toView(s));)i.index&&r.push({content:s.substring(0,i.index)}),r.push({content:wp.mce.view.toView(t,i.options),processed:!0}),s=s.slice(i.index+i.content.length);s&&r.push({content:s})})}),_.pluck(r,"content").join("")},toView:function(t,r){var i,s,o=wp.mce.view.get(t);return o?(i=new o.view(_.extend(r||{},{viewType:t})),s=i.el.id=i.el.id||_.uniqueId("__wpmce-"),n[s]=i,i.$wrapper=e(),wp.html.string({tag:"span"===i.tagName?"span":"div",attrs:{"class":"wp-view-wrap wp-view-type-"+t,"data-wp-view":s,contenteditable:!1}})):""},render:function(t){e(".wp-view-wrap",t).each(function(){var t=e(this),n=wp.mce.view.instance(this);n&&(n.$wrapper=t,n.render(),n.$el.detach(),t.empty().append(n.el).append('<span data-wp-view-end class="wp-view-end"></span>'))})},toText:function(e){return e.replace(/<(?:div|span)[^>]+data-wp-view="([^"]+)"[^>]*>.*?<span[^>]+data-wp-view-end[^>]*><\/span><\/(?:div|span)>/g,function(e,t){var r,i=n[t];return i&&(r=wp.mce.view.get(i.options.viewType)),i&&r?r.text(i):""})},removeInternalAttrs:function(e){var t={};return _.each(e,function(e,n){-1===n.indexOf("data-mce")&&(t[n]=e)}),t},attrs:function(e){return wp.mce.view.removeInternalAttrs(wp.html.attrs(e))},instance:function(t){var r=e(t).data("wp-view");return r?n[r]:void 0},select:function(t){var n=e(t);n.hasClass("selected")||(n.addClass("selected"),e(t.firstChild).trigger("select"))},deselect:function(t){var n=e(t);n.hasClass("selected")&&(n.removeClass("selected"),e(t.firstChild).trigger("deselect"))}}}(jQuery);