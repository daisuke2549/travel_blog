<?php
class Diver_Widget_Ad extends WP_Widget{

    function __construct() {
        parent::__construct(
            'diver_widget_ad', 
            '【Diver】広告エリア',
            array( 'description' => 'GoogleAdsenceや広告を利用する場合にこちらのウィジェットを利用下さい。', )
        );
    }

    function widget($args, $instance) {
        global $post;
        $adremove = (is_singular())?get_post_meta($post->ID, "ad_remove", true):false;

        extract( $args );
        $title = (isset($instance['title']))?$instance['title']:'';
        $body = (isset($instance['body']))?$instance['body']:'';
        $body2 = (isset($instance['body2']))?$instance['body2']:'';
        $display = (isset($instance['display']))?$instance['display']:'';
       

        if(!$adremove || !$display):
            ?>
            <div class="clearfix diver_widget_adarea">
                <div class="diver_widget_adlabel"><?php echo $title ?></div>
                <?php if(!empty($body2)&&!is_mobile()): ?>
                    <div class="col2"><div class="diver_ad"><?php echo apply_filters('widget_text',$body); ?></div></div>
                    <div class="col2"><div class="diver_ad"><?php echo apply_filters('widget_text',$body2); ?></div></div>
                <?php else: ?>
                    <div class="diver_ad"><?php echo apply_filters('widget_text',$body); ?></div>
                <?php endif; ?>
            </div>
            <?php
        endif;
    }
    function update($new_instance, $old_instance) {             
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['body'] = trim($new_instance['body']);
    $instance['body2'] = trim($new_instance['body2']);
    $instance['display'] = strip_tags($new_instance['display']);

        return $instance;
    }
    function form($instance) { 
        
        $defaults = array(
        'title' => '',
        'body' => '',
        'body2' => '',
        'display' => '',
        'rectangle' => '',
        );
        $instance = wp_parse_args( (array) $instance, $defaults ); 

        ?>
        <p>
          <input class="widefat" id="<?php echo $this->get_field_id('display'); ?>" name="<?php echo $this->get_field_name('display'); ?>" type="checkbox" value="1" <?php checked( $instance['display'], 1 ); ?> />広告非表示設定時にこのウィジェットも非表示する
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
          <?php _e('広告ラベル'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
        </p>

        <p>
           <label for="<?php echo $this->get_field_id('body'); ?>">
           <?php _e('広告コード１'); ?>
           </label> 
           <textarea  class="widefat" rows="10" colls="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo $instance['body']; ?></textarea>
        </p>


        <p>
           <label for="<?php echo $this->get_field_id('body2'); ?>">
           <?php _e('広告コード２(PC表示の場合にダブルレクタングルになります。)'); ?>
           </label> 
           <textarea  class="widefat" rows="10" colls="20" id="<?php echo $this->get_field_id('body2'); ?>" name="<?php echo $this->get_field_name('body2'); ?>"><?php echo $instance['body2']; ?></textarea>
        </p>
        <script type="text/javascript"> 
            // jQuery(document).ready(function($) {
            //     var rectangleid = "#"+<?php echo json_encode($this->get_field_id('rectangle')); ?>;
            //     var ad2 = "#"+<?php echo json_encode($this->get_field_id('body2')); ?>;
            //     if ($(rectangleid).is(':checked')) {
            //         $(ad2).fadeIn();
            //     } else {
            //         $(ad2).fadeOut();
            //     }
            // });
        </script> 
        <?php 
    }
}
 
add_action( 'widgets_init', 'Diver_adWidget');

function Diver_adWidget() {
    register_widget( 'Diver_Widget_Ad' );
}