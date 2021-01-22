<?php
/*
 * Template Name: 記事一覧
 */
 ?>
<?php
$pickup_tag = get_theme_mod('pickup_tag','pickup'); 
$pickupposts = get_posts( 'tag='.$pickup_tag );
$pickuptop = get_theme_mod('pickup_top_hidden',false); 
?>
<?php get_header(); ?>
<style>
<?php echo get_post_meta($post->ID,'custom_css',true) ?>
</style>
<?php 
$article_list_title = get_theme_mod('article_title','新着記事');
?>
<div id="main-wrap">
	<!-- main -->
	<main id="main" style="<?php echo main_position(); ?>" rel="main">

	<?php if(is_front_page()||is_home()): ?>

		<?php if($pickup_tag&&$pickupposts&&!$pickuptop): ?>
				<?php get_template_part('/lib/parts/pickup','post'); ?>
		<?php endif; ?>

		<?php dynamic_sidebar('main-top'); ?>
		<?php get_template_part('/lib/parts/pickup','category'); ?>
		<?php get_template_part('/lib/parts/sticky','post'); ?>

	<?php endif; ?>

	<?php if (have_posts() && !is_paged()): while (have_posts()) : the_post(); ?>
		<?php if(!get_post_meta($post->ID, 'title_hidden', false)): ?>
			<h1 class="page_title"><?php echo get_the_title(); ?></h1>
		<?php endif; ?>
		<figure class="single_thumbnail">
			<?php the_post_thumbnail(); ?>
		</figure>
		<?php if(get_the_content()): ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" style="margin-bottom:10px">
				<section class="single-post-main" itemprop="articleBody">
					<div class="content">
						<?php if($post->post_password){echo apply_filters('the_content', get_post_meta(get_the_ID(),'auth_before_content',true));} ?>
						<?php the_content(); ?>
					</div>
				</section>
				<?php 
				$args = array(
					'before' => '<div class="page-link">',
					'after' => '</div>',
					'link_before' => '<span>',
					'link_after' => '</span>',
				);
				wp_link_pages($args); ?>
			</article>
		<?php endif; ?>
	<?php endwhile;
	endif; ?>
		<?php 
		query_posts('post_type=post&paged='.$paged);
		echo diver_posts_loop(); ?>
		<?php wp_reset_query(); ?>
	</main>
	<!-- /main -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>