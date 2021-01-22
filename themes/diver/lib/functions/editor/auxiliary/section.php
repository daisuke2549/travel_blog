<style>
    
.dvaux_section {
    padding: 60px 40px;
    position: relative;
    background-color: #006799;
    color: #fff;
    margin-bottom: 60px;
    background-repeat: repeat;
    background-position: center;
}

.dvaux_section.normal {
    margin-bottom: 0;
}

.dvaux_section::after {
    position: absolute;
    content: '';
    pointer-events: none;
    z-index: 1;
}

.dvaux_section.balloon::after{
    bottom: -40px;
    z-index: 10;
    background: inherit;
    left: 50%;    
    width: 80px;
    height: 80px;
    -webkit-transform: translateX(-50%) rotate(45deg);
    transform: translateX(-50%) rotate(45deg);
}

.dvaux_section.slope1::after{
    bottom: -50px;
    left: -5%;
    right: 0px;
    width: 110%;
    height: 50px;
    background: inherit;
    -webkit-transform-origin: left center;
    -ms-transform-origin: left center;
    transform-origin: left center;
    -webkit-transform: rotate(-3deg);
    -ms-transform: rotate(-3deg);
    transform: rotate(-3deg);
}
.dvaux_section.slope2::after{
    bottom: 0px;
    left: -5%;
    right: 0px;
    width: 110%;
    height: 50px;
    background: inherit;
    -webkit-transform-origin: left center;
    -ms-transform-origin: left center;
    -webkit-transform: rotate(3deg);
    -ms-transform: rotate(3deg);
    transform: rotate(3deg);
}

.dvaux_section.radius::after{
    bottom: -30px;
    left: 0;
    width: 100%;
    height: 60px;
    background: inherit;
    border-radius: 0 0 50% 50%;
}
.wp-picker-holder {
    position: absolute;
    z-index: 999;
}

