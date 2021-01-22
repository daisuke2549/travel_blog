<?php
get_header();
global $post;
?>
<div id="main-wrap">
	<main id="main" style="margin: 0 auto" role="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<section class="single-post-main">
				<div class="content">
				<?php the_content(); ?>
				</div>
			</section>
		</article>
	</main>
</div>
<?php get_footer(); ?>
