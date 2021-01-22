<style>
#mediapreview{
    max-width:300px;
    max-height:300px;
}
</style>
<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diverseosettings'])) {
        $diver_seosetting = isset($_POST['diver_seosetting'])? 1 : 0 ;
        update_option('diver_seosetting', $diver_seosetting);

        $diver_seo_description_tag_on = isset($_POST['diver_seo_description_tag_on'])? 1 : 0 ;
        update_option('diver_seo_description_tag_on', $diver_seo_description_tag_on);

        $diver_seo_sitetitle_set = isset($_POST['diver_seo_sitetitle_set']) ? 1 : 0;
        update_option('diver_seo_sitetitle_set', $diver_seo_sitetitle_set);

        update_option('diver_seo_title',wp_unslash($_POST['diver_seo_title']));
        update_option('diver_seo_description', wp_unslash($_POST['diver_seo_description']));
    }
    $diver_seosetting = get_option('diver_seosetting','1');
    $diver_seo_title = get_option('diver_seo_title',get_bloginfo('name'));
    $diver_seo_description = get_option('diver_seo_description',get_bloginfo( 'description' ));
    $diver_seo_sitetitle_set = get_option('diver_seo_sitetitle_set','1');
?>
<?php
    // 更新完了を通知
    if (isset($_POST['diverseosettings'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<h1 class="diver_option_header">SEO設定</h1>
<div class="diver_option_desc">
    SEOに関する設定を行います。プラグイン等での二重設定に注意してください。
</div>

<h2 class="diver_option_title">基本設定</h2>
<div class="diver_option_wrap">

<form method="post" action="">
<input type="hidden" name="diverseosettings">
<table class="form-table">

    <tr>
        <th scope="row">Diver SEO設定を有効にする</th>
        <td><label><input name="diver_seosetting" type="checkbox" id="diver_seosetting" value="1" <?php checked( 1, get_option('diver_seosetting',1)); ?> /></label>　　
        </td>
    </tr>

    <tr>
        <th scope="row">ディスクリプションタグを出力する</th>
        <td><label><input name="diver_seo_description_tag_on" type="checkbox" id="diver_seo_description_tag_on" value="1" <?php checked( 1, get_option('diver_seo_description_tag_on',1)); ?> /></label>　　
        </td>
    </tr>

    <tr class="seo_on">
        <th scope="row">サイトタイトル(titleタグ)</th>
        <td><label><input name="diver_seo_title" type="text" id="diverdiver_seo_title_seosetting" style="width:80%;" value="<?php echo $diver_seo_title ?>"/></label>　　
        </td>
    </tr>

    <tr class="seo_on">
        <th scope="row">サイト説明(descriptionタグ)</th>
        <td><label><textarea name="diver_seo_description" id="diver_seo_description" style="width:100%;height:100px;"><?php echo $diver_seo_description ?></textarea></label>　　
        </td>
    </tr>

    <tr class="seo_on">
        <th scope="row">タイトルタグにサイトタイトルをつける</th>
        <td><label><input name="diver_seo_sitetitle_set" type="checkbox" id="diver_seo_sitetitle_set" value="1" <?php checked( 1, $diver_seo_sitetitle_set); ?> /></label>　　
        </td>
    </tr>

</table>
<?php submit_button(); ?>
</form>
</div>

<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diverrobotsettings'])) {
        $diver_seo_top_index = isset($_POST['diver_seo_top_index']) ? 1 : 0;
        $diver_seo_top_follow = isset($_POST['diver_seo_top_follow']) ? 1 : 0;

        $diver_seo_cat_index = isset($_POST['diver_seo_cat_index']) ? 1 : 0;
        $diver_seo_cat_follow = isset($_POST['diver_seo_cat_follow']) ? 1 : 0;
        $diver_seo_tag_index = isset($_POST['diver_seo_tag_index']) ? 1 : 0;
        $diver_seo_tag_follow = isset($_POST['diver_seo_tag_follow']) ? 1 : 0;
        $diver_seo_search_index = isset($_POST['diver_seo_search_index']) ? 1 : 0;
        $diver_seo_search_follow = isset($_POST['diver_seo_search_follow']) ? 1 : 0;
        $diver_seo_author_index = isset($_POST['diver_seo_author_index']) ? 1 : 0;
        $diver_seo_author_follow = isset($_POST['diver_seo_author_follow']) ? 1 : 0;
        $diver_seo_date_index = isset($_POST['diver_seo_date_index']) ? 1 : 0;
        $diver_seo_date_follow = isset($_POST['diver_seo_date_follow']) ? 1 : 0;
        $diver_seo_404_index = isset($_POST['diver_seo_404_index']) ? 1 : 0;
        $diver_seo_404_follow = isset($_POST['diver_seo_404_follow']) ? 1 : 0;

        update_option('diver_seo_top_index', $diver_seo_top_index);
        update_option('diver_seo_top_follow', $diver_seo_top_follow);
        update_option('diver_seo_cat_index', $diver_seo_cat_index);
        update_option('diver_seo_cat_follow', $diver_seo_cat_follow);
        update_option('diver_seo_tag_index', $diver_seo_tag_index);
        update_option('diver_seo_tag_follow', $diver_seo_tag_follow);
        update_option('diver_seo_search_index', $diver_seo_search_index);
        update_option('diver_seo_search_follow', $diver_seo_search_follow);
        update_option('diver_seo_author_index', $diver_seo_author_index);
        update_option('diver_seo_author_follow', $diver_seo_author_follow);
        update_option('diver_seo_date_index', $diver_seo_date_index);
        update_option('diver_seo_date_follow', $diver_seo_date_follow);
        update_option('diver_seo_404_index', $diver_seo_404_index);
        update_option('diver_seo_404_follow', $diver_seo_404_follow);
    }
?>


<h2 class="diver_option_title seo_on">meta robots設定</h2>
<div class="diver_option_wrap seo_on">

<form method="post" action="">
<input type="hidden" name="diverrobotsettings">
<table class="form-table">
<div class="diver_option_aside" style="background: #e9f4f9;"><i class="fa fa-info-circle" aria-hidden="true"></i>デフォルトが推奨設定です。</div>

    <tr>
        <th scope="row">トップページ</th>
        <td><label><input name="diver_seo_top_index" type="checkbox" id="diver_seo_top_index" value="0" <?php checked( 1, get_option('diver_seo_top_index',0)); ?> /> noindex</label>　　
        <label><input name="diver_seo_top_follow" type="checkbox" id="diver_seo_top_follow" value="0" <?php checked( 1, get_option('diver_seo_top_follow',0)); ?> /> nofollow</label></td>　　
    </tr>


    <tr>
        <th scope="row">カテゴリー</th>
        <td><label><input name="diver_seo_cat_index" type="checkbox" id="diver_seo_cat_index" value="1" <?php checked( 1, get_option('diver_seo_cat_index',1)); ?> /> noindex</label>　　
        <label><input name="diver_seo_cat_follow" type="checkbox" id="diver_seo_cat_follow" value="1" <?php checked( 1, get_option('diver_seo_cat_follow',0)); ?> /> nofollow</label></td>　　
    </tr>

    <tr>
        <th scope="row">タグ</th>
        <td><label><input name="diver_seo_tag_index" type="checkbox" id="diver_seo_tag_index" value="1" <?php checked( 1, get_option('diver_seo_tag_index',1)); ?> /> noindex</label>　　
        <label><input name="diver_seo_tag_follow" type="checkbox" id="diver_seo_tag_follow" value="1" <?php checked( 1, get_option('diver_seo_tag_follow',0)); ?> /> nofollow</label></td>　　
    </tr>

    <tr>
        <th scope="row">検索結果</th>
        <td><label><input name="diver_seo_search_index" type="checkbox" id="diver_seo_search_index" value="1" <?php checked( 1, get_option('diver_seo_search_index',1)); ?> /> noindex</label>　　
        <label><input name="diver_seo_search_follow" type="checkbox" id="diver_seo_search_follow" value="1" <?php checked( 1, get_option('diver_seo_search_follow',0)); ?> /> nofollow</label></td>　　
    </tr>

    <tr>
        <th scope="row">投稿者アーカイブ</th>
        <td><label><input name="diver_seo_author_index" type="checkbox" id="diver_seo_author_index" value="1" <?php checked( 1, get_option('diver_seo_author_index',1)); ?> /> noindex</label>　　
        <label><input name="diver_seo_author_follow" type="checkbox" id="diver_seo_author_follow" value="1" <?php checked( 1, get_option('diver_seo_author_follow',0)); ?> /> nofollow</label></td>　　
    </tr>

    <tr>
        <th scope="row">日付別アーカイブ</th>
        <td><label><input name="diver_seo_date_index" type="checkbox" id="diver_seo_date_index" value="1" <?php checked( 1, get_option('diver_seo_date_index',1)); ?> /> noindex</label>　　
        <label><input name="diver_seo_date_follow" type="checkbox" id="diver_seo_date_follow" value="1" <?php checked( 1, get_option('diver_seo_date_follow',0)); ?> /> nofollow</label></td>　　
    </tr>

    <tr>
        <th scope="row">404ページ</th>
        <td><label><input name="diver_seo_404_index" type="checkbox" id="diver_seo_404_index" value="1" <?php checked( 1, get_option('diver_seo_404_index',1)); ?> /> noindex</label>　　
        <label><input name="diver_seo_404_follow" type="checkbox" id="diver_seo_404_follow" value="1" <?php checked( 1, get_option('diver_seo_404_follow',1)); ?> /> nofollow</label></td>　　
    </tr>


</table>
<?php submit_button(); ?>
</form>
</div>



<script type="text/javascript">
    jQuery(document).ready(function($) {

        if ($('#diver_seosetting').prop('checked')) {
            $('.seo_on').show();
        } else {
            $('.seo_on').hide();
        }
            
        $('input[name="diver_seosetting"]').change(function() {
            if ($(this).prop('checked')) {
                $('.seo_on').show();
            } else {
                $('.seo_on').hide();
            }
        });
    });
</script>