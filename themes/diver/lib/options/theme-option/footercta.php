<style>
#mediapreview{
	max-width:300px;
	max-height:300px;
}
</style>
<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diver_option_footer_cta_title'])) {
        update_option('diver_option_footer_cta_title', wp_unslash($_POST['diver_option_footer_cta_title']));
        update_option('diver_option_footer_cta_txt', wp_unslash($_POST['diver_option_footer_cta_txt']));
        update_option('fctaimg-uploader_img', wp_unslash($_POST['fctaimg-uploader_img']));
        update_option('diver_footercta_bgcolor', $_POST['diver_footercta_bgcolor']);
        update_option('diver_footercta_bgalpha', $_POST['diver_footercta_bgalpha']);
        update_option('diver_footercta_text', $_POST['diver_footercta_text']);
        update_option('diver_option_footer_cta_url', $_POST['diver_option_footer_cta_url']);
        update_option('diver_option_footer_cta_view', $_POST['diver_option_footer_cta_view']);

        $diver_option_footer_cta_target = isset($_POST['diver_option_footer_cta_target']) ? 1 : 0;
        update_option('diver_option_footer_cta_target', $diver_option_footer_cta_target);

        $diver_option_footer_cta_nofollow = isset($_POST['diver_option_footer_cta_nofollow']) ? 1 : 0;
        update_option('diver_option_footer_cta_nofollow', $diver_option_footer_cta_nofollow);
        // update_option('fctaimgsp-uploader_img', wp_unslash($_POST['fctaimg-uploader_img']));
        // update_option('diver_footercta_sp', wp_unslash($_POST['diver_footercta_sp']));
        // update_option('diver_option_footer_cta_urlsp', $_POST['diver_option_footer_cta_urlsp']);
    }

    $diver_footercta_sp = get_option( 'diver_footercta_sp','pc');
    $diver_option_footer_cta_view = get_option( 'diver_option_footer_cta_view','all');

?>
<h1 class="diver_option_header">フッターCTA</h1>
<div class="diver_option_desc">フッターCTA・フッター広告を設定します。</div>


