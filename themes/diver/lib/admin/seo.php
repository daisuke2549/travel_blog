<?php

/************************************************

		meta robot

*************************************************/

function diver_meta_robot(){
  $post_type = get_post_type();
  $robots = 'follow, noindex';
  $page = false;
  if (array_key_exists('page', $_GET))
  {
      $page = $_GET['page'];
  }

  if(is_home()||is_front_page()){
    $index = get_option('diver_seo_top_index',0)?'noindex':'index';
    $follow = get_option('diver_seo_top_index',0)?'nofollow':'follow';
    $robots = $index .','.$follow;
  }

  if(is_paged()) {
  $robots="follow, noindex";
  }else if ( $post_type == 'cat-page' || $post_type == 'cta' || $post_type == 'common' ){
    $robots="nofollow, noindex";
  }
  else if(is_archive()) {
  $robots="follow, noindex";
  }else if(is_single()||is_page()){
    global $post;
    $robots = "archive";
    $robots .= (get_post_meta($post->ID,'diver_single_nofollow',true))?", nofollow":", follow";
    $robots .= (get_post_meta($post->ID,'diver_single_noindex',true))?", noindex":", index";
  }

  if( is_post_type_archive( 'lp' ) ) {
    global $post;
    $robots = "";
    $robots .= (get_post_meta($post->ID,'diver_single_nofollow',true))?", nofollow":", follow";
    $robots .= (get_post_meta($post->ID,'diver_single_noindex',true))?", noindex":", index";  
  }

  if(is_tag()){
    $index = get_option('diver_seo_tag_index',1)?'noindex':'index';
    $follow = get_option('diver_seo_tag_follow',0)?'nofollow':'follow';
    $robots = $index .','.$follow;
  }

  if(is_category()){

    $index = get_option('diver_seo_cat_index',1)?'noindex':'index';
    $follow = get_option('diver_seo_cat_follow',0)?'nofollow':'follow';

    $cat_id = get_query_var('cat');
    $cat = get_category($cat_id);

    $args = array(
      'post_type' => 'cat-page',
      'numberposts' => '-1'
    );
    $posts = get_posts( $args );


    if(!is_paged()){

    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );
        $catpage_catID = get_post_meta($post->ID,'catpage_post_slug',true);
            if($cat->slug == $catpage_catID): 
              $index = (get_post_meta($post->ID,'diver_single_noindex',true))?"noindex":"index";
              $follow = (get_post_meta($post->ID,'diver_single_nofollow',true))?"nofollow":"follow";
            endif;endforeach;
        endif; wp_reset_postdata();
    }else{
      $index = 'noindex';
    }

    $robots = "archive,".$index .','.$follow;  
  }

  if(is_search()){
    $index = get_option('diver_seo_search_index',1)?'noindex':'index';
    $follow = get_option('diver_seo_search_follow',0)?'nofollow':'follow';
    $robots = $index .','.$follow;  
  }

  if(is_404()){
    $index = get_option('diver_seo_404_index',1)?'noindex':'index';
    $follow = get_option('diver_seo_404_follow',1)?'nofollow':'follow';
    $robots = $index .','.$follow;  
  }

  if(is_author()){
    $index = get_option('diver_seo_author_index',1)?'noindex':'index';
    $follow = get_option('diver_seo_author_follow',0)?'nofollow':'follow';
    $robots = $index .','.$follow;  
  }

  if(is_date()){
    $index = get_option('diver_seo_date_index',1)?'noindex':'index';
    $follow = get_option('diver_seo_date_follow',0)?'nofollow':'follow';
    $robots = $index .','.$follow;  
  }

  if(is_attachment()){
    $robots="follow, noindex";
  }

  $robots = apply_filters('custom_meta_robots',$robots);
  echo '<meta name="robots" content="'.$robots.'">'. "\n";
}


/************************************************

    meta thumbnail

*************************************************/

if (!function_exists('diver_meta_thumbnail')){
  function diver_meta_thumbnail(){
    if(is_single() || is_page()) {
        global $post;
        $src = get_diver_thumb_id_img_src($post->ID,"thumbnail");
        echo ($src)?'<meta name="thumbnail" content="'.$src.'" />':"";
    } 
  }
}

