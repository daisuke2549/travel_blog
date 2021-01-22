<?php
// pre_get_posts
if (!function_exists('change_posts_per_page')){
  function change_posts_per_page($query) {

    if ( is_admin() || ! $query->is_main_query() || is_page()){
         return;
    }

    if ($query->is_search) {
      $query->set('post_type', apply_filters('diver_search_post_type',array( 'post',get_option('diver_option_base_main_search_page',1)?'':'page' )));
    }

    if (is_home() || is_front_page() || is_archive() || is_search()) {
      if(is_category() || is_tag() || is_archive() || is_search()){
        $query->set( 'ignore_sticky_posts', '1');
      }else{
        $query->set( 'post__not_in', get_option( 'sticky_posts' ));
      }

      if(get_theme_mod('post_sort','published')!='published'){
        $query->set('orderby','modified');
      }


      if ($query->is_home() && is_front_page()) {

        $notin = get_option( 'diver_option_base_loop_notin');
        $notinarr = explode(',',$notin);

        $pickup_cat = get_theme_mod('pickup_cat','none'); 
        if($pickup_cat != 'none'){
          array_push($notinarr,get_category_by_slug($pickup_cat)->cat_ID);
        }

        $query->set('category__not_in', $notinarr);
      }
      return;
    }
  }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );