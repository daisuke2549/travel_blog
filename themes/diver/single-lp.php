<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen">
<style><?php echo get_post_meta(get_the_ID(),'custom_css',true); ?></style>
<?php
	$max = (get_post_meta(get_the_ID(), 'lp_size_max', true))?get_post_meta(get_the_ID(), 'lp_size_max', true):'90';
	$mid = (get_post_meta(get_the_ID(), 'lp_size_mid', true))?get_post_meta(get_the_ID(), 'lp_size_mid', true):'96';
	$min = (get_post_meta(get_the_ID(), 'lp_size_min', true))?get_post_meta(get_the_ID(), 'lp_size_min', true):'100';

	$maxunit = (get_post_meta(get_the_ID(), 'lp_size_max_unit', true))?get_post_meta(get_the_ID(), 'lp_size_max_unit', true):'%';
	$midunit = (get_post_meta(get_the_ID(), 'lp_size_mid_unit', true))?get_post_meta(get_the_ID(), 'lp_size_mid_unit', true):'%';
	$minunit = (get_post_meta(get_the_ID(), 'lp_size_min_unit', true))?get_post_meta(get_the_ID(), 'lp_size_min_unit', true):'%';

	$maxpadh = (get_post_meta($post->ID, 'lp_size_max_padding_h', true))?get_post_meta($post->ID, 'lp_size_max_padding_h', true):'20';
	$maxpadv = (get_post_meta($post->ID, 'lp_size_max_padding_v', true))?get_post_meta($post->ID, 'lp_size_max_padding_v', true):'40';
	$midpadh = (get_post_meta($post->ID, 'lp_size_mid_padding_h', true))?get_post_meta($post->ID, 'lp_size_mid_padding_h', true):'20';
	$midpadv = (get_post_meta($post->ID, 'lp_size_mid_padding_v', true))?get_post_meta($post->ID, 'lp_size_mid_padding_v', true):'40';
	$minpadh = (get_post_meta($post->ID, 'lp_size_min_padding_h', true))?get_post_meta($post->ID, 'lp_size_min_padding_h', true):'10';
	$minpadv = (get_post_meta($post->ID, 'lp_size_min_padding_v', true))?get_post_meta($post->ID, 'lp_size_min_padding_v', true):'10';

	$bgimg = get_post_meta(get_the_ID(), 'lpbgimg_uploader_url', true);
	$bgcolor = get_post_meta(get_the_ID(), 'lpbgcolor', true);

	$lpcontentbgcolor = get_post_meta(get_the_ID(), 'lpcontentbgcolor', true);
	$lpcontentshadow = get_post_meta(get_the_ID(), 'lpcontentshadow', true);
	$lpfooter_fixmenu = get_post_meta(get_the_ID(), 'lpfooter_fixmenu', true);

	$lpfootermenu = get_post_meta(get_the_ID(), 'lpfootermenu', true);
	$lpfootertext = get_post_meta(get_the_ID(), 'lpfootertext', true);
	$lpfooterbgcolor = get_post_meta(get_the_ID(), 'lpfooterbgcolor', true);

 ?>
<style>
#container{
	background: <?php echo $bgcolor ?>;
	background-image:<?php echo ($bgimg)?'url('.$bgimg.')':'none'; ?> !important; 
}

#lp-wrap .content{
	background: <?php echo $lpcontentbgcolor ?>;
	<?php if($lpcontentshadow=='checked'): ?>
		-webkit-box-shadow: 0 0px 15px rgba(0, 0, 0, 0.3);
	    -moz-box-shadow: 0 0px 15px rgba(0, 0, 0, 0.3);
	    box-shadow: 0 0px 15px rgba(0, 0, 0, 0.3);
    <?php endif; ?>
}

.dvaux_section_environ {
	margin: 0;
    width: 100vw;
    margin-left: calc(50% - 50vw);
}

