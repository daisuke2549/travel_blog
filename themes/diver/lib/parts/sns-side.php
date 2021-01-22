<?php
global $post;
$url_encode = apply_filters('get_diver_sns_link',urlencode(get_permalink()));
$position = get_theme_mod('sidebar_position_page','right');
$position = ($position=='left')?'right':'left';

$facebook = get_option('diver_sns_post_fixed-facebook',get_theme_mod('facebook','1'));
$twitter = get_option('diver_sns_post_fixed-twitter',get_theme_mod('twitter','1'));
$hatebu = get_option('diver_sns_post_fixed-hatebu',get_theme_mod('hatebu','1'));
$pocket = get_option('diver_sns_post_fixed-pocket',get_theme_mod('pocket','1'));
$feedly = get_option('diver_sns_post_fixed-feedly',get_theme_mod('feedly','1'));

if(diver_fix_sns_boolean()):
?>
<div id="share_plz" style="float: <?php echo $position?> ">

	<?php if($facebook): ?>

		<div class="fb-like share_sns" data-href="<?php echo $url_encode; ?>" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>

		<div class="share-fb share_sns">
		<a href="http://www.facebook.com/share.php?u=<?php echo $url_encode; ?>" onclick="window.open(this.href,'FBwindow','width=650,height=450,menubar=no,toolbar=no,scrollbars=yes');return false;" title="Facebookでシェア"><i class="fa fa-facebook" style="font-size:1.5em;padding-top: 4px;"></i><br>シェア
		<?php if(function_exists('scc_get_share_facebook')) echo '<div class="sns_count">'.scc_get_share_facebook().'</div>'; ?>
		</a>
		</div>
	<?php endif; ?>
	<?php if($twitter): ?>
		<div class="sc-tw share_sns"><a data-url="<?php echo $url_encode; ?>" href="http://twitter.com/share?text=<?php echo urlencode( the_title( "" , "" , 0 ) ) ?>&url=<?php echo $url_encode; ?>" data-lang="ja" data-dnt="false" target="_blank"><i class="fa fa-twitter" style="font-size:1.5em;padding-top: 4px;"></i><br>Tweet
		<?php if(function_exists('scc_get_share_twitter')) echo '<div class="sns_count">'.scc_get_share_twitter().'</div>'; ?>
		</a></div>

	<?php endif; ?>

	<?php if($hatebu): ?>
		<div class="share-hatebu share_sns">       
		<a href="http://b.hatena.ne.jp/add?mode=confirm&url=<?php echo $url_encode; ?>&title=<?php echo urlencode( the_title( "" , "" , 0 ) ) ?>" onclick="window.open(this.href, 'HBwindow', 'width=600, height=400, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank"><div style="font-weight: bold;font-size: 1.5em">B!</div><span class="text">はてブ</span><?php if(function_exists('scc_get_share_hatebu')) echo (scc_get_share_hatebu()==0)?'':'<div class="sns_count">'.scc_get_share_hatebu().'</div>'; ?></a>
		</div>
	<?php endif; ?>

	<?php if($pocket): ?>
		<div class="share-pocket share_sns">
		<a href="http://getpocket.com/edit?url=<?php echo $url_encode; ?>&title=<?php echo urlencode( the_title( "" , "" , 0 ) ) ?>" onclick="window.open(this.href, 'FBwindow', 'width=550, height=350, menubar=no, toolbar=no, scrollbars=yes'); return false;"><i class="fa fa-get-pocket" style="font-weight: bold;font-size: 1.5em"></i><span class="text">Pocket</span>
		<?php if(function_exists('scc_get_share_pocket')) echo (scc_get_share_pocket()==0)?'':'<div class="sns_count">'.scc_get_share_pocket().'</div>'; ?>
			</a></div>
	<?php endif; ?>

	<?php if($feedly): ?>
	<?php $homeurl = urlencode(home_url()); ?>
		<div class="share-feedly share_sns">
		<a href="https://feedly.com/i/subscription/feed%2F<?php echo $homeurl ?>%2Ffeed" target="_blank"><i class="fa fa-rss" aria-hidden="true" style="font-weight: bold;font-size: 1.5em"></i><span class="text">Feedly</span>
		<?php if(function_exists('scc_get_follow_feedly')) echo (scc_get_follow_feedly()==0)?'':'<div class="sns_count">'.scc_get_follow_feedly().'</div>'; ?>
		</a></div>
	<?php endif;  ?>
</div>
<?php endif; ?>