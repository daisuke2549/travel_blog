<?php 
$pickup_tag = get_theme_mod('pickup_tag','pickup');
$pickup_img = get_theme_mod('pickup_img',false); 
$diver_option_firstview = get_option('diver_option_firstview','0');
$pickup_slider_title = get_theme_mod('pickup_slider_title','');
?>
<?php if($pickup_slider_title&&$diver_option_firstview!=2):?>
	<div class="wrap-post-title"><?php echo $pickup_slider_title; ?></div>
<?php endif; ?>

<div id="pickup_posts_container" class="swiper-container">
	<ul class="swiper-wrapper">

<?php 
$args = array(
	'tag' => $pickup_tag,
	'orderby'=>'rand',
	'posts_per_page'=>8,
    'post_type' => apply_filters('diver_pickup_post_type','post'),
);
$my_query = new WP_Query(apply_filters('diver_pickup_post_args',$args)); 
?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); 
?>
<li class="pickup_post_list swiper-slide">
	<a class="clearfix" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php
		
		$thumbnail_size = 'medium';
	    if($diver_option_firstview=='2'){
	    	$thumbnail_size = 'full';
		}else{
			$thumbnail_size = is_mobile()?'thumbnail':'medium';
		}

		$thumbnail_size = apply_filters('diver_pickup_thumb_img_size',$thumbnail_size);

		echo get_diver_thumb_img($thumbnail_size);

		$cats = get_the_category();
		if($cats){
			$cat = $cats[0];
			foreach ($cats as $category) {
				if($category->category_parent){
					$cat=$category;
					break;
				}
			}

			if(!get_theme_mod('post_category',1)){
				$parent_cat_id = $cat->parent;
				if($parent_cat_id != 0){
					$cat = get_category($parent_cat_id);
				}
			}
		}
		?>
	<span class="pickup-cat" style="<?php if(get_theme_mod($cat->slug)){ echo 'background:'.get_theme_mod($cat->slug).';'; } ?>"><?php echo $cat->cat_name; ?></span>
	<?php if(!$pickup_img): ?> 
		<div class="meta">
			<div class="pickup-title"><?php the_title(); ?></div>
			<?php if(get_theme_mod('post_date',true)): ?>
				<span class="pickup-dt"><?php echo (get_theme_mod('post_sort','published')=='published')?get_the_date():the_modified_date('Y年m月d日'); ?></span>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	</a>
</li>
<?php endwhile;wp_reset_postdata(); ?>
</ul>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

</div>