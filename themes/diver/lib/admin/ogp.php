<?php
function diver_meta_ogp() {
  if( is_front_page() || is_home() || is_singular() ){
    global $post;
    $diver_ogp_title = get_option('diver_ogp_title',get_option('diver_seo_title',get_bloginfo('name')));
    $diver_ogp_description = get_option('diver_ogp_description',get_option('diver_seo_description',get_bloginfo( 'description' )));
    $diver_ogp_mainimg = get_option('ogpmainimg-uploader_img');
    $diver_ogp_fb_page_url = get_option('diver_ogp_fb_page_url',get_option('diver_ogp_fb_page_url',''));
    $diver_ogp_fb_adminid = get_option('diver_ogp_fb_adminid',get_option('diver_ogp_fb_adminid',''));
    $diver_ogp_fb_appid = get_option('diver_ogp_fb_appid',get_option('diver_ogp_fb_appid',''));
    $diver_ogp_tw_style = get_option('diver_ogp_tw_style','summary_large_image');
    $diver_ogp_tw_id = get_option('diver_ogp_tw_id',get_option('diver_ogp_tw_id'));

    if(is_singular()&&!is_front_page()) { //記事＆固定ページ
       setup_postdata($post);
       $ogp_title = $post->post_title;
       $desc = get_diver_excerpt($post->ID,100,false);
       $desc_val = get_post_meta(get_the_ID(),'diver_single_metadescription',true);
       $desc = ($desc_val)?$desc_val:$desc;
       $desc = strip_tags($desc);  
       $ogp_descr = $desc;
       $ogp_url = get_permalink();
       wp_reset_postdata();
    }else{
      $ogp_title = $diver_ogp_title;
      $ogp_descr = $diver_ogp_description;
      $ogp_url = home_url('/');
    }

    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

    $ogp_img = $diver_ogp_mainimg;

    if (is_single()||is_page()){
      $str = $post->post_content;
      $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
      if (has_post_thumbnail()){
        $image_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src( $image_id, 'full');
        $ogp_img = $image[0];
      } else if ( preg_match( $searchPattern, $str, $imgurl )){
        $ogp_img = $imgurl[2];
      } 
    }

    if( is_front_page() || is_home()){
      $ogp_img = $diver_ogp_mainimg;
    }

    if (get_post_type() === 'lp'){
      $ogp_img = get_post_meta($post->ID, 'lpfirstview-uploader_img', true);
    }

    $ogp_img = apply_filters('diver_custom_ogp_img',$ogp_img);


    //出力するOGPタグをまとめる
    $insert = '<!-- Diver OGP -->' . "\n";
    $insert .= '<meta property="og:locale" content="ja_JP" />' . "\n";
    $insert .= '<meta property="og:title" content="'.esc_attr($ogp_title).'" />' . "\n";
    $insert .= '<meta property="og:description" content="'.esc_attr($ogp_descr).'" />' . "\n";
    $insert .= '<meta property="og:type" content="'.$ogp_type.'" />' . "\n";
    $insert .= '<meta property="og:url" content="'.esc_url($ogp_url).'" />' . "\n";
    $insert .= '<meta property="og:image" content="'.esc_url($ogp_img).'" />' . "\n";
    $insert .= '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />' . "\n";

    //twitter
    if($diver_ogp_tw_id){
      $insert .= '<meta name="twitter:site" content="'.$diver_ogp_tw_id.'" />' . "\n";
    }
      $insert .= '<meta name="twitter:card" content="'.$diver_ogp_tw_style.'" />' . "\n";
      $insert .= '<meta name="twitter:title" content="'.esc_attr($ogp_title).'" />' . "\n";
      $insert .= '<meta name="twitter:url" content="'.esc_url($ogp_url).'" />' . "\n";
      $insert .= '<meta name="twitter:description" content="'.esc_attr($ogp_descr).'" />' . "\n";
      $insert .= '<meta name="twitter:image" content="'.esc_url($ogp_img).'" />' . "\n";

    //facebook
    if($diver_ogp_fb_adminid && $diver_ogp_fb_appid){
      $insert .= '<meta property="fb:admins" content="'.$diver_ogp_fb_adminid.'">' . "\n";
      $insert .= '<meta property="fb:app_id" content="'.$diver_ogp_fb_appid.'">' . "\n";
    }

    $insert .= '<!-- / Diver OGP -->' . "\n";

    echo $insert;
  }
}