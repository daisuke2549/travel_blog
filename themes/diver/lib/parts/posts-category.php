<?php 
	$list_cnt = get_theme_mod('catnewpost_num',6);
	if($list_cnt && $list_cnt != 0 && get_the_category()):
?>
<div class="single_title"><span class="cat-link"><?php echo the_category(', ') ?></span><?php echo apply_filters('related_article_title_after','の関連記事') ?></div>
<ul class="newpost_list inline-nospace">
	<?php
	$list_cnt = get_theme_mod('catnewpost_num',6);
	$cat = get_the_category();
	$cat = $cat[0];
	$args = array(
		'posts_per_page' => $list_cnt,
		'orderby' => get_theme_mod('recommend_order','date'),
        'post_type' => apply_filters('diver_related_post_type','post'),
		'post_status' => 'publish',
		'cat' => $cat->cat_ID,
		'post__not_in'=> array(get_the_ID())
	);
	$args = apply_filters('diver_related_post_args',$args);
	$the_query = new WP_Query($args);
	if ($the_query->have_posts()):while ($the_query->have_posts()):$the_query->the_post();
	?>
		<li class="post_list_wrap clearfix hvr-fade-post">
		<a class="clearfix" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
		<figure class="post-box-thumbnail__wrap">
		<?php if(!is_amp()):
              echo get_diver_thumb_img(apply_filters('diver_related_thumb_img_size','thumbnail'));
		 endif; ?>
		</figure>
		<div class="meta">
		<div class="title"><?php the_title(); ?></div>
		<time class="date" datetime="<?php echo (get_theme_mod('recommend_order','date')=='date')?the_time('Y-m-d'):the_modified_date('Y-m-d'); ?>">
		<?php echo (get_theme_mod('recommend_order','date')=='date'||get_theme_mod('recommend_order','date')=='rand')?get_the_date():the_modified_date(); ?>
		</time>
		</div>
		</a>
		</li>
		<?php
		endwhile;
	endif;
	wp_reset_postdata();
	?>
</ul>
<?php endif; ?>