<style>
.wp-picker-container {vertical-align: top;}
.frametypearea {
    width: 120px;
    text-align: center;
    display:inline-block;
    padding: 10px;
    vertical-align: middle;
    white-space: normal;
    position: relative;
}

.frametypearea .cover{
    position: absolute;
    top:0;
    left:0;
    width: 100%;
    height: 100%;
    z-index: 1;
}
.wp-picker-container{display: inline-block;}
.scrollarea {
    white-space: nowrap;
    overflow-y: auto;
    background: #fff;
    border: 2px solid #ccc;
}

.sc_frame_wrap{
    text-align: left;
    position: relative;
    margin: 10px 0 5px 0;
}

.sc_frame{
  border:2px solid #ffa30d;
  padding: .5em 1em;
  position: relative;
  border-radius: 2px;
  font-size: .6em;
  color: #777;
}

.sc_frame_title{
    padding: .1em 1em;
    position: relative;
    font-weight: bold;
    font-size: .9em;
    background: #ffa30d;
    color: #fff;
    z-index: 1;
    top:2px;
}


.sc_frame_title i {
    margin-right: .5em;
}

.sc_frame_title.inline{
    display: inline-block;
    margin: 0 .6em;
    border-radius: 5px 5px 0 0;
}

.sc_frame_title.onframe {
    position: absolute;
    display: inline-block;
    top: -8px;
    left: .8em;
    z-index: 1;
    padding: 3px 9px;
    line-height: 1;
    border-radius: 5px;
    background: #FFF;
    color: #ffa30d;
}

.sc_frame_title.onframe + .sc_frame {
    padding-top: .8em;
}

.sc_frame_title.inframe{
    position: absolute;
    display: inline-block;
    top: 0px;
    left: 0em;
}

.sc_frame_title.inframe + .sc_frame {
    padding-top: 2.5em;
}

.sc_frame_title.bottom{
    top: 100%;
    position: absolute;    
    right: 0;
    left: 0;
    border-radius: 0 0 5px 5px;
}

.sc_frame_title.bottom + .sc_frame {
    margin-bottom: 2.5em;
}

.sc_frame_before {
  position: absolute;
  color: #fff;
  background: #ccc;
  left: 5px;
  font-weight: bold;
  bottom: 100%;
  padding:.3em 1.5em; 
  border-radius: 3px 3px 0 0;
  font-size: .8em;
}

.sc_frame_text p:last-child{
  padding-bottom: 0;
}

.sc_frame.note .sc_frame_text ul,.sc_frame.note .sc_frame_text{
  line-height: 1.8em !important;
}

.content .sc_frame.note .sc_frame_text p {
    padding: 0 0 1.8em;
}

.sc_frame_icon{
      display: inline-block;
}
.sc_frame .sc_frame_icon {
  float: left;
  font-size: 1.3em;
  line-height: 1.2;
  padding: .2em 0;
  vertical-align: middle;
}

.sc_frame.note{
  background-image:linear-gradient(90deg,rgba(204,204,204,0) 0%,rgba(201,204,204,0) 49%,rgba(255,255,255,100) 50%,rgba(255,255,255,100) 100%),
  linear-gradient(180deg,rgba(204,204,204,0) 0%,rgba(204,204,205,0) 96.5%,rgba(30,30,30,100) 100%);
  background-repeat:repeat-x,repeat-y;
  background-size:6px 100%,100% 1.8em;
  padding: 1.8em 1.5em;
  line-height: 1.8em;
}
.sc_frame.shadow{
    -webkit-box-shadow: 0px 2px 10px 1px #ccc;
    -moz-box-shadow: 0px 2px 10px 1px #ccc;
    box-shadow: 0px 2px 10px 1px #ccc;
  }

.sc_frame.solid{
    background: #ffa30d;
    color: #fff;
}

.sc_frame.tape:before{
    content: "";
    position: absolute;
    top: 17px;
    width: 25%;
    height: 35px;
    opacity: 0.15;
    margin: -35px auto 10px 35%;
    background: #4e4e4e;
    transform: rotate(-5deg);
    left: 10px;
    right: 10px;
}



