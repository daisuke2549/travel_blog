<?php
add_action('add_meta_boxes', 'add_single_seobox');
add_action('save_post', 'save_add_single_seodata');

function add_single_seobox() {
	add_meta_box( 'single_seobox','SEO設定', 'single_seobox', 'post', 'side' );
	add_meta_box( 'single_seobox','SEO設定', 'single_seobox', 'page', 'side' );
	add_meta_box( 'single_seobox','SEO設定', 'single_seobox', 'cat-page', 'side' );
	add_meta_box( 'single_seobox','SEO設定', 'single_seobox', 'lp', 'side' );
}

function single_seobox(){ 
	global $post;
    wp_nonce_field(wp_create_nonce(__FILE__), 'single_seobox_nonce');

	$diver_seosetting = get_option('diver_seosetting',1);
	if($diver_seosetting):
		$placeholder = get_diver_excerpt($post->ID,100,false);
		$desc_val = get_post_meta(get_the_ID(),'diver_single_metadescription',true);
		?>

	    <p><label>メタディスクリプション <span style="font-size:.8em;color:#999;">※全角80文字以内推奨 - 最大120文字</span><br />
	    <textarea name="diver_single_metadescription" rows="5" style="width:100%" placeholder="<?php echo $placeholder ?>"><?php echo $desc_val; ?></textarea>
	    </label></p> 

	    <p>メタロボット<br />
	    <p><label><input type="checkbox" name="diver_single_noindex" value="1" <?php checked( get_post_meta(get_the_ID(), 'diver_single_noindex', true), 1 ); ?> /> noindex</label></p>
		<p><label><input type="checkbox" name="diver_single_nofollow" value="1" <?php checked( get_post_meta(get_the_ID(), 'diver_single_nofollow', true), 1 ); ?> /> nofollow</label></p>
		<p><label>canonical URL <br />
		<input type="text" style="width: 100%;" name="diver_single_canonical" value="<?php echo get_post_meta(get_the_ID(), 'diver_single_canonical', true); ?>">
	    </label></p> 
	<?php else: ?>
		<div style="padding:1em;">SEO設定は無効です。Diverオプションから有効にしてください。</div>
	<?php endif;
}

function save_add_single_seodata($post_id){
     $single_seobox_nonce = isset($_POST['single_seobox_nonce']) ? $_POST['single_seobox_nonce'] : null;
     if(!wp_verify_nonce($single_seobox_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
     if(!current_user_can('edit_post', $post_id)) { return $post_id; }
    
		$desc = get_post_meta($post_id,'diver_single_metadescription',true);

		$upload_desc = isset($_POST['diver_single_metadescription']) ? $_POST['diver_single_metadescription']: null;
	    if ($upload_desc) {
	    	update_post_meta($post_id, 'diver_single_metadescription', $upload_desc);
	    }else{
			delete_post_meta($post_id, 'diver_single_metadescription',$desc);
		}

		$noindex = get_post_meta($post_id,'diver_single_noindex',true);
		$nofollow = get_post_meta($post_id,'diver_single_nofollow',true);

		$upload_noindex = isset($_POST['diver_single_noindex']) ? $_POST['diver_single_noindex']: null;
	    if ($upload_noindex) {
	    	update_post_meta($post_id, 'diver_single_noindex', $upload_noindex);
	    }else{
			delete_post_meta($post_id, 'diver_single_noindex',$noindex);
		}

		$upload_nofollow = isset($_POST['diver_single_nofollow']) ? $_POST['diver_single_nofollow']: null;
	    if ($upload_nofollow) {
	    	update_post_meta($post_id, 'diver_single_nofollow', $upload_nofollow);
	    }else{
			delete_post_meta($post_id, 'diver_single_nofollow',$nofollow);
		}

		$canonical = get_post_meta($post_id,'diver_single_canonical',true);
		$canonicalex = isset($_POST['diver_single_canonical']) ? $_POST['diver_single_canonical']: null;
	    if ($canonicalex) {
	    	update_post_meta($post_id, 'diver_single_canonical', $canonicalex);
	    }else{
			delete_post_meta($post_id, 'diver_single_canonical',$canonical);
		}

}
?>