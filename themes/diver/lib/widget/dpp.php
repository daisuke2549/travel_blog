<?php
class Diver_Widget_popularpost extends WP_Widget{

    function __construct() {
        parent::__construct(
            'Diver_Widget_popularpost', 
            '【Diver】人気記事',
            array( 'description' => 'アナリティクスから人気記事表示が可能です。', )
        );
    }

    function widget($args, $instance) {
        extract( $args );
        $VIEW_ID = get_option( 'diver_analytics_api_viewID');
        $keyfile = get_option('diver_analytics_api_key_url');

        if($VIEW_ID && $keyfile):

        $title = (isset($instance['title']))?$instance['title']:'';
        $count = (isset($instance['count']))?$instance['count']:'8';
        $page = (isset($instance['page']))?$instance['page']:'0';
        $span = (isset($instance['span']))?$instance['span']:'all';
        $img = (isset($instance['img']))?$instance['img']:'1';
        $imgwidth = (isset($instance['img_width']))?$instance['img_width']:'100';
        $imgheight = (isset($instance['img_height']))?$instance['img_height']:'80';
        $views = (isset($instance['views']))?$instance['views']:'1';
        $catins = (isset($instance['cat']))?$instance['cat']:'1';
        $tag = (isset($instance['tag']))?$instance['tag']:'1';

        ?>
        <?php echo $before_widget; ?>      
      <?php if ( !empty( $title ) ) {
          echo $before_title . esc_html( $title ) . $after_title;
        }; ?>
        <ul class="diver_popular_posts">
        <?php
        $num = 0;
        $rankdata = diver_posts_views_ranking($count,"",$span);
        if ($rankdata && is_array($rankdata)): foreach($rankdata as $postid => $view):
          $post = get_post($postid); 

          $cats = get_the_category($postid);
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
        ?>
        <li class="widget_post_list">
          <a class="clearfix" href="<?php echo get_permalink($postid); ?>" title="<?php echo $post->post_title; ?>">
          <?php if($img): ?>
            <div class="post_list_thumb" style="width: <?php echo $imgwidth ?>px;height:<?php echo $imgheight ?>px;">
            <?php echo get_diver_thumb_id_img($postid,apply_filters('diver_widget_popular_post_thumb','medium')); ?>
              <?php if($catins): ?>
                <div class="post_list_cat" style="<?php if(get_theme_mod($cat->slug)){ echo 'background:'.get_theme_mod($cat->slug).';'; } ?>"><?php echo $cat->cat_name; ?></div>
              <?php endif; ?>
             </div>
           <?php endif; ?>
           <div class="meta" style="<?php echo ($img)?'margin-left:'.(-$imgwidth-10).'px;padding-left:'.($imgwidth+10).'px;':'margin:0;padding:5px 3px;'; ?>">
                <div class="post_list_title"><?php echo $post->post_title; ?></div>
                <div class="post_list_tag">
                <?php if($catins&&!$img): ?>
                  <div class="post_list_cat" style="<?php if(get_theme_mod($cat->slug)){ echo 'background:'.get_theme_mod($cat->slug).';'; } ?>"><?php echo $cat->cat_name; ?></div>
                <?php endif; ?>
                <?php 
                    if($tag):
                      $posttags = get_the_tags($postid);
                      $tagcount=0;
                      $sep='';
                      if ($posttags) {
                        foreach($posttags as $tag) {
                          $tagcount++;
                          if ($tagcount > 4) break; 
                          echo '<div class="tag">'.$tag->name .'</div>';
                        }
                      }
                    endif;
                  ?>
                  </div>

                <?php if($views): ?>
                  <div class="post_list_views"><?php echo $view; ?></div>
              <?php endif; ?>
          </div>
          </a>
        </li>

        <?php 
          $num++;
          if($count <= $num){break;} 
        ?>
        <?php endforeach;wp_reset_postdata();
        else: ?>
          <p>データはありません</p>
        <?php endif; ?>
        </ul>
        <?php  echo $after_widget; ?>
    <?php endif;
  }
    function update($new_instance, $old_instance) {             
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['count'] = $new_instance['count'];
    $instance['page'] = strip_tags($new_instance['page']);
    $instance['span'] = $new_instance['span'];
    $instance['img'] = strip_tags($new_instance['img']);
    $instance['img_width'] = $new_instance['img_width'];
    $instance['img_height'] = $new_instance['img_height'];
    $instance['views'] = strip_tags($new_instance['views']);
    $instance['cat'] = strip_tags($new_instance['cat']);
    $instance['tag'] = strip_tags($new_instance['tag']);

        return $instance;
    }
    function form($instance) { 

        $defaults = array(
        'title' => '',
        'excerpt' => '0',
        'page' => '0',
        'count' => '8',
        'span' => 'all',
        'img' => '1',
        'img_width' => '100',
        'img_height' => '80',
        'cat' => '1',
        'tag' => '1',
        'views' => '1',
        );
        $instance = wp_parse_args( (array) $instance, $defaults ); 
        $VIEW_ID = get_option( 'diver_analytics_api_viewID');
        $keyfile = get_option('diver_analytics_api_key_url');

        if($VIEW_ID && $keyfile):
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
          <input class="widefat" id="<?php echo $this->get_field_id('page'); ?>" name="<?php echo $this->get_field_name('page'); ?>" type="checkbox" value="1" <?php checked( $instance['page'], 1 ); ?> />固定ページを含める
        </p>

        <p>
          <label id="<?php echo $this->get_field_id('span'); ?>" for="<?php echo $this->get_field_id('span'); ?>">
          <?php _e('集計期間：'); ?>
          </label>
          <select name="<?php echo $this->get_field_name('span'); ?>">
          <?php
          $options = array(
          array("all","全期間",""),
           array("day","昨日",""),
           array("week","先週",""),
           array("month","先月",""),
           );
            foreach ($options as $option) {
              $option[2] = selected( $instance['span'], $option[0] ,false);
          ?>
          <option value="<?php echo $option[0] ?>" <?php echo $option[2] ?>><?php echo $option[1] ?></option>
          <?php } ?>

          </select>
        </p>

        <p>
          <input class="widefat" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" type="checkbox" value="1" <?php checked( $instance['img'], 1 ); ?> />サムネイルを表示する
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('img_width'); ?>">
          <?php _e('横幅：'); ?>
          </label> 
          <input class="widefat" style="width:65px" id="<?php echo $this->get_field_id('img_width'); ?>" name="<?php echo $this->get_field_name('img_width'); ?>" type="number" min="1" value="<?php echo $instance['img_width']; ?>" />px　
          <label for="<?php echo $this->get_field_id('img_height'); ?>">
          <?php _e('縦：'); ?>
          </label> 
          <input class="widefat" style="width:65px" id="<?php echo $this->get_field_id('img_height'); ?>" name="<?php echo $this->get_field_name('img_height'); ?>" type="number" min="1" value="<?php echo $instance['img_height']; ?>" />px
        </p>

        <p>
          <input class="widefat" id="<?php echo $this->get_field_id('views'); ?>" name="<?php echo $this->get_field_name('views'); ?>" type="checkbox" value="1" <?php checked( $instance['views'], 1 ); ?> />view数を表示する
        </p>

        <p>
          <input class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="checkbox" value="1" <?php checked( $instance['cat'], 1 ); ?>  />カテゴリーを表示する
        </p>
        <p>
          <input class="widefat" id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" type="checkbox" value="1" <?php checked( $instance['tag'], 1 ); ?> />タグを表示する
        </p>

        <?php else: ?>
          <p>API設定を完了してください。<br>
          <a href="<?php echo admin_url(); ?>admin.php?page=manage_options#ga_settings">基本設定へ</a>
          </p>
        <?php endif;
    }
}

add_action( 'widgets_init', 'Diver_popularWidget');

function Diver_popularWidget() {
    register_widget( 'Diver_Widget_popularpost' );
}