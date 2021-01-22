 <?php 
$bigshare = get_theme_mod('bigshare','この記事が気に入ったら<br>フォローしよう');
$facebookurl = get_option('diver_sns_facebook_page',get_theme_mod('facebook_page'));
if(!empty($bigshare) && !empty($facebookurl)): ?>
  <div class="p-entry__push">
    <div class="p-entry__pushLike lazyload" data-bg="<?php echo get_diver_thumb_id_img_src($post->ID,"medium"); ?>">
      <p><?php echo $bigshare ?></p>
      <div class="p-entry__pushButton">
        <div class="fb-like" data-href="<?php echo $facebookurl ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
      </div>
      <p class="p-entry__note"><?php echo get_theme_mod('bigshare_sub','最新情報をお届けします');?></p>
    </div>
  </div>
<?php endif; ?>

<?php 
$bigshare_tw = get_theme_mod('bigshare_tw','Twitterでフォローしよう') ;
$twitterurl = get_option('diver_sns_twitter_url',get_theme_mod('twitter_url'));
$twittername = get_option('diver_sns_twitter_name',get_theme_mod('twitter_id'));
if(!empty($bigshare_tw) && !empty($twitterurl) && !empty($twittername)): ?>
  <div class="p-entry__tw-follow">
    <div class="p-entry__tw-follow__cont">
      <p class="p-entry__tw-follow__item"><?php echo $bigshare_tw ?></p>
      <a href="<?php echo $twitterurl ?>" class="twitter-follow-button p-entry__tw-follow__item" data-show-count="false" data-size="large" data-show-screen-name="false">Follow <?php echo $twittername ?></a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </div>
  </div>
<?php endif; ?> 