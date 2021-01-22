<div class="diver_editor_popup_title">グリッドレイアウト<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
        <style type="text/css">
            label.layout{margin-right: 20px;}
            label.layout img{vertical-align: middle;width: 120px;margin-bottom: 20px;}
        </style>
        <div id="diver_editor_popup">
            <form  action="" id="diver_voice_form">
                <div class="auxiliary_scroll_area">

                <label class="auxiliary_label">レイアウトを選択してください</label>
                <label class="layout"><input type="radio" id="editer_diver_sc_layout_style" name="editer_diver_sc_layout_style" value="layout2" checked="checked"><img src="<?php echo get_template_directory_uri() ?>/images/layout/layout2.png"></label>
                 <label class="layout"><input type="radio" id="editer_diver_sc_layout_style" name="editer_diver_sc_layout_style" value="layout3"><img src="<?php echo get_template_directory_uri() ?>/images/layout/layout3.png"></label>
                 <label class="layout"><input type="radio" id="editer_diver_sc_layout_style" name="editer_diver_sc_layout_style" value="layout4"><img src="<?php echo get_template_directory_uri() ?>/images/layout/layout4.png"></label><br>
                <label class="layout"><input type="radio" id="editer_diver_sc_layout_style" name="editer_diver_sc_layout_style" value="layout211"><img src="<?php echo get_template_directory_uri() ?>/images/layout/layout211.png"></label>
                 <label class="layout"><input type="radio" id="editer_diver_sc_layout_style" name="editer_diver_sc_layout_style" value="layout112"><img src="<?php echo get_template_directory_uri() ?>/images/layout/layout112.png"></label>
                 <label class="layout"><input type="radio" id="editer_diver_sc_layout_style" name="editer_diver_sc_layout_style" value="layout121"><img src="<?php echo get_template_directory_uri() ?>/images/layout/layout121.png"></label><br>
                 <label class="layout"><input type="radio" id="editer_diver_sc_layout_style" name="editer_diver_sc_layout_style" value="layout21"><img src="<?php echo get_template_directory_uri() ?>/images/layout/layout21.png"></label>
                 <label class="layout"><input type="radio" id="editer_diver_sc_layout_style" name="editer_diver_sc_layout_style" value="layout12"><img src="<?php echo get_template_directory_uri() ?>/images/layout/layout12.png"></label>
                 <label class="layout"><input type="radio" id="editer_diver_sc_layout_style" name="editer_diver_sc_layout_style" value="layout31"><img src="<?php echo get_template_directory_uri() ?>/images/layout/layout31.png"></label>
                 <label class="layout"><input type="radio" id="editer_diver_sc_layout_style" name="editer_diver_sc_layout_style" value="layout13"><img src="<?php echo get_template_directory_uri() ?>/images/layout/layout13.png"></label>
                 <br><br>

                <label class="auxiliary_label">レイアウトオプション</label>
                <label><input type="checkbox" id="editer_diver_sc_layout_sp" checked="checked">画面サイズが小さい時に、グリッドレイアウトを解除する</label>
                <br><br>
                <label><input type="checkbox" id="editer_diver_sc_layout_padding">余白を0にする</label>
            </div>
            <div class="submitbox">
                <div id="wp-link-cancel">
                    <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                </div>
                <div id="wp-link-update">
                    <input type="submit" value="レイアウトを挿入する" class="button button-primary" id="diver_ei_btn_yes">
                </div>
            </div>
        </form>
        </div>