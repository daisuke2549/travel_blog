<style>
#mediapreview{
    max-width:300px;
    max-height:300px;
}

.diver_footerbar_menu{
    float: left;
    width: 280px;
    background: #fff;
}


.diver_footerbar_menu ul{
    margin: 0;
    box-shadow: 0 1px 1px rgba(0,0,0,.04);
    border: 1px solid #e5e5e5;
}

.diver_footerbar_menu li{
    padding:1em 0;
    padding-left:1.5em; 
    margin: 0;
    border-bottom: 1px solid #ccc;
}

.diver_option_wrap{
    margin-left: 300px;
}

.diver_footerbar_list{
    margin-bottom: 10px;
    overflow: hidden;
}

.diver_option_wrap .diver_footerbar_list_title{
    border: 1px solid #ddd;
    position: relative;
    padding: 10px 15px;
    height: auto;
    min-height: 20px;
    width: 382px;
    line-height: 30px;
    overflow: hidden;
    word-wrap: break-word;
    background: #fafafa;
}

.diver_option_wrap .diver_footerbar_list_content{
    background: #fff;
    padding: 10px 15px;
    width: 382px;
    box-shadow: 0 1px 1px rgba(0,0,0,.04);
    border: 1px solid #e5e5e5;
}

.diver_footerbar_menu_title{
    padding:1em 1.5em;
    background: #f5f5f5;
    box-shadow: 0 1px 1px rgba(0,0,0,.04);
    border: 1px solid #e5e5e5;
}

.diver_option_wrap{
    box-shadow: 0 1px 1px rgba(0,0,0,.04);
    border: 1px solid #e5e5e5;
}

.diver_footerbar_list_content{
    display: none;
}

.diver_footerbar_menu li:hover {
    background: #fafafa;
}

.diver_option_wrap_title {
    padding: 1em 1.5em;
    background: #f5f5f5;
    box-shadow: 0 1px 1px rgba(0,0,0,.04);
    border-bottom: 1px solid #e5e5e5;
    margin: -1em -2em 2em -2em;
}

.delete_list {
    color: #f00;
    text-decoration: underline;
    text-align: right;
}

input[type=text], input[type=search], input[type=radio], input[type=tel], input[type=time], input[type=url], input[type=week], input[type=password], input[type=checkbox], input[type=color], input[type=date], input[type=datetime], input[type=datetime-local], input[type=email], input[type=month], input[type=number]{
    width: 100%;
}

</style>
<?php
// POSTデータがあれば設定を更新
    $data = $_POST;
    if (isset($_POST['footer_bar_input'])) {
        update_option('diver_footerbar', wp_unslash($_POST));
    }
    $diver_footerbar = get_option('diver_footerbar');
?>
<?php
    // 更新完了を通知
    if (isset($_POST['footer_bar_input'])) {
        echo '<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p></div>';
    }
?>

<h1 class="diver_option_header">フッターメニュー設定</h1>
<div class="diver_option_desc">
    スマートフォン表示の際に、フッターに固定されるメニューの設定を行います。
</div>

<div class="diver_footerbar_menu_wrap">
<div class="diver_footerbar_menu">
<div class="diver_footerbar_menu_title">項目一覧</div>
<ul>
<li id="diver_footerbar_menu_custom">カスタムリンク</li>
<li id="diver_footerbar_menu_drawer"><i class="fa fa-bars" aria-hidden="true"></i>　ドロワーメニュー</li>
<li id="diver_footerbar_menu_sns"><i class="fa fa-share-alt" aria-hidden="true"></i>　SNS共有</li>
<li id="diver_footerbar_menu_tel"><i class="fa fa-phone" aria-hidden="true"></i>　電話番号</li>
<li id="diver_footerbar_menu_top"><i class="fa fa-chevron-up" aria-hidden="true"></i>　ページ上部に戻る</li>
</ul>
</div>


<div class="diver_option_wrap">
<div class="diver_option_wrap_title">選択中項目</div>
ドラッグで並び変えることができます。<br><br>
<form method="post" action="">

