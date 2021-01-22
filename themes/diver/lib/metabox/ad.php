<?php
add_action('admin_menu', 'add_adpostbox');
add_action('save_post', 'save_removead_data');

function add_adpostbox() {
	add_meta_box( 'ad_remove_field','広告個別設定', 'ad_remove_field', 'post', 'normal' );
}


//投稿ページに表示されるカスタムフィールド
function ad_remove_field($post){
	global $post_ID;
	wp_nonce_field(wp_create_nonce(__FILE__), 'ad_nonce');

	$ad_remove = get_post_meta($post_ID, 'ad_remove', true); ?>
	<div style="padding:10px 20px">
		<label><input type="checkbox" name="ad_remove" id="ad_remove" <?php echo (($ad_remove=='on') ? 'checked="checked"': '');?> />投稿ページの広告を非表示にする <br>
		<div style="font-size: .9em;color: #777;">Diver広告ウィジェットで非表示設定している広告が非表示になります。</div></label>
	</div>

	<div class="single_adarea_wrap">
		<br>
		<label>投稿内上部代替広告<br>
	    <textarea name="single_adarea_top" rows="8" style="width:100%"><?php echo esc_html(get_post_meta($post_ID, 'single_adarea_top', true)); ?></textarea>
	    </label><br><br>

	    <label>投稿内下部代替広告(PC)<br>
	    <div style="font-size: .9em;color: #777;">ダブルレクタングルにする場合は、[col2][/col2]のショートコードをご利用ください。</div>
	    <textarea name="single_adarea_bottom_pc" rows="8" style="width:100%"><?php echo esc_html(get_post_meta($post_ID, 'single_adarea_bottom_pc', true)); ?></textarea>
	    </label>

	    <label>投稿内下部代替広告(SP)<br>
	    <textarea name="single_adarea_bottom_sp" rows="8" style="width:100%"><?php echo esc_html(get_post_meta($post_ID, 'single_adarea_bottom_sp', true)); ?></textarea>
	    </label>
    </div>

    <script type="text/javascript"> 
	    jQuery(document).ready(function($) {
    		if ($('#ad_remove').is(':checked')) {
				$('.single_adarea_wrap').fadeIn();
			} else {
				$('.single_adarea_wrap').fadeOut();
			}

			$('#ad_remove').change(function(){
				if ($(this).is(':checked')) {
					$('.single_adarea_wrap').fadeIn();
				} else {
					$('.single_adarea_wrap').fadeOut();
				}
			});
		});
	</script> 
	<?php
}


function save_removead_data($post_id){
	 $ad_nonce = isset($_POST['ad_nonce']) ? $_POST['ad_nonce'] : null;
	 if(!wp_verify_nonce($ad_nonce, wp_create_nonce(__FILE__))) {return $post_id;}
	 if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return $post_id; }
	 if(!current_user_can('edit_post', $post_id)) { return $post_id; }

	$ad_remove = isset($_POST['ad_remove']) ? $_POST['ad_remove']: null;
	$single_adarea_top = isset($_POST['single_adarea_top']) ? $_POST['single_adarea_top']: null;
	$single_adarea_bottom_pc = isset($_POST['single_adarea_bottom_pc']) ? $_POST['single_adarea_bottom_pc']: null;
	$single_adarea_bottom_sp = isset($_POST['single_adarea_bottom_sp']) ? $_POST['single_adarea_bottom_sp']: null;

	$ad_remove_ex = get_post_meta($post_id, 'ad_remove', true);
	$single_adarea_top_ex = get_post_meta($post_id, 'single_adarea_top', true);
	$single_adarea_bottom_pc_ex = get_post_meta($post_id, 'single_adarea_bottom_pc', true);
	$single_adarea_bottom_sp_ex = get_post_meta($post_id, 'single_adarea_bottom_sp', true);

	if($ad_remove){
	  update_post_meta($post_id, 'ad_remove',$ad_remove);
	}else{
	  delete_post_meta($post_id, 'ad_remove',$ad_remove_ex);
	}

	if($single_adarea_top){
	  update_post_meta($post_id, 'single_adarea_top',$single_adarea_top);
	}else{
	  delete_post_meta($post_id, 'single_adarea_top',$single_adarea_top_ex);
	}

	if($single_adarea_bottom_pc){
	  update_post_meta($post_id, 'single_adarea_bottom_pc',$single_adarea_bottom_pc);
	}else{
	  delete_post_meta($post_id, 'single_adarea_bottom_pc',$single_adarea_bottom_pc_ex);
	}

	if($single_adarea_bottom_sp){
	  update_post_meta($post_id, 'single_adarea_bottom_sp',$single_adarea_bottom_sp);
	}else{
	  delete_post_meta($post_id, 'single_adarea_bottom_sp',$single_adarea_bottom_sp_ex);
	}
}
?>