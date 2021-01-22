<?php
/*
 * Template Name: カスタムテンプレート
 */
 ?>
<?php 
get_header();

?>
<div id="main-wrap">
	<?php get_template_part('/lib/parts/breadcrumb'); ?>
	
	<!-- カスタムエリア -->
	<div class="custom_area clearfix">
			<!-- タイトル -->
		<h1 class="page_title"><?php echo get_the_title(); ?></h1>
		<!-- コンテンツ -->
		<div class="content"><?php the_content(); ?></div>
	</div>

	<!-- main -->
	<main id="main" style="<?php echo main_position() ?>" role="main">


	<!-- 記事一覧 -->
	<div class="wrap-post-title">記事一覧</div>

	<?php 
		query_posts('post_type=post&paged='.$paged);
		if(get_theme_mod('post_layout','list') == 'grid'):
			get_template_part('loop','grid');
		else:
			get_template_part('loop');
		endif
		?>
		<?php wp_reset_query(); ?>
	</main>
	<!-- /main -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
<style>
.custom_area {
    background: #fff;
    min-height: 50px;
    margin-bottom: 10px;
}
</style>