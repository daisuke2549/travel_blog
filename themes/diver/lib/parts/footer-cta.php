<?php
$diver_option_footer_cta_title = do_shortcode(get_option('diver_option_footer_cta_title'));
$diver_option_footer_cta_txt = do_shortcode(get_option('diver_option_footer_cta_txt'));
$fctaimg = get_option('fctaimg-uploader_img');
$diver_footercta_bgcolor = get_option('diver_footercta_bgcolor','#333');
$diver_footercta_bgalpha = get_option('diver_footercta_bgalpha','0.4');
$diver_footercta_text = get_option('diver_footercta_text','#fff');
$diver_option_footer_cta_url = get_option('diver_option_footer_cta_url');
$diver_option_footer_cta_target = get_option('diver_option_footer_cta_target',1);
$diver_option_footer_cta_nofollow = get_option('diver_option_footer_cta_nofollow',1);

$target = "";
$nofollow = "";
if($diver_option_footer_cta_target){
	$target = 'target="_blank"';
}
if($diver_option_footer_cta_nofollow){
	$nofollow = 'rel="nofollow"';
}


if(!is_mobile()&&$fctaimg&&$diver_option_footer_cta_title&&diver_page_check(get_option('diver_option_footer_cta_view','all'))){
	// if(is_mobile()&&$diver_footercta_sp=="sp"){
	// 	$fctaimg = get_option('fctaimgsp-uploader_img');
	// 	$diver_option_footer_cta_url = get_option('diver_option_footer_cta_url');
	// }

	$bghex = color_to_rgb($diver_footercta_bgcolor);

	$content = '<a class="fcta_open" style="color:'.$diver_footercta_text.';background:rgba('.$bghex[0].','.$bghex[1].','.$bghex[2].','.$diver_footercta_bgalpha.');"><i class="fa fa-angle-double-up"></i></a>';
	$content .= '<div id="footer_cta" class="clearfix" style="background:rgba('.$bghex[0].','.$bghex[1].','.$bghex[2].','.$diver_footercta_bgalpha.');">';
	$content .= '<a class="close" style="color:'.$diver_footercta_text.';">×</a>';
	$content .= '<div class="footer_cta_wrap clearfix"><a class="wrap_link" href="'.$diver_option_footer_cta_url.'" '.$target.' '.$nofollow.'></a><div class="footer_cta_meta" style="color:'.$diver_footercta_text.';">';
	$content .= '<div class="title">'.$diver_option_footer_cta_title.'</div>';
	$content .= '<div class="desc">'.$diver_option_footer_cta_txt.'</div>';
	$content .= '</div>';

	// if(is_mobile()&&$diver_footercta_sp=="sp"){
	// 	$fctaimg = get_option('fctaimgsp-uploader_img');
	// }

	if($fctaimg){
		$content .= '<figure class="footer_cta_img"><img class="lazyload" src="data:image/gif;base64,R0lGODdhAQABAPAAAN3d3QAAACwAAAAAAQABAAACAkQBADs=" data-src="'.$fctaimg.'" alt="footer_cta_ad"></figure>';
	}

	$content .= '</div></div>';
	echo $content;
}