<style>
#mediapreview{
	max-width:300px;
	max-height:300px;
}
</style>
<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diver_postsettings_fontsize'])) {

        $diver_postsettings_icatch_on = isset($_POST['diver_postsettings_icatch_on']) ? 1 : 0;
        update_option('diver_postsettings_icatch_on', $diver_postsettings_icatch_on);

        $diver_postsettings_icatchbg_on = isset($_POST['diver_postsettings_icatchbg_on']) ? 1 : 0;
        update_option('diver_postsettings_icatchbg_on', $diver_postsettings_icatchbg_on);

        update_option('diver_postsettings_icatch', $_POST['diver_postsettings_icatch']);
        update_option('diver_postsettings_icatch_height', $_POST['diver_postsettings_icatch_height']);
        update_option('diver_postsettings_icatch_height_on', $_POST['diver_postsettings_icatch_height_on']);

        $diver_postsettings_lazyload_on = isset($_POST['diver_postsettings_lazyload_on']) ? 1 : 0;
        update_option('diver_postsettings_lazyload_on', $diver_postsettings_lazyload_on);

        update_option('diver_postsettings_fontsize', $_POST['diver_postsettings_fontsize']);
        update_option('diver_postsettings_fontsizesp', $_POST['diver_postsettings_fontsizesp']);
        update_option('diver_postsettings_p_space', $_POST['diver_postsettings_p_space']);
        update_option('diver_postsettings_line_space', $_POST['diver_postsettings_line_space']);
        update_option('diver_postsettings_line_space', $_POST['diver_postsettings_line_space']);
        update_option('diver_postsettings_appealbox', $_POST['diver_postsettings_appealbox']);
        update_option('diver_postsettings_default_cta', $_POST['diver_postsettings_default_cta']);

        $diver_postsettings_img_shadow = isset($_POST['diver_postsettings_img_shadow']) ? 1 : 0;
        update_option('diver_postsettings_img_shadow', $diver_postsettings_img_shadow);

        $diver_postsettings_img_border = isset($_POST['diver_postsettings_img_border']) ? 1 : 0;
        update_option('diver_postsettings_img_border', $diver_postsettings_img_border);

        $diver_postsettings_link_style = isset($_POST['diver_postsettings_link_style']) ? 1 : 0;
        update_option('diver_postsettings_link_style', $diver_postsettings_link_style);

        $diver_postsettings_kaereba = isset($_POST['diver_postsettings_kaereba']) ? 1 : 0;
        update_option('diver_postsettings_kaereba', $diver_postsettings_kaereba);

        $diver_postsettings_toc = isset($_POST['diver_postsettings_toc']) ? 1 : 0;
        update_option('diver_postsettings_toc', $diver_postsettings_toc);

        update_option('diver_postsettings_toc_color', $_POST['diver_postsettings_toc_color']);
        update_option('diver_postsettings_toc_textcolor', $_POST['diver_postsettings_toc_textcolor']);

    }
        $diver_postsettings_icatch = get_option( 'diver_postsettings_icatch','0');
        $diver_postsettings_icatch_height = get_option('diver_postsettings_icatch_height','1');
        $diver_postsettings_icatch_height_on = get_option('diver_postsettings_icatch_height_on','500');

