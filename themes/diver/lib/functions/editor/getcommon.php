<?php
$p4EMB= new DiverGetCommon();

class DiverGetCommon
{
    public function __construct(){
        add_filter( 'media_buttons' , array( &$this, 'diver_common_buttons_context' ) );
        //ポップアップウィンドウ
        add_action('media_upload_diverType', array( &$this,'diver_wp_common_iframe' ) );
        //クラス内のメソッドを呼び出す場合はこんな感じ。

    }

    public function diver_common_buttons_context ( $context ) {
        $link = "media-upload.php?tab=common&type=diverType&TB_iframe=true&width=800&height=550";
        echo <<<EOS
    <a href='{$link}' class='thickbox button' title='共通コンテンツ'>共通コンテンツ</a>
EOS;
    }

    function diver_wp_common_iframe() {
        wp_iframe(array( $this , 'common_upload_diver_form' ) );
    }
    function common_upload_diver_form() {
        global $type;
        global $tab;
        if($tab == "common"): ?>

			<div id="diver_editor_popup">

			<form  action="" id="diver_relpost_form">
				<p>
                <style>
                    .shortcode {
                        padding: 10px;
                        background: #00299c;
                        font-weight: bold;
                        color: #fff;
                        margin-bottom: 10px;
                    }
                </style>
                <div class="shortcode">ここに表示されるショートコードが挿入されます。</div>
                <div class="postid" style="display: none;"></div>
				</p>

            <div style="text-align: right;margin: 5px 0;">
            <label><input type="checkbox" id="editer_diver_getpost_blank" name="editer_diver_getpost_blank">HTMLテキストとして挿入する　</label>

            <input type="search" id="ajaxpost_search_keyword" size="60" placeholder="検索テキスト"> <button type="button" class="button" id="re_getPostsSubmit">検索</button></div>
			<div class="resblock" style="max-height: 300px;height: 300px;">
				<ul id="res"></ul>
				<input type=hidden id=paka3getpost_count value = "0" />
                <input type=hidden id=paka3getpost_type value="common" />

				<!-- このポイントで読み込み -->
				<div id=loadingmessage><img src="<?php echo get_template_directory_uri() ?>/images/bx_loader.gif" /></div>
				<div class="diver_kiji_trigger"></div>
			</div>

			</form>
			<div class="submitbox">
                <div id="wp-link-cancel">
                    <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                    <button type="button" class="button" id="getPostsSubmit">続きを読み込む</button>
					<button type="button" class="button" id="re_getPostsSubmit">再読み込み</button>
                </div>
                <div id="wp-link-update">
                    <input type="submit" value="選択した共通コンテンツを挿入する" class="button button-primary" id="diver_ei_btn_yes">
                </div>
            </div>

            <script>
                jQuery(function($) {
                    $(document).on('click','#pgp_chk_link_common', function(event){
                        target = $(this).attr("class");
                        obj_id = target;

                        $(".postid").html(target);

                        var type = ""
                        if($('#editer_diver_getpost_blank').prop('checked')){
                            type = ' type="text"';
                        }

                        var mhtml = '[common_content id="'+obj_id+'"'+type+']';
                        
                        $(".shortcode").html(mhtml);

                    });

                    $('#editer_diver_getpost_blank').on('change', function() {

                        if($(".postid").html()){
                            var type = ""
                            if($('#editer_diver_getpost_blank').prop('checked')){
                                type = ' type="text"';
                            }

                            var mhtml = '[common_content id="'+$(".postid").html()+'"'+type+']';
                            
                            $(".shortcode").html(mhtml);
                        }

                    });


                    $('#diver_ei_btn_yes').on('click', function() {

                        top.send_to_editor($(".shortcode").html());
                        top.tb_remove(); 
                    });

                });
            </script>
    <?php endif;
    }

}
?>