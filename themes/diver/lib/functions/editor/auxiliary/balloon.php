        <div class="diver_editor_popup_title">吹き出し<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
        <div id="diver_editor_popup">
            <form  action="" id="diver_voice_form">
                <div class="auxiliary_scroll_area">

                    <label class="auxiliary_label">テキスト</label><textarea id="editer_diver_sc_balloon_text" style="width:100%;height:200px" required="required"></textarea><br><br>

                    <label class="auxiliary_label">タイプ</label>
                    <input type="radio" id="editer_diver_sc_balloon_type" name="editer_diver_sc_balloon_type" value="right" checked="checked">右
                    <input type="radio" id="editer_diver_sc_balloon_type" name="editer_diver_sc_balloon_type" value="left">左
                    <input type="radio" id="editer_diver_sc_balloon_type" name="editer_diver_sc_balloon_type" value="top">上
                    <input type="radio" id="editer_diver_sc_balloon_type" name="editer_diver_sc_balloon_type" value="bottom">下
                    <br>
                    <br>

                    <label class="auxiliary_label">角丸</label><input type="number" id="editer_diver_sc_balloon_radius" name="editer_diver_sc_balloon_radius" value="0" style="width:80px">px
                    <br><br>
                </div>
                <div class="submitbox">
                    <div id="wp-link-cancel">
                        <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                    </div>
                    <div id="wp-link-update">
                        <input type="submit" value="吹き出しを挿入する" class="button button-primary" id="diver_ei_btn_yes">
                    </div>
                </div>
            </form>
        </div>
            </div>