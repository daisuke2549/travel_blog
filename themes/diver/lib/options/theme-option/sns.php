<?php
    // 更新完了を通知
    if (isset($_POST['diversnssetting'])||isset($_POST['diverpostsnssetting'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diversnssetting'])) {
        update_option('diver_sns_facebook_url',wp_unslash($_POST['diver_sns_facebook_url']));
        update_option('diver_sns_facebook_page',wp_unslash($_POST['diver_sns_facebook_page']));
        update_option('diver_sns_facebook_app',wp_unslash($_POST['diver_sns_facebook_app']));
        update_option('diver_sns_twitter_url',wp_unslash($_POST['diver_sns_twitter_url']));
        update_option('diver_sns_twitter_name',wp_unslash($_POST['diver_sns_twitter_name']));
        update_option('diver_sns_instagram_url',wp_unslash($_POST['diver_sns_instagram_url']));

    }
    $diver_sns_facebook_url = get_option('diver_sns_facebook_url',get_theme_mod('facebook_profile'));
    $diver_sns_facebook_page = get_option('diver_sns_facebook_page',get_theme_mod('facebook_page'));
    $diver_sns_facebook_app = get_option('diver_sns_facebook_app',get_theme_mod('facebook_app'));
    $diver_sns_twitter_url = get_option('diver_sns_twitter_url',get_theme_mod('twitter_url'));
    $diver_sns_twitter_name = get_option('diver_sns_twitter_name',get_theme_mod('twitter_id'));
    $diver_sns_instagram_url = get_option('diver_sns_instagram_url',get_theme_mod('instagram_url'));

?>
<h1 class="diver_option_header">SNS設定</h1>

<h2 class="diver_option_title">基本設定</h2>
<div class="diver_option_wrap">

<form method="post" action="">
<input type="hidden" name="diversnssetting">
<table class="form-table">

    <tr>
        <th scope="row">facebookプロフィールURL</th>
        <td><label><input name="diver_sns_facebook_url" type="text" id="diver_sns_facebook_url" style="width:80%;" value="<?php echo $diver_sns_facebook_url ?>"/></label>　　
        </td>
    </tr>

    <tr>
        <th scope="row">facebookページURL</th>
        <td><label><input name="diver_sns_facebook_page" type="text" id="diver_sns_facebook_page" style="width:80%;" value="<?php echo $diver_sns_facebook_page ?>"/></label>　　
        </td>
    </tr>

    <tr>
        <th scope="row">facebookアプリID</th>
        <td><label><input name="diver_sns_facebook_app" type="text" id="diver_sns_facebook_app" style="width:80%;" value="<?php echo $diver_sns_facebook_app ?>"/></label>　　
        </td>
    </tr>

   <tr>
        <th scope="row">twitterプロフィールURL</th>
        <td><label><input name="diver_sns_twitter_url" type="text" id="diver_sns_twitter_url" style="width:80%;" value="<?php echo $diver_sns_twitter_url ?>"/></label>　　
        </td>
    </tr>

   <tr>
        <th scope="row">twitterアカウント名</th>
        <td><label><input name="diver_sns_twitter_name" type="text" id="diver_sns_twitter_name" style="width:80%;" value="<?php echo $diver_sns_twitter_name ?>"/></label>　　
        </td>
    </tr>

   <tr>
        <th scope="row">instagramプロフィールURL</th>
        <td><label><input name="diver_sns_instagram_url" type="text" id="diver_sns_instagram_url" style="width:80%;" value="<?php echo $diver_sns_instagram_url ?>"/></label>　　
        </td>
    </tr>


</table>
<?php submit_button(); ?>
</form>
</div>


<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diverpostsnssetting'])) {

        // 投稿上部

        update_option('diver_sns_post_top_style', $_POST['diver_sns_post_top_style']);

        $diver_sns_post_top_facebook = isset($_POST['diver_sns_post_top-facebook']) ? 1 : 0;
        update_option('diver_sns_post_top-facebook', $diver_sns_post_top_facebook);

        $diver_sns_post_top_twitter = isset($_POST['diver_sns_post_top-twitter']) ? 1 : 0;
        update_option('diver_sns_post_top-twitter', $diver_sns_post_top_twitter);

        $diver_sns_post_top_hatebu = isset($_POST['diver_sns_post_top-hatebu']) ? 1 : 0;
        update_option('diver_sns_post_top-hatebu', $diver_sns_post_top_hatebu);

        $diver_sns_post_top_line = isset($_POST['diver_sns_post_top-line']) ? 1 : 0;
        update_option('diver_sns_post_top-line', $diver_sns_post_top_line);

        $diver_sns_post_top_pocket = isset($_POST['diver_sns_post_top-pocket']) ? 1 : 0;
        update_option('diver_sns_post_top-pocket', $diver_sns_post_top_pocket);

        $diver_sns_post_top_feedly = isset($_POST['diver_sns_post_top-feedly']) ? 1 : 0;
        update_option('diver_sns_post_top-feedly', $diver_sns_post_top_feedly);

        // 投稿下部

        update_option('diver_sns_post_bottom_style', $_POST['diver_sns_post_bottom_style']);

        $diver_sns_post_bottom_facebook = isset($_POST['diver_sns_post_bottom-facebook']) ? 1 : 0;
        update_option('diver_sns_post_bottom-facebook', $diver_sns_post_bottom_facebook);

        $diver_sns_post_bottom_twitter = isset($_POST['diver_sns_post_bottom-twitter']) ? 1 : 0;
        update_option('diver_sns_post_bottom-twitter', $diver_sns_post_bottom_twitter);

        $diver_sns_post_bottom_hatebu = isset($_POST['diver_sns_post_bottom-hatebu']) ? 1 : 0;
        update_option('diver_sns_post_bottom-hatebu', $diver_sns_post_bottom_hatebu);

        $diver_sns_post_bottom_line = isset($_POST['diver_sns_post_bottom-line']) ? 1 : 0;
        update_option('diver_sns_post_bottom-line', $diver_sns_post_bottom_line);

        $diver_sns_post_bottom_pocket = isset($_POST['diver_sns_post_bottom-pocket']) ? 1 : 0;
        update_option('diver_sns_post_bottom-pocket', $diver_sns_post_bottom_pocket);

        $diver_sns_post_bottom_feedly = isset($_POST['diver_sns_post_bottom-feedly']) ? 1 : 0;
        update_option('diver_sns_post_bottom-feedly', $diver_sns_post_bottom_feedly);

        // 固定SNS

        $diver_sns_post_fixed_facebook = isset($_POST['diver_sns_post_fixed-facebook']) ? 1 : 0;
        update_option('diver_sns_post_fixed-facebook', $diver_sns_post_fixed_facebook);

        $diver_sns_post_fixed_twitter = isset($_POST['diver_sns_post_fixed-twitter']) ? 1 : 0;
        update_option('diver_sns_post_fixed-twitter', $diver_sns_post_fixed_twitter);

        $diver_sns_post_fixed_hatebu = isset($_POST['diver_sns_post_fixed-hatebu']) ? 1 : 0;
        update_option('diver_sns_post_fixed-hatebu', $diver_sns_post_fixed_hatebu);

        $diver_sns_post_fixed_pocket = isset($_POST['diver_sns_post_fixed-pocket']) ? 1 : 0;
        update_option('diver_sns_post_fixed-pocket', $diver_sns_post_fixed_pocket);

        $diver_sns_post_fixed_feedly = isset($_POST['diver_sns_post_fixed-feedly']) ? 1 : 0;
        update_option('diver_sns_post_fixed-feedly', $diver_sns_post_fixed_feedly);


        // 固定ページ

        $diver_sns_page_top_style = isset($_POST['diver_sns_page_top_style']) ? 1 : 0;
        update_option('diver_sns_page_top_style', $diver_sns_page_top_style);

        $diver_sns_page_bottom_style = isset($_POST['diver_sns_page_bottom_style']) ? 1 : 0;
        update_option('diver_sns_page_bottom_style', $diver_sns_page_bottom_style);

    }
    // 投稿上部

    $diver_sns_post_top_style = get_option('diver_sns_post_top_style',get_theme_mod('sharebtn_style_top','big'));
    $diver_sns_post_top_facebook = get_option('diver_sns_post_top-facebook',get_theme_mod('facebook','1'));
    $diver_sns_post_top_twitter = get_option('diver_sns_post_top-twitter',get_theme_mod('twitter','1'));
    $diver_sns_post_top_hatebu = get_option('diver_sns_post_top-hatebu',get_theme_mod('hatebu','1'));
    $diver_sns_post_top_line = get_option('diver_sns_post_top-line',get_theme_mod('line','1'));
    $diver_sns_post_top_pocket = get_option('diver_sns_post_top-pocket',get_theme_mod('pocket','1'));
    $diver_sns_post_top_feedly = get_option('diver_sns_post_top-feedly',get_theme_mod('feedly','1'));

    // 投稿下部

    $diver_sns_post_bottom_style = get_option('diver_sns_post_bottom_style',get_theme_mod('sharebtn_style_bottom','big'));
    $diver_sns_post_bottom_facebook = get_option('diver_sns_post_bottom-facebook',get_theme_mod('facebook','1'));
    $diver_sns_post_bottom_twitter = get_option('diver_sns_post_bottom-twitter',get_theme_mod('twitter','1'));
    $diver_sns_post_bottom_hatebu = get_option('diver_sns_post_bottom-hatebu',get_theme_mod('hatebu','1'));
    $diver_sns_post_bottom_line = get_option('diver_sns_post_bottom-line',get_theme_mod('line','1'));
    $diver_sns_post_bottom_pocket = get_option('diver_sns_post_bottom-pocket',get_theme_mod('pocket','1'));
    $diver_sns_post_bottom_feedly = get_option('diver_sns_post_bottom-feedly',get_theme_mod('feedly','1'));

    // 固定SNS

    $diver_sns_post_fixed_facebook = get_option('diver_sns_post_fixed-facebook',get_theme_mod('facebook','1'));
    $diver_sns_post_fixed_twitter = get_option('diver_sns_post_fixed-twitter',get_theme_mod('twitter','1'));
    $diver_sns_post_fixed_hatebu = get_option('diver_sns_post_fixed-hatebu',get_theme_mod('hatebu','1'));
    $diver_sns_post_fixed_pocket = get_option('diver_sns_post_fixed-pocket',get_theme_mod('pocket','1'));
    $diver_sns_post_fixed_feedly = get_option('diver_sns_post_fixed-feedly',get_theme_mod('feedly','1'));

    // 固定ページ

    $diver_sns_page_top_style = get_option('diver_sns_page_top_style',0);
    $diver_sns_page_bottom_style = get_option('diver_sns_page_bottom_style',0);




?>
<h2 class="diver_option_title">SNSボタン設定</h2>
<div class="diver_option_wrap">

<form method="post" action="">
<input type="hidden" name="diverpostsnssetting">
<table class="form-table">

    <tr>
        <th scope="row">投稿上部</th>
        <td>
            <label><input name="diver_sns_post_top_style" type="radio" value="none" <?php checked('none',$diver_sns_post_top_style); ?>/>非表示</label>　
            <label><input name="diver_sns_post_top_style" type="radio" value="big" <?php checked('big',$diver_sns_post_top_style); ?>/>大きい</label>　
            <label><input name="diver_sns_post_top_style" type="radio" value="small" <?php checked('small',$diver_sns_post_top_style); ?>/>小さい</label>　
        </td>
    </tr>

    <tr>
        <th scope="row"></th>
        <td>
        <label><input name="diver_sns_post_top-facebook" type="checkbox" id="diver_sns_post_top-facebook" value="1" <?php checked( 1, $diver_sns_post_top_facebook); ?>/> facebook</label>　　
        <label><input name="diver_sns_post_top-twitter" type="checkbox" id="diver_sns_post_top-twitter" value="1" <?php checked( 1, $diver_sns_post_top_twitter); ?>/> twitter</label>　　　　
        <label><input name="diver_sns_post_top-hatebu" type="checkbox" id="diver_sns_post_top-hatebu" value="1" <?php checked( 1, $diver_sns_post_top_hatebu); ?>/> はてぶ</label>　　
        <label><input name="diver_sns_post_top-line" type="checkbox" id="diver_sns_post_top-line" value="1" <?php checked( 1, $diver_sns_post_top_line); ?>/> LINE</label>　　
        <label><input name="diver_sns_post_top-pocket" type="checkbox" id="diver_sns_post_top-pocket" value="1" <?php checked( 1, $diver_sns_post_top_pocket); ?>/> pocket</label>　　
        <label><input name="diver_sns_post_top-feedly" type="checkbox" id="diver_sns_post_top-feedly" value="1" <?php checked( 1, $diver_sns_post_top_feedly); ?>/> feedly</label>
        </td>　　
    </tr>
    <tr>
        <th scope="row"></th>
        <td><label><input name="diver_sns_page_top_style" type="checkbox" id="diver_sns_page_top_style" value="0" <?php checked( 1, $diver_sns_page_top_style); ?>/>固定ページにも表示する</label></td>
    </tr>
    <tr></tr>

    <tr>
        <th scope="row">投稿下部</th>
        <td>
            <label><input name="diver_sns_post_bottom_style" type="radio" value="none" <?php checked('none',$diver_sns_post_bottom_style); ?>/>非表示</label>　
            <label><input name="diver_sns_post_bottom_style" type="radio" value="big" <?php checked('big',$diver_sns_post_bottom_style); ?>/>大きい</label>　
            <label><input name="diver_sns_post_bottom_style" type="radio" value="small" <?php checked('small',$diver_sns_post_bottom_style); ?>/>小さい</label>　
        </td>
    </tr>
    <tr>
        <th scope="row"></th>
        <td>
        <label><input name="diver_sns_post_bottom-facebook" type="checkbox" id="diver_sns_post_bottom-facebook" value="1" <?php checked( 1, $diver_sns_post_bottom_facebook); ?>/> facebook</label>　　
        <label><input name="diver_sns_post_bottom-twitter" type="checkbox" id="diver_sns_post_bottom-twitter" value="1" <?php checked( 1, $diver_sns_post_bottom_twitter); ?>/> twitter</label>　　　
        <label><input name="diver_sns_post_bottom-hatebu" type="checkbox" id="diver_sns_post_bottom-hatebu" value="1" <?php checked( 1, $diver_sns_post_bottom_hatebu); ?>/> はてぶ</label>　　
        <label><input name="diver_sns_post_bottom-line" type="checkbox" id="diver_sns_post_bottom-line" value="1" <?php checked( 1, $diver_sns_post_bottom_line); ?>/> LINE</label>　　
        <label><input name="diver_sns_post_bottom-pocket" type="checkbox" id="diver_sns_post_bottom-pocket" value="1" <?php checked( 1, $diver_sns_post_bottom_pocket); ?>/> pocket</label>　　
        <label><input name="diver_sns_post_bottom-feedly" type="checkbox" id="diver_sns_post_bottom-feedly" value="1" <?php checked( 1, $diver_sns_post_bottom_feedly); ?>/> feedly</label>
        </td>　　
    </tr>
    <tr>
        <th scope="row"></th>
        <td><label><input name="diver_sns_page_bottom_style" type="checkbox" id="diver_sns_page_bottom_style" value="0" <?php checked( 1, $diver_sns_page_bottom_style); ?>/>固定ページにも表示する</label></td>
    </tr>

    <tr></tr>

    <tr class="diver_sns_post_fixed_btn">
        <th scope="row">追従SNSボックス</th>
        <td>
        <label><input name="diver_sns_post_fixed-facebook" type="checkbox" id="diver_sns_post_fixed-facebook" value="1" <?php checked( 1, $diver_sns_post_fixed_facebook); ?>/> facebook</label>　　
        <label><input name="diver_sns_post_fixed-twitter" type="checkbox" id="diver_sns_post_fixed-twitter" value="1" <?php checked( 1, $diver_sns_post_fixed_twitter); ?>/> twitter</label>　　
        <label><input name="diver_sns_post_fixed-hatebu" type="checkbox" id="diver_sns_post_fixed-hatebu" value="1" <?php checked( 1, $diver_sns_post_fixed_hatebu); ?>/> はてぶ</label>　　
        <label><input name="diver_sns_post_fixed-pocket" type="checkbox" id="diver_sns_post_fixed-pocket" value="1" <?php checked( 1, $diver_sns_post_fixed_pocket); ?>/> pocket</label>　　
        <label><input name="diver_sns_post_fixed-feedly" type="checkbox" id="diver_sns_post_fixed-feedly" value="1" <?php checked( 1, $diver_sns_post_fixed_feedly); ?>/> feedly</label>
        </td>　　
    </tr>


</table>
<?php submit_button(); ?>
</form>
</div>