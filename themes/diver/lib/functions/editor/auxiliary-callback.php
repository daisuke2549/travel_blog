<?php
function auxiliary_call(){
    global $type;
    global $tab;
           ?>
    <script type="text/javascript">

    jQuery(function($) {
        $(document).ready(function() {
            $('#diver_ei_btn_yes').on('click', function() {

        /************************
            headline
        ************************/
                <?php if($tab == "heading"): ?>
                    if($('#editer_diver_sc_haeding_text').val()){
                        var text = $('#editer_diver_sc_haeding_text').val();
                        var type = $('#editer_diver_sc_heading_type option:selected').val();

                        var html = '';

                        var style = document.getElementsByName('editer_diver_sc_heading_style');
                        for (i = 0; i < style.length; i++) {
                            if (style[i].checked) {
                                stylev = style[i].value;
                            }
                        }
                        var c = "";
                        var stylearr = stylev.split("-");
                        for (var i in stylearr) {
                            c += stylearr[i] + " ";
                        }

                        var color = document.getElementsByName('editer_diver_heading_color');
                        for (i = 0; i < color.length; i++) {
                            if (color[i].checked) {
                                colorv = color[i].value;
                            }
                        }

                        var html = '';
                        var number = $('#editer_diver_sc_haeding_op_number').val();

                        if(colorv=='custom'){
                            var textcolor = $('#editer_diver_heading_txtcolor').val();
                            var bgcolor = $('#editer_diver_heading_bgcolor').val();
                            var bordercolor = $('#editer_diver_heading_bordercolor').val();

                            html = '<'+type+' class="'+c+colorv+'" style="color:'+textcolor+';background-color:'+bgcolor+';border-color:'+bordercolor+';"><span class="sc_title" >'+text+'</span></'+type+'>';

                            if(stylev.indexOf('stech') != -1){
                                html = '<'+type+' class="'+c+colorv+'" style="color:'+textcolor+';background-color:'+bgcolor+';border-color:'+bordercolor+';box-shadow:'+bgcolor+' 0px 0px 0px 5px;"><span class="sc_title" >'+text+'</span></'+type+'>';
                            }else if(stylev.indexOf('rlborder') != -1){
                                html = '<'+type+' class="'+c+colorv+'" style="color:'+textcolor+';background-color:#fff;"><span class="before" style="background-color:'+bordercolor+';"></span><span class="sc_title" >'+text+'</span></'+type+'>';
                            }else if(stylev.indexOf('headtag') != -1){
                                html = '<'+type+' class="'+c+colorv+'" style="color:'+textcolor+';background-color:'+bgcolor+';"><span class="sc_title" ><span class="before" style="color:'+bordercolor+';">●</span>'+text+'</span></'+type+'>';
                            }else if(stylev.indexOf('fukidasi') != -1){
                                html = '<'+type+' class="'+c+colorv+'" style="color:'+textcolor+';background-color:'+bgcolor+';"><span class="sc_title" >'+text+'<span class="after" style="border-top-color:'+bgcolor+';"></span></span></'+type+'>';
                            }

                            if(stylev.indexOf('count') != -1){
                                html = '<'+type+' class="'+c+colorv+'" style="color:'+textcolor+';background-color:'+bgcolor+';"><span class="before" style="background-color:'+bordercolor+';color:'+textcolor+';">'+number+'</span><span class="sc_title" >'+text+'</span></'+type+'>';
                            }

                        }else{
                            if(stylev.indexOf('count') != -1){
                                html = '<'+type+' class="'+c+colorv+'"><span class="sc_title" ><span class="before">'+number+'</span>'+text+'</span></'+type+'>';
                            }else{
                                html = '<'+type+' class="'+c+colorv+'"><span class="sc_title" >'+text+'</span></'+type+'>';
                            }
                        }

                        top.send_to_editor(html);
                        top.tb_remove(); 
                    }
        /************************
            button
        ************************/
                <?php elseif($tab == "button"): ?>
                        var bgcolor = $('#editer_diver_sc_btn_bg').val();
                        var bordercolor = $('#editer_diver_sc_btn_border').val();
                        var textcolor = $('#editer_diver_sc_btn_color').val();
                        var icon = $('#editer_diver_sc_btn_icon').val();

                        var target = ""
                        if($('#editer_diver_sc_btn_url_blank').prop('checked')){
                            target = ' target="_blank"';
                        }

                        var rel = ""
                        if($('#editer_diver_sc_btn_url_nofollow').prop('checked')){
                            rel = ' rel="nofollow"';
                        }

                        var type = document.getElementsByName('editer_diver_sc_btn_type');
                        for (i = 0; i < type.length; i++) {
                            if (type[i].checked) {
                                typev = type[i].value;
                            }
                        }

                        var style2 = document.getElementsByName('editer_diver_sc_btn_style2');
                        for (i = 0; i < style2.length; i++) {
                            if (style2[i].checked) {
                                style2v = style2[i].value;
                            }
                        }

                        var size = document.getElementsByName('editer_diver_sc_btn_size');
                        for (i = 0; i < size.length; i++) {
                            if (size[i].checked) {
                                sizev = size[i].value;
                            }
                        }

                        var pos = document.getElementsByName('editer_diver_sc_btn_iconpos');
                        for (i = 0; i < pos.length; i++) {
                            if (pos[i].checked) {
                                posv = pos[i].value;
                            }
                        }

                        var color = document.getElementsByName('editer_diver_sc_btnori_color');
                        for (i = 0; i < color.length; i++) {
                            if (color[i].checked) {
                                colorv = color[i].value;
                            }
                        }


                        var ex = document.getElementsByName('editer_diver_sc_btn_extype');
                        for (i = 0; i < ex.length; i++) {
                            if (ex[i].checked) {
                                exv = ex[i].value;
                            }
                        }

                        var text = "";
                        var url = "";
                        var afimg = "";

                        if(exv=="ad"){

                            var aftag = $('#editer_diver_sc_btn_adtag').val();
                            var adsrc = aftag.match(/<a.*?href=("|')(.*?)("|').*?>(.*)<\/a>/i)
                            var afimg = aftag.match(/<img[^>]+>/gi);

                            url = adsrc[2];
                            text = adsrc[4];
                        } else{
                            text = $('#editer_diver_sc_btn_text').val();
                            url = $('#editer_diver_sc_btn_url').val();
                        }

                        var c = "";
                        var typearr = typev.split("-");
                        for (var i in typearr) {
                            c += typearr[i] + " ";
                        }

                        var iconhtml = '';
                        if(posv!="none"){
                            iconhtml = '<i class="fa '+icon+' '+posv+'" aria-hidden="true"><span>'+icon+'</span></i>';
                        }

                        var html = '';
                        var linkstyle = '';
                        if(colorv=='custom'){
                            linkstyle = 'style="background-color:'+bgcolor+';color:'+textcolor+';"';

                            if(typev.match(/bborder/)){
                                linkstyle = 'style="border-color:'+bordercolor+';background-color:'+bgcolor+';color:'+textcolor+';"';
                            }else if(typev.match(/frame/)){
                                linkstyle = 'style="box-shadow:0px 0px 0px 2px '+bgcolor+';background-color:'+bgcolor+';color:'+textcolor+';"';
                            }else if(typev.match(/oborder/)){
                                linkstyle = 'style="border-color:'+bordercolor+';color:'+textcolor+';"';
                            }

                            html = '<div class="button '+c+' '+style2v+' '+colorv+'"><a '+linkstyle+' href="'+url+'" class="'+sizev+'"'+target+rel+'>';
                        }else{
                            html = '<div class="button '+c+' '+style2v+' '+colorv+'"><a href="'+url+'" class="'+sizev+'"'+target+rel+'>';
                        }

                        if(posv=='before'){
                            html += iconhtml+text+'</a>';
                        }else if(posv=='after'){
                            html += text+iconhtml+'</a>';
                        }else if(posv=='none'){
                            html += text+'</a>';
                        }

                        if(afimg){
                            html += afimg;
                        }

                        html += '</div>';

                        top.send_to_editor(html);
                        top.tb_remove(); 
        /************************
            budge
        ************************/
                <?php elseif($tab == "badge"): ?>
                    if($('#editer_diver_sc_badge_text').val()){
                        var text = $('#editer_diver_sc_badge_text').val();
                        var bgcolor = $('#editer_diver_sc_badge_bg').val();
                        var textcolor = $('#editer_diver_sc_badge_color').val();
                        var icon = $('#editer_diver_sc_badge_icon').val();


                        var pos = document.getElementsByName('editer_diver_sc_badge_iconpos');
                        for (i = 0; i < pos.length; i++) {
                            if (pos[i].checked) {
                                posv = pos[i].value;
                            }
                        }

                        var type = document.getElementsByName('editer_diver_sc_badge_type');
                        for (i = 0; i < type.length; i++) {
                            if (type[i].checked) {
                                typev = type[i].value;
                            }
                        }

                        var c = "";
                        var typearr = typev.split("-");
                        for (var i in typearr) {
                            c += typearr[i] + " ";
                        }

                        var color = document.getElementsByName('editer_diver_sc_badgeori_color');
                        for (i = 0; i < color.length; i++) {
                            if (color[i].checked) {
                                colorv = color[i].value;
                            }
                        }

                        var html = "";
                        if(colorv==='custom'){
                            if(typev.match(/v/)){
                                html = '<span class="'+c+'" style="background:'+bgcolor+';color:'+textcolor+';"><span class="beforespan" style="border-color:transparent '+bgcolor+' transparent;"></span>';
                            }else if(typev.match(/btag/)){
                                html = '<span class="'+c+'" style="background:'+bgcolor+';color:'+textcolor+';"><span class="beforespan" style="border-color:transparent '+bgcolor+' transparent transparent;"></span>';
                            }else if(typev.match(/bborder/)){
                                html = '<span class="'+c+'" style="border-color:'+bgcolor+';color:'+textcolor+';">';
                            }else{
                                html = '<span class="'+c+'" style="background:'+bgcolor+';color:'+textcolor+';">';
                            }
                        }else{

                            $('.badge.v .before').css('border-color','transparent #2ac113 transparent');
                            $('.badge.tag .before').css('border-color','transparent #2ac113 transparent transparent');

                            html = '<span class="'+c+' '+colorv+'">';
                        }

                        var iconhtml = '';
                        if(posv!="none"){
                            iconhtml = '<i class="fa '+icon+' '+posv+'" aria-hidden="true"><span>'+icon+'</span></i>';
                        }
                        
                        if(posv=='before'){
                            html += iconhtml+text+'</span>';
                        }else if(posv=='after'){
                            html += text+iconhtml+'</span>';
                        }else if(posv=='none'){
                            html += text+'</span>';
                        }

                        top.send_to_editor(html);
                        top.tb_remove(); 
                    }
        /************************
            frame
        ************************/
                <?php elseif( $tab == "frame" ): ?>
                    if($('#editer_diver_sc_frame_type').val()){
                        var title = $('#editer_diver_sc_frame_title').val();
                        var text = $('#editer_diver_sc_frame_text').val();
                        var bordercolor = $('#editer_diver_sc_frame_border').val();
                        var titlebgcolor = $('#editer_diver_sc_frame_titlebg').val();
                        var titlecolor = $('#editer_diver_sc_frame_titlecolor').val();
                        var bgcolor = $('#editer_diver_sc_frame_bg').val();
                        var textcolor = $('#editer_diver_sc_frame_color').val();
                        var icon = $('#editer_diver_sc_frame_icon').val();

                        if(text){
                            text = '<div class="sc_frame_text">'+text.replace(/\r?\n/g, '<br>')+'</div>';
                        }

                        var design ='';
                        if($('#editer_diver_sc_frame_title_design_note').prop('checked')){
                            design += 'note ';
                        }
                        if($('#editer_diver_sc_frame_title_design_shadow').prop('checked')){
                            design += 'shadow ';
                        }
                        if($('#editer_diver_sc_frame_title_design_tape').prop('checked')){
                            design += 'tape ';
                        }

                        var color = document.getElementsByName('editer_diver_sc_frameori_color');
                        for (i = 0; i < color.length; i++) {
                            if (color[i].checked) {
                                colorv = color[i].value;
                            }
                        }

                        var type = document.getElementsByName('editer_diver_sc_frame_type');
                        for (i = 0; i < type.length; i++) {
                            if (type[i].checked) {
                                typev = type[i].value;
                            }
                        }

                        var c = "";
                        var typearr = typev.split("-");
                        for (var i in typearr) {
                            c += typearr[i] + " ";
                        }


                        var pos = document.getElementsByName('editer_diver_sc_frame_iconpos');
                        for (i = 0; i < pos.length; i++) {
                            if (pos[i].checked) {
                                posv = pos[i].value;
                            }
                        }

                         var iconhtml = '';
                        if(posv!="none"){
                            iconhtml = '<div class="sc_frame_icon"><i class="fa '+icon+'" aria-hidden="true"><span>'+icon+'</span></i></div>';
                        }

                        if(posv=='before'){
                            title = iconhtml+'<span>'+title+'</span>';
                        }else if(posv=='after'){
                            text = iconhtml+text;
                        }

                        var titilehtml = "";
                        var html = "";


                        if(colorv=='custom'){
                            if(title){
                                titilehtml = '<div class="sc_frame_title" style="color:'+titlecolor+';background-color:'+titlebgcolor+';">'+title+'</div>';
                            }

                            html = '<div class="'+c+' '+colorv+'">'+titilehtml+'<div class="sc_frame '+design+'" style="border-color:'+bordercolor+';background-color:'+bgcolor+';color:'+textcolor+';">'+text+'</div></div>';
                        }else{
                            if(title){
                                titilehtml = '<div class="sc_frame_title">'+title+'</div>';
                            }

                            html = '<div class="'+c+' '+colorv+'">'+titilehtml+'<div class="sc_frame '+design+'">'+text+'</div></div>';
                        }


                        top.send_to_editor(html);
                        top.tb_remove(); 
                    }

         /************************
            designlist
        ************************/
                <?php elseif( $tab == "iconlist" ): ?>
                    var html = $('#editer_diver_sc_designlist_text').val();

                    var type = document.getElementsByName('editer_diver_sc_designlist_type');
                    for (i = 0; i < type.length; i++) {
                        if (type[i].checked) {
                            typev = type[i].value;
                        }
                    }

                    var c = "";
                    var typearr = typev.split("-");
                    for (var i in typearr) {
                        c += typearr[i] + " ";
                    }

                    var color = document.getElementsByName('editer_diver_sc_designlist_color');
                    for (i = 0; i < color.length; i++) {
                        if (color[i].checked) {
                            colorv = color[i].value;
                        }
                    }

                    var re_html = '<div class="'+c+' '+colorv+'">'+html+'</div>';

                    top.send_to_editor(re_html);
                    top.tb_remove(); 
         /************************
            border
        ************************/
                <?php elseif( $tab == "border" ): ?>
                    var color = $('#editer_diver_sc_border_color').val();
                    var width = $('#editer_diver_sc_border_width').val();

                    var style = document.getElementsByName('editer_diver_sc_border_style');
                    for (i = 0; i < style.length; i++) {
                        if (style[i].checked) {
                            stylev = style[i].value;
                        }
                    }

                    var html = '<div class="border" style="border-color:'+color+';border-top-width:'+width+'px;border-top-style:'+stylev+';"></div>';
                    top.send_to_editor(html);
                    top.tb_remove(); 
        /************************
            icon
        ************************/
                <?php elseif( $tab == "icon" ): ?>
                    var icon = $('#editer_diver_sc_icon_icon').val();
                    var color = $('#editer_diver_sc_icon_color').val();

                    var style = document.getElementsByName('editer_diver_sc_icon_size_style');
                    for (i = 0; i < style.length; i++) {
                        if (style[i].checked) {
                            stylev = style[i].value;
                        }
                    }

                    var size = '';
                    if(stylev=='false'){
                        size = 'font-size:'+$('#editer_diver_sc_icon_size').val()+'px';
                    }

                    var html = '<span class="sc_content_icon" style="color:'+color+';'+size+'"><i class="fa '+icon+'" aria-hidden="true"><span>'+icon+'</span></i></span>';
                    top.send_to_editor(html);
                    top.tb_remove(); 
         /************************
            grid
        ************************/
                <?php elseif( $tab == "grid" ): ?>
                    var layout = document.getElementsByName('editer_diver_sc_layout_style');
                    for (i = 0; i < layout.length; i++) {
                        if (layout[i].checked) {
                            layoutv = layout[i].value;
                        }
                    }

                    var option = '';
                    if($('#editer_diver_sc_layout_sp').prop('checked')){
                        option += ' sp';
                    }

                    if($('#editer_diver_sc_layout_padding').prop('checked')){
                        option += ' padding0';
                    }

                    var html = '<div class="row'+option+'">';

                    switch (layoutv){
                        case 'layout2':
                            html += '\n<div class="sc_col2'+option+'">\n\n</div>\n<div class="sc_col2'+option+'">\n\n</div>';
                            break;
                        case 'layout3':
                            html += '\n<div class="sc_col3'+option+'">\n\n</div>\n<div class="sc_col3'+option+'">\n\n</div>\n<div class="sc_col3'+option+'">\n\n</div>';
                            break;
                        case 'layout4':
                             html += '\n<div class="sc_col4'+option+'">\n\n</div>\n<div class="sc_col4'+option+'">\n\n</div>\n<div class="sc_col4'+option+'">\n\n</div>\n<div class="sc_col4'+option+'">\n\n</div>';
                            break;
                        case 'layout211':
                            html += '\n<div class="sc_col2'+option+'">\n\n</div>\n<div class="sc_col4'+option+'">\n\n</div>\n<div class="sc_col4'+option+'">\n\n</div>';
                            break;
                        case 'layout112':
                            html += '\n<div class="sc_col4'+option+'">\n\n</div>\n<div class="sc_col4'+option+'">\n\n</div>\n<div class="sc_col2'+option+'">\n\n</div>';
                            break;
                        case 'layout121':
                            html += '\n<div class="sc_col4'+option+'">\n\n</div>\n<div class="sc_col2'+option+'">\n\n</div>\n<div class="sc_col4'+option+'">\n\n</div>';
                            break;
                        case 'layout21':
                            html += '\n<div class="sc_col3_2'+option+'">\n\n</div>\n<div class="sc_col3 '+option+'">\n\n</div>';
                            break;
                        case 'layout12':
                            html += '\n<div class="sc_col3'+option+'">\n\n</div>\n<div class="sc_col3_2'+option+'">\n\n</div>';
                            break;
                        case 'layout31':
                            html += '\n<div class="sc_col4_3'+option+'">\n\n</div>\n<div class="sc_col4'+option+'">\n\n</div>';
                            break;
                        case 'layout13':
                            html += '\n<div class="sc_col4'+option+'">\n\n</div>\n<div class="sc_col4_3'+option+'">\n\n</div>';
                            break;
                    }

                    html += '</div>';

                    top.send_to_editor(html);
                    top.tb_remove(); 
         /************************
            blockquote
        ************************/
                <?php elseif( $tab == "bq" ): ?>
                    if($('#editer_diver_sc_bq_text').val()){

                        var text = $('#editer_diver_sc_bq_text').val().replace(/\r?\n/g, '<br>');
                        var title = $('#editer_diver_sc_bq_title').val();
                        var url = $('#editer_diver_sc_bq_url').val();

                        var html ='<blockquote>'+text;

                        if(title){
                            html += '<div class="blockquote_ref"><div>';
                            if(url){
                                html += '<a href="'+url+'" target="_blank">'+title+'</a></div></div>';
                            }else{
                                html += title+'</div></div>';
                            }
                        }

                        html += '</blockquote>';
                        top.send_to_editor(html);
                        top.tb_remove(); 
                    };
        /*******************
            amp contents
        ************************/
                <?php elseif( $tab == "amp" ): ?>
                    var noamptxt = $('#editer_diver_amp_normal').val().replace(/\r?\n/g, '<br>');
                    var amptxt = $('#editer_diver_amp_amp').val().replace(/\r?\n/g, '<br>');

                    var html = '[sw_no_amp]'+noamptxt+'[/sw_no_amp][sw_amp]'+amptxt+'[/sw_amp]';
                    top.send_to_editor(html);
                    top.tb_remove(); 
        /*******************
            glaph hr
        ************************/
                <?php elseif( $tab == "ghr" ): ?>
                    var text = $('#editer_diver_sc_ghr_text').val();
                    var width = $('#editer_diver_sc_ghr_width').val();
                    var color = $('#editer_diver_sc_ghr_color').val();

                    var html = '<div class="barchart" style="width:'+width+'%;background:'+color+';">'+text+'</div>';
                    top.send_to_editor(html);
                    top.tb_remove(); 
         /************************
            balloon
        ************************/
                <?php elseif( $tab == "balloon" ): ?>
                    if($('#editer_diver_sc_balloon_text').val()){

                        var text = $('#editer_diver_sc_balloon_text').val().replace(/\r?\n/g, '<br>');
                        var radius = $('#editer_diver_sc_balloon_radius').val();
                        var type = document.getElementsByName('editer_diver_sc_balloon_type');
                        for (i = 0; i < type.length; i++) {
                            if (type[i].checked) {
                                typev = type[i].value;
                            }
                        }

                        var html = '<div class="sc_balloon '+typev+'" style="border-radius:'+radius+'px;">'+text+'</div>';
                        top.send_to_editor(html);
                        top.tb_remove(); 
                    };
         /************************
            cord snippet
        ************************/
                <?php elseif( $tab == "cord" ): ?>
                    if($('#editer_diver_sc_cord_text').val()){
                        var num = $('#editer_diver_sc_cord_num:checked').val();
                        var lang = $('#editer_diver_sc_cord_lang option:selected').val();

                        var cl = "";
                        if(num){
                            cl = "line-numbers";
                        }

                        var str = '& < > ` " ' + "'";
                        var escapeHtml = (function (String) {
                          var escapeMap = {
                            '&': '&amp;',
                            "'": '&#x27;',
                            '`': '&#x60;',
                            '"': '&quot;',
                            '<': '&lt;',
                            '>': '&gt;'
                          };
                          var escapeReg = '[';
                          var reg;
                          for (var p in escapeMap) {
                            if (escapeMap.hasOwnProperty(p)) {
                              escapeReg += p;
                            }
                          }
                          escapeReg += ']';
                          reg = new RegExp(escapeReg, 'g');
                         
                          return function escapeHtml (str) {
                            str = (str === null || str === undefined) ? '' : '' + str;
                            return str.replace(reg, function (match) {
                              return escapeMap[match];
                            });
                          };
                        }(String));

                        var cord = escapeHtml($('#editer_diver_sc_cord_text').val());


                        var html = '<pre class="'+cl+'"><code class="language-'+lang+'">'+cord+'</code></pre>';
                        top.send_to_editor(html);
                        top.tb_remove(); 
                    };
         /************************
            review
        ************************/
                <?php elseif( $tab == "review" ): ?>
                    if($('#editer_diver_sc_review_score').val()){

                        var score = $('#editer_diver_sc_review_score').val();
                        var type = document.getElementsByName('editer_diver_sc_review_type');
                        for (i = 0; i < type.length; i++) {
                            if (type[i].checked) {
                                typev = type[i].value;
                            }
                        }

                        var width = '180';
                        var height = '33';
                        var scorewidth = '36';

                        if(typev=='big'){
                            height = '51';
                            width = '280';
                            scorewidth = '56';
                        }else if(typev=='small'){
                            height = '22';
                            width = '120';
                            scorewidth = '24';
                        }

                        if(score){
                            scoresize = (score<=5&&score>=0) ? score*scorewidth : 5 ;
                        }

                        var html = '<div class="review_star '+typev+'" style="height:'+height+'px;width:'+width+'px"><div class="star '+Math.round(score)+'" style="width:'+scoresize+'px;height:'+height+'px;"></div></div>';
                        top.send_to_editor(html);
                        top.tb_remove(); 
                    };
         /************************
            review tabel
        ************************/
                <?php elseif( $tab == "reviewtable" ): ?>

                    var harfcount = 0;
                    var html ='<table class="diver_review_table">'; 
                    var countval = document.getElementsByName('editer_diver_review_table_count');
                    for (i = 0; i < countval.length; i++) {
                        var count = countval[i].value;


                        var style = document.getElementsByName('editer_diver_review_table_style_'+count);
                        for (k = 0; k < style.length; k++) {
                            if (style[k].checked) {
                                stylev = style[k].value;
                            }
                        }

                        var col = $('#editer_diver_review_table_col_'+count).val();
                        var title = $('#editer_diver_review_table_title_'+count).val();
                        var text = $('#editer_diver_review_table_text_'+count).val().replace(/\r?\n/g, '<br>');
                        var star = $('#editer_diver_review_table_star_'+count).val();

                        var width = '100';
                        var height = '18';
                        var scorewidth = '20';

                        if(star){
                            starsize = (star<=5&&star>=0) ? star*scorewidth : 5 ;
                        }

                        if(harfcount == 0){
                            html += '<tr>';
                        }

                        html += '<th class="diver_review_table">'+title+'</th>';

                        if(col=='harf'){
                            harfcount++;
                            if(stylev=="text"){
                                html += '<td class="table_harf">'+text+'</td>';
                            }else{
                                html += '<td class="table_harf"><div class="review_star" style="height:'+height+'px;width:'+width+'px"><div class="star '+Math.round(star)+'" style="width:'+starsize+'px;height:'+height+'px;"></div></div></td>';
                            }
                            if(harfcount==2){
                                html += '</tr>';
                                harfcount = 0;
                            }
                        }else{
                            if(stylev=="text"){
                                html += '<td class="diver_review_table" colspan="3">'+text+'</td></tr>';
                            }else{
                                html += '<td class="diver_review_table" colspan="3"><div class="review_star" style="height:'+height+'px;width:'+width+'px"><div class="star '+Math.round(star)+'" style="width:'+starsize+'px;height:'+height+'px;"></div></div></td></tr>';
                            }
                        }

                    }

                    html += '</table>';
                    top.send_to_editor(html);
                    top.tb_remove();
        /************************
            modal popup
        ************************/
                <?php elseif( $tab == "modalpopup" ): ?>

                    var link = $('#editer_diver_sc_popup_link').val();
                    var contents = $('#editer_diver_sc_popup_contents').val().replace(/\r?\n/g, '<br>');


                    var c = "abcdefghijklmnopqrstuvwxyz";

                    var cl = c.length;
                    var id = "sc_popup_id-";
                    for(var i=0; i<5; i++){
                      id += c[Math.floor(Math.random()*cl)];
                    }



                    var html = '<a href="#'+id+'" data-lity="data-lity">'+link+'</a><div id="'+id+'" class="sc_popup_content lity-hide">'+contents+'</div>';

                    top.send_to_editor(html);
                    top.tb_remove(); 

         /************************
            toggle
        ************************/
                <?php elseif( $tab == "toggle" ): ?>
                    if($('#editer_diver_sc_toggle_title').val()){

                        var title = $('#editer_diver_sc_toggle_title').val();
                        var contents = $('#editer_diver_sc_toggle_contents').val();

                        var html = '<div class="sc_toggle_box"><div class="sc_toggle_title">'+title+'</div><div class="sc_toggle_content">'+contents+'</div></div>';
                        top.send_to_editor(html);
                        top.tb_remove(); 
                    };
         /************************
            rank
        ************************/
                <?php elseif( $tab == "rank" ): ?>
                    if($('#editer_diver_rank_title').val()){
                        var ranknum = $('#editer_diver_rank_num').val();
                        var title = $('#editer_diver_rank_title').val();
                        var star = $('#editer_diver_rank_star').val();
                        var minih = $('#editer_diver_rank_head').val();
                        var desc = $('#editer_diver_rank_desc').val().replace(/\r?\n/g, '<br>');
                        var img = $('#editer_diver_rank_img').val();
                        var rem = $('#editer_diver_rank_rem').val().replace(/\r?\n/g, '<br>');

                        var buylinktype = $('#editer_diver_rank_link_buy_type:checked').val();
                        var buylink = $('#editer_diver_rank_link_buy').val();
                        var buylinktxt = $('#editer_diver_rank_link_buy_text').val();
                        var buylinkbg = $('#editer_diver_rank_link_buy_bg').val();
                        var buylinkcolor = $('#editer_diver_rank_link_buy_color').val();

                        if(buylinktype=="ad"){

                            var aftag = $('#editer_diver_rank_link_buy_textarea').val();
                            var adsrc = aftag.match(/<a.*?href=("|')(.*?)("|').*?>(.*)<\/a>/i)
                            var afimg = aftag.match(/<img[^>]+>/gi);

                            buylink = adsrc[2];
                            buylinktxt = adsrc[4];

                        }

                        var morelinktype = $('#editer_diver_rank_link_more_type:checked').val();
                        var morelink = $('#editer_diver_rank_link_more').val();
                        var morelinktxt = $('#editer_diver_rank_link_more_text').val();
                        var morelinkbg = $('#editer_diver_rank_link_more_bg').val();
                        var morelinkcolor = $('#editer_diver_rank_link_more_color').val();

                        console.log(morelinktype);

                        if(morelinktype=="ad"){

                            var aftag = $('#editer_diver_rank_link_more_textarea').val();
                            var adsrc = aftag.match(/<a.*?href=("|')(.*?)("|').*?>(.*)<\/a>/i)
                            var afimg = aftag.match(/<img[^>]+>/gi);

                            morelink = adsrc[2];
                            morelinktxt = adsrc[4];

                        }

                        var bordercolor = $('#editer_diver_rank_border_color').val();
                        var borderwidth = $('#editer_diver_rank_border_width').val();

                        var style= document.getElementsByName('editer_diver_rank_style');
                        for (i = 0; i < style.length; i++) {
                          if (style[i].checked) {
                            styleval = style[i].value;
                          }
                        }

                        var type = $('#editer_diver_rank_title_type option:selected').val();


                        var html = '<div class="diver_af_ranking_wrap clearfix '+styleval+'" style="border:'+borderwidth+'px solid '+bordercolor+'"><div class="diver_af_ranking">';

                        html += '<div class="rank_h '+ranknum+'">';

                        html += '<div class="rank_title_wrap">';
                        html += '<'+type+' class="rank_title">'+title+'</'+type+'>';

                        if(star!=0){
                            var starheight = '14';
                            var starwidth = '80';
                            var scorewidth = '16';
                            var score = 5;
                            if(star <=5 && star>=0){
                                score = star * scorewidth;
                            }
                            html += '<div class="review_star" style="height:'+starheight+'px;width:'+starwidth+'px"><div class="star '+score+'" style="width:'+score+'px;height:'+starheight+'px;"></div></div>';
                        }

                        html += '</div></div><div class="rank_desc_wrap clearfix">';

                        if(img){
                            html += '<div class="rank_img"><img src="'+img+'"></div>';
                            html += '<div class="rank_desc">';
                        }else{
                            html += '<div class="rank_desc" style="margin:0;padding:0">';
                        }


                        if(minih){
                            html += '<div class="rank_minih">'+minih+'</div>';
                        }
                        if(desc){
                            html += '<div class="desc">'+desc+'</div>';
                        }
                        html += '</div></div></div>';

                        if(rem){
                            html += '<div class="rank_rem">'+rem+'</div>';
                        }

                        html += '<div class="rank_btn_wrap row">';
                        if(buylink){
                            if(morelink){
                                html += '<div class="rank_buy_link"><a href="'+buylink+'" target="_blank" style="background:'+buylinkbg+';color:'+buylinkcolor+'">'+buylinktxt+'</a></div>';
                            }else{
                                html += '<div class="rank_buy_link" style="width:100%"><a href="'+buylink+'" target="_blank">'+buylinktxt+'</a></div>';
                            }
                        }
                        if(morelink){
                            if(buylink){
                                html += '<div class="rank_more_link"><a href="'+morelink+'" target="_blank" style="background:'+morelinkbg+';color:'+morelinkcolor+'">'+morelinktxt+'</a></div>';
                            }else{
                                html += '<div class="rank_more_link" style="width:100%"><a href="'+morelink+'" target="_blank">'+morelinktxt+'</a></div>';
                            }
                        }
                        html += '</div></div>';

                        top.send_to_editor(html);
                        top.tb_remove(); 
                    };
         /************************
            kutikomi
        ************************/
                <?php elseif( $tab == "kutikomi" ): ?>
                    if($('#editer_diver_kutikomi_txt').val()){
                        var title = $('#editer_diver_kutikomi_title').val();
                        var text = $('#editer_diver_kutikomi_txt').val().replace(/\r?\n/g, '<br>');
                        var name = $('#editer_diver_kutikomi_name').val();
                        var star = $('#editer_diver_kutikomi_star').val();
                        var img = $('#editer_diver_kutikomi_img').val();


                        var html = '<div class="diver_voice_wrap clearfix">';

                        if(img){
                            html += '<figure><img src="'+img+'" class="diver_voice_icon"></figure>';
                            html += '<div class="diver_voice">';
                        }else{
                            html += '<div class="diver_voice" style="width:100%">';
                        }


                        html += '<div class="diver_voice_title"><span class="diver_voice_title_p">'+title+'</span>';

                        if(star!=0){
                            var starheight = '14';
                            var starwidth = '80';
                            var scorewidth = '16';
                            var score = 5;
                            if(star <=5 && star>=0){
                                score = star * scorewidth;
                            }
                            html += '<div class="review_star" style="background-size:'+starwidth+'px;height:'+starheight+'px;width:'+starwidth+'px"><div class="star '+score+'" style="width:'+score+'px;background-size:'+starwidth+'px;height:'+starheight+'px;"></div></div>';
                        }

                        html += '</div>';

                        if(text){
                            html += '<div class="diver_voice_content">'+text+'</div>';
                        }

                        if(name){
                            html += '<div class="diver_voice_name">'+name+'</div>';
                        }

                        html += '</div></div>';

                        top.send_to_editor(html);
                        top.tb_remove(); 
                    };
         /************************
            voice
        ************************/
                <?php elseif( $tab == "voice" ): ?>
                    if($('#editer_voice_content').val()){
                        // var icon = $('#editer_diver_voice_img').val();
                        var name = $('#editer_diver_voice_name').val();
                        var text = $('#editer_voice_content').val().replace(/\r?\n/g, '<br>');
                        var icon = $('#editer_diver_voice_img').val();
                        var customcolor = $('#editer_diver_voice_color_custom').val();
                        var customcolortxt = $('#editer_diver_voice_color_custom_text').val();

                        var img = document.getElementsByName('editer_diver_voice_default_img');
                        for (i = 0; i < img.length; i++) {
                          if (img[i].checked) {
                            imgsrc = img[i].value;
                          }
                        }

                        if(imgsrc != 'orig'){
                            icon = imgsrc;
                        }


                        var type = document.getElementsByName('editer_diver_voice_type');
                        for (i = 0; i < type.length; i++) {
                          if (type[i].checked) {
                            typeval = type[i].value;
                          }
                        }


                        var style = document.getElementsByName('editer_diver_voice_style');
                        for (i = 0; i < style.length; i++) {
                          if (style[i].checked) {
                            styleval = style[i].value;
                          }
                        }

                       var namepos = document.getElementsByName('editer_diver_voice_name_position');
                        for (i = 0; i < namepos.length; i++) {
                          if (namepos[i].checked) {
                            nameposval = namepos[i].value;
                          }
                        }

                        var color = document.getElementsByName('editer_diver_voice_color');
                        for (i = 0; i < color.length; i++) {
                            if (color[i].checked) {
                                colorval = color[i].value;
                            }
                        }

                        style = (styleval=='think')?'think_balloon':'sc_balloon';
                        
                        var custom = "";
                        if(colorval=='custom'){
                            if(styleval=="normal"){
                                if(typeval=='left'){
                                    custom = '<span class="custom_voice '+typeval+' '+styleval+'" style="border-color: transparent '+customcolor+' transparent transparent;"></span>';
                                }else{
                                    custom = '<span class="custom_voice '+typeval+' '+styleval+'" style="border-color: transparent transparent transparent '+customcolor+';"></span>';
                                }
                            }else if(styleval=="think"){
                                custom = '<div class="custom_voice '+typeval+' '+styleval+'" style="background:'+customcolor+';"></div><div class="custom_voice2 '+typeval+' '+styleval+'" style="background:'+customcolor+';"></div>';
                            }
                            customcolor = 'style="background:'+customcolor+';color:'+customcolortxt+';"';
                        }else{
                            customcolor = "";
                        }


                        top.send_to_editor('<div class="voice clearfix '+typeval+' '+nameposval+'"><div class="icon"><img src="'+icon+'"><div class="name">'+name+'</div></div><div class="text '+style+' '+typeval+' '+colorval+'" '+customcolor+'>'+custom+text+'</div></div>');
                        top.tb_remove(); 
                    };
         /************************
            qa
        ************************/
                <?php elseif( $tab == "qa" ): ?>
                    if($('#editer_diver_qa_a').val()){
                        var question = $('#editer_diver_qa_q').val().replace(/\r?\n/g, '<br>');
                        var answer = $('#editer_diver_qa_a').val().replace(/\r?\n/g, '<br>');
                        
                        top.send_to_editor('<div class="diver_qa"><div class="diver_question"><div>'+question+'</div></div><div class="diver_answer"><div>'+answer+'</div></div></div>');
                        top.tb_remove(); 
                    };
         /************************
            qr
        ************************/
                <?php elseif( $tab == "qr" ): ?>
                    if($('#editer_diver_qr_url').val()){
                        var url = $('#editer_diver_qr_url').val();
                        var size = $('#editer_diver_qr_size').val();
                        
                        top.send_to_editor('<div class="sc_qrcode"><img src="https://chart.googleapis.com/chart?chs='+size+'x'+size+'&cht=qr&chl='+url+'&choe=UTF-8 " alt="QR Code"/></div>');
                        top.tb_remove(); 
                    };
        /************************
            postlist
        ************************/
                <?php elseif( $tab == "postlist" ): ?>
                    if($('#editer_diver_postlist_cat-name').val()){
                        var category = $('[name=editer_diver_postlist_cat-name]').val();
                        var num = $('#editer_diver_postlist_num').val();
                        var date = $('#editer_diver_postlist_date:checked').val();
                        var cat_name = $('#editer_diver_postlist_cat:checked').val();

                        var gettype = document.getElementsByName('editer_diver_postlist_gettype');
                        for (i = 0; i < gettype.length; i++) {
                          if (gettype[i].checked) {
                            gettypeval = gettype[i].value;
                          }
                        }

                        var type = document.getElementsByName('editer_diver_postlist_type');
                        for (i = 0; i < type.length; i++) {
                          if (type[i].checked) {
                            typeval = type[i].value;
                          }
                        }

                        var sort = document.getElementsByName('editer_diver_postlist_sort');
                        for (i = 0; i < sort.length; i++) {
                          if (sort[i].checked) {
                            sortval = sort[i].value;
                          }
                        }


                        var ranktype = document.getElementsByName('editer_diver_postlist_rank_type');
                        for (i = 0; i < ranktype.length; i++) {
                          if (ranktype[i].checked) {
                            ranktypeval = ranktype[i].value;
                          }
                        }

                        var style = document.getElementsByName('editer_diver_postlist_style');
                        for (i = 0; i < style.length; i++) {
                          if (style[i].checked) {
                            styleval = style[i].value;
                          }
                        }

                        $code = '[article num="'+num+'" layout="'+styleval+'"';

                        if(gettypeval == 'cat'){
                             $code += ' order="'+sortval+'" orderby="'+typeval+'"';
                        }else{
                            $code += ' rank="'+ranktypeval+'"';
                        }

                        if(category!='none'){
                            $code += ' category="'+category+'"';
                        }

                        if(date){
                            $code += ' date="'+date+'"';
                        }

                        if(cat_name){
                            $code += ' cat_name="'+cat_name+'"';
                        }


                        $code += ']';


                        
                        top.send_to_editor($code);
                        top.tb_remove(); 
                    };
        /************************
            play
        ************************/
                <?php elseif( $tab == "play" ): ?>
        
                        top.send_to_editor('<iframe src="http://www.youtube.com/embed/a4Wm84SNamg?rel=0" width="640" height="400" frameborder="0" allowfullscreen="allowfullscreen"></iframe>');
                        top.tb_remove(); 
         /************************
            section
        ************************/
                <?php elseif( $tab == "section" ): ?>
                    
                        var type = $('#editer_diver_sc_section_type:checked').val();
                        var color = $('#editer_diver_section_bgColor').val();

                        var style = $('#editer_diver_sc_section_style:checked').val();
                        var position = $('#editer_diver_sc_section_position:checked').val();
                        var repeat = $('#editer_diver_sc_section_repeat:checked').val();

                        var imgsrc = $('#editer_diver_sc_section_bgimage').val();

                        var sizeheight = $('#editer_diver_sc_section_bgsize_height:checked').val();
                        var sizeheight_custom_size = $('#editer_diver_sc_section_bgsize_height_custom').val();
                        var sizeheight_custom_unit = $('#editer_diver_sc_section_bgsize_height_custom_unit option:selected').val();

                        var sizewidth = $('#editer_diver_sc_section_bgsize_width:checked').val();
                        var sizewidth_custom_size = $('#editer_diver_sc_section_bgsize_width_custom').val();
                        var sizewidth_custom_unit = $('#editer_diver_sc_section_bgsize_width_custom_unit option:selected').val();

                        var size_width_css = 'auto';
                        var size_height_css = 'auto';

                        if(sizewidth != 'auto'){
                            size_width_css = sizewidth_custom_size+sizewidth_custom_unit;
                        }
                        if(sizeheight != 'auto'){
                            size_height_css = sizeheight_custom_size+sizeheight_custom_unit;
                        }

                        var section_css = "background-color:"+color+";";
                        if(type == "bgimage"){
                            section_css = "background-color:"+color+";background-image:url("+imgsrc+");background-size:"+size_width_css+" "+size_height_css+";background-repeat:"+repeat+";background-position:"+position+" center;";
                        }
                        
                        top.send_to_editor('<div class="dvaux_section dvaux_section_environ '+style+'"><div class="dvaux_section_inner" style="'+section_css+'"></div></div>');
                        top.tb_remove(); 
                <?php endif; ?>
            });
     /************************************************************************
        ALL
    ************************************************************************/
            $('#diver_ei_btn_no').on('click', function() {
                    top.tb_remove(); 
            });
                
            $('.media-upload').each(function(){
                var rel = jQuery(this).attr("rel");
                $(this).click(function(){
                    window.send_to_editor = function(html) {
                        html = '<div>' + html + '</div>';
                        imgurl = jQuery('img', html).attr("src");
                        jQuery('#'+rel).val(imgurl);
                        $("#image-box").children("img").attr('src',imgurl);
                        tb_remove();
                    }   
                    formfield = jQuery('#'+rel).attr('name');
                    tb_show(null, 'media-upload.php?post_id=0&type=image&TB_iframe=true');
                    return false;
                }); 
            });
        });
    });
    </script>
<?php
    }
    add_action( "admin_head-media-upload-popup", "auxiliary_call" );
?>