<div id="diver_footerbar_menu_contents">
<input type="hidden" name="footer_bar_input" value="1">
<?php
$count = 0;
foreach ((array)$diver_footerbar as $key => $value) {
    switch (substr($key, 0, -1)) {
    case 'diver_footerbar_custom_': 
        foreach ($value as $k => $v) {
            if($k=='icon'){
                $icon = $v;
            }elseif($k=='url'){
                $url = $v;
            }elseif($k=='title'){
                $title = $v;
            }
        }
        $count++;
    ?>
        <div class="diver_footerbar_list">
            <div class="diver_footerbar_list_title"><i class="fa <?php echo $icon; ?>"></i>　<?php echo $title ?></div>
            <div class="diver_footerbar_list_content">
                アイコン　<div id="<?php echo $key; ?>" class="iconpicker button"><i class="fa <?php echo $icon; ?>" aria-hidden="true"></i></div>　<input type="hidden" class="<?php echo $key; ?>" name="<?php echo $key; ?>[icon]" value="<?php echo $icon; ?>" />
                <p>タイトル<br><input type="text" name="<?php echo $key; ?>[title]" value="<?php echo $title; ?>" /></p>
                <p>リンク先URL<br><input type="text" name="<?php echo $key; ?>[url]" value="<?php echo $url; ?>" /></p>
                <div class="delete_list">削除する</div>
            </div>
        </div>
    <?php
        break;


    case 'diver_footerbar_drawer_':  
        foreach ($value as $k => $v) {
            if($k=='title'){
                $title = $v;
            }
        }
        $count++;
    ?>
        <div class="diver_footerbar_list">
            <div class="diver_footerbar_list_title"><i class="fa fa-bars" aria-hidden="true"></i>　ドロワーメニュー</div>
                <div class="diver_footerbar_list_content">
                    <p>タイトル<br><input type="text" name="<?php echo $key; ?>[title]" value="<?php echo $title; ?>" /></p>
                    <div class="delete_list">削除する</div>
                </div>
        </div>
    <?php break;
    
    case 'diver_footerbar_tel_': 
        foreach ($value as $k => $v) {
            if($k=='tel'){
                $tel = $v;
            }elseif($k=='title'){
                $title = $v;
            }
        }
        $count++;
    ?>
        <div class="diver_footerbar_list">
            <div class="diver_footerbar_list_title"><i class="fa fa-phone" aria-hidden="true"></i>　電話番号</div>
            <div class="diver_footerbar_list_content">
                <p>タイトル<br><input type="text" name="<?php echo $key; ?>[title]" value="<?php echo $title; ?>" /></p>
                <p>電話番号<br><input type="text" name="<?php echo $key; ?>[tel]" value="<?php echo $tel ?>" /></p>
                <div class="delete_list">削除する</div>
            </div>
        </div>
    <?php break;

    case 'diver_footerbar_top_': 
        foreach ($value as $k => $v) {
            if($k=='tel'){
                $tel = $v;
            }elseif($k=='title'){
                $title = $v;
            }
        }
        $count++;
    ?>
        <div class="diver_footerbar_list">
            <div class="diver_footerbar_list_title"><i class="fa fa-chevron-up" aria-hidden="true"></i>　ページ上部に</div>
            <div class="diver_footerbar_list_content">
                <p>タイトル<br><input type="text" name="<?php echo $key; ?>[title]" value="<?php echo $title; ?>" /></p>
                <div class="delete_list">削除する</div>
            </div>
        </div>
    <?php break;

    case 'diver_footerbar_sns_':  
        foreach ($value as $k => $v) {
            if($k=='title'){
                $title = $v;
            }
        }
        $count++;
    ?>
        <div class="diver_footerbar_list">
            <div class="diver_footerbar_list_title"><i class="fa fa-share-alt" aria-hidden="true"></i>　SNS共有</div>
                <div class="diver_footerbar_list_content">
                    <p>タイトル<br><input type="text" name="<?php echo $key; ?>[title]" value="<?php echo $title; ?>" /></p>
                    <div class="delete_list">削除する</div>
                </div>
        </div>
    <?php break;

}
}

