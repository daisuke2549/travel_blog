<?php global $article_list_title; ?>
<?php if(!empty($article_list_title)):?>
	<div class="wrap-post-title"><?php echo $article_list_title;?></div>
<?php endif; ?>
<section class="wrap-grid-post-box">
	<?php
	// WordPress ループ
	$infeedcount = 0;
	$infeednum = get_option( 'diver_option_base_ad_infeed');
	$infeedad = (is_mobile())?get_option('diver_option_base_ad_infeedtag-mobile'):get_option( 'diver_option_base_ad_infeedtag-grid');

	if(have_posts()): while (have_posts()) : the_post();
	$infeedcount++; 
	$cats = get_the_category();
	$cat = ($cats)?$cats[0]:'';
	?>

	<?php if(in_array((string)$infeedcount, explode(',',$infeednum)) !== false): ?>
		<?php if(!empty($infeedad) && !is_customize_preview()): ?>
			<article class="grid_post-box">
				<div class="post-box-contents clearfix">
					<?php echo do_shortcode($infeedad); ?>
				</div>
			</article>
		<?php endif; ?>
	<?php endif; ?>
		<?php
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
		?>
		<article class="grid_post-box" role="article">
			<div class="post-box-contents clearfix" data-href="<?php the_permalink();?>">
				<figure class="grid_post_thumbnail post-box-thumbnail">
					<?php 
					$entry = (get_theme_mod('post_sort','published')=='published')?get_the_date('U'):get_the_modified_date('U');
					echo diver_loop_newlabel($entry); 
					?>
					<div class="post_thumbnail_wrap post-box-thumbnail__wrap">
					<?php 
					$thumbnail_size = is_mobile()?get_option('diver_option_base_main_thumbnail_sp','thumbnail'):get_option('diver_option_base_main_thumbnail','medium');
						echo get_diver_thumb_img($thumbnail_size); 
					?>
					</div>
					<?php if(is_mobile()&&$cat): ?>
						<div class="post-cat" style="background:<?php echo get_theme_mod($cat->slug);?>"><a href="<?php echo get_category_link($cat->cat_ID); ?>" rel="category tag"><?php echo $cat->cat_name; ?></a></div>
					<?php endif; ?>

				</figure>

				<section class="post-meta-all">
					<?php if(!is_mobile()&&$cat): ?>
						<div class="post-cat" style="background:<?php echo get_theme_mod($cat->slug);?>"><a href="<?php echo get_category_link($cat->cat_ID); ?>" rel="category tag"><?php echo $cat->cat_name; ?></a></div>
					<?php endif; ?>
						<?php if(get_theme_mod('post_tag',true)): 
							$posttags = get_the_tags();
							$count=0;
							$sep='';
							if ($posttags) { 
								echo '<div class="post-tag">';
								foreach($posttags as $tag) {
									$count++;
									if ($count > 4) break; 
									echo '<a href="'. get_term_link($tag->term_id) .'" rel="tag">'. $tag->name ."</a>";
								}
								echo '</div>';
							}
						endif; ?>
					<div class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</div>
					<div class="post-substr">
					<?php if(get_theme_mod('post_excerpt_count',160)): ?>
						<?php if( !post_password_required( $post->ID ) ) : 
								echo apply_filters('diver_loop_excerpt',get_diver_excerpt($post->ID,get_theme_mod('post_excerpt_count',160)));
							else:
								echo apply_filters('diver_auth_excerpt','この投稿は、パスワードで保護されています。');
							endif;
						?>
					<?php endif; ?>
					</div>
				</section>
				<?php if(get_theme_mod('post_date',true)): ?>
					<time datetime="<?php echo (get_theme_mod('post_sort','published')=='published')?the_time('Y-m-d'):the_modified_date('Y-m-d'); ?>" class="post-date">
					<?php echo (get_theme_mod('post_sort','published')=='published')?the_time(get_option( 'date_format' )):the_modified_date(get_option( 'date_format' )); ?>	
					</time>
				<?php endif; ?>
				<?php if(get_theme_mod('post_author',true)): ?>
					<ul class="post-author">
						<li class="post-author-thum"><?php echo get_avatar(get_the_author_meta('ID'), 25); ?></li>
						<li class="post-author-name"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></li>
					</ul>
				<?php endif; ?>
			</div>
		</article>
		<?php endwhile;wp_reset_postdata(); ?>
	<?php else : // ここから記事が見つからなかった場合の処理 ?>
		<div class="notfound_message"><?php echo apply_filters('diver_loop_notfound_message','お探しの記事は見つかりませんでした。') ?></div>
	<?php endif; ?>
</section>

<?php if(get_theme_mod('post_author',true)||get_theme_mod('post_date',true)): ?>
<style> 
	.grid_post-box .post-meta-all {padding-bottom: 33px;}
	@media screen and (max-width: 599px){
		.grid_post-box .post-meta-all{padding-bottom: 28px;}
	}
</style>
<?php endif; ?>
<!-- pager -->
<?php get_template_part('/lib/parts/pagenation'); ?>
<!-- /pager	 -->