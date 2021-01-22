<?php
class Diver_Widget_newpost_grid extends WP_Widget{

    function __construct() {
        parent::__construct(
            'Diver_Widget_newpost_grid', 
            '【Diver】記事一覧グリッド',
            array( 'description' => 'すべての投稿から一覧グリッド表示が可能です。', )
        );
    }

    function widget($args, $instance) {
        extract( $args );
        $title = (isset($instance['title']))?$instance['title']:'';
        $desc = (isset($instance['desc']))?$instance['desc']:'0';
        $descnum = (isset($instance['descnum']))?$instance['descnum']:'80';
        $count = (isset($instance['count']))?$instance['count']:'8';
        $sort = (isset($instance['sort']))?$instance['sort']:'new';
        $sortcat = (isset($instance['sortcat']))?$instance['sortcat']:'';
        $sorttag = (isset($instance['sorttag']))?$instance['sorttag']:'';
        $img = (isset($instance['img']))?$instance['img']:'1';
        $date = (isset($instance['date']))?$instance['date']:'1';
        $catins = (isset($instance['cat']))?$instance['cat']:'1';
        $first = (isset($instance['first']))?$instance['first']:'1';
        $more_text = (isset($instance['more_text']))?$instance['more_text']:'';
        $more_link = (isset($instance['more_link']))?$instance['more_link']:'';

        $args = array(
          'post_type' => apply_filters('diver_widget_post_type','post'),
          'posts_per_page' => $count,
          'orderby' => $sort,
          'order' => 'DESC',
          'cat' => $sortcat,
          'tag' => $sorttag,
          'ignore_sticky_posts' => 1,
        );
        $query = new WP_Query( $args );
        ?>
        <?php echo $before_widget; ?>      
      <?php if ( !empty( $title ) ) {
          echo $before_title . esc_html( $title ) . $after_title;
        }; ?>
        <ul class="diver_widget_post_grid">
        <?php if ( $query->have_posts() ):
         ?>
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
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
            <li class="widget_post_list clearfix grid <?php echo ($first)?'first':''; ?>">
              <a class="clearfix" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php if($img): ?>
                <div class="post_list_thumb">
                <?php echo get_diver_thumb_img(apply_filters('diver_widget_post_grid_thumb','medium')); ?>
                  <?php if($catins && $cats): ?>
                    <div class="post_list_cat" style="<?php if(get_theme_mod($cat->slug)){ echo 'background:'.get_theme_mod($cat->slug).';'; } ?>"><?php echo $cat->cat_name; ?></div>
                  <?php endif; ?>
                 </div>
                <?php endif; ?>
                <div class="meta">
                    <div class="post_list_title"><?php the_title(); ?></div>

                    <div class="post_list_tag">
                    <?php if($catins&&!$img): ?>
                      <div class="post_list_cat" style="<?php if(get_theme_mod($cat->slug)){ echo 'background:'.get_theme_mod($cat->slug).';'; } ?>"><?php echo $cat->cat_name; ?></div>
                    <?php endif; ?>
                    
                      </div>
                      <?php $excerpt = get_diver_excerpt(get_the_ID(),$descnum); ?>
                      <?php if($desc): ?><div class="desc"><?php echo $excerpt; ?></div><?php endif; ?>

                    <?php if($date): ?><div class="post_list_date"><?php echo ($sort == 'modified')?get_the_modified_date('Y.m.d',get_the_ID()):get_the_date('Y.m.d',get_the_ID()); ?></div><?php endif; ?>
              </div>
              </a>
            </li>
          <?php endwhile;wp_reset_postdata(); ?>

          <?php if($more_text && $more_link): ?>
            <li class="widget_post_more">
              <a class="diver_widget_morelink" href="<?php echo $more_link ?>"><?php echo $more_text ?></a>
            </li>
          <?php endif; ?>

        <?php else: ?>
          <p>新しい記事はありません</p>
        <?php endif; ?>
        </ul>
        <?php  echo $after_widget; ?>
    <?php }
    function update($new_instance, $old_instance) {             
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['count'] = $new_instance['count'];
    $instance['sort'] = $new_instance['sort'];
    $instance['sortcat'] = $new_instance['sortcat'];
    $instance['sorttag'] = $new_instance['sorttag'];
    $instance['img'] = strip_tags($new_instance['img']);
    $instance['desc'] = strip_tags($new_instance['desc']);
    $instance['descnum'] = $new_instance['descnum'];
    $instance['date'] = strip_tags($new_instance['date']);
    $instance['cat'] = strip_tags($new_instance['cat']);
    $instance['first'] = strip_tags($new_instance['first']);
    $instance['more_text'] = strip_tags($new_instance['more_text']);
    $instance['more_link'] = strip_tags($new_instance['more_link']);

        return $instance;
    }
    function form($instance) { 

        $defaults = array(
        'title' => '',
        'excerpt' => '0',
        'desc' => '0',
        'descnum' => '80',
        'count' => '8',
        'sort' => 'new',
        'sorttag' => '',
        'img' => '1',
        'date' => '1',
        'cat' => '1',
        'first' => '1',
        'more_text' => '',
        'more_link' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults ); 

        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
          <?php _e('タイトル'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('count'); ?>">
          <?php _e('最大表示数：'); ?>
          </label> 
          <input class="widefat" style="width:40px" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="number" min="1" value="<?php echo $instance['count']; ?>" />件
        </p>

        <p>
          <label id="<?php echo $this->get_field_id('sort'); ?>" for="<?php echo $this->get_field_id('sort'); ?>">
          <?php _e('ソート順：'); ?>
          </label>
          <select name="<?php echo $this->get_field_name('sort'); ?>">
          <?php
          $options = array(
           array("date","投稿日順",""),
           array("modified","更新日順",""),
           array("rand","ランダム",""),
           );
            foreach ($options as $option) {
              $option[2] = selected( $instance['sort'], $option[0] ,false);
          ?>
          <option value="<?php echo $option[0] ?>" <?php echo $option[2] ?>><?php echo $option[1] ?></option>
          <?php } ?>

          </select>
        </p>


        <?php 
        $args = array(
          'child_of'            => 0,
          'current_category'    => 0,
          'depth'               => 0,
          'echo'                => 1,
          'exclude'             => '',
          'exclude_tree'        => '',
          'feed'                => '',
          'feed_image'          => '',
          'feed_type'           => '',
          'hide_empty'          => 1,
          'hide_title_if_empty' => false,
          'hierarchical'        => true,
          'order'               => 'ASC',
          'orderby'             => 'name',
          'separator'           => '<br />',
          'show_count'          => 0,
          'show_option_all'     => '',
          'show_option_none'    => __( 'No categories' ),
          'style'               => 'list',
          'taxonomy'            => 'category',
          'title_li'            => __( 'Categories' ),
          'use_desc_for_title'  => 1,
            );
        $cat_all = get_categories($args);
        $cat_option = array();
        foreach($cat_all as $value): 
          array_push($cat_option,array($value->term_id,$value->name,""));
        endforeach; ?>
        <p>
          <label id="<?php echo $this->get_field_id('sortcat'); ?>" for="<?php echo $this->get_field_id('sortcat'); ?>">
          <?php _e('カテゴリー：'); ?>
          </label>
          <select name="<?php echo $this->get_field_name('sortcat'); ?>">
            <option value="" >全カテゴリー</option>
          <?php
          foreach ($cat_option as $option) {
              $option[2] = selected( $instance['sortcat'], $option[0] ,false);
          ?>
          <option value="<?php echo $option[0] ?>" <?php echo $option[2] ?>><?php echo $option[1] ?></option>
          <?php } ?>        
        </select>
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('sorttag'); ?>">
          <?php _e('タグ：'); ?>
          </label> 
          <input class="widefat" style="width:220px" id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('sorttag'); ?>" type="text" value="<?php echo $instance['sorttag']; ?>" />
        </p>

        <p>
          <input class="widefat" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" type="checkbox" value="1" <?php checked( $instance['img'], 1 ); ?> />サムネイルを表示する
        </p>

        <p>
          <input class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>" type="checkbox" value="1" <?php checked( $instance['desc'], 1 ); ?> />抜粋を表示する(サイドバーでは表示されません。)
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('descnum'); ?>">
          <?php _e('抜粋文字数：'); ?>
          </label> 
          <input class="widefat" style="width:60px" id="<?php echo $this->get_field_id('descnum'); ?>" name="<?php echo $this->get_field_name('descnum'); ?>" type="number" min="1" value="<?php echo $instance['descnum']; ?>" />件
        </p>

        <p>
          <input class="widefat" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="checkbox" value="1" <?php checked( $instance['date'], 1 ); ?> />投稿日を表示する
        </p>

        <p>
          <input class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="checkbox" value="1" <?php checked( $instance['cat'], 1 ); ?>  />カテゴリーを表示する
        </p>

        <p>
          <input class="widefat" id="<?php echo $this->get_field_id('first'); ?>" name="<?php echo $this->get_field_name('first'); ?>" type="checkbox" value="1" <?php checked( $instance['first'], 1 ); ?> />先頭記事を拡大する
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('more_text'); ?>">
          <?php _e('もっと見るテキスト'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('more_text'); ?>" name="<?php echo $this->get_field_name('more_text'); ?>" type="text" value="<?php echo $instance['more_text']; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('more_link'); ?>">
          <?php _e('もっと見るリンク先URL'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('more_link'); ?>" name="<?php echo $this->get_field_name('more_link'); ?>" type="text" value="<?php echo $instance['more_link']; ?>" />
        </p>


        <?php 
    }
}

add_action( 'widgets_init', 'Diver_newpostGridWidget');

function Diver_newpostGridWidget() {
    register_widget( 'Diver_Widget_newpost_grid' );
}