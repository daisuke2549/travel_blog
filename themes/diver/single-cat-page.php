<?php 
get_header();
global $post;
$category = get_category_by_slug(get_post_meta($post->ID,'catpage_post_slug',true));
?>

<div id="main-wrap">
<?php if (is_user_logged_in()) : ?>
<div class="catpage_message">このページは、カテゴリーページのプレビューです。
	<?php if($category): ?>
	実際反映されるページは、<a href="<?php echo get_category_link( $category->cat_ID ); ?>"><?php echo $category->name; ?></a>です。
	<?php else: ?>
	カテゴリーを設定してください。
	<?php endif; ?>
</div>
<style>.catpage_message {padding: 1em;background: #000;color: #fff;font-weight: bold;}.catpage_message a{color:#4089ff;
    text-decoration: underline;}</style>
<?php endif;?>
		<?php get_template_part('/lib/parts/breadcrumb'); ?>
		<?php 
			$cat_content ='';
			if(get_theme_mod('set_catpage_title',true)){
				$cat_content = print_ctapage_content($category->slug,true,get_the_ID()); 
			}
		?>
	<main id="main" style="<?php echo main_position() ?>" role="main">
	<?php if(get_the_content()): ?>
		<div class="cat-post-main">
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="wrap-post-title"><?php echo $category->name ?><?php echo apply_filters('category_title_after','の記事一覧') ?></div>

		<?php
		$catID =  get_query_var('cat');
		echo apply_filters('diver_category_page_head','',$catID);
		$args = array(
			'post_type' => 'post',
			'paged' => $paged,
			'cat' => $category->cat_ID,
			);
		query_posts($args);

		$post_box_layout = (get_post_meta($post->ID, 'post_box_layout', true))?get_post_meta($post->ID, 'post_box_layout', true):'default';
		echo diver_posts_loop($post_box_layout);
		wp_reset_query();

		?>

	</main>
	<!-- /main -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>