<?php
class Diver_Widget_Search extends WP_Widget{

    function __construct() {
        parent::__construct(
            'diver_widget_search', 
            '【Diver】絞り込み検索',
            array( 'description' => 'サイト内の投稿を絞り込んで検索できます。', )
        );
    }

    function widget($args, $instance) {     
        extract( $args );
        $title = (isset($instance['title']))?$instance['title']:'';
        $tag_number = (isset($instance['tag_number']))?$instance['tag_number']:'';

        $html = $before_widget;
        $html .= ($title)?$before_title.$title.$after_title:''; 

        $html .= '<form class="search-widget" method="get" action="'.get_home_url().'">'; 


        $query_s =  get_query_var('s');
        $keyword_label = apply_filters('diver_widget_search_keyword_label','キーワード');

        $html .= '<div class="search-widget__col">';
        $html .= '<label class="search-widget__label">'.$keyword_label.'</label>'; 
        $html .= '<input type="text" name="s" class="search-widget__input" placeholder="'.$keyword_label.'を入力" value="'.$query_s.'">'; 
        $html .= '</div>'; 

        $query_cat =  get_query_var('cat');
        $categories = apply_filters('diver_widget_search_categories',get_categories( 'get=all' ));
        $category_label = apply_filters('diver_widget_search_category_label','カテゴリー');

        $html .= '<div class="search-widget__col">';
        $html .= '<label class="search-widget__label">'.$category_label.'</label>'; 
        $html .= '<div class="search-widget__select">';
        $html .= '<select name="cat">'; 
        $html .= '<option value>'.$category_label.'を選択</option>'; 
        foreach ($categories as $category) {
          $html .= '<option value="'.$category->term_id.'" '.selected($category->term_id,$query_cat,false).'>'.$category->name.'</option>'; 
        }
        $html .= '</select>'; 
        $html .= '</div>'; 

        $html .= '</div>'; 

        $query_tag =  get_query_var('tag');
        $tag_arr = explode(",", $query_tag);
        $tag_label = apply_filters('diver_widget_search_tag_label','タグ');

        if($tag_number != '0'){

          $html .= '<div class="search-widget__col">';
          $html .= '<label class="search-widget__label">'.$tag_label.'</label>'; 

          $tag_number = ($tag_number)?$tag_number:'12';

          $tag_args = array(
            'orderby' => 'count',
            'order' => 'DESC',
            'number' => $tag_number
          );
          $tags = get_tags($tag_args);
          foreach ($tags as $tag) {
            $html .= '<label><input type="checkbox" class="search-widget__checkbox" name="tag[]" value="'.$tag->slug.'" '.checked(in_array($tag->slug, $tag_arr, true),true,false).' /><span class="search-widget__checkbox-label">'.$tag->name.'</span></label>';

          }
          $html .= '</div>'; 

        }

        $submit_label = apply_filters('diver_widget_search_submit_label','検索');

        $html .= '<button type="submit" class="search-widget__submit" value="search">'.$submit_label.'</button>';
            
        $html .= '</form>'; 

        $html .= $after_widget;

        echo $html;

    }
    function update($new_instance, $old_instance) {             
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['tag_number'] = strip_tags($new_instance['tag_number']);

      return $instance;
    }
    function form($instance) { 
        $defaults = array(
        'title' => '',
        'tag_number' => '12'
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
          <label for="<?php echo $this->get_field_id('tag_number'); ?>">
          <?php _e('タグ最大表示数'); ?>
          </label> 
          <input class="widefat" name="<?php echo $this->get_field_name('tag_number'); ?>" type="number" min="0" value="<?php echo $instance['tag_number']; ?>" />
        </p>

        <?php 
    }
}

add_action( 'widgets_init', 'Diver_Widget_Search');

function Diver_Widget_Search() {
    register_widget( 'Diver_Widget_Search' );
}