<?php 
function sharebtn($type,$position=''){
  $url_encode = apply_filters('get_diver_sns_link',urlencode(get_permalink()));
  $site_title_encode=urlencode(get_home_url());
  $title_encode=urlencode(get_the_title());

  $tw_url = get_option('diver_sns_twitter_url',get_theme_mod('twitter_url'));
  $tw_domain = array("https://twitter.com/"=>"","https://twitter.com/"=>"","//twitter.com/"=>"");
  $tw_user = '&via=' . strtr($tw_url , $tw_domain);
  $snscount = 0;
  $line_bool = 0;

  if($position == 'top'){
  	$facebook_bool = get_option('diver_sns_post_top-facebook',get_theme_mod('facebook','1'));
	$twitter_bool = get_option('diver_sns_post_top-twitter',get_theme_mod('twitter','1'));
	$hatebu_bool = get_option('diver_sns_post_top-hatebu',get_theme_mod('hatebu','1'));
	$line_bool = get_option('diver_sns_post_top-line',get_theme_mod('line','1'));
	$pocket_bool = get_option('diver_sns_post_top-pocket',get_theme_mod('pocket','1'));
	$feedly_bool = get_option('diver_sns_post_top-feedly',get_theme_mod('feedly','1'));
  }else{
  	$facebook_bool = get_option('diver_sns_post_bottom-facebook',get_theme_mod('facebook','1'));
	$twitter_bool = get_option('diver_sns_post_bottom-twitter',get_theme_mod('twitter','1'));
	$hatebu_bool = get_option('diver_sns_post_bottom-hatebu',get_theme_mod('hatebu','1'));
	$line_bool = get_option('diver_sns_post_bottom-line',get_theme_mod('line','1'));
	$pocket_bool = get_option('diver_sns_post_bottom-pocket',get_theme_mod('pocket','1'));
	$feedly_bool = get_option('diver_sns_post_bottom-feedly',get_theme_mod('feedly','1'));
  }

  $snscount = (int)$facebook_bool + (int)$twitter_bool  + (int)$hatebu_bool + (int)$pocket_bool + (int)$feedly_bool;
  if(is_mobile()){
  	$snscount += (int)$line_bool;
  }
?>


<?php if($type!="none"): ?>
<div class="share" >
	<?php if($type=="big"): ?>
		<div class="sns big c<?php echo $snscount ?>">
			<ul class="clearfix">
			<!--Facebookボタン-->  
			<?php if ($facebook_bool): ?>    
			<li>
			<a class="facebook" href="https://www.facebook.com/share.php?u=<?php echo $url_encode; ?>" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><i class="fa fa-facebook"></i><span class="sns_name">Facebook</span>
			<?php if(function_exists('scc_get_share_facebook')) echo '<span class="sns_count">'.scc_get_share_facebook().'</span>'; ?>
			</a>
			</li>
			<?php endif; ?>

			<!--ツイートボタン-->
			<?php if ($twitter_bool): ?>
			<li> 
			<a class="twitter" target="blank" href="https://twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo urlencode( the_title( "" , "" , 0 ) ) ?><?php if($tw_url) : ?><?php echo $tw_user ;?><?php endif ;?>&tw_p=tweetbutton"><i class="fa fa-twitter"></i><span class="sns_name">Twitter</span>
			<?php if(function_exists('scc_get_share_twitter')) echo '<span class="sns_count">'.scc_get_share_twitter().'</span>'; ?>
			</a>
			</li>
			<?php endif; ?>

			<!--はてブボタン--> 
			<?php if ($hatebu_bool): ?>     
			<li>       
			<a class="hatebu" href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>&title=<?php echo urlencode( the_title( "" , "" , 0 ) ) ?>" onclick="window.open(this.href, 'HBwindow', 'width=600, height=400, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank"><span class="sns_name">はてブ</span>
			<?php if(function_exists('scc_get_share_hatebu')) echo '<span class="sns_count">'.scc_get_share_hatebu().'</span>'; ?>
			</a>
			</li>
			<?php endif; ?>


			<!--LINEボタン--> 
			<?php if ($line_bool&&is_mobile()): ?>   
			<li>
			<a class="line" href="https://line.me/R/msg/text/?<?php echo $title_encode . '%0A' . $url_encode;?>"><span class="text">LINE</span>
			</a>
			</li>     
			<?php endif; ?>

			<!--ポケットボタン-->  
			<?php if ($pocket_bool): ?>       
			<li>
			<a class="pocket" href="https://getpocket.com/edit?url=<?php echo $url_encode ?>&title=<?php echo $title_encode ?>" onclick="window.open(this.href, 'FBwindow', 'width=550, height=350, menubar=no, toolbar=no, scrollbars=yes'); return false;"><i class="fa fa-get-pocket"></i><span class="sns_name">Pocket</span>
			<?php if(function_exists('scc_get_share_pocket')) echo '<span class="sns_count">'.scc_get_share_pocket().'</span>'; ?>
			</a></li>
			<?php endif; ?>

			<!--Feedly-->  
			<?php if ($feedly_bool): ?>  
			<?php $homeurl = urlencode(home_url()); ?>     
			<li>
			<a class="feedly" href="https://feedly.com/i/subscription/feed%2F<?php echo $homeurl ?>%2Ffeed" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i><span class="sns_name">Feedly</span>
			<?php if(function_exists('scc_get_follow_feedly')) echo '<span class="sns_count">'.scc_get_follow_feedly().'</span>'; ?>
			</a></li>
			<?php endif; ?>
			</ul>

		</div>
	<?php elseif($type=="small"): ?>
		<div class="sns small c<?php echo $snscount ?>">
			
			<!--Facebookボタン-->  
			<?php if ($facebook_bool): ?> 
			<a class="facebook" href="https://www.facebook.com/share.php?u=<?php echo $url_encode; ?>" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><i class="fa fa-facebook"></i><span class="sns_name">Facebook</span>
			<?php if(function_exists('scc_get_share_facebook')) echo '<span class="sns_count">'.scc_get_share_facebook().'</span>'; ?>
			</a>
			<?php endif; ?>

			<!--ツイートボタン-->
			<?php if ($twitter_bool): ?>
			<a class="twitter" target="blank" href="https://twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo urlencode( the_title( "" , "" , 0 ) ) ?><?php if($tw_url) : ?><?php echo $tw_user ;?><?php endif ;?>&tw_p=tweetbutton"><i class="fa fa-twitter"></i><span class="sns_name">Twitter</span>
			<?php if(function_exists('scc_get_share_twitter')) echo '<span class="sns_count">'.scc_get_share_twitter().'</span>'; ?>
			</a>
			<?php endif; ?>

			<!--はてブボタン--> 
			<?php if ($hatebu_bool): ?>     
			<a class="hatebu" href="https://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode ?>&title=<?php echo urlencode( the_title( "" , "" , 0 ) ) ?>" onclick="window.open(this.href, 'HBwindow', 'width=600, height=400, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank"><span class="sns_name">はてブ</span>
			<?php if(function_exists('scc_get_share_hatebu')) echo '<span class="sns_count">'.scc_get_share_hatebu().'</span>'; ?>
			</a>
			<?php endif; ?>


			<!--LINEボタン--> 
			<?php if ($line_bool&&is_mobile()): ?>   
			<a class="line" href="https://line.me/R/msg/text/?<?php echo $title_encode . '%0A' . $url_encode;?>"><span class="text">LINE</span></a>
			<?php endif; ?>

			<!--ポケットボタン-->  
			<?php if ($pocket_bool): ?>       
			<a class="pocket" href="https://getpocket.com/edit?url=<?php echo $url_encode ?>&title=<?php echo $title_encode ?>" onclick="window.open(this.href, 'FBwindow', 'width=550, height=350, menubar=no, toolbar=no, scrollbars=yes'); return false;"><i class="fa fa-get-pocket"></i><span class="sns_name">Pocket</span>
			<?php if(function_exists('scc_get_share_pocket')) echo '<span class="sns_count">'.scc_get_share_pocket().'</span>'; ?>
			</a>
			<?php endif; ?>

			<!--Feedlyボタン-->  
			<?php if ($feedly_bool): ?>  
			<?php $homeurl = urlencode(home_url()); ?>     
			<a class="feedly" href="https://feedly.com/i/subscription/feed%2F<?php echo $homeurl ?>%2Ffeed" target="_blank"><i class="fa fa-rss"></i><span class="sns_name">Feedly</span>
			<?php if(function_exists('scc_get_follow_feedly')) echo '<span class="sns_count">'.scc_get_follow_feedly().'</span>'; ?>
			</a>
			<?php endif; ?>

		</div>
	<?php elseif($type=="mini"): ?>
		<!--Facebookボタン--> 
		<div class="sns mini">
		<ul class="clearfix">
			<li><div class="fb-like" data-href="<?php echo $url_encode; ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div></li>

			<!--Twitterボタン-->  
			<li><a href="https://twitter.com/share" class="twitter-share-button">ツイート</a></li>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

			<!--はてブボタン--> 
			<li><a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="basic-label" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script></li>

			<!--ポケットボタン-->  
			<li><a data-pocket-label="pocket" data-pocket-count="none" class="pocket-btn" data-lang="en"></a></li>
		</ul>
		</div>

	<?php endif; ?>
</div>
<?php endif;
} ?>