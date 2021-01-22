<?php
add_action('admin_menu', 'add_lp_layoutbox');
add_action('save_post', 'save_lplayout_btndata');

function add_lp_layoutbox() {
	add_meta_box( 'lp_layout_box','背景設定', 'lp_layout_box', 'lp', 'side' );
}

function lp_layout_box(){
	 global $post_ID; 
    wp_nonce_field(wp_create_nonce(__FILE__), 'lp_layout_nonce');
	 ?>
	 <script>
        jQuery(function($) {
            $(document).ready(function() {
	            $('.media-upload').each(function(){
	                var rel = jQuery(this).attr("rel");
	                $(this).click(function(){
	                    window.send_to_editor = function(html) {
	                        html = '<div>' + html + '</div>';
	                        imgurl = jQuery('img', html).attr("src");
	                        jQuery('#'+rel).val(imgurl);
	                        $("#image-box").children("img").attr('src',imgurl);
	                        tb_remove();
	                    }   
	                    formfield = jQuery('#'+rel).attr('name');
	                    tb_show(null, 'media-upload.php?post_id=0&type=image&TB_iframe=true');
	                    return false;
	                }); 
	            });
	        });
        });
        </script>

	<?php 
		$lpbgcolor = (get_post_meta($post_ID, 'lpbgcolor', true))?get_post_meta($post_ID, 'lpbgcolor', true):'#eee';
	?>

	<div class="lpbgimg-uploader">
		<?php $url = get_post_meta($post_ID, 'lpbgimg_uploader_url', true) ?>
        <div id="preview_lpbgimg">
        <?php echo (!empty($url))?'<img style="max-width:100%;max-height:300px;" src="' . esc_url($url) . '">':'<img />'; ?>
        </div>
        <label>リピート画像</label><br>
        <input type="text" id="src_lpbgimg" name="lpbgimg_uploader_url" value="<?php echo $url; ?>" />
        <input class="button" type="button" name="mediauploadbtn" id="lpbgimg" value="画像を選択" />
    </div>

    <p>背景色<label>
    <input type="text" name="lpbgcolor" class="myColorPicker" value="<?php echo esc_html($lpbgcolor); ?>"></label></p>

<?php
}

