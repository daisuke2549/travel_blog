<?php
if ( ! isset( $content_width ) ) $content_width = 850;
// RSS2 feed 
add_theme_support( 'automatic-feed-links' );

//editor
function my_theme_add_editor_styles() {
    add_editor_style('//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    add_editor_style(diver_minifier_file('/editor-style.css','/editor-style.min.css','css'));
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );

function extend_tiny_mce_before_init( $mce_init ) {

    $mce_init['cache_suffix'] = 'v='.time();

    return $mce_init;    
}
add_filter( 'tiny_mce_before_init', 'extend_tiny_mce_before_init' );


if (!function_exists('override_mce_options')){
  function override_mce_options( $init_array ) {
      global $allowedposttags;

      $init_array['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
      $init_array['indent']                  = true;
      $init_array['wpautop']                 = true;
      $init_array['force_p_newlines']        = true;
      $init_array['valid_elements']          = '*[*]';
      $init_array['extended_valid_elements'] = '*[*]';
      $init_array['verify_html'] = false;
      $init_array['keep_styles'] = false;
      
      return $init_array;
  }
}
add_filter( 'tiny_mce_before_init', 'override_mce_options' ,9,1);


// アイキャッチ
add_theme_support( 'post-thumbnails');

function my_parse_query( $query ) {
    if(!isset($query->query_vars['paged']) && isset($query->query_vars['page']) ){
        $query->query_vars['paged'] = $query->query_vars['page'];
    }
}
add_action( 'parse_query', 'my_parse_query' );

//menu
add_theme_support( 'menus' ); //カスタムメニュー
register_nav_menu( 'header-navi', 'ヘッダーのナビゲーション' );
register_nav_menu('header-sub', 'ミニヘッダーのメニュー');
register_nav_menu('footer-navi', 'フッターのメニュー');
register_nav_menu('scroll-menu', '横スクロールメニュー(スマホのみ)');


//カスタムメニューに「説明」を追加
function prefix_nav_description( $item_output, $item, $depth, $args ) {
 if ( !empty( $item->description ) ) {
 $item_output = str_replace( '">' . $args->link_before . $item->title, '">' . $args->link_before . '<div class="menu_title">'. $item->title . '</div>' . '<div class="menu_desc">' . $item->description . '</div>' , $item_output );
 }
 return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );


function change_title_text_all( $title ){
    global $post;
    $title = '';

    switch ($post->post_type) {
      case 'post':
        $title = 'ここにタイトルを入力(32文字以内推奨)';
        break;

      case 'post':
        $title = '固定ページのタイトル';
        break;

      case 'cat-page':
        $title = 'カテゴリーページのタイトル';
        break;

      case 'lp':
        $title = 'LPのタイトル';
        break;

      case 'common':
        $title = '共通コンテンツのタイトル';
        break;
    }

  return $title;
}
add_filter( 'enter_title_here', 'change_title_text_all' );

add_filter( 'run_wptexturize', '__return_false' );


// 概要（抜粋）
if (!function_exists('my_excerpt_more')){
  function my_excerpt_more($more) {
  	return '…';
  }
}
add_filter('excerpt_more', 'my_excerpt_more');

if (!function_exists('my_excerpt_length')){
    function my_excerpt_length($length) {
    	return 120;
    }
}
add_filter('excerpt_length', 'my_excerpt_length');

if (!function_exists('my_excerpt_length')){
  function my_excerpt_length( $content ) {
      $content = strip_shortcodes( $content );
      return $content;
  }
}

function get_diver_excerpt($id, $length, $dot = true) {
  $mypost = get_post($id);
  $length = ($length ? $length : 120);
  $content = "";
  
  if(get_option('diver_seosetting',1)){
    $content = get_post_meta($id,'diver_single_metadescription',true);
  }

  if(!$content){
    $content = $mypost->post_content;
  }

  $content =  strip_shortcodes($content);
  $content =  preg_replace('/<!--more-->.+/is',"",$content);
  $content =  str_replace(']]>', ']]&gt;', $content);
  $content = preg_replace('/\[.+?\]/', "", $content);
  $content =  strip_tags($content);
  $content =  trim(preg_replace("/[\n\r\t ]+/", ' ', $content), ' ');
  $content =  str_replace("&nbsp;","",$content);
  $content =  mb_substr($content,0,$length);
  $content = esc_html($content);

  if($dot){
    $content .= apply_filters('get_diver_excerpt_dot','...');
  }
  return apply_filters('_get_diver_excerpt',$content);
}

//サイトドメイン
if (!function_exists('get_this_site_domain')){
  function get_this_site_domain(){
    preg_match( '/https?:\/\/(.+?)\//i', admin_url(), $results );
    return $results[1];
  }
}

// tagcloud
if (!function_exists('set_tag_cloud_args')){
  function set_tag_cloud_args($args) {
  $my_args = array(
  'smallest' => 12, 
  'largest' => 12, 
  'number' => apply_filters('set_tag_cloud_number',21),
  'unit' => 'px',
  'order' => 'RAND', );
  $args = wp_parse_args( $args, $my_args );
  return $args;
  }
}
add_filter('widget_tag_cloud_args', 'set_tag_cloud_args');

get_template_part('/lib/functions/category_tagcloud');


/************************************************

    main position

*************************************************/
function main_position(){
  $position = get_theme_mod('sidebar_position','right');
  $sidebarwidth = get_theme_mod('sidebar-size','310px');
  // $sidebarwidth = $sidebarwidth+get_theme_mod('sidebar-interval','20px');
  $sidebarwidth = preg_replace('/[^0-9\.]/','',$sidebarwidth);

  $unit = 'px';
  if($sidebarwidth < 100){
    $unit = '%';
    $sidebarwidth += 2;
  }else{
    $sidebarwidth += 20;
  }

  if(is_singular()){
      global $post;
      $position = get_theme_mod('sidebar_position_page','right');

      $oldset = get_post_meta($post->ID,'layout_name',true);
      $sidebarset = get_post_meta(get_the_ID(), 'single_sidebar_settings', true);

      if($oldset=="none"||$oldset=="layout_full" && !empty($sidebarset)){
          $sidebarset = 1;
      }

      if($sidebarset){
        $position = 'none';
      }
  }else if(is_category()){
      $postID = get_catpage_postID(get_query_var('category_name'));

      if($postID){
        $sidebarset = get_post_meta($postID, 'single_sidebar_settings', true);
        if($sidebarset){
          $position = 'none';
        }
      }
      
  }


  if($position=='none'):
    return "float:none";
  elseif($position=='left'):
    return "float:right;margin-left:-".$sidebarwidth.$unit.";padding-left:".$sidebarwidth.$unit.";";
  elseif($position=='right'):
    return "float:left;margin-right:-".$sidebarwidth.$unit.";padding-right:".$sidebarwidth.$unit.";";
  endif;

}

/************************************************

    widget shortcode

*************************************************/
add_filter('widget_text', 'do_shortcode');

/************************************************

    mobile

*************************************************/

function is_mobile(){
  $useragents = array(
    'iPhone', // iPhone
    'iPod', // iPod touch
    'Android.*Mobile', // 1.5+ Android *** Only mobile
    'Windows.*Phone', // *** Windows Phone
    'dream', // Pre 1.5 Android
    'CUPCAKE', // 1.5+ Android
    'blackberry9500', // Storm
    'blackberry9530', // Storm
    'blackberry9520', // Storm v2
    'blackberry9550', // Storm v2
    'blackberry9800', // Torch
    'webOS', // Palm Pre Experimental
    'incognito', // Other iPhone browser
    'webmate' // Other iPhone browser
  );

  $useragents = apply_filters('diver_mobile_filter',$useragents);  

	$pattern = '/'.implode('|', $useragents).'/i';
	return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

function is_Android() {
  $is_Android = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'Android');
  if ($is_Android) {
    return true;
  } else {
    return false;
  }
}


/************************************************

    Auth

*************************************************/

//auth
function remove_protected($title) {
       return '%s';
}
add_filter('protected_title_format', 'remove_protected');

if (!function_exists('diver_password_form')){
  function diver_password_form() {
    global $post;
    $html = '<div class="diver_password_wrap">';
    $html .= '<div class="diver_password_title">'.get_post_meta($post->ID, 'auth_before_content_title', true).'</div>';
    $html .= '<div class="diver_password_text">'.get_post_meta($post->ID, 'auth_before_content_text', true).'</div>';
    $html .=  '<form class="post_password" action="' .esc_url(site_url('wp-login.php?action=postpass', 'login_post')).'" method="post"><input name="post_password" type="password" size="24" /><input type="submit" name="Submit" value="' . esc_attr__("パスワード送信") . '" /></form></div>';
    return $html;
  }
}
add_filter('the_password_form', 'diver_password_form');

/************************************************

    Comment

*************************************************/

if (!function_exists('my_comment_notes_before')){
  function my_comment_notes_before( $defaults){
    $defaults['comment_notes_before'] = '';
    return $defaults;
  }
}
add_filter( "comment_form_defaults", "my_comment_notes_before");

ini_set("allow_url_fopen",1);

/************************************************

    file get

*************************************************/

function diver_file_get_contents($url, $timeout = 120){
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_HEADER, false );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
    // curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt( $ch, CURLOPT_MAXREDIRS, 10);
    $result = curl_exec( $ch );
    curl_close( $ch );
    return $result;
}

/************************************************

    file get

*************************************************/

if (!function_exists('color_to_rgb')){
  function color_to_rgb($hex){
    if ( substr( $hex, 0, 1 ) == "#" ) $hex = substr( $hex, 1 ) ;
    if ( strlen( $hex ) == 3 ) $hex = substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) . substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) . substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) ;
    return array_map( "hexdec", array( substr( $hex, 0, 2 ), substr( $hex, 2, 2 ), substr( $hex, 4, 2 ) ) ) ;
  }
}

