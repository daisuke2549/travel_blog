<?php
class Diver_Widget_Profile extends WP_Widget{

    function __construct() {
        parent::__construct(
            'diver_widget_profile', 
            '【Diver】プロフィール',
            array( 'description' => 'サイトの運営者等の情報を設定できます。', )
        );
    }

    function widget($args, $instance) {     
        extract( $args );
        $title = (isset($instance['title']))?$instance['title']:'';
        $body = (isset($instance['body']))?$instance['body']:'';
        $name = (isset($instance['name']))?$instance['name']:'';
        $namecolor = (isset($instance['namecolor']))?$instance['namecolor']:'';
        $iconsrc = (isset($instance['iconsrc']))?$instance['iconsrc']:'';
        $coversrc = (isset($instance['coversrc']))?$instance['coversrc']:'';
        $detailtitle = (isset($instance['detailtitle']))?$instance['detailtitle']:'';
        $detailurl = (isset($instance['detailurl']))?$instance['detailurl']:'';
        $detailbg = (isset($instance['detailbg']))?$instance['detailbg']:'';
        $detailcolor = (isset($instance['detailcolor']))?$instance['detailcolor']:'';
        $Facebook = (isset($instance['Facebook']))?$instance['Facebook']:'';
        $Twitter = (isset($instance['Twitter']))?$instance['Twitter']:'';
        $Instagram = (isset($instance['Instagram']))?$instance['Instagram']:'';
        $youtube = (isset($instance['youtube']))?$instance['youtube']:'';
        $sns = (isset($instance['sns']))?$instance['sns']:'';
        ?>
        <?php echo $before_widget; ?>
            <?php echo ($title)?$before_title.$title.$after_title:''; ?>
            <div class="diver_widget_profile clearfix">
            <?php if($iconsrc): ?>
                <div class="clearfix coverimg lazyload <?php echo ($coversrc)?'on':'no'; ?>" <?php echo ($coversrc)?'data-bg="'.$coversrc.'"':''; ?>>
                  <img class="lazyload" src="data:image/gif;base64,R0lGODdhAQABAPAAAN3d3QAAACwAAAAAAQABAAACAkQBADs=" data-src="<?php echo $iconsrc ?>" alt="userimg" />
                </div>
            <?php endif;?>
                <div class="img_meta">
                    <div class="name"><?php echo $name; ?></div>
                    <ul class="profile_sns">
                      <?php if($Facebook): ?><li><a class="facebook" href="<?php echo $Facebook ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php endif; ?>
                      <?php if($Twitter): ?><li><a class="twitter" href="<?php echo $Twitter ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php endif; ?>
                      <?php if($Instagram): ?><li><a class="instagram" href="<?php echo $Instagram ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li><?php endif; ?>
                      <?php if($youtube): ?><li><a class="youtube" href="<?php echo $youtube ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li><?php endif; ?>
                      <?php if($sns): ?><li><a class="sns" href="<?php echo $sns ?>" target="_blank"><i class="fa fa-share" aria-hidden="true"></i></a></li><?php endif; ?>
                    </ul>
                  </div>
              <div class="meta">
                <?php echo nl2br(do_shortcode($body)); ?>
              </div>
              <?php if($detailtitle): ?><div class="button"><a style="background:<?php echo $detailbg ?>;color: <?php echo $detailcolor ?>;" href="<?php echo $detailurl; ?>"><?php echo $detailtitle ?></a></div><?php endif; ?>
            </div>
        <?php echo $after_widget; ?>
        <?php
    }
    function update($new_instance, $old_instance) {             
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['body'] = $new_instance['body'];
      $instance['name'] = trim($new_instance['name']);
      $instance['namecolor'] = trim($new_instance['namecolor']);
      $instance['iconsrc'] = trim($new_instance['iconsrc']);
      $instance['coversrc'] = trim($new_instance['coversrc']);
      $instance['detailtitle'] = $new_instance['detailtitle'];
      $instance['detailurl'] = trim($new_instance['detailurl']);
      $instance['detailbg'] = trim($new_instance['detailbg']);
      $instance['detailcolor'] = trim($new_instance['detailcolor']);
      $instance['Facebook'] = trim($new_instance['Facebook']);
      $instance['Twitter'] = trim($new_instance['Twitter']);
      $instance['Instagram'] = trim($new_instance['Instagram']);
      $instance['youtube'] = trim($new_instance['youtube']);
      $instance['sns'] = trim($new_instance['sns']);
      return $instance;
    }
    function form($instance) { 
        
        $defaults = array(
        'title' => '',
        'body' => '',
        'name' => '',
        'detailtitle' => '',
        'detailurl' => '',
        'detailbg' => '#eee',
        'detailcolor' => ' #333',
        'iconsrc' => '',
        'coversrc' => '',
        'Facebook' => '',
        'Twitter' => '',
        'Instagram' => '',
        'youtube' => '',
        'sns' => '',
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
          <label for="<?php echo $this->get_field_id('name'); ?>">
          <?php _e('名前'); ?>
          </label> 
          <input class="widefat" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $instance['name']; ?>" />
        </p>

        <p>
           <label for="<?php echo $this->get_field_id('body'); ?>">
           <?php _e('テキスト'); ?>
           </label> 
           <textarea  class="widefat" rows="10" colls="20" id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>"><?php echo $instance['body']; ?></textarea>
        </p>

        <p>
        <label>アイコン画像</label><br>
        <input type="text" id="src_<?php echo $this->get_field_id('iconsrc'); ?>" name="<?php echo $this->get_field_name('iconsrc'); ?>" value="<?php echo $instance['iconsrc']; ?>" />
        <input class="button" type="button" name="mediauploadbtn" id="<?php echo $this->get_field_id('iconsrc'); ?>" value="画像を選択" />
        </p>

        <p>
        <label>カバー画像</label><br>
        <input type="text" id="src_<?php echo $this->get_field_id('coversrc'); ?>" name="<?php echo $this->get_field_name('coversrc'); ?>" value="<?php echo $instance['coversrc']; ?>" />
        <input class="button" type="button" name="mediauploadbtn" id="<?php echo $this->get_field_id('coversrc'); ?>" value="画像を選択" />
        </p>

        <div class="widget_sep">詳細ボタン</div>

        <p>
          <label for="<?php echo $this->get_field_id('detailtitle'); ?>">
          <?php _e('詳細ボタンタイトル'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('detailtitle'); ?>" name="<?php echo $this->get_field_name('detailtitle'); ?>" type="text" value="<?php echo $instance['detailtitle']; ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('detailurl'); ?>">
          <?php _e('詳細ボタンリンク先'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('detailurl'); ?>" name="<?php echo $this->get_field_name('detailurl'); ?>" type="text" value="<?php echo $instance['detailurl']; ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('detailbg'); ?>">詳細ボタン背景色</label> 
          <input type="text" id="<?php echo $this->get_field_id('detailbg'); ?>" name="<?php echo $this->get_field_name('detailbg'); ?>" class="myColorPicker" value="<?php echo $instance['detailbg']; ?>">
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('detailcolor'); ?>">詳細ボタン文字色</label> 
          <input type="text" id="<?php echo $this->get_field_id('detailcolor'); ?>" name="<?php echo $this->get_field_name('detailcolor'); ?>" class="myColorPicker" value="<?php echo $instance['detailcolor']; ?>">
        </p>


        <p>
          <label for="<?php echo $this->get_field_id('Facebook'); ?>">
          <?php _e('Facebook'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('Facebook'); ?>" name="<?php echo $this->get_field_name('Facebook'); ?>" type="text" value="<?php echo $instance['Facebook']; ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('Twitter'); ?>">
          <?php _e('Twitter'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('Twitter'); ?>" name="<?php echo $this->get_field_name('Twitter'); ?>" type="text" value="<?php echo $instance['Twitter']; ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('Instagram'); ?>">
          <?php _e('Instagram'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('Instagram'); ?>" name="<?php echo $this->get_field_name('Instagram'); ?>" type="text" value="<?php echo $instance['Instagram']; ?>" />
        </p>

          <p>
          <label for="<?php echo $this->get_field_id('youtube'); ?>">
          <?php _e('youtube'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $instance['youtube']; ?>" />
        </p>

        <p>
          <label for="<?php echo $this->get_field_id('sns'); ?>">
          <?php _e('その他SNS'); ?>
          </label> 
          <input class="widefat" id="<?php echo $this->get_field_id('sns'); ?>" name="<?php echo $this->get_field_name('sns'); ?>" type="text" value="<?php echo $instance['sns']; ?>" />
        </p>
        <?php 
    }
}

add_action( 'widgets_init', 'Diver_profileWidget');

function Diver_profileWidget() {
    register_widget( 'Diver_Widget_Profile' );
}