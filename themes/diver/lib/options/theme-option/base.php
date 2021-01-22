<style>
#mediapreview,#preview_thumbreplaceimg{
    max-width:300px;
    max-height:300px;
}

.sample-accordion {
  min-width: 300px;
  margin: 0 auto;
  padding: 0;
box-shadow: 0 0 5px rgba(0,0,0,0.2);
}
.sample-accordion .ac-content {
  margin: 0;
  padding: 0;
}
.sample-accordion input {
  display: none;
}
.sample-accordion .accordion_label {
    display: block;
    cursor: pointer;
    padding: 10px 1em;
    background: #f9f9f9;
    box-sizing: border-box;
}
.sample-accordion .accordion_label i{
    margin-left: .5em;
}
.sample-accordion .accordion_label:hover {
  background: #eee;
}
.sample-accordion .ac-cont {
  transition: 0.2s;
  height: 0;
  overflow: hidden;
    padding: 0 10px;
  box-sizing: border-box;
}

.sample-accordion .ac-cont .col{
    width: 49%;
    display: inline-block;
}

.sample-accordion input:checked + .ac-cont {
  height: auto;
  padding: 10px;
  box-sizing: border-box;
}

input[name="key_delete"],input[name="diver_analytics_api_key"] {
    background: #ffffff;
    cursor: pointer;
    border-radius: 3px;
    font-size: .8em;
}
input.diver_analytics_set + input{display: none;}
input.diver_analytics_set:checked + input{display: inline-block;}

