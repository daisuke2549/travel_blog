<?php
add_action('admin_menu', 'add_auth_before_content');
add_action('save_post', 'save_add_auth_before_content');

function add_auth_before_content() {
	global $postID;
	echo $postID;
	add_meta_box( 'add_metabox','パスワード前コンテンツ', 'auth_before_content_c', 'post', 'normal' ,'high');
	add_meta_box( 'add_metabox','パスワード前コンテンツ', 'auth_before_content_c', 'page', 'normal' ,'high');
}

function auth_before_content_c()
{
	global $post;
	wp_nonce_field(wp_create_nonce(__FILE__), 'auth_nonce');
	$id = get_the_ID();
	if($post->post_password){
	    $content = '';
		$post_meta = get_post_meta($id, 'auth_before_content', true);
		if ($post_meta) {
	        $content = $post_meta;
		}
	    $args = array(
			'wpautop'			=> false,
			'media_buttons'		=> true,
			'textarea_rows'		=> 10,
			'editor_css'		=> '',
			'indent'			=> true,
			'teeny'				=> false,
			'dfw'				=> false,
			'quicktags'			=> true,
			'drag_drop_upload'	=> true
		);
		wp_editor($content, 'auth_before_content', $args);

		
		$title = (get_post_meta(get_the_ID(), 'auth_before_content_title', true))?get_post_meta(get_the_ID(), 'auth_before_content_title', true):apply_filters('auth_before_content_title','続きを見るには、パスワードを入力してください。');
		$text = (get_post_meta(get_the_ID(), 'auth_before_content_text', true))?get_post_meta(get_the_ID(), 'auth_before_content_text', true):apply_filters('auth_before_content_text','当ブログの会員になるか、もしくは管理者にパスワードを教えてもらい、パスワードを入力することで閲覧可能になります。');

		?>

	    <p><label>パスワードフォームタイトル<br />
		<input type="text" name="auth_before_content_title" class="auth_before_content_title" value="<?php echo $title ?>" style="width:100%"></label></p>

		<p><label>パスワードフォームテキスト<br />
	    <textarea name="auth_before_content_text" rows="3" style="width:100%"><?php echo $text; ?></textarea>
	    </label></p> 

		<?php 
	}else{
		echo '<div style="padding:20px;margin:;">投稿にパスワードを設定すると、パスワード前コンテンツのエディターが表示追加されます。</div>';

	}
}

function save_add_auth_before_content($post_id){
	 $auth_nonce = isset($_POST['auth_nonce']) ? $_POST['auth_nonce'] : null;
	 if(!wp_verify_nonce($auth_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }
    
	$authcontent = isset($_POST['auth_before_content']) ? $_POST['auth_before_content']: null;
	$authcontent_ex = get_post_meta($post_id, 'auth_before_content', true);
	if($authcontent){
	  update_post_meta($post_id, 'auth_before_content',$authcontent);
	}else{
	  delete_post_meta($post_id, 'auth_before_content',$authcontent_ex);
	}

	$authcontenttitle = isset($_POST['auth_before_content_title']) ? $_POST['auth_before_content_title']: null;
	$authcontenttitle_ex = get_post_meta($post_id, 'auth_before_content_title', true);

	if($authcontenttitle){
	  update_post_meta($post_id, 'auth_before_content_title',$authcontenttitle);
	}else{
	  delete_post_meta($post_id, 'auth_before_content_title',$authcontenttitle_ex);
	}

	$authcontenttext = isset($_POST['auth_before_content_text']) ? $_POST['auth_before_content_text']: null;
	$authcontenttext_ex = get_post_meta($post_id, 'auth_before_content_text', true);

	if($authcontenttext){
	  update_post_meta($post_id, 'auth_before_content_text',$authcontenttext);
	}else{
	  delete_post_meta($post_id, 'auth_before_content_text',$authcontenttext_ex);
	}
}
?>