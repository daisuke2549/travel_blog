<?php
add_action('admin_menu', 'add_catpage_post');
add_action('save_post', 'save_catpage_post');

//投稿ページに表示される"入力欄その１"の設定
function add_catpage_post() {
	add_meta_box( 'catpage_post','カテゴリー', 'catpage_post', 'cat-page', 'side' );
}
//投稿ページに表示されるカスタムフィールド
function catpage_post(){
       global $post_ID;
       	wp_nonce_field(wp_create_nonce(__FILE__), 'catpage_nonce');
?>
<label>設定するカテゴリーを選択してください。</label>
<?php

	$args = array(
		'orderby' => 'order',
		'order' => 'ASC',
		'hide_empty' => false,
		'get' => 'all'
				);

$defaults = array(
		'child_of'            => 0,
		'current_category'    => 0,
		'depth'               => 0,
		'echo'                => 1,
		'exclude'             => '',
		'exclude_tree'        => '',
		'feed'                => '',
		'feed_image'          => '',
		'feed_type'           => '',
		'hide_empty'          => 1,
		'hide_title_if_empty' => false,
		'hierarchical'        => true,
		'order'               => 'ASC',
		'orderby'             => 'name',
		'separator'           => '<br />',
		'show_count'          => 0,
		'show_option_all'     => '',
		'show_option_none'    => __( 'No categories' ),
		'style'               => 'list',
		'taxonomy'            => 'category',
		'title_li'            => __( 'Categories' ),
		'use_desc_for_title'  => 1,
	);

	$r = wp_parse_args( $args, $defaults );

	if ( !isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] )
		$r['pad_counts'] = true;

	if ( true == $r['hierarchical'] ) {
		$exclude_tree = array();

		if ( $r['exclude_tree'] ) {
			$exclude_tree = array_merge( $exclude_tree, wp_parse_id_list( $r['exclude_tree'] ) );
		}

		if ( $r['exclude'] ) {
			$exclude_tree = array_merge( $exclude_tree, wp_parse_id_list( $r['exclude'] ) );
		}

		$r['exclude_tree'] = $exclude_tree;
		$r['exclude'] = '';
	}

	if ( ! isset( $r['class'] ) )
		$r['class'] = ( 'category' == $r['taxonomy'] ) ? 'categories' : $r['taxonomy'];

	if ( ! taxonomy_exists( $r['taxonomy'] ) ) {
		return false;
	}

	$show_option_all = $r['show_option_all'];
	$show_option_none = $r['show_option_none'];

		$cat_all = get_categories($r);
		$catpage_post_slug = get_post_meta($post_ID, 'catpage_post_slug', true);

		echo '<select name="catpage_post_slug" style="width:100%">';
		echo '<option value="none">未設定</option>';
		foreach($cat_all as $value):
		$select = ($catpage_post_slug==$value->slug)?'selected':'';
		echo '<option value="'.$value->slug.'" '.$select.'>'.$value->name.'</option>';
		endforeach;
		echo '</select>';?>

	<p><label>説明文<br />
    <textarea name="cat_description" rows="8" style="width:100%"><?php echo esc_html(get_post_meta($post_ID, 'cat_description', true)); ?></textarea>
    </label></p> 
<?php	}

