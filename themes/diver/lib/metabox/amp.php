<?php
add_action('post_submitbox_misc_actions','amp_field');
add_action('save_post', 'save_amp_data');

//投稿ページに表示されるカスタムフィールド
function amp_field($post){
	global $post_ID;
	wp_nonce_field(wp_create_nonce(__FILE__), 'amp_nonce');

	$screen = get_current_screen();
	if ( 'post' != $screen->post_type ) return;

	$amp_checked = get_post_meta($post_ID, 'amp_name', true); ?>
	<div class="misc-pub-section misc-pub-amp"><label>
	AMPの有効化 <input type="checkbox" name="amp_name" <?php echo (($amp_checked) ? 'checked="checked"': '');?> /></label>
	</div>
	<style>
	.misc-pub-amp:before{
		font: 400 20px/1 dashicons;
	    speak: none;
	    display: inline-block;
	    margin-left: -1px;
	    padding-right: 3px;
	    vertical-align: top;
	    -webkit-font-smoothing: antialiased;
	    content:"\f111";
	    color: #82878c;
	}
	</style>
	<?php
}

function save_amp_data($post_id){
	 $amp_nonce = isset($_POST['amp_nonce']) ? $_POST['amp_nonce'] : null;
	 if(!wp_verify_nonce($amp_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$ampname = isset($_POST['amp_name']) ? $_POST['amp_name']: null;
	$ampname_ex = get_post_meta($post_id, 'amp_name', true);

    if ($ampname) {
    	update_post_meta($post_id, 'amp_name', $ampname);
    }else{
		delete_post_meta($post_id, 'amp_name',$ampname_ex);
	}
}
?>