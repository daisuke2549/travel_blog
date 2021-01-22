<?php
add_action('add_meta_boxes', 'add_cssbox');
add_action('save_post', 'save_cssdata');

//投稿ページに表示される"入力欄その１"の設定
function add_cssbox() {
	add_meta_box( 'css_custom','カスタムCSS', 'css_custom', 'lp', 'normal' );
	add_meta_box( 'css_custom','カスタムCSS', 'css_custom', 'cta', 'normal' );
	add_meta_box( 'css_custom','カスタムCSS', 'css_custom', 'post', 'normal' );
	add_meta_box( 'css_custom','カスタムCSS', 'css_custom', 'page', 'normal' );
}
//投稿ページに表示されるカスタムフィールド
function css_custom(){
	 global $post_ID;
	wp_nonce_field(wp_create_nonce(__FILE__), 'css_custom_nonce');
	?>
	<style>
	#css_custom.postbox .inside{
		padding: 0;
	    margin: 0;
	}
	</style>
    <textarea id="css-editor" name="custom_css" rows="20" style="width:100%"><?php echo get_post_meta($post_ID,'custom_css',true); ?></textarea>
    <?php
	}

function save_cssdata($post_id){
	 $css_custom_nonce = isset($_POST['css_custom_nonce']) ? $_POST['css_custom_nonce'] : null;
	 if(!wp_verify_nonce($css_custom_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }
    
	$customcss = isset($_POST['custom_css']) ? $_POST['custom_css']: null;
	$customcss_ex = get_post_meta($post_id, 'custom_css', true);
	if($customcss){
	  update_post_meta($post_id, 'custom_css',$customcss);
	}else{
	  delete_post_meta($post_id, 'custom_css',$customcss_ex);
	}
}
?>