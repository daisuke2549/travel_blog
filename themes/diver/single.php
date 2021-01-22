<?php 
global $post;

$position = get_theme_mod('sidebar_position_page','right');
$adremove = get_post_meta($post->ID, "ad_remove", true);

$pickup_tag = get_theme_mod('pickup_tag','pickup');
$pickupposts = get_posts( 'tag='.$pickup_tag );
?>
<?php get_header(); ?>
<div id="main-wrap">
	<!-- main -->
	<?php $sidebarset = get_post_meta($post->ID, 'single_sidebar_settings', true); ?>

	<main id="single-main" <?php if(!empty($sidebarset)){ echo 'class="full"'; } ?> style="<?php echo main_position() ?>" role="main">
	<?php (is_active_sidebar( 'single-top-widget' ))?dynamic_sidebar('single-top-widget'):''; ?>
		<?php if(get_theme_mod('catnewpost','top')=="top"&&$pickupposts&&$pickup_tag): ?>
			<?php get_template_part('/lib/parts/pickup','post'); ?>
		<?php endif; ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<!-- パンくず -->
				<?php echo (get_theme_mod('breadcrumb_set_post',true))?get_template_part('/lib/parts/breadcrumb'):''; ?> 
				<div id="content_area" class="fadeIn animated">
					<?php get_template_part('/lib/parts/sns','side') ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php if(diver_fix_sns_boolean()): ?> style="margin-<?php echo ($position=='left')?'right':'left'; ?>: 120px"<?php endif; ?>>
						<header>
							<div class="post-meta clearfix">
								<div class="cat-tag">
									<?php 
									foreach((get_the_category()) as $cat): ?>
										<div class="single-post-category" style="background:<?php echo get_theme_mod($cat->slug);?>"><a href="<?php echo get_category_link( $cat->cat_ID ) ?>" rel="category tag"><?php echo $cat->cat_name; ?></a></div>
									<?php endforeach; ?>
									<?php  
									if(get_theme_mod('post_tag',true)): 
									$posttags = get_the_tags();
									if ($posttags) { 
									  foreach($posttags as $tag) {
									    echo '<div class="tag"><a href="'. get_term_link($tag->term_id) .'" rel="tag">'. $tag->name ."</a></div>";
									  }
									}
									endif; ?>
								</div>

								<h1 class="single-post-title entry-title"><?php echo get_the_title(); ?></h1>
								<div class="post-meta-bottom">
								<?php if(get_theme_mod('single_published_date',true)): ?>
									<time class="single-post-date published updated" datetime="<?php the_time('Y-m-d'); ?>"><i class="fa fa-calendar" aria-hidden="true"></i><?php the_time(get_option( 'date_format' )); ?></time>
								<?php endif; ?>
								<?php if(get_theme_mod('single_modified_date',true)): ?>
									<time class="single-post-date modified" datetime="<?php the_modified_date('Y-m-d'); ?>"><i class="fa fa-refresh" aria-hidden="true"></i><?php the_modified_date(get_option( 'date_format' )) ?></time>
								<?php endif; ?>
								<?php if(get_theme_mod('single_finish_time',false)): ?>
 								<span class="post_reading_time">
									<?php 
									echo diver_post_reading_time($post->post_content); 
									?>
								</span>
								<?php endif; ?>

								</div>
								<?php if(get_theme_mod('single_title_author',true)): ?>
									<ul class="post-author vcard author">
									<li class="post-author-thum"><?php echo get_avatar(get_the_author_meta('ID'), 25); ?></li>
									<li class="post-author-name fn post-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
									</li>
									</ul>
								<?php endif; ?>
							</div>
							<?php 
							$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
							if($paged==1):
								echo diver_single_eyecatch(get_the_ID());
								sharebtn(get_option('diver_sns_post_top_style',get_theme_mod('sharebtn_style_top','big')),'top');
							endif; ?>
						</header>
						<section class="single-post-main">
								<?php dynamic_sidebar('single-top'); ?>
								<?php if(!$adremove && !is_customize_preview()):

									if(get_option('diver_option_base_ad_posttop') != 4){
						                echo diver_option_get_adsence(get_option('diver_option_base_ad_posttop'));
						            }else{
							            echo do_shortcode(get_option('diver_option_base_ad_posttop_custom'));
						            }
								elseif(get_post_meta(get_the_ID(),'single_adarea_top',true)): ?>
									<div class="single-top">
									<?php echo do_shortcode(get_post_meta(get_the_ID(),'single_adarea_top',true)); ?>
									</div>
								<?php endif; ?>


								<div class="content">
								<?php if($post->post_password){echo apply_filters('the_content', get_post_meta(get_the_ID(),'auth_before_content',true));} ?>
								<?php the_content(); ?>
								</div>

								<?php get_template_part('/lib/parts/pager-next-links'); ?>

								<div class="bottom_ad clearfix">
										<?php (is_mobile())?dynamic_sidebar('single-spad'):dynamic_sidebar('single-pcad'); ?>
								<?php if(!$adremove && !is_customize_preview()): 
									if(get_option('diver_option_base_ad_postbottom') != 4){
						                echo diver_option_get_adsence(get_option('diver_option_base_ad_postbottom'));
						            }else{
							            echo do_shortcode(get_option('diver_option_base_ad_postbottom_custom'));
						            }
									?>
	
								<?php else:
									if(is_mobile()&&get_post_meta(get_the_ID(),'single_adarea_bottom_sp',true)){ ?>
										<?php echo do_shortcode(get_post_meta(get_the_ID(),'single_adarea_bottom_sp',true)); ?>
									<?php }

									if(!is_mobile()&&get_post_meta(get_the_ID(),'single_adarea_bottom_pc',true)){ ?>
										<?php echo do_shortcode(get_post_meta(get_the_ID(),'single_adarea_bottom_pc',true)); ?>
									<?php }
								endif; ?>
								</div>

								<?php sharebtn(get_option('diver_sns_post_bottom_style',get_theme_mod('sharebtn_style_bottom','big')),'bottom'); ?>
								<?php get_template_part('/lib/parts/parts','author'); ?>
						</section>
						<footer class="article_footer">
							<!-- コメント -->
							<?php
								if( !post_password_required( $post->ID ) ) :
								$comment_style = get_theme_mod('comment_form_style','none');
								if($comment_style=='normal'){comments_template();}
								if($comment_style=='facebook'&&get_option('diver_sns_facebook_app')): ?>
									<div class="fb-comments" data-href="<?php the_permalink() ?>" data-width="100%" data-numposts="5"></div>
								<?php endif;
								endif; ?>
							<!-- 関連キーワード -->
							<?php
							if(get_theme_mod('single_related_keyword',true)):
								$arr = get_the_tags();
								if(!empty($arr)): ?>
									<div class="single_title"><?php echo get_theme_mod('related_article_keyword','関連キーワード') ?></div>
									<div class="tag_area">
										<?php 
										$posttags = get_the_tags();
										if ($posttags) { 
										  foreach($posttags as $tag) {
										    echo '<div class="tag"><a href="'. get_term_link($tag->term_id) .'" rel="tag">'. $tag->name ."</a></div>";
										  }
										}
										?>
									</div>
								<?php endif;
								endif; ?>

							<!-- 関連記事 -->
							<?php get_template_part('/lib/parts/posts','category'); ?>
							<?php dynamic_sidebar('single-related-area'); ?>
						</footer>
					</article>
				</div>
				<!-- CTA -->
				<?php diver_get_cta(get_the_ID()); ?>
				<!-- navigation -->
				<?php if(get_theme_mod('single_bottom_navigationpost',true)): ?>
					<ul class="navigation">
						<?php if( get_previous_post() ){ ?><li class="left"><?php previous_post_link('%link', '%title'); ?></li><?php } ?>
						<?php if( get_next_post() ){ ?><li class="right"><?php next_post_link('%link', '%title'); ?></li><?php } ?>
					</ul>
				<?php endif; ?>
					<?php get_template_part('/lib/parts/bigshare');?>
				<?php if(get_theme_mod('catnewpost','top')=="bottom"&&$pickupposts&&$pickup_tag): ?>
						<?php get_template_part('/lib/parts/pickup','post'); ?>
				<?php endif; ?>
				<div class="post-sub">
					<!-- bigshare -->
					<!-- rabdom_posts(bottom) -->
					<?php get_template_part('/lib/parts/recommend'); ?>
					<?php dynamic_sidebar('single-recommend-area'); ?>
				</div>
			<?php endwhile;
			else :?>
				<div class="post">
					<h2>記事はありません</h2>
					<p>お探しの記事は見つかりませんでした。</p>
				</div>
			<?php endif; ?>
		<?PHP wp_reset_query(); ?>
	</main>

	<!-- /main -->
	<?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>
<style>
<?php echo get_post_meta(get_the_ID(),'custom_css',true); ?>

</style>