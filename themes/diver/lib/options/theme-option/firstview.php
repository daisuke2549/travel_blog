<style>
#mediapreview{
    max-width:300px;
    max-height:300px;
}
#diver_option_firstview_mov,#diver_option_firstview_slider,#diver_option_firstview_img,#diver_option_firstview_simple,.movupload,.youtubeurl,#diver_option_firstview_content_temp,#diver_option_firstview_editor,#diver_option_firstview_other{
  display: none;
}
</style>
<?php
// POSTデータがあれば設定を更新
    if(isset($_POST['diver_option_firstview'])){
        update_option('diver_option_firstview', $_POST['diver_option_firstview']);
        update_option('diver_option_firstview_position', $_POST['diver_option_firstview_position']);
        update_option('diver_option_firstview_viewoption', $_POST['diver_option_firstview_viewoption']);

        switch ($_POST['diver_option_firstview']) {
             case '1':
                update_option('diver_option_firstview_simple_style', wp_unslash($_POST['diver_option_firstview_simple_style']));
                update_option('diver_option_firstview_simple_style_option', $_POST['diver_option_firstview_simple_style_option']);
                update_option('diver_firstview_simple_bgcolor', $_POST['diver_firstview_simple_bgcolor']);
                update_option('diver_firstview_simple_bgcolor2', $_POST['diver_firstview_simple_bgcolor2']);

                $diver_firstview_img_fixed = isset($_POST['diver_firstview_img_fixed'])? 1 : 0 ;
                update_option('diver_firstview_img_fixed', $diver_firstview_img_fixed);
                break;

            case '2':
                update_option('diver_firstview_slider_size', $_POST['diver_firstview_slider_size']);
            break;
             
             case '3':
                update_option('diver_firstview_imgbg', isset($_POST['diver_firstview_imgbg'])? 1 : 0);
                update_option('fvbgimg-uploader_img', wp_unslash($_POST['fvbgimg-uploader_img']));
                update_option('fvbgimgsp-uploader_img', wp_unslash($_POST['fvbgimgsp-uploader_img']));
                update_option('diver_firstview_size', wp_unslash($_POST['diver_firstview_size']));
                update_option('diver_firstview_size_custom', $_POST['diver_firstview_size_custom']);
                update_option('diver_firstview_repeat', $_POST['diver_firstview_repeat']);
                update_option('diver_firstview_img_sposition', $_POST['diver_firstview_img_sposition']);
                update_option('diver_firstview_fvimgsp', $_POST['diver_firstview_fvimgsp']);
                update_option('diver_firstview_bgcolor', $_POST['diver_firstview_bgcolor']);
                update_option('diver_firstview_img_link',$_POST['diver_firstview_img_link']);

                update_option('diver_firstview_size_sp', wp_unslash($_POST['diver_firstview_size_sp']));
                update_option('diver_firstview_size_custom_sp', $_POST['diver_firstview_size_custom_sp']);


                update_option('diver_firstview_bg_size_w', wp_unslash($_POST['diver_firstview_bg_size_w']));
                update_option('diver_firstview_bg_size_w_custom', wp_unslash($_POST['diver_firstview_bg_size_w_custom']));
                update_option('diver_firstview_bg_size_h', wp_unslash($_POST['diver_firstview_bg_size_h']));
                update_option('diver_firstview_bg_size_h_custom', wp_unslash($_POST['diver_firstview_bg_size_h_custom']));

                update_option('diver_firstview_bg_size_w_sp', wp_unslash($_POST['diver_firstview_bg_size_w_sp']));
                update_option('diver_firstview_bg_size_w_custom_sp', wp_unslash($_POST['diver_firstview_bg_size_w_custom_sp']));
                update_option('diver_firstview_bg_size_h_sp', wp_unslash($_POST['diver_firstview_bg_size_h_sp']));
                update_option('diver_firstview_bg_size_h_custom_sp', wp_unslash($_POST['diver_firstview_bg_size_h_custom_sp']));
                break;

            case '4':
                update_option('diver_firstview_mov_type', $_POST['diver_firstview_mov_type']);
                update_option('diver_firstview_mov_youtubeurl', $_POST['diver_firstview_mov_youtubeurl']);
                update_option('fvmovie-uploader_img', $_POST['fvmovie-uploader_img']);
                update_option('fvmovbgimg-uploader_img', $_POST['fvmovbgimg-uploader_img']);
                update_option('diver_firstview_mov_size', $_POST['diver_firstview_mov_size']);
                update_option('diver_firstview_mov_size_custom', $_POST['diver_firstview_mov_size_custom']);
                update_option('diver_firstview_mov_filter', $_POST['diver_firstview_mov_filter']);
                update_option('diver_firstview_mov_size_sp', $_POST['diver_firstview_mov_size_sp']);
                update_option('diver_firstview_mov_size_sp_custom', $_POST['diver_firstview_mov_size_sp_custom']);
            break;
            case '5':
                update_option('diver_firstview_other_text', wp_unslash($_POST['diver_firstview_other_text']));
            break;
        }
    }
