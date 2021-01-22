<style>
.scrollarea {
    background: #fff;
    padding: 10px;
    height: 180px;
    overflow-y: auto;
}
.titlearea {
    padding: 10px;
}
.titlearea input[type=radio]{
    float: left;
    display: inline-block;
    margin: .75em 0;
}
.sc_title_wrap {
    padding: .8em 1em;
    font-size: 1em;
    font-weight: bold;
    margin-left: 25px;
}
.sc_title_wrap.solid{
    background: #000;
    color: #fff;
    border-radius: 3px;
}
.sc_title_wrap.bborder{
    border-width: 3px;
    border-color: #000;
    border-style: solid;
    color: #000;
}
.sc_title_wrap.bborder.a{
    border-width: 3px;
    border-radius: 3px;
}
.sc_title_wrap.bborder.tb{
    border-width: 3px 0 3px 0;
}
.sc_title_wrap.bborder.b{
    border-width:0 0 3px 0;
}
.sc_title_wrap.stech{
    background: #000;
    box-shadow: 0px 0px 0px 5px #000;
    border: dashed 2px #fff;
    color: #fff;
    border-radius: 3px;
}
.sc_title_wrap.bborder.l{
    border-width: 0 0 0 8px;
    background-color: #eee;
}
.sc_title_wrap.rlborder{
position: relative;
text-align: center;
}
.sc_title_wrap.rlborder .before{
content: '';
position: absolute;
top: 50%;
width: 100%;
height: 2px;
left: 0;
background-color: black;
}