</style>
<div class="diver_editor_popup_title">セクション<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
<div id="diver_editor_popup">
<form  action="" id="diver_voice_form">
    <div class="auxiliary_scroll_area">

    <div class="harf">
        <label class="auxiliary_label">タイプ</label>
        <label><input type="radio" id="editer_diver_sc_section_type" name="editer_diver_sc_section_type" checked="checked" value="normal">シンプル　</label><label><input type="radio" id="editer_diver_sc_section_type" name="editer_diver_sc_section_type" value="bgimage">背景画像　</label>
    </div>
    <div class="harf">
        <label class="auxiliary_label">背景色</label>
        <label><input type="text" id="editer_diver_section_bgColor" name="editer_diver_section_bgColor" value="#006799"></label>

    </div>
    <br><br>

    <div class="section_style">

        <label class="auxiliary_label">スタイル</label>
        <label><input type="radio" id="editer_diver_sc_section_style" name="editer_diver_sc_section_style" checked="checked" value="normal">シンプル　</label>
        <label><input type="radio" id="editer_diver_sc_section_style" name="editer_diver_sc_section_style" value="balloon">吹き出し　</label>
        <label><input type="radio" id="editer_diver_sc_section_style" name="editer_diver_sc_section_style" value="slope1">斜め１　</label>
        <label><input type="radio" id="editer_diver_sc_section_style" name="editer_diver_sc_section_style" value="slope2">斜め２　</label>
        <label><input type="radio" id="editer_diver_sc_section_style" name="editer_diver_sc_section_style" value="radius">丸み</label>

    </div>

    <div class="section_style_bgimage" style="display: none">
        <div class="harf">
            <label class="auxiliary_label">ポジション</label>
            <label><input type="radio" id="editer_diver_sc_section_position" name="editer_diver_sc_section_position" checked="checked" value="center">中　</label>
            <label><input type="radio" id="editer_diver_sc_section_position" name="editer_diver_sc_section_position" value="top">上　</label>
            <label><input type="radio" id="editer_diver_sc_section_position" name="editer_diver_sc_section_position" value="bottom">下　</label>
            <label><input type="radio" id="editer_diver_sc_section_position" name="editer_diver_sc_section_position" value="left">左　</label>
            <label><input type="radio" id="editer_diver_sc_section_position" name="editer_diver_sc_section_position" value="right">右</label>
        </div>
        <div class="harf">
            <label class="auxiliary_label">繰り返し</label>
            <label><input type="radio" id="editer_diver_sc_section_repeat" name="editer_diver_sc_section_repeat" checked="checked" value="repeat">繰り返し　</label>
            <label><input type="radio" id="editer_diver_sc_section_repeat" name="editer_diver_sc_section_repeat" value="no-repeat">繰り返さない</label>
        </div>
        <br><br>
        <div class="harf">
            <label class="auxiliary_label">背景画像</label>
            <div id="image-box"><img /></div>
            <a class="media-upload-section button" href="JavaScript:void(0);" rel="editer_diver_sc_section_bgimage">選択</a>
            <input type="hidden" id="editer_diver_sc_section_bgimage" name="editer_diver_sc_section_bgimage" value="" style="width: 80px;" />
        </div>
        <div class="harf">
            <div class="harf">
                <label class="auxiliary_label">背景画像 : 高さ</label>
                <label><input type="radio" id="editer_diver_sc_section_bgsize_height" name="editer_diver_sc_section_bgsize_height" checked="checked" value="auto">auto　</label>
                <label><input type="radio" id="editer_diver_sc_section_bgsize_height" name="editer_diver_sc_section_bgsize_height" value="balloon">カスタム</label>

                <div class="height_custom" style="display: none;">
                    <input type="number" id="editer_diver_sc_section_bgsize_height_custom" style="width:4em" value="100" min="0"/>
                    <select id="editer_diver_sc_section_bgsize_height_custom_unit" name="editer_diver_sc_section_bgsize_height_custom_unit">
                        <option value="%">%</option>
                        <option value="px">px</option>
                    </select>
                </div>
            </div>
            <div class="harf">
                <label class="auxiliary_label">背景画像 : 横幅</label>
                <input type="radio" id="editer_diver_sc_section_bgsize_width" name="editer_diver_sc_section_bgsize_width" checked="checked" value="auto">auto　
                <input type="radio" id="editer_diver_sc_section_bgsize_width" name="editer_diver_sc_section_bgsize_width" value="balloon">カスタム

                <div class="width_custom" style="display: none;">
                    <input type="number" id="editer_diver_sc_section_bgsize_width_custom" style="width:4em" value="100" min="0"/>
                    <select id="editer_diver_sc_section_bgsize_width_custom_unit" name="editer_diver_sc_section_bgsize_width_custom_unit">
                        <option value="%">%</option>
                        <option value="px">px</option>
                    </select>
                </div>
            </div>　
        </div>
            <br>
    </div>

    <br><br>


   プレビュー(実際の見た目とは若干異なる場合があります)
    <div class="preview_area">
        <div id="dvaux_section" class="dvaux_section normal">
            コンテンツコンテンツコンテンツコンテンツコンテンツ
        </div>
   </div>
   
    </div>
    <div class="submitbox">
        <div id="wp-link-cancel">
            <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
        </div>
        <div id="wp-link-update">
            <input type="submit" value="セクションを挿入する" class="button button-primary" id="diver_ei_btn_yes">
        </div>
    </div>
