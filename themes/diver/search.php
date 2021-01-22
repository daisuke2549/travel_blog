<?php get_header(); ?>
<?php 
$article_list_title = apply_filters('search_article_title_after','検索結果');
?>
<div id="main-wrap">
	<!-- main -->
	<main id="main" style="<?php echo main_position() ?>" role="main">
		<?php get_template_part('/lib/parts/breadcrumb'); ?>
		<?php echo diver_posts_loop(); ?>
	</main>
	<!-- /main -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>