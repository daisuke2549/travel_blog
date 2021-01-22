<?php
$pickup_tag = get_theme_mod('pickup_tag','pickup'); 
$pickupposts = get_posts( 'tag='.$pickup_tag );
$pickuptop = get_theme_mod('pickup_top_hidden',false); 
?>
<?php get_header(); ?>
<div id="main-wrap">
	<!-- main -->

	<?php 
	global $post;
	$sidebarset = get_post_meta($post->ID, 'single_sidebar_settings', true); 
	?>
	
	<main id="page-main" <?php if(!empty($sidebarset)){ echo 'class="full"'; } ?> style="<?php echo main_position(); ?>" role="main">

		<?php if(!is_front_page()): ?>
			<?php echo (get_theme_mod('breadcrumb_set_page',false))?get_template_part('/lib/parts/breadcrumb'):''; ?> 
		<?php endif; ?>

		<?php if(is_front_page()||is_home()): ?>

			<?php if($pickup_tag&&$pickupposts&&!$pickuptop&&(get_option('diver_option_firstview','0')!='2')): ?>
					<?php get_template_part('/lib/parts/pickup','post'); ?>
			<?php endif; ?>

			<?php dynamic_sidebar('main-top'); ?>
			<?php get_template_part('/lib/parts/pickup','category'); ?>
			<?php get_template_part('/lib/parts/sticky','post'); ?>

		<?php endif; ?>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<?php if(!get_post_meta($post->ID, 'title_hidden', false)): ?>
				<h1 class="page_title"><?php echo get_the_title(); ?></h1>
			<?php endif; ?>

			<?php if(get_option('diver_postsettings_icatch_on',get_theme_mod('single_icatch',1))): ?>
				<?php if($eye_img = wp_get_attachment_image_src( get_post_thumbnail_id() , 'medium' )){ ?>
					<figure class="single_thumbnail" <?php echo (get_option('diver_postsettings_icatchbg_on',get_theme_mod('single_icatch_bg',1)))?'style="background-image:url('.$eye_img[0].')"':''; ?>>
						<?php echo get_diver_thumb_img('full',false,'',true ,false); ?>
					</figure>
				<?php } ?>
			<?php endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

				<?php 
				if(get_option('diver_sns_page_top_style')){
					sharebtn(get_option('diver_sns_post_top_style',get_theme_mod('sharebtn_style_top','big')),'bottom');
				}
				?>

				<section class="single-post-main">
					<div class="content">
						<?php if($post->post_password){echo apply_filters('the_content', get_post_meta(get_the_ID(),'auth_before_content',true));} ?>
						<?php the_content(); ?>
					</div>
				</section>
				<?php get_template_part('/lib/parts/pager-next-links'); ?>
				<?php 
				if(get_option('diver_sns_page_bottom_style')){
					sharebtn(get_option('diver_sns_post_bottom_style',get_theme_mod('sharebtn_style_bottom','big')),'bottom');
				}
				?>
				</article>
		<?php endwhile;
		else: ?>
			<div class="post">
				<h2>記事はありません</h2>
				<p>お探しの記事は見つかりませんでした。</p>
			</div>
		<?php endif; ?>
		<!-- /CTA -->
		<?php diver_get_cta(); ?>
		
	<?php if (is_front_page()): ?>
		 <?php dynamic_sidebar('main-bottom'); ?>
	<?php endif; ?>
	</main>
	<!-- /main -->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
<style>
<?php echo get_post_meta($post->ID,'custom_css',true) ?>
</style>