</style>
<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diver_option_base_loop_notin'])) {
        update_option('diver_option_base_loop_notin', wp_unslash($_POST['diver_option_base_loop_notin']));
        update_option('diver_option_base_tabwidget', wp_unslash($_POST['diver_option_base_tabwidget']));
        update_option('diver_option_base_main_thumbnail', $_POST['diver_option_base_main_thumbnail']);
        update_option('diver_option_base_main_thumbnail_sp', $_POST['diver_option_base_main_thumbnail_sp']);

        update_option('diver_option_base_footer_credit', wp_unslash($_POST['diver_option_base_footer_credit']));
        update_option('thumbreplaceimg-uploader_img', wp_unslash($_POST['thumbreplaceimg-uploader_img']));

        $diver_option_base_replace_thumbnail = isset($_POST['diver_option_base_replace_thumbnail']) ? 1 : 0;
        update_option('diver_option_base_replace_thumbnail', $diver_option_base_replace_thumbnail);

        $diver_option_base_main_search_page = isset($_POST['diver_option_base_main_search_page']) ? 1 : 0;
        update_option('diver_option_base_main_search_page', $diver_option_base_main_search_page);

        $diver_basesettings_lazyload_on = isset($_POST['diver_basesettings_lazyload_on']) ? 1 : 0;
        update_option('diver_basesettings_lazyload_on', $diver_basesettings_lazyload_on);

    }

    if (isset($_POST['diver_option_analytics_type'])) {

        update_option('diver_option_analytics_type', wp_unslash($_POST['diver_option_analytics_type']));
        update_option('diver_option_base_gaid', wp_unslash($_POST['diver_option_base_gaid']));
        update_option('diver_option_base_gtag', wp_unslash($_POST['diver_option_base_gtag']));

        $diver_option_base_gaid_admin = isset($_POST['diver_option_base_gaid_admin']) ? 1 : 0;
        update_option('diver_option_base_gaid_admin', $diver_option_base_gaid_admin);

        update_option('diver_analytics_api_viewID', wp_unslash($_POST['diver_analytics_api_viewID']));
    }

    if (isset($_FILES['diver_analytics_api_key'])) {

        require_once( ABSPATH . 'wp-admin/includes/file.php' );

        $uploadedfile = $_FILES['diver_analytics_api_key'];
        $upload_overrides = array( 'test_form' => false );

        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
        if ( $movefile ) {
            echo "キーファイルのアップロードに成功しました。";

            update_option('diver_analytics_api_key_url', wp_unslash($movefile));

        } else {
            echo "キーファイルのアップロードに失敗しました。";
        }

    }

    if(isset($_POST['key_delete'])){
        $file = get_option('diver_analytics_api_key_url');
        
        delete_option('diver_analytics_api_key_url');

    }

    if(isset($_POST['analytics_reset'])){
        delete_option('diver_analytics_all_date');
        delete_option('diver_analytics_month_date');
        delete_option('diver_analytics_week_date');
        delete_option('diver_analytics_day_date');

        delete_option('diver_analytics_all_time');
        delete_option('diver_analytics_month_time');
        delete_option('diver_analytics_week_time');
        delete_option('diver_analytics_day_time');

    }
    
    if (isset($_POST['diver_option_base_gawm'])) {
        
        update_option('diver_option_base_gawm', $_POST['diver_option_base_gawm']);
        update_option('diver_option_base_ana_head', wp_unslash($_POST['diver_option_base_ana_head']));
        update_option('diver_option_base_ana_body', wp_unslash($_POST['diver_option_base_ana_body']));
        update_option('diver_option_base_amp_head', wp_unslash($_POST['diver_option_base_amp_head']));
        update_option('diver_option_base_amp_body', wp_unslash($_POST['diver_option_base_amp_body']));
    }

    if (isset($_POST['diver_option_base_ad_client'])) {
        update_option('diver_option_base_ad_client', wp_unslash($_POST['diver_option_base_ad_client']));
        update_option('diver_option_base_ad_slot', $_POST['diver_option_base_ad_slot']);

        update_option('diver_option_base_ad_posttop', $_POST['diver_option_base_ad_posttop']);
        update_option('diver_option_base_ad_postbottom', $_POST['diver_option_base_ad_postbottom']);
        update_option('diver_option_base_ad_posth2',$_POST['diver_option_base_ad_posth2']);
        update_option('diver_option_base_ad_posth2_2', $_POST['diver_option_base_ad_posth2_2']);
        update_option('diver_option_base_ad_posth2_3', $_POST['diver_option_base_ad_posth2_3']);
        update_option('diver_option_base_ad_more', $_POST['diver_option_base_ad_more']);

        $diver_option_base_ad_amptop = isset($_POST['diver_option_base_ad_amptop']) ? 1 : 0;
        update_option('diver_option_base_ad_amptop', $diver_option_base_ad_amptop);

        $diver_option_base_ad_ampbottom = isset($_POST['diver_option_base_ad_ampbottom']) ? 1 : 0;
        update_option('diver_option_base_ad_ampbottom', $diver_option_base_ad_ampbottom);

        $diver_option_base_ad_amph2 = isset($_POST['diver_option_base_ad_amph2']) ? 1 : 0;
        update_option('diver_option_base_ad_amph2', $diver_option_base_ad_amph2);

        $diver_option_base_ad_amph2_2 = isset($_POST['diver_option_base_ad_amph2_2']) ? 1 : 0;
        update_option('diver_option_base_ad_amph2_2', $diver_option_base_ad_amph2_2);

        $diver_option_base_ad_amph2_3 = isset($_POST['diver_option_base_ad_amph2_3']) ? 1 : 0;
        update_option('diver_option_base_ad_amph2_3', $diver_option_base_ad_amph2_3);

        $diver_option_base_ad_text = isset($_POST['diver_option_base_ad_text']) ? 1 : 0;
        update_option('diver_option_base_ad_text', $diver_option_base_ad_text);

        update_option('diver_option_base_ad_infeed', wp_unslash($_POST['diver_option_base_ad_infeed']));
        update_option('diver_option_base_ad_infeedtag-list', wp_unslash($_POST['diver_option_base_ad_infeedtag-list']));
        update_option('diver_option_base_ad_infeedtag-grid', wp_unslash($_POST['diver_option_base_ad_infeedtag-grid']));
        update_option('diver_option_base_ad_infeedtag-minilist', wp_unslash($_POST['diver_option_base_ad_infeedtag-minilist']));
        update_option('diver_option_base_ad_infeedtag-mobile', wp_unslash($_POST['diver_option_base_ad_infeedtag-mobile']));

        update_option('diver_option_base_ad_posttop_custom', wp_unslash($_POST['diver_option_base_ad_posttop_custom']));
        update_option('diver_option_base_ad_posth2_custom', wp_unslash($_POST['diver_option_base_ad_posth2_custom']));
        update_option('diver_option_base_ad_posth2_2_custom', wp_unslash($_POST['diver_option_base_ad_posth2_2_custom']));
        update_option('diver_option_base_ad_posth2_3_custom', wp_unslash($_POST['diver_option_base_ad_posth2_3_custom']));
        update_option('diver_option_base_ad_postbottom_custom', wp_unslash($_POST['diver_option_base_ad_postbottom_custom']));
        update_option('diver_option_base_ad_more_custom', wp_unslash($_POST['diver_option_base_ad_more_custom']));

        update_option('diver_option_base_ad_amptop_custom', wp_unslash($_POST['diver_option_base_ad_amptop_custom']));
        update_option('diver_option_base_ad_amph2_custom', wp_unslash($_POST['diver_option_base_ad_amph2_custom']));
        update_option('diver_option_base_ad_amph2_2_custom', wp_unslash($_POST['diver_option_base_ad_amph2_2_custom']));
        update_option('diver_option_base_ad_amph2_3_custom', wp_unslash($_POST['diver_option_base_ad_amph2_3_custom']));
        update_option('diver_option_base_ad_ampbottom_custom', wp_unslash($_POST['diver_option_base_ad_ampbottom_custom']));
    }

    $mainthumb = get_option('diver_option_base_main_thumbnail','medium');
    $mainthumb_sp = get_option('diver_option_base_main_thumbnail_sp','thumbnail');

