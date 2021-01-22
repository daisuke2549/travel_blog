<?php
/*
Template Name:全幅ページ
*/
?>
<?php get_header(); ?>
<div id="main-wrap" class="fullpage">
    <!-- main -->

    <?php 
    global $post;
    ?>
    
    <main id="page-main" role="main">

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

            <?php if(get_option('diver_postsettings_icatch_on',get_theme_mod('single_icatch',1))): ?>
                <?php $eye_img = wp_get_attachment_image_src( get_post_thumbnail_id() , 'medium' ); ?>
                    <figure class="single_thumbnail" <?php echo (get_option('diver_postsettings_icatchbg_on',get_theme_mod('single_icatch_bg',1)))?'style="background-image:url('.$eye_img[0].')"':''; ?>>
                        <?php echo get_diver_thumb_img('full',false,'',true ,false); ?>
                    </figure>
            <?php endif; ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

                <section class="single-post-main">
                    <div class="content">
                        <?php if($post->post_password){echo apply_filters('the_content', get_post_meta(get_the_ID(),'auth_before_content',true));} ?>
                        <?php the_content(); ?>
                    </div>
                </section>
                <?php get_template_part('/lib/parts/pager-next-links'); ?>
                </article>
        <?php endwhile;
        endif; ?>
        <!-- /CTA -->
        <?php diver_get_cta(); ?>
        
    <?php if (is_front_page()): ?>
         <?php dynamic_sidebar('main-bottom'); ?>
    <?php endif; ?>
    </main>
    <!-- /main -->
</div>
<?php get_footer(); ?>
<style>
<?php echo get_post_meta($post->ID,'custom_css',true) ?>
</style>