function save_lplayout_btndata($post_id){
     $lp_layout_nonce = isset($_POST['lp_layout_nonce']) ? $_POST['lp_layout_nonce'] : null;
     if(!wp_verify_nonce($lp_layout_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
     if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$url = isset($_POST['lpbgimg_uploader_url']) ? $_POST['lpbgimg_uploader_url']: null;
	$lpbgcolor = isset($_POST['lpbgcolor']) ? $_POST['lpbgcolor']: null;

	$url_ex = get_post_meta($post_id, 'lpbgimg_uploader_url', true);
	$lpbgcolor_ex = get_post_meta($post_id, 'lpbgcolor', true);

    if ($url) {
    	update_post_meta($post_id, 'lpbgimg_uploader_url', $url);
    }else{
		delete_post_meta($post_id, 'lpbgimg_uploader_url',$url_ex);
	}

	if($lpbgcolor){
	  update_post_meta($post_id, 'lpbgcolor',$lpbgcolor);
	}else{
	  delete_post_meta($post_id, 'lpbgcolor',$lpbgcolor_ex);
	}
}

/************************

	size設定

************************/
add_action('admin_menu', 'add_lp_sizebox');
add_action('save_post', 'save_lpsize_btndata');

function add_lp_sizebox() {
	add_meta_box( 'lp_size_box','サイズ設定', 'lp_size_box', 'lp', 'side' );
}

function lp_size_box(){
	global $post;
    wp_nonce_field(wp_create_nonce(__FILE__), 'lp_size_nonce');

	$max = (get_post_meta($post->ID, 'lp_size_max', true))?get_post_meta($post->ID, 'lp_size_max', true):'90';
	$mid = (get_post_meta($post->ID, 'lp_size_mid', true))?get_post_meta($post->ID, 'lp_size_mid', true):'96';
	$min = (get_post_meta($post->ID, 'lp_size_min', true))?get_post_meta($post->ID, 'lp_size_min', true):'100';

	$maxpadh = (get_post_meta($post->ID, 'lp_size_max_padding_h', true))?get_post_meta($post->ID, 'lp_size_max_padding_h', true):'20';
	$maxpadv = (get_post_meta($post->ID, 'lp_size_max_padding_v', true))?get_post_meta($post->ID, 'lp_size_max_padding_v', true):'40';
	$midpadh = (get_post_meta($post->ID, 'lp_size_mid_padding_h', true))?get_post_meta($post->ID, 'lp_size_mid_padding_h', true):'20';
	$midpadv = (get_post_meta($post->ID, 'lp_size_mid_padding_v', true))?get_post_meta($post->ID, 'lp_size_mid_padding_v', true):'40';
	$minpadh = (get_post_meta($post->ID, 'lp_size_min_padding_h', true))?get_post_meta($post->ID, 'lp_size_min_padding_h', true):'10';
	$minpadv = (get_post_meta($post->ID, 'lp_size_min_padding_v', true))?get_post_meta($post->ID, 'lp_size_min_padding_v', true):'10';

	 ?>
	<div style="font-weight: bold;">大[1201px~]</div>
	<input type="number" name="lp_size_max" style="width:60%" value="<?php echo $max; ?>"/>
        <?php 
        $unitmax = get_post_meta($post->ID,'lp_size_max_unit',true);
        $datamax = array(
        	array("%","%",""),
        	array("px","px",""),
		 );
        echo '<select name="lp_size_max_unit" style="width:20%">';
         foreach($datamax as $d){
			if($d[1]==$unitmax) $d[2] = "selected"; ?>
			<option value="<?php echo $d[1] ?>" <?php echo $d[2]; ?>><?php echo $d[0]; ?></option>
		<?php }
		echo '</select>'; ?><br>
		左右<input type="number" name="lp_size_max_padding_h" value="<?php echo $maxpadh; ?>" style="width: 60px">px : 
		上下<input type="number" name="lp_size_max_padding_v" value="<?php echo $maxpadv; ?>" style="width: 60px">px
		<br><br>

	<div style="font-weight: bold;">中[~1200px]</div>
	<input type="number" name="lp_size_mid" style="width:60%" value="<?php echo $mid; ?>"/>
        <?php 
        $unitmid = get_post_meta($post->ID,'lp_size_mid_unit',true);
        $datamid = array(
        	array("%","%",""),
        	array("px","px",""),
		 );
        echo '<select name="lp_size_mid_unit" style="width:20%">';
         foreach($datamid as $d){
			if($d[1]==$unitmid) $d[2] ="selected"; ?>
			<option value="<?php echo $d[1] ?>" <?php echo $d[2] ?>><?php echo $d[0] ?></option>
		<?php }
		echo '</select>'; ?><br>
		左右<input type="number" name="lp_size_mid_padding_h" value="<?php echo $midpadh; ?>" style="width: 60px">px : 
		上下<input type="number" name="lp_size_mid_padding_v" value="<?php echo $midpadv; ?>" style="width: 60px">px
		<br><br>

	<div style="font-weight: bold;">小[~767px](SP)</div>
	<input type="number" name="lp_size_min" style="width:60%" value="<?php echo $min; ?>"/>
        <?php 
        $unitmin = get_post_meta($post->ID,'lp_size_min_unit',true);
        $datamin = array(
        	array("%","%",""),
        	array("px","px",""),
		 );
        echo '<select name="lp_size_min_unit" style="width:20%">';
         foreach($datamin as $d){
			if($d[1]==$unitmin) $d[2] = "selected"; ?>
			<option value="<?php echo $d[1] ?>" <?php echo $d[2] ?>><?php echo $d[0] ?></option>
		<?php }
		echo '</select>'; ?><br>
		左右<input type="number" name="lp_size_min_padding_h" value="<?php echo $minpadh; ?>" style="width: 60px">px : 
		上下<input type="number" name="lp_size_min_padding_v" value="<?php echo $minpadv; ?>" style="width: 60px">px
		<br><br>
		<?php
}

function save_lpsize_btndata($post_id){
     $lp_size_nonce = isset($_POST['lp_size_nonce']) ? $_POST['lp_size_nonce'] : null;
     if(!wp_verify_nonce($lp_size_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
     if(!current_user_can('edit_post', $post_id)) { return $post_id; }
    
	$max = isset($_POST['lp_size_max']) ? $_POST['lp_size_max']: null;
	$mid = isset($_POST['lp_size_mid']) ? $_POST['lp_size_mid']: null;
	$min = isset($_POST['lp_size_min']) ? $_POST['lp_size_min']: null;

	$max_ex = get_post_meta($post_id, 'lp_size_max', true);
	$mid_ex = get_post_meta($post_id, 'lp_size_mid', true);
	$min_ex = get_post_meta($post_id, 'lp_size_min', true);

    if ($max) {
    	update_post_meta($post_id, 'lp_size_max', $max);
    }else{
		delete_post_meta($post_id, 'lp_size_max',$max_ex);
	}

	if ($mid) {
    	update_post_meta($post_id, 'lp_size_mid', $mid);
    }else{
		delete_post_meta($post_id, 'lp_size_mid',$mid_ex);
	}

	if ($min) {
    	update_post_meta($post_id, 'lp_size_min', $min);
    }else{
		delete_post_meta($post_id, 'lp_size_min',$min_ex);
	}

	$maxunit = isset($_POST['lp_size_max_unit']) ? $_POST['lp_size_max_unit']: null;
	$midunit = isset($_POST['lp_size_mid_unit']) ? $_POST['lp_size_mid_unit']: null;
	$minunit = isset($_POST['lp_size_min_unit']) ? $_POST['lp_size_min_unit']: null;

	$maxunit_ex = get_post_meta($post_id, 'lp_size_max_unit', true);
	$midunit_ex = get_post_meta($post_id, 'lp_size_mid_unit', true);
	$minunit_ex = get_post_meta($post_id, 'lp_size_min_unit', true);

	if ($maxunit) {
    	update_post_meta($post_id, 'lp_size_max_unit', $maxunit);
    }else{
		delete_post_meta($post_id, 'lp_size_max_unit',$maxunit_ex);
	}

	if ($midunit) {
    	update_post_meta($post_id, 'lp_size_mid_unit', $midunit);
    }else{
		delete_post_meta($post_id, 'lp_size_mid_unit',$midunit_ex);
	}

	if ($minunit) {
    	update_post_meta($post_id, 'lp_size_min_unit', $minunit);
    }else{
		delete_post_meta($post_id, 'lp_size_min_unit',$minunit_ex);
	}

	$maxpadh = isset($_POST['lp_size_max_padding_h']) ? $_POST['lp_size_max_padding_h']: null;
	$maxpadv = isset($_POST['lp_size_max_padding_v']) ? $_POST['lp_size_max_padding_v']: null;
	$midpadh = isset($_POST['lp_size_mid_padding_h']) ? $_POST['lp_size_mid_padding_h']: null;
	$midpadv = isset($_POST['lp_size_mid_padding_v']) ? $_POST['lp_size_mid_padding_v']: null;
	$minpadh = isset($_POST['lp_size_min_padding_h']) ? $_POST['lp_size_min_padding_h']: null;
	$minpadv = isset($_POST['lp_size_min_padding_v']) ? $_POST['lp_size_min_padding_v']: null;

	$maxpadh_ex = get_post_meta($post_id, 'lp_size_max_padding_h', true);
	$maxpadv_ex = get_post_meta($post_id, 'lp_size_max_padding_v', true);
	$midpadh_ex = get_post_meta($post_id, 'lp_size_mid_padding_h', true);
	$midpadv_ex = get_post_meta($post_id, 'lp_size_mid_padding_v', true);
	$minpadh_ex = get_post_meta($post_id, 'lp_size_min_padding_h', true);
	$minpadv_ex = get_post_meta($post_id, 'lp_size_min_padding_v', true);

	if ($maxpadh) {
    	update_post_meta($post_id, 'lp_size_max_padding_h', $maxpadh);
    }else{
		delete_post_meta($post_id, 'lp_size_max_padding_h',$maxpadh_ex);
	}

	if ($maxpadv) {
    	update_post_meta($post_id, 'lp_size_max_padding_v', $maxpadv);
    }else{
		delete_post_meta($post_id, 'lp_size_max_padding_v',$maxpadv_ex);
	}

	if ($midpadh) {
    	update_post_meta($post_id, 'lp_size_mid_padding_h', $midpadh);
    }else{
		delete_post_meta($post_id, 'lp_size_mid_padding_h',$midpadh_ex);
	}

	if ($midpadv) {
    	update_post_meta($post_id, 'lp_size_mid_padding_v', $midpadv);
    }else{
		delete_post_meta($post_id, 'lp_size_mid_padding_v',$midpadv_ex);
	}

	if ($minpadh) {
    	update_post_meta($post_id, 'lp_size_min_padding_h', $minpadh);
    }else{
		delete_post_meta($post_id, 'lp_size_min_padding_h',$minpadh_ex);
	}

	if ($minpadv) {
    	update_post_meta($post_id, 'lp_size_min_padding_v', $minpadv);
    }else{
		delete_post_meta($post_id, 'lp_size_min_padding_v',$minpadv_ex);
	}

}

/************************

	デザイン設定

************************/
add_action('admin_menu', 'add_lp_contentbox');
add_action('save_post', 'save_lpcontent_data');

function add_lp_contentbox() {
	add_meta_box( 'lp_content_box','デザイン設定', 'lp_content_box', 'lp', 'side' );
}

function lp_content_box(){
	global $post_ID; 
    wp_nonce_field(wp_create_nonce(__FILE__), 'lp_content_nonce');

	$lpcontentbgcolor = (get_post_meta($post_ID, 'lpcontentbgcolor', true))?get_post_meta($post_ID, 'lpcontentbgcolor', true):'#fff';
	?>

	<p>メインエリア背景色<label>
    <input type="text" name="lpcontentbgcolor" class="myColorPicker" value="<?php echo esc_html($lpcontentbgcolor); ?>"></label></p>

    <p><label>
    <input type="checkbox" name="lpcontentshadow" value="checked" <?php checked(get_post_meta(get_the_ID(), 'lpcontentshadow', true), "checked" ); ?>>影効果</label></p>

    <p><label>
    <input type="checkbox" name="lpfooter_fixmenu" value="checked" <?php checked(get_post_meta(get_the_ID(), 'lpfooter_fixmenu', true), "checked" ); ?>>フッター固定メニュー表示</label></p>

    <?php
	$lpfootermenu = get_post_meta($post_ID, 'lpfootermenu', true);
    $nav_menus = wp_get_nav_menus();
	
	if ( count( $nav_menus ) > 0 ) {
	 echo '<p>フッター表示<select name="lpfootermenu">';
	 	 echo '<option value="0">メニューを選択して下さい</option>';
		 foreach ( (array) $nav_menus as $menu ) {
			 echo '<option value="' . $menu->term_id. '" '.selected( $lpfootermenu, $menu->term_id ).'>';
			 echo esc_html( $menu->name );
			 echo '</option>';
		 }
		 
	echo '</select></p>';
	}
					

	$lpfooterbgcolor = (get_post_meta($post_ID, 'lpfooterbgcolor', true))?get_post_meta($post_ID, 'lpfooterbgcolor', true):'#eee';
	?>

	<label>コピーライト等<input type="text" style="width: 100%;" id="lpfootertext" name="lpfootertext" value="<?php echo get_post_meta($post_ID, 'lpfootertext', true); ?>" /></label>

	<p>フッター背景色<label>
    <input type="text" name="lpfooterbgcolor" class="myColorPicker" value="<?php echo esc_html($lpfooterbgcolor); ?>"></label></p>




<?php
}


function save_lpcontent_data($post_id){
     $lp_content_nonce = isset($_POST['lp_content_nonce']) ? $_POST['lp_content_nonce'] : null;
     if(!wp_verify_nonce($lp_content_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
     if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
     if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$lpcontentbgcolor = isset($_POST['lpcontentbgcolor']) ? $_POST['lpcontentbgcolor']: null;
	$lpcontentbgcolor_ex = get_post_meta($post_id, 'lpcontentbgcolor', true);

	if($lpcontentbgcolor){
	  update_post_meta($post_id, 'lpcontentbgcolor',$lpcontentbgcolor);
	}else{
	  delete_post_meta($post_id, 'lpcontentbgcolor',$lpcontentbgcolor_ex);
	}

	$lpcontentshadow = isset($_POST['lpcontentshadow']) ? $_POST['lpcontentshadow']: null;
	$lpcontentshadow_ex = get_post_meta($post_id, 'lpcontentshadow', true);

	if($lpcontentshadow){
	  update_post_meta($post_id, 'lpcontentshadow',$lpcontentshadow);
	}else{
	  delete_post_meta($post_id, 'lpcontentshadow',$lpcontentshadow_ex);
	}

	$lpfooter_fixmenu = isset($_POST['lpfooter_fixmenu']) ? $_POST['lpfooter_fixmenu']: null;
	$lpfooter_fixmenu_ex = get_post_meta($post_id, 'lpfooter_fixmenu', true);

	if($lpfooter_fixmenu){
	  update_post_meta($post_id, 'lpfooter_fixmenu',$lpfooter_fixmenu);
	}else{
	  delete_post_meta($post_id, 'lpfooter_fixmenu',$lpfooter_fixmenu_ex);
	}

	$lpfootermenu = isset($_POST['lpfootermenu']) ? $_POST['lpfootermenu']: null;
	$lpfootermenu_ex = get_post_meta($post_id, 'lpfootermenu', true);

	if($lpfootermenu){
	  update_post_meta($post_id, 'lpfootermenu',$lpfootermenu);
	}else{
	  delete_post_meta($post_id, 'lpfootermenu',$lpfootermenu_ex);
	}

	$lpfootertext = isset($_POST['lpfootertext']) ? $_POST['lpfootertext']: null;
	$lpfootertext_ex = get_post_meta($post_id, 'lpfootertext', true);

	if($lpfootertext){
	  update_post_meta($post_id, 'lpfootertext',$lpfootertext);
	}else{
	  delete_post_meta($post_id, 'lpfootertext',$lpfootertext_ex);
	}

	$lpfooterbgcolor = isset($_POST['lpfooterbgcolor']) ? $_POST['lpfooterbgcolor']: null;
	$lpfooterbgcolor_ex = get_post_meta($post_id, 'lpfooterbgcolor', true);

	if($lpfooterbgcolor){
	  update_post_meta($post_id, 'lpfooterbgcolor',$lpfooterbgcolor);
	}else{
	  delete_post_meta($post_id, 'lpfooterbgcolor',$lpfooterbgcolor_ex);
	}
}