?>
<h1 class="diver_option_header">基本設定</h1>
<div class="diver_option_desc">サイト全体の設定を行います。</div>

<h2 class="diver_option_title">メイン設定</h2>
<div class="diver_option_wrap">
<form method="post" action="">
<table class="form-table">

    <tr>
        <th scope="row">記事一覧除外カテゴリーID</th>
        <td>
        <label><input type="text" name="diver_option_base_loop_notin" value="<?php echo get_option( 'diver_option_base_loop_notin') ?>" /> (複数ある場合には、カンマ区切りで記入してください。)</label>
        </td>
    </tr>

    <tr>
        <th scope="row">記事一覧サムネイルサイズ（PC）</th>
        <td><label>
        <select name="diver_option_base_main_thumbnail">
            <option <?php echo $mainthumb != 'thumbnail' ?'': 'selected' ?> value="thumbnail">サムネイル</option>
            <option <?php echo $mainthumb != 'medium' ?'': 'selected' ?> value="medium">中サイズ</option>
            <option <?php echo $mainthumb != 'large' ?'': 'selected' ?> value="large">大サイズ</option>
            <option <?php echo $mainthumb != 'full' ?'': 'selected' ?> value="full">フルサイズ</option>
        </select>
        </label>
        </td>
    </tr>

    <tr>
        <th scope="row">記事一覧サムネイルサイズ（SP）</th>
        <td><label>
        <select name="diver_option_base_main_thumbnail_sp">
            <option <?php echo $mainthumb_sp != 'thumbnail' ?'': 'selected' ?> value="thumbnail">サムネイル</option>
            <option <?php echo $mainthumb_sp != 'medium' ?'': 'selected' ?> value="medium">中サイズ</option>
            <option <?php echo $mainthumb_sp != 'large' ?'': 'selected' ?> value="large">大サイズ</option>
            <option <?php echo $mainthumb_sp != 'full' ?'': 'selected' ?> value="full">フルサイズ</option>
        </select>
        </label>
        </td>
    </tr>


    <tr>
        <th scope="row"><label>サムネイル代替画像<br><span style="font-size: .8em;color: #777;">（アイキャッチ画像を設定していない時）</span></label></th>
        <td><label><input name="diver_option_base_replace_thumbnail" type="checkbox" id="diver_option_base_replace_thumbnail" value="1" <?php checked( 1, get_option('diver_option_base_replace_thumbnail',1)); ?> />投稿内の先頭画像をサムネイルに設定する</label>
        </td>    
    </tr>
    <tr>    
        <th scope="row"></th>
        <td>
        代替画像
        <?php $thumbreplaceimg_url = get_option('thumbreplaceimg-uploader_img',get_template_directory_uri().'/images/noimage.gif'); ?>
            <div id="preview_thumbreplaceimg">
                <?php if($thumbreplaceimg_url): ?>
                    <img src="<?php echo $thumbreplaceimg_url ?>" style="max-width:100%;max-height:300px;">
                <?php endif; ?>
            </div>
            <input type="text" id="src_thumbreplaceimg" name="thumbreplaceimg-uploader_img" value="<?php echo $thumbreplaceimg_url; ?>" />
            <input class="button" type="button" name="mediauploadbtn" id="thumbreplaceimg" value="画像を選択" />
            <input class="button" type="button" name="thumbreplaceimg-clear" id="thumbreplaceimg" value="クリア" />
        </td>
    </tr>

    <tr>
        <th scope="row">サムネイル画像遅延処理</th>
        <td><label><input name="diver_basesettings_lazyload_on" type="checkbox" id="diver_basesettings_lazyload_on" value="1" <?php checked( 1, get_option('diver_basesettings_lazyload_on',1)); ?> /></label>　　
        </td>
    </tr>

    <tr>
        <th scope="row">検索結果から固定ページを除外</th>
        <td><label><input name="diver_option_base_main_search_page" type="checkbox" id="diver_option_base_main_search_page" value="1" <?php checked( 1, get_option('diver_option_base_main_search_page',1)); ?> /></label>
        </td>
    </tr>

    <tr>
        <th scope="row">タブウィジェット数</th>
        <td>
        <label><input type="number" min="1" max="9" name="diver_option_base_tabwidget" value="<?php echo get_option( 'diver_option_base_tabwidget','1') ?>" /> (設定した数だけタブウィジェットが作成されます。)</label>
        </td>
    </tr>

    <tr>
        <th scope="row">フッタークレジット</th>
        <td>
        <label><input type="text" style="width: 60%;" name="diver_option_base_footer_credit" value="<?php echo get_option( 'diver_option_base_footer_credit' ,get_bloginfo('name').' All Rights Reserved.') ?>" /></label>
        </td>
    </tr>


