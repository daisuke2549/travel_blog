<?php
// amp
function is_amp(){

  if(!apply_filters('diver_amp_enable',true)){
      return false;
  }

  if(empty($_GET['amp']) || !is_single()){
    return false;
  }

  if(!empty($_GET['amp']) && is_single()){
    return apply_filters('diver_amp_enable_all_set',get_post_meta(get_the_ID(), "amp_name", true));
  }

  return $false;
}


function add_post_format_template($single_template) {
  $new_template = $single_template;
  if(is_amp()){
      $new_template = locate_template('/lib/amp/single.php');
  }
  return $new_template;
}
add_filter( 'single_template', 'add_post_format_template' );