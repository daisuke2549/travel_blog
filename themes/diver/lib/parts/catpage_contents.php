<?php 

function get_catpage_postID($cat_slug){
    $args = array(
        'post_type' => 'cat-page',
        'numberposts' => '-1'
    );
    $posts = get_posts( $args );

    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );

    $catpage_catID = get_post_meta($post->ID,'catpage_post_slug',true);
        if($cat_slug == $catpage_catID): 
            return $post->ID;
        endif;endforeach; 
    endif;

    wp_reset_postdata();

    return false;
}

function get_ctapage_title($cat_slug){
    $catid = get_category_by_slug($cat_slug);
    $cat_title = get_cat_name($catid->cat_ID);

    $args = array(
        'post_type' => 'cat-page',
        'numberposts' => '-1'
    );
    $posts = get_posts( $args );

    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );
        $catpage_catID = get_post_meta($post->ID,'catpage_post_slug',true);
            if($cat_slug == $catpage_catID): 
                $cat_title = $post->post_title;
            endif;endforeach; 
        endif; wp_reset_postdata();
    return $cat_title;
}

function print_ctapage_content($cat_slug,$preview = false,$id = null){

    $catid = get_category_by_slug($cat_slug);
    $cat_title = get_cat_name($catid->cat_ID);
    $cat_color = (get_theme_mod($cat_slug))?get_theme_mod($cat_slug):'#999';;
    $cat_titlecolor = '#fff';
    $cat_description = '';
    $cat_bg = '';

    $content = "";

    $args = array(
        'post_type' => 'cat-page',
        'numberposts' => '-1'
    );
    $posts = get_posts( $args );

    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );
        $catpage_catID = get_post_meta($post->ID,'catpage_post_slug',true);
        if($cat_slug == $catpage_catID): 
            $cat_color = get_post_meta($post->ID, 'catpagetitlebg', true);
            $cat_title = $post->post_title;
            $cat_titlecolor = get_post_meta($post->ID, 'catpagetitlecolor', true);
            $cat_bg = get_post_meta($post->ID, 'catpageimg-uploader_img', true);
            $cat_description = get_post_meta($post->ID, 'cat_description', true);

            $content = $post->post_content;

         endif;
         endforeach; 
         wp_reset_postdata(); 
     endif; 

     if($preview){
        $cat_color = get_post_meta($id, 'catpagetitlebg', true);
        $cat_titlecolor = get_post_meta($id, 'catpagetitlecolor', true);
        $cat_bg = get_post_meta($id, 'catpageimg-uploader_img', true);
        $cat_description = get_post_meta($id, 'cat_description', true);
     }

     ?>


    <div class="catpage_content_wrap" style="color:<?php echo $cat_titlecolor ?>;">
    <div class="cover lazyload" data-bg="<?php echo $cat_bg; ?>" style="background-color: <?php echo $cat_color; ?>;"></div>
        <div class="innner clearfix">
            <div class="catpage_inner_content">
                <h1 class="catpage_title"><?php echo $cat_title; ?></h1>
                 <?php // sharebtn('mini'); ?>
                 <?php if($cat_description): ?>
                    <div class="catpage_description"><?php echo do_shortcode(nl2br($cat_description)) ?></div>
                <?php endif; ?>
            </div>
            <?php if(get_theme_mod('set_catpage_title_tag',true)): ?>
                <div class="catpage_tag">
                    <?php 
                        $args = array(
                            'cat' => $catid->cat_ID,
                            'smallest' => 10,
                            'largest' => 10,
                            'number' => 15,
                            'order' => 'RAND'
                        );
                        $args = apply_filters('custom_category_tag_cloud',$args);
                        diver_category_tag_cloud($args); 
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php 
    return $content;
} 
?>