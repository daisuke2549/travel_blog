<?php
if (!function_exists('diver_posts_loop')){
	function diver_posts_loop($layout = "default"){

		if($layout == "default"){
			$layout = (!is_mobile())?get_theme_mod('post_layout','list'):get_theme_mod('post_sp_layout','list');
		}

		$layout = apply_filters('diver_custom_posts_loop',$layout);

		ob_start();

		if($layout == 'grid'):
			return get_template_part('loop','grid');
		elseif($layout == 'list'):
			get_template_part('loop');
		elseif($layout == 'minilist'):
			get_template_part('loop','mini');
		endif;

		$loop = ob_get_contents();

		ob_end_clean();

		return $loop;
	}
}

// function my_custom_posts_loop ($layout) {
// 	if(is_tag()){
// 		return 'minilist';
// 	}
// 	return $layout;
// }

// add_filter( 'diver_custom_posts_loop', 'my_custom_posts_loop', 10, 1 );