<script type="text/javascript">
jQuery(function($) {

	$('.auxiliary').on('click', function(){
	    var id =  $(this).attr("id");
	    $('.aux-form').css('display','none');
	    $('.'+id).css('display','block');
	});

});
</script>

<div class="aux-form aux-btn" style="display: none">
	<div class="diver_editor_popup_title">ボタン</div>
	<div id="diver_editor_popup">
	    <form sction="#" id="diver_aux_form">

	        <label class="auxiliary_label">ボタンテキスト</label><input type="text" id="editer_diver_sc_btn_text" name="editer_diver_sc_btn_text" style="width:80%" value="デフォルト" required/><br><br>
	        <label class="auxiliary_label">リンク先URL</label><input type="text" id="editer_diver_sc_btn_url" style="width:100%"/><br><br>

	        <label class="auxiliary_label">スタイル１</label>
	        <input type="radio" id="editer_diver_sc_btn_style1" name="editer_diver_sc_btn_style1" value="simple" checked="checked">フラット　
	        <input type="radio" id="editer_diver_sc_btn_style1" name="editer_diver_sc_btn_style1" value="solid">立体　
	        <br><br>

	        <label class="auxiliary_label">スタイル２</label>
	        <input type="radio" id="editer_diver_sc_btn_style2" name="editer_diver_sc_btn_style2" value="block" checked="checked">ブロック　
	        <input type="radio" id="editer_diver_sc_btn_style2" name="editer_diver_sc_btn_style2" value="inline">インライン　
	        <input type="radio" id="editer_diver_sc_btn_style2" name="editer_diver_sc_btn_style2" value="big">フルサイズ　
	        <br><br>

	        <label class="auxiliary_label">大きさ</label>
	        <input type="radio" id="editer_diver_sc_btn_size" name="editer_diver_sc_btn_size" value="big">大　
	        <input type="radio" id="editer_diver_sc_btn_size" name="editer_diver_sc_btn_size" value="midium" checked="checked">中　
	        <input type="radio" id="editer_diver_sc_btn_size" name="editer_diver_sc_btn_size" value="small">小　
	        <br><br>

	        <label class="auxiliary_label">ボタンアイコン</label>
	        <div class=" iconpreview iconpicker button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>　
	        <input type="hidden" class="iconpickerres" id="editer_diver_sc_btn_icon" value="fa-arrow-circle-right">
	        <input type="radio" id="editer_diver_sc_btn_iconpos" name="editer_diver_sc_btn_iconpos" value="none" checked="checked">非表示　
	        <input type="radio" id="editer_diver_sc_btn_iconpos" name="editer_diver_sc_btn_iconpos" value="before">前　
	        <input type="radio" id="editer_diver_sc_btn_iconpos" name="editer_diver_sc_btn_iconpos" value="after">後ろ　
	        <br><br>


	        <label class="auxiliary_label">角丸</label><input type="number" id="editer_diver_sc_btn_radius" name="editer_diver_sc_btn_radius" value="0" style="width:80px">px
	        <br><br>

	        <div class="harf">
	        <label class="auxiliary_label">枠線太さ</label><input type="number" min="0" id="editer_diver_sc_btnborder_width" name="editer_diver_sc_btnborder_width" value="0" style="width:80px">px</div>

	        <div class="harf">
	        <label class="auxiliary_label">枠線色</label>
	        <input type="text" id="editer_diver_sc_btn_border" name="editer_diver_sc_btn_border" class="myColorPicker" value="#607d8b"></label></div>
	        <br><br>

	        <div class="harf">
	        <label class="auxiliary_label">背景色</label>
	        <input type="text" id="editer_diver_sc_btn_bg" name="editer_diver_sc_btn_bg" class="myColorPicker" value="#607d8b"></label></div>

	        <div class="harf">
	        <label class="auxiliary_label">テキスト色</label>
	        <input type="text" id="editer_diver_sc_btn_color" name="editer_diver_sc_btn_color" class="myColorPicker" value="#fff"></label></div>
	    </form>
    	<div class="aux-frame-submit">
            <div id="wp-link-update">
                <input type="button" value="ボタンを挿入する" class="button button-primary diver_ei_btn_yes">
            </div>
        </div>
	</div>
</div>

<div class="aux-form aux-badge" style="display: none">
	<div class="diver_editor_popup_title">バッジ</div>
    <div id="diver_editor_popup">
	    <form  action="" id="diver_voice_form">


	        <label class="auxiliary_label">バッジテキスト</label>
	        <input type="text" id="editer_diver_sc_badge_text" style="width:80%" required/><br><br>


	        <label class="auxiliary_label">バッジアイコン</label>
	        <div id="iconpreview" class="iconpicker button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>　
	        <input type="hidden" class="iconpickerres" id="editer_diver_sc_badge_icon" value="fa-arrow-circle-right">
	        <input type="radio" id="editer_diver_sc_badge_iconpos" name="editer_diver_sc_badge_iconpos" value="none" checked="checked">非表示　
	        <input type="radio" id="editer_diver_sc_badge_iconpos" name="editer_diver_sc_badge_iconpos" value="before">前　
	        <input type="radio" id="editer_diver_sc_badge_iconpos" name="editer_diver_sc_badge_iconpos" value="after">後ろ　
	        <br><br>


	        <label class="auxiliary_label">角丸</label>
	        <input type="number" id="editer_diver_sc_badge_radius" name="editer_diver_sc_badge_radius" value="0" style="width:80px">px
	        <br><br>

	        <div class="harf">
	        <label class="auxiliary_label">背景色</label>
	        <input type="text" id="editer_diver_sc_badge_bg" name="editer_diver_sc_badge_bg" class="myColorPicker" value="#607d8b"></label>
	        </div>

	        <div class="harf">
	        <label class="auxiliary_label">テキスト色</label>
	        <input type="text" id="editer_diver_sc_badge_color" name="editer_diver_sc_badge_color" class="myColorPicker" value="#fff"></label>
	        </div>

	        <div class="aux-frame-submit">
	            <div id="wp-link-update">
	                <input type="submit" value="バッジを挿入する" class="button button-primary diver_ei_btn_yes">
	            </div>
	        </div>
	    </form>
	</div>
</div>