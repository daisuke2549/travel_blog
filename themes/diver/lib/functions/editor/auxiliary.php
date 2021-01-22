<?php
add_filter( "media_buttons", "diver_auxiliary_buttons_context");

function diver_auxiliary_buttons_context ( $context ) {

        $link = "media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550";
        echo  <<<EOS
    <a href='{$link}' class='thickbox button' title='Diver入力補助'><span class="dashicons dashicons-edit" style="vertical-align: middle;
    height: 25px;"></span> 入力補助</a>
EOS;
}


add_action( 'media_upload_paka3Type',  'diver_auxiliary_wp_iframe' );
function diver_auxiliary_wp_iframe() {
        wp_iframe( 'diver_auxiliary_form' );
}

function diver_auxiliary_form() {
    global $tab;
    ?>
    <style type="text/css">
        .auxiliary{
            background: #fff;
            width: 24%;
            margin: 0.5%;
            float: left;
            padding: 20px 0;
            text-align: center;
            -webkit-box-shadow: 0 1px 0 #ccc;
            box-shadow: 0 1px 0 #ccc;
            position: relative;
        }
        .auxiliary:hover{
            box-shadow: none;
            background: #dcf5f4;
        }
        .auxiliary a{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .auxiliary img{
            width: 35px;
            margin-bottom: 10px;
        }


        #diver_editor_popup .harf{
            width: 47%;
            display: inline-block;
            vertical-align: top;
        }
        #diver_editor_popup .harf+.harf{
            margin-left: 3%;
        }

        #diver_editor_popup .tri{
            width: 32%;
            display: inline-block;
            vertical-align: top;
        }
        #diver_editor_popup .tri+.tri{
            margin-left: 1%;
        }

