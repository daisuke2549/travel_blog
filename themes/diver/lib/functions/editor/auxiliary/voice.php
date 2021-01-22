 <style>.wp-picker-container {vertical-align: top;}.iconarea img{width: 80px;height:80px;object-fit: cover;border-radius: 50%;border:1px solid #eee;}.iconarea {
    width: 80px;
    text-align: center;
    display: inline-block;
    padding: 10px;
    vertical-align: top;
    white-space: normal;
}
.wp-picker-container{display: inline-block;}
.scrollarea {
    white-space: nowrap;
    overflow-y: auto;
    background: #fff;
    border: 2px solid #ccc;
}

span.colorsample.white{border: 1px solid #ccc;}
span.colorsample.blue{background:#4C5CB0}
span.colorsample.green{background:#7ACC40}

</style>
        <div class="diver_editor_popup_title">会話<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
        <div id="diver_editor_popup">
            <form action="" class="diver_voice_form">
                <div class="auxiliary_scroll_area">

                <label class="auxiliary_label">アイコン</label>

                <div class="scrollarea">
                    <div class="iconarea">
                        <label>
                            <div id="image-box"><img style="width: 75px;height: 75px;" /></div>
                            <input type="radio" id="editer_diver_voice_default_img" name="editer_diver_voice_default_img" value="orig" checked="checked">
                            <a class="media-upload button" href="JavaScript:void(0);" rel="editer_diver_voice_img">選択</a>
                            <input type="hidden" id="editer_diver_voice_img" name="editer_diver_voice_img" value="" style="width: 80px;" /><br>
                        </label>
                    </div>

                    <?php 
                    $count = 0;
                    while ($count < get_option('voice_icon_count')): ?>
                        <div class="iconarea">
                        <label>
                            <img src="<?php echo get_option('icon'.$count.'-uploader_img') ?>">
                            <input type="radio" id="editer_diver_voice_default_img" name="editer_diver_voice_default_img" value="<?php echo get_option('icon'.$count.'-uploader_img') ?>">
                            </label>
                        </div>
                    <?php 
                    $count++;
                    endwhile; 
                    ?>
                </div>
                <br>
                <div class="harf">
                    <div class="harf">
                        <label class="auxiliary_label">名前</label><input type="text" id="editer_diver_voice_name" style="width:100%"/>
                    </div>

                    <div class="harf">
                        <label class="auxiliary_label">名前表示位置</label>
                        <input type="radio" id="editer_diver_voice_name_position" name="editer_diver_voice_name_position" value="n_bottom" checked="checked">アイコン下
                        <input type="radio" id="editer_diver_voice_name_position" name="editer_diver_voice_name_position" value="n_up">セリフ上
                    </div>
                </div>
                <div class="harf">
                    <div class="harf">
                        <label class="auxiliary_label">セリフ向き</label>
                        <input type="radio" id="editer_diver_voice_type" name="editer_diver_voice_type" value="left" checked="checked">左
                        <input type="radio" id="editer_diver_voice_type" name="editer_diver_voice_type" value="right">右
                    </div>
                
                    <div class="harf">
                        <label class="auxiliary_label">タイプ</label>
                        <input type="radio" id="editer_diver_voice_style" name="editer_diver_voice_style" value="normal" checked="checked">セリフ
                        <input type="radio" id="editer_diver_voice_style" name="editer_diver_voice_style" value="think">心の声
                    </div>
                </div>

                <br><br>

                <label class="auxiliary_label">セリフ</label><textarea id="editer_voice_content" style="width:100%;height:160px" required="required"></textarea><br><br>

                <div class="oricolorarea">

                    <label class="auxiliary_label">色</label>

                    <label><input type="radio" id="editer_diver_voice_color" name="editer_diver_voice_color" value="white" checked="checked"><span class="white colorsample"></span></label>

                    <label><input type="radio" id="editer_diver_voice_color" name="editer_diver_voice_color" value="blue"><span class="blue colorsample"></span></label>

                    <label><input type="radio" id="editer_diver_voice_color" name="editer_diver_voice_color" value="green"><span class="green colorsample"></span></label>

                    <label><input type="radio" id="editer_diver_voice_color" name="editer_diver_voice_color" value="red"><span class="red colorsample"></span></label>

                    <label><input type="radio" id="editer_diver_voice_color" name="editer_diver_voice_color" value="yellow"><span class="yellow colorsample"></span></label>

                    <label><input type="radio" id="editer_diver_voice_color" name="editer_diver_voice_color" value="orange"><span class="orange colorsample"></span></label>

                    <label><input type="radio" id="editer_diver_voice_color" name="editer_diver_voice_color" value="gray"><span class="gray colorsample"></span></label>

                    <label><input type="radio" id="editer_diver_voice_color" name="editer_diver_voice_color" value="black"><span class="black colorsample"></span></label>

                    <label><input type="radio" id="editer_diver_voice_color" name="editer_diver_voice_color" value="custom"><span class="custom">カスタム</span></label> 

                </div><br>
                <div class="customcolorarea" style="display: none;">
                    <div class="tri">
                        <label class="auxiliary_label">背景色</label>
                        <input type="text" id="editer_diver_voice_color_custom" name="editer_diver_voice_color_custom" class="myColorPicker" value="<?php echo get_option('editer_diver_voice_color_custom','#eee'); ?>">
                    </div>
                    <div class="tri">
                        <label class="auxiliary_label">文字色</label>
                        <input type="text" id="editer_diver_voice_color_custom_text" name="editer_diver_voice_color_custom_text" class="myColorPicker" value="<?php echo get_option('editer_diver_voice_color_custom_text','#000'); ?>">
                    </div>
                </div>
                <br>
                </div>
                <div class="submitbox">
                    <div id="wp-link-cancel">
                        <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                    </div>
                    <div id="wp-link-update">
                        <input type="submit" value="会話を挿入する" class="button button-primary" id="diver_ei_btn_yes">
                    </div>
                </div>
            </form>
        </div>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('input[name="editer_diver_voice_color"]:radio').on('change', function(){
        if($(this).val()=="custom"){
            $('.customcolorarea').fadeIn();
        }else{
            $('.customcolorarea').fadeOut();
        }
    });
});
</script>