?>

<?php
    $diver_option_firstview = get_option('diver_option_firstview','0');
    $diver_option_firstview_position = get_option('diver_option_firstview_position',get_theme_mod('headerimage_position','bottom'));
    $diver_option_firstview_viewoption = get_option('diver_option_firstview_viewoption','top');

?>

<h1 class="diver_option_header">ファーストビュー設定</h1>
<div class="diver_option_desc">サイト全体の設定を行います。</div>

<h2 class="diver_option_title">背景設定</h2>
<div class="diver_option_wrap">
<?php
    // 更新完了を通知
    if (isset($_POST['firstview_media'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<form method="post" action="">
<table class="form-table">

    <tr>
        <th scope="row">表示位置</th>
        <td><p>
        <label><input name="diver_option_firstview_position" type="radio" value="bottom" <?php checked('bottom',$diver_option_firstview_position); ?>/>メニューの下</label>　
        <label><input name="diver_option_firstview_position" type="radio" value="middle" <?php checked('middle',$diver_option_firstview_position); ?>/>独立メニューの上</label>　
        <label><input name="diver_option_firstview_position" type="radio" value="top" <?php checked('top',$diver_option_firstview_position); ?>/>最上部</label>
        </p></td>
    </tr>

    <tr>
        <th scope="row">表示オプション</th>
        <td><p>
        <label><input name="diver_option_firstview_viewoption" type="radio" value="top" <?php checked('top',$diver_option_firstview_viewoption); ?>/>トップページのみ</label>　
        <label><input name="diver_option_firstview_viewoption" type="radio" value="post" <?php checked('post',$diver_option_firstview_viewoption); ?>/>トップページと投稿/固定ページ</label>　
        <label><input name="diver_option_firstview_viewoption" type="radio" value="all" <?php checked('all',$diver_option_firstview_viewoption); ?>/>すべてのページ</label>
        </p></td>
    </tr>

    <tr>
        <th scope="row">ファーストビュー</th>
        <td><p>
        <label><input name="diver_option_firstview" type="radio" value="0" <?php checked(0,$diver_option_firstview); ?>/>利用しない</label>　
        <label><input name="diver_option_firstview" type="radio" value="1" <?php checked(1,$diver_option_firstview); ?>/>シンプル</label>　
        <label><input name="diver_option_firstview" type="radio" value="2" <?php checked(2,$diver_option_firstview); ?>/>ピックアップスライダー</label>　
        <label><input name="diver_option_firstview" type="radio" value="3" <?php checked(3,$diver_option_firstview); ?> />画像</label>　
        <label><input name="diver_option_firstview" type="radio" value="4" <?php checked(4,$diver_option_firstview); ?> />動画</label>　
        <label><input name="diver_option_firstview" type="radio" value="5" <?php checked(5,$diver_option_firstview); ?> />カスタム</label>
        </p></td>
    </tr>

</table>
<div class="firstview_area">

<!----------------------------------------------------

    シンプル

------------------------------------------------------>
<?php
    $diver_option_firstview_simple_style = get_option('diver_option_firstview_simple_style','simple');
    $diver_option_firstview_simple_style_option = get_option('diver_option_firstview_simple_style_option','length');
    $diver_firstview_simple_bgcolor = get_option('diver_firstview_simple_bgcolor','#759ab2');
    $diver_firstview_simple_bgcolor2 = get_option('diver_firstview_simple_bgcolor2','#fff');
    $diver_firstview_img_fixed = get_option('diver_firstview_img_fixed','1');
?>
<table id="diver_option_firstview_simple" class="form-table">

     <tr>
        <th scope="row"><label for="diver_option_firstview_simple_style">背景スタイル</label></th>
        <td>
            <select name="diver_option_firstview_simple_style" id="diver_option_firstview_simple_style">
                <option value="simple" <?php selected('simple',$diver_option_firstview_simple_style); ?> >シンプル</option>
                <option value="stripe" <?php selected('stripe',$diver_option_firstview_simple_style); ?> >ストライプ</option>
                <option value="dot" <?php selected('dot',$diver_option_firstview_simple_style); ?> >ドット</option>
                <option value="grad" <?php selected('grad',$diver_option_firstview_simple_style); ?> >グラデーション</option>
                <option value="tile" <?php selected('tile',$diver_option_firstview_simple_style); ?> >タイル</option>
            </select>
        </td>
    </tr>

    <tr>
        <th scope="row">背景スタイルオプション</th>
        <td><p>
        <label><input name="diver_option_firstview_simple_style_option" type="radio" value="length" <?php checked('length',$diver_option_firstview_simple_style_option); ?>/>縦</label>　
        <label><input name="diver_option_firstview_simple_style_option" type="radio" value="vertical" <?php checked('vertical',$diver_option_firstview_simple_style_option); ?> />横</label>　
        <label><input name="diver_option_firstview_simple_style_option" type="radio" value="slant" <?php checked('slant',$diver_option_firstview_simple_style_option); ?> />斜め</label>
                </p>
        </td>
    </tr>

    <tr>
        <th scope="row"><label for="diver_firstview_simple_bgcolor">背景カラー</label></th>
        <td><label><input type="text" name="diver_firstview_simple_bgcolor" class="myColorPicker" value="<?php echo $diver_firstview_simple_bgcolor ?>"></label></td>
    </tr>

    <tr>
        <th scope="row"><label for="diver_firstview_simple_bgcolor2">背景カラーサブ</label></th>
        <td><label><input type="text" name="diver_firstview_simple_bgcolor2" class="myColorPicker" value="<?php echo $diver_firstview_simple_bgcolor2 ?>"></label></td>
    </tr>

</table>

<!----------------------------------------------------

    画像

------------------------------------------------------>
<?php
    $diver_firstview_imgbg = get_option('diver_firstview_imgbg','1');
    $diver_firstview_size = get_option('diver_firstview_size','0');
    $diver_firstview_size_custom = get_option('diver_firstview_size_custom');
    $diver_firstview_repeat = get_option('diver_firstview_repeat','repeat');
    $diver_firstview_img_sposition = get_option('diver_firstview_img_sposition','center');
    $diver_firstview_fvimgsp = get_option('diver_firstview_fvimgsp','sp');
    $diver_firstview_bgcolor = get_option('diver_firstview_bgcolor','#fff');
    $diver_firstview_img_link = get_option('diver_firstview_img_link');

    $diver_firstview_size_sp = get_option('diver_firstview_size_sp','0');
    $diver_firstview_size_custom_sp = get_option('diver_firstview_size_custom_sp');

    $diver_firstview_bg_size_w = get_option('diver_firstview_bg_size_w','0');
    $diver_firstview_bg_size_w_custom = get_option('diver_firstview_bg_size_w_custom','100');

    $diver_firstview_bg_size_h = get_option('diver_firstview_bg_size_h','0');
    $diver_firstview_bg_size_h_custom = get_option('diver_firstview_bg_size_h_custom','100');

    $diver_firstview_bg_size_w_sp = get_option('diver_firstview_bg_size_w_sp','0');
    $diver_firstview_bg_size_w_custom_sp = get_option('diver_firstview_bg_size_w_custom_sp','100');

    $diver_firstview_bg_size_h_sp = get_option('diver_firstview_bg_size_h_sp','0');
    $diver_firstview_bg_size_h_custom_sp = get_option('diver_firstview_bg_size_h_custom_sp','100');
?>
<table id="diver_option_firstview_img" class="form-table">
    <tr>
        <th scope="row">表示領域</th>
        <td><p><label><input name="diver_firstview_size" type="radio" value="0" <?php checked( 0, $diver_firstview_size ); ?>/>自動調整</label>　
                <label><input name="diver_firstview_size" type="radio" value="1" <?php checked( 1, $diver_firstview_size ); ?> />カスタマイズ：<input type="number" name="diver_firstview_size_custom" value="<?php echo $diver_firstview_size_custom ?>" />px
                </label>
                </p>
        </td>
    </tr>

    <tr>
    <th scope="row"><label for="fvbgimg-uploader_img">画像</label></th>
        <td>
        <?php $url = get_option('fvbgimg-uploader_img',get_theme_mod('header_image')) ?>
            <div id="preview_fvbgimg">
                <?php if($url): ?>
                    <img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
                <?php endif; ?>
            </div>
            <input type="text" id="src_fvbgimg" name="fvbgimg-uploader_img" value="<?php echo $url; ?>" />
            <input class="button" type="button" name="mediauploadbtn" id="fvbgimg" value="画像を選択" />
            <input class="button" type="button" name="media-clear" id="fvbgimg" value="クリア" />
        </td>
    </tr>

    <tr>
        <th scope="row"><label for="diver_firstview_imgbg">画像を背景にする</label></th>
        <td><label><input name="diver_firstview_imgbg" type="checkbox" id="diver_firstview_imgbg" value="1" <?php checked( 1, $diver_firstview_imgbg); ?> />（背景にしていない状態ではコンテンツは表示されません。）</label></td>
    </tr>


    <tr class="fv_image_nobg">
        <th scope="row"><label for="diver_firstview_img_link">画像全体にリンク</label></th>
        <td><input type="text" id="diver_firstview_img_link" name="diver_firstview_img_link" value="<?php echo $diver_firstview_img_link; ?>" style="width:70%" /></td>
    </tr>

    <tr class="fv_image_bg">
        <th scope="row">画像リピート設定</th>
        <td><p><label><input name="diver_firstview_repeat" type="radio" value="repeat" <?php checked( 'repeat', $diver_firstview_repeat ); ?>/>リピート</label>　
                <label><input name="diver_firstview_repeat" type="radio" value="norepeat" <?php checked( 'norepeat', $diver_firstview_repeat ); ?> />リピートしない</label>
                </p>
        </td>
    </tr>

    <tr class="fv_image_bg_size">
        <th scope="row">画像ポジション設定</th>
        <td><p><label><input name="diver_firstview_img_sposition" type="radio" value="left" <?php checked( 'left', $diver_firstview_img_sposition ); ?>/>左寄せ</label>　
        <label><input name="diver_firstview_img_sposition" type="radio" value="center" <?php checked( 'center', $diver_firstview_img_sposition ); ?> />中心</label>　
        <label><input name="diver_firstview_img_sposition" type="radio" value="right" <?php checked( 'right', $diver_firstview_img_sposition ); ?> />右寄せ</label>
                </p>
        </td>
    </tr>

    <tr  class="fv_image_bg">
        <th scope="row"><label for="diver_firstview_imgbg">背景画像サイズ<span style="font-size:.8em;color:#888;"><br>推奨サイズ[横幅:100%,高さ:自動調整]</span></label></th>
        <td><p><label>【横幅】　<input name="diver_firstview_bg_size_w" type="radio" value="0" <?php checked( 0, $diver_firstview_bg_size_w ); ?>/>自動調整</label>　
        <label><input name="diver_firstview_bg_size_w" type="radio" value="1" <?php checked( 1, $diver_firstview_bg_size_w ); ?> /><input type="number" name="diver_firstview_bg_size_w_custom" value="<?php echo $diver_firstview_bg_size_w_custom ?>" />％
        </label>
        　</p>
        　<p><label>【高さ】　<input name="diver_firstview_bg_size_h" type="radio" value="0" <?php checked( 0, $diver_firstview_bg_size_h ); ?>/>自動調整</label>　
        <label><input name="diver_firstview_bg_size_h" type="radio" value="1" <?php checked( 1, $diver_firstview_bg_size_h ); ?> /><input type="number" name="diver_firstview_bg_size_h_custom" value="<?php echo $diver_firstview_bg_size_h_custom ?>" />％
        </label>
        </p>
        </td>
    </tr>

     <tr>
        <th scope="row"><label for="diver_firstview_bgcolor">背景カラー</label></th>
        <td><label><input type="text" name="diver_firstview_bgcolor" class="myColorPicker" value="<?php echo $diver_firstview_bgcolor ?>"></label></td>
    </tr>

    <tr>
        <th scope="row">スマホ画像設定</th>
        <td><p><label><input name="diver_firstview_fvimgsp" type="radio" value="pc" <?php checked( 'pc', $diver_firstview_fvimgsp ); ?>/>PCと同じ画像</label>　
        <label><input name="diver_firstview_fvimgsp" type="radio" value="sp" <?php checked( 'sp', $diver_firstview_fvimgsp ); ?> />個別設定</label>　
        <label><input name="diver_firstview_fvimgsp" type="radio" value="none" <?php checked( 'none', $diver_firstview_fvimgsp ); ?> />非表示</label>
        </p>
        </td>
    </tr>

    <tr>
        <th scope="row">スマホ時表示領域</th>
        <td><p><label><input name="diver_firstview_size_sp" type="radio" value="0" <?php checked( 0, $diver_firstview_size_sp ); ?>/>自動調整</label>　
                <label><input name="diver_firstview_size_sp" type="radio" value="1" <?php checked( 1, $diver_firstview_size_sp ); ?> />カスタマイズ：<input type="number" name="diver_firstview_size_custom_sp" value="<?php echo $diver_firstview_size_custom_sp ?>" />px
                </label>
                </p>
        </td>
    </tr>

    <tr class="diver_firstview_imgsp">
    <th scope="row"><label for="fvbgimgsp-uploader_img">画像:SP</label></th>
        <td>
        <?php $url = get_option('fvbgimgsp-uploader_img',get_theme_mod('header_image_sp')) ?>
            <div id="preview_fvbgimgsp">
                <?php if($url): ?>
                    <img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
                <?php endif; ?>
            </div>
            <input type="text" id="src_fvbgimgsp" name="fvbgimgsp-uploader_img" value="<?php echo $url; ?>" />
            <input class="button" type="button" name="mediauploadbtn" id="fvbgimgsp" value="画像を選択" />
            <input class="button" type="button" name="media-clear" id="fvbgimgsp" value="クリア" />
        </td>
    </tr>

    <tr  class="fv_image_bg diver_firstview_imgnone">
        <th scope="row"><label for="diver_firstview_imgbg">スマホ背景画像サイズ<span style="font-size:.8em;color:#888;"><br>推奨サイズ[横幅:自動調整,高さ:100%]</span></label></th>
        <td><p><label>【横幅】　<input name="diver_firstview_bg_size_w_sp" type="radio" value="0" <?php checked( 0, $diver_firstview_bg_size_w_sp ); ?>/>自動調整</label>　
        <label><input name="diver_firstview_bg_size_w_sp" type="radio" value="1" <?php checked( 1, $diver_firstview_bg_size_w_sp ); ?> /><input type="number" name="diver_firstview_bg_size_w_custom_sp" value="<?php echo $diver_firstview_bg_size_w_custom_sp ?>" />％
        </label>
        　</p>
        　<p><label>【高さ】　<input name="diver_firstview_bg_size_h_sp" type="radio" value="0" <?php checked( 0, $diver_firstview_bg_size_h_sp ); ?>/>自動調整</label>　
        <label><input name="diver_firstview_bg_size_h_sp" type="radio" value="1" <?php checked( 1, $diver_firstview_bg_size_h_sp ); ?> /><input type="number" name="diver_firstview_bg_size_h_custom_sp" value="<?php echo $diver_firstview_bg_size_h_custom_sp ?>" />％
        </label>
        </p>
        </td>
    </tr>


</table>
<script type="text/javascript">
jQuery(document).ready(function($) {


   if($("[name=diver_firstview_repeat]:checked").val()=='norepeat'){
        $('.fv_image_bg_size').show();
    }else{
        $('.fv_image_bg_size').hide();
    }

    $('input[name="diver_firstview_repeat"]:radio').on('change', function(){
        switch($(this).val()){
            case 'norepeat':
                $('.fv_image_bg_size').fadeIn('slow');
            break;
            default:
                $('.fv_image_bg_size').hide();
            break;
        }
    });

    if ($('#diver_firstview_imgbg').prop('checked')) {
        $('.fv_image_bg').show();
        $('.fv_image_nobg').hide();

        if($("[name=diver_firstview_repeat]:checked").val()=='norepeat'){
            $('.fv_image_bg_size').show();
        }

    } else {
        $('.fv_image_bg').hide();
        $('.fv_image_nobg').show();
        $('.fv_image_bg_size').hide();
    }

    $('#diver_firstview_imgbg').on('change', function () {
        if ($(this).prop('checked')) {
            $('.fv_image_bg').fadeIn();
            $('.fv_image_nobg').hide();

            if($("[name=diver_firstview_repeat]:checked").val()=='norepeat'){
                $('.fv_image_bg_size').fadeIn();
            }

        } else {
            $('.fv_image_bg').hide();
            $('.fv_image_nobg').fadeIn();
            $('.fv_image_bg_size').hide();
        }
    });

    if($("[name=diver_firstview_fvimgsp]:checked").val()=='sp'){
        $('.diver_firstview_imgsp').show();
    }else{
        $('.diver_firstview_imgsp').hide();
    }

    $('input[name="diver_firstview_fvimgsp"]:radio').on('change', function(){
        switch($(this).val()){
            case 'sp':
                $('.diver_firstview_imgsp').fadeIn('slow');
            break;
            default:
                $('.diver_firstview_imgsp').hide();
            break;
        }
    });

});
</script>

<!----------------------------------------------------

    スライダー

------------------------------------------------------>

<?php 
$diver_firstview_slider_size = get_option('diver_firstview_slider_size','big');
?>

<table id="diver_option_firstview_slider" class="form-table">
    <tr>
        <th scope="row">スライダーサイズ</th>
        <td><p>
        <label><input name="diver_firstview_slider_size" type="radio" value="small" <?php checked('small',$diver_firstview_slider_size); ?>/>小</label>　
        <label><input name="diver_firstview_slider_size" type="radio" value="medium" <?php checked('medium',$diver_firstview_slider_size); ?>/>中</label>　
        <label><input name="diver_firstview_slider_size" type="radio" value="big" <?php checked('big',$diver_firstview_slider_size); ?>/>大</label>
        </p></td>
    </tr>

</table>

<!----------------------------------------------------

    動画

------------------------------------------------------>

<?php
    $diver_firstview_mov_type = get_option('diver_firstview_mov_type','upload');
    $diver_firstview_mov_youtubeurl = get_option('diver_firstview_mov_youtubeurl');
    $diver_firstview_mov_uploadurl = get_option('fvmovie-uploader_img');
    $diver_firstview_mov_size = get_option('diver_firstview_mov_size','full');
    $diver_firstview_mov_size_custom = get_option('diver_firstview_mov_size_custom');
    $diver_firstview_mov_filter = get_option('diver_firstview_mov_filter','dark');
    $diver_firstview_mov_size_sp = get_option('diver_firstview_mov_size_sp','auto');
    $diver_firstview_mov_size_sp_custom = get_option('diver_firstview_mov_size_sp_custom',0);
?>

<table id="diver_option_firstview_mov" class="form-table">

    <tr>
        <th scope="row">動画タイプ</th>
        <td><p><label><input name="diver_firstview_mov_type" type="radio" value="upload" <?php checked( 'upload', $diver_firstview_mov_type ); ?>/>アップロード</label>　
        <label><input name="diver_firstview_mov_type" type="radio" value="youtube" <?php checked( 'youtube', $diver_firstview_mov_type ); ?> />Youtube動画</label>　
                </p>
        </td>
    </tr>

    <tr class="youtubeurl">
        <th scope="row">Youtube動画URL</th><td>
        <p>
        <label><input style="width:60%" type="text" name="diver_firstview_mov_youtubeurl" value="<?php echo $diver_firstview_mov_youtubeurl ?>" /></label>　
         </p>
        </td>
    </tr>

    <tr class="movupload">
    <th scope="row"><label for="fvmovie-uploader_img">動画アップロード</label></th>
        <td>
            <input style="width:60%" type="text" id="src_fvmovie" name="fvmovie-uploader_img" value="<?php echo $diver_firstview_mov_uploadurl; ?>" />
            <input class="button" type="button" name="movuploadbtn" id="fvmovie" value="動画を選択" />
            <input class="button" type="button" name="media-clear" id="fvmovie" value="クリア" />
        </td>
    </tr>

    <tr>
        <th scope="row">表示領域</th>
        <td><p><label><input name="diver_firstview_mov_size" type="radio" value="full" <?php checked( 'full', $diver_firstview_mov_size ); ?>/>全画面</label>　
        <label><input name="diver_firstview_mov_size" type="radio" value="auto" <?php checked( 'auto', $diver_firstview_mov_size ); ?>/>コンテンツに合わせる</label>　
                <label><input name="diver_firstview_mov_size" type="radio" value="custom" <?php checked( 'custom', $diver_firstview_mov_size ); ?> />カスタマイズ：<input type="number" name="diver_firstview_mov_size_custom" value="<?php echo $diver_firstview_mov_size_custom ?>" />px
                </label>
                </p>
        </td>
    </tr>

    <tr>
        <th scope="row">動画フィルター</th>
        <td><p><label><input name="diver_firstview_mov_filter" type="radio" value="none" <?php checked( 'none', $diver_firstview_mov_filter ); ?>/>なし</label>　
        <label><input name="diver_firstview_mov_filter" type="radio" value="dark" <?php checked( 'dark', $diver_firstview_mov_filter ); ?>/>暗く</label>　
        <label><input name="diver_firstview_mov_filter" type="radio" value="dot" <?php checked( 'dot', $diver_firstview_mov_filter ); ?> />ドット</label>　
        <label><input name="diver_firstview_mov_filter" type="radio" value="check" <?php checked( 'check', $diver_firstview_mov_filter ); ?> />チェック</label>　
                </p>
        </td>
    </tr>


    <tr>
    <th scope="row"><label for="fvmovbgimg-uploader_img">代替画像<br><span style="font-size: .8em;color:#999;">動画が読み込まれる前に表示されます。</span></label></th>
        <td>
        <?php $url = get_option('fvmovbgimg-uploader_img') ?>
            <div id="preview_fvmovbgimg">
                <?php if($url): ?>
                    <img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
                <?php endif; ?>
            </div>
            <input type="text" id="src_fvmovbgimg" name="fvmovbgimg-uploader_img" value="<?php echo $url; ?>" />
            <input class="button" type="button" name="mediauploadbtn" id="fvmovbgimg" value="画像を選択" />
            <input class="button" type="button" name="media-clear" id="fvmovbgimg" value="クリア" />
        </td>
    </tr>

    <tr>
        <th scope="row">スマホ表示領域</th>
        <td><p><label><input name="diver_firstview_mov_size_sp" type="radio" value="full" <?php checked( 'full', $diver_firstview_mov_size_sp ); ?>/>全画面</label>　
        <label><input name="diver_firstview_mov_size_sp" type="radio" value="auto" <?php checked( 'auto', $diver_firstview_mov_size_sp ); ?>/>コンテンツに合わせる</label>　
        <label><input name="diver_firstview_mov_size_sp" type="radio" value="custom" <?php checked( 'custom', $diver_firstview_mov_size_sp ); ?> />カスタマイズ：<input type="number" name="diver_firstview_mov_size_sp_custom" value="<?php echo $diver_firstview_mov_size_sp_custom ?>" />px</label>
                </p>
        </td>
    </tr>

</table>

<!----------------------------------------------------

    other

------------------------------------------------------>

<?php 
$diver_firstview_other_text = get_option('diver_firstview_other_text');
    $args = array(
        'wpautop'           => false,
        'media_buttons'     => true,
        'textarea_rows'     => 20,
        'editor_css'        => '',
        'indent'            => true,
        'teeny'             => false,
        'dfw'               => false,
        'quicktags'         => true,
        'drag_drop_upload'  => true
    );
?>

<table id="diver_option_firstview_other" class="form-table">
        <tr>
            <th scope="row"><label for="diver_firstview_other_text">カスタム（カスタム設定の時には、コンテンツは表示されません。
）</label></th>
            <td><?php wp_editor($diver_firstview_other_text, 'diver_firstview_other_text', $args); ?></td>
        </tr>
</table>


</div>
<?php submit_button(); ?>
</form>
</div>

<?php
if(isset($_POST['diver_option_firstview_content'])){
    update_option('diver_option_firstview_content', $_POST['diver_option_firstview_content']);
    update_option('fvcontentimg-uploader_img', wp_unslash($_POST['fvcontentimg-uploader_img']));
    update_option('diver_firstview_content_title', $_POST['diver_firstview_content_title']);
    update_option('diver_firstview_content_title_color', $_POST['diver_firstview_content_title_color']);
    update_option('diver_firstview_content_description', $_POST['diver_firstview_content_description']);
    update_option('diver_firstview_content_description_color', $_POST['diver_firstview_content_description_color']);
    update_option('diver_firstview_content_btntitle', $_POST['diver_firstview_content_btntitle']);
    update_option('diver_firstview_content_btnurl', $_POST['diver_firstview_content_btnurl']);
    update_option('diver_firstview_content_btnbg', $_POST['diver_firstview_content_btnbg']);
    update_option('diver_firstview_content_btncolor', $_POST['diver_firstview_content_btncolor']);
    update_option('diver_firstview_inner_contents', wp_unslash($_POST['diver_firstview_inner_contents']));
    update_option('diver_firstview_inner_contents_color', $_POST['diver_firstview_inner_contents_color']);

}
    $diver_option_firstview_content = get_option('diver_option_firstview_content',0);
    $diver_firstview_content_title = get_option('diver_firstview_content_title',get_theme_mod('header_background_title'));
    $diver_firstview_content_title_color = get_option('diver_firstview_content_title_color','#333');
    $diver_firstview_content_description = get_option('diver_firstview_content_description',get_theme_mod('header_background_text'));
    $diver_firstview_content_description_color = get_option('diver_firstview_content_description_color','#333');
    $diver_firstview_content_btntitle = get_option('diver_firstview_content_btntitle',get_theme_mod('header_background_btntext'));
    $diver_firstview_content_btnurl = get_option('diver_firstview_content_btnurl',get_theme_mod('header_background_btnlink'));
    $diver_firstview_content_btnbg = get_option('diver_firstview_content_btnbg','#0085ba');
    $diver_firstview_content_btncolor = get_option('diver_firstview_content_btncolor','#fff');
    $diver_firstview_inner_contents = get_option('diver_firstview_inner_contents');
    $diver_firstview_inner_contents_color = get_option('diver_firstview_inner_contents_color','#fff');

?>

<h2 class="diver_option_title">コンテンツ設定</h2>
<div class="diver_option_wrap">
<form method="post" action="">
<table class="form-table">
    <tr>
        <th scope="row">ファーストビューコンテンツ</th>
        <td><p>
        <label><input name="diver_option_firstview_content" type="radio" value="0" <?php checked(0,$diver_option_firstview_content); ?>/>なし</label>
        <input name="diver_option_firstview_content" type="radio" value="1" <?php checked(1,$diver_option_firstview_content); ?>/>テンプレート</label>　
        <label><input name="diver_option_firstview_content" type="radio" value="2" <?php checked(2,$diver_option_firstview_content); ?>/>カスタム</label>
        </p></td>
    </tr>
</table>
<div class="firstview_area">

<!----------------- テンプレート ---------------------->

    <table id="diver_option_firstview_content_temp" class="form-table">

        <tr>
            <th scope="row"><label for="fvcontentimg-uploader_img">画像</label></th>
            <td>
            <?php $url = get_option('fvcontentimg-uploader_img',get_theme_mod('header_background_icon')) ?>
                <div id="preview_fvcontentimg">
                    <?php if($url): ?>
                        <img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
                    <?php endif; ?>
                </div>
                <input type="text" id="src_fvcontentimg" name="fvcontentimg-uploader_img" value="<?php echo $url; ?>" />
                <input class="button" type="button" name="mediauploadbtn" id="fvcontentimg" value="画像を選択" />
                <input class="button" type="button" name="media-clear" id="fvcontentimg" value="クリア" /><br><br>
            </td>
        </tr>

        <tr>
            <th>タイトル</th>
            <td>
                <input type="text" name="diver_firstview_content_title" value="<?php echo $diver_firstview_content_title ?>" style="width:50%"/>
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="diver_firstview_content_title_color">タイトル文字色</label></th>
            <td><label><input type="text" name="diver_firstview_content_title_color" class="myColorPicker" value="<?php echo $diver_firstview_content_title_color ?>"></label></td>
        </tr>

        <tr>
            <th>説明文</th>
            <td>
                <textarea name="diver_firstview_content_description" style="width:80%;min-height:100px;"><?php echo $diver_firstview_content_description ?></textarea>
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="diver_firstview_content_description_color">説明文文字色</label></th>
            <td><label><input type="text" name="diver_firstview_content_description_color" class="myColorPicker" value="<?php echo $diver_firstview_content_description_color ?>"></label></td>
        </tr>

        <tr>
            <th>ボタンタイトル</th>
            <td>
                <input type="text" name="diver_firstview_content_btntitle" value="<?php echo $diver_firstview_content_btntitle ?>" style="width:30%"/>
            </td>
        </tr>

        <tr>
            <th>ボタンリンク先</th>
            <td>
                <input type="text" name="diver_firstview_content_btnurl" value="<?php echo $diver_firstview_content_btnurl ?>" style="width:50%"/>
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="diver_firstview_content_btnbg">ボタン背景カラー</label></th>
            <td><label><input type="text" name="diver_firstview_content_btnbg" class="myColorPicker" value="<?php echo $diver_firstview_content_btnbg ?>"></label></td>
        </tr>

        <tr>
            <th scope="row"><label for="diver_firstview_content_btncolor">ボタンテキストカラー</label></th>
            <td><label><input type="text" name="diver_firstview_content_btncolor" class="myColorPicker" value="<?php echo $diver_firstview_content_btncolor ?>"></label></td>
        </tr>
    </table>


<!----------------- カスタム ---------------------->
<?php
    $args = array(
        'wpautop'           => false,
        'media_buttons'     => true,
        'textarea_rows'     => 20,
        'editor_css'        => '',
        'indent'            => true,
        'teeny'             => false,
        'dfw'               => false,
        'quicktags'         => true,
        'drag_drop_upload'  => true
    );

?>

    <table id="diver_option_firstview_editor" class="form-table">
        <tr>
            <th scope="row"><label for="diver_firstview_inner_contents">インナーコンテンツ</label></th>
            <td><?php wp_editor($diver_firstview_inner_contents, 'diver_firstview_inner_contents', $args); ?></td>
        </tr>
        <tr>
            <th scope="row"><label for="diver_firstview_inner_contents_color">基本文字色</label></th>
            <td><label><input type="text" name="diver_firstview_inner_contents_color" class="myColorPicker" value="<?php echo $diver_firstview_inner_contents_color ?>"></label></td>
        </tr>
    </table>
</div>
<?php submit_button(); ?>
</form>
</div>

<script type="text/javascript" language="javascript">
jQuery(document).ready(function($) {

    switch($("[name=diver_firstview_mov_type]:checked").val()){
        case 'upload':
            $('.movupload').show();
        break;
        case 'youtube':
            $('.youtubeurl').show();
        break;
    }

    $('input[name="diver_firstview_mov_type"]:radio').on('change', function(){
        switch($(this).val()){
            case 'upload':
                $('.movupload').fadeIn('slow');
                $('.youtubeurl').hide();
            break;
            case 'youtube':
                $('.youtubeurl').fadeIn('slow');
                $('.movupload').hide();
            break;
        }
    });


    switch($("[name=diver_option_firstview]:checked").val()){
            case '1':
                $('#diver_option_firstview_simple').show();
                break;
            case '2':
                $('#diver_option_firstview_slider').show();
                break;
            case '3':
                $('#diver_option_firstview_img').show();
                break;
            case '4':
                $('#diver_option_firstview_mov').show();
                break;
            case '5':
                $('#diver_option_firstview_other').show();
                break;
    }

    $('input[name="diver_option_firstview"]:radio').on('change', function(){
        switch($(this).val()){
            case '0':
                $('#diver_option_firstview_simple').hide();
                $('#diver_option_firstview_slider').hide();
                $('#diver_option_firstview_img').hide();
                $('#diver_option_firstview_mov').hide();
                $('#diver_option_firstview_other').hide();
                break;
            case '1':
                $('#diver_option_firstview_simple').fadeIn('slow');
                $('#diver_option_firstview_slider').hide();
                $('#diver_option_firstview_img').hide();
                $('#diver_option_firstview_mov').hide();
                $('#diver_option_firstview_other').hide();
                break;
            case '2':
                $('#diver_option_firstview_simple').hide();
                $('#diver_option_firstview_slider').fadeIn('slow');
                $('#diver_option_firstview_img').hide();
                $('#diver_option_firstview_mov').hide();
                $('#diver_option_firstview_other').hide();
                break;
            case '3':
                $('#diver_option_firstview_simple').hide();
                $('#diver_option_firstview_slider').hide();
                $('#diver_option_firstview_img').fadeIn('slow');
                $('#diver_option_firstview_mov').hide();
                $('#diver_option_firstview_other').hide();
                break;
            case '4':
                $('#diver_option_firstview_simple').hide();
                $('#diver_option_firstview_slider').hide();
                $('#diver_option_firstview_img').hide();
                $('#diver_option_firstview_mov').fadeIn('slow');
                $('#diver_option_firstview_other').hide();
                break;
            case '5':
                $('#diver_option_firstview_simple').hide();
                $('#diver_option_firstview_slider').hide();
                $('#diver_option_firstview_img').hide();
                $('#diver_option_firstview_mov').hide();
                $('#diver_option_firstview_other').fadeIn('slow');
                break;
        }
    });

    switch($("[name=diver_option_firstview_content]:checked").val()){
        case '1':
            $('#diver_option_firstview_content_temp').show();
            break;
        case '2':
            $('#diver_option_firstview_editor').show();
            break;
    } 


    $('input[name="diver_option_firstview_content"]:radio').on('change',function(){
        switch($(this).val()){
        case '1':
            $('#diver_option_firstview_content_temp').fadeIn('slow');
            $('#diver_option_firstview_editor').hide();
            break;
        case '2':
            $('#diver_option_firstview_content_temp').hide()
            $('#diver_option_firstview_editor').fadeIn('slow');
            break;
        }
    });
});
</script>