function save_catpage_post($post_id){
	 $catpage_nonce = isset($_POST['catpage_nonce']) ? $_POST['catpage_nonce'] : null;
	 if(!wp_verify_nonce($catpage_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$cat_slug = isset($_POST['catpage_post_slug']) ? $_POST['catpage_post_slug']: null;
	$cat_slug_ex = get_post_meta($post_id, 'catpage_post_slug', true);

    if ($cat_slug) {
    	update_post_meta($post_id, 'catpage_post_slug', $cat_slug);
    }else{
		delete_post_meta($post_id, 'catpage_post_slug',$cat_slug_ex);
	}

	$cat_description = isset($_POST['cat_description']) ? $_POST['cat_description']: null;
	$cat_description_ex = get_post_meta($post_id, 'cat_description', true);

	if ($cat_description) {
    	update_post_meta($post_id, 'cat_description', $cat_description);
    }else{
		delete_post_meta($post_id, 'cat_description',$cat_description_ex);
	}
}


/***********************************************************

	タイトル設定

***********************************************************/

add_action('admin_menu', 'add_catpagetitle_post');
add_action('save_post', 'save_catpage_title');

//投稿ページに表示される"入力欄その１"の設定
function add_catpagetitle_post() {
	add_meta_box( 'catpage_title','タイトル設定', 'catpage_title', 'cat-page', 'side' );
}
//投稿ページに表示されるカスタムフィールド
function catpage_title(){
       global $post_ID;
       	wp_nonce_field(wp_create_nonce(__FILE__), 'catpage_title_nonce');

       	$catpagetitlecolor = (get_post_meta($post_ID, 'catpagetitlecolor', true))?get_post_meta($post_ID, 'catpagetitlecolor', true):'#fff';
       	$catpagetitlebg = (get_post_meta($post_ID, 'catpagetitlebg', true))?get_post_meta($post_ID, 'catpagetitlebg', true):'#5f69a9';
?>
	<div class="catpageimg-uploader">
	<?php $url = get_post_meta($post_ID, 'catpageimg-uploader_img', true) ?>
		<label>タイトル背景画像</label>
        <div id="preview_catpageimg">
        	<?php if($url): ?>
        		<img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
        	<?php endif; ?>
        </div>
        <input type="text" id="src_catpageimg" name="catpageimg-uploader_img" value="<?php echo $url; ?>" />
        <input class="button" type="button" name="mediauploadbtn" id="catpageimg" value="画像を選択" />
        <input class="button" type="button" name="media-clear" id="catpageimg" value="クリア" /><br><br>
    </div>

	<p>タイトル背景色<label><br />
    <input type="text" name="catpagetitlebg" class="myColorPicker" value="<?php echo esc_html($catpagetitlebg); ?>"></label></p>

    <p>タイトル文字色<label><br />
    <input type="text" name="catpagetitlecolor" class="myColorPicker" value="<?php echo esc_html($catpagetitlecolor); ?>"></label></p>

    <?php
	}

function save_catpage_title($post_id){
	 $catpage_title_nonce = isset($_POST['catpage_title_nonce']) ? $_POST['catpage_title_nonce'] : null;
	 if(!wp_verify_nonce($catpage_title_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }
    
	$catpageimg = isset($_POST['catpageimg-uploader_img']) ? $_POST['catpageimg-uploader_img']: null;
	$catpageimg_ex = get_post_meta($post_id, 'catpageimg-uploader_img', true);

	if($catpageimg){
	  update_post_meta($post_id, 'catpageimg-uploader_img',$catpageimg);
	}else{
	  delete_post_meta($post_id, 'catpageimg-uploader_img',$catpageimg_ex);
	}

	$catpagetitlecolor = isset($_POST['catpagetitlecolor']) ? $_POST['catpagetitlecolor']: null;
	$catpagetitlecolor_ex = get_post_meta($post_id, 'catpagetitlecolor', true);

	if($catpagetitlecolor){
	  update_post_meta($post_id, 'catpagetitlecolor',$catpagetitlecolor);
	}else{
	  delete_post_meta($post_id, 'catpagetitlecolor',$catpagetitlecolor_ex);
	}

	$catpagetitlebg = isset($_POST['catpagetitlebg']) ? $_POST['catpagetitlebg']: null;
	$catpagetitlebg_ex = get_post_meta($post_id, 'catpagetitlebg', true);

	if($catpagetitlebg){
	  update_post_meta($post_id, 'catpagetitlebg',$catpagetitlebg);
	}else{
	  delete_post_meta($post_id, 'catpagetitlebg',$catpagetitlebg_ex);
	}

}
?>