/************************************************

		link rel

*************************************************/

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); 
//カテゴリーページと分割ページでタグを出力
function rel_next_prev_link_tags() {
  if(is_single() || is_page()) {
      //1ページを複数に分けた分割ページ（マルチページ）の場合
    global $wp_query;
    $multipage = check_multi_page();
    if($multipage[0] > 1) {
      $prev = generate_multipage_url('prev');
      $next = generate_multipage_url('next');
      if($prev) {
        echo '<link rel="prev" href="'.$prev.'" />'.PHP_EOL;
      }
      if($next) {
        echo '<link rel="next" href="'.$next.'" />'.PHP_EOL;
      }
    }
  } else{
    //トップページやカテゴリページなどの場合
    global $paged;
    if ( get_previous_posts_link() ){
      echo '<link rel="prev" href="'.get_pagenum_link( $paged - 1 ).'" />'.PHP_EOL;
    }
    if ( get_next_posts_link() ){
      echo '<link rel="next" href="'.get_pagenum_link( $paged + 1 ).'" />'.PHP_EOL;
    }
  }
}
//適切なページのヘッダーにnext/prevを表示
add_action( 'wp_head', 'rel_next_prev_link_tags' );
 
//分割ページURLの取得
function generate_multipage_url($rel='prev') {
  global $post;
  $url = '';
  $multipage = check_multi_page();
  if($multipage[0] > 1) {
    $numpages = $multipage[0];
    $page = $multipage[1] == 0 ? 1 : $multipage[1];
    $i = 'prev' == $rel? $page - 1: $page + 1;
    if($i && $i > 0 && $i <= $numpages) {
      if(1 == $i) {
        $url = get_permalink();
      } else {
        if ('' == get_option('permalink_structure') || in_array($post->post_status, array('draft', 'pending'))) {
          $url = add_query_arg('page', $i, get_permalink());
        } else {
          $url = trailingslashit(get_permalink()).user_trailingslashit($i, 'single_paged');
        }
      }
    }
  }
  return $url;
}
 
//分割ページかチェックする
function check_multi_page() {
  $num_pages    = substr_count(
      $GLOBALS['post']->post_content,
      '<!--nextpage-->'
  ) + 1;
  $current_page = get_query_var( 'page' );
  return array ( $num_pages, $current_page );
}

/************************************************

		self pingback

*************************************************/

function diver_no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'diver_no_self_ping' );


/************************************************

		meta title

*************************************************/
// タイトル

function diver_meta_title(){

   if(get_option('diver_seosetting','1')){

      $sep = apply_filters('diver_title_sep','|');
      $hometitle = get_option('diver_seo_title',get_bloginfo('name'));

      if( is_front_page() || is_home() ){
        $title = $hometitle;
      }elseif( is_category() ){
        global $post;
          $category = get_category( intval( get_query_var('cat') ) );
          $title = get_ctapage_title($category->slug);
      }elseif( is_date() ){
        if( is_day() ){
          $title  = get_query_var( 'year' ).'年';
          $title .= get_query_var( 'monthnum' ).'月';
          $title .= get_query_var( 'day' ).'日';
        }elseif( is_month() ){
          $title  = get_query_var( 'year' ).'年';
          $title .= get_query_var( 'monthnum' ).'月';
        }elseif( is_year() ){
          $title  = get_query_var( 'year' ).'年';
        }
      }elseif( is_archive() ){
        $title = wp_title('');
      }elseif ( is_search() ){
        $title = '「' . get_search_query() . '」の検索結果 ';
      }else{
        $title = get_the_title();
      }

      global $page, $paged;
      if ( ( $paged >= 2 || $page >= 2 ) ) {
        $title = $title . sprintf( __( '(ページ%s)' ), max( $paged, $page ) );
      }

      if(get_option('diver_seo_sitetitle_set',0)){
        if( !is_front_page() && !is_home() ){
          $title = $title.' '.$sep.' '.$hometitle;
        }
      }
    }else{
      $title = wp_get_document_title();
    }

    $title = apply_filters('custom_meta_title',$title);

  return $title;
}