/************************************************

    widget list category

*************************************************/

if (!function_exists('diver_list_categories')){
  function diver_list_categories( $output, $args ) {
    $output = preg_replace('/\<\/a\> \((.*)\)/', ' <span class="count">$1</span></a>', $output );

    return $output;
  }
}
add_filter( 'wp_list_categories', 'diver_list_categories', 10, 2 );

/************************************************

    widget list archive

*************************************************/

if (!function_exists('diver_archives_link')){
  function diver_archives_link($output) {
    $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/','<span class="count">$2</span></a>',$output);
    return $output;
  }
}
add_filter( 'get_archives_link', 'diver_archives_link', 10,2 );


/************************************************

    other

*************************************************/

if (!function_exists('custom_attribute')){
  function custom_attribute( $html ){
    if(is_amp()){
      $html = preg_replace('/class=".*\w+"\s/', '', $html);
    }
      return $html;
    }
  add_filter( 'post_thumbnail_html', 'custom_attribute' );
}


if (!function_exists('my_hide_edit_slug_box')){
  function my_hide_edit_slug_box() {
    $post_type = get_post_type();
      if ($post_type == 'cta' || $post_type == 'common' ) {
        echo '<style type="text/css">#edit-slug-box { display: none; }</style>';
      }
  }
}
add_action( 'admin_print_styles-post-new.php', 'my_hide_edit_slug_box' );
add_action( 'admin_print_styles-post.php', 'my_hide_edit_slug_box' );


