<?php
class Diver_Widget_tab extends WP_Widget{

    function __construct() {
        parent::__construct(
            'Diver_Widget_tab', 
            '【Diver】タブウィジェット',
            array( 'description' => 'タブウィジェットエリアで作成した項目を表示します。', )
        );
    }

    function widget($args, $instance) {     
        extract( $args );
        $title = (isset($instance['title']))?$instance['title']:'';
        $num = (isset($instance['num']))?$instance['num']:'';
        ?>


        <?php echo $before_widget; ?>
        <?php echo ($title)?$before_title.$title.$after_title:''; ?>      
        <div class="tabber">
            <?php dynamic_sidebar('diver_tabwidget_'.$num); ?>
        </div>
        <?php  echo $after_widget; ?>

        <?php
    }
    function update($new_instance, $old_instance) {             
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['num'] = strip_tags($new_instance['num']);
        return $instance;
    }
    function form($instance) { 
        
        $defaults = array(
        'title' => '',
        'num' => '',
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
          <label id="<?php echo $this->get_field_id('num'); ?>" for="<?php echo $this->get_field_id('num'); ?>">
          <?php _e('表示タブウィジェットエリア'); ?>
          </label>
          <select name="<?php echo $this->get_field_name('num'); ?>">
          <?php

          $options = array();

            $i = 1;
            while($i <= get_option( 'diver_option_base_tabwidget','1')){
              $options[] = array($i,$i,"");
                $i++;
            }


            foreach ($options as $option) {
              $option[2] = selected( $instance['num'], $option[0] ,false);
          ?>
          <option value="<?php echo $option[0] ?>" <?php echo $option[2] ?>><?php echo $option[1] ?></option>
          <?php } ?>

          </select>
        </p>

        <?php 
    }
}


add_action( 'widgets_init','Diver_tabWidget');

function Diver_tabWidget() {
        register_widget( 'Diver_Widget_tab' );
}