<?php if(get_theme_mod('single_bottom_author',true)&&is_single()): ?>
  <div class="post_footer_author_title"><?php echo apply_filters('footer_author_title','この記事を書いた人'); ?></div>
  <div class="post_footer_author clearfix">
  <div class="post_author_user clearfix vcard author">
    <div class="post_thum"><?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
    <?php 
      $facebook = get_the_author_meta( 'facebook' );
      $twitter = get_the_author_meta( 'twitter' );
      $instagram = get_the_author_meta( 'instagram' );
      $youtube = get_the_author_meta( 'youtube' );

    ?>
      <ul class="profile_sns">
        <?php if($facebook): ?><li><a class="facebook" href="<?php echo $facebook ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php endif ?>
        <?php if($twitter): ?><li><a class="twitter" href="<?php echo $twitter ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php endif; ?>
        <?php if($instagram): ?><li><a class="instagram" href="<?php echo $instagram ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li><?php endif; ?>
        <?php if($youtube): ?><li><a class="youtube" href="<?php echo $youtube ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li><?php endif; ?>
      </ul>
    </div>
    <div class="post_author_user_meta">
      <div class="post-author fn"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></div>
      <div class="post-description"><?php the_author_meta('description'); ?></div>
    </div>
  </div>
    <?php if(get_theme_mod('single_bottom_author_article',true)): ?>
    <div class="post_footer_author_title_post"><?php echo apply_filters('author_post_title','最近書いた記事'); ?></div>
    <div class="inline-nospace">
    <?php
    $list_cnt = apply_filters('author_post_list_count',4);
    $sticky = get_option('sticky_posts');
    $args = array(
      'posts_per_page' => $list_cnt,
      'orderby' => 'post_date',
      'order' => 'DESC',
      'post_type' => apply_filters('diver_author_post_type','post'),
      'author' => get_the_author_meta('ID')
    );
    $the_query = new WP_Query($args);
    if($the_query->have_posts()):while($the_query->have_posts()):$the_query->the_post();
    ?>
      <div class="author-post hvr-fade-post">
      <a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
        <figure class="author-post-thumb post-box-thumbnail__wrap">
          <?php
            echo get_diver_thumb_img(apply_filters('diver_author_thumb_img_size','thumbnail'));
           ?>
          <?php
            $cats = get_the_category();
            if($cats){
              $cat = $cats[0];
              foreach ($cats as $category) {
                if($category->category_parent){
                  $cat=$category;
                  break;
                }
              }
            }
          ?>
          <div class="author-post-cat"><span style="background:<?php echo get_theme_mod($cat->slug);?>"><?php echo $cat->cat_name; ?></span></div>
        </figure>
        <div class="author-post-meta">
          <div class="author-post-title"><?php the_title();?></div>
        </div>
      </a>
      </div>
      <?php endwhile;
      endif;
      wp_reset_query();
      ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>