<?php
if (!function_exists('diver_option_get_adsence')){
  function diver_option_get_adsence($type = ''){
    if(get_option('diver_option_base_ad_client')&&get_option('diver_option_base_ad_slot')&&!is_customize_preview()):
      $diver_option_base_ad_client = get_option('diver_option_base_ad_client');
      $diver_option_base_ad_slot = get_option('diver_option_base_ad_slot');
      $diver_option_base_ad_text = get_option('diver_option_base_ad_text',0);

      if($type=='0'){
        return;
      }


      if(!strstr($diver_option_base_ad_client,'ca-pub-') && $diver_option_base_ad_client){
        $diver_option_base_ad_client = 'ca-pub-'.$diver_option_base_ad_client;
      }

      global $post;
      $adremove = get_post_meta($post->ID, "ad_remove", true);

      if(!$adremove && $post->post_status == 'publish'){
        if(!is_amp()){
          $adsence = '<div class="clearfix diver_widget_adarea hid">';
          if($diver_option_base_ad_text){
            $adsence .= '<div class="diver_widget_adlabel">スポンサーリンク</div>';
          }
          if(!is_mobile()){
            if($type=='1'){
              $adsence .= '<div class="col2"><div class="diver_ad">
                      <ins class="adsbygoogle" style="display:block" data-ad-client="'.$diver_option_base_ad_client.'" data-ad-slot="'.$diver_option_base_ad_slot.'" data-ad-format="rectangle"></ins>
                      <script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div></div><div class="col2"><div class="diver_ad">
                      <ins class="adsbygoogle" style="display:block" data-ad-client="'.$diver_option_base_ad_client.'" data-ad-slot="'.$diver_option_base_ad_slot.'" data-ad-format="rectangle"></ins>
                      <script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div></div></div>';
            }else if($type=='3'){
               $adsence .= '<div class="diver_ad">
                      <ins class="adsbygoogle" style="display:block" data-ad-client="'.$diver_option_base_ad_client.'" data-ad-slot="'.$diver_option_base_ad_slot.'" data-ad-format="rectangle"></ins>
                      <script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div></div>';
            }else{
               $adsence .= '<div class="diver_ad">
                      <ins class="adsbygoogle" style="display:block" data-ad-client="'.$diver_option_base_ad_client.'" data-ad-slot="'.$diver_option_base_ad_slot.'" data-ad-format="horizontal"></ins>
                      <script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div></div>';
            }
          }else{
             $adsence .= '<div class="diver_ad">
            <ins class="adsbygoogle" style="display:block" data-ad-client="'.$diver_option_base_ad_client.'" data-ad-slot="'.$diver_option_base_ad_slot.'" data-ad-format="auto"></ins>
            <script>(adsbygoogle = window.adsbygoogle || []).push({});</script></div></div>';
          }
        }else{
          $adsence = '';
            if($diver_option_base_ad_text){
              $adsence .= '<div class="diver_widget_adlabel">スポンサーリンク</div>';
            }
             $adsence .= '<amp-ad layout="responsive" width=300 height=250 type="adsense" data-ad-client="'.$diver_option_base_ad_client.'" data-ad-slot="'.$diver_option_base_ad_slot.'"></amp-ad>';
        }
        return $adsence;
      }
   endif;
  }
}
/************************************************

    Adsence

*************************************************/

if (!function_exists('diver_add_before_h2')){
  function diver_add_before_h2($the_content) {
  //広告（AdSense）タグを記入
    global $post;
    $adremove = get_post_meta($post->ID, "ad_remove", true);

    if ( is_single() && !is_customize_preview() && get_post_type() != 'lp' && !$adremove && $post->post_status == 'publish') {

      $h2 = '/^<h2.*?>.+?<\/h2>$/im';
      if ( preg_match_all( $h2, $the_content, $h2s )) {
          if (isset($h2s[0][0])) {
            if(is_amp()){

              if(get_option('diver_option_base_ad_amph2_custom')){
                $ad = do_shortcode(get_option('diver_option_base_ad_amph2_custom'));
              }else{
                $ad = diver_option_get_adsence(get_option('diver_option_base_ad_amph2'));
              }
            }else{
              ob_start();//バッファリング
              (is_active_sidebar( 'widget-h2' ))?dynamic_sidebar( 'widget-h2' ):'';
              $ad_template = ob_get_clean();

              $ad = $ad_template;
              if(get_option('diver_option_base_ad_posth2') != 4){
                $ad .= diver_option_get_adsence(get_option('diver_option_base_ad_posth2'));
              }else{
                $ad .= do_shortcode(get_option('diver_option_base_ad_posth2_custom'));
              }
            }
            $the_content  = str_replace($h2s[0][0], $ad.$h2s[0][0], $the_content);
          }
          if (isset($h2s[0][1])) {
            if(is_amp()){
              if(get_option('diver_option_base_ad_amph2_2_custom')){
                $ad = do_shortcode(get_option('diver_option_base_ad_amph2_2_custom'));
              }else{
                $ad = diver_option_get_adsence(get_option('diver_option_base_ad_amph2_2'));
              }
            }else{
              if(get_option('diver_option_base_ad_posth2_2') != 4){
                $ad = diver_option_get_adsence(get_option('diver_option_base_ad_posth2_2'));
              }else{
                $ad = do_shortcode(get_option('diver_option_base_ad_posth2_2_custom'));
              }
            }
            $the_content  = str_replace($h2s[0][1], $ad.$h2s[0][1], $the_content);
          }
          if (isset($h2s[0][2])) {
            if(is_amp()){
              if(get_option('diver_option_base_ad_amph2_3_custom')){
                $ad = get_option('diver_option_base_ad_amph2_3_custom');
              }else{
                $ad = diver_option_get_adsence(get_option('diver_option_base_ad_amph2_3'));
              }
            }else{
              if(get_option('diver_option_base_ad_posth2_3') != 4){
                $ad = diver_option_get_adsence(get_option('diver_option_base_ad_posth2_3'));
              }else{
                $ad = do_shortcode(get_option('diver_option_base_ad_posth2_3_custom'));
              }
            }
            $the_content  = str_replace($h2s[0][2], $ad.$h2s[0][2], $the_content);
          }
        }

          if(get_option('diver_option_base_ad_more') != 4){
            $ad = diver_option_get_adsence(get_option('diver_option_base_ad_more'));
          }else{
            $ad = get_option('diver_option_base_ad_more_custom');
          }
          $the_content = preg_replace( '/(<p>)?<span id="more-([0-9]+?)"><\/span>(.*?)(<\/p>)?/i', "$ad$0", $the_content );
      }
    return $the_content;
  }
}
add_filter('the_content','diver_add_before_h2',999);