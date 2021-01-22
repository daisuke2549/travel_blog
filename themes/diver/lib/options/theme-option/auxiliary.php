<h1 class="diver_option_header">入力補助設定</h1>
<div class="diver_option_desc">入力補助の初期値等を設定します。</div>

<?php

$default_color = array("blue","green","red","yellow","orange","white","gray","black","custom");

?>


<!--  *****************************************    

        会話     

*****************************************   -->

<?php
    if (isset($_POST['voice_icon_count'])) {

        update_option('voice_icon_count', $_POST['voice_icon_count']);

        $count = 0;
        $num = 0;
        while($count < $_POST['voice_icon_count']){
            if($_POST['icon'.$count.'-uploader_img']){
                update_option('icon'.$num.'-uploader_img', $_POST['icon'.$count.'-uploader_img']);
                $num++;
            }else{
                delete_option('icon'.$count.'-uploader_img');
            }
            $count++;
        }
        update_option('voice_icon_count', $num);

    }

?>


<h2 class="diver_option_title">会話</h2>
<div class="diver_option_wrap">
<?php
    // 更新完了を通知
    if (isset($_POST['voice_icon_count'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<form method="post" action="">
<div class="form-table">
<style>
.icon img{width: 100px;height: 100px;border-radius: 50%;object-fit: cover;font-family: 'object-fit:cover;';}
.voice{overflow-x: auto;min-width: 100%;}
.iconarea {display: inline-block;padding: 15px;text-align: center;}
.scrollarea {min-width: 90%;background: #fcfcfc;border:2px solid #ccc;margin: 20px 0;}
</style>
    <label for="icon1-uploader_img">デフォルトアイコン設定 <input class="button" type="button" name="icon_add" id="icon_add" value="画像を追加" /></label>
    <div class="voice">
    <div class="scrollarea">
    <?php 
    $count = 0;
    while ($count < get_option('voice_icon_count')): ?>
        <div class="iconarea">
            <div id="preview_icon<?php echo $count; ?>" class="icon">
                <?php if(get_option('icon'.$count.'-uploader_img')): ?>
                    <img src="<?php echo get_option('icon'.$count.'-uploader_img') ?>" style="max-width:100%;max-height:300px;">
                <?php endif; ?>
            </div>
            <input type="text" id="src_icon<?php echo $count; ?>" name="icon<?php echo $count; ?>-uploader_img" value="<?php echo get_option('icon'.$count.'-uploader_img'); ?>" /><br>
            <input class="button" type="button" name="mediauploadbtn" id="icon<?php echo $count; ?>" value="画像を選択" />
            <input class="button" type="button" name="media-clear" id="icon<?php echo $count; ?>" value="クリア" />
        </div>
    <?php 
    $count++;
    endwhile; 
    ?>

    </div>
    <input type="hidden" id="voice_icon_count" name="voice_icon_count" value='<?php echo $count ?>'>
    </div>



</div>
<?php submit_button(); ?>
</form>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
    var count = $("#voice_icon_count").val();

    $('.scrollarea').css('width',200*count+'px');

    $("#icon_add").on("click", function() {
        $(".scrollarea").append('<div class="iconarea"><div id="preview_icon'+count+'" class="icon"><img src="" style="max-width:100%;max-height:300px;"></div><input type="text" id="src_icon'+count+'" name="icon'+count+'-uploader_img" value="" /><br><input class="button" type="button" name="mediauploadbtn" id="icon'+count+'" value="画像を選択" /><input class="button" type="button" name="media-clear" id="icon'+count+'" value="クリア" /></div>');
        count++;
        $("#voice_icon_count").val(count);
        $('.scrollarea').css('width',200*count+'px');
    });
});
</script>

<!--  *****************************************    

        見出し     

*****************************************   -->

 <?php
    if (isset($_POST['diver_op_heading_defcolor'])) {
        update_option('diver_op_heading_bgcolor', $_POST['diver_op_heading_bgcolor']);
        update_option('diver_op_heading_textcolor', $_POST['diver_op_heading_textcolor']);
        update_option('diver_op_heading_defcolor', $_POST['diver_op_heading_defcolor']);
        update_option('diver_op_heading_bordercolor', $_POST['diver_op_heading_bordercolor']);
    }
    $diver_op_heading_bgcolor = get_option('diver_op_heading_bgcolor','#efefef');
    $diver_op_heading_textcolor = get_option('diver_op_heading_textcolor','#333');
    $diver_op_heading_defcolor = get_option('diver_op_heading_defcolor','blue');
    $diver_op_heading_bordercolor = get_option('diver_op_heading_bordercolor','#1e73be');
?>


<h2 class="diver_option_title">見出し</h2>
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

    <div class="oricolorarea">

    <tr>
        <th scope="row">初期設定色</th>
        <td>
 
        <?php foreach ($default_color as $value) : ?>
            <label><input type="radio" id="diver_op_badge_defcolor" name="diver_op_heading_defcolor" value="<?php echo $value; ?>" <?php checked($value,$diver_op_heading_defcolor); ?>><span class="<?php echo $value; ?> colorsample"></span></label>
        <?php endforeach;?>

        </td>
    </tr>
    </div>

    <tr>
        <th scope="row">カスタム背景色</th>
        <td>
        <label><input type="text" name="diver_op_heading_bgcolor" class="myColorPicker" value="<?php echo $diver_op_heading_bgcolor ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">カスタム文字色</th>
        <td>
        <label><input type="text" name="diver_op_heading_textcolor" class="myColorPicker" value="<?php echo $diver_op_heading_textcolor ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">カスタム枠線</th>
        <td>
        <label><input type="text" name="diver_op_heading_bordercolor" class="myColorPicker" value="<?php echo $diver_op_heading_bordercolor ?>"></label>
        </td>
    </tr>

</table>
<?php submit_button(); ?>
</form>
</div> 

<!--  *****************************************    

        ボタン     

*****************************************   -->


<?php
    if (isset($_POST['diver_op_btn_bgcolor'])) {
        update_option('diver_op_btn_bgcolor', $_POST['diver_op_btn_bgcolor']);
        update_option('diver_op_btn_textcolor', $_POST['diver_op_btn_textcolor']);
        update_option('diver_op_btn_style2', $_POST['diver_op_btn_style2']);
        update_option('diver_op_btn_size', $_POST['diver_op_btn_size']);
        update_option('diver_op_btn_bordercolor', $_POST['diver_op_btn_bordercolor']);
        update_option('diver_op_btn_defcolor', $_POST['diver_op_btn_defcolor']);
    }
    $diver_op_btn_bgcolor = get_option('diver_op_btn_bgcolor','#607d8b');
    $diver_op_btn_textcolor = get_option('diver_op_btn_textcolor','#fff');
    $diver_op_btn_style2 = get_option('diver_op_btn_style2','block');
    $diver_op_btn_size = get_option('diver_op_btn_size','midium');
    $diver_op_btn_bordercolor = get_option('diver_op_btn_bordercolor','#607d8b');
    $diver_op_btn_defcolor = get_option('diver_op_btn_defcolor','blue');
?>


<h2 class="diver_option_title">ボタン</h2>
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

    <div class="oricolorarea">

    <tr>
        <th scope="row">初期設定色</th>
        <td>
 
        <?php foreach ($default_color as $value) : ?>
            <label><input type="radio" id="editer_diver_sc_btnori_color" name="diver_op_btn_defcolor" value="<?php echo $value; ?>" <?php checked($value,$diver_op_btn_defcolor); ?>><span class="<?php echo $value; ?> colorsample"></span></label>
        <?php endforeach;?>

           </td>
    </tr>
    </div>

    <tr>
        <th scope="row">カスタム背景色</th>
        <td>
        <label><input type="text" name="diver_op_btn_bgcolor" class="myColorPicker" value="<?php echo $diver_op_btn_bgcolor ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">カスタム文字色</th>
        <td>
        <label><input type="text" name="diver_op_btn_textcolor" class="myColorPicker" value="<?php echo $diver_op_btn_textcolor ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">カスタム枠線色</th>
        <td>
        <label><input type="text" name="diver_op_btn_bordercolor" class="myColorPicker" value="<?php echo $diver_op_btn_bordercolor ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">オプション</th>
        <td><p>
        <label><input name="diver_op_btn_style2" type="radio" value="block" <?php checked('block',$diver_op_btn_style2); ?>/>ブロック</label>　
        <label><input name="diver_op_btn_style2" type="radio" value="inline" <?php checked('inline',$diver_op_btn_style2); ?>/>インライン</label>
        <label><input name="diver_op_btn_style2" type="radio" value="big" <?php checked('big',$diver_op_btn_style2); ?>/>フルサイズ</label>
        </p></td>
    </tr>

    <tr>
        <th scope="row">大きさ</th>
        <td><p>
        <label><input name="diver_op_btn_size" type="radio" value="big" <?php checked('big',$diver_op_btn_size); ?>/>大</label>　
        <label><input name="diver_op_btn_size" type="radio" value="midium" <?php checked('midium',$diver_op_btn_size); ?>/>中</label>
        <label><input name="diver_op_btn_size" type="radio" value="small" <?php checked('small',$diver_op_btn_size); ?>/>小</label>
        </p></td>
    </tr>


</table>
<?php submit_button(); ?>
</form>
</div> 

<!--  *****************************************    

        バッジ     

*****************************************   -->

 <?php
    if (isset($_POST['diver_op_badge_bgcolor'])) {
        update_option('diver_op_badge_bgcolor', $_POST['diver_op_badge_bgcolor']);
        update_option('diver_op_badge_textcolor', $_POST['diver_op_badge_textcolor']);
        update_option('diver_op_badge_defcolor', $_POST['diver_op_badge_defcolor']);
    }
    $diver_op_badge_bgcolor = get_option('diver_op_badge_bgcolor','#607d8b');
    $diver_op_badge_textcolor = get_option('diver_op_badge_textcolor','#fff');
    $diver_op_badge_defcolor = get_option('diver_op_badge_defcolor','red');
?>


<h2 class="diver_option_title">バッジ</h2>
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

    <div class="oricolorarea">

    <tr>
        <th scope="row">初期設定色</th>
        <td>
 
        <?php foreach ($default_color as $value) : ?>
            <label><input type="radio" id="diver_op_badge_defcolor" name="diver_op_badge_defcolor" value="<?php echo $value; ?>" <?php checked($value,$diver_op_badge_defcolor); ?>><span class="<?php echo $value; ?> colorsample"></span></label>
        <?php endforeach;?>

        </td>
    </tr>
    </div>

    <tr>
        <th scope="row">カスタム背景色</th>
        <td>
        <label><input type="text" name="diver_op_badge_bgcolor" class="myColorPicker" value="<?php echo $diver_op_badge_bgcolor ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">カスタム文字色</th>
        <td>
        <label><input type="text" name="diver_op_badge_textcolor" class="myColorPicker" value="<?php echo $diver_op_badge_textcolor ?>"></label>
        </td>
    </tr>

</table>
<?php submit_button(); ?>
</form>
</div> 

<!--  *****************************************    

        囲い枠     

*****************************************   -->

<?php
    if (isset($_POST['diver_op_frame_bgcolor'])) {
        update_option('diver_op_frame_bgcolor', $_POST['diver_op_frame_bgcolor']);
        update_option('diver_op_frame_textcolor', $_POST['diver_op_frame_textcolor']);
        update_option('diver_op_frame_headercolor', $_POST['diver_op_frame_headercolor']);
        update_option('diver_op_frame_headertxtcolor', $_POST['diver_op_frame_headertxtcolor']);
        update_option('diver_op_frame_bordercolor', $_POST['diver_op_frame_bordercolor']);
        update_option('diver_op_frame_defcolor', $_POST['diver_op_frame_defcolor']);
    }
    $diver_op_frame_bgcolor = get_option('diver_op_frame_bgcolor','#fff');
    $diver_op_frame_textcolor = get_option('diver_op_frame_textcolor','#333');
    $diver_op_frame_headercolor = get_option('diver_op_frame_headercolor','#ccc');
    $diver_op_frame_headertxtcolor = get_option('diver_op_frame_headertxtcolor','#fff');
    $diver_op_frame_bordercolor = get_option('diver_op_frame_bordercolor','#ccc');
    $diver_op_frame_defcolor = get_option('diver_op_frame_defcolor','orange');

?>

<h2 class="diver_option_title">囲い枠</h2>
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

<?php 
        $diver_op_frame_style = get_option('diver_op_frame_style','0');
?>
    <div class="oricolorarea">

    <tr>
        <th scope="row">初期設定色</th>
        <td>
 
        <?php foreach ($default_color as $value) : ?>
            <label><input type="radio" id="diver_op_frame_defcolor" name="diver_op_frame_defcolor" value="<?php echo $value; ?>" <?php checked($value,$diver_op_frame_defcolor); ?>><span class="<?php echo $value; ?> colorsample"></span></label>
        <?php endforeach;?>

        </td>
    </tr>
    </div>

    <tr>
        <th scope="row">カスタム背景色</th>
        <td>
        <label><input type="text" name="diver_op_frame_bgcolor" class="myColorPicker" value="<?php echo $diver_op_frame_bgcolor ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">カスタム文字色</th>
        <td>
        <label><input type="text" name="diver_op_frame_textcolor" class="myColorPicker" value="<?php echo $diver_op_frame_textcolor ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">カスタム見出し背景色</th>
        <td>
        <label><input type="text" name="diver_op_frame_headercolor" class="myColorPicker" value="<?php echo $diver_op_frame_headercolor ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">カスタム見出し文字色</th>
        <td>
        <label><input type="text" name="diver_op_frame_headertxtcolor" class="myColorPicker" value="<?php echo $diver_op_frame_headertxtcolor ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">カスタム枠線色</th>
        <td>
        <label><input type="text" name="diver_op_frame_bordercolor" class="myColorPicker" value="<?php echo $diver_op_frame_bordercolor ?>"></label>
        </td>
    </tr>

</table>
<?php submit_button(); ?>
</form>
</div> 

<!--  *****************************************    

        区切り線     

*****************************************   -->

<!-- 
<?php
    if (isset($_POST['diver_op_line_width'])) {
        update_option('diver_op_line_width', $_POST['diver_op_line_width']);
        update_option('diver_op_line_color', $_POST['diver_op_line_color']);
        update_option('diver_op_line_style', $_POST['diver_op_line_style']);
    }
    $diver_op_line_width = get_option('diver_op_line_width','2');
    $diver_op_line_color = get_option('diver_op_line_color','#ccc');
    $diver_op_line_style = get_option('diver_op_line_style','solid');
?>

<h2 class="diver_option_title">区切り線</h2>
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
        <th scope="row">太さ</th>
        <td>
        <label><input type="number" name="diver_op_line_width" value="<?php echo $diver_op_line_width ?>">px</label>
        </td>
    </tr>


    <tr>
        <th scope="row">色</th>
        <td>
        <label><input type="text" name="diver_op_line_color" class="myColorPicker" value="<?php echo $diver_op_line_color ?>"></label>
        </td>
    </tr>

    <tr>
        <th scope="row">スタイル</th>
        <td><p>
        <label><input name="diver_op_line_style" type="radio" value="solid" <?php checked('solid',$diver_op_line_style); ?>/>一本線</label>　
        <label><input name="diver_op_line_style" type="radio" value="dotted" <?php checked('dotted',$diver_op_line_style); ?>/>点線</label>
        <label><input name="diver_op_line_style" type="radio" value="double" <?php checked('double',$diver_op_line_style); ?>/>二本線</label>
        </p></td>
    </tr>

</table>
<?php submit_button(); ?>
</form>
</div> -->
<style>
    span.colorsample {
        width: 30px;
        height: 15px;
        border-radius: 3px;
        display: inline-block;
        margin-right:15px;
        vertical-align: text-top;
        border: 1px solid #ccc;
    }

    .colorsample.white {background: #fff;}
    .colorsample.black{background: #000;}
    .colorsample.blue{background: #70b8f1;}
    .colorsample.red{background: #ff8178;}
    .colorsample.yellow{background: #ffe822;}
    .colorsample.orange{background: #ffa30d;}
    .colorsample.green{background: #2ac113;}
    .colorsample.gray{background: #ccc;}

    .colorsample.custom{width: auto;border: none;}
    .colorsample.custom:before { content: "カスタム";}
</style>