/************************************************

    toc+

*************************************************/

function diver_convert_toc_to_amp ($the_content) {
  $pattern = '/<span id="AMP">/i';
  $append = '<span id="AMP-1">';
  if(preg_match($pattern,$the_content,$matches)){
    $the_content = preg_replace($pattern, $append, $the_content);
  }
  return $the_content;
}
add_filter('the_content','diver_convert_toc_to_amp', 9999);

if (!function_exists('toc_deregister_styles')){
  function toc_deregister_styles() {
    if(get_option('diver_postsettings_toc',0)){
      wp_dequeue_style('toc-screen');
    }
  }
}
add_action('wp_enqueue_scripts','toc_deregister_styles',100);

/************************************************

    user sns

*************************************************/

if (!function_exists('diver_user_contact_methods')){
  function diver_user_contact_methods( $user_contact ) {
    $user_contact['facebook'] = 'Facebook アカウント';
    $user_contact['twitter'] = 'Twitter アカウント';
    $user_contact['instagram'] = 'instagram アカウント';
    $user_contact['youtube'] = 'youtube アカウント';

    return $user_contact;
  }
}
add_filter( 'user_contactmethods', 'diver_user_contact_methods' );


/************************************************

    fix sns

*************************************************/

if (!function_exists('diver_fix_sns_boolean')){
  function diver_fix_sns_boolean(){
    $facebook = get_option('diver_sns_post_fixed-facebook',get_theme_mod('facebook','1'));
    $twitter = get_option('diver_sns_post_fixed-twitter',get_theme_mod('twitter','1'));
    $hatebu = get_option('diver_sns_post_fixed-hatebu',get_theme_mod('hatebu','1'));
    $pocket = get_option('diver_sns_post_fixed-pocket',get_theme_mod('pocket','1'));
    $feedly = get_option('diver_sns_post_fixed-feedly',get_theme_mod('feedly','1'));

    return ($facebook||$twitter||$hatebu||$pocket||$feedly);
  }
}