/*        .wp-picker-holder {
            position: absolute;
        }*/

        span.colorsample {
            width: 30px;
            height: 15px;
            border-radius: 3px;
            display: inline-block;
            margin-right:15px;
            vertical-align: text-top;
        }

        .white {background: #fff;}
        .black{background: #000;}
        .blue{background: #70b8f1;}
        .red{background: #ff8178;}
        .yellow{background: #ffe822;}
        .orange{background: #ffa30d;}
        .green{background: #2ac113;}
        .gray{background: #ccc;}

        .colorsample.custom{width: auto;}
        .colorsample.custom:before { content: "カスタム";}

    </style>
    <script>
    jQuery(document).ready(function($) {
        $('#iconpreview').iconpicker('.iconpicker');
        $(document).on("keypress", "input:not(.allow_submit)", function(event) {
            return event.which !== 13;
          });
    });
    </script>
    <?php if($tab == 'top'): ?>
        <div class="auxiliary_wrap">

        <div class="auxiliary"><a href="media-upload.php?tab=heading&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/header.png"><br>見出し</div>

        <div class="auxiliary"><a href="media-upload.php?tab=button&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/button.png"><br>ボタン</div>

        <div class="auxiliary"><a href="media-upload.php?tab=badge&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/tag.png"><br>バッジ</div>

        <div class="auxiliary"><a  href="media-upload.php?tab=frame&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/frame.png"><br>囲い枠</div>

        <div class="auxiliary"><a href="media-upload.php?tab=border&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/interface.png"><br>区切り線</div>

        <div class="auxiliary"><a href="media-upload.php?tab=iconlist&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/list.png"><br>リストデザイン</div>

        <div class="auxiliary"><a href="media-upload.php?tab=icon&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/flag.png"><br>アイコン</div>
<!-- 
        <div class="auxiliary"><a href="media-upload.php?tab=section&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/note.png"><br>セクション</div>
 -->
        <div class="auxiliary"><a href="media-upload.php?tab=grid&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/columns.png"><br>グリッドレイアウト</div>

        <div class="auxiliary"><a href="media-upload.php?tab=bq&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/quote.png"><br>引用</div>

        <div class="auxiliary"><a href="media-upload.php?tab=amp&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/light-bolt.png"><br>AMP表示</div>

        <div class="auxiliary"><a href="media-upload.php?tab=ghr&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/connection.png"><br>横棒グラフ</div>

        <div class="auxiliary"><a href="media-upload.php?tab=balloon&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/balloon.png"><br>吹き出し</div>

        <div class="auxiliary"><a href="media-upload.php?tab=kutikomi&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/review.png"><br>口コミ</div>

        <div class="auxiliary"><a href="media-upload.php?tab=voice&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/voice.png"><br>会話</div>

        <div class="auxiliary"><a href="media-upload.php?tab=rank&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/rank.png"><br>ランキング</div>

        <div class="auxiliary"><a href="media-upload.php?tab=review&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/star.png"><br>レビュー</div>

        <div class="auxiliary"><a href="media-upload.php?tab=reviewtable&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/spreadsheet-cell-row.png"><br>レビュー表</div>

        <div class="auxiliary"><a href="media-upload.php?tab=modalpopup&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/dialog.png"><br>ポップアップ</div>

        <div class="auxiliary"><a href="media-upload.php?tab=qa&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/question.png"><br>Q&A</div>

        <div class="auxiliary"><a href="media-upload.php?tab=cord&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/code.png"><br>コード</div>

        <div class="auxiliary"><a href="media-upload.php?tab=toggle&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/accordion.png"><br>トグル</div>

        <div class="auxiliary"><a href="media-upload.php?tab=qr&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/qr.png"><br>QRコード</div>

        <div class="auxiliary"><a href="media-upload.php?tab=postlist&type=paka3Type&TB_iframe=true&width=600&height=550"></a>
        <img src="<?php echo get_template_directory_uri() ?>/images/editor/note.png"><br>記事一覧</div>

        </div>

        <?php 
        /************************
            heading
        ************************/
        elseif($tab == 'heading'):
        include('auxiliary/heading.php');
    /************************
        button
    ************************/
    elseif($tab == 'button'): 
        include('auxiliary/button.php');
    /************************
        badge
    ************************/
    elseif($tab == 'badge'): 
        include('auxiliary/badge.php');
    /************************
        frame
    ************************/
    elseif($tab == 'frame'):
        include('auxiliary/frame.php');
    /************************
        border
    ************************/
    elseif($tab == 'border'): 
        include('auxiliary/border.php');
    /************************
        iconlist
    ************************/
    elseif($tab == 'iconlist'): 
        include('auxiliary/iconlist.php');
    /************************
        icon
    ************************/
    elseif($tab == 'icon'): 
        include('auxiliary/icon.php');
    /************************
        section
    ************************/
    elseif($tab == 'section'):
        // include('auxiliary/section.php');
    /************************
        grid
    ************************/
    elseif($tab == 'grid'):
        include('auxiliary/layout.php');
    /************************
        blockquote
    ************************/
    elseif($tab == 'bq'):
        include('auxiliary/bq.php');
    /************************
        amp
    ************************/
    elseif($tab == 'amp'): 
        include('auxiliary/amp.php');
    /************************
        glaph hr
    ************************/
    elseif($tab == 'ghr'):
        include('auxiliary/ghr.php');
    /************************
        balloon
    ************************/
    elseif($tab == 'balloon'): 
        include('auxiliary/balloon.php');
    /************************
        cord
    ************************/
    elseif($tab == 'cord'):
        include('auxiliary/precode.php');
    /************************
        review
    ************************/
    elseif($tab == 'review'): 
        include('auxiliary/star.php');
     /************************
        review table
    ************************/
    elseif($tab == 'reviewtable'):
        include('auxiliary/review-table.php');
    /************************
        modal popup
    ************************/
    elseif($tab == 'modalpopup'):
        include('auxiliary/modal.php');
    /************************
        toggle
    ************************/
    elseif($tab == 'toggle'):
        include('auxiliary/toggle.php');
    /************************
        rank
    ************************/
    elseif($tab == 'rank'):
        include('auxiliary/rank.php');
    /************************
        kutikomi
    ************************/
    elseif($tab == 'kutikomi'):
        include('auxiliary/kutikomi.php');
    /************************
        voice
    ************************/
    elseif($tab == 'voice'):
       include('auxiliary/voice.php');
    /************************
        qa
    ************************/
    elseif($tab == 'qa'):
       include('auxiliary/qa.php');
    /************************
        qr
    ************************/
    elseif($tab == 'qr'):
       include('auxiliary/qr.php');
     /************************
        postlist
    ************************/
    elseif($tab == 'postlist'):
        include('auxiliary/article.php');
     /************************
        section
    ************************/
    elseif($tab == 'section'):
        include('auxiliary/section.php');
        
    endif;
}
get_template_part('lib/functions/editor/auxiliary','callback');
?>