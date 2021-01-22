<style>
.wp-picker-container {vertical-align: top;}
.badgetypearea {
    width: 70px;
    text-align: center;
    display:inline-block;
    padding: 10px 5px;
    vertical-align: middle;
    white-space: normal;
    position: relative;
}

.badgetypearea .cover{
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

.badge {
    background: #ff8178;
    color: #fff;
    padding: 5px 10px;
    font-size: 0.8em;
    border-radius: 3px;
    margin-bottom: 5px;
    display: inline-block;
    position: relative;
}

.badge.tag .before{
    position: absolute;
    top: 0;
    left: -15px;
    content: '';
    width: 0;
    height: 0;
    border-color: transparent #ff8178 transparent transparent;
    border-style: solid;
    border-width: 14px 16px 14px 0;
}
.badge.tag .after{
  position: absolute;
  top: 50%;
  left: -1px;
  z-index: 2;
  display: block;
  content: '';
  width: 6px;
  height: 6px;
  margin-top: -3px;
  background-color: #fff;
  border-radius: 100%;
}
.badge.tag {
    margin-left: 10px;
}
.badge.radius{
    border-radius: 50px;
    padding: 5px 15px;
}

.badge.cornertag {
    border-radius: 50px 3px 3px 50px;
    padding-left: 20px;
}
.badge.cornertag .before{
  position: absolute;
  top: 50%;
  left: 10px;
  z-index: 2;
  display: block;
  content: '';
  width: 6px;
  height: 6px;
  margin-top: -3px;
  background-color: #fff;
  border-radius: 100%;
}
.badge.border{
    border: 2px solid #ff8178;
    background: #fff;
    color: #ec5858;
    font-weight: bold;
}

.badge.v{
    padding-right: 12px;
}

.badge.v .before{
    position: absolute;
    top: 4px;
    right: -9px;
    content: '';
    width: 0;
    height: 0;
    border-color: transparent #ff8178 transparent;
    border-style: solid;
    border-width: 10px 0 10px 14px;
}

.badge i {
    vertical-align: baseline;
    font-weight: bold;
}

.badge i.before {margin-right: .5em;}
.badge i.after {margin-left: .5em;}
</style>
<div class="diver_editor_popup_title">バッジ<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
        <div id="diver_editor_popup">
        <form  action="" id="diver_voice_form">
            <div class="auxiliary_scroll_area">

                <div class="harf">
                    <label class="auxiliary_label">バッジテキスト</label>
                    <input type="text" id="editer_diver_sc_badge_text" style="width:80%" required/>
                </div>

                <div class="harf">
                    <label class="auxiliary_label">バッジアイコン</label>
                    <div id="iconpreview" class="iconpicker button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>　
                    <input type="hidden" class="iconpreview" id="editer_diver_sc_badge_icon" value="fa-arrow-circle-right">
                    <input type="radio" id="editer_diver_sc_badge_iconpos" name="editer_diver_sc_badge_iconpos" value="none" checked="checked">非表示　
                    <input type="radio" id="editer_diver_sc_badge_iconpos" name="editer_diver_sc_badge_iconpos" value="before">前　
                    <input type="radio" id="editer_diver_sc_badge_iconpos" name="editer_diver_sc_badge_iconpos" value="after">後ろ　
                </div>

                <br><br>

                <label class="auxiliary_label">バッジタイプ</label>

                <div class="scrollarea">

                    <div class="badgetypearea">
                        <label>
                            <span class="badge">バッジ</span>
                            <input type="radio" id="editer_diver_sc_badge_type" name="editer_diver_sc_badge_type" value="badge" checked="checked">
                        </label>
                    </div>

                    <div class="badgetypearea">
                        <label>
                            <span class="badge radius">バッジ</span>
                            <input type="radio" id="editer_diver_sc_badge_type" name="editer_diver_sc_badge_type" value="badge-radius">
                        </label>
                    </div>

                    <div class="badgetypearea">
                        <label>
                            <span class="badge tag"><span class="before"></span>バッジ<span class="after"></span></span>
                            <input type="radio" id="editer_diver_sc_badge_type" name="editer_diver_sc_badge_type" value="badge-btag">
                        </label>
                    </div>

                    <div class="badgetypearea">
                        <label>
                            <span class="badge cornertag"><span class="before"></span>バッジ<span class="after"></span></span>
                            <input type="radio" id="editer_diver_sc_badge_type" name="editer_diver_sc_badge_type" value="badge-cornertag">
                        </label>
                    </div>

                    <div class="badgetypearea">
                        <label>
                            <span class="badge v">バッジ<span class="before"></span></span>
                            <input type="radio" id="editer_diver_sc_badge_type" name="editer_diver_sc_badge_type" value="badge-v">
                        </label>
                    </div>

                    <div class="badgetypearea">
                        <label>
                            <span class="badge border">バッジ</span>
                            <input type="radio" id="editer_diver_sc_badge_type" name="editer_diver_sc_badge_type" value="badge-bborder" >
                        </label>
                    </div>

                    <div class="badgetypearea">
                        <label>
                            <span class="badge border radius">バッジ</span>
                            <input type="radio" id="editer_diver_sc_badge_type" name="editer_diver_sc_badge_type" value="badge-bborder-radius">
                        </label>
                    </div>
                </div><br>

                <div class="oricolorarea">

                    <label class="auxiliary_label">色</label>
                    <?php 
                    $color_set = array("blue","green","red","yellow","orange","white","gray","black","custom");
                    $diver_op_badge_defcolor = get_option('diver_op_badge_defcolor','red');
                    ?>
                 
                    <?php foreach ($color_set as $value) : ?>
                        <label><input type="radio" id="editer_diver_sc_badgeori_color" name="editer_diver_sc_badgeori_color" value="<?php echo $value; ?>" <?php checked($value,$diver_op_badge_defcolor); ?>><span class="<?php echo $value; ?> colorsample"></span></label>
                    <?php endforeach;?>

                </div><br>

            <div class="customcolorarea" style="display: none;">

                <div class="harf">
                <label class="auxiliary_label">背景色</label>
                <input type="text" id="editer_diver_sc_badge_bg" name="editer_diver_sc_badge_bg" value="<?php echo get_option('diver_op_badge_bgcolor','#607d8b') ?>"></label>
                </div>

                <div class="harf">
                <label class="auxiliary_label">テキスト色</label>
                <input type="text" id="editer_diver_sc_badge_color" name="editer_diver_sc_badge_color" value="<?php echo get_option('diver_op_badge_textcolor','#fff') ?>"></label>
                </div><br><br>
            </div>
        </div>
            <div class="submitbox">
                <div id="wp-link-cancel">
                    <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                </div>
                <div id="wp-link-update">
                    <input type="submit" value="バッジを挿入する" class="button button-primary" id="diver_ei_btn_yes">
                </div>
            </div>
        </form>
        </div>
<script type="text/javascript">
jQuery(document).ready(function($) {

        $("#editer_diver_sc_badge_bg").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.badge').css('background-color',$( this ).wpColorPicker( 'color' ));
                $('.badge.border').css({'background':'#fff','border-color':$( this ).wpColorPicker( 'color' )});
                $('.badge.v .before').css('border-color','transparent '+$( this ).wpColorPicker( 'color' )+' transparent');
                $('.badge.tag .before').css('border-color','transparent '+$( this ).wpColorPicker( 'color' )+' transparent transparent');  }
        });

        $("#editer_diver_sc_badge_color").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.badge').css('color',$( this ).wpColorPicker( 'color' ));
            }
        });

        function setting_color($val){
            if($val=="custom"){
            $('.customcolorarea').fadeIn('slow');

            var bgcolor = $("#editer_diver_sc_badge_bg").val();
            var textcolor = $("#editer_diver_sc_badge_color").val();

                $('.badge').css({'background-color':bgcolor,'color':textcolor});
                $('.badge.border').css({'background':'#fff','border-color':bgcolor,'color':textcolor});
                $('.badge.v .before').css('border-color','transparent '+bgcolor+' transparent');
                $('.badge.tag .before').css('border-color','transparent '+bgcolor+' transparent transparent');

            }else{
                $('.customcolorarea').fadeOut();
                switch($val){
                    case 'blue':
                        $('.badge').css({'background-color':'#70b8f1','color':'#fff'});
                        $('.badge.border').css({'background':'#fff','border-color':'#70b8f1','color':'#70b8f1'});
                        $('.badge.v .before').css('border-color','transparent #70b8f1 transparent');
                        $('.badge.tag .before').css('border-color','transparent #70b8f1 transparent transparent');
                    break;
                    case 'green':
                        $('.badge').css({'background-color':'#2ac113','color':'#fff'});
                        $('.badge.border').css({'background':'#fff','border-color':'#2ac113','color':'#2ac113'});
                        $('.badge.v .before').css('border-color','transparent #2ac113 transparent');
                        $('.badge.tag .before').css('border-color','transparent #2ac113 transparent transparent');
                    break;
                    case 'red':
                        $('.badge').css({'background-color':'#ff8178','color':'#fff'});
                        $('.badge.border').css({'background':'#fff','border-color':'#ff8178','color':'#ff8178'});
                        $('.badge.v .before').css('border-color','transparent #ff8178 transparent');
                        $('.badge.tag .before').css('border-color','transparent #ff8178 transparent transparent');
                        break;
                    case 'yellow':
                        $('.badge').css({'background-color':'#ffe822','color':'#505050'});
                        $('.badge.border').css({'background':'#fff','border-color':'#ffe822','color':'#ffe822'});
                        $('.badge.v .before').css('border-color','transparent #ffe822 transparent');
                        $('.badge.tag .before').css('border-color','transparent #ffe822 transparent transparent');                
                        break;
                    case 'orange':
                        $('.badge').css({'background-color':'#ffa30d','color':'#fff'});
                        $('.badge.border').css({'background':'#fff','border-color':'#ffa30d','color':'#ffa30d'});
                        $('.badge.v .before').css('border-color','transparent #ffa30d transparent');
                        $('.badge.tag .before').css('border-color','transparent #ffa30d transparent transparent');
                    break;
                    case 'gray':
                        $('.badge').css({'background-color':'#ccc','color':'#fff'});
                        $('.badge.border').css({'background':'#fff','border-color':'#ccc','color':'#ccc'});
                        $('.badge.v .before').css('border-color','transparent #ccc transparent');
                        $('.badge.tag .before').css('border-color','transparent #ccc transparent transparent');                
                        break;
                    case 'black':
                        $('.badge').css({'background-color':'#000','color':'#fff'});
                        $('.badge.border').css({'background':'#fff','border-color':'#000','color':'#000'});
                        $('.badge.v .before').css('border-color','transparent #000 transparent');
                        $('.badge.tag .before').css('border-color','transparent #000 transparent transparent');                
                    break;
                    default:

                    break;      
                }
            }
        }

        setting_color($('input[name="editer_diver_sc_badgeori_color"]:checked').val());
        $('input[name="editer_diver_sc_badgeori_color"]:radio').on('change', function(){
            setting_color($(this).val());
        });

});
</script>