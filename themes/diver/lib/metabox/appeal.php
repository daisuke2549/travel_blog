<?php
add_action('add_meta_boxes', 'add_appealbtnbox');
add_action('save_post', 'save_appeal_btndata');

function add_appealbtnbox() {
	add_meta_box( 'appeal_box','アピールブロック', 'appeal_box', 'post', 'normal' );
}

function appeal_box(){
	 global $post_ID; 
	wp_nonce_field(wp_create_nonce(__FILE__), 'appeal_nonce');
	 ?>
	<div style="width:65%;float: left;">
	<p><label>タイトル<br />
    <input type="text" name="appeal_title" style="width:100%" value="<?php echo get_post_meta($post_ID, 'appeal_title', true); ?>"/>
    </label></p>

	<div class="appealimg-uploader">
	<?php $url = get_post_meta($post_ID, 'appealimg-uploader_img', true) ?>
		<label>画像</label>
        <div id="preview_appealimg">
        	<?php if($url): ?>
        		<img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
        	<?php endif; ?>
        </div>
        <input type="text" id="src_appealimg" name="appealimg-uploader_img" value="<?php echo $url; ?>" />
        <input class="button" type="button" name="mediauploadbtn" id="appealimg" value="画像を選択" />
        <input class="button" type="button" name="media-clear" id="appealimg" value="クリア" /><br><br>
    </div>

	<p><label>説明文<br />
    <textarea name="appeal_description" rows="5" style="width:100%"><?php echo esc_html(get_post_meta($post_ID, 'appeal_description', true)); ?></textarea>
    </label></p> 

    <p><label>ボタンのテキスト(空欄のまま保存するとボタンが非表示になります。)<br />
    <input type="text" name="appeal_btntext" style="width:100%" value="<?php echo esc_html(get_post_meta($post_ID, 'appeal_btntext', true)); ?>"/>
    </label></p> 

    <p><label>ボタンのリンク先<br />
    <input type="text" name="appeal_link" style="width:100%" value="<?php echo esc_html(get_post_meta($post_ID,'appeal_link',true)); ?>"/>
    </label></p> 
    <style>.appealimg-uploader-preview img {max-width: 100%;}</style>
    </div>

    <?php 
		$appealtitlebg = (get_post_meta($post_ID, 'appeal_titlebg', true))?get_post_meta($post_ID, 'appeal_titlebg', true):'#fff';
		$appealtitlecolor = (get_post_meta($post_ID, 'appeal_titlecolor', true))?get_post_meta($post_ID, 'appeal_titlecolor', true):'#333';
		$appealbg = (get_post_meta($post_ID, 'appeal_bg', true))?get_post_meta($post_ID, 'appeal_bg', true):'#fff';
		$appealcolor = (get_post_meta($post_ID, 'appeal_color', true))?get_post_meta($post_ID, 'appeal_color', true):'#333';
		$appealbtnbg = (get_post_meta($post_ID, 'appeal_btnbg', true))?get_post_meta($post_ID, 'appeal_btnbg', true):'#f44336';
		$appealbtncolor = (get_post_meta($post_ID, 'appeal_btncolor', true))?get_post_meta($post_ID, 'appeal_btncolor', true):'#fff';
    ?>

    <div style="width: 32%;float: right;">
    <p>タイトル背景色<label>
    <input type="text" name="appeal_titlebg" class="myColorPicker" value="<?php echo esc_html($appealtitlebg); ?>"></label></p>

    <p>タイトルテキスト色<label>
    <input type="text" name="appeal_titlecolor" class="myColorPicker" value="<?php echo esc_html($appealtitlecolor); ?>"></label></p>

    <p>背景色<label>
    <input type="text" name="appeal_bg" class="myColorPicker" value="<?php echo esc_html($appealbg); ?>"></label></p>

    <p>テキスト色<label>
    <input type="text" name="appeal_color" class="myColorPicker" value="<?php echo esc_html($appealcolor); ?>"></label></p>

    <p>ボタン背景色<label>
    <input type="text" name="appeal_btnbg" class="myColorPicker" value="<?php echo esc_html($appealbtnbg); ?>"></label></p>

    <p>ボタンテキスト色<label>
    <input type="text" name="appeal_btncolor" class="myColorPicker" value="<?php echo esc_html($appealbtncolor); ?>"></label></p>
    </div>
    <div style="clear: both;"></div>
<?php
}

