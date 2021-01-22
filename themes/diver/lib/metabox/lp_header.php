<?php
add_action('admin_menu', 'add_lpheaderbox');
add_action('save_post', 'save_lpheader_btndata');

function add_lpheaderbox() {
	add_meta_box( 'lp_header','LPファーストビュー', 'lp_header', 'LP', 'side' );
}

function lp_header(){
	 global $post_ID; 
    wp_nonce_field(wp_create_nonce(__FILE__), 'lp_header_nonce');
     ?>

	<div class="lpfirstview-uploader">
	<?php $url = get_post_meta($post_ID, 'lpfirstview-uploader_img', true) ?>
		<label>画像:PC</label>
        <div id="preview_lpfirstview">
        	<?php if($url): ?>
        		<img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
        	<?php endif; ?>
        </div>
        <input type="text" id="src_lpfirstview" name="lpfirstview-uploader_img" value="<?php echo $url; ?>" />
        <input class="button" type="button" name="mediauploadbtn" id="lpfirstview" value="画像を選択" />
        <input class="button" type="button" name="media-clear" id="lpfirstview" value="クリア" /><br><br>
    </div>

    <div class="lpfirstviewsp-uploader">
	<?php $url = get_post_meta($post_ID, 'lpfirstviewsp-uploader_img', true) ?>
		<label>画像:SP</label>
        <div id="preview_lpfirstviewsp">
        	<?php if($url): ?>
        		<img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
        	<?php endif; ?>
        </div>
        <input type="text" id="src_lpfirstviewsp" name="lpfirstviewsp-uploader_img" value="<?php echo $url; ?>" />
        <input class="button" type="button" name="mediauploadbtn" id="lpfirstviewsp" value="画像を選択" />
        <input class="button" type="button" name="media-clear" id="lpfirstviewsp" value="クリア" /><br><br>
    </div> 

    <label>リンク先<input type="text" style="width: 100%;" id="src_lpfirstview_url" name="src_lpfirstview_url" value="<?php echo get_post_meta($post_ID, 'src_lpfirstview_url', true); ?>" /></label>
    <label>
    <input type="checkbox" name="src_lpfirstview_url_target" value="1" <?php checked(get_post_meta(get_the_ID(), 'src_lpfirstview_url_target', true), 1 ); ?>>別タブで開く　</label>
    <label>
    <input type="checkbox" name="src_lpfirstview_url_follow" value="1" <?php checked(get_post_meta(get_the_ID(), 'src_lpfirstview_url_follow', true), 1 ); ?>>nofollow</label></p>

<?php
}

function save_lpheader_btndata($post_id){
     $lp_header_nonce = isset($_POST['lp_header_nonce']) ? $_POST['lp_header_nonce'] : null;
     if(!wp_verify_nonce($lp_header_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
     if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$firstviewpc = isset($_POST['lpfirstview-uploader_img']) ? $_POST['lpfirstview-uploader_img']: null;
    $firstviewpc_ex = get_post_meta($post_id, 'lpfirstview-uploader_img', true);

    if ($firstviewpc) {
    	update_post_meta($post_id, 'lpfirstview-uploader_img', $firstviewpc);
    }else{
		delete_post_meta($post_id, 'lpfirstview-uploader_img',$firstviewpc_ex);
	}

	$firstviewsp = isset($_POST['lpfirstviewsp-uploader_img']) ? $_POST['lpfirstviewsp-uploader_img']: null;
    $firstviewsp_ex = get_post_meta($post_id, 'lpfirstviewsp-uploader_img', true);

	if ($firstviewsp) {
    	update_post_meta($post_id, 'lpfirstviewsp-uploader_img', $firstviewsp);
    }else{
		delete_post_meta($post_id, 'lpfirstviewsp-uploader_img',$firstviewsp_ex);
	}

    $firstviewlink = isset($_POST['src_lpfirstview_url']) ? $_POST['src_lpfirstview_url']: null;
    $firstviewlink_ex = get_post_meta($post_id, 'src_lpfirstview_url', true);

    if ($firstviewlink) {
        update_post_meta($post_id, 'src_lpfirstview_url', $firstviewlink);
    }else{
        delete_post_meta($post_id, 'src_lpfirstview_url',$firstviewlink_ex);
    }

    $target = isset($_POST['src_lpfirstview_url_target']) ? $_POST['src_lpfirstview_url_target']: null;
    $target_ex = get_post_meta($post_id,'src_lpfirstview_url_target',true);

    if ($target) {
        update_post_meta($post_id, 'src_lpfirstview_url_target', $target);
    }else{
        delete_post_meta($post_id, 'src_lpfirstview_url_target',$target_ex);
    }

    $follow = isset($_POST['src_lpfirstview_url_follow']) ? $_POST['src_lpfirstview_url_follow']: null;
    $follow_ex = get_post_meta($post_id,'src_lpfirstview_url_follow',true);

    if ($follow) {
        update_post_meta($post_id, 'src_lpfirstview_url_follow', $follow);
    }else{
        delete_post_meta($post_id, 'src_lpfirstview_url_follow',$follow_ex);
    }

}
?>