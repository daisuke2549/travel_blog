<?php
function diver_customizer_enqueues() {
 
  wp_enqueue_style('alpha_color_picker_css',get_template_directory_uri().'/lib/assets/colorPicker/alpha-color-picker.css',array( 'wp-color-picker' ));
 
  wp_enqueue_script('alpha_color_picker_js',get_template_directory_uri().'/lib/assets/colorPicker/alpha-color-picker.js',array( 'jquery', 'wp-color-picker' ),'',true);
 
}
add_action( 'customize_controls_print_footer_scripts', 'diver_customizer_enqueues' );

function my_style() {
	//maincss
	wp_enqueue_style( 'diver-main-style', diver_minifier_file('/style.css','/style.min.css','css'));

	wp_deregister_style('parent-style');


	if(strpos(get_stylesheet_directory_uri(),'bc') !== "diver_child"){
		wp_enqueue_style( 'child-style', get_stylesheet_directory_uri()  . '/style.css',array(), null, 'all');
	}

	if(get_bloginfo('version') >= "5.0.0"){
		wp_enqueue_style( 'diver-block-style', diver_minifier_file('/lib/functions/editor/gutenberg/blocks.css','/lib/functions/editor/gutenberg/blocks.min.css','css'));
	}


	if(get_option('diver_option_firstview','0') == '4'){
		wp_enqueue_style( 'YTPlayer', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.2.9/css/jquery.mb.YTPlayer.min.css', array(), null, 'all');
		wp_enqueue_script( 'ytplayer', '//cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.2.9/jquery.mb.YTPlayer.min.js', array(), false, true );
	}

	if(!is_mobile()){
		// sticky
		wp_enqueue_script( 'sticky', get_template_directory_uri()  . '/lib/assets/sticky/jquery.fit-sidebar.min.js', array(), false, true );
	}

}
add_action( 'wp_enqueue_scripts', 'my_style');

function my_script() {
	wp_enqueue_script('jquery');

	 wp_enqueue_script('diver-main-js',diver_minifier_file('/lib/assets/diver.js','/lib/assets/diver.min.js','js'), array(), false, true);

	// lazysize
	wp_enqueue_script( 'unveilhooks', '//cdnjs.cloudflare.com/ajax/libs/lazysizes/4.1.5/plugins/unveilhooks/ls.unveilhooks.min.js', array(), false, true );
	wp_enqueue_script( 'lazysize', '//cdnjs.cloudflare.com/ajax/libs/lazysizes/4.1.5/lazysizes.min.js', array(), false, true );
  	
	//swiper
	if(get_theme_mod('pickup_tag','pickup')){
		wp_enqueue_style( 'swipercss','https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css', array(), null, 'all');
		wp_enqueue_script( 'swiperjs','https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js', array(), false, true);
	}

	// tweenmax
	wp_enqueue_script( 'tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js', array(), false, true );

	// lity
	wp_enqueue_script( 'lity','https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.js',array(), false, true );

	// tabbar
	$is_tabbar = false;
	for ($i = 1; $i <= get_option( 'diver_option_base_tabwidget','1'); $i++) {
	    if (is_active_sidebar('diver_tabwidget_'.$i)) { 
			$is_tabbar = true;
	        continue;
	    }
	}

	if($is_tabbar){
		wp_enqueue_script( 'tabbar',get_template_directory_uri()  . '/lib/assets/tabbar/tabbar-min.js',array(), false, true );
	}

	// prism
	wp_enqueue_script( 'prism',get_template_directory_uri()  . '/lib/assets/prism/prism.js',array(), false, true );

	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if (strstr($ua , 'trident') || strstr($ua , 'msie')) {
		wp_enqueue_script( 'flexibility', 'https://cdnjs.cloudflare.com/ajax/libs/flexibility/2.0.1/flexibility.js',array(), false, true );
		wp_enqueue_script( 'ofi','https://cdnjs.cloudflare.com/ajax/libs/object-fit-images/3.2.4/ofi.min.js',array(), false, true );
	}


	if ( is_singular() &&  get_theme_mod('comment_form_style','none') == 'normal') {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'my_script' );


function diver_footer_styles() {
	//fontAwesome
	wp_enqueue_style( 'fontAwesome4', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), null, 'all');
	// lity
	wp_enqueue_style( 'lity', 'https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.css', array(), null, 'all');
	// prism
	wp_enqueue_style( 'prism', get_template_directory_uri() . '/lib/assets/prism/prism.css', array(), null, 'all');

};
add_action( 'wp_footer', 'diver_footer_styles' );

function admin_scripts($hook) {
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'jquery-ui-dialog' );
	wp_enqueue_style( 'jquery-ui-dialog-min-css', includes_url().'css/jquery-ui-dialog.min.css' );
    wp_enqueue_script( 'jquery-ui-sortable' );

	wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('colorpicker-script',get_template_directory_uri() .'/lib/assets/colorPicker/colorpicker.js',array( 'wp-color-picker' ), false, true);
    wp_enqueue_style( 'fontAwesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), null, 'all');
    wp_enqueue_script( 'iconpicker', get_template_directory_uri()  . '/lib/assets/iconpicker/simple-iconpicker.js', array(), false, true );
    wp_enqueue_style( 'iconpicker', get_template_directory_uri()  . '/lib/assets/iconpicker/simple-iconpicker.css', array(), null, 'all');
    wp_enqueue_style('thickbox');
    wp_enqueue_script('thickbox');
    wp_enqueue_script( 'mediauploader', get_template_directory_uri()  . '/lib/assets/mediaupload/mediauploader.js', array(), false, true );
	wp_enqueue_media();
    wp_enqueue_script('mediauploader');
	wp_enqueue_script( 'ajaxpost', get_template_directory_uri() . '/lib/functions/editor/ajaxpost.js', array( 'jquery' ));  
    wp_localize_script( 'ajaxpost', 'paka3Posts', array('ajaxurl'=> admin_url( 'admin-ajax.php' )));
    wp_enqueue_style( 'style', get_template_directory_uri() . '/lib/functions/editor/style.css', array(), null, 'all');



	// if ( function_exists( 'wp_add_inline_script' ) ) {
	//     $editor_settings = wp_enqueue_code_editor( array( 'type' => 'text/css' ) );
	//     wp_add_inline_script(
	// 		'code-editor',
	// 		sprintf(
	// 			'jQuery( function() { wp.codeEditor.initialize( "css-editor", %s ); } );',
	// 			wp_json_encode( $editor_settings )
	// 		)
	// 	);
	// }
}
add_action('admin_enqueue_scripts', 'admin_scripts');


if ( ! is_admin() ) {
	function diver_remove_script_type($tag) {
		if(preg_match('/(diver\.min\.js|TweenMax|lity|tabbar|sticky|prism|YTPlayer)/',$tag)){
			$tag = str_replace("type='text/javascript'", "defer ", $tag);
		}else{
			$tag = str_replace("type='text/javascript'", "", $tag);
		}

		if(is_mobile()){
			return $tag;
		}
		return str_replace( ' src', 'src', $tag );
	}
	add_filter('script_loader_tag','diver_remove_script_type');

	function diver_remove_style_type($tag) {
		$tag = preg_replace( array( "| type='.+?'s*|","| id='.+?'s*|", '| />|' ), array( ' ',' ', '>' ), $tag );
		return $tag;
	}
	add_filter('style_loader_tag','diver_remove_style_type');


	add_filter( 'style_loader_src', 'add_file_ver_to_css_js');
	add_filter( 'script_loader_src', 'add_file_ver_to_css_js');
	if ( !function_exists( 'add_file_ver_to_css_js' ) ){
		function add_file_ver_to_css_js( $src ) {
		  if (strpos( $src, site_url() ) !== false) {
		    // //Wordpressのバージョンを除去する場合
		    if ( strpos( $src, 'ver=' ) ){
		      $src = remove_query_arg( 'ver', $src );
		    }
		    //クエリーを削除したファイルURLを取得
		    $removed_src = preg_replace('{\?.+$}i', '', $src);
		    $resource_file = str_replace(site_url('/'), ABSPATH, $removed_src );
		    $src = add_query_arg( 'ver',wp_theme_version(), $src );
		  }
		  return $src;
		}
	}

	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles' );
	remove_action('admin_print_styles', 'print_emoji_styles');
}