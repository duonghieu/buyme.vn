/**************************************************************
jQuery Menu Plugin v0.8
Copyright 2007-2008 James Nylen

Demo and Download:
http://hax.nylen.tv/jquery-menu/

Usage:

(1)----Make a menu like this:
<ul id="nav-menu">
  <li><a href="#">Item 1</a></li>
  <li><a href="#">Item 2</a>
    <ul>
      <li><a href="#">Item 2.1</a></li>
      <li><a href="#">Item 2.2</a></li>
    </ul>
  </li>
  <li><a href="#">Item 3</a></li>
</ul>
You can also use different tag names than ul and li for the
menu items and submenus, but submenus still have to be
*direct children of their parent menu items*.

(2)----Write your stylesheet
You have to set up the menus' stylesheets and positioning
yourself, including any hover-related effects.  To help with
styling the menus, this plugin will add the following classes
to the specified menu items:
.first - the first item in a menu or submenu
.last - the last item in a menu or submenu
.parent - a menu item that contains a submenu
.active - a parent item with an open submenu

(3)----Call the function
$('#nav-menu').menu();
-or-
$('#nav-menu').menu(options);
where options has one or more of the following properties:
{
  showDelay: [milliseconds to wait before showing a menu],
  switchDelay: [milliseconds to wait before switching to a
                different submenu on the same level],
  hideDelay: [milliseconds to wait before hiding a menu],
  itemSel: [selector that matches a menu item (default is li)],
  menuSel: [selector that matches a submenu (default is ul)],
  show: function() {
    //code to show a submenu
    //called with this == a submenu (ul or menuSel element)
    //by default, just sets this.visibility to visible
  }
  hide: function() {
    //code to hide a submenu
    //called with this == a submenu (ul or menuSel element)
    //by default, just sets this.visibility to hidden
  }
}
All properties are optional.  Delays default to 0ms.  You
should not use child or descendant selectors with itemSel and
menuSel, since itemSel and menuSel are always passed to the
jQuery children() function.

**************************************************************/

(function($) {
  $.fn.menu = function(opt) {
    opt = $.extend({
      showDelay: 0,
    	switchDelay: 0,
    	hideDelay: 0,
    	menuSel: 'ul',
    	itemSel: 'li',
    	show: function() {
    	  //this.style.visibility = 'visible';
		  $(this).fadeIn("fast");
    	},
    	hide: function() {
    	  //this.style.visibility = 'hidden';
		  $(this).fadeOut(70);
    	}
    }, opt);
  	setTo = function(action, time) {
  		var o = this;
  		$(o).attr('pending', action);
  		window.setTimeout(function() {
  			if($(o).attr('pending') == action) {
  				if(action == 'show') {
  					$(o).parent().addClass('active');
  					opt.show.call(o);
  				} else {
  					$(o).parent().removeClass('active');
  					opt.hide.call(o);
  				}
  			}
  		}, time);
  	};
  	$(this).children(opt.itemSel).each(function(i) {
  		if(i==0) $(this).addClass('first');
  		if(i==$(this).parent().children(opt.itemSel).length-1) $(this).addClass('last');
  		if($(this).children(opt.menuSel).length) $(this).addClass('parent').hover(function() {
  			var o = this;
  			$(this).parent().children('.active').each(function() {
  				if(this != o) setTo.call($(this).children(opt.menuSel).get(0), 'hide', opt.switchDelay);
  			});
  			setTo.call($(this).children(opt.menuSel).get(0), 'show', $(this).parent().children('.active').length ? opt.switchDelay : opt.showDelay);
  		}, function() {
  			setTo.call($(this).children(opt.menuSel).get(0), 'hide', opt.hideDelay);
  		});
  		$(this).children(opt.menuSel).each(function() {
  		  $(this).menu(opt);
  		});
  	});
  	return $(this);
  }
})(jQuery);
