<?php get_header(); ?>
<?php 
$article_list_title = single_tag_title( '', false ).apply_filters('tag_article_title_after','の記事一覧');
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