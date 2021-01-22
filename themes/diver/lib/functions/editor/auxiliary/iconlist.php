<style>
.tabs {
  margin: 20px auto;
}

/*タブのスタイル*/
.tab_item {
  width: calc(100%/2);
  border-bottom: 3px solid #437eb3;
  background-color: #d9d9d9;
  line-height: 40px;
  font-size: 13px;
  text-align: center;
  color: #565656;
  display: block;
  float: left;
  text-align: center;
  font-weight: bold;
  transition: all 0.2s ease;
}
.tab_item:hover {
  opacity: 0.75;
}

/*ラジオボタンを全て消す*/
input[name="tab_item"] {
  display: none;
}

/*タブ切り替えの中身のスタイル*/
.tab_content {
  display: none;
  clear: both;
  overflow: hidden;
}


/*選択されているタブのコンテンツのみを表示*/
#all:checked ~ #all_content,
#programming:checked ~ #programming_content,
#design:checked ~ #design_content {
  display: block;
}

/*選択されているタブのスタイルを変える*/
.tabs input:checked + .tab_item {
  background-color: #437eb3;
  color: #fff;
}
.icontypearea {
    width: 120px;
    text-align: center;
    display:inline-block;
    padding: 10px;
    vertical-align: middle;
    white-space: normal;
    position: relative;
    font-size: .9em;
}

.icontypearea ul li {
  line-height: 2;
  position: relative;
}

.icontypearea ul li span i {
    font-family: "fontAwesome";
    position: absolute;
    left: -.4em;
    color: #668ad8;
    width: 1em;
    height: 2em;
    font-size: 1.3em;
    line-height: 1.5em;
}

