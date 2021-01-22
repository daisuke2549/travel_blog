<?php 
  $url_encode=urlencode(get_permalink());
  $site_title_encode=urlencode(get_home_url());
  $title_encode=urlencode(get_the_title());
  $tw_url = get_the_author_meta( 'twitter' );
  $tw_domain = array("https://twitter.com/"=>"","https://twitter.com/"=>"","//twitter.com/"=>"");
  $tw_user = '&via=' . strtr($tw_url , $tw_domain);
  $fdly_url = array("http%3A%2F%2F"=>"","https%3A%2F%2F"=>"");
  $plainurl= strtr( $site_title_encode, $fdly_url );
 ?>
 <?php if(!is_mobile()&&get_theme_mod('diver_archive_thumb_footer',false)): ?>
<figcaption>
    <a class="facebook" href="https://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png"></a>
    <a class="twitter" target="blank" href="https://twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo urlencode( the_title( "" , "" , 0 ) ) ?><?php if(get_the_author_meta('twitter')) : ?><?php echo $tw_user ;?><?php endif ;?>&tw_p=tweetbutton" onclick="window.open(this.href, 'tweetwindow', 'width=550, height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1'); return false;"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png"></a>
    <a class="googleplus" href="https://plusone.google.com/_/+1/confirm?hl=ja&url=<?php echo get_permalink() ?>" onclick="window.open(this.href, 'window', 'width=550, height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1'); return false;" rel="tooltip" data-toggle="tooltip" data-placement="top" title="GooglePlusで共有"><img src="<?php echo get_template_directory_uri(); ?>/images/social/google-plus.png"></a>
</figcaption>
<?php endif; ?>