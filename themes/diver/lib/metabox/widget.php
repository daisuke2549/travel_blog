<?php
add_action('admin_menu', 'single_widget_box');
add_action('save_post', 'save_single_widget_data');

function single_widget_box() {
	add_meta_box( 'single_widget_field','サイドバーウィジェット', 'single_widget_field', 'post', 'normal','low');
	add_meta_box( 'single_widget_field','サイドバーウィジェット', 'single_widget_field', 'page', 'normal','low');
}


//投稿ページに表示されるカスタムフィールド
function single_widget_field($post){
	global $post_ID;
    wp_nonce_field(wp_create_nonce(__FILE__), 'widget_field_nonce');

		echo '<label>ウィジェットポジション</label><br>';
        $single_widget_position = (get_post_meta($post_ID,'single_widget_position',true))?get_post_meta($post_ID,'single_widget_position',true):'top';
        $data = array(
        	array("最上部","top",""),
        	array("最下部","bottom",""),
		 );
         foreach($data as $d){
		if($d[1]==$single_widget_position) $d[2] ="checked";
		echo <<<EOS
		<label><input type="radio" name="single_widget_position" value="{$d[1]}" {$d[2]}>{$d[0]}</label>
EOS;
}
		echo '<br><br>';


		echo '<label>ウィジェットタイプ</label><br>';
        $single_widget_type = (get_post_meta($post_ID,'single_widget_type',true))?get_post_meta($post_ID,'single_widget_type',true):'normal';
        $data = array(
        	array("通常","normal",""),
        	array("固定","fixed",""),
		 );
         foreach($data as $d){
		if($d[1]==$single_widget_type) $d[2] ="checked";
		echo <<<EOS
		<label><input type="radio" name="single_widget_type" value="{$d[1]}" {$d[2]}>{$d[0]}</label>
EOS;
		}
		echo '<br><br>';
	?>

		<label>タイトル(未記入で非表示)<br>
	    <input type="text" name="single_widget_title" style="width:100%" value="<?php echo get_post_meta($post_ID, 'single_widget_title', true); ?>"/>
	    </label><br><br>
<?php
	    $content = (get_post_meta($post_ID, 'single_widget_content', true))?get_post_meta($post_ID, 'single_widget_content', true):'';
	    $args = array(
		'wpautop'			=> false,
		'media_buttons'		=> true,
		'textarea_rows'		=> 12,
		'editor_css'		=> '',
		'indent'			=> true,
		'teeny'				=> false,
		'dfw'				=> false,
		'quicktags'			=> true,
		'drag_drop_upload'	=> true
	);
	wp_editor($content, 'single_widget_content', $args);

}


function save_single_widget_data($post_id){
     $widget_field_nonce = isset($_POST['widget_field_nonce']) ? $_POST['widget_field_nonce'] : null;
     if(!wp_verify_nonce($widget_field_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
     if(!current_user_can('edit_post', $post_id)) { return $post_id; }
    
	$single_widget_position = isset($_POST['single_widget_position']) ? $_POST['single_widget_position']: null;
	$single_widget_position_ex = get_post_meta($post_id, 'single_widget_position', true);

	if($single_widget_position){
	  update_post_meta($post_id, 'single_widget_position',$single_widget_position);
	}else{
	  delete_post_meta($post_id, 'single_widget_position',$single_widget_position_ex);
	}

	$single_widget_type = isset($_POST['single_widget_type']) ? $_POST['single_widget_type']: null;
	$single_widget_type_ex = get_post_meta($post_id, 'single_widget_type', true);

	if($single_widget_type){
	  update_post_meta($post_id, 'single_widget_type',$single_widget_type);
	}else{
	  delete_post_meta($post_id, 'single_widget_type',$single_widget_type_ex);
	}

	$single_widget_title = isset($_POST['single_widget_title']) ? $_POST['single_widget_title']: null;
	$single_widget_title_ex = get_post_meta($post_id, 'single_widget_title', true);

	if($single_widget_title){
	  update_post_meta($post_id, 'single_widget_title',$single_widget_title);
	}else{
	  delete_post_meta($post_id, 'single_widget_title',$single_widget_title_ex);
	}

	$single_widget_content = isset($_POST['single_widget_content']) ? $_POST['single_widget_content']: null;
	$single_widget_content_ex = get_post_meta($post_id, 'single_widget_content', true);

	if($single_widget_content){
	  update_post_meta($post_id, 'single_widget_content',$single_widget_content);
	}else{
	  delete_post_meta($post_id, 'single_widget_content',$single_widget_content_ex);
	}
}
?>