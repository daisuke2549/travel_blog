<style>
.header_btn_form{
    padding: 1em 2em;
    background: #fff;
    border-radius: 3px;
    margin-bottom: 1em;

}
.header_btn_form:after{
    display: block;
    visibility: hidden;
    clear: both;
    height: 0;
    content: " ";
    font-size: 0;
}
.header_btn_form i{
    font-size: 55px;
    vertical-align: middle;
}
.header_btn_form .iconpicker {
    height: auto;
    padding: 10px 20px;
}

.header_btn_form_icon{
    float: left;
}

.header_btn_form .wp-picker-container{
    display: inline-block;
}
</style>
<?php
// POSTデータがあれば設定を更新
    if (isset($_POST['diver_option_headerbtn_title1'])) {

        // 1
        $diver_option_headerbtn_hidden1 = isset($_POST['diver_option_headerbtn_hidden1']) ? 1 : 0;
        update_option('diver_option_headerbtn_hidden1', $diver_option_headerbtn_hidden1);

        update_option('diver_option_headerbtn_icon1', $_POST['diver_option_headerbtn_icon1']);
        update_option('diver_option_headerbtn_title1', $_POST['diver_option_headerbtn_title1']);
        update_option('diver_option_headerbtn_url1', $_POST['diver_option_headerbtn_url1']);
        update_option('diver_option_headerbtn_bg1', $_POST['diver_option_headerbtn_bg1']);
        update_option('diver_option_headerbtn_color1', $_POST['diver_option_headerbtn_color1']);

        $diver_option_headerbtn_target1 = isset($_POST['diver_option_headerbtn_target1']) ? 1 : 0;
        update_option('diver_option_headerbtn_target1', $diver_option_headerbtn_target1);

        $diver_option_headerbtn_nofollow1 = isset($_POST['diver_option_headerbtn_nofollow1']) ? 1 : 0;
        update_option('diver_option_headerbtn_nofollow1', $diver_option_headerbtn_nofollow1);

        // 2
        $diver_option_headerbtn_hidden2 = isset($_POST['diver_option_headerbtn_hidden2']) ? 1 : 0;
        update_option('diver_option_headerbtn_hidden2', $diver_option_headerbtn_hidden2);

        update_option('diver_option_headerbtn_icon2', $_POST['diver_option_headerbtn_icon2']);
        update_option('diver_option_headerbtn_title2', $_POST['diver_option_headerbtn_title2']);
        update_option('diver_option_headerbtn_url2', $_POST['diver_option_headerbtn_url2']);
        update_option('diver_option_headerbtn_bg2', $_POST['diver_option_headerbtn_bg2']);
        update_option('diver_option_headerbtn_color2', $_POST['diver_option_headerbtn_color2']);

        $diver_option_headerbtn_target2 = isset($_POST['diver_option_headerbtn_target2']) ? 1 : 0;
        update_option('diver_option_headerbtn_target2', $diver_option_headerbtn_target2);

        $diver_option_headerbtn_nofollow2 = isset($_POST['diver_option_headerbtn_nofollow2']) ? 1 : 0;
        update_option('diver_option_headerbtn_nofollow2', $diver_option_headerbtn_nofollow2);

        // 3
        $diver_option_headerbtn_hidden3 = isset($_POST['diver_option_headerbtn_hidden3']) ? 1 : 0;
        update_option('diver_option_headerbtn_hidden3', $diver_option_headerbtn_hidden3);

        update_option('diver_option_headerbtn_icon3', $_POST['diver_option_headerbtn_icon3']);
        update_option('diver_option_headerbtn_title3', $_POST['diver_option_headerbtn_title3']);
        update_option('diver_option_headerbtn_url3', $_POST['diver_option_headerbtn_url3']);
        update_option('diver_option_headerbtn_bg3', $_POST['diver_option_headerbtn_bg3']);
        update_option('diver_option_headerbtn_color3', $_POST['diver_option_headerbtn_color3']);

        $diver_option_headerbtn_target3 = isset($_POST['diver_option_headerbtn_target3']) ? 1 : 0;
        update_option('diver_option_headerbtn_target3', $diver_option_headerbtn_target3);

        $diver_option_headerbtn_nofollow3 = isset($_POST['diver_option_headerbtn_nofollow3']) ? 1 : 0;
        update_option('diver_option_headerbtn_nofollow3', $diver_option_headerbtn_nofollow3);

        // 4
        $diver_option_headerbtn_hidden4 = isset($_POST['diver_option_headerbtn_hidden4']) ? 1 : 0;
        update_option('diver_option_headerbtn_hidden4', $diver_option_headerbtn_hidden4);

        update_option('diver_option_headerbtn_icon4', $_POST['diver_option_headerbtn_icon4']);
        update_option('diver_option_headerbtn_title4', $_POST['diver_option_headerbtn_title4']);
        update_option('diver_option_headerbtn_url4', $_POST['diver_option_headerbtn_url4']);
        update_option('diver_option_headerbtn_bg4', $_POST['diver_option_headerbtn_bg4']);
        update_option('diver_option_headerbtn_color4', $_POST['diver_option_headerbtn_color4']);

        $diver_option_headerbtn_target4 = isset($_POST['diver_option_headerbtn_target4']) ? 1 : 0;
        update_option('diver_option_headerbtn_target4', $diver_option_headerbtn_target4);

        $diver_option_headerbtn_nofollow4 = isset($_POST['diver_option_headerbtn_nofollow4']) ? 1 : 0;
        update_option('diver_option_headerbtn_nofollow4', $diver_option_headerbtn_nofollow4);

        // option
        update_option('diver_option_headerbtn_iconsize', $_POST['diver_option_headerbtn_iconsize']);
        update_option('diver_option_headerbtn_separator', $_POST['diver_option_headerbtn_separator']);
        update_option('diver_option_headerbtn_separator_width', $_POST['diver_option_headerbtn_separator_width']);

        $diver_option_headerbtn_spon = isset($_POST['diver_option_headerbtn_spon']) ? 1 : 0;
        update_option('diver_option_headerbtn_spon', $diver_option_headerbtn_spon);

        $diver_option_headerbtn_pcon = isset($_POST['diver_option_headerbtn_pcon']) ? 1 : 0;
        update_option('diver_option_headerbtn_pcon', $diver_option_headerbtn_pcon);
    }

    $headerbackground = get_theme_mod( 'background-header', '#ffffff');
    $headerlink = get_theme_mod('link-header','#333355');

    $diver_option_headerbtn_icon1 = get_option( 'diver_option_headerbtn_icon1','fa-arrow-circle-right');
    $diver_option_headerbtn_bg1 = get_option( 'diver_option_headerbtn_bg1',$headerbackground);
    $diver_option_headerbtn_color1 = get_option( 'diver_option_headerbtn_color1',$headerlink);

    $diver_option_headerbtn_icon2 = get_option( 'diver_option_headerbtn_icon2','fa-arrow-circle-right');
    $diver_option_headerbtn_bg2 = get_option( 'diver_option_headerbtn_bg2',$headerbackground);
    $diver_option_headerbtn_color2 = get_option( 'diver_option_headerbtn_color2',$headerlink);

    $diver_option_headerbtn_icon3 = get_option( 'diver_option_headerbtn_icon3','fa-arrow-circle-right');
    $diver_option_headerbtn_bg3 = get_option( 'diver_option_headerbtn_bg3',$headerbackground);
    $diver_option_headerbtn_color3 = get_option( 'diver_option_headerbtn_color3',$headerlink);

    $diver_option_headerbtn_icon4 = get_option( 'diver_option_headerbtn_icon4','fa-arrow-circle-right');
    $diver_option_headerbtn_bg4 = get_option( 'diver_option_headerbtn_bg4',$headerbackground);
    $diver_option_headerbtn_color4 = get_option( 'diver_option_headerbtn_color4',$headerlink);

    $diver_option_headerbtn_iconsize = get_option( 'diver_option_headerbtn_iconsize','30');
    $diver_option_headerbtn_separator = get_option( 'diver_option_headerbtn_separator','#d4d4d4');
    $diver_option_headerbtn_separator_width = get_option( 'diver_option_headerbtn_separator_width','1');