?>
<?php
    // 更新完了を通知
    if (isset($_POST['diver_postsettings_fontsize'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<h1 class="diver_option_header">投稿設定</h1>
<div class="diver_option_desc">
    投稿内の文章の細かい設定や、ビジュアルエディターに関する設定をすることができます。
</div>

<h2 class="diver_option_title">表示設定</h2>
<div class="diver_option_wrap">

<form method="post" action="">
<table class="form-table">

    <tr>
        <th scope="row">アイキャッチ画像を表示する</th>
        <td><label><input name="diver_postsettings_icatch_on" type="checkbox" id="diver_postsettings_icatch_on" value="1" <?php checked( 1, get_option('diver_postsettings_icatch_on',get_theme_mod('single_icatch',1))); ?> /></label>　　
        </td>
    </tr>

    <tr>
        <th scope="row">アイキャッチ画像の背景を表示する</th>
        <td><label><input name="diver_postsettings_icatchbg_on" type="checkbox" id="diver_postsettings_icatchbg_on" value="1" <?php checked( 1, get_option('diver_postsettings_icatchbg_on',get_theme_mod('single_icatch_bg',1))); ?> /></label>　　
        </td>
    </tr>

    <tr>
        <th scope="row">アイキャッチ画像表示サイズ</th>
        <td>
            <label><input name="diver_postsettings_icatch" type="radio" value="0" <?php checked(0,$diver_postsettings_icatch); ?>/>オリジナルサイズを維持</label>　
            <label><input name="diver_postsettings_icatch" type="radio" value="1" <?php checked(1,$diver_postsettings_icatch); ?>/>横幅いっぱいに広げる</label>
        </td>
    </tr>
    <tr>
        <th scope="row">アイキャッチ画像高さ制限</th>
        <td>
            <label><input name="diver_postsettings_icatch_height" type="radio" value="0" <?php checked(0,$diver_postsettings_icatch_height); ?>/>無効</label>　
            <label><input name="diver_postsettings_icatch_height" type="radio" value="1" <?php checked(1,$diver_postsettings_icatch_height); ?>/><input type="number" min="0" name="diver_postsettings_icatch_height_on" value="<?php echo get_option( 'diver_postsettings_icatch_height_on','500') ?>" /> px</label>
        </td>
    </tr>

    <tr>
        <th scope="row">フォントサイズ(PC)</th>
        <td>
        <label><input type="number" min="0" name="diver_postsettings_fontsize" value="<?php echo get_option( 'diver_postsettings_fontsize','17') ?>" /> px</label></td>
    </tr>

    <tr>
        <th scope="row">フォントサイズ(SP)</th>
        <td>
        <label><input type="number" min="0" name="diver_postsettings_fontsizesp" value="<?php echo get_option( 'diver_postsettings_fontsizesp','16') ?>" /> px</label></td>
    </tr>
    
    <tr>
        <th scope="row">段落スペース</th>
        <td>
        <label><input type="number" min="0" step="0.1" name="diver_postsettings_p_space" value="<?php echo get_option( 'diver_postsettings_p_space','1') ?>" /> em (1em:1文字分)</label>
        </td>
    </tr>

    <tr>
        <th scope="row">行間</th>
        <td>
        <label><input type="number" min="1" step="0.1" name="diver_postsettings_line_space" value="<?php echo get_option( 'diver_postsettings_line_space','1.8') ?>" /></label>
        </td>
    </tr>

    <tr>
        <th scope="row">画像縁取り</th>
        <td><label><input name="diver_postsettings_img_shadow" type="checkbox" id="diver_postsettings_img_shadow" value="1" <?php checked( 1, get_option('diver_postsettings_img_shadow',0)); ?> /> 影</label>　　
        <label><input name="diver_postsettings_img_border" type="checkbox" id="diver_postsettings_img_border" value="1" <?php checked( 1, get_option('diver_postsettings_img_border',0)); ?> /> ボーダー</label>
        </td>
    </tr>

    <tr>
        <th scope="row">画像遅延処理</th>
        <td><label><input name="diver_postsettings_lazyload_on" type="checkbox" id="diver_postsettings_lazyload_on" value="1" <?php checked( 1, get_option('diver_postsettings_lazyload_on',1)); ?> /></label>　　
        </td>
    </tr>

    <tr>
        <th scope="row">リンクにアンダーラインを表示する</th>
        <td><label><input name="diver_postsettings_link_style" type="checkbox" id="diver_postsettings_link_style" value="1" <?php checked( 1, get_option('diver_postsettings_link_style',0)); ?> /></label>　　
        </td>
    </tr>

    <tr>
        <th scope="row">カエレバ・ヨメレバ・トマレバデザインを適用する</th>
        <td><label><input name="diver_postsettings_kaereba" type="checkbox" id="diver_postsettings_kaereba" value="1" <?php checked( 1, get_option('diver_postsettings_kaereba',1)); ?> /></label>　　
        </td>
    </tr>

    <tr>
        <th scope="row">TOC+プラグインにDiverスタイルを適用する</th>
        <td><label><input name="diver_postsettings_toc" type="checkbox" id="diver_postsettings_toc" value="1" <?php checked( 1, get_option('diver_postsettings_toc',0)); ?> /></label>　　
        </td>
    </tr>

    <tr class="toc_color">
        <th scope="row"><label for="diver_postsettings_toc_color">TOC+基本カラー</label></th>
        <td><label><input type="text" name="diver_postsettings_toc_color" class="myColorPicker" value="<?php echo get_option('diver_postsettings_toc_color','#e1eff4') ?>"></label></td>
    </tr>

    <tr class="toc_color">
        <th scope="row"><label for="diver_postsettings_toc_textcolor">TOC+文字色</label></th>
        <td><label><input type="text" name="diver_postsettings_toc_textcolor" class="myColorPicker" value="<?php echo get_option('diver_postsettings_toc_textcolor','#1e73be') ?>"></label></td>
    </tr>

<!--     <tr>
        <th scope="row">すべての投稿でAMPを有効にする</th>
        <td><label><input name="diver_postsettings_img_shadow" type="checkbox" id="diver_postsettings_img_shadow" value="1" <?php checked( 1, get_option('diver_postsettings_img_shadow',1)); ?> /></label>
        </td>
    </tr>
 -->
     <?php
        global $post_ID;
        $ctaId = get_option('diver_postsettings_default_cta',0);
     ?>
    <tr>
        <th scope="row"><label for="my_select">デフォルトCTA設定</label></th>
        <td>
            <select name="diver_postsettings_default_cta" id="diver_postsettings_default_cta">
                <option value="0">CTAを選択</option>
                    <?php
                    $args = array('post_type' => 'cta','posts_per_page' => -1);
                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : setup_postdata( $post ); ?> 
                    ?>
                <option value="<?php echo $post->ID; ?>"<?php if($ctaId==$post->ID){echo 'selected';}?>><?php echo $post->post_title; ?></option>
                <?php endforeach; wp_reset_postdata();?>
            </select>
        </td>
    </tr>

    <tr>
        <th scope="row"><label for="my_select">アピールブロック一括設定</label></th>
        <td>
        <label>投稿ID：<input type="number" name="diver_postsettings_appealbox" value="<?php echo get_option( 'diver_postsettings_appealbox') ?>" />(すべての投稿に共通のアピールブロックが設定されます。)</label>
        </td>
    </tr>


</table>
<?php submit_button(); ?>
</form>
</div>

<!-- <h2 class="diver_option_title">エディター設定</h2>
<div class="diver_option_wrap">

<form method="post" action="">
<table class="form-table">

</table>
<?php submit_button(); ?>
</form>
</div> -->

<script type="text/javascript" language="javascript">
jQuery(document).ready(function($) {

    if ($('#diver_postsettings_toc').prop('checked')) {
        $('.toc_color').fadeIn();
    } else {
        $('.toc_color').fadeOut();
    }

    $('#diver_postsettings_toc').on('change', function () {
        if ($(this).prop('checked')) {
            $('.toc_color').fadeIn();
        } else {
            $('.toc_color').fadeOut();
        }
    });


});
</script>