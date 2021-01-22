<?php get_header(); ?>
<?php 
$article_list_title = get_theme_mod('article_title','新着記事');
$pickup_tag = get_theme_mod('pickup_tag','pickup'); 
$pickupposts = get_posts( 'tag='.$pickup_tag );
$pickuptop = get_theme_mod('pickup_top_hidden',false); 
?>
<div id="main-wrap">
	<!-- main -->
	<main id="main" style="<?php echo main_position() ?>" role="main">
		<?php if(get_option('diver_option_firstview','0')!='2'): ?>
			<?php if($pickup_tag&&$pickupposts&&!$pickuptop): ?>
				<?php get_template_part('/lib/parts/pickup','post'); ?>
			<?php endif; ?>
		<?php endif; ?>
		<?php if (!is_paged()): ?>
		<?php dynamic_sidebar('main-top'); ?>
			<?php get_template_part('/lib/parts/pickup','category'); ?>
			<?php get_template_part('/lib/parts/sticky','post'); ?>
		<?php endif; ?>
		<?php echo diver_posts_loop(); ?>
		 <?php dynamic_sidebar('main-bottom'); ?>
	</main>
	<!-- /main -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>