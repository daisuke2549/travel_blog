<?php
add_action('admin_menu', 'add_head_innner_box');
add_action('save_post', 'save_head_innner_btndata');

function add_head_innner_box() {
	add_meta_box( 'lp_head_innner','&lt;head&gt;内出力', 'lp_head_innner', 'LP', 'normal' );
}
function lp_head_innner(){
     global $post_ID;
    wp_nonce_field(wp_create_nonce(__FILE__), 'lp_head_nonce');
?>
<textarea name="head_innner_content" rows="10" style="width:100%"><?php echo get_post_meta($post_ID,'head_innner_content',true); ?></textarea>
<?php
}

function save_head_innner_btndata($post_id){
     $lp_head_nonce = isset($_POST['lp_head_nonce']) ? $_POST['lp_head_nonce'] : null;
     if(!wp_verify_nonce($lp_head_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
     if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$head_innner_content = isset($_POST['head_innner_content']) ? $_POST['head_innner_content']: null;
    $head_innner_content_ex = get_post_meta($post_id, 'head_innner_content', true);

    if ($head_innner_content) {
    	update_post_meta($post_id, 'head_innner_content', $head_innner_content);
    }else{
		delete_post_meta($post_id, 'head_innner_content',$head_innner_content_ex);
	}

}
?>