<?php 
get_header();
$category = get_category($cat);
?>
<div id="main-wrap">
	<?php get_template_part('/lib/parts/breadcrumb'); ?>
	<?php 
		$cat_content ='';
		if(get_theme_mod('set_catpage_title',true)){
			$cat_content = print_ctapage_content($category->slug); 
		}
	?>

	<!-- main -->
	<main id="main" style="<?php echo main_position() ?>" role="main">
	<?php if($cat_content && !is_paged()): ?>
		<div class="cat-post-main">
			<div class="content">
				<?php echo apply_filters('the_content',$cat_content); ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="wrap-post-title"><?php echo $category->name ?><?php echo apply_filters('category_title_after','の記事一覧') ?></div>

		<?php
		$catID =  get_query_var('cat');
		echo apply_filters('diver_category_page_head','',$catID);

		$post_box_layout = (get_post_meta(get_catpage_postID($category->slug), 'post_box_layout', true))?get_post_meta(get_catpage_postID($category->slug), 'post_box_layout', true):'default';

		echo diver_posts_loop($post_box_layout);

		?>
	</main>
	<!-- /main -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>