?>
</div>
<input type="hidden" id="footer_menu_count" value='<?php echo $count ?>'>
<script>
jQuery(document).ready(function($) {
    $('#diver_footerbar_menu_contents').sortable();

    $('.iconpicker').iconpicker('.iconpicker');

    $(document).on("click", ".diver_footerbar_list_title", function() {
        $(this).next().slideToggle('fast');
    });

    var count = $("#footer_menu_count").val();

    $(document).on("click", ".delete_list", function() {
        if(!confirm('本当に削除しますか？')){
            return false;
        }else{
             $(this).delay(300).queue(function(){
                 $(this).parent().parent().remove();
             });
             count--;
             $("#footer_menu_count").val(count);
        }
    });

    $(document).on("click", ".reset_list", function(event) {
        event.preventDefault();
        if(!confirm('本当にリセットしますか？')){
            return false;
        }else{
             count=0;
             $("#footer_menu_count").val(count);
             $(".diver_footerbar_list").remove();
             $('input[name="footer_bar_input"]').val('');
        }
    });



    $("#diver_footerbar_menu_custom").on("click", function() {
        if(count < 5){
            $("#diver_footerbar_menu_contents").prepend('<div class="diver_footerbar_list"><div class="diver_footerbar_list_title">カスタムリンク</div><div class="diver_footerbar_list_content">アイコン　<div id="diver_footerbar_custom_icon_'+count+'" class="iconpicker button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>　<input type="hidden" class="diver_footerbar_custom_icon_'+count+'" name="diver_footerbar_custom_'+count+'[icon]" value="fa-arrow-circle-right" /><p>タイトル<br><input type="text" name="diver_footerbar_custom_'+count+'[title]" value="" /></p><p>リンク先URL<br><input type="text" name="diver_footerbar_custom_'+count+'[url]" value="" /></p><div class="delete_list">削除する</div></div></div>');
            count++;
            $("#footer_menu_count").val(count);
        }else{
            alert('最大５つまでです。');
        }
    });

    $("#diver_footerbar_menu_drawer").on("click", function() {
        if(count < 5){
            $("#diver_footerbar_menu_contents").prepend('<div class="diver_footerbar_list"><div class="diver_footerbar_list_title"><i class="fa fa-bars" aria-hidden="true"></i>　ドロワーメニュー</div><div class="diver_footerbar_list_content"><p>タイトル<br><input type="text" name="diver_footerbar_drawer_'+count+'[title]" value="メニュー" /></p><div class="delete_list">削除する</div></div></div>');
            count++;
            $("#footer_menu_count").val(count);

        }else{
            alert('最大５つまでです。');
        }
    });

    $("#diver_footerbar_menu_sns").on("click", function() {
        if(count < 5){
            $("#diver_footerbar_menu_contents").prepend('<div class="diver_footerbar_list"><div class="diver_footerbar_list_title"><i class="fa fa-share-alt" aria-hidden="true"></i>　SNS共有</div><div class="diver_footerbar_list_content"><p>タイトル<br><input type="text" name="diver_footerbar_sns_'+count+'[title]" value="シェア" /></p><div class="delete_list">削除する</div></div></div>');
            count++;
            $("#footer_menu_count").val(count);

        }else{
            alert('最大５つまでです。');
        }
    });

    $("#diver_footerbar_menu_tel").on("click", function() {
        if(count < 5){
            $("#diver_footerbar_menu_contents").prepend('<div class="diver_footerbar_list"><div class="diver_footerbar_list_title"><i class="fa fa-phone" aria-hidden="true"></i>　電話番号</div><div class="diver_footerbar_list_content"><p>タイトル<br><input type="text" name="diver_footerbar_tel_'+count+'[title]" value="電話" /></p><p>電話番号<br><input type="text" name="diver_footerbar_tel_'+count+'[tel]" value="" /></p><div class="delete_list">削除する</div></div></div>');
            count++;
            $("#footer_menu_count").val(count);
        }else{
            alert('最大５つまでです。');
        }
    });

    $("#diver_footerbar_menu_top").on("click", function() {
        if(count < 5){
            $("#diver_footerbar_menu_contents").prepend('<div class="diver_footerbar_list"><div class="diver_footerbar_list_title"><i class="fa fa-chevron-up" aria-hidden="true"></i>　ページ上部に戻る</div><div class="diver_footerbar_list_content"><p>タイトル<br><input type="text" name="diver_footerbar_top_'+count+'[title]" value="トップ" /></p><div class="delete_list">削除する</div></div></div>');
            count++;
            $("#footer_menu_count").val(count);
        }else{
            alert('最大５つまでです。');
        }
    });
});



</script>
<div style="width:100px;display:inline-block"><?php submit_button(); ?></div>
<a href="" class="reset_list" style="display: inline-block;">リセットする</a>

</form>

</div>
</div>