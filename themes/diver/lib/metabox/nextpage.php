<?php
add_action('post_submitbox_misc_actions','nextpage_field');
add_action('save_post', 'save_nextpage_data');

//投稿ページに表示されるカスタムフィールド
function nextpage_field($post){
	global $post_ID;
    wp_nonce_field(wp_create_nonce(__FILE__), 'nextpage_field_nonce');

	$screen = get_current_screen();
	if ( 'post' != $screen->post_type ) return;

	$meta_nextpage_pc = get_post_meta($post_ID, 'meta_nextpage_pc', true);
	$meta_nextpage_sp = get_post_meta($post_ID, 'meta_nextpage_sp', true);

	 ?>
	<div class="misc-pub-section misc-pub-nextpage">
	改ページの無効化　PC<input type="checkbox" name="meta_nextpage_pc" <?php echo (($meta_nextpage_pc) ? 'checked="checked"': '');?> /> SP<input type="checkbox" name="meta_nextpage_sp" <?php echo (($meta_nextpage_sp) ? 'checked="checked"': '');?> />
	</div>
	<style>
	.misc-pub-nextpage:before{
		font: 400 20px/1 dashicons;
	    speak: none;
	    display: inline-block;
	    margin-left: -1px;
	    padding-right: 3px;
	    vertical-align: top;
	    -webkit-font-smoothing: antialiased;
	    content:"\f105";
	    color: #82878c;
	}
	</style>
	<?php
}

function save_nextpage_data($post_id){
     $nextpage_field_nonce = isset($_POST['nextpage_field_nonce']) ? $_POST['nextpage_field_nonce'] : null;
     if(!wp_verify_nonce($nextpage_field_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
     if(!current_user_can('edit_post', $post_id)) { return $post_id; }
    
	$meta_nextpage_pc = isset($_POST['meta_nextpage_pc']) ? $_POST['meta_nextpage_pc']: null;
	$meta_nextpage_pc_ex = get_post_meta($post_id, 'meta_nextpage_pc', true);

    if ($meta_nextpage_pc) {
    	update_post_meta($post_id, 'meta_nextpage_pc', $meta_nextpage_pc);
    }else{
		delete_post_meta($post_id, 'meta_nextpage_pc',$meta_nextpage_pc_ex);
	}

	$meta_nextpage_sp = isset($_POST['meta_nextpage_sp']) ? $_POST['meta_nextpage_sp']: null;
	$meta_nextpage_sp_ex = get_post_meta($post_id, 'meta_nextpage_sp', true);

    if ($meta_nextpage_sp) {
    	update_post_meta($post_id, 'meta_nextpage_sp', $meta_nextpage_sp);
    }else{
		delete_post_meta($post_id, 'meta_nextpage_sp',$meta_nextpage_sp_ex);
	}
}
?>