<?php
    $diver_option_headerbtn_title1 = get_option( 'diver_option_headerbtn_title1');
    $diver_option_headerbtn_title2 = get_option( 'diver_option_headerbtn_title2');
    $diver_option_headerbtn_title3 = get_option( 'diver_option_headerbtn_title3');
    $diver_option_headerbtn_title4 = get_option( 'diver_option_headerbtn_title4');

    $diver_option_headerbtn_hidden1 = get_option('diver_option_headerbtn_hidden1',0);
    $diver_option_headerbtn_hidden2 = get_option('diver_option_headerbtn_hidden2',0);
    $diver_option_headerbtn_hidden3 = get_option('diver_option_headerbtn_hidden3',0);
    $diver_option_headerbtn_hidden4 = get_option('diver_option_headerbtn_hidden4',0);

    $headerbackground = get_theme_mod( 'background-header', '#ffffff');
    $headerlink = get_theme_mod('link-header','#333355');

    $diver_option_headerbtn_on = is_mobile()?'diver_option_headerbtn_spon':'diver_option_headerbtn_pcon';
?>
<?php if(get_option($diver_option_headerbtn_on,1)&&(
		$diver_option_headerbtn_title1&&!$diver_option_headerbtn_hidden1
		||$diver_option_headerbtn_title2&&!$diver_option_headerbtn_hidden2
		||$diver_option_headerbtn_title3&&!$diver_option_headerbtn_hidden3
		||$diver_option_headerbtn_title4&&!$diver_option_headerbtn_hidden4)
	): ?>
<div class="nav_in_btn">
	<ul>
	<?php 
	$i = 1;
	while ($i < 5) {
		if(get_option( 'diver_option_headerbtn_title'.$i)&&!get_option( 'diver_option_headerbtn_hidden'.$i)){ ?>
		<li class="nav_in_btn_list_<?php echo $i ?>"><a href="<?php echo get_option( 'diver_option_headerbtn_url'.$i) ?>" <?php echo get_option('diver_option_headerbtn_target'.$i,0) ? 'target="_blank"':''; ?> <?php echo get_option('diver_option_headerbtn_nofollow'.$i,0) ? 'rel="nofollow"':''; ?>><i class="fa <?php echo get_option( 'diver_option_headerbtn_icon'.$i,'fa-arrow-circle-right') ?>"></i><span><?php echo get_option( 'diver_option_headerbtn_title'.$i) ?></span></a></li>
	<?php }
		$i++;
	}
	?>
	</ul>
</div>

<?php else:
(!is_mobile())?dynamic_sidebar('nav_inleft'):'';
endif;
 ?>
