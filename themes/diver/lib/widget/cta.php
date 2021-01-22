<?php
class Diver_Widget_Cta extends WP_Widget{

    function __construct() {
        parent::__construct(
            'Diver_Widget_cta', 
            '【Diver】CTA',
            array( 'description' => 'CTAを表示します。', )
        );
    }

    function widget($args, $instance) {     
        extract( $args );
        $title = (isset($instance['title']))?$instance['title']:'';
        $content = (isset($instance['content']))?$instance['content']:'';
        $img = (isset($instance['img']))?$instance['img']:'';
        $btntitle = (isset($instance['btntitle']))?$instance['btntitle']:'';
        $url = (isset($instance['url']))?$instance['url']:'';
        ?>

        <?php echo $before_widget; ?>      
                <div class="cta_widget">
                    <?php if ( !empty( $title ) ) {
                      echo $before_title . esc_html( $title ) . $after_title;
                    }; ?>
                    <?php if($img): ?>
                    <div class="cta_content">
                          <figure><img class="lazyload" src="data:image/gif;base64,R0lGODdhAQABAPAAAN3d3QAAACwAAAAAAQABAAACAkQBADs=" data-src="<?php echo $img ?>"/></figure>
                        <?php endif;?>
                        <div class="content"><?php echo apply_filters('widget_text',$content); ?></div>
                    </div>
                    <div class="button shadow"><a class="big" href="<?php echo $img ?>"><?php echo $btntitle ?></a></div>
                </div>
        <?php echo $after_widget;
    }
    function update($new_instance, $old_instance) {             
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['content'] = $new_instance['content'];
    $instance['img'] = trim($new_instance['img']);
    $instance['btntitle'] = strip_tags($new_instance['btntitle']);
    $instance['url'] = strip_tags($new_instance['url']);
        return $instance;
    }
    function form($instance) { 
        
        $defaults = array(
        'title' => '',
        'content' => '',
        'img' => '',
        'btntitle' => '',
        'url' => ''
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
            <label>画像</label><br>
            <input type="text" id="src_<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" value="<?php echo $instance['img']; ?>" />
            <input class="button" type="button" name="mediauploadbtn" id="<?php echo $this->get_field_id('img'); ?>" value="画像を選択" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo esc_textarea( $instance['content'] ); ?></textarea>
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('btntitle'); ?>">
          <?php _e('ボタンタイトル'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('btntitle'); ?>" name="<?php echo $this->get_field_name('btntitle'); ?>" type="text" value="<?php echo $instance['btntitle']; ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('url'); ?>">
          <?php _e('リンク先URL'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $instance['url']; ?>" />
        </p>

        <?php 
    }
}


add_action( 'widgets_init','Diver_ctaWidget');

function Diver_ctaWidget() {
        register_widget( 'Diver_Widget_Cta' );
}