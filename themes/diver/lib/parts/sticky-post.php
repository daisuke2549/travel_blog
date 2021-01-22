<?php
	$sticky = get_option( 'sticky_posts' );
	$args = array(
		'post__in'  => $sticky,
	);
	$query = new WP_Query(apply_filters('diver_stickyposts_args',$args));
	if ( isset($sticky[0]) ) : ?>
		<?php $stickytitle = get_theme_mod('sticky_title','固定記事'); ?>
		<?php if($stickytitle): ?><div class="wrap-post-title"><?php echo $stickytitle; ?></div><?php endif; ?>
		<ul class="sticky-post-wrap">
		<?php if($query->have_posts()):while($query->have_posts()):$query->the_post(); ?>
		<li class="sticky-post-box clearfix" data-href="<?php the_permalink();?>">
		<?php if(has_post_thumbnail()): ?>
			<figure class="post_thumbnail post-box-thumbnail__wrap">
	                <?php echo get_diver_thumb_img(apply_filters('diver_sticky_thumb_img_size','large')); ?>
			</figure>
		<?php endif; ?>
			<section class="post-meta-all">
				<?php
				$cat = get_the_category();
				$cat = $cat[0];
				?>
				<div class="post-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</div>
				<?php if(get_theme_mod('single_published_date',true)): ?>
					<time class="post-date published" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time(get_option( 'date_format' )); ?></time>
				<?php endif; ?>
				<?php if(get_theme_mod('single_modified_date',true)): ?>
					<time class="post-date modified" itemprop="dateModified" datetime="<?php the_modified_date('Y-m-d'); ?>"><i class="fa fa-refresh" aria-hidden="true"></i> <?php the_modified_date(get_option( 'date_format' )) ?></time>
				<?php endif; ?>
				<div class="post-tag">
					<span class="post-cat" style="background:<?php echo get_theme_mod($cat->slug);?>"><a href="<?php echo get_category_link($cat->cat_ID); ?>" rel="category tag"><?php echo $cat->cat_name; ?></a></span>
					<?php 
					if(get_theme_mod('post_tag',true)): 
						$posttags = get_the_tags();
						$count=0;
						$sep='';
						if ($posttags) { 
						  foreach($posttags as $tag) {
						    $count++;
						    if ($count > 4) break; 
						    echo '<div class="tag">'.$sep.'<a href="'. get_term_link($tag->term_id) .'" rel="tag">'. $tag->name ."</a></div>";
						  }
						}
					endif; ?>
				</div>
				<div class="post-substr">
					<?php echo apply_filters('diver_loop_excerpt',get_diver_excerpt($post->ID,apply_filters('sticky_post_excerpt_length',120))); ?>
				</div>
			</section>
		</li>
		<?php wp_reset_postdata();
	endwhile;endif;?>
	    </ul>
	<?php endif; ?>