</style>
<div class="diver_editor_popup_title">囲い枠<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
        <div id="diver_editor_popup">
        <form  action="" id="diver_voice_form">
        <div class="auxiliary_scroll_area">

         <div class="harf">
            <label class="auxiliary_label">タイトル</label>
            <input type="text" id="editer_diver_sc_frame_title" style="width:100%"/>
        </div>

        <div class="harf">
            <label class="auxiliary_label">アイコン</label>
            <div id="iconpreview" class="iconpicker button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>　
            <input type="hidden" class="iconpreview" id="editer_diver_sc_frame_icon" value="fa-arrow-circle-right">
            <input type="radio" id="editer_diver_sc_frame_iconpos" name="editer_diver_sc_frame_iconpos" value="none" checked="checked">非表示　
            <input type="radio" id="editer_diver_sc_frame_iconpos" name="editer_diver_sc_frame_iconpos" value="before">タイトル内　
            <input type="radio" id="editer_diver_sc_frame_iconpos" name="editer_diver_sc_frame_iconpos" value="after">コンテンツ内　
        </div>


        <br><br>

        <label class="auxiliary_label">テキスト</label>
        <?php
            $args = array(
                'wpautop'           => false,
                'media_buttons'     => false,
                'textarea_rows'     => 8,
                'editor_css'        => '',
                'indent'            => true,
                'teeny'             => false,
                'dfw'               => false,
                'quicktags'         => true,
                'drag_drop_upload'  => false,
                'tinymce' => false
            );
            wp_editor('', 'editer_diver_sc_frame_text', $args);


        ?>



         <label class="auxiliary_label">囲い枠タイプ</label>

            <div class="scrollarea">

                <div class="frametypearea">
                    <label>
                    <div class="sc_frame_wrap"><div class="sc_frame_title inline" >タイトル</div><div class="sc_frame"><div class="sc_frame_text">テキストテキストテキストテキストテキストテキスト</div></div></div>
                    <input type="radio" id="editer_diver_sc_frame_type" name="editer_diver_sc_frame_type" value="sc_frame_wrap-inline" checked="checked">
                    </label>
                </div>

                <div class="frametypearea">
                    <label>
                    <div class="sc_frame_wrap"><div class="sc_frame_title" >タイトル</div><div class="sc_frame"><div class="sc_frame_text">テキストテキストテキストテキストテキストテキスト</div></div></div>
                    <input type="radio" id="editer_diver_sc_frame_type" name="editer_diver_sc_frame_type" value="sc_frame_wrap-block">
                    </label>
                </div>

                <div class="frametypearea">
                    <label>
                    <div class="sc_frame_wrap"><div class="sc_frame_title bottom" >タイトル</div><div class="sc_frame"><div class="sc_frame_text">テキストテキストテキストテキストテキストテキスト</div></div></div>
                    <input type="radio" id="editer_diver_sc_frame_type" name="editer_diver_sc_frame_type" value="sc_frame_wrap-bottom">
                    </label>
                </div>


                <div class="frametypearea">
                    <label>
                    <div class="sc_frame_wrap"><div class="sc_frame_title inframe" >タイトル</div><div class="sc_frame"><div class="sc_frame_text">テキストテキストテキストテキストテキストテキスト</div></div></div>
                    <input type="radio" id="editer_diver_sc_frame_type" name="editer_diver_sc_frame_type" value="sc_frame_wrap-inframe">
                    </label>
                </div>

                <div class="frametypearea">
                    <label>
                    <div class="sc_frame_wrap"><div class="sc_frame_title onframe" >タイトル</div><div class="sc_frame"><div class="sc_frame_text">テキストテキストテキストテキストテキストテキスト</div></div></div>
                    <input type="radio" id="editer_diver_sc_frame_type" name="editer_diver_sc_frame_type" value="sc_frame_wrap-onframe">
                    </label>
                </div>

                <div class="frametypearea">
                    <label>
                        <div class="sc_frame_wrap"><div class="sc_frame"><div class="sc_frame_text">テキストテキストテキストテキストテキストテキスト</div></div></div>
                        <input type="radio" id="editer_diver_sc_frame_type" name="editer_diver_sc_frame_type" value="sc_frame_wrap">
                    </label>
                </div>

                <div class="frametypearea">
                    <label>
                        <div class="sc_frame_wrap"><div class="sc_frame solid"><div class="sc_frame_text">テキストテキストテキストテキストテキストテキスト</div></div></div>
                        <input type="radio" id="editer_diver_sc_frame_type" name="editer_diver_sc_frame_type" value="sc_frame_wrap-solid">
                    </label>
                </div>
            </div>
            <br>

            <div class="oricolorarea">

                <label class="auxiliary_label">色</label>

                <?php 
                $color_set = array("blue","green","red","yellow","orange","white","gray","black","custom");
                $diver_op_frame_defcolor = get_option('diver_op_frame_defcolor','orange');
                ?>
             
                <?php foreach ($color_set as $value) : ?>
                    <label><input type="radio" id="editer_diver_sc_frameori_color" name="editer_diver_sc_frameori_color" value="<?php echo $value; ?>" <?php checked($value,$diver_op_frame_defcolor); ?>><span class="<?php echo $value; ?> colorsample"></span></label>
                <?php endforeach;?>

            </div>

            <div class="customcolorarea" style="display: none;">

            <br>

            <div class="harf">
            <label class="auxiliary_label">見出し背景色</label>
            <input type="text" id="editer_diver_sc_frame_titlebg" name="editer_diver_sc_frame_titlebg" value="<?php echo get_option('diver_op_frame_headercolor','#ccc'); ?>"></label></div>

            <div class="harf">
            <label class="auxiliary_label">見出しテキスト色</label>
            <input type="text" id="editer_diver_sc_frame_titlecolor" name="editer_diver_sc_frame_titlecolor" value="<?php echo get_option('diver_op_frame_headertxtcolor','#fff'); ?>"></label></p></div><br>

            <div class="tri">
            <label class="auxiliary_label">枠線色</label>
            <input type="text" id="editer_diver_sc_frame_border" name="editer_diver_sc_frame_border" value="<?php echo get_option('diver_op_frame_bordercolor','#ccc'); ?>"></label></div>
            <div class="tri">
            <label class="auxiliary_label">背景色</label>
            <input type="text" id="editer_diver_sc_frame_bg" name="editer_diver_sc_frame_bg" value="<?php echo get_option('diver_op_frame_bgcolor','#fff'); ?>"></label></div>

            <div class="tri">
            <label class="auxiliary_label">テキスト色</label>
            <input type="text" id="editer_diver_sc_frame_color" name="editer_diver_sc_frame_color" value="<?php echo get_option('diver_op_frame_textcolor','#333'); ?>"></label></div>
            <br>