</table>
<?php submit_button(); ?>
</form>
</div>

<?php
    if (isset($_POST['diver_option_base_headermessage'])) {
        update_option('diver_option_base_headermessage', wp_unslash($_POST['diver_option_base_headermessage']));
        update_option('diver_option_base_headermessage_bg', wp_unslash($_POST['diver_option_base_headermessage_bg']));
        update_option('diver_option_base_headermessage_text', wp_unslash($_POST['diver_option_base_headermessage_text']));
        update_option('diver_option_base_headermessage_badge', wp_unslash($_POST['diver_option_base_headermessage_badge']));
        update_option('diver_option_base_headermessage_badge_bg', wp_unslash($_POST['diver_option_base_headermessage_badge_bg']));
        update_option('diver_option_base_headermessage_badge_text', wp_unslash($_POST['diver_option_base_headermessage_badge_text']));
        update_option('diver_option_base_headermessage_link', wp_unslash($_POST['diver_option_base_headermessage_link']));
        update_option('diver_option_base_headermessage_view', wp_unslash($_POST['diver_option_base_headermessage_view']));
    }
?>

<h2 class="diver_option_title">ヘッダーメッセージ</h2>
<div class="diver_option_wrap">
<form method="post" action="">
<table class="form-table">

    <?php 
        $header_message = get_option( 'diver_option_base_headermessage');
        $headermessage_bg = get_option( 'diver_option_base_headermessage_bg','#f9f9f9');
        $headermessage_text = get_option( 'diver_option_base_headermessage_text','#000');

        $header_message_badge = get_option( 'diver_option_base_headermessage_badge');
        $header_message_badge_bg = get_option( 'diver_option_base_headermessage_badge_bg','#f00');
        $header_message_badge_text = get_option( 'diver_option_base_headermessage_badge_text','#fff');

        $header_message_link = get_option( 'diver_option_base_headermessage_link');

        $diver_option_base_headermessage_view = get_option('diver_option_base_headermessage_view','all');
    ?>

    <tr>
        <th scope="row">テキスト</th>
        <td>
        <label><input style="width:80%;" type="text" name="diver_option_base_headermessage" value="<?php echo $header_message ?>" /></label>
        </td>
    </tr>

    <tr>
        <th scope="row"><label for="diver_option_base_headermessage_bg">背景色</label></th>
        <td><label><input type="text" name="diver_option_base_headermessage_bg" class="myColorPicker" value="<?php echo $headermessage_bg ?>"></label></td>
    </tr>


   <tr>
        <th scope="row"><label for="diver_option_base_headermessage_text">文字色</label></th>
        <td><label><input type="text" name="diver_option_base_headermessage_text" class="myColorPicker" value="<?php echo $headermessage_text ?>"></label></td>
    </tr>

    <tr>
        <th scope="row">バッジ</th>
        <td>
        <label><input type="text" name="diver_option_base_headermessage_badge" value="<?php echo $header_message_badge ?>" /></label>
        </td>
    </tr>

    <tr>
        <th scope="row"><label for="diver_option_base_headermessage_badge_bg">バッジ背景色</label></th>
        <td><label><input type="text" name="diver_option_base_headermessage_badge_bg" class="myColorPicker" value="<?php echo $header_message_badge_bg ?>"></label></td>
    </tr>

    <tr>
        <th scope="row"><label for="diver_option_base_headermessage_badge_text">バッジ文字色</label></th>
        <td><label><input type="text" name="diver_option_base_headermessage_badge_text" class="myColorPicker" value="<?php echo $header_message_badge_text ?>"></label></td>
    </tr>

    <tr>
        <th scope="row">リンク先</th>
        <td>
        <label><input style="width:80%;" type="text" name="diver_option_base_headermessage_link" value="<?php echo $header_message_link ?>" /></label>
        </td>
    </tr>
    
    <tr>
        <th scope="row">表示設定</th>
        <td>
            <label><input name="diver_option_base_headermessage_view" type="radio" value="all" <?php checked('all',$diver_option_base_headermessage_view); ?>/>全ページ</label>　
            <label><input name="diver_option_base_headermessage_view" type="radio" value="top" <?php checked('top',$diver_option_base_headermessage_view); ?>/>トップページのみ</label>　
            <label><input name="diver_option_base_headermessage_view" type="radio" value="single" <?php checked('single',$diver_option_base_headermessage_view); ?>/>投稿ページのみ</label>
        </td>
    </tr> 


