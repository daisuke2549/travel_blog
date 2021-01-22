<?php 
get_header();
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$curauthID = $curauth->ID;
?>
<div id="main-wrap">
	<?php get_template_part('/lib/parts/breadcrumb'); ?>
	<!-- main -->
	<main id="main" style="<?php echo main_position() ?>" role="main">
	<div class="author_title clearfix">
		<div class="author_title-thum"><?php echo get_avatar($curauth->ID, 120); ?></div>
		<div class="author_title-meta">
			<div class="author_title-name"><?php echo $curauth->nickname ?></div>
			<div class="author_title-desc"><?php echo $curauth->description; ?></div>
		</div>
	</div>


	<div class="wrap-post-title"><?php echo $curauth->nickname ?><?php echo apply_filters('author_title_after','の記事一覧') ?></div>
	<?php echo diver_posts_loop(); ?>
	</main>
	<!-- /main -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>