/************************************************

    new label

*************************************************/


if (!function_exists('diver_loop_newlabel')){
  function diver_loop_newlabel($entry) {
    $hours = get_theme_mod('newlabel',24);
    $today = date_i18n('U');
    $kiji = date('U',($today - $entry)) / 3600 ;
    if( $hours > $kiji ){
      echo '<span class="newlabel"><span>'.get_theme_mod('newlabeltitle','NEW!').'</span></span>';
    }
  }
}


/************************************************

    thumbnail

*************************************************/
if (!function_exists('blank_post_thumb_img')){
  function blank_post_thumb_img($size = 'full',$post_id = "") {
    global $post, $posts;

    if($post_id){
      $post = get_post($post_id); 
    }

    $first_img = "";

    $youtubeURL = get_post_meta( $post->ID,'diver_featured_youtube_url', true );
    $youtubeobj = get_youtube_thumbnail($youtubeURL);
    if($youtubeobj){
      $first_img = $youtubeobj['thumbnail_url'];
    }

    if(!$first_img){
      if(get_option('diver_option_base_replace_thumbnail',1)){

        $str = $post->post_content;
        $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
        if ( preg_match( $searchPattern, $str, $imgurl )){
          $img = wp_get_attachment_image_src(get_attachment_id($imgurl[2]),$size);
          $first_img = $imgurl[2];
        }
      }

      if(!$first_img){
        $first_img = get_option('thumbreplaceimg-uploader_img',get_template_directory_uri().'/images/noimage.gif');
      }
    }

    return $first_img;
  }
}


if (!function_exists('get_diver_thumb_img')){
  function get_diver_thumb_img($size = 'full',$lazyload = true, $alt = "img",$cap = false,$thumb = true,$thumb_id = ""){

    global $post;

    if( !get_option('diver_basesettings_lazyload_on',1)){
      $lazyload = false;
    }

    $thumb_id = ($thumb_id)?$thumb_id:get_post_thumbnail_id();
    if($alt == "img"){
      $alt = get_the_title();
    }

    if($thumb_id){
      $thumb_img = wp_get_attachment_image_src( $thumb_id , $size );
      $thumb_src = $thumb_img[0];
      $attachment = get_post( $thumb_id );
      $post_caption = $attachment->post_excerpt;

      $imagealt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );

      $alt = esc_attr( ($imagealt)?$imagealt:get_the_title() );

      $caption = "";
      if($post_caption && is_single() && $cap){
        $caption = "<figcaption>".$post_caption."</figcaption>";
      }

      if($lazyload && !is_amp()){
        return '<img src="data:image/gif;base64,R0lGODdhAQABAPAAAN3d3QAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$thumb_src.'" width="'.$thumb_img[1].'" height="'.$thumb_img[2].'" class="lazyload" alt="'.$alt.'">'.$caption;
      }else{
        return '<img src="'.$thumb_src.'" alt="'.$alt.'" width="'.$thumb_img[1].'" height="'.$thumb_img[2].'">'.$caption;
      }
    }elseif($thumb){
      $thumbreplaceimg_url = blank_post_thumb_img($size);
      if($lazyload){
        return ($thumbreplaceimg_url)?'<img src="data:image/gif;base64,R0lGODdhAQABAPAAAN3d3QAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$thumbreplaceimg_url.'" class="lazyload" alt="'.$alt.'">':'';
      }else{
        return ($thumbreplaceimg_url)?'<img src="'.$thumbreplaceimg_url.'" alt="'.$alt.'">':'';
      }
    }
    return apply_filters('get_orig_thumb_img',get_the_post_thumbnail($post->ID));

  }
}

