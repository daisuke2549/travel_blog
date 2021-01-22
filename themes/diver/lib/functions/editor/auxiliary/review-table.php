<div class="diver_editor_popup_title">レビュー表<span style="font-size: .7em">　(ドラッグで並び替えられます。)</span><a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
        <div id="diver_editor_popup">
            <form id="diver_voice_form">
                <div class="auxiliary_scroll_area">

                <label class="auxiliary_label">レビュー表</label>

                <ul class="editer_diver_review_table_wrap">
                    
                </ul>

                <button type="button" id="fullcol">フルサイズで追加する</button>
                <button type="button" id="harfcol">ハーフサイズで追加する</button>
                </div>
                <div class="submitbox">
                    <div id="wp-link-cancel">
                        <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                    </div>
                    <div id="wp-link-update">
                        <input type="submit" value="レビュー表を挿入する" class="button button-primary" id="diver_ei_btn_yes">
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.editer_diver_review_table_wrap').sortable();
            });
            jQuery(function($) {
                var count = 0;


              $("#fullcol").click(function() {
                count++;
                var html = '<li class="editer_diver_review_table_content"><input type="hidden" name="editer_diver_review_table_count" value="'+count+'"><input type="hidden" id="editer_diver_review_table_col_'+count+'" value="full">';

                html += '<div class="harf"><label class="auxiliary_label">見出し</label><input type="text" id="editer_diver_review_table_title_'+count+'" class="review_table_title" style="width: 100%"></div>';

                html += '<div class="harf"><label class="auxiliary_label">表示スタイル</label><label><input type="radio" name="editer_diver_review_table_style_'+count+'" id="editer_diver_review_table_style" value="star" class="'+count+'">スター</label>　<label><input type="radio" name="editer_diver_review_table_style_'+count+'" id="editer_diver_review_table_style" value="text" checked="checked" class="'+count+'">テキスト<br></label></div>';


                html += '<div class="review_text"><label class="auxiliary_label">コンテンツ</label><textarea id="editer_diver_review_table_text_'+count+'" style="width:100%;height:80px"></textarea><label class="editer_diver_review_table_star_'+count+'" style="display:none;">評価：<input type="number" min="0" max="5" step="0.1" id="editer_diver_review_table_star_'+count+'" style="width: 60px" value="3">(0~5)</label></div></div></li>';

                $(".editer_diver_review_table_wrap").append(html);
              });


              $("#harfcol").click(function() {
                var html = '<li>';

                for(var num = 0; num < 2; ++num){
                    count++;
                    html += '<div class="editer_diver_review_table_content harfcol"><input type="hidden" name="editer_diver_review_table_count" value="'+count+'"><input type="hidden" id="editer_diver_review_table_col_'+count+'" value="harf">';

                    html += '<div class="harf"><label class="auxiliary_label">表示スタイル</label><label><input type="radio" name="editer_diver_review_table_style_'+count+'" id="editer_diver_review_table_style" value="star" class="'+count+'">スター</label>　<label><input type="radio" name="editer_diver_review_table_style_'+count+'" id="editer_diver_review_table_style" value="text" checked="checked" class="'+count+'">テキスト<br></label></div><br><br>';

                    html += '<label class="auxiliary_label">見出し</label><input type="text" id="editer_diver_review_table_title_'+count+'" class="review_table_title" style="width: 100%">';

                    html += '<div class="review_text"><label class="auxiliary_label">コンテンツ</label><textarea id="editer_diver_review_table_text_'+count+'" style="width:100%;height:80px"></textarea><label class="editer_diver_review_table_star_'+count+'" style="display:none;">評価：<input type="number" min="0" max="5" step="0.1" id="editer_diver_review_table_star_'+count+'" style="width: 60px" value="3">(0~5)</label></div></div>';

                }

                html += '</li>';

                $(".editer_diver_review_table_wrap").append(html);
              });

                $(document).on("change", "#editer_diver_review_table_style", function() {
                    var count = $(this).attr("class");
                    switch($(this).val()){
                    case 'star':
                        $('#editer_diver_review_table_text_'+count).hide();
                        $('.editer_diver_review_table_star_'+count).fadeIn('slow');
                        break;
                    case 'text':
                        $('.editer_diver_review_table_star_'+count).hide();
                        $('#editer_diver_review_table_text_'+count).fadeIn('slow');
                        break;
                    }
                });

            });
        </script>