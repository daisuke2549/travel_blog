(function( $ ) {
    //カラーピッカーを導入するためのクラスを指定します
    $(function() {
    	var options = {
	        defaultColor: false,
	        change: function(event, ui){},
	        clear: function() {},
	        hide: true,
	        palettes: true
	    };
        $('.myColorPicker').wpColorPicker(options);
    });
})( jQuery );