?>
<h1 class="diver_option_header">ヘッダーボタン</h1>
<div class="diver_option_desc">ヘッダーに表示されるボタンを設定します。（最大４つまで設定可能です。） ※カスタマイズ > メイン設定 からメニューを独立に設定している場合に表示されます。</div>


<?php
    // 更新完了を通知
    if (isset($_POST['diver_option_headerbtn_title1'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<form method="post" action="">

<div id="header_btn_form_wrap">

    <div class="header_btn_form clearfix">
        <div class="header_btn_form_icon">
            <div id="iconpreview1" class="iconpicker button"><i class="fa <?php echo $diver_option_headerbtn_icon1; ?>" aria-hidden="true"></i></div>　
            <input type="hidden" class="iconpreview1" name="diver_option_headerbtn_icon1" id="diver_option_headerbtn_icon1" value="<?php echo $diver_option_headerbtn_icon1 ?>">
        </div>

        <div class="header_btn_form_meta clearfix">

            <label>タイトル　</label><input type="text" style="width: 100px" name="diver_option_headerbtn_title1" value="<?php echo get_option( 'diver_option_headerbtn_title1') ?>" />　
            <label>背景色　</label><input type="text" name="diver_option_headerbtn_bg1" class="myColorPicker" value="<?php echo $diver_option_headerbtn_bg1 ?>">　
            <label>文字色　</label><input type="text" name="diver_option_headerbtn_color1" class="myColorPicker" value="<?php echo $diver_option_headerbtn_color1 ?>">　　　
            <label><input name="diver_option_headerbtn_hidden1" type="checkbox" id="diver_option_headerbtn_hidden1" value="1" <?php checked(get_option('diver_option_headerbtn_hidden1',0),1); ?> />非表示  </label>　

            <br><br>
            <label>リンク先URL　</label><input type="text" style="width: 350px;" name="diver_option_headerbtn_url1" value="<?php echo get_option( 'diver_option_headerbtn_url1' ) ?>">　
             <label><input name="diver_option_headerbtn_target1" type="checkbox" id="diver_option_headerbtn_target1" value="1" <?php checked(get_option('diver_option_headerbtn_target1',0),1); ?> />target="_blank"  </label>　
            <label><input name="diver_option_headerbtn_nofollow1" type="checkbox" id="diver_option_headerbtn_nofollow1" value="1" <?php checked(get_option('diver_option_headerbtn_nofollow1',0),1); ?> />rel="nofollow"</label>
           
        </div>
    </div>

    <div class="header_btn_form clearfix">
        <div class="header_btn_form_icon">
            <div id="iconpreview2" class="iconpicker button"><i class="fa <?php echo $diver_option_headerbtn_icon2; ?>" aria-hidden="true"></i></div>　
            <input type="hidden" class="iconpreview2" name="diver_option_headerbtn_icon2" id="diver_option_headerbtn_icon2" value="<?php echo $diver_option_headerbtn_icon2 ?>">
        </div>

        <div class="header_btn_form_meta clearfix">

            <label>タイトル　</label><input type="text" style="width: 100px" name="diver_option_headerbtn_title2" value="<?php echo get_option( 'diver_option_headerbtn_title2') ?>" />　
            <label>背景色　</label><input type="text" name="diver_option_headerbtn_bg2" class="myColorPicker" value="<?php echo $diver_option_headerbtn_bg2 ?>">　
            <label>文字色　</label><input type="text" name="diver_option_headerbtn_color2" class="myColorPicker" value="<?php echo $diver_option_headerbtn_color2 ?>">　　　
            <label><input name="diver_option_headerbtn_hidden2" type="checkbox" id="diver_option_headerbtn_hidden2" value="1" <?php checked(get_option('diver_option_headerbtn_hidden2',0),1); ?> />非表示  </label>　

            <br><br>
            <label>リンク先URL　</label><input type="text" style="width: 350px;" name="diver_option_headerbtn_url2" value="<?php echo get_option( 'diver_option_headerbtn_url2' ) ?>">　
             <label><input name="diver_option_headerbtn_target2" type="checkbox" id="diver_option_headerbtn_target2" value="1" <?php checked(get_option('diver_option_headerbtn_target2',0),1); ?> />target="_blank"  </label>　
            <label><input name="diver_option_headerbtn_nofollow2" type="checkbox" id="diver_option_headerbtn_nofollow2" value="1" <?php checked( get_option('diver_option_headerbtn_nofollow2',0),1); ?> />rel="nofollow"</label>
           
        </div>
    </div>

    <div class="header_btn_form clearfix">
        <div class="header_btn_form_icon">
            <div id="iconpreview3" class="iconpicker button"><i class="fa <?php echo $diver_option_headerbtn_icon3; ?>" aria-hidden="true"></i></div>　
            <input type="hidden" class="iconpreview3" name="diver_option_headerbtn_icon3" id="diver_option_headerbtn_icon3" value="<?php echo $diver_option_headerbtn_icon3 ?>">
        </div>

        <div class="header_btn_form_meta clearfix">

            <label>タイトル　</label><input type="text" style="width: 100px" name="diver_option_headerbtn_title3" value="<?php echo get_option( 'diver_option_headerbtn_title3') ?>" />　
            <label>背景色　</label><input type="text" name="diver_option_headerbtn_bg3" class="myColorPicker" value="<?php echo $diver_option_headerbtn_bg3 ?>">　
            <label>文字色　</label><input type="text" name="diver_option_headerbtn_color3" class="myColorPicker" value="<?php echo $diver_option_headerbtn_color3 ?>">　　　
            <label><input name="diver_option_headerbtn_hidden3" type="checkbox" id="diver_option_headerbtn_hidden3" value="1" <?php checked(get_option('diver_option_headerbtn_hidden3',0),1); ?> />非表示  </label>　

            <br><br>
            <label>リンク先URL　</label><input type="text" style="width: 350px;" name="diver_option_headerbtn_url3" value="<?php echo get_option( 'diver_option_headerbtn_url3' ) ?>">　
             <label><input name="diver_option_headerbtn_target3" type="checkbox" id="diver_option_headerbtn_target3" value="1" <?php checked(get_option('diver_option_headerbtn_target3',0),1); ?> />target="_blank"  </label>　
            <label><input name="diver_option_headerbtn_nofollow3" type="checkbox" id="diver_option_headerbtn_nofollow3" value="1" <?php checked( get_option('diver_option_headerbtn_nofollow3',0),1); ?> />rel="nofollow"</label>
           
        </div>
    </div>


    <div class="header_btn_form clearfix">
        <div class="header_btn_form_icon">
            <div id="iconpreview4" class="iconpicker button"><i class="fa <?php echo $diver_option_headerbtn_icon4; ?>" aria-hidden="true"></i></div>　
            <input type="hidden" class="iconpreview4" name="diver_option_headerbtn_icon4" id="diver_option_headerbtn_icon4" value="<?php echo $diver_option_headerbtn_icon4 ?>">
        </div>

        <div class="header_btn_form_meta clearfix">

            <label>タイトル　</label><input type="text" style="width: 100px" name="diver_option_headerbtn_title4" value="<?php echo get_option( 'diver_option_headerbtn_title4') ?>" />　
            <label>背景色　</label><input type="text" name="diver_option_headerbtn_bg4" class="myColorPicker" value="<?php echo $diver_option_headerbtn_bg4 ?>">　
            <label>文字色　</label><input type="text" name="diver_option_headerbtn_color4" class="myColorPicker" value="<?php echo $diver_option_headerbtn_color4 ?>">　　　
            <label><input name="diver_option_headerbtn_hidden4" type="checkbox" id="diver_option_headerbtn_hidden4" value="1" <?php checked(get_option('diver_option_headerbtn_hidden4',0),1); ?> />非表示  </label>　

            <br><br>
            <label>リンク先URL　</label><input type="text" style="width: 350px;" name="diver_option_headerbtn_url4" value="<?php echo get_option( 'diver_option_headerbtn_url4' ) ?>">　
             <label><input name="diver_option_headerbtn_target4" type="checkbox" id="diver_option_headerbtn_target4" value="1" <?php checked(get_option('diver_option_headerbtn_target4',0),1); ?> />target="_blank"  </label>　
            <label><input name="diver_option_headerbtn_nofollow4" type="checkbox" id="diver_option_headerbtn_nofollow4" value="1" <?php checked( get_option('diver_option_headerbtn_nofollow4',0),1); ?> />rel="nofollow"</label>
           
        </div>
    </div>


    <h2 class="diver_option_title">オプション</h2>
    <div class="header_btn_form">
        <label>アイコンサイズ　</label><input type="number" min="0" max="50" width="30px" name="diver_option_headerbtn_iconsize" value="<?php echo $diver_option_headerbtn_iconsize ?>">px　
        <label>区切り線　</label><input type="text" name="diver_option_headerbtn_separator" class="myColorPicker" value="<?php echo $diver_option_headerbtn_separator ?>">　
        <label>区切り線太さ　</label><input type="number" min="0" max="10" width="30px" name="diver_option_headerbtn_separator_width" value="<?php echo $diver_option_headerbtn_separator_width ?>">px　
        <br><br>
        <label><input name="diver_option_headerbtn_pcon" type="checkbox" id="diver_option_headerbtn_pcon" value="1" <?php checked(get_option('diver_option_headerbtn_pcon',1),1); ?> />PCで表示する  </label>　
        <label><input name="diver_option_headerbtn_spon" type="checkbox" id="diver_option_headerbtn_spon" value="1" <?php checked(get_option('diver_option_headerbtn_spon',1),1); ?> />スマホで表示する  </label>　
        <br><br>
    </div>

</div>

<?php submit_button(); ?>
</form>
<script type="text/javascript">
    jQuery(document).ready(function($) {

    $('#header_btn_form_area').sortable();

});
</script>