</table>
<?php submit_button(); ?>
</form>
</div>

<h2 id="ga_settings" class="diver_option_title">Google Analytics設定</h2>
<div class="diver_option_wrap">
<?php
    // 更新完了を通知
    if (isset($_POST['firstview_media'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<form method="post" enctype="multipart/form-data" action="">
<table class="form-table">

    <?php
    $diver_option_analytics_type = get_option( 'diver_option_analytics_type','analytics');
    ?>

    <tr>
        <th scope="row">トラッキングID</th>
        <td>

            <label>
                <input class="diver_analytics_set" name="diver_option_analytics_type" type="radio" value="analytics" <?php checked('analytics',$diver_option_analytics_type); ?>/>analytics.js 
                <input type="text" name="diver_option_base_gaid" value="<?php echo get_option( 'diver_option_base_gaid',get_theme_mod( 'diver_analytics_id','')) ?>" placeholder="UA-XXXXXXXX-X" />
            </label>　

            <label>
                <input class="diver_analytics_set" name="diver_option_analytics_type" type="radio" value="gtag" <?php checked('gtag',$diver_option_analytics_type); ?>/>gtag.js
                <input type="text" name="diver_option_base_gtag" value="<?php echo get_option( 'diver_option_base_gtag' ) ?>" placeholder="G-XXXXXXXXX" />
            </label>　

        </td>
    </tr>

    <tr>
        <th scope="row">トラッキングから管理者を除外</th>
        <td><label><input name="diver_option_base_gaid_admin" type="checkbox" id="diver_option_base_gaid_admin" value="1" <?php checked( 1, get_option('diver_option_base_gaid_admin',0)); ?> /></label>
        </td>
    </tr>
</table>

<div style="padding: 20px;background-color: #f9f9f9;border:1px solid #ccc;border-radius: 3px">
<h3 style="margin:-20px;margin-bottom: 5px;border-bottom:1px solid #ccc;padding: 15px;font-size: 1em;color: #333;"><i style="margin-right: .8em;" class="fa fa-bar-chart" aria-hidden="true"></i>Analytics API設定（ページビュー数が取得出来るようになります） <a href="https://tan-taka.com/diver-demo/powered/6725" target="_blank">API設定方法</a></h3>
<table class="form-table">

    <tr>
        <th scope="row">アナリティクス View ID</th>
        <td>
        <label><input type="text" name="diver_analytics_api_viewID" value="<?php echo get_option( 'diver_analytics_api_viewID'); ?>" /></label>
        </td>
    </tr>

    <tr>
        <th scope="row">キーファイル（.json）</th>
        <td>
        <?php $file = get_option( 'diver_analytics_api_key_url');
        if(isset($file['url']) && file_exists($file['file'])): 
            $fileName = strrchr($file['url'],"/");
            $fileName = substr($fileName,1);
            echo $fileName;
            ?>
            <input type="submit" name="key_delete" value="削除する" onclick="return confirm('ファイルを削除してもよろしいですか？')";>
        <?php else: ?>
            <input type="file" accept=".json" name="diver_analytics_api_key" value="<?php echo get_option( 'diver_analytics_api_key'); ?>" />
        <?php endif;

        if(isset($file['error'])){
            $error = strrchr($file['error'],"/");
            $error = substr($error,1);
            echo $error;
        }
        ?>

        </td>
    </tr>

    <tr>
        <th scope="row">データリセット</th>
        <td>
            <input type="submit" name="analytics_reset" value="リセットする" onclick="return confirm('データをリセットしてもよろしいですか？')";>
            <p style="font-size: .8em;">（ページ読み込み時にアナリティクスデータを再取得します。実際のデータが削除されることはありません。）</p>
        </td>
    </tr>

</table>
</div>
<?php submit_button(); ?>
</form>
</div>

<h2 class="diver_option_title">アクセス解析</h2>
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
        <th scope="row">Webマスターツール認証コード</th>
        <td>
        <label><input type="text" style="width: 500px;" name="diver_option_base_gawm" value="<?php echo get_option( 'diver_option_base_gawm' ) ?>" /></label>
        </td>
    </tr>

    <tr>
        <th scope="row">アクセス解析タグ</th>
        <td><label>&lt;/head&gt;タグの直前：<textarea name="diver_option_base_ana_head" id="diver_option_base_ana_head" class="large-text code" rows="7"><?php echo esc_textarea(get_option('diver_option_base_ana_head',get_theme_mod('diver_access_tag_head',''))); ?></textarea></label><br><br>
        <label>&lt;/body&gt;タグの直前：<textarea name="diver_option_base_ana_body" id="diver_option_base_ana_body" class="large-text code" rows="7"><?php echo esc_textarea(get_option('diver_option_base_ana_body',get_theme_mod('diver_access_tag_body',''))); ?></textarea></label><br><br>
        <label>【AMP】 &lt;/head&gt;タグの直前：<textarea name="diver_option_base_amp_head" id="diver_option_base_amp_head" class="large-text code" rows="7"><?php echo esc_textarea(get_option('diver_option_base_amp_head')); ?></textarea></label>
        <br><br>
        <label>【AMP】 &lt;/body&gt;タグの直前：<textarea name="diver_option_base_amp_body" id="diver_option_base_amp_body" class="large-text code" rows="7"><?php echo esc_textarea(get_option('diver_option_base_amp_body')); ?></textarea></label>
        </td>
        </td>
    </tr>

</table>
<?php submit_button(); ?>
</form>
</div>

<h2 class="diver_option_title">広告設定</h2>
<div class="diver_option_wrap">
<form method="post" action="">
<table class="form-table">
    
    <div class="diver_option_aside"><i class="fa fa-info-circle" aria-hidden="true"></i>　１つのGoogle Adsenceのコードをサイト全体で利用可能になります。</div>
    <tr>
        <th scope="row">Google Adsence</th>

        <td>
        <label>data-ad-client<br><input type="text" style="width: 300px;" name="diver_option_base_ad_client" value="<?php echo get_option( 'diver_option_base_ad_client' ) ?>" /></label><br><br>

        <label>data-ad-slot<br><input type="text" name="diver_option_base_ad_slot" value="<?php echo get_option( 'diver_option_base_ad_slot' ) ?>" /></label>
        </td>
    </tr>

    <?php
        $posttop = get_option('diver_option_base_ad_posttop',0);
        $posth2 = get_option('diver_option_base_ad_posth2',0);
        $posth2_2 = get_option('diver_option_base_ad_posth2_2',0);
        $posth2_3 = get_option('diver_option_base_ad_posth2_3',0);
        $postbottom = get_option('diver_option_base_ad_postbottom',0);
        $postmore = get_option('diver_option_base_ad_more',0);
    ?>

    <tr>
        <th scope="row">広告表示</th>
        <td><label>
        投稿内上部 <br>
        <select name="diver_option_base_ad_posttop">
            <option <?php echo $posttop != '0' ?'': 'selected' ?> value="0">未設定</option>
            <option <?php echo $posttop != '1' ?'': 'selected' ?> value="1">レクタングル(ダブル)</option>
            <option <?php echo $posttop != '3' ?'': 'selected' ?> value="3">レクタングル(シングル)</option>
            <option <?php echo $posttop != '2' ?'': 'selected' ?> value="2">バナー</option>
            <option <?php echo $posttop != '4' ?'': 'selected' ?> value="4">個別設定</option>
        </select>
        </label>　　
        </td>
        <td>
        <label>最初のH2の直前 <br>
        <select name="diver_option_base_ad_posth2">
            <option <?php echo $posth2 != '0' ?'': 'selected' ?> value="0">未設定</option>
            <option <?php echo $posth2 != '1' ?'': 'selected' ?> value="1">レクタングル(ダブル)</option>
            <option <?php echo $posth2 != '3' ?'': 'selected' ?> value="3">レクタングル(シングル)</option>
            <option <?php echo $posth2 != '2' ?'': 'selected' ?> value="2">バナー</option>
            <option <?php echo $posth2 != '4' ?'': 'selected' ?> value="4">個別設定</option>
        </select></label>　　
        </td>
        <td>
        <label>2番目のH2の直前 <br>
        <select name="diver_option_base_ad_posth2_2">
            <option <?php echo $posth2_2 != '0' ?'': 'selected' ?> value="0">未設定</option>
            <option <?php echo $posth2_2 != '1' ?'': 'selected' ?> value="1">レクタングル(ダブル)</option>
            <option <?php echo $posth2_2 != '3' ?'': 'selected' ?> value="3">レクタングル(シングル)</option>
            <option <?php echo $posth2_2 != '2' ?'': 'selected' ?> value="2">バナー</option>
            <option <?php echo $posth2_2 != '4' ?'': 'selected' ?> value="4">個別設定</option>
        </select></label>　　
        </td>
    </tr>
    <tr>
    <th scope="row"></th>
        <td>
        <label>3番目のH2の直前<br>
        <select name="diver_option_base_ad_posth2_3">
            <option <?php echo $posth2_3 != '0' ?'': 'selected' ?> value="0">未設定</option>
            <option <?php echo $posth2_3 != '1' ?'': 'selected' ?> value="1">レクタングル(ダブル)</option>
            <option <?php echo $posth2_3 != '3' ?'': 'selected' ?> value="3">レクタングル(シングル)</option>
            <option <?php echo $posth2_3 != '2' ?'': 'selected' ?> value="2">バナー</option>
            <option <?php echo $posth2_3 != '4' ?'': 'selected' ?> value="4">個別設定</option>
        </select></label>　　
        </td>
        <td>
        <label>投稿内下部<br>
        <select name="diver_option_base_ad_postbottom">
            <option <?php echo $postbottom != '0' ?'': 'selected' ?> value="0">未設定</option>
            <option <?php echo $postbottom != '1' ?'': 'selected' ?> value="1">レクタングル(ダブル)</option>
            <option <?php echo $postbottom != '3' ?'': 'selected' ?> value="3">レクタングル(シングル)</option>
            <option <?php echo $postbottom != '2' ?'': 'selected' ?> value="2">バナー</option>
            <option <?php echo $postbottom != '4' ?'': 'selected' ?> value="4">個別設定</option>
        </select></label>　　
        </td>
        <td>
        <label>moreタグ<br>
        <select name="diver_option_base_ad_more">
            <option <?php echo $postmore != '0' ?'': 'selected' ?> value="0">未設定</option>
            <option <?php echo $postmore != '1' ?'': 'selected' ?> value="1">レクタングル(ダブル)</option>
            <option <?php echo $postmore != '3' ?'': 'selected' ?> value="3">レクタングル(シングル)</option>
            <option <?php echo $postmore != '2' ?'': 'selected' ?> value="2">バナー</option>
            <option <?php echo $postmore != '4' ?'': 'selected' ?> value="4">個別設定</option>
        </select></label>　　
        </td>
    </tr>

    <style>.form-table, .form-table td, .form-table td p, .form-table th{table-layout: fixed;}</style>

    <tr>
        <th scope="row">広告表示(AMP)</th>
        <td><label><input name="diver_option_base_ad_amptop" type="checkbox" id="diver_option_base_ad_amptop" value="1" <?php checked( 1, get_option('diver_option_base_ad_amptop',0)); ?> /> 投稿内上部</label></td>　　
        <td><label><input name="diver_option_base_ad_amph2" type="checkbox" id="diver_option_base_ad_amph2" value="1" <?php checked( 1, get_option('diver_option_base_ad_amph2',0)); ?> /> 最初のH2の直前</label></td>　　
        <td><label><input name="diver_option_base_ad_amph2_2" type="checkbox" id="diver_option_base_ad_amph2_2" value="1" <?php checked( 1, get_option('diver_option_base_ad_amph2_2',0)); ?> /> 2番目のH2の直前</label></td>　　
        <td><label><input name="diver_option_base_ad_amph2_3" type="checkbox" id="diver_option_base_ad_amph2_3" value="1" <?php checked( 1, get_option('diver_option_base_ad_amph2_3',0)); ?> /> 3番目のH2の直前</label></td>　　
        <td><label><input name="diver_option_base_ad_ampbottom" type="checkbox" id="diver_option_base_ad_ampbottom" value="1" <?php checked( 1, get_option('diver_option_base_ad_ampbottom',0)); ?> /> 投稿内下部</label></td>
    </tr>

     <tr>
        <th scope="row">広告直前に「スポンサーリンク」を表示</th>
        <td><label><input name="diver_option_base_ad_text" type="checkbox" id="diver_option_base_ad_text" value="1" <?php checked( 1, get_option('diver_option_base_ad_text',0)); ?> /></label>
        </td>
    </tr>

    </table>
    <div class="sample-accordion">
        <div class="ac-content">
            <label class="accordion_label" for="ac-cap">広告個別設定</label>
            <input id="ac-cap" type="checkbox">
            <div class="ac-cont">
                <div class="col">
                <label>投稿内上部
                <textarea name="diver_option_base_ad_posttop_custom" id="diver_option_base_ad_posttop_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_posttop_custom')); ?></textarea></label>
                </div>

                <div class="col">
                <label>最初のH2の直前
                <textarea name="diver_option_base_ad_posth2_custom" id="diver_option_base_ad_posth2_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_posth2_custom')); ?></textarea></label>
                </div>

                <div class="col">
                <label>2番目のH2の直前
                <textarea name="diver_option_base_ad_posth2_2_custom" id="diver_option_base_ad_posth2_2_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_posth2_2_custom')); ?></textarea></label>
                </div>

                <div class="col">
                <label>3番目のH2の直前
                <textarea name="diver_option_base_ad_posth2_3_custom" id="diver_option_base_ad_posth2_3_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_posth2_3_custom')); ?></textarea></label>
                </div>

                <div class="col">
                <label>投稿内下部
                <textarea name="diver_option_base_ad_postbottom_custom" id="diver_option_base_ad_postbottom_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_postbottom_custom')); ?></textarea></label>
                </div>

                <div class="col">
                <label>moreタグ
                <textarea name="diver_option_base_ad_more_custom" id="diver_option_base_ad_more_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_more_custom')); ?></textarea></label>
                </div>
            </div>
        </div>
    </div>

    <div class="sample-accordion">
        <div class="ac-content">
            <label class="accordion_label" for="ac-cap2">AMP広告個別設定</label>
            <input id="ac-cap2" type="checkbox">
            <div class="ac-cont">
                <div class="col">
                <label>投稿内上部
                <textarea name="diver_option_base_ad_amptop_custom" id="diver_option_base_ad_amptop_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_amptop_custom')); ?></textarea></label>
                </div>

                <div class="col">
                <label>最初のH2の直前
                <textarea name="diver_option_base_ad_amph2_custom" id="diver_option_base_ad_amph2_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_amph2_custom')); ?></textarea></label>
                </div>

                <div class="col">
                <label>2番目のH2の直前
                <textarea name="diver_option_base_ad_amph2_2_custom" id="diver_option_base_ad_amph2_2_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_amph2_2_custom')); ?></textarea></label>
                </div>

                <div class="col">
                <label>3番目のH2の直前
                <textarea name="diver_option_base_ad_amph2_3_custom" id="diver_option_base_ad_amph2_3_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_amph2_3_custom')); ?></textarea></label>
                </div>

                <div class="col">
                <label>投稿内下部
                <textarea name="diver_option_base_ad_ampbottom_custom" id="diver_option_base_ad_ampbottom_custom" class="large-text code" rows="8"><?php echo esc_textarea(get_option('diver_option_base_ad_ampbottom_custom')); ?></textarea></label>
                </div>

            </div>
        </div>
    </div>

    <table class="form-table">

    <tr>
        <th scope="row">記事一覧インフィード広告</th>
        <td>
        <label><input type="text" name="diver_option_base_ad_infeed" value="<?php echo esc_textarea(get_option( 'diver_option_base_ad_infeed')) ?>" /> (複数設定する場合には、カンマ区切りで記入してください。)</label>
        </td>
    </tr>

    <tr>
        <th scope="row">インフィード広告タグ<br>（リスト）</th>
        <td><label><textarea name="diver_option_base_ad_infeedtag-list" id="diver_option_base_ad_infeedtag-list" class="large-text code" rows="5"><?php echo esc_textarea(get_option('diver_option_base_ad_infeedtag-list')); ?></textarea></label>
        </td>
    </tr>

    <tr>
        <th scope="row">インフィード広告タグ<br>（グリッド）</th>
        <td><label><textarea name="diver_option_base_ad_infeedtag-grid" id="diver_option_base_ad_infeedtag-grid" class="large-text code" rows="5"><?php echo esc_textarea(get_option('diver_option_base_ad_infeedtag-grid')); ?></textarea></label>
        </td>
    </tr>

    <tr>
        <th scope="row">インフィード広告タグ<br>（ミニリスト）</th>
        <td><label><textarea name="diver_option_base_ad_infeedtag-minilist" id="diver_option_base_ad_infeedtag-minilist" class="large-text code" rows="5"><?php echo esc_textarea(get_option('diver_option_base_ad_infeedtag-minilist')); ?></textarea></label>
        </td>
    </tr>

    <tr>
        <th scope="row">インフィード広告タグ<br>（モバイル）</th>
        <td><label><textarea name="diver_option_base_ad_infeedtag-mobile" id="diver_option_base_ad_infeedtag-mobile" class="large-text code" rows="5"><?php echo esc_textarea(get_option('diver_option_base_ad_infeedtag-mobile')); ?></textarea></label>
        </td>
    </tr>

</table>
<?php submit_button(); ?>
</form>
</div>