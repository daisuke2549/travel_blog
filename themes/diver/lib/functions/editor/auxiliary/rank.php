<div class="diver_editor_popup_title">ランキング<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
<style>
    .editer_diver_rank_link_more_type,
    .editer_diver_rank_link_buy_type{
        display: none;
    }
    .editer_diver_rank_link_more_type.is-show,
    .editer_diver_rank_link_buy_type.is-show{
        display: block;
    }
</style>
        <div id="diver_editor_popup">
            <form  action="" id="diver_voice_form">
                <div class="auxiliary_scroll_area">
                    <div class="tri">
                    <label class="auxiliary_label">ランキング順位</label> <input type="number" min="0" max="10" id="editer_diver_rank_num" value="1" style="width:50px" />位</div>
                    <div class="tri">
                    <label class="auxiliary_label">評価</label> <input type="number" min="0" max="5" id="editer_diver_rank_star" value="0" style="width:50px" /></div>
                    <div class="tri">
                        <label class="auxiliary_label">表示スタイル</label>
                        <input type="radio" id="editer_diver_rank_style" name="editer_diver_rank_style" value="left" checked="checked"><img src="https://tan-taka.com/diver-demo/wp-content/uploads/sites/3/2017/05/ctalayout2.png" width="50px" style="vertical-align:top;">　　
                        <input type="radio" id="editer_diver_rank_style" name="editer_diver_rank_style" value="full"><img src="https://tan-taka.com/diver-demo/wp-content/uploads/sites/3/2017/05/ctalayout3.png" width="50px" style="vertical-align:top;">
                    </div>

                    <br><br>

                    <div style="display: inline-block;width: 60px;text-align: center;vertical-align: top;">
                    <label class="auxiliary_label">タイプ</label>
                    <select id="editer_diver_rank_title_type" name="editer_diver_rank_title_type">
                        <option value="div">div</option>
                        <option value="h2">h2</option>
                        <option value="h3">h3</option>
                        <option value="h4">h4</option>
                        <option value="h5">h5</option>
                    </select>
                    </div>
                    <div style="display: inline-block;width: 83%;vertical-align: top;">
                    <label class="auxiliary_label">商材タイトル</label><input type="text" id="editer_diver_rank_title" style="width:100%" required="required"/>
                    </div>

                   <br><br>
                    <label class="auxiliary_label">商材小見出し</label><input type="text" id="editer_diver_rank_head" style="width:100%"/><br><br>
                    <label class="auxiliary_label">説明文</label><textarea id="editer_diver_rank_desc" style="width:100%;height:200px"></textarea><br><br>
                    <label class="auxiliary_label">紹介画像</label>
                    <div id="image-box"><img /></div>
                    <a class="media-upload button" href="JavaScript:void(0);" rel="editer_diver_rank_img">画像を選択</a>
                    <input type="text" id="editer_diver_rank_img" name="editer_diver_rank_img" value="" /><br><br>
                    <label class="auxiliary_label">備考</label><textarea id="editer_diver_rank_rem" style="width:100%;height:200px"></textarea><br><br>


                    <label class="auxiliary_label">購入ボタン</label>
                    <input type="radio" id="editer_diver_rank_link_buy_type" name="editer_diver_rank_link_buy_type" value="normal" checked="checked">通常　
                    <input type="radio" id="editer_diver_rank_link_buy_type" name="editer_diver_rank_link_buy_type" value="ad">広告タグ
                    <br><br>

                    <div class="editer_diver_rank_link_buy_type is-show">
                        <div class="harf">
                        <label class="auxiliary_label">購入ボタンテキスト</label><input type="text" id="editer_diver_rank_link_buy_text" value="ご購入はこちら" style="width:100%"/></div>
                        <div class="harf">
                            <label class="auxiliary_label">購入ボタンURL</label><input type="text" id="editer_diver_rank_link_buy" style="width:100%"/>
                        </div>
                    </div>

                    <div class="editer_diver_rank_link_buy_type">
                        <label class="auxiliary_label">HTML</label>
                        <textarea row="5" id="editer_diver_rank_link_buy_textarea" style="width:100%;height: 130px"></textarea>
                    </div>

                    <br>
                    <div class="harf">
                    <label class="auxiliary_label">背景色</label>
                    <input type="text" id="editer_diver_rank_link_buy_bg" name="editer_diver_rank_link_buy_bg" class="myColorPicker" value="<?php echo get_option('editer_diver_rank_link_buy_bg','#2bc136'); ?>"></label></div>
                    <div class="harf">
                    <label class="auxiliary_label">テキスト色</label>
                    <input type="text" id="editer_diver_rank_link_buy_color" name="editer_diver_rank_link_buy_color" class="myColorPicker" value="<?php echo get_option('editer_diver_rank_link_buy_color','#fff'); ?>"></label></div><br><br>

                    <label class="auxiliary_label">詳細ボタン</label>
                    <input type="radio" id="editer_diver_rank_link_more_type" name="editer_diver_rank_link_more_type" value="normal" checked="checked">通常　
                    <input type="radio" id="editer_diver_rank_link_more_type" name="editer_diver_rank_link_more_type" value="ad">広告タグ
                    <br><br>

                    <div class="editer_diver_rank_link_more_type is-show">
                        <div class="harf">
                        <label class="auxiliary_label">詳細ボタンテキスト</label><input type="text" id="editer_diver_rank_link_more_text" value="詳しくはこちら" style="width:100%"/></div>
                        <div class="harf">
                        <label class="auxiliary_label">詳細ボタンURL</label><input type="text" id="editer_diver_rank_link_more" style="width:100%"/>
                        </div>
                    </div>
                    <div class="editer_diver_rank_link_more_type">
                        <label class="auxiliary_label">HTML</label>
                        <textarea  id="editer_diver_rank_link_more_textarea" style="width:100%;height: 130px"></textarea>
                    </div>

                    <br>
                    <div class="harf">
                    <label class="auxiliary_label">背景色</label>
                    <input type="text" id="editer_diver_rank_link_more_bg" name="editer_diver_rank_link_more_bg" class="myColorPicker" value="<?php echo get_option('editer_diver_rank_link_more_bg','#f55151'); ?>"></label></div>

                    <div class="harf">
                    <label class="auxiliary_label">テキスト色</label>
                    <input type="text" id="editer_diver_rank_link_more_color" name="editer_diver_rank_link_more_color" class="myColorPicker" value="<?php echo get_option('editer_diver_rank_link_more_color','#fff'); ?>"></label></div><br><br>

                    <div class="harf">
                        <label class="auxiliary_label">枠線太さ</label><input type="number" min="0" id="editer_diver_rank_border_width" name="editer_diver_rank_border_width" value="0" style="width:80px">px</div>
                    <div class="harf">
                        <label class="auxiliary_label">枠線色</label>
                        <input type="text" id="editer_diver_rank_border_color" name="editer_diver_rank_border_color" class="myColorPicker" value="#607d8b"></label></div><br><br>
                </div>
                <div class="submitbox">
                    <div id="wp-link-cancel">
                        <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                    </div>
                    <div id="wp-link-update">
                        <input type="submit" value="ランキング挿入" class="button button-primary" id="diver_ei_btn_yes">
                    </div>
                </div>
            </form>
        </div>
<script>
jQuery(document).ready(function($) {

    $('input[name="editer_diver_rank_link_more_type"]:radio').on('change', function(){
        $('.editer_diver_rank_link_more_type').toggleClass('is-show');
    });

    $('input[name="editer_diver_rank_link_buy_type"]:radio').on('change', function(){
        $('.editer_diver_rank_link_buy_type').toggleClass('is-show');
    });
});

</script>