#footer{
	background-color: <?php echo $lpfooterbgcolor ?>;
	margin: 0 auto;
}
		

 @media screen and (min-width: 1201px){
        #lp-wrap .content{
        	width: <?php echo $max.$maxunit; ?>;
        	padding: <?php echo $maxpadv.'px '.$maxpadh.'px'; ?>;
        }

        #lp-wrap .lp_header_img,#footer{
        	width: <?php echo $max.$maxunit; ?>;
        }

        <?php if($maxunit == 'px'): ?>
        	.dvaux_section_inner {
				padding: 40px calc(50% - <?php echo $max/2; ?>px + <?php echo $maxpadh; ?>px);
			}
        <?php else: ?>
        	.dvaux_section_inner {
			    padding: 40px calc(<?php echo (100 - $max)/2;  ?>% + <?php echo $maxpadh; ?>px);
			}
        <?php endif; ?>
}

    @media screen and (max-width: 1200px){
        #lp-wrap .content{
        	width: <?php echo $mid.$midunit; ?>;
            padding: <?php echo $midpadh.'px '.$midpadv.'px'; ?>;
        }

        #lp-wrap .lp_header_img,#footer{
        	width: <?php echo $mid.$midunit; ?>;
        }
    }

    @media screen and (max-width: 767px){
        #lp-wrap .content{
        	width: <?php echo $min.$minunit; ?>;
            padding: <?php echo $minpadh.'px '.$minpadv.'px'; ?>;
        }

        #lp-wrap .lp_header_img,#footer{
        	width: <?php echo $min.$minunit; ?>;
        }

    }
}
</style>
<div id="lp-wrap">
			<!-- main -->
		<?php 
		if (have_posts()) : // WordPress ループ
			while (have_posts()) : the_post(); // 繰り返し処理開始 
			?>
			<?php 
			$firstviewpc = get_post_meta($post->ID, 'lpfirstview-uploader_img', true);
			$firstviewsp = get_post_meta($post->ID, 'lpfirstviewsp-uploader_img', true);

			$firstviewlink = get_post_meta($post->ID, 'src_lpfirstview_url', true);
			$target = get_post_meta(get_the_ID(), 'src_lpfirstview_url_target', true);
			$follow = get_post_meta(get_the_ID(), 'src_lpfirstview_url_follow', true);


			$img = (is_mobile()&&$firstviewsp)?$firstviewsp:$firstviewpc;

			$target = ($target) ? 'target="_blank"':'';
			$follow = ($follow) ? 'follow="nofollow"':'';

			if($firstviewlink){
				echo ($img)?'<a href="'.$firstviewlink.'" '.$target.' '.$follow.'><div class="lp_header_img"><img src="'.$img.'"></div></a>':'';
			}else{
				echo ($img)?'<div class="lp_header_img"><img src="'.$img.'"></div>':'';
			}
			?>
			<div class="content">
			<?php the_content(); ?>
			</div>
		<?php endwhile; endif; ?>
</div>
<?php if($lpfootermenu || $lpfootertext): ?>
	<footer id="footer">
		<div class="lp_footer_content">
		<?php 
		$nav = wp_get_nav_menu_items( $lpfootermenu, array() ); 
		if( $nav ) {
			echo "<nav class='lp-footer-nav'>";
			echo "<ul class='lp-footer-nav-list'>";
			foreach( $nav as $menu ){
				echo "<li class='menu-item'>";
				echo "<a href='".$menu->url."'><div class='menu_title'>".$menu->title."</div></a>";
				echo "</li>";
			}
			echo "</ul></nav>";
		}

		if($lpfootertext){
			echo "<div class='lp-footer-copyrights'>".$lpfootertext."</div>";
		}
		?>
		</div>
	</footer>
<?php endif; ?>
<?php get_footer(); ?>
<?php if($lpfooter_fixmenu){get_template_part('/lib/parts/footer','menu'); } ?>