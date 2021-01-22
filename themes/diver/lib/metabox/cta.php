<?php
add_action('admin_menu', 'add_ctabox');
add_action('save_post', 'save_cta_postdata');

//投稿ページに表示される"入力欄その１"の設定
function add_ctabox() {
	add_meta_box( 'cta_box','CTA', 'cta_custom', 'post', 'normal' );
    add_meta_box( 'cta_box','CTA', 'cta_custom', 'page', 'normal' );
}
//投稿ページに表示されるカスタムフィールド
function cta_custom(){
       global $post_ID;
       //カスタムフィールドの値を取得
	wp_nonce_field(wp_create_nonce(__FILE__), 'cta_custom_nonce');
        $ctaId = get_post_meta($post_ID,'cta',true);


?>
<label>作成済みのCTAから適用したいものを選んでください。</label>
<select name="cta"> 
<option value="default">デフォルトのCTAを設定</option>
<option value="none" <?php if($ctaId=='none'){echo 'selected';}?>>CTA非表示</option>
<?php
$args = array('post_type' => 'cta',
			'posts_per_page' => -1);
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?> 
?>
<option value="<?php echo $post->ID; ?>"<?php if($ctaId==$post->ID){echo 'selected';}?>><?php echo $post->post_title; ?></option>
<?php endforeach; wp_reset_postdata();?>
</select>
<?php
	}

