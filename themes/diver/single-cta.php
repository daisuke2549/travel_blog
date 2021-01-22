<?php get_header(); ?>
<style>
<?php echo get_post_meta($post->ID,'custom_css',true) ?>
</style>
<div id="main-wrap">
	<!-- main -->
	<main id="single-main" style="<?php echo main_position() ?>" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
		<?php if(get_theme_mod('catnewpost','top')=="top"): ?>
				<div class="bxslider_main_wrap"><ul class="bxslider_main"><?php get_template_part('/lib/parts/pickup','post'); ?></ul></div>
		<?php endif; ?>
				<!-- パンくず -->
				<?php get_template_part('/lib/parts/breadcrumb'); ?>
				<article id="post-cta" <?php post_class(); ?> role="article" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
					<header>
						<div class="post-meta">
							<div class="cat-tag">
								<span class="single-post-category" style="background:"><a href="">CTAサンプル</a></span>
								<span class="tag"><a href="" rel="tag"></a>CTA</span>
							</div>

							<h1 class="single-post-title" itemprop="headline">CTAサンプル投稿</h1>
							<time class="single-post-date" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?></time>
							<?php if(get_theme_mod('single_title_author',true)): ?>
								<ul class="post-author">
								<li class="post-author-thum"><?php echo get_avatar(get_the_author_meta('ID'), 30); ?></li>
								<li class="post-author-name"><?php the_author(); ?></li>
								</ul>
							<?php endif; ?>
						</div>

						<figure class="single_thumbnail">
						</figure>

						<?php sharebtn(get_theme_mod('sharebtn_style_top','big')); ?>
					</header>
					<section class="single-post-main" itemprop="articleBody">
							<?php dynamic_sidebar('single-top'); ?>
							<div class="content">CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿CTAサンプル投稿</div>
							<?php 
							$args = array(
							'before' => '<div class="page-link">',
							'after' => '</div>',
							'link_before' => '<span>',
							'link_after' => '</span>',
							);
							wp_link_pages($args); ?>
					</section>
					<?php sharebtn(get_theme_mod('sharebtn_style_bottom','big')); ?>
					<footer class="article_footer">

						<!-- 関連キーワード -->
						<div class="single_title">関連キーワード</div>
						<div class="tag_area">
							<div class="tag"><a href="" rel="tag">CTA</a></div>
						</div>

					</footer>
				</article>
				<!-- CTA -->
				
				<?php 
				if(have_posts()):while (have_posts()):the_post(); 
					$layout = get_post_meta($post->ID,'ctalayout',true);
					$layoutret = ($layout=='left')?'right':'left';
				?>
					<div id="cta" style="background:<?php echo get_post_meta($post->ID,'cta_bg',true) ?>">
						<div class="cta_title" style="background:<?php echo get_post_meta($post->ID,'cta_titlebg',true) ?>;color:<?php echo get_post_meta($post->ID,'cta_titlecolor',true) ?>"><?php echo get_the_title(); ?></div>
						<div class="cta_content clearfix">
							<div class="cta_thumbnail" style="<?php echo ($layout!='full')?'float:'.$layout.';margin-'.$layoutret.':20px;':'float:none;width:70%'; ?>;">
								<?php the_post_thumbnail(); ?>
							</div>
							<div class="content" style="color:<?php echo get_post_meta($post->ID,'cta_color',true) ?>"><?php the_content(); ?></div>
						</div>
						<?php if(!empty(get_post_meta($post->ID,'cta_link',true))): ?>
							<div class="cta_btnarea button big shadow">
							<a href="<?php echo get_post_meta($post->ID,'cta_link',true) ?>" style="background:<?php echo get_post_meta($post->ID,'cta_btnbg',true) ?>;color: <?php echo get_post_meta($post->ID,'cta_btncolor',true) ?>"><?php echo get_post_meta($post->ID,'cta_btntext',true) ?></a>
							</div>
						<?php endif; ?>
					</div>

				<?php endwhile;endif;?>


				<!-- post navigation -->
				<ul class="navigation">
					<?php if( get_previous_post() ){ ?><li class="left"><?php previous_post_link('%link', '%title'); ?></li><?php } ?>
					<?php if( get_next_post() ){ ?><li class="right"><?php next_post_link('%link', '%title'); ?></li><?php } ?>
				</ul>
				<div class="post-sub">
					<?php get_template_part('recommend'); ?>
				</div>
	</main>

	<!-- /main -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>