.sc_title_wrap.rlborder .sc_title {
    background: #fff;
    position: relative;
    display: inline-block;
    padding: 0 2em;
}
.sc_title_wrap.fukidasi {
  position: relative;
  background-color: #000;
  border-radius: 6px;
  color: #fff;
}
.sc_title_wrap.fukidasi .after {
  position: absolute;
  top: 100%;
  left: 30px;
  content: '';
  width: 0;
  height: 0;
  border: 10px solid transparent;
  border-top: 10px solid #000;
}
.sc_title_wrap.count {
position: relative;
background: #efefef;
margin-left: 40px;
padding-left: 36px;
}
.sc_title_wrap.count .before {
line-height: 38px;
position: absolute;
color: white;
background: #000;
font-size: 1.2em;
width: 40px;
text-align: center;
left: -1.1em;
top:0;
bottom: 0;
}
.sc_title_wrap.countrad {
position: relative;
background: #eee;
border-radius: 0 5px 5px 0;
margin-left: 38px;
padding-left: 38px;
}
.sc_title_wrap.countrad .before {
line-height: 40px;
position: absolute;
color: white;
background: #000;
font-size: 1.2em;width: 40px;
text-align: center;
left: -1.1em;
top: 50%;
-moz-transform: translateY(-50%);
-webkit-transform: translateY(-50%);
-ms-transform: translateY(-50%);
transform: translateY(-50%);
border: solid 3px white; 
border-radius: 50%;
}
.sc_title_wrap.headtag {
    background:#000;
    color: #fff;
    vertical-align: middle;
    border-radius: 25px 0px 0px 25px;
}
.sc_title_wrap.headtag .before {color: #ccc;margin-right: 8px;float: left;font-size: 1.3em;}
</style>
 <div class="diver_editor_popup_title">見出し<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
        <div id="diver_editor_popup">
        <form  action="" id="diver_voice_form">
            <div class="auxiliary_scroll_area">

            <div style="display: inline-block;width: 60px;text-align: center;vertical-align: top;">
            <label class="auxiliary_label">タイプ</label>
            <select id="editer_diver_sc_heading_type" name="editer_diver_sc_heading_type">
                <option value="h2">h2</option>
                <option value="h3">h3</option>
                <option value="h4">h4</option>
                <option value="h5">h5</option>
                <option value="div">div</option>
            </select>
            </div>
            <div style="display: inline-block;width: 83%;vertical-align: top;">
            <label class="auxiliary_label">見出しテキスト</label><input type="text" id="editer_diver_sc_haeding_text" style="width:100%" required/>
            </div>
            <br><br>



            <label class="auxiliary_label">スタイル</label>
            <div class="scrollarea">
                <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-solid" checked="checked">
                    <div class="sc_title_wrap solid"><div class="sc_title" ><span class="before"></span>タイトル<span class="after"></span></div></div>
                    </label>
                </div>
                <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-bborder-a">
                    <div class="sc_title_wrap bborder a"><div class="sc_title" ><span class="before"></span>タイトル<span class="after"></span></div></div>
                    </label>
                </div>
                <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-bborder-tb">
                    <div class="sc_title_wrap bborder tb"><div class="sc_title" ><span class="before"></span>タイトル<span class="after"></span></div></div>
                    </label>
                </div>
                <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-bborder-b">
                    <div class="sc_title_wrap bborder b"><div class="sc_title" ><span class="before"></span>タイトル<span class="after"></span></div></div>
                    </label>
                </div>
                <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-stech">
                    <div class="sc_title_wrap stech"><div class="sc_title" ><span class="before"></span>タイトル<span class="after"></span></div></div>
                    </label>
                </div>
                <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-bborder-l">
                    <div class="sc_title_wrap bborder l"><div class="sc_title" ><span class="before"></span>タイトル<span class="after"></span></div></div>
                    </label>
                </div>
                <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-rlborder">
                    <div class="sc_title_wrap rlborder"><span class="before"></span><div class="sc_title" >タイトル</div><span class="after"></span></div>
                    </label>
                </div>
                 <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-fukidasi">
                    <div class="sc_title_wrap fukidasi"><div class="sc_title" ><span class="before"></span>タイトル<span class="after"></span></div></div>
                    </label>
                </div>
                 <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-count">
                    <div class="sc_title_wrap count"><div class="sc_title" ><span class="before">1</span>タイトル<span class="after"></span></div></div>
                    </label>
                </div>
                 <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-countrad">
                    <div class="sc_title_wrap countrad"><div class="sc_title" ><span class="before">1</span>タイトル<span class="after"></span></div></div>
                    </label>
                </div>
                 <div class="titlearea">
                    <label>
                    <input type="radio" id="editer_diver_sc_heading_style" name="editer_diver_sc_heading_style" value="sc_heading-headtag">
                    <div class="sc_title_wrap headtag"><div class="sc_title" ><span class="before">●</span>タイトル<span class="after"></span></div></div>
                    </label>
                </div>                 
                </div>
            <br>
            <div class="heading_option" style="display: none;">
            <label class="auxiliary_label">オプション</label><input type="number" id="editer_diver_sc_haeding_op_number" style="width:40px" min="0" value="1" required/>
            <br><br>
            </div>

            <div class="oricolorarea">
                <label class="auxiliary_label">色</label>

                <?php 
                $color_set = array("blue","green","red","yellow","orange","white","gray","black","custom");
                $diver_op_heading_defcolor = get_option('diver_op_heading_defcolor','blue');
                ?>
             
                <?php foreach ($color_set as $value) : ?>
                    <label><input type="radio" id="editer_diver_heading_color" name="editer_diver_heading_color" value="<?php echo $value; ?>" <?php checked($value,$diver_op_heading_defcolor); ?>><span class="<?php echo $value; ?> colorsample"></span></label>
                <?php endforeach;?>

            </div><br>
            <div class="customcolorarea" style="display: none;">

                <div class="tri">
                <label class="auxiliary_label">テキスト色</label>
                <input type="text" id="editer_diver_heading_txtcolor" name="editer_diver_heading_txtcolor" value="<?php echo get_option('diver_op_heading_textcolor','#333') ?>"></label>
                </div>

                <div class="tri">
                <label class="auxiliary_label">背景色</label>
                <input type="text" id="editer_diver_heading_bgcolor" name="editer_diver_heading_bgcolor" value="<?php echo get_option('diver_op_heading_bgcolor','#efefef') ?>"></label>
                </div>

                <div class="tri">
                <label class="auxiliary_label">枠線色</label>
                <input type="text" id="editer_diver_heading_bordercolor" name="editer_diver_heading_bordercolor" value="<?php echo get_option('diver_op_heading_bordercolor','#1e73be') ?>"></label>
                </div>

                <br><br>
            </div>

            </div>
            <div class="submitbox">
                <div id="wp-link-cancel">
                    <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
                </div>
                <div id="wp-link-update">
                    <input type="submit" value="見出しを挿入する" class="button button-primary" id="diver_ei_btn_yes">
                </div>
            </div>
        </form>
        </div>
<script type="text/javascript">
jQuery(document).ready(function($) {

         $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css({'background-color':'#70b8f1','color':'#fff'});
        $('.sc_title_wrap.bborder').css({'border-color':'#70b8f1','background-color':'#fff','color':'#70b8f1'});
        $('.sc_title_wrap.stech').css({'box-shadow':'0px 0px 0px 5px #70b8f1'});
        $('.sc_title_wrap.rlborder').css({'color':'#70b8f1','background-color':'#fff'});
        $('.sc_title_wrap.bborder.l,.sc_title_wrap.count,.sc_title_wrap.countrad').css({'background-color':'#f5faff','color':'#70b8f1'});
        $('.sc_title_wrap.headtag .before').css({'color':'#f5faff'});
        $('.sc_title_wrap.rlborder .before').css({'background-color':'#70b8f1'});
        $('.sc_title_wrap.fukidasi .after').css({'border-top-color':'#70b8f1'});

        $('input[name="editer_diver_sc_heading_style"]:radio').on('change', function(){
            if($(this).val().indexOf('count') != -1){
                $('.heading_option').fadeIn();
            }else{
                $('.heading_option').fadeOut();
            }
        });

        $("#editer_diver_heading_txtcolor").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css({'color':$( this ).wpColorPicker( 'color' )});
            }
        });

        $("#editer_diver_heading_bgcolor").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.sc_title_wrap').css({'background-color':$( this ).wpColorPicker( 'color' )});
                $('.sc_title_wrap.rlborder').css('background-color','#fff');
                $('.sc_title_wrap.fukidasi .after').css({'border-top-color':$( this ).wpColorPicker( 'color' )});
                $('.sc_title_wrap.stech').css('box-shadow','0 0 0 5px '+$( this ).wpColorPicker( 'color' ))
            }
        });

        $("#editer_diver_heading_bordercolor").wpColorPicker({
            palettes:   true,
            change:     function( event, ui ) {
                $('.sc_title_wrap.count .before,.sc_title_wrap.countrad .before,.sc_title_wrap.rlborder .before').css({'background-color':$( this ).wpColorPicker( 'color' )});
                $('.sc_title_wrap.bborder,.sc_title_wrap.stech').css({'border-color':$( this ).wpColorPicker( 'color' )});
                $('.sc_title_wrap.headtag .before').css({'color':$( this ).wpColorPicker( 'color' )});
            }
        });


        function setting_color($val){
            if($val=="custom"){
                $('.customcolorarea').fadeIn('slow');
                $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css('color',$("#editer_diver_heading_txtcolor").val());

                $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css('background-color',$("#editer_diver_heading_bgcolor").val());

                $('.sc_title_wrap').css({'background-color':$("#editer_diver_heading_bgcolor").val()});
                $('.sc_title_wrap.fukidasi .after').css({'border-top-color':$("#editer_diver_heading_bgcolor").val()});
                $('.sc_title_wrap.stech').css('box-shadow','0 0 0 5px '+$("#editer_diver_heading_bgcolor").val())
                $('.sc_title_wrap.rlborder').css('background-color','#fff');

                $('.sc_title_wrap.count .before,.sc_title_wrap.countrad .before,.sc_title_wrap.rlborder .before').css({'background-color':$("#editer_diver_heading_bordercolor").val()});
                $('.sc_title_wrap.bborder,.sc_title_wrap.stech').css({'border-color':$("#editer_diver_heading_bordercolor").val()});
                $('.sc_title_wrap.headtag .before').css({'color':$("#editer_diver_heading_bordercolor").val()});

            }else{

                $('.customcolorarea').fadeOut();
                switch($val){
                    case 'blue':
                        $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css({'background-color':'#70b8f1','color':'#fff'});
                        $('.sc_title_wrap.bborder').css({'border-color':'#70b8f1','background-color':'#fff','color':'#70b8f1'});
                        $('.sc_title_wrap.stech').css({'box-shadow':'0px 0px 0px 5px #70b8f1'});
                        $('.sc_title_wrap.rlborder').css({'color':'#70b8f1','background-color':'#fff'});
                        $('.sc_title_wrap.bborder.l,.sc_title_wrap.count,.sc_title_wrap.countrad').css({'background-color':'#f5faff','color':'#70b8f1'});
                        $('.sc_title_wrap.headtag .before').css({'color':'#f5faff'});
                        $('.sc_title_wrap.rlborder .before').css({'background-color':'#70b8f1'});
                        $('.sc_title_wrap.fukidasi .after').css({'border-top-color':'#70b8f1'});
                    break;
                    case 'green':
                        $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css({'background-color':'#2ac113','color':'#fff'});
                        $('.sc_title_wrap.bborder').css({'border-color':'#2ac113','background-color':'#fff','color':'#2ac113'});
                        $('.sc_title_wrap.stech').css({'box-shadow':'0px 0px 0px 5px #2ac113'});
                        $('.sc_title_wrap.rlborder').css({'color':'#2ac113','background-color':'#fff'});
                        $('.sc_title_wrap.bborder.l,.sc_title_wrap.count,.sc_title_wrap.countrad').css({'background-color':'#eeffe5','color':'#2ac113'});
                        $('.sc_title_wrap.headtag .before').css({'color':'#eeffe5'});
                        $('.sc_title_wrap.rlborder .before').css({'background-color':'#2ac113'});
                        $('.sc_title_wrap.fukidasi .after').css({'border-top-color':'#2ac113'});                
                        break;
                    case 'red':
                        $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css({'background-color':'#ff8178','color':'#fff'});
                        $('.sc_title_wrap.bborder').css({'border-color':'#ff8178','background-color':'#fff','color':'#ff8178'});
                        $('.sc_title_wrap.stech').css({'box-shadow':'0px 0px 0px 5px #ff8178'});
                        $('.sc_title_wrap.rlborder').css({'color':'#ff8178','background-color':'#fff'});
                        $('.sc_title_wrap.bborder.l,.sc_title_wrap.count,.sc_title_wrap.countrad').css({'background-color':'#fff0f0','color':'#ff8178'});
                        $('.sc_title_wrap.headtag .before').css({'color':'#fff0f0'});
                        $('.sc_title_wrap.rlborder .before').css({'background-color':'#ff8178'});
                        $('.sc_title_wrap.fukidasi .after').css({'border-top-color':'#ff8178'});           
                    break;
                    case 'yellow':
                        $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css({'background-color':'#ffe822','color':'#fff'});
                        $('.sc_title_wrap.bborder').css({'border-color':'#ffe822','background-color':'#fff','color':'#ffe822'});
                        $('.sc_title_wrap.stech').css({'box-shadow':'0px 0px 0px 5px #ffe822'});
                        $('.sc_title_wrap.rlborder').css({'color':'#ffe822','background-color':'#fff'});
                        $('.sc_title_wrap.bborder.l,.sc_title_wrap.count,.sc_title_wrap.countrad').css({'background-color':'#fffef4','color':'#ffe822'});
                        $('.sc_title_wrap.headtag .before').css({'color':'#fffef4'});
                        $('.sc_title_wrap.rlborder .before').css({'background-color':'#ffe822'});
                        $('.sc_title_wrap.fukidasi .after').css({'border-top-color':'#ffe822'}); 
                    break;
                    case 'orange':
                        $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css({'background-color':'#ffa30d','color':'#fff'});
                        $('.sc_title_wrap.bborder').css({'border-color':'#ffa30d','background-color':'#fff','color':'#ffa30d'});
                        $('.sc_title_wrap.stech').css({'box-shadow':'0px 0px 0px 5px #ffa30d'});
                        $('.sc_title_wrap.rlborder').css({'color':'#ffa30d','background-color':'#fff'});
                        $('.sc_title_wrap.bborder.l,.sc_title_wrap.count,.sc_title_wrap.countrad').css({'background-color':'#fffaf3','color':'#ffa30d'});
                        $('.sc_title_wrap.headtag .before').css({'color':'#fffaf3'});
                        $('.sc_title_wrap.rlborder .before').css({'background-color':'#ffa30d'});
                        $('.sc_title_wrap.fukidasi .after').css({'border-top-color':'#ffa30d'});
                                         break;
                    case 'gray':
                    $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css({'background-color':'#ccc','color':'#fff'});
                        $('.sc_title_wrap.bborder').css({'border-color':'#ccc','background-color':'#fff','color':'#ccc'});
                        $('.sc_title_wrap.stech').css({'box-shadow':'0px 0px 0px 5px #ccc'});
                        $('.sc_title_wrap.rlborder').css({'color':'#ccc','background-color':'#fff'});
                        $('.sc_title_wrap.bborder.l,.sc_title_wrap.count,.sc_title_wrap.countrad').css({'background-color':'#f9f9f9','color':'#ccc'});
                        $('.sc_title_wrap.headtag .before').css({'color':'#f9f9f9'});
                        $('.sc_title_wrap.rlborder .before').css({'background-color':'#ccc'});
                        $('.sc_title_wrap.fukidasi .after').css({'border-top-color':'#ccc'});
                    break;               
                    case 'black':
                        $('.sc_title_wrap,.sc_title_wrap.count .before,.sc_title_wrap.countrad .before').css({'background-color':'#000','color':'#fff'});
                        $('.sc_title_wrap.bborder').css({'border-color':'#000','background-color':'#fff','color':'#000'});
                        $('.sc_title_wrap.stech').css({'box-shadow':'0px 0px 0px 5px #000'});
                        $('.sc_title_wrap.rlborder').css({'color':'#000','background-color':'#fff'});
                        $('.sc_title_wrap.bborder.l,.sc_title_wrap.count,.sc_title_wrap.countrad').css({'background-color':'#eee','color':'#000'});
                        $('.sc_title_wrap.headtag .before').css({'color':'#eee'});
                        $('.sc_title_wrap.rlborder .before').css({'background-color':'#000'});
                        $('.sc_title_wrap.fukidasi .after').css({'border-top-color':'#000'});                
                        break;
                    default:

                    break;      
                }
            }
        }
        setting_color($('input[name="editer_diver_heading_color"]:checked').val());
        $('input[name="editer_diver_heading_color"]:radio').on('change', function(){
            setting_color($(this).val());
        });

});
</script>