<?php
//appealbox
function diver_get_appeal($id){

  $appealtitle = get_post_meta($id,'appeal_title',true);
  $appealimgurl = get_post_meta($id,'appealimg-uploader_img',true);
  $appealdescription = get_post_meta($id,'appeal_description',true);

  if(!$appealtitle && !$appealimgurl && !$appealdescription){
    $id = get_option('diver_postsettings_appealbox');
  }

  $appealtitle = get_post_meta($id,'appeal_title',true);
  $appealimgurl = get_post_meta($id,'appealimg-uploader_img',true);
  $appealdescription = get_post_meta($id,'appeal_description',true);
  $appealbtntext = get_post_meta($id,'appeal_btntext',true);
  $appeallink = get_post_meta($id,'appeal_link',true);
  $appealtitlebg = (get_post_meta($id, 'appeal_titlebg', true))?get_post_meta($id, 'appeal_titlebg', true):'';
  $appealtitlecolor = (get_post_meta($id, 'appeal_titlecolor', true))?get_post_meta($id, 'appeal_titlecolor', true):'';
  $appealbg = (get_post_meta($id, 'appeal_bg', true))?get_post_meta($id, 'appeal_bg', true):'#fff';
  $appealcolor = (get_post_meta($id, 'appeal_color', true))?get_post_meta($id, 'appeal_color', true):'#333';
  $appealbtnbg = (get_post_meta($id, 'appeal_btnbg', true))?get_post_meta($id, 'appeal_btnbg', true):'#f44336';
  $appealbtncolor = (get_post_meta($id, 'appeal_btncolor', true))?get_post_meta($id, 'appeal_btncolor', true):'#fff';

  if($appealtitle || $appealimgurl || $appealdescription){
    $html = '<div class="appeal_box widget" style="background: '.$appealbg.'">';

    if($appealtitle){
      $html .= '<div class="widgettitle" style="background:'.$appealtitlebg.';color:'.$appealtitlecolor.';">'.$appealtitle.'</div>';
    }
    $html .= '<div class="appeal_meta" style="color:'.$appealcolor.';">';

    if($appealimgurl){   
      $html .= '<div class="appeal_img"><img src="'.esc_url($appealimgurl).'"></div>';
    }

    $html .= '<div class="appeal_desc">'.$appealdescription.'</div>';

    if($appealbtntext){
    $html .= '<div class="button"><a href="'.$appeallink.'" target="_brank" rel="nofollow" style="background:'.$appealbtnbg.';color:'.$appealbtncolor.';">'.$appealbtntext.'</a></div>';
    }
    $html .= '</div>';
    $html .= '</div>';

    echo $html;
  }
}