.icontypearea .lborder ul li {border-left: 5px solid #668ad8;}

.icontypearea ol{
  counter-reset:number; /*数字をリセット*/
  list-style-type: none!important;
  margin: 10px 0;
  padding-left: 1.5em;
}
.icontypearea ol li{
    line-height: 2;
    position: relative;
}

.icontypearea ol li:after{
  position: absolute;
  counter-increment: number;
  content: counter(number);
  display:inline-block;
  font-weight:bold;
  left: -2em;
  width: 20px;
  line-height: 20px;
  text-align:center;
  top:0;
}

.icontypearea .solid ol li:after{background: #668ad8;color: #fff;}
.icontypearea .reg ol li:after{border:2px solid #668ad8;color: #668ad8;width: 19px;line-height: 19px;}
.icontypearea .dia ol li:after{color: #fff;}
.icontypearea .dia ol li::before{
    position: absolute;
    top: 0px;
    left: -2em;
    width: 20px;
    height: 20px;
    content: '';
    transform: rotate(45deg);
    background: #668ad8;
}

.icontypearea .radius ol li:after{border-radius: 50%;}

.icontypearea .timeline ol li::after{
    border: 1px solid #668ad8;
    color: #668ad8;
    border-radius: 50%;
    background: #f3f7ff;
}
.icontypearea .timeline ol li::before{
    position: absolute;
    z-index: 0;
    left: -1em;
    height: calc(100% + 1em);
    content: '';
    border-left: 1px dotted #668ad8;
}
.icontypearea .timeline ol li:last-child::before{display: none;}

.icontypearea .parag ol li{padding-left: .5em;border-left: 3px solid #98b9da;}
.icontypearea .parag ol li::after{font-size: 1.5em;left: -1.25em;color: #668ad8;}

.icontypearea .cover{
    position: absolute;
    top:0;
    left:0;
    width: 100%;
    height: 100%;
    z-index: 1;
}
.scrollarea {
    white-space: nowrap;
    overflow-y: auto;
    background: #fff;
    border: 2px solid #ccc;
    padding: 0 10px;
}

.icontypearea.blue ul li:before {color: #70b8f1;}
.icontypearea.green ul li:before {color: #2ac113;}
.icontypearea.red ul li:before {color: #ff8178;}
.icontypearea.yellow ul li:before {color: #ffe822;}
.icontypearea.orange ul li:before {color: #ffa30d;}
.icontypearea.gray ul li:before {color: #eee;}
.icontypearea.black ul li:before {color: #000;}


.ed_button {
    display: none !important;
}

input#qt_editer_diver_sc_designlist_text_ul,input#qt_editer_diver_sc_designlist_text_ol,input#qt_editer_diver_sc_designlist_text_li {
    display: inline-block !important;
}

</style>
<div id="customstyle"></div>

<div class="diver_editor_popup_title">リストデザイン<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
        <div id="diver_editor_popup">
        <form  action="" id="diver_voice_form">
        <div class="auxiliary_scroll_area">
        <label class="auxiliary_label">リストHTML</label>

        <?php
            $args = array(
                'wpautop'           => false,
                'media_buttons'     => false,
                'textarea_rows'     => 8,
                'editor_css'        => '',
                'indent'            => true,
                'teeny'             => false,
                'dfw'               => false,
                'quicktags'         => array( 'buttons' => 'ul,ol,li' ),
                'drag_drop_upload'  => false,
                'tinymce' => false,
            );
            wp_editor('', 'editer_diver_sc_designlist_text', $args);
        ?>
        <div class="tabs">
            <input id="all" type="radio" name="tab_item" checked>
            <label class="tab_item" for="all">箇条書きリスト（ul）</label>
            <input id="programming" type="radio" name="tab_item">
            <label class="tab_item" for="programming">順序付きリスト（ol）</label>
            <div class="tab_content" id="all_content">
                 <div class="scrollarea">

                    <div class="icontypearea">
                        <label>
                        <div class="sc_icontype_wrap fa_check">
                            <ul>
                                <li><span class="before"><i class="fa fa-check"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-check"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-check"></i></span>テキストテキスト</li>
                            </ul>
                        </div>
                        <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-li-fa_check" checked="checked">
                        </label>
                    </div>

                    <div class="icontypearea">
                        <label>
                        <div class="sc_icontype_wrap fa_angle">
                            <ul>
                                <li><span class="before"><i class="fa fa-angle-right"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-angle-right"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-angle-right"></i></span>テキストテキスト</li>
                            </ul>
                        </div>
                        <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-li-fa_angle" checked="checked">
                        </label>
                    </div>

                    <div class="icontypearea">
                        <label>
                        <div class="sc_icontype_wrap fa_angle_d">
                            <ul>
                                <li><span class="before"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>テキストテキスト</li>
                            </ul>
                        </div>
                        <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-li-fa_angle_d" checked="checked">
                        </label>
                    </div>


                    <div class="icontypearea">
                        <label>
                        <div class="sc_icontype_wrap fa_angle_o">
                            <ul>
                                <li><span class="before"><i class="fa fa-chevron-circle-right"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-chevron-circle-right"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-chevron-circle-right"></i></span>テキストテキスト</li>
                            </ul>
                        </div>
                        <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-li-fa_angle_o" checked="checked">
                        </label>
                    </div>
                    <div class="icontypearea">
                        <label>
                        <div class="sc_icontype_wrap fa_caret">
                            <ul>
                                <li><span class="before"><i class="fa fa-caret-right"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-caret-right"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-caret-right"></i></span>テキストテキスト</li>
                            </ul>
                        </div>
                        <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-li-fa_caret" checked="checked">
                        </label>
                    </div>

                    <div class="icontypearea">
                        <label>
                        <div class="sc_icontype_wrap fa_arrow">
                            <ul>
                                <li><span class="before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>テキストテキスト</li>
                                <li><span class="before"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>テキストテキスト</li>
                            </ul>
                        </div>
                        <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-li-fa_arrow" checked="checked">
                        </label>
                    </div>

                    <div class="icontypearea">
                        <label>
                        <div class="sc_icontype_wrap lborder">
                            <ul>
                                <li>テキストテキスト</li>
                                <li>テキストテキスト</li>
                                <li>テキストテキスト</li>
                            </ul>
                        </div>
                        <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-li-lborder" checked="checked">
                        </label>
                    </div>

                </div>
            </div>
            <div class="tab_content" id="programming_content">
            <div class="scrollarea">

                <div class="icontypearea">
                    <label>
                    <div class="sc_icontype_wrap radius solid">
                        <ol>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                        </ol>
                    </div>
                    <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-ol-radius-solid" checked="checked">
                    </label>
                </div>

                <div class="icontypearea">
                    <label>
                    <div class="sc_icontype_wrap square solid">
                        <ol>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                        </ol>
                    </div>
                    <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-ol-square-solid" checked="checked">
                    </label>
                </div>

                <div class="icontypearea">
                    <label>
                    <div class="sc_icontype_wrap radius reg">
                        <ol>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                        </ol>
                    </div>
                    <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-ol-radius-reg" checked="checked">
                    </label>
                </div>

                <div class="icontypearea">
                    <label>
                    <div class="sc_icontype_wrap square reg">
                        <ol>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                        </ol>
                    </div>
                    <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-ol-square-reg" checked="checked">
                    </label>
                </div>

                <div class="icontypearea">
                    <label>
                    <div class="sc_icontype_wrap dia">
                        <ol>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                        </ol>
                    </div>
                    <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-ol-dia" checked="checked">
                    </label>
                </div>

                <div class="icontypearea">
                    <label>
                    <div class="sc_icontype_wrap dia solid">
                        <ol>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                        </ol>
                    </div>
                    <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-ol-dia-solid" checked="checked">
                    </label>
                </div>

                <div class="icontypearea">
                    <label>
                    <div class="sc_icontype_wrap timeline">
                        <ol>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                        </ol>
                    </div>
                    <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-ol-timeline" checked="checked">
                    </label>
                </div>

                <div class="icontypearea">
                    <label>
                    <div class="sc_icontype_wrap parag">
                        <ol>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                            <li>テキストテキスト</li>
                        </ol>
                    </div>
                    <input type="radio" id="editer_diver_sc_designlist_type" name="editer_diver_sc_designlist_type" value="sc_designlist-ol-parag" checked="checked">
                    </label>
                </div>
            </div>
            </div>
        </div>



        <div class="oricolorarea">
            <label class="auxiliary_label">色</label>
            <label><input type="radio" id="editer_diver_sc_designlist_color" name="editer_diver_sc_designlist_color" value="blue" checked="checked"><span class="blue colorsample"></span></label>

            <label><input type="radio" id="editer_diver_sc_designlist_color" name="editer_diver_sc_designlist_color" value="green"><span class="green colorsample"></span></label>

            <label><input type="radio" id="editer_diver_sc_designlist_color" name="editer_diver_sc_designlist_color" value="red"><span class="red colorsample"></span></label>

            <label><input type="radio" id="editer_diver_sc_designlist_color" name="editer_diver_sc_designlist_color" value="yellow"><span class="yellow colorsample"></span></label>

            <label><input type="radio" id="editer_diver_sc_designlist_color" name="editer_diver_sc_designlist_color" value="orange" ><span class="orange colorsample"></span></label>

            <label><input type="radio" id="editer_diver_sc_designlist_color" name="editer_diver_sc_designlist_color" value="gray"><span class="gray colorsample"></span></label>

            <label><input type="radio" id="editer_diver_sc_designlist_color" name="editer_diver_sc_designlist_color" value="black"><span class="black colorsample"></span></label>
        </div>

     <br>
         </div>
            <div class="submitbox">
                <div id="wp-link-cancel">
                    <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                </div>
                <div id="wp-link-update">
                    <input type="submit" value="デザインリストを挿入する" class="button button-primary" id="diver_ei_btn_yes">
                </div>
            </div>
        </form>
        </div>
<script type="text/javascript">
jQuery(document).ready(function($) {

        $('.icontypearea ul li span i').css({'color':'#70b8f1'});
        $('.icontypearea .lborder ul li').css({'border-color':'#70b8f1'});
        $('#customstyle').html('<style>.icontypearea .solid ol li:after,.icontypearea .dia ol li::before{background: #70b8f1;color: #fff;}.icontypearea .reg ol li:after,.icontypearea .timeline ol li::after{border-color:#70b8f1;color: #70b8f1;}.icontypearea .timeline ol li::after{background-color:#fefefe;}.icontypearea .parag ol li,.icontypearea .timeline ol li::before{border-color:#70b8f1;}.icontypearea .parag ol li::after{color:#70b8f1}</style>');

        $("#editer_diver_sc_frame_titlebg").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.sc_frame_title').css('background-color',$( this ).wpColorPicker( 'color' ));
            }
        });


        $('input[name="editer_diver_sc_designlist_color"]:radio').on('change', function(){
        if($(this).val()=="custom"){
            $('.customcolorarea').fadeIn('slow');

            $('.icontypearea ul li span i').css('color',$("#editer_diver_sc_frame_titlebg").val());


        }else{
            $('.customcolorarea').fadeOut();
            switch($(this).val()){
                case 'blue':
                $('.icontypearea ul li span i').css({'color':'#70b8f1'});
                $('.icontypearea .lborder ul li').css({'border-color':'#70b8f1'});
               $('#customstyle').html('<style>.icontypearea .solid ol li:after,.icontypearea .dia ol li::before{background: #70b8f1;color: #fff;}.icontypearea .reg ol li:after,.icontypearea .timeline ol li::after{border-color:#70b8f1;color: #70b8f1;}.icontypearea .timeline ol li::after{background-color:#fefefe;}.icontypearea .parag ol li,.icontypearea .timeline ol li::before{border-color:#70b8f1;}.icontypearea .parag ol li::after{color:#70b8f1}</style>');
                break;
                case 'green':
                    $('.icontypearea ul li span i').css({'color':'#2ac113'});
                    $('.icontypearea .lborder ul li').css({'border-color':'#2ac113'});
                    $('#customstyle').html('<style>.icontypearea .solid ol li:after,.icontypearea .dia ol li::before{background: #2ac113;color: #fff;}.icontypearea .reg ol li:after,.icontypearea .timeline ol li::after{border-color:#2ac113;color: #2ac113;}.icontypearea .timeline ol li::after{background-color:#fefefe;}.icontypearea .parag ol li,.icontypearea .timeline ol li::before{border-color:#2ac113;}.icontypearea .parag ol li::after{color:#2ac113}</style>');
                break;
                case 'red':
                    $('.icontypearea ul li span i').css({'color':'#ff8178'});
                    $('.icontypearea .lborder ul li').css({'border-color':'#ff8178'});
                    $('#customstyle').html('<style>.icontypearea .solid ol li:after,.icontypearea .dia ol li::before{background: #ff8178;color: #fff;}.icontypearea .reg ol li:after,.icontypearea .timeline ol li::after{border-color:#ff8178;color: #ff8178;}.icontypearea .timeline ol li::after{background-color:#fefefe;}.icontypearea .parag ol li,.icontypearea .timeline ol li::before{border-color:#ff8178;}.icontypearea .parag ol li::after{color:#ff8178}</style>');
                break;
                case 'yellow':
                    $('.icontypearea ul li span i').css({'color':'#ffe822'});
                    $('.icontypearea .lborder ul li').css({'border-color':'#ffe822'});
                    $('#customstyle').html('<style>.icontypearea .solid ol li:after,.icontypearea .dia ol li::before{background: #ffe822;color: #fff;}.icontypearea .reg ol li:after,.icontypearea .timeline ol li::after{border-color:#ffe822;color: #ffe822;}.icontypearea .timeline ol li::after{background-color:#fefefe;}.icontypearea .parag ol li,.icontypearea .timeline ol li::before{border-color:#ffe822;}.icontypearea .parag ol li::after{color:#ffe822}</style>');                
                    break;
                case 'orange':
                    $('.icontypearea ul li span i').css({'color':'#ffa30d'});
                    $('.icontypearea .lborder ul li').css({'border-color':'#ffa30d'});
                    $('#customstyle').html('<style>.icontypearea .solid ol li:after,.icontypearea .dia ol li::before{background: #ffa30d;color: #fff;}.icontypearea .reg ol li:after,.icontypearea .timeline ol li::after{border-color:#ffa30d;color: #ffa30d;}.icontypearea .timeline ol li::after{background-color:#fefefe;}.icontypearea .parag ol li,.icontypearea .timeline ol li::before{border-color:#ffa30d;}.icontypearea .parag ol li::after{color:#ffa30d}</style>');                
                    break;
                case 'gray':
                    $('.icontypearea ul li span i').css({'color':'#ccc'});
                    $('.icontypearea .lborder ul li').css({'border-color':'#ccc'});
                    $('#customstyle').html('<style>.icontypearea .solid ol li:after,.icontypearea .dia ol li::before{background: #ccc;color: #fff;}.icontypearea .reg ol li:after,.icontypearea .timeline ol li::after{border-color:#ccc;color: #ccc;}.icontypearea .timeline ol li::after{background-color:#fefefe;}.icontypearea .parag ol li,.icontypearea .timeline ol li::before{border-color:#ccc;}.icontypearea .parag ol li::after{color:#ccc}</style>');                 
                    break;               
                case 'black':
                    $('.icontypearea ul li span i').css({'color':'#000'});
                    $('.icontypearea .lborder ul li').css({'border-color':'#000'});
                    $('#customstyle').html('<style>.icontypearea .solid ol li:after,.icontypearea .dia ol li::before{background: #000;color: #fff;}.icontypearea .reg ol li:after,.icontypearea .timeline ol li::after{border-color:#000;color: #000;}.icontypearea .timeline ol li::after{background-color:#fefefe;}.icontypearea .parag ol li,.icontypearea .timeline ol li::before{border-color:#000;}.icontypearea .parag ol li::after{color:#000}</style>');   
                break;
                default:

                break;      
            }
        }
    });

});
</script>