<?php
//CTA
function diver_get_cta($pid = ""){
  global $post;
  $ctaID = get_post_meta($post->ID,'cta',true);
  if(!$ctaID||$ctaID==1||$ctaID=='default'){
     $ctaID = get_option('diver_postsettings_default_cta',0);
    }

  if(!empty($ctaID)&&$ctaID != 'none'){

    if(get_post_status($ctaID) != 'publish') return;
    $diverctaposts = get_post($ctaID);

    $ctabtntitle = get_post_meta($ctaID,'cta_btntext',true);
    $ctabtnurl = get_post_meta($ctaID,'cta_link',true);
    $ctaimg = get_the_post_thumbnail( $ctaID,'full');
    $ctalayout = get_post_meta($ctaID,'ctalayout',true);
    $ctabg = get_post_meta($ctaID,'cta_bg',true);
    $ctacolor = get_post_meta($ctaID,'cta_color',true);
    $ctatitlebg = get_post_meta($ctaID,'cta_titlebg',true);
    $ctatitlecolor = get_post_meta($ctaID,'cta_titlecolor',true);
    $ctabtncolor = get_post_meta($ctaID,'cta_btncolor',true);
    $ctabtnbg = get_post_meta($ctaID,'cta_btnbg',true);

    $target = get_post_meta($ctaID,'diver_cta_target',true);
    $nofollow = get_post_meta($ctaID,'diver_cta_nofollow',true);

    $diver_cta['title'] = ($diverctaposts->post_title);
    $diver_cta['content'] = wpautop(do_shortcode($diverctaposts->post_content));
    if(is_amp()){
      $diver_cta['content'] = apply_filters('the_content',$diverctaposts->post_content);
    }
    $diver_cta['button_text'] = ($ctabtntitle);
    $diver_cta['button_url'] = $ctabtnurl;
    $diver_cta['image'] = $ctaimg;
    $diver_cta['ctalayout'] = $ctalayout;
    $diver_cta['ctabg'] = $ctabg;
    $diver_cta['ctacolor'] = $ctacolor;
    $diver_cta['ctatitlebg'] = $ctatitlebg;
    $diver_cta['ctatitlecolor'] = $ctatitlecolor;
    $diver_cta['cta_btnbg'] = $ctabtnbg;
    $diver_cta['cta_btncolor'] = $ctabtncolor;
    $diver_cta['cta_target'] = $target;
    $diver_cta['cta_nofollow'] = $nofollow;

    diver_print_cta($diver_cta);
  }
}

function diver_print_cta($diver_cta){
  $title = '';
  $cta_content = '';
  $title = ( isset($diver_cta['title']) && $diver_cta['title'] !== '' ) ? $diver_cta['title'] : "";
  $cta_content = ( isset($diver_cta['content']) && $diver_cta['content'] !== '' ) ? $diver_cta['content'] : "";
  $button_text = ( isset($diver_cta['button_text']) && $diver_cta['button_text'] !== '' ) ? $diver_cta['button_text'] : "";
  $button_url = ( isset($diver_cta['button_url']) && $diver_cta['button_url'] !== '' ) ? $diver_cta['button_url'] : "";
  $image = ( isset($diver_cta['image']) && $diver_cta['image'] !== '' ) ? $diver_cta['image'] : "";
  $ctalayout = ( isset($diver_cta['ctalayout']) && $diver_cta['ctalayout'] !== '' ) ? $diver_cta['ctalayout'] : "";
  $layoutret = ($ctalayout=='left')?'right':'left';
  $ctalayout=($ctalayout!='full')?'float:'.$ctalayout.';margin-'.$layoutret.':20px;':'float:none;width:70%';
  $ctabg = ( isset($diver_cta['ctabg']) && $diver_cta['ctabg'] !== '' ) ? $diver_cta['ctabg'] : "";
  $ctacolor = ( isset($diver_cta['ctacolor']) && $diver_cta['ctacolor'] !== '' ) ? $diver_cta['ctacolor'] : "";
  $ctatitlebg = ( isset($diver_cta['ctatitlebg']) && $diver_cta['ctatitlebg'] !== '' ) ? $diver_cta['ctatitlebg'] : "";
  $ctatitlecolor = ( isset($diver_cta['ctatitlecolor']) && $diver_cta['ctatitlecolor'] !== '' ) ? $diver_cta['ctatitlecolor'] : "";
  $ctabtnbg = ( isset($diver_cta['cta_btnbg']) && $diver_cta['cta_btnbg'] !== '' ) ? $diver_cta['cta_btnbg'] : "";
  $ctabtncolor = ( isset($diver_cta['cta_btncolor']) && $diver_cta['cta_btncolor'] !== '' ) ? $diver_cta['cta_btncolor'] : "";
  $target = ( isset($diver_cta['cta_target']) && $diver_cta['cta_target'] !== '' ) ? $diver_cta['cta_target'] : "";
  $nofollow = ( isset($diver_cta['cta_nofollow']) && $diver_cta['cta_nofollow'] !== '' ) ? $diver_cta['cta_nofollow'] : "";

?>
<?php if(!is_amp()): ?>

  <div id="cta" style="background:<?php echo $ctabg ?>">
    <div class="cta_title" style="background:<?php echo $ctatitlebg;?>;color:<?php echo $ctatitlecolor; ?>"><?php echo $title ?></div>
    <div class="cta_content clearfix">
    <div class="cta_thumbnail" style="<?php echo $ctalayout; ?>"><?php echo $image ?></div>
      <div class="content" style="color:<?php echo $ctacolor ?>"><?php echo $cta_content ?></div>
    </div>
    <?php if($button_url): ?>
      <div class="cta_btnarea button big shadow">
      <a href="<?php echo $button_url ?>" <?php if($target==1){echo 'target="_blank"';}if($nofollow==1){echo 'rel="nofollow"';} ?> style="background:<?php echo $ctabtnbg?>;color:<?php echo $ctabtncolor?>;"><?php echo $button_text ?></a>
      </div>
    <?php endif; ?>
  </div>

<?php else: 
$imgurl="";
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
preg_match($searchPattern, $image, $imgurl);
?>

  <div id="cta">
    <div class="cta_title"><?php echo $title ?></div>
    <div class="cta_content clearfix">
    <?php if($image): ?>
    <amp-img src="<?php echo $imgurl[2] ?>" width="200" height="200" class="cta_thumbnail" layout="responsive"> </amp-img>
    <?php endif; ?>
      <div class="content"><?php echo $cta_content ?></div>
    </div>
    <?php if($button_url): ?>
      <div class="cta_btnarea button big shadow">
      <a href="<?php echo $button_url ?>" <?php if($target==1){echo 'target="_blank"';}if($nofollow==1){echo 'rel="nofollow"';} ?>><?php echo $button_text ?></a>
      </div>
    <?php endif; ?>
  </div>

<?php endif; }