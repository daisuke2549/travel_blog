<style>
#mediapreview{
    max-width:250px;
    max-height:250px;
}
</style>
<?php
    // 更新完了を通知
    if (isset($_POST['diverogpsetting'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diverogpsetting'])) {
        $diver_ogpsetting = isset($_POST['diver_ogpsetting'])? 1 : 0 ;
        update_option('diver_ogpsetting', $diver_ogpsetting);

        update_option('diver_ogp_title',wp_unslash($_POST['diver_ogp_title']));
        update_option('diver_ogp_description', wp_unslash($_POST['diver_ogp_description']));
        update_option('ogpmainimg-uploader_img', wp_unslash($_POST['ogpmainimg-uploader_img']));
    }
    $diver_ogpsetting = get_option('diver_ogpsetting','1');
    $diver_ogp_title = get_option('diver_ogp_title',get_option('diver_seo_title',get_bloginfo('name')));
    $diver_ogp_description = get_option('diver_ogp_description',get_option('diver_seo_description',get_bloginfo( 'description' )));

?>
<h1 class="diver_option_header">OGP設定</h1>
<div class="diver_option_desc">
    OGPに関する設定を行います。プラグイン等での二重設定に注意してください。
</div>

<h2 class="diver_option_title">基本設定</h2>
<div class="diver_option_wrap">

<form method="post" action="">
<input type="hidden" name="diverogpsetting">
<table class="form-table">

    <tr>
        <th scope="row">Diver OGP設定を有効にする</th>
        <td><label><input name="diver_ogpsetting" type="checkbox" id="diver_ogpsetting" value="1" <?php checked( 1, get_option('diver_ogpsetting',1)); ?> /></label>　　
        </td>
    </tr>

    <tr class="ogp_on">
        <th scope="row">サイトタイトル</th>
        <td><label><input name="diver_ogp_title" type="text" id="diver_ogp_title" style="width:80%;" value="<?php echo $diver_ogp_title ?>"/></label>　　
        </td>
    </tr>

    <tr class="ogp_on">
        <th scope="row">サイト説明</th>
        <td><label><textarea name="diver_ogp_description" id="diver_ogp_description" style="width:100%;height:100px;"><?php echo $diver_ogp_description ?></textarea></label>　　
        </td>
    </tr>


    <tr class="ogp_on">
    <th scope="row"><label for="ogpmainimg-uploader_img">サイトメイン画像<div style="font-size:.9em;color: #777">推奨サイズ:1200×630<br>最低サイズ:600×315</div></label></th>
        <td>
        <?php $url = get_option('ogpmainimg-uploader_img',get_theme_mod('header_image')) ?>
            <div id="preview_ogpmainimg">
                <?php if($url): ?>
                    <img src="<?php echo $url ?>" style="max-width:100%;max-height:300px;">
                <?php endif; ?>
            </div>
            <input type="text" id="src_ogpmainimg" name="ogpmainimg-uploader_img" value="<?php echo $url; ?>" />
            <input class="button" type="button" name="mediauploadbtn" id="ogpmainimg" value="画像を選択" />
            <input class="button" type="button" name="ogpmainimg-clear" id="ogpmainimg" value="クリア" />
        </td>
    </tr>

</table>
<?php submit_button(); ?>
</form>
</div>


<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diverogpfbsetting'])) {
        update_option('diver_ogp_fb_adminid',wp_unslash($_POST['diver_ogp_fb_adminid']));
        update_option('diver_ogp_fb_appid', wp_unslash($_POST['diver_ogp_fb_appid']));
        update_option('diver_ogp_fb_page_url', wp_unslash($_POST['diver_ogp_fb_page_url']));
    }
    $diver_ogp_fb_adminid = get_option('diver_ogp_fb_adminid');
    $diver_ogp_fb_appid = get_option('diver_ogp_fb_appid');
    $diver_ogp_fb_page_url = get_option('diver_ogp_fb_page_url');

?>
<h2 class="diver_option_title ogp_on">Facebook設定</h2>
<div class="diver_option_wrap ogp_on">

<form method="post" action="">
<input type="hidden" name="diverogpfbsetting">
<table class="form-table">

    <tr>
        <th scope="row">FacebookページURL</th>
        <td><label><input name="diver_ogp_fb_page_url" type="text" id="diver_ogp_fb_page_url" style="width:40%;" value="<?php echo $diver_ogp_fb_page_url ?>"/></label>　　
        </td>
    </tr>


    <tr>
        <th scope="row">Facebook管理者ID</th>
        <td><label><input name="diver_ogp_fb_adminid" type="text" id="diver_ogp_fb_adminid" style="width:40%;" value="<?php echo $diver_ogp_fb_adminid ?>"/></label>　　
        </td>
    </tr>

    <tr>
        <th scope="row">Facebook App id</th>
        <td><label><input name="diver_ogp_fb_appid" type="text" id="diver_ogp_fb_appid" style="width:40%;" value="<?php echo $diver_ogp_fb_appid ?>"/></label>　　
        </td>
    </tr>

</table>
<?php submit_button(); ?>
</form>
</div>



<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diverogptwsetting'])) {
        update_option('diver_ogp_tw_style',wp_unslash($_POST['diver_ogp_tw_style']));
        update_option('diver_ogp_tw_id', wp_unslash($_POST['diver_ogp_tw_id']));
    }
    $diver_ogp_tw_style = get_option('diver_ogp_tw_style','summary_large_image');
    $diver_ogp_tw_id = get_option('diver_ogp_tw_id');

?>
<h2 class="diver_option_title ogp_on">Twitter設定</h2>
<div class="diver_option_wrap ogp_on">

<form method="post" action="">
<input type="hidden" name="diverogptwsetting">
<table class="form-table">

     <tr>
        <th scope="row"><label for="diver_ogp_tw_style">表示スタイル</label></th>
        <td>
            <select name="diver_ogp_tw_style" id="diver_ogp_tw_style">
                <option value="summary" <?php selected('summary',$diver_ogp_tw_style); ?> >summary</option>
                <option value="summary_large_image" <?php selected('summary_large_image',$diver_ogp_tw_style); ?> >summary_large_image</option>
                <option value="photo" <?php selected('photo',$diver_ogp_tw_style); ?> >photo</option>
                <option value="gallery" <?php selected('gallery',$diver_ogp_tw_style); ?> >gallery</option>
                <option value="app" <?php selected('app',$diver_ogp_tw_style); ?> >app</option>
                <option value="product" <?php selected('product',$diver_ogp_tw_style); ?> >product</option>
            </select>
        </td>
    </tr>

    <tr>
        <th scope="row">Twitterアカウント</th>
        <td><label>＠<input name="diver_ogp_tw_id" type="text" id="diver_ogp_tw_id" style="width:40%;" value="<?php echo $diver_ogp_tw_id ?>"/></label>　　
        </td>
    </tr>
</table>
<?php submit_button(); ?>
</form>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {

        if ($('#diver_ogpsetting').prop('checked')) {
            $('.ogp_on').show();
        } else {
            $('.ogp_on').hide();
        }
            
        $('input[name="diver_ogpsetting"]').change(function() {
            if ($(this).prop('checked')) {
                $('.ogp_on').show();
            } else {
                $('.ogp_on').hide();
            }
        });
    });
</script>