if (!function_exists('get_diver_thumb_id_img')){
  function get_diver_thumb_id_img($post_id = "",$size = 'full',$lazyload = true, $alt = "img",$thumb = true){

    global $pagenow;
    if(!get_option('diver_basesettings_lazyload_on',1) || is_admin() || ($pagenow != 'edit.php')){
      $lazyload = false;
    }

    $post = get_post($post_id); 

    $thumb_id = get_post_thumbnail_id($post_id);
    if($alt == "img"){
      $alt = $post->post_title;
    }

    if($thumb_id){
      $thumb_img = wp_get_attachment_image_src( $thumb_id , $size );
      $thumb_src = $thumb_img[0];

      if($lazyload && !is_amp()){
        return '<img src="data:image/gif;base64,R0lGODdhAQABAPAAAN3d3QAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$thumb_src.'" width="'.$thumb_img[1].'" height="'.$thumb_img[2].'" class="lazyload" alt="'.$alt.'">';
      }else{
        return '<img src="'.$thumb_src.'" width="'.$thumb_img[1].'" height="'.$thumb_img[2].'" alt="'.$alt.'">';
      }
    }elseif($thumb){
      $thumbreplaceimg_url = blank_post_thumb_img($size,$post_id);
      if($lazyload){
        return ($thumbreplaceimg_url)?'<img src="data:image/gif;base64,R0lGODdhAQABAPAAAN3d3QAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$thumbreplaceimg_url.'" class="lazyload" alt="'.$alt.'">':'';
      }else{
        return ($thumbreplaceimg_url)?'<img src="'.$thumbreplaceimg_url.'" alt="'.$alt.'">':'';
      }
    }
    return apply_filters('get_orig_thumb_img',get_the_post_thumbnail($post_id));
  }
}

if (!function_exists('get_diver_thumb_id_img_src')){
  function get_diver_thumb_id_img_src($post_id = "",$size = 'full'){

    $post = get_post($post_id); 

    $thumb_id = get_post_thumbnail_id($post_id);

    if($thumb_id){
      $thumb_img = wp_get_attachment_image_src( $thumb_id , $size );
      $thumb_src = $thumb_img[0];
    }else{
      $thumb_src = blank_post_thumb_img($size,$post_id);

    }
    return $thumb_src;
  }
}

if (!function_exists('get_attachment_id')){
  function get_attachment_id($url)
  {
    global $wpdb;
    $sql = "SELECT ID FROM {$wpdb->posts} WHERE post_name = %s";
    preg_match('/([^\/]+?)(-e\d+)?(-\d+x\d+)?(\.\w+)?$/', $url, $matches);
    $post_name = $matches[1];
    return (int)$wpdb->get_var($wpdb->prepare($sql, $post_name));
  }
}


if (!function_exists('get_youtube_thumbnail')){
  function get_youtube_thumbnail($url){
    if($url){
      $oembed_url = "https://www.youtube.com/oembed?url={$url}&format=json";
      $ch = curl_init( $oembed_url );
      curl_setopt_array( $ch, [
        CURLOPT_RETURNTRANSFER => 1
      ] );
      $resp = curl_exec( $ch ); 
      return json_decode( $resp, true );
    }
  }
}

