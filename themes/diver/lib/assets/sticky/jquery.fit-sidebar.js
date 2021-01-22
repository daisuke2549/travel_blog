;(function($){
	var s = $.fitSidebar = function(target, option){
		var o = this, c = o.config = $.extend({}, s.defaults, option);
		c.target = $(target).addClass('fit-sidebar');
		c.blank = $('<div/>').addClass(s.id + '-blank').insertBefore(c.target);
		c.blank.css({
			'width' : c.target.width(),
			'float' : c.target.css('float')
		});

		c.wrapper = $(c.target).parents(c.wrapper);
		c._win = $(window)
			.on('scroll', function(){
				o.adjustPosition();
			})
			.on('resize', function(){
				c.target.hasClass('for-chrome-bug');
				o.adjustPosition();
			});
		setTimeout(function(){
			o.adjustPosition();
		},0);

		if(c.target.css('float')=="right"){
			var margin = parseInt(c.wrapper.innerWidth(), 10) - parseInt(c.target.innerWidth(), 10);
			c.target.css('margin-left',margin+'px');
		}
	}
	$.extend($.fitSidebar.prototype, {
		adjustPosition : function(){
			var o = this, c = o.config;
			if(c._win.width() < c.responsiveWidth){
				c.wrapper.removeClass(c.fixedClassName);
				c.wrapper.addClass(c.noFixedClassName);
				c.target.removeClass(s.id + '-fixed');
				c.blank.hide();
				c.target.width('auto');
				c.direction = null;
				return;
			}
			c.wrapper.addClass(c.fixedClassName);
			c.wrapper.removeClass(c.noFixedClassName);
			c.target.addClass(s.id + '-fixed');
			var offset = c.blank.show().offset();
			var scrollTop = c._win.scrollTop()
			var outerHeight = c.target.outerHeight();
			if(outerHeight > c._win.height()) outerHeight += c.offset_top;

			var overHeight = outerHeight - c._win.height();
			if(overHeight < 0) overHeight = 0;
			if(!c.direction){
				c.lastFixedTop = c.lastDownFixedTop = c.lastUpFixedTop = offset.top - scrollTop;
				c.lastScrollTop = c.lastDownScrollTop = c.lastUpScrollTop = scrollTop;
			}
			c.target.width(c.blank.width());
			c.blank.height(c.target.height());

			c.direction = scrollTop < c.lastScrollTop ? 'up' : 'down';
			var adjustDown = function(){
				var top = c.lastUpFixedTop + (c.lastUpScrollTop - scrollTop)
				if(top < c.offset_top){
					if(top + overHeight < c.offset_top){
						top = -overHeight + c.offset_top;
						var limit = c.wrapper.offset().top + c.wrapper.height();
						var pos = scrollTop + outerHeight + top;
						if(pos > limit){
							top = (limit - scrollTop) - outerHeight;
						}
					}
				}
				c.target.css({
					top : top,
					bottom : 'auto'
				});
				c.lastDownFixedTop = top;
				c.lastDownScrollTop = scrollTop;
			}
			var adjustUp = function(){
				var top = c.lastDownFixedTop + (c.lastDownScrollTop - scrollTop)
				if(top > c.offset_top){
					top = offset.top-scrollTop;
					if(top < c.offset_top) top = c.offset_top;
				}
				c.target.css({
					top : top,
					bottom : 'auto'
				});
				c.lastUpFixedTop = top;
				c.lastUpScrollTop = scrollTop;
			}
			if(c.direction == 'down'){
				adjustDown();
			}
			else{
				adjustUp();
			}
			c.lastFixedTop = top;
			c.lastScrollTop = scrollTop;
		}
	});
	$.fn.fitSidebar = function(option){
		return this.each(function(){
			var el = $(this);
			el.data(s.id, new $.fitSidebar(el, option));
		});
	}
	$.extend(s, {
		defaults : {
			wrapper : 'body',	// 各カラムを包括する親又は先祖要素
			responsiveWidth : 0,	// レスポンシブのブレークポイント
			fixedClassName : 'fit-sidebar-fixed-now',	// 固定時に wrapperパラメータ指定要素に割り当てられるクラス名
			noFixedClassName : 'fit-sidebar-no-fixed-now',	// 非固定時に wrapperパラメータ指定要素に割り当てられるクラス名
			offset_top : 0
		},
		id : 'fit-sidebar'
	});
})(jQuery);