// function custom_title_separator($sep) {
//   $sep = '|';
//   return $sep;
// }
// add_filter( 'document_title_separator', 'custom_title_separator' );

// function rename_title( $title ){
//     $title['tagline'] = '';

//   if(get_option('diver_seosetting','1')){
//      $retitle = get_option('diver_seo_title',get_bloginfo('name'));

//     if ( is_home() || is_front_page() ){
//       $title['title'] = esc_html( $retitle );
//     }else{
//       $title['site'] = esc_html( $retitle );
//     }

//     if(!get_option('diver_seo_sitetitle_set',0)){
//       $title['site'] = '';
//     }

//   }
    
//   return $title;
// }
// add_filter( 'document_title_parts', 'rename_title');

/************************************************

		meta description

*************************************************/

// meta description
function get_meta_description() {
  global $post;
  $description = "";
  if ( is_home() || is_front_page() ) {
    if(get_option('diver_seosetting','1')){
      $description = get_option('diver_seo_description',get_bloginfo( 'description' ));
    }else{
      $description = get_bloginfo( 'description' );
    }
  }
  elseif ( is_category() ) {
    // カテゴリーページでは、カテゴリーの説明文を取得
    $description = category_description();

    $cat_id = get_query_var('cat');
    $cat = get_category($cat_id);

    $args = array(
      'post_type' => 'cat-page',
      'numberposts' => '-1'
    );
    $posts = get_posts( $args );

    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );
        $catpage_catID = get_post_meta($post->ID,'catpage_post_slug',true);
            if($cat->slug == $catpage_catID): 
              $description = get_post_meta($post->ID,'diver_single_metadescription',true);
            endif;endforeach;
        endif; wp_reset_postdata();

  }
  elseif ( is_single() || is_page()) {
      $description = get_diver_excerpt($post->ID,100,false);
      $description =  apply_filters('diver_post_description', $description);
  }
  $description = apply_filters('custom_post_description', $description);
  $description = strip_tags($description);
  return $description;
}
 
// echo meta description tag
function echo_meta_description_tag() {
  if ( is_home() || is_front_page() || is_category() || is_single() || is_page()) {
    if(get_option('diver_seo_description_tag_on',1)){
      echo '<meta name="description" content="' . get_meta_description() . '">' . "\n";
    }
  }
}


/************************************************

		canonial url

*************************************************/
remove_action('wp_head', 'rel_canonical');

function diver_canonical_url() {
	global $page, $paged;
	$canonical_url = '';

	if (is_home()) {
		$canonical_url  = get_bloginfo('url');
	} elseif (is_category()) {
		$canonical_url = get_category_link(get_query_var('cat'));
    $cat = get_category(get_query_var('cat'));

    $args = array(
      'post_type' => 'cat-page',
      'numberposts' => '-1'
    );
    $posts = get_posts( $args );

    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );
    $catpage_catID = get_post_meta($post->ID,'catpage_post_slug',true);
        if($cat->slug == $catpage_catID): 
          $custom_canonical = get_post_meta($post->ID,'diver_single_canonical',true);
          $canonical_url = ($custom_canonical)?$custom_canonical:$canonical_url;
        endif;endforeach;
    endif; wp_reset_postdata();

	} elseif (is_tag()){
		$canonical_url = get_term_link(get_query_var('tag_id'));
	} elseif (is_search()) {
		$canonical_url = get_search_link();
	} elseif (is_page() || is_single()) { 
    $canonical_url = get_post_meta(get_the_ID(), 'diver_single_canonical', true);
    if(!$canonical_url){
  		$canonical_url = get_permalink();
  		if ( $paged >= 2 || $page >= 2) {
  		    $canonical_url = $canonical_url.'page/'.max( $paged, $page ).'/';
  		}
    }
	} elseif(is_404()) {
		$canonical_url =  get_bloginfo('url')."/404";
	} else {
		$canonical_url  = get_bloginfo('url');
	}

  $canonical_url = apply_filters('custom_meta_canonical', $canonical_url);

	return $canonical_url;
}