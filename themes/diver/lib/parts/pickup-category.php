<?php 
$pickup_cat = get_theme_mod('pickup_cat','none');
$pickup_cat_sort = get_theme_mod('pickup_cat_sort','date');

$cat_slug = get_category_by_slug($pickup_cat);
if($pickup_cat != 'none' && $cat_slug):
	$cat_id = get_category_by_slug($pickup_cat)->cat_ID;
?>
<div class="wrap-post-title"><?php echo get_cat_name($cat_id) ?><span class="wrap-post-title-inner"><a href="<?php echo get_category_link($cat_id) ?>"><?php echo apply_filters('diver_pickup_cat_morelink','<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>  もっと見る'); ?></a></span></div>
	<section class="pickup-cat-wrap">
		<?php 

		$pickup_args = array(
			'category_name' => $pickup_cat,
			'posts_per_page' => get_theme_mod('pickup_cat_num',5),
	        'post_type' => apply_filters('diver_pickupcat_post_type','post'),
	        'orderby' => $pickup_cat_sort,
	        'order' => 'DESC',
		);

		$my_query = new WP_Query(apply_filters('diver_pickupcat_args',$pickup_args));
		while ($my_query->have_posts()) : $my_query->the_post(); 
		?>
		<article class="pickup-cat-list hvr-fade-post clearfix">
			<a class="clearfix" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
			<figure class="pickup-cat-img post-box-thumbnail__wrap">
				<?php 
				$entry = (get_theme_mod('pickup_cat_sort','date')=='date')?get_the_date('U'):get_the_modified_date('U');
				echo diver_loop_newlabel($entry);
				?>
				<?php echo get_diver_thumb_img(apply_filters('diver_pickup_cat_thumb_img_size','thumbnail')); ?>
			</figure>
			<section class="meta">
				<?php if(get_theme_mod('post_date',true)): ?>
					<time datetime="<?php echo (get_theme_mod('pickup_cat_sort','date')=='date')?the_time('Y-m-d'):the_modified_date('Y-m-d'); ?>" class="pickup-cat-dt published">
					<?php echo (get_theme_mod('pickup_cat_sort','date')=='date')?the_time(get_option( 'date_format' )):the_modified_date(get_option( 'date_format' )); ?>	
					</time>

				<?php endif; ?>
				<div class="pickup-cat-title"><?php the_title(); ?></div>
				<div class="pickup-cat-excerpt"><?php echo get_diver_excerpt(get_the_ID(),80); ?></div>
			</section>
			</a>
		</article>
		<?php endwhile;wp_reset_postdata(); ?>
	</section>
<?php endif; ?>