if (!function_exists('diver_single_eyecatch')){
  function diver_single_eyecatch($post_id){
    $html = '';
    if(get_option('diver_postsettings_icatch_on',get_theme_mod('single_icatch',1))){

      $youtubeURL = get_post_meta( $post_id,'diver_featured_youtube_url', true );
      $youtubeobj = get_youtube_thumbnail($youtubeURL);
      $eye_img_full = get_diver_thumb_img('full',false,'img',true ,false);

      if(!$youtubeURL && !$youtubeobj && $eye_img_full){
        $eye_img = wp_get_attachment_image_src( get_post_thumbnail_id($post_id) , 'medium' );
        $eyecatch_bg = (get_option('diver_postsettings_icatchbg_on',get_theme_mod('single_icatch_bg',1)))?'style="background-image:url('.$eye_img[0].')"':'';
        $html = '<figure class="single_thumbnail" '.$eyecatch_bg.'>'.$eye_img_full.'</figure>';
      }else if($youtubeobj){

        $diver_featured_youtube_inline = get_post_meta($post_id, 'diver_featured_youtube_inline', true );
        $diver_featured_youtube_controls = get_post_meta($post_id, 'diver_featured_youtube_controls', true );

        $mov_parm = $diver_featured_youtube_inline?'&playsinline=1':'';
        $mov_parm .= $diver_featured_youtube_controls?'&controls=0':'';

        $mov_parm = apply_filters('diver_featured_youtube_param',$mov_parm,$post_id);

        $youtube_iframe = $youtubeobj['html'];

        if ( strpos( $youtube_iframe, 'feature=oembed' ) !== false ){
          $youtube_iframe = str_replace( 'feature=oembed', 'feature=oembed'.$mov_parm, $youtube_iframe );
        }

        $html = '<div class="featured_youtube">'.$youtube_iframe.'</div>';
      }
    }
    return $html;
  }
}


// if ( strpos( $obj->html, 'feature=oembed' ) !== false ){

//                   $diver_featured_youtube_inline = get_post_meta( get_the_ID(), 'diver_featured_youtube_inline', true );
//                   $diver_featured_youtube_auto = get_post_meta( get_the_ID(), 'diver_featured_youtube_auto', true );


//                   $obj->html = str_replace( 'feature=oembed', 'feature=oembed&playsinline=1', $obj->html );
//                 }


/************************************************

    page check

*************************************************/
function diver_page_check($position){

if($position=='all'){
  return true;
}

if( is_front_page() || is_home() ):
  if($position=='top'){
      return true;
  }else{
      return false;
  }
elseif( is_single() ):
  if($position=='single'){
      return true;
  }else{
      return false;
  }
else:
  return false;

endif;
}


/************************************************

    iframe

*************************************************/

if (!function_exists('wrap_iframe_in_div')){
function wrap_iframe_in_div($the_content) {
  if ( is_singular() ) {
    $the_content = preg_replace('/<iframe[^>]+?youtube\.com[^<]+?<\/iframe>/is', '<div class="youtube-container">${0}</div>', $the_content);
  }
  return $the_content;
  }
}
add_filter('the_content','wrap_iframe_in_div',13);

/************************************************

    version check

*************************************************/
if (!function_exists('wp_theme_version')){
  function wp_theme_version() {
    $theme = wp_get_theme(get_template());
    return $theme->get('Version');
  }
}

/************************************************

    remove nextpage

*************************************************/
if (!function_exists('diver_remove_nextpage')){
  function diver_remove_nextpage( $post ) {

  $meta_nextpage_pc = get_post_meta($post->ID, 'meta_nextpage_pc', true);
  $meta_nextpage_sp = get_post_meta($post->ID, 'meta_nextpage_sp', true);

  if(is_amp()||!is_mobile()&&$meta_nextpage_pc||is_mobile()&&$meta_nextpage_sp){
     global $pages, $multipage, $numpages;
     $multipage = 0;
     
     $content = str_replace("\n<!--nextpage-->\n", '<!--nextpage-->', $post->post_content);
     $content = str_replace("\n<!--nextpage-->", '<!--nextpage-->', $content);
     $content = str_replace("<!--nextpage-->\n", '<!--nextpage-->', $content);
     $pages = array( str_replace('<!--nextpage-->', '', $content) );
     
     $numpages = 1;
   }
  }
}
add_action( 'the_post', 'diver_remove_nextpage' );

