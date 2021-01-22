<div class="diver_editor_popup_title">コード<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
<div id="diver_editor_popup">
    <form  action="" id="diver_voice_form">
        <div class="auxiliary_scroll_area">
        <div class="harf">
        <label class="auxiliary_label">言語</label>
        <select id="editer_diver_sc_cord_lang" name="editer_diver_sc_cord_lang">
            <option value="markup">HTML</option>
            <option value="php">PHP</option>
            <option value="css">CSS</option>
            <option value="js">javascript</option>
            <option value="other">その他</option>
        </select>
        </div>

        <div class="harf">
            <label class="auxiliary_label">その他オプション</label>
            <input type="checkbox" id="editer_diver_sc_cord_num" value="1" checked="checked"/> <label>行番号を表示</label>
        </div>
        <br><br>

        <label class="auxiliary_label">コード</label>
        <textarea id="editer_diver_sc_cord_text" style="width:100%;height:400px" required="required"></textarea><br><br>

        </div>
        <div class="submitbox">
            <div id="wp-link-cancel">
                <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
            </div>
            <div id="wp-link-update">
                <input type="submit" value="コードを挿入する" class="button button-primary" id="diver_ei_btn_yes">
            </div>
        </div>
    </form>
</div>