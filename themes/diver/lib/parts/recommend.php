<?php $recommendnum = get_theme_mod('recommend_num',8);
if(!empty($recommendnum)): ?>
  <div class="single_title"><?php echo get_theme_mod('recommend_title','おすすめの記事') ?></div>
  <section class="recommend-post inline-nospace">
    <?php
    if(!is_amp()):
      // AMPじゃない時
      $args = array(
        'post_type' => apply_filters('diver_recommend_post_type','post'),
        'numberposts' =>$recommendnum, 
        'orderby'=>'rand',
        'exclude'=> array(get_the_ID())
      );
      $myposts = get_posts(apply_filters('diver_recommend_args',$args));
      foreach( $myposts as $post ) :
        setup_postdata($post); 
        ?>
        <article role="article" class="single-recommend clearfix hvr-fade-post" style="<?php echo (get_theme_mod('recommend_type','2column') == '1column') ? 'width:100%;float:none;':''; ?>">
          <a class="clearfix" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
          <figure class="recommend-thumb post-box-thumbnail__wrap">
              <?php echo get_diver_thumb_img(apply_filters('diver_recommend_thumb_img_size','thumbnail')); ?>
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

              if(!get_theme_mod('post_category',1)){
                $parent_cat_id = $cat->parent;
                if($parent_cat_id != 0){
                  $cat = get_category($parent_cat_id);
                }
              }
            }
            ?>
            <div class="recommend-cat" style="background:<?php echo get_theme_mod($cat->slug);?>"><?php echo $cat->cat_name; ?></div>
          </figure>
          <section class="recommend-meta">
            <div class="recommend-title">
                  <?php the_title(); ?>
            </div>
            <div class="recommend-desc"><?php echo get_diver_excerpt($post->ID,70); ?></div>
          </section>
          </a>
        </article>
      <?php endforeach; 
      wp_reset_postdata(); ?>
    <?php else: 
      // AMP時
      $args = array(
        'post_type' => apply_filters('diver_recommend_post_type','post'),
        'numberposts' =>$recommendnum, 
        'orderby'=>'rand'
      );
      $myposts = get_posts( $args );
      foreach( $myposts as $post ) :
        setup_postdata($post); 
        ?>
        <article role="article" class="single-recommend">
          <a class="wrap_link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"></a>
          <figure class="recommend-thumb post-box-thumbnail__wrap">
            <?php
            if(has_post_thumbnail()):
              $thumbnail_id = get_post_thumbnail_id(); 
              // mediumサイズの画像内容を取得（引数にmediumをセット）
              $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'medium' );
              ?>
              <amp-img src="<?php echo $eye_img[0] ?>" layout="responsive" height="50" width="50">
            <?php endif; ?>
          </figure>

          <section class="recommend-meta">
            <div class="recommend-title">
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
              <?php if (mb_strlen($post->post_title) > 38) :
                echo mb_substr(the_title($before = '', $after = '', FALSE), 0, 38) . '…'; 
              else:
                the_title();
              endif; ?>
              </a>
            </div>
          </section>
        </article>
      <?php endforeach; 
      wp_reset_postdata(); ?>
    <?php endif; ?>
  </section>
<?php endif; ?>
