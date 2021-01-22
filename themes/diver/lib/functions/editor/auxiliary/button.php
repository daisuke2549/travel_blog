<style>
.wp-picker-container {vertical-align: top;}
.btntypearea {
    width: 80px;
    text-align: center;
    display: inline-block;
    padding: 10px;
    vertical-align: top;
    white-space: normal;
    position: relative;
}

.btntypearea .cover{
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
.button_b{
    text-align: center;
    margin: 10px 0;
}

.button_b a{
    padding: .6em 1em;
    display: inline-block;
    position: relative;
    background-color: #70b8f1;
    border-radius: 3px;
    border-style: solid;
    border-width: 0px;
    color: #fff;
    font-weight: bold;
    text-decoration: none !important;
    font-size: .8em;
    text-shadow: 0 1px 1px rgba(200, 200, 200, .5);
    margin: 2px;
}

.button_b a i {
    vertical-align: baseline;
    line-height: 1;
  }

.button_b a i.before{margin-right: .5em;}
.button_b a i.after{margin-left: .5em;}

.button_b.shadow a{
    box-shadow: 0px 2px 10px 1px #ccc;
}

.button_b.radius a {
    border-radius: 50px;
}

.button_b.bborder a {
    border:2px solid #6894b7;
    margin: 0px;
}

.button_b.solid a{
  position: relative;
  box-shadow: 0 5px 0 #5c96cc;
  top:0px;
  text-shadow: 0 1px 1px rgba(0, 0, 0, .4);
}

.button_b.oborder a{
    border:2px solid #70b8f1;
	background:#fff;
	color: #70b8f1;
}

.button_b.frame a {
    box-shadow: 0px 0px 0px 2px #70b8f1;
    border: 2px solid #ffffff;
    margin: 0px;
}

</style>
<div class="diver_editor_popup_title">ボタン<a href="media-upload.php?tab=top&type=paka3Type&TB_iframe=true&width=600&height=550">戻る</a></div>
<div id="diver_editor_popup">
<form  action="" id="diver_voice_form">
    <div class="auxiliary_scroll_area">

    <div class="harf">
        <label class="auxiliary_label">ボタン生成タイプ</label>
        <input type="radio" id="editer_diver_sc_btn_extype" name="editer_diver_sc_btn_extype" value="normal" checked="checked">通常　
        <input type="radio" id="editer_diver_sc_btn_extype" name="editer_diver_sc_btn_extype" value="ad">広告タグから作成　
    </div>
    <div class="harf">
        <label class="auxiliary_label">リンクオプション</label>
        <label><input type="checkbox" id="editer_diver_sc_btn_url_blank" name="editer_diver_sc_btn_url_blank">別タブで開く　</label>
        <label><input type="checkbox" id="editer_diver_sc_btn_url_nofollow" name="editer_diver_sc_btn_url_nofollow">nofollow　</label>
        
    </div>

    <br><br>

    <div class="normaltype">
    <div class="harf">
    <label class="auxiliary_label">ボタンテキスト</label><input type="text" id="editer_diver_sc_btn_text" style="width:100%" required/>
    </div>
    <div class="harf">
    <label class="auxiliary_label">リンク先URL</label><input type="text" id="editer_diver_sc_btn_url" style="width:100%"/>
    </div>
    </div>

    <div class="adtype" style="display: none;">
    <label class="auxiliary_label">広告タグ</label><textarea id="editer_diver_sc_btn_adtag" style="width:100%;height:70px" required="required"></textarea>
    </div>
    <br>

    <label class="auxiliary_label">ボタンタイプ</label>

    <div class="scrollarea">
        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b simple block"><a href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="btn" checked="checked">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b bborder block"><a href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="bborder">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b shadow block"><a href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="shadow">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b shadow bborder block"><a style="border-color:#fff;" href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="shadow-bborder">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b frame block"><a style="border-color:#fff;" href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="frame">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b solid"><a style="border-color:#fff;" href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="solid">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b oborder block"><a href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="oborder">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b radius bborder block"><a href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="radius-bborder">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b radius shadow block"><a href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="radius-shadow">
            </label>
        </div>


        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b radius shadow bborder block"><a style="border-color:#fff;" href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="radius-shadow-bborder">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b radius solid"><a style="border-color:#fff;" href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="radius-solid">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b radius frame block"><a style="border-color:#fff;" href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="radius-frame">
            </label>
        </div>

        <div class="btntypearea">
            <label>
                <div class="cover"></div>
                <div class="button_b radius oborder block"><a href="#" class="midium"><i class="before fa" aria-hidden="true"></i>ボタン<i class="after fa" aria-hidden="true"></i></a></div>
                <input type="radio" id="editer_diver_sc_btn_type" name="editer_diver_sc_btn_type" value="oborder-radius">
            </label>
        </div>


    </div>
    <br>

<div class="oricolorarea">

    <label class="auxiliary_label">色</label>

    <?php 
    $color_set = array("blue","green","red","yellow","orange","white","gray","black","custom");
    $diver_op_btn_defcolor = get_option('diver_op_btn_defcolor','blue');
    ?>
 
    <?php foreach ($color_set as $value) : ?>
        <label><input type="radio" id="editer_diver_sc_btnori_color" name="editer_diver_sc_btnori_color" value="<?php echo $value; ?>" <?php checked($value,$diver_op_btn_defcolor); ?>><span class="<?php echo $value; ?> colorsample"></span></label>
    <?php endforeach;?>

</div>
<br>
<div class="customcolorarea" style="display: none;">
    <div class="tri">
        <label class="auxiliary_label">背景色</label>
        <input type="text" id="editer_diver_sc_btn_bg" name="editer_diver_sc_btn_bg" value="<?php echo get_option('diver_op_btn_bgcolor','#607d8b') ?>"></label></div>

    <div class="tri">
        <label class="auxiliary_label">テキスト色</label>
        <input type="text" id="editer_diver_sc_btn_color" name="editer_diver_sc_btn_color" value="<?php echo get_option('diver_op_btn_textcolor','#fff'); ?>"></label></div>

    <div class="tri">
        <label class="auxiliary_label">枠線色</label>
        <input type="text" id="editer_diver_sc_btn_border" name="editer_diver_sc_btn_border" value="<?php echo get_option('diver_op_btn_bordercolor','#607d8b') ?>"></label></div>
</div>
    <br><br>

    <label class="auxiliary_label">ボタンアイコン</label>
    <div id="iconpreview" class="iconpicker button"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></div>　
    <input type="hidden" class="iconpreview" id="editer_diver_sc_btn_icon" value="fa-arrow-circle-right">
    <input type="radio" id="editer_diver_sc_btn_iconpos" name="editer_diver_sc_btn_iconpos" value="none" checked="checked">非表示　
    <input type="radio" id="editer_diver_sc_btn_iconpos" name="editer_diver_sc_btn_iconpos" value="before">前　
    <input type="radio" id="editer_diver_sc_btn_iconpos" name="editer_diver_sc_btn_iconpos" value="after">後ろ　
    <input type="hidden" class="iconhistory" id="iconhistory" value="fa-arrow-circle-right">


    <br><br>

    <div class="harf">
        <label class="auxiliary_label">オプション</label>
        <input type="radio" id="editer_diver_sc_btn_style2" name="editer_diver_sc_btn_style2" value="block" <?php checked('block',get_option('diver_op_btn_style2','block')); ?>>ブロック　
        <input type="radio" id="editer_diver_sc_btn_style2" name="editer_diver_sc_btn_style2" value="inline" <?php checked('inline',get_option('diver_op_btn_style2','block')); ?>>インライン　
        <input type="radio" id="editer_diver_sc_btn_style2" name="editer_diver_sc_btn_style2" value="big" <?php checked('big',get_option('diver_op_btn_style2','block')); ?>>フルサイズ　
    </div>
    <div class="harf">
        <label class="auxiliary_label">大きさ</label>
        <input type="radio" id="editer_diver_sc_btn_size" name="editer_diver_sc_btn_size" value="big" <?php checked('big',get_option('diver_op_btn_size','midium')); ?>>大　
        <input type="radio" id="editer_diver_sc_btn_size" name="editer_diver_sc_btn_size" value="midium" <?php checked('midium',get_option('diver_op_btn_size','midium')); ?>>中　
        <input type="radio" id="editer_diver_sc_btn_size" name="editer_diver_sc_btn_size" value="small" <?php checked('small',get_option('diver_op_btn_size','midium')); ?>>小　
    </div>
</div>
    <div class="submitbox">
        <div id="wp-link-cancel">
            <button type="button" class="button" id="diver_ei_btn_no">キャンセル</button>
        </div>
        <div id="wp-link-update">
            <input type="submit" value="ボタンを挿入する" class="button button-primary" id="diver_ei_btn_yes">
        </div>
    </div>
</form>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {


    // $('#editer_diver_sc_btn_icon').on('input', function(event) {
    // var value = $("[name=editer_diver_sc_btn_iconpos]:checked").val();
    //  switch(value){
    //     case 'before':
    //         $('.button_b a i.before').removeClass($('#iconhistory').val());
    //         $('.button_b a i.before').addClass($(this).val());
    //     break;
    //     case 'after':
    //         $('.button_b a i.after').removeClass($('#iconhistory').val());
    //         $('.button_b a i.after').addClass($(this).val());
    //     break;
    //     default:

    //     break;
    // }
    // $('#iconhistory').val($(this).val());
    // });


    // $('input[name="editer_diver_sc_btn_iconpos"]:radio').on('change', function(){
    //     switch($(this).val()){
    //         case 'before':
    //             $('.button_b a i.before').addClass($('#iconhistory').val());
    //             $('.button_b a i.after').removeClass($('#iconhistory').val());
    //         break;
    //         case 'after':
    //             $('.button_b a i.after').addClass($('#iconhistory').val());
    //             $('.button_b a i.before').removeClass($('#iconhistory').val());
    //         break;
    //         default:
    //             $('.button_b a i.before').removeClass($('#iconhistory').val());
    //             $('.button_b a i.after').removeClass($('#iconhistory').val());
    //         break;
    //     }
    // });

    $("#editer_diver_sc_btn_border").wpColorPicker({
        palettes:   true,
        change:     function( event, ui ) {
            $('.button_b.bborder a').css('border-color',$( this ).wpColorPicker( 'color' ));
            $('.button_b.oborder a').css('border-color',$( this ).wpColorPicker( 'color' ));
        }
    });

    $("#editer_diver_sc_btn_bg").wpColorPicker({
        palettes:   true,
        change:     function( event, ui ) {
            $('.button_b a').css('background-color',$( this ).wpColorPicker( 'color' ));
            $('.button_b.frame a').css('box-shadow','0px 0px 0px 2px '+$( this ).wpColorPicker( 'color' ));    
            $('.button_b.oborder a').css('background-color','#fff');
        }
    });

    $("#editer_diver_sc_btn_color").wpColorPicker({
        palettes:   true,
        change:     function( event, ui ) {
            $('.button_b a').css('color',$( this ).wpColorPicker( 'color' ));
        }
    });

   if($("[name=editer_diver_sc_btn_color]:checked").val()=='norepeat'){
        $('.fv_image_bg_size').show();
    }else{
        $('.fv_image_bg_size').hide();
    }

    $('input[name="editer_diver_sc_btn_extype"]:radio').on('change', function(){
        switch($(this).val()){
            case 'normal':
                $('.normaltype').fadeIn('slow');
                $('.adtype').hide();
            break;
            default:
                $('.adtype').fadeIn('slow');
                $('.normaltype').hide();
            break;
        }
    });

    function setting_color($val){
        if($val=="custom"){

            $('.customcolorarea').fadeIn('slow');

            $('.button_b a').css('color',$("#editer_diver_sc_btn_color").val());
            $('.button_b.bborder a').css('border-color',$("#editer_diver_sc_btn_border").val());
            $('.button_b a').css('background-color',$("#editer_diver_sc_btn_bg").val());
            $('.button_b.frame a').css('box-shadow','0px 0px 0px 2px '+$("#editer_diver_sc_btn_bg").val());
            $('.button_b.oborder a').css({'background-color':'#fff','border-color':$("#editer_diver_sc_btn_border").val()});
            $('.button_b.solid a').css('box-shadow','0 5px 0 #eee');

        }else{
            $('.customcolorarea').fadeOut();
            switch($val){
                case 'blue':
                    $('.button_b a').css('background-color','#70b8f1');
                    $('.button_b.solid a').css('box-shadow','0 5px 0 #5c96cc');
                    $('.button_b a').css('color','#fff');
                    $('.button_b.bborder a').css('border-color','#6894b7');
                    $('.button_b.oborder a').css({'color':'#70b8f1','border-color':'#70b8f1','background-color':'#fff'});
                    $('.button_b.frame a').css('box-shadow','0px 0px 0px 2px #70b8f1');  
                    $('.button_b.bborder.shadow a').css('border-color','#fff');
                break;
                case 'green':
                    $('.button_b a').css('background-color','#2ac113');
                    $('.button_b.solid a').css('box-shadow','0 5px 0 #3da008');
                    $('.button_b a').css('color','#fff');
                    $('.button_b.bborder a').css('border-color','#05920e');
                    $('.button_b.oborder a').css({'color':'#2ac113','border-color':'#2ac113','background-color':'#fff'});
                    $('.button_b.frame a').css('box-shadow','0px 0px 0px 2px #2ac113'); 
                    $('.button_b.bborder.shadow a').css('border-color','#fff');
                break;
                case 'red':
                    $('.button_b a').css('background-color','#ff8178');
                    $('.button_b.solid a').css('box-shadow','0 5px 0 #dc6c60');
                    $('.button_b a').css('color','#fff');
                    $('.button_b.bborder a').css('border-color','#af5f5f');
                    $('.button_b.oborder a').css({'color':'#ff8178','border-color':'#ff8178','background-color':'#fff'});
                    $('.button_b.frame a').css('box-shadow','0px 0px 0px 2px #ff8178'); 
                    $('.button_b.bborder.shadow a').css('border-color','#fff');
                break;
                case 'yellow':
                    $('.button_b a').css('background-color','#ffe822');
                    $('.button_b.solid a').css('box-shadow','0 5px 0 #dac700');
                    $('.button_b a').css('color','#fff');
                    $('.button_b.bborder a').css('border-color','#deb80c');
                    $('.button_b.oborder a').css({'color':'#ffe822','border-color':'#ffe822','background-color':'#fff'});
                    $('.button_b.frame a').css('box-shadow','0px 0px 0px 2px #ffe822'); 
                    $('.button_b.bborder.shadow a').css('border-color','#fff');
                break;
                case 'orange':
                    $('.button_b a').css('background-color','#ffa30d');
                    $('.button_b.solid a').css('box-shadow','0 5px 0 #d28900');
                    $('.button_b a').css('color','#fff');
                    $('.button_b.bborder a').css('border-color','#b98b13');
                    $('.button_b.oborder a').css({'color':'#ffa30d','border-color':'#ffa30d','background-color':'#fff'});
                    $('.button_b.frame a').css('box-shadow','0px 0px 0px 2px #ffa30d');  
                    $('.button_b.bborder.shadow a').css('border-color','#fff');
                break;
                case 'white':
                    $('.button_b a').css('background-color','#fff');
                    $('.button_b.solid a').css('box-shadow','0 5px 0 #dcdcdc');
                    $('.button_b a').css('color','#000');
                    $('.button_b.bborder a').css('border-color','#000');
                    $('.button_b.oborder a').css({'color':'#fefefe','border-color':'#fefefe','background-color':'#fff'});
                    $('.button_b.frame a').css('box-shadow','0px 0px 0px 2px #fff'); 
                    $('.button_b.bborder.shadow a').css('border-color','#fff');
                break;
                case 'gray':
                    $('.button_b a').css('background-color','#eee');
                    $('.button_b.solid a').css('box-shadow','0 5px 0 #d8d8d8');
                    $('.button_b a').css('color','#505050');
                    $('.button_b.bborder a').css('border-color','#999');
                    $('.button_b.oborder a').css({'color':'#eee','border-color':'#eee','background-color':'#fff'});
                    $('.button_b.frame a').css('box-shadow','0px 0px 0px 2px #eee'); 
                    $('.button_b.bborder.shadow a').css('border-color','#fff');
                break;                
                case 'black':
                    $('.button_b a').css('background-color','#000');
                    $('.button_b.solid a').css('box-shadow','0 5px 0 #696969');
                    $('.button_b a').css('color','#fff');
                    $('.button_b.bborder a').css('border-color','#b1b1b1');
                    $('.button_b.oborder a').css({'color':'#000','border-color':'#000','background-color':'#fff'});
                    $('.button_b.frame a').css('box-shadow','0px 0px 0px 2px #000'); 
                    $('.button_b.bborder.shadow a').css('border-color','#fff');
                break;
                default:

                break;      
            }
        }
    }

    setting_color($('input[name="editer_diver_sc_btnori_color"]:checked').val());
    

    $('input[name="editer_diver_sc_btnori_color"]:radio').on('change', function(){
        setting_color($(this).val());
    });

});
</script>