<?php
add_action('add_meta_boxes', 'add_single_youtubebox');
add_action('save_post', 'save_add_single_youtubebox');

function add_single_youtubebox() {
	add_meta_box( 'diver_featured_youtube_url_settings','Youtube動画', 'diver_featured_youtube_url_settings', 'post', 'side' );
}

function diver_featured_youtube_url_settings() {
    wp_nonce_field(wp_create_nonce(__FILE__), 'single_youtube_nonce');

	$field_id    = 'diver_featured_youtube_url';
	$field_value = esc_attr( get_post_meta( get_the_ID(), $field_id, true ) ); ?>

	<p style="font-size: .8em;color:#555;">投稿のアイキャッチ画像部分に動画を表示することが可能です。</p>

	<p>Youtube url<label><input type="text" name="<?php echo $field_id; ?>" id="<?php echo $field_id; ?>" value="<?php echo $field_value; ?>" style="width:100%;"></label></p>

	<p style="font-size: .8em;color:#555;">記事一覧のサムネイル表示はアイキャッチ画像未設定の場合には動画のサムネイルが設定されます。</p>

	<?php
	$youtubeObj = get_youtube_thumbnail($field_value);
	if($youtubeObj){ ?>
		<img style="width: 100%;" src="<?php echo $youtubeObj['thumbnail_url'] ?>">
	<?php
	} 

	$diver_featured_youtube_inline = get_post_meta( get_the_ID(), 'diver_featured_youtube_inline', true );
	$diver_featured_youtube_controls = get_post_meta( get_the_ID(), 'diver_featured_youtube_controls', true );


	?>
    <p><label><input type="checkbox" name="diver_featured_youtube_inline" value="1" <?php checked($diver_featured_youtube_inline, 1 ); ?> /> インライン再生</label></p>
    <p><label><input type="checkbox" name="diver_featured_youtube_controls" value="1" <?php checked($diver_featured_youtube_controls, 1 ); ?> /> コントローラー非表示</label></p>

<?php 
}

function save_add_single_youtubebox($post_id) {
	$single_youtube_nonce = isset($_POST['single_youtube_nonce']) ? $_POST['single_youtube_nonce'] : null;
	if(!wp_verify_nonce($single_youtube_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	if(!current_user_can('edit_post', $post_id)) { return $post_id; }

    $fields = array(
        'diver_featured_youtube_url',
        'diver_featured_youtube_inline',
        'diver_featured_youtube_controls'
    );

    foreach ($fields as $key) {
        $data = isset($_POST[$key]) ? $_POST[$key]: null;
        $_data = get_post_meta($post_id,$key,true);

        if($data){
          update_post_meta($post_id,$key,$data);
        }else{
          delete_post_meta($post_id,$key,$_data);
        }
    }
}