</div>
            <br>


                <label class="auxiliary_label">装飾オプション</label>
                <input type="checkbox" id="editer_diver_sc_frame_title_design_note" name="editer_diver_sc_frame_title_design_note">罫線　
                <input type="checkbox" id="editer_diver_sc_frame_title_design_shadow" name="editer_diver_sc_frame_title_design_shadow">影　

            </div>
            <div class="submitbox">
                <div id="wp-link-cancel">
                    <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                </div>
                <div id="wp-link-update">
                    <input type="submit" value="囲い枠を挿入する" class="button button-primary" id="diver_ei_btn_yes">
                </div>
            </div>
        </form>
        </div>
<script type="text/javascript">
jQuery(document).ready(function($) {

        $("#editer_diver_sc_frame_titlebg").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.sc_frame_title').css('background-color',$( this ).wpColorPicker( 'color' ));
            }
        });

        $("#editer_diver_sc_frame_titlecolor").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.sc_frame_title').css('color',$( this ).wpColorPicker( 'color' ));
            }
        });

        $("#editer_diver_sc_frame_border").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.sc_frame').css('border-color',$( this ).wpColorPicker( 'color' ));
            }
        });

        $("#editer_diver_sc_frame_bg").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.sc_frame').css('background-color',$( this ).wpColorPicker( 'color' ));
            }
        });

        $("#editer_diver_sc_frame_color").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.sc_frame').css('color',$( this ).wpColorPicker( 'color' ));
            }
        });

        $('#editer_diver_sc_frame_title_design_shadow').on('change', function(){
          if ($(this).is(':checked')) {
            $('.sc_frame').addClass("shadow");
          } else {
            $('.sc_frame').removeClass("shadow");
          }
        });

        $('#editer_diver_sc_frame_title_design_note').on('change', function(){
          if ($(this).is(':checked')) {
            $('.sc_frame').addClass("note");
          } else {
            $('.sc_frame').removeClass("note");
          }
        });

        function setting_color($val){
            if($val=="custom"){
                $('.customcolorarea').fadeIn('slow');

                $('.sc_frame_title').css('background-color',$("#editer_diver_sc_frame_titlebg").val());
                $('.sc_frame_title').css('color',$("#editer_diver_sc_frame_titlecolor").val());
                $('.sc_frame').css('border-color',$("#editer_diver_sc_frame_border").val());
                $('.sc_frame').css('background-color',$("#editer_diver_sc_frame_bg").val());
                $('.sc_frame').css('color',$("#editer_diver_sc_frame_color").val());

            }else{
                $('.customcolorarea').fadeOut();
                switch($val){
                    case 'blue':
                        $('.sc_frame').css({'border-color':'#70b8f1','background-color':'#fff','color':'#777'});
                        $('.sc_frame.solid').css({'background-color':'#70b8f1','color':'#fff'});
                        $('.sc_frame_title').css({'background-color':'#70b8f1','color':'#fff'});
                        $('.sc_frame_title.onframe').css({'background-color':'#fff','color':'#70b8f1'});
                    break;
                    case 'green':
                        $('.sc_frame').css({'border-color':'#2ac113','background-color':'#fff','color':'#777'});
                        $('.sc_frame.solid').css({'background-color':'#2ac113','color':'#fff'});
                        $('.sc_frame_title').css({'background-color':'#2ac113','color':'#fff'});
                        $('.sc_frame_title.onframe').css({'background-color':'#fff','color':'#2ac113'});
                    break;
                    case 'red':
                        $('.sc_frame').css({'border-color':'#ff8178','background-color':'#fff','color':'#777'});
                        $('.sc_frame.solid').css({'background-color':'#ff8178','color':'#fff'});
                        $('.sc_frame_title').css({'background-color':'#ff8178','color':'#fff'});
                        $('.sc_frame_title.onframe').css({'background-color':'#fff','color':'#ff8178'});
                    break;
                    case 'yellow':
                        $('.sc_frame').css({'border-color':'#ffe822','background-color':'#fff','color':'#777'});
                        $('.sc_frame.solid').css({'background-color':'#ffe822','color':'#fff'});
                        $('.sc_frame_title').css({'background-color':'#ffe822','color':'#fff'});
                        $('.sc_frame_title.onframe').css({'background-color':'#fff','color':'#ffe822'});
                    break;
                    case 'orange':
                        $('.sc_frame').css({'border-color':'#ffa30d','background-color':'#fff','color':'#777'});
                        $('.sc_frame.solid').css({'background-color':'#ffa30d','color':'#fff'});
                        $('.sc_frame_title').css({'background-color':'#ffa30d','color':'#fff'});
                        $('.sc_frame_title.onframe').css({'background-color':'#fff','color':'#ffa30d'});
                    break;
                    case 'gray':
                        $('.sc_frame').css({'border-color':'#ccc','background-color':'#fff','color':'#777'});
                        $('.sc_frame.solid').css({'background-color':'#ccc','color':'#fff'});
                        $('.sc_frame_title').css({'background-color':'#ccc','color':'#fff'});
                        $('.sc_frame_title.onframe').css({'background-color':'#fff','color':'#ccc'});
                    break;               
                    case 'black':
                        $('.sc_frame').css({'border-color':'#000','background-color':'#fff','color':'#777'});
                        $('.sc_frame.solid').css({'background-color':'#000','color':'#fff'});
                        $('.sc_frame_title').css({'background-color':'#000','color':'#fff'});
                        $('.sc_frame_title.onframe').css({'background-color':'#fff','color':'#000'});
                    break;
                    default:

                    break;      
                }
            }
        }

        setting_color($('input[name="editer_diver_sc_frameori_color"]:checked').val());

        $('input[name="editer_diver_sc_frameori_color"]:radio').on('change', function(){
            setting_color($(this).val());
        });

});
</script>