function save_cta_postdata($post_id){
	 $cta_custom_nonce = isset($_POST['cta_custom_nonce']) ? $_POST['cta_custom_nonce'] : null;
	 if(!wp_verify_nonce($cta_custom_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$ctaId=isset($_POST['cta']) ? $_POST['cta']: null;
	$ctaId_ex = get_post_meta($post_id, 'cta', true);
	if($ctaId){
	  update_post_meta($post_id, 'cta',$ctaId);
	}else{
	  delete_post_meta($post_id, 'cta',$ctaId_ex);
	}
}


add_action('admin_menu', 'add_ctabtnbox');
add_action('save_post', 'save_cta_btndata');

//CTABTN
function add_ctabtnbox() {
	add_meta_box( 'cta_btn','ボタン設定', 'cta_btn', 'cta', 'normal' );
}

function cta_btn(){ 
	wp_nonce_field(wp_create_nonce(__FILE__), 'cta_btn_nonce');

	$target = get_post_meta(get_the_ID(), 'diver_cta_target', true);
	$nofollow = get_post_meta(get_the_ID(), 'diver_cta_nofollow', true);

	$target_re = ($target!=0 && $target)?$target:'1';
	$nofollow_re = ($nofollow!=0 && $nofollow)?$nofollow:'1';

	?>
    <p><label>ボタンのリンク先(空白で保存するとボタンが非表示になります。)<br />
    <input type="text" style="width:400px;" name="cta_link" value="<?php echo esc_html(get_post_meta(get_the_ID(),'cta_link',true)); ?>"/>
    </label></p> 

	<p><label><input type="checkbox" name="diver_cta_target" value="1" <?php checked( $target_re, 1 ); ?> /> 別タブで開く　</label>
	<label><input type="checkbox" name="diver_cta_nofollow" value="1" <?php checked( $nofollow_re, 1 ); ?> /> rel="nofollow"</label></p>

    <p>ボタンのテキスト<label><br />
    <input type="text" style="width:400px;" name="cta_btntext" value="<?php echo esc_html(get_post_meta(get_the_ID(), 'cta_btntext', true)); ?>"/>
    </label></p> 

    <p>ボタン背景<label><br />
    <input type="text" name="cta_btnbg" class="myColorPicker" value="<?php echo esc_html(get_post_meta(get_the_ID(), 'cta_btnbg', true)); ?>"></label></p>

    <p>ボタンテキスト<label><br />
    <input type="text" name="cta_btncolor" class="myColorPicker" value="<?php echo esc_html(get_post_meta(get_the_ID(), 'cta_btncolor', true)); ?>"></label></p>
<?php
}

function save_cta_btndata($post_id){
	 $cta_btn_nonce = isset($_POST['cta_btn_nonce']) ? $_POST['cta_btn_nonce'] : null;
	 if(!wp_verify_nonce($cta_btn_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }


	$ctalink = isset($_POST['cta_link']) ? $_POST['cta_link']: null;
	$ctabtntext = isset($_POST['cta_btntext']) ? $_POST['cta_btntext']: null;
	$ctabtnbg = isset($_POST['cta_btnbg']) ? $_POST['cta_btnbg']: null;
	$ctabtncolor = isset($_POST['cta_btncolor']) ? $_POST['cta_btncolor']: null;

	$ctalink_ex = get_post_meta($post_id, 'cta_link', true);
	$ctabtntext_ex = get_post_meta($post_id, 'cta_btntext', true);
	$ctabtnbg_ex = get_post_meta($post_id, 'cta_btnbg', true);
	$ctabtncolor_ex = get_post_meta($post_id, 'cta_btncolor', true);

	if($ctalink){
	  update_post_meta($post_id, 'cta_link',$ctalink);
	}else{
	  delete_post_meta($post_id, 'cta_link',$ctalink_ex);
	}

	if($ctabtntext){
	  update_post_meta($post_id, 'cta_btntext',$ctabtntext);
	}else{
	  delete_post_meta($post_id, 'cta_btntext',$ctabtntext_ex);
	}

	if($ctabtnbg){
	  update_post_meta($post_id, 'cta_btnbg',$ctabtnbg);
	}else{
	  delete_post_meta($post_id, 'cta_btnbg',$ctabtnbg_ex);
	}

	if($ctabtncolor){
	  update_post_meta($post_id, 'cta_btncolor',$ctabtncolor);
	}else{
	  delete_post_meta($post_id, 'cta_btncolor',$ctabtncolor_ex);
	}

	$target= isset($_POST['diver_cta_target']) ? $_POST['diver_cta_target']: '2';
	$nofollow= isset($_POST['diver_cta_nofollow']) ? $_POST['diver_cta_nofollow']: '2';

	$target_ex = get_post_meta($post_id,'diver_cta_target',true);
	$nofollow_ex = get_post_meta($post_id,'diver_cta_nofollow',true);

    if ($target) {
    	update_post_meta($post_id, 'diver_cta_target', $target);
    }else{
		delete_post_meta($post_id, 'diver_cta_target',$target_ex);
	}

    if ($nofollow) {
    	update_post_meta($post_id, 'diver_cta_nofollow', $nofollow);
    }else{
		delete_post_meta($post_id, 'diver_cta_nofollow',$nofollow_ex);
	}
}

add_action('admin_menu', 'add_ctalayoutbox');
add_action('save_post', 'save_cta_layoutdata');

//CTAlayout
function add_ctalayoutbox() {
	add_meta_box( 'cta_layout','画像位置', 'cta_layoutfield', 'cta', 'side' );
}

function cta_layoutfield(){ 
		wp_nonce_field(wp_create_nonce(__FILE__), 'cta_layout_nonce');

       $id = get_the_ID();
       //カスタムフィールドの値を取得
        $layoutName = get_post_meta($id,'ctalayout',true);
        $data = array(
        	array("右","right",""),
        	array("左","left",""),
        	array("上","full",""),
		 );
        $count = 0;
        foreach($data as $d){
        $count++;
		if($d[1]==$layoutName) $d[2] = "checked";
		echo <<<EOS
		<label style="width:33%;float:left">
		<input type="radio" name="ctalayout" value="{$d[1]}" {$d[2]}>{$d[0]}
		</label>
EOS;
		}
		echo '<div style="clear:both"></div>';
}

function save_cta_layoutdata($post_id){
	 $cta_layout_nonce = isset($_POST['cta_layout_nonce']) ? $_POST['cta_layout_nonce'] : null;
	 if(!wp_verify_nonce($cta_layout_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$ctalayout = isset($_POST['ctalayout']) ? $_POST['ctalayout']: null;
	$ctalayout_ex = get_post_meta($post_id, 'ctalayout', true);

	if($ctalayout){
	  update_post_meta($post_id, 'ctalayout',$ctalayout);
	}else{
	  delete_post_meta($post_id, 'ctalayout',$ctalayout_ex);
	}
}

//CTAColor
add_action('admin_menu', 'add_ctacolorbox');
add_action('save_post', 'save_cta_colordata');

function add_ctacolorbox() {
	add_meta_box( 'cta_maincolor','CTAカラー', 'cta_colorfield', 'cta', 'side' );
}

function cta_colorfield(){ 
	wp_nonce_field(wp_create_nonce(__FILE__), 'cta_color_nonce');
	?>
    <p>CTAタイトル背景<label><br />
    <input type="text" name="cta_titlebg" class="myColorPicker" value="<?php echo esc_html(get_post_meta(get_the_ID(), 'cta_titlebg', true)); ?>"></label></p>

    <p>CTAタイトル<label><br />
    <input type="text" name="cta_titlecolor" class="myColorPicker" value="<?php echo esc_html(get_post_meta(get_the_ID(), 'cta_titlecolor', true)); ?>"></label></p>

    <p>CTA背景<label><br />
    <input type="text" name="cta_bg" class="myColorPicker" value="<?php echo esc_html(get_post_meta(get_the_ID(), 'cta_bg', true)); ?>"></label></p>

    <p>CTAテキスト<label><br />
    <input type="text" name="cta_color" class="myColorPicker" value="<?php echo esc_html(get_post_meta(get_the_ID(), 'cta_color', true)); ?>"></label></p>
<?php }

function save_cta_colordata($post_id){
	 $cta_color_nonce = isset($_POST['cta_color_nonce']) ? $_POST['cta_color_nonce'] : null;
	 if(!wp_verify_nonce($cta_color_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$ctatitlebg = isset($_POST['cta_titlebg']) ? $_POST['cta_titlebg']: null;
	$ctatitlecolor = isset($_POST['cta_titlecolor']) ? $_POST['cta_titlecolor']: null;
	$ctabg = isset($_POST['cta_bg']) ? $_POST['cta_bg']: null;
	$ctacolor = isset($_POST['cta_color']) ? $_POST['cta_color']: null;

	$ctatitlebg_ex = get_post_meta($post_id, 'cta_titlebg', true);
	$ctatitlecolor_ex = get_post_meta($post_id, 'cta_titlecolor', true);
	$ctabg_ex = get_post_meta($post_id, 'cta_bg', true);
	$ctacolor_ex = get_post_meta($post_id, 'cta_color', true);

	if($ctatitlebg){
	  update_post_meta($post_id, 'cta_titlebg',$ctatitlebg);
	}else{
	  delete_post_meta($post_id, 'cta_titlebg',$ctatitlebg_ex);
	}

	if($ctatitlecolor){
	  update_post_meta($post_id, 'cta_titlecolor',$ctatitlecolor);
	}else{
	  delete_post_meta($post_id, 'cta_titlecolor',$ctatitlecolor_ex);
	}

	if($ctabg){
	  update_post_meta($post_id, 'cta_bg',$ctabg);
	}else{
	  delete_post_meta($post_id, 'cta_bg',$ctabg_ex);
	}

	if($ctacolor){
	  update_post_meta($post_id, 'cta_color',$ctacolor);
	}else{
	  delete_post_meta($post_id, 'cta_color',$ctacolor_ex);
	}
}
?>