function save_appeal_btndata($post_id){
	 $appeal_nonce = isset($_POST['appeal_nonce']) ? $_POST['appeal_nonce'] : null;
	 if(!wp_verify_nonce($appeal_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }
    
	$appealtitle = get_post_meta($post_id, 'appeal_title', true);
	$appealdescription = get_post_meta($post_id, 'appeal_description', true);
	$appealbtntext = get_post_meta($post_id, 'appeal_btntext', true);
	$appeallink = get_post_meta($post_id, 'appeal_link', true);
	$url = get_post_meta($post_id, 'appealimg-uploader_img', true);

	$appealtitlebg = get_post_meta($post_id, 'appeal_titlebg', true);
	$appealtitlecolor = get_post_meta($post_id, 'appeal_titlecolor', true);
	$appealbg = get_post_meta($post_id, 'appeal_bg', true);
	$appealcolor = get_post_meta($post_id, 'appeal_color', true);
	$appealbtnbg = get_post_meta($post_id, 'appeal_btnbg', true);
	$appealbtncolor = get_post_meta($post_id, 'appeal_btncolor', true);

    $uploader_img=isset($_POST['appealimg-uploader_img']) ? $_POST['appealimg-uploader_img']: null;
    if ($uploader_img) {
    	update_post_meta($post_id, 'appealimg-uploader_img', $uploader_img);
    }else{
		delete_post_meta($post_id, 'appealimg-uploader_img',$url);
	}
    $appeal_title=isset($_POST['appeal_title']) ? $_POST['appeal_title']: null;
	if($appeal_title){
	  update_post_meta($post_id, 'appeal_title',$appeal_title);
	}else{
	  delete_post_meta($post_id, 'appeal_title',$appealtitle);
	}

    $appeal_description=isset($_POST['appeal_description']) ? $_POST['appeal_description']: null;
	if($appeal_description){
	  update_post_meta($post_id, 'appeal_description',$appeal_description);
	}else{
	  delete_post_meta($post_id, 'appeal_description',$appealdescription);
	}

    $appeal_btntext=isset($_POST['appeal_btntext']) ? $_POST['appeal_btntext']: null;
	if($appeal_btntext){
	  update_post_meta($post_id, 'appeal_btntext',$appeal_btntext);
	}else{
	  delete_post_meta($post_id, 'appeal_btntext',$appealbtntext);
	}

    $appeal_link=isset($_POST['appeal_link']) ? $_POST['appeal_link']: null;
	if($appeal_link){
	  update_post_meta($post_id, 'appeal_link',$appeal_link);
	}else{
	  delete_post_meta($post_id, 'appeal_link',$appeallink);
	}

    $appeal_titlebg=isset($_POST['appeal_titlebg']) ? $_POST['appeal_titlebg']: null;
	if($appeal_titlebg){
	  update_post_meta($post_id, 'appeal_titlebg',$appeal_titlebg);
	}else{
	  delete_post_meta($post_id, 'appeal_titlebg',$appealtitlebg);
	}

    $appeal_titlecolor=isset($_POST['appeal_titlecolor']) ? $_POST['appeal_titlecolor']: null;
	if($appeal_titlecolor){
	  update_post_meta($post_id, 'appeal_titlecolor',$appeal_titlecolor);
	}else{
	  delete_post_meta($post_id, 'appeal_titlecolor',$appealtitlecolor);
	}

    $appeal_bg=isset($_POST['appeal_bg']) ? $_POST['appeal_bg']: null;
	if($appeal_bg){
	  update_post_meta($post_id, 'appeal_bg',$appeal_bg);
	}else{
	  delete_post_meta($post_id, 'appeal_bg',$appealbg);
	}

    $appeal_color=isset($_POST['appeal_color']) ? $_POST['appeal_color']: null;
	if($appeal_color){
	  update_post_meta($post_id, 'appeal_color',$appeal_color);
	}else{
	  delete_post_meta($post_id, 'appeal_color',$appealcolor);
	}

    $appeal_btnbg=isset($_POST['appeal_btnbg']) ? $_POST['appeal_btnbg']: null;
	if($appeal_btnbg){
	  update_post_meta($post_id, 'appeal_btnbg',$appeal_btnbg);
	}else{
	  delete_post_meta($post_id, 'appeal_btnbg',$appealbtnbg);
	}

    $appeal_btncolor=isset($_POST['appeal_btncolor']) ? $_POST['appeal_btncolor']: null;
	if($appeal_btncolor){
	  update_post_meta($post_id, 'appeal_btncolor',$appeal_btncolor);
	}else{
	  delete_post_meta($post_id, 'appeal_btncolor',$appealbtncolor);
	}
}
?>