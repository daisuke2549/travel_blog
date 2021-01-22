<?php
class Diver_Widget_Pcsp extends WP_Widget{

    function __construct() {
        parent::__construct(
            'diver_widget_pcsp', 
            '【Diver】PC・SP切り替え',
            array( 'description' => 'PCとSPで表示を切り替えたい場合にご利用ください。', )
        );
    }

    function widget($args, $instance) {     
        extract( $args );
        $title = (isset($instance['title']))?$instance['title']:'';
        $switch = (isset($instance['switch']))?$instance['switch']:'';
        $content = (isset($instance['content']))?$instance['content']:'';
        ?>

        <?php if(!is_mobile()&&$switch=='pc'||is_mobile()&&$switch=='sp'):
            echo $before_widget; ?>      
              <?php if ( !empty( $title ) ) {
                  echo $before_title . esc_html( $title ) . $after_title;
                }; ?>
                <div class="textwidget">
                    <?php echo apply_filters('widget_text',$content); ?>
                </div>
            <?php
            echo $after_widget;
        endif;
    }
    function update($new_instance, $old_instance) {             
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['switch'] = strip_tags($new_instance['switch']);
    $instance['content'] = $new_instance['content'];

        return $instance;
    }
    function form($instance) { 
        
        $defaults = array(
        'title' => '',
        'switch' => 'pc',
        'content' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults ); 

        ?>
 
        <p>
            <label for="<?php echo $this->get_field_id('switch'); ?>">
            <?php _e('表示設定'); ?>
            </label>
            <label><input class="widefat" id="<?php echo $this->get_field_id('switch'); ?>" name="<?php echo $this->get_field_name('switch'); ?>" type="radio" value="pc" <?php checked('pc',$instance['switch']); ?>/>PC</label>　
            <label><input class="widefat" id="<?php echo $this->get_field_id('switch'); ?>" name="<?php echo $this->get_field_name('switch'); ?>" type="radio" value="sp" <?php checked('sp',$instance['switch']); ?>/>SP</label>
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
          <?php _e('タイトル'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo esc_textarea( $instance['content'] ); ?></textarea>
        </p>


        <?php 
    }
}


add_action( 'widgets_init','Diver_pcspWidget');

function Diver_pcspWidget() {
        register_widget( 'Diver_Widget_Pcsp' );
}