/************************************************

    redirect

*************************************************/ 
if (!function_exists('diver_disable_redirect_canonical')){
function diver_disable_redirect_canonical( $redirect_url ) {

  if ( is_single() ){
    $subject = $redirect_url;
    $pattern = '/\/page\//'; // URLに「/page/」があるかチェック
    preg_match($pattern, $subject, $matches);

    if ($matches){
    //リクエストURLに「/page/」があれば、リダイレクトしない。
    $redirect_url = false;
    return $redirect_url;
    }
  }
}
}
add_filter('redirect_canonical','diver_disable_redirect_canonical');

/************************************************

    Reading time

*************************************************/ 

if (!function_exists('diver_post_reading_time')){
function diver_post_reading_time( $content ) {
  $word = mb_strlen(strip_tags($content));
  $m = floor($word / 400);
  $s = floor($word % 400 / (400 / 60));
  $time = ($m == 0 ? '' : $m . '分') . ($s == 0 ? '' : $s . '秒') ;
  return $time;
}
}


/************************************************

    jetpack pixel

*************************************************/ 
if (!function_exists('jetpack_amp_build_stats_pixel_url')){
  function jetpack_amp_build_stats_pixel_url() {
    global $wp_the_query;
    if ( function_exists( 'stats_build_view_data' ) ) {
      $data = stats_build_view_data();
    } else {
      $blog = Jetpack_Options::get_option( 'id' );
      $tz = get_option( 'gmt_offset' );
      $v = 'ext';
      $blog_url = parse_url( site_url() );
      $srv = $blog_url['host'];
      $j = sprintf( '%s:%s', JETPACK__API_VERSION, JETPACK__VERSION );
      $post = $wp_the_query->get_queried_object_id();
      $data = compact( 'v', 'j', 'blog', 'post', 'tz', 'srv' );
    }
    $data['host'] = isset( $_SERVER['HTTP_HOST'] ) ? rawurlencode( $_SERVER['HTTP_HOST'] ) : '';
    $data['rand'] = 'RANDOM'; // amp placeholder
    $data['ref'] = 'DOCUMENT_REFERRER'; // amp placeholder
    $data = array_map( 'rawurlencode' , $data );
    return add_query_arg( $data, 'https://pixel.wp.com/g.gif' );
  }
}

/************************************************

    mime types

*************************************************/ 

if (!function_exists('diver_upload_mime_types')){
  function diver_upload_mime_types( $mimes ) {
    $mimes['json'] = 'application/json';
    return $mimes;
  }
}
add_filter( 'upload_mimes', 'diver_upload_mime_types' ,1,1);


add_filter( 'wp_check_filetype_and_ext', 'wpse_file_and_ext', 10, 4 );
function wpse_file_and_ext( $types, $file, $filename, $mimes ) {
    if ( false !== strpos( $filename, '.json' ) ) {
        $types['ext'] = 'json';
        $types['type'] = 'application/json';
    }

    return $types;
}

if (!function_exists('my_addquicktag_post_types')){
  function my_addquicktag_post_types( $post_types ) {
      $post_types[] = 'lp';
      return $post_types;
  }
}
add_filter( 'addquicktag_post_types', 'my_addquicktag_post_types' );

add_filter('get_lastpostmodified','__return_false');

 if (!function_exists('min_style')){
    function min_style( $style_uri, $style_dir_uri ) {
 
        $style = str_replace( trailingslashit( $style_dir_uri ), '', $style_uri );
        $style = str_replace( '.css', '.min.css', $style );
 
        if ( file_exists( trailingslashit( STYLESHEETPATH ) . $style ) ) {
            $style_uri = trailingslashit( $style_dir_uri ) . $style;
        }
 
        return $style_uri;
 
    }
    add_filter( 'stylesheet_uri', 'min_style', 10, 2 );
}

remove_filter('pre_user_description', 'wp_filter_kses');