<div class="diver_option_wrap">
<?php
    // 更新完了を通知
    if (isset($_POST['diver_option_footer_cta_title'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<form method="post" action="">
<table class="form-table">

    <tr>
        <th scope="row">タイトル</th>
        <td>
        <label><input type="text" style="width: 80%" name="diver_option_footer_cta_title" value="<?php echo get_option( 'diver_option_footer_cta_title') ?>" /></label>
        </td>
    </tr>

    <tr>
        <th scope="row">テキスト</th>
        <td>
        <label><textarea style="width: 500px;height:100px;" name="diver_option_footer_cta_txt"><?php echo get_option( 'diver_option_footer_cta_txt' ) ?></textarea></label>
        </td>
    </tr>

    <tr>
    <th scope="row"><label for="fctaimg-uploader_img">画像<br>(推奨サイズ:728×90)</label></th>
        <td>
        <?php $url = get_option('fctaimg-uploader_img') ?>
            <div id="preview_fctaimg">
                <?php if($url): ?>
                    <img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
                <?php endif; ?>
            </div>
            <input type="text" id="src_fctaimg" name="fctaimg-uploader_img" value="<?php echo $url; ?>" />
            <input class="button" type="button" name="mediauploadbtn" id="fctaimg" value="画像を選択" />
            <input class="button" type="button" name="media-clear" id="fctaimg" value="クリア" />
        </td>
    </tr>

    <tr>
        <th scope="row"><label for="diver_footercta_bgcolor">背景カラー</label></th>
        <td><label><input type="text" name="diver_footercta_bgcolor" class="myColorPicker" value="<?php echo get_option( 'diver_footercta_bgcolor','#333') ?>"></label></td>
    </tr>

    <tr>
        <th scope="row"><label for="diver_footercta_bgalpha">背景透明度</label></th>
        <td><label><input type="number" min="0" max="1" step="0.1" name="diver_footercta_bgalpha" value="<?php echo get_option( 'diver_footercta_bgalpha','0.4') ?>"></label></td>
    </tr>

    <tr>
        <th scope="row"><label for="diver_footercta_text">テキストカラー</label></th>
        <td><label><input type="text" name="diver_footercta_text" class="myColorPicker" value="<?php echo get_option( 'diver_footercta_text','#fff') ?>"></label></td>
    </tr>

    <tr>
        <th scope="row">リンク先URL</th>
        <td>
        <label><input type="text" style="width: 500px;" name="diver_option_footer_cta_url" value="<?php echo get_option( 'diver_option_footer_cta_url' ) ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">リンク先オプション</th>
        <td>
        <label><input type="checkbox" name="diver_option_footer_cta_target"  value="1" <?php checked( 1, get_option('diver_option_footer_cta_target',1)); ?> /> 別タブで開く　</label>
        <label><input type="checkbox" name="diver_option_footer_cta_nofollow" value="1" <?php checked( 1, get_option('diver_option_footer_cta_nofollow',1)); ?> /> rel="nofollow"</label>
        </td>
    </tr>

    <tr>
        <th scope="row">表示設定</th>
        <td>
            <label><input name="diver_option_footer_cta_view" type="radio" value="all" <?php checked('all',$diver_option_footer_cta_view); ?>/>全ページ</label>　
            <label><input name="diver_option_footer_cta_view" type="radio" value="top" <?php checked('top',$diver_option_footer_cta_view); ?>/>トップページのみ</label>　
            <label><input name="diver_option_footer_cta_view" type="radio" value="single" <?php checked('single',$diver_option_footer_cta_view); ?>/>投稿ページのみ</label>
        </td>
    </tr> 

    <div class="diver_option_aside"><i class="fa fa-info-circle" aria-hidden="true"></i>　現バージョンではPCのみに表示されます。</div>
<!--     <tr>
        <th scope="row"><label for="diver_footercta_sp">スマホ表示</label></th>
        <td>
            <label><input name="diver_footercta_sp" type="radio" value="pc" <?php checked('pc',$diver_footercta_sp); ?>/>PCと同じ</label>　
            <label><input name="diver_footercta_sp" type="radio" value="sp" <?php checked('sp',$diver_footercta_sp); ?>/>別で設定</label>　
            <label><input name="diver_footercta_sp" type="radio" value="no" <?php checked('no',$diver_footercta_sp); ?>/>非表示</label>　
        </td>
    </tr>

    <tr class="footercta_sp">
        <th scope="row"><label for="fctaimgsp-uploader_img">スマホ画像<br>(推奨サイズ:728×90)</label></th>
        <td>
        <?php $url = get_option('fctaimgsp-uploader_img') ?>
            <div id="preview_fctaimgsp">
                <?php if($url): ?>
                    <img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
                <?php endif; ?>
            </div>
            <input type="text" id="src_fctaimgsp" name="fctaimgsp-uploader_img" value="<?php echo $url; ?>" />
            <input class="button" type="button" name="mediauploadbtn" id="fctaimgsp" value="画像を選択" />
            <input class="button" type="button" name="media-clear" id="fctaimgsp" value="クリア" />
        </td>
    </tr>

    <tr class="footercta_sp">
        <th scope="row">スマホリンク先URL</th>
        <td>
        <label><input type="text" style="width: 500px;" name="diver_option_footer_cta_urlsp" value="<?php echo get_option( 'diver_option_footer_cta_urlsp' ) ?>"></label>
        </td>
    </tr> -->


</table>
<?php submit_button(); ?>
</form>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {

    if($("[name=diver_footercta_sp]:checked").val()=='sp'){
        $('.footercta_sp').show();
    }else{
        $('.footercta_sp').hide();
    }

    $('input[name="diver_footercta_sp"]:radio').on('change', function(){
        switch($(this).val()){
            case 'sp':
                $('.footercta_sp').fadeIn('slow');
            break;
            default:
                $('.footercta_sp').hide();
            break;
        }
    });

});
</script>