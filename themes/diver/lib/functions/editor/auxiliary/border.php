<div class="diver_editor_popup_title">区切り線<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
        <div id="diver_editor_popup">
        <form  action="" id="diver_voice_form">
        <div class="auxiliary_scroll_area">

            <label class="auxiliary_label">太さ</label>
            <input type="number" min="1" id="editer_diver_sc_border_width" name="editer_diver_sc_border_width" value="<?php echo get_option('diver_op_line_width','2'); ?>" style="width:80px">px
            <br><br>

            <label class="auxiliary_label">線色</label>
            <input type="text" id="editer_diver_sc_border_color" name="editer_diver_sc_border_color" class="myColorPicker" value="<?php echo get_option('diver_op_line_color','#ccc'); ?>"></label><br><br>

            <label class="auxiliary_label">スタイル</label>
            <input type="radio" id="editer_diver_sc_border_style" name="editer_diver_sc_border_style" value="solid" <?php checked('solid',get_option('diver_op_line_style','solid')); ?>>一本線
            <input type="radio" id="editer_diver_sc_border_style" name="editer_diver_sc_border_style" value="dotted" <?php checked('dotted',get_option('diver_op_line_style','solid')); ?>>点線
            <input type="radio" id="editer_diver_sc_border_style" name="editer_diver_sc_border_style" value="double" <?php checked('double',get_option('diver_op_line_style','solid')); ?>>二重線
            <br>
        </div>
            <div class="submitbox">
                <div id="wp-link-cancel">
                    <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                </div>
                <div id="wp-link-update">
                    <input type="submit" value="区切り線を挿入する" class="button button-primary" id="diver_ei_btn_yes">
                </div>
            </div>
        </form>
        </div>