</form>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {

    var background_image = "";

    $('.media-upload-section').each(function(){
        var rel = jQuery(this).attr("rel");
        $(this).click(function(){
            window.send_to_editor = function(html) {
                html = '<div>' + html + '</div>';
                imgurl = jQuery('img', html).attr("src");
                jQuery('#'+rel).val(imgurl);
                $("#image-box").children("img").attr('src',imgurl);
                $("#dvaux_section").css('background-image','url('+imgurl+')');
                background_image = imgurl;
                tb_remove();
            }   
            formfield = jQuery('#'+rel).attr('name');
            tb_show(null, 'media-upload.php?post_id=0&type=image&TB_iframe=true');
            return false;
        }); 
    });

    $("#editer_diver_section_bgColor").wpColorPicker({
        palettes:   true,
        change:     function( event, ui ) {
            $('#dvaux_section').css('background-color',$( this ).wpColorPicker( 'color' ));
        }
    });


    $('input[name="editer_diver_sc_section_style"]:radio').on('change', function(){
        $('#dvaux_section').removeClass().addClass("dvaux_section "+$(this).val());
    });

    $('input[name="editer_diver_sc_section_position"]:radio').on('change', function(){
        $('#dvaux_section').css("background-position",$(this).val());
    });

    $('input[name="editer_diver_sc_section_repeat"]:radio').on('change', function(){
        $('#dvaux_section').css("background-repeat",$(this).val());
    });

    var background_size_width = "auto";
    var background_size_height = "auto";

    $('input[name="editer_diver_sc_section_bgsize_height"]:radio').on('change', function(){
        if($(this).val()=="auto"){
            $('.height_custom').fadeOut('slow');

            background_size_height = "auto";

        }else{
            $('.height_custom').fadeIn('slow');

            background_size_height = $('#editer_diver_sc_section_bgsize_height_custom').val()+$('#editer_diver_sc_section_bgsize_height_custom_unit').val();
        }
        $('#dvaux_section').css("background-size",background_size_width+" "+background_size_height);
    });

    $('input[name="editer_diver_sc_section_bgsize_width"]:radio').on('change', function(){
        if($(this).val()=="auto"){
            $('.width_custom').fadeOut('slow');
            background_size_width = "auto";
        }else{
            $('.width_custom').fadeIn('slow');
            background_size_width = $('#editer_diver_sc_section_bgsize_width_custom').val()+$('#editer_diver_sc_section_bgsize_width_custom_unit').val();

        }
        $('#dvaux_section').css("background-size",background_size_width+" "+background_size_height);

    });

    $('input[id="editer_diver_sc_section_bgsize_width_custom"]').on('input', function(){
        background_size_width = $(this).val()+$('#editer_diver_sc_section_bgsize_width_custom_unit').val();
        $('#dvaux_section').css("background-size",background_size_width+" "+background_size_height);
    });
    $('select[name="editer_diver_sc_section_bgsize_width_custom_unit"]').on('change', function(){
        background_size_width = $('#editer_diver_sc_section_bgsize_width_custom').val()+$(this).val();        
        $('#dvaux_section').css("background-size",background_size_width+" "+background_size_height);
    });
    $('input[id="editer_diver_sc_section_bgsize_height_custom"]').on('input', function(){
        background_size_height = $(this).val()+$('#editer_diver_sc_section_bgsize_height_custom_unit').val();        
        $('#dvaux_section').css("background-size",background_size_width+" "+background_size_height);
    });
    $('select[name="editer_diver_sc_section_bgsize_height_custom_unit"]').on('change', function(){
        background_size_height = $('#editer_diver_sc_section_bgsize_height_custom').val()+$(this).val();          
        $('#dvaux_section').css("background-size",background_size_width+" "+background_size_height);
    });


    $('input[name="editer_diver_sc_section_type"]:radio').on('change', function(){
        if($(this).val()=="bgimage"){

            $('.section_style_bgimage').fadeIn('slow');
            $('.section_style').hide();

            $('#dvaux_section').removeClass().addClass("dvaux_section normal");
            $('#dvaux_section').css("background-image","url("+background_image+")");

        }else{
            $('.section_style').fadeIn('slow');
            $('.section_style_bgimage').hide();
            $('#dvaux_section').css("background-image","none");
        }
    });

});


</script>