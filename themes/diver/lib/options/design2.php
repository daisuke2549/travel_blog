<?php
function design2_settings($wp_customize) {
 
    $wp_customize->add_section( 'design2_settings', array(
    'title'          => 'デザイン設定②',
    'priority'       => 25,
    ) );

    $headstyle = array(
        'box' => 'ボックス',
        'boxw' => 'ボックス(幅いっぱい)',
        'dash' => 'ステッチ',
        'voice' => '吹き出し',
        'stripe' => 'ストライプ',
        'tag' => 'タグ',
        'double' => '上下ライン',
        'border' => '下ライン',
        'ribon1' => 'リボン1',
        'ribon2' => 'リボン2',
        'mark1' => 'マーク1',
        'mark2' => 'マーク2',
        'postit' => '付箋',
        'custom' => 'カスタム'
    );
    // 見出しカラーh2
    $wp_customize->add_setting('diver_single_h2', array('default' => '#607d8b'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_single_h2',array(
        'settings' => 'diver_single_h2',
        'label'   => 'h2（見出し２）設定',
        'description'   => '基本色',
        'section' => 'design2_settings',
        )));

    $wp_customize->add_setting('diver_single_h2_text', array('default' => '#fff'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_single_h2_text',array(
        'settings' => 'diver_single_h2_text',
        'description'   => '文字色',
        'section' => 'design2_settings',
        )));


/****** 見出し **********/
    $wp_customize->add_setting('diver_h2_style', array('default'=> 'box'));
    $wp_customize->add_control( 'diver_h2_style', array(
        'settings' => 'diver_h2_style',
        'description' => 'スタイル',
        'section' => 'design2_settings',
        'type'    => 'select',
        'choices'    => $headstyle
        ));

    // 見出しカラーh3
    $wp_customize->add_setting('diver_single_h3', array('default' => '#333'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_single_h3',array(
        'settings' => 'diver_single_h3',
        'label'   => 'h3（見出し３）設定',
        'description'   => '基本色',
        'section' => 'design2_settings',
        )));

    $wp_customize->add_setting('diver_single_h3_text', array('default' => '#333'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_single_h3_text',array(
        'settings' => 'diver_single_h3_text',
        'description'   => '文字色',
        'section' => 'design2_settings',
        )));


    /****** 見出し **********/
    $wp_customize->add_setting('diver_h3_style', array('default'=> 'border'));
    $wp_customize->add_control( 'diver_h3_style', array(
        'settings' => 'diver_h3_style',
        'description' => 'スタイル',
        'section' => 'design2_settings',
        'type'    => 'select',
        'choices'    => $headstyle
        ));

    // 見出しカラーh4
    $wp_customize->add_setting('diver_single_h4', array('default' => '#666'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_single_h4',array(
        'settings' => 'diver_single_h4',
        'label'   => 'h4（見出し４）設定',
        'description'   => '基本色',
        'section' => 'design2_settings',
        )));

    $wp_customize->add_setting('diver_single_h4_text', array('default' => '#666'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_single_h4_text',array(
        'settings' => 'diver_single_h4_text',
        'description'   => '文字色',
        'section' => 'design2_settings',
        )));


    /****** 見出し **********/
    $wp_customize->add_setting('diver_h4_style', array('default'=> 'mark1'));
    $wp_customize->add_control( 'diver_h4_style', array(
        'settings' => 'diver_h4_style',
        'description' => 'スタイル',
        'section' => 'design2_settings',
        'type'    => 'select',
        'choices'    => $headstyle
        ));

    // 見出しカラーh5
    $wp_customize->add_setting('diver_single_h5_text', array('default' => '#666'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_single_h5_text',array(
        'settings' => 'diver_single_h5_text',
        'label'   => 'h5（見出し５）設定',
        'description'   => '文字色',
        'section' => 'design2_settings',
        )));

/****** タイトルスタイル **********/
    $wp_customize->add_setting('main_inner_title_color', array('default' => '#eee'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'main_inner_title_color',array(
        'settings' => 'main_inner_title_color',
        'label'   => 'メインタイトルのスタイル',
        'description'   => '基本色<br>スタイルによって使用しない場合もあります。',
        'section' => 'design2_settings',
        )));

    $wp_customize->add_setting('main_inner_title_text', array('default' => '#333'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'main_inner_title_text',array(
        'settings' => 'main_inner_title_text',
        'description'   => '文字色',
        'section' => 'design2_settings',
        )));

    $wp_customize->add_setting('main_inner_title_bg', array('default' => '#fff'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'main_inner_title_bg',array(
        'settings' => 'main_inner_title_bg',
        'description'   => '背景色',
        'section' => 'design2_settings',
        )));

    $wp_customize->add_setting('main_inner_title', array('default'=> 'box'));
    $wp_customize->add_control( 'main_inner_title', array(
        'settings' => 'main_inner_title',
        'description' => 'スタイル',
        'section' => 'design2_settings',
        'type'    => 'select',
        'choices'    => array(
            'box' => 'ボックス',
            'balloon' => '吹き出し',
            'rich' => 'リッチ',
            'postit' => '付箋',
            'tag' => 'タグ',
            'inline' => 'インライン',
            'dash' => 'ステッチ',
            'borders' => '小さいライン',
    ),        ));

/****** ウィジェットタイトルスタイル **********/

    $widgettitlebackground = get_theme_mod( 'background-widgettitle', '#004363');
    $widgettitletext = get_theme_mod('text-widgettitle','#fff');

    $wp_customize->add_setting('diver_widget_title_color', array('default' => '#eee'));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_widget_title_color',array(
        'settings' => 'diver_widget_title_color',
        'label'   => 'ウィジェットタイトルのスタイル',
        'description'   => '基本色<br>スタイルによって使用しない場合もあります。',
        'section' => 'design2_settings',
        )));

    $wp_customize->add_setting('diver_widget_title_text', array('default' => $widgettitletext));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_widget_title_text',array(
        'settings' => 'diver_widget_title_text',
        'description'   => '文字色',
        'section' => 'design2_settings',
        )));

    $wp_customize->add_setting('diver_widget_title_bg', array('default' => $widgettitlebackground));
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'diver_widget_title_bg',array(
        'settings' => 'diver_widget_title_bg',
        'description'   => '背景色',
        'section' => 'design2_settings',
        )));

    $wp_customize->add_setting('diver_widget_title_style', array('default'=> 'box'));
    $wp_customize->add_control( 'diver_widget_title_style', array(
        'settings' => 'diver_widget_title_style',
        'description' => 'スタイル',
        'section' => 'design2_settings',
        'type'    => 'select',
        'choices'    => array(
            'box' => 'ボックス',
            'border' => '下線',
            'rich' => 'リッチ',
            'tag' => 'タグ',
            'dash' => 'ステッチ',
            'ribon' => 'リボン1',
            'ribon2' => 'リボン2',
            'postit' => '付箋',
            'stripe' => 'ストライプ'
    ),        ));
}

add_action('customize_register', 'design2_settings');

/*****************************************************

            css

*****************************************************/
function diver_design_option2_css(){
    ob_start();

    $head2color = get_theme_mod('diver_single_h2','#607d8b');
    $head2colortxt = get_theme_mod('diver_single_h2_text','#fff');
    $head3color = get_theme_mod('diver_single_h3','#333');
    $head3colortxt = get_theme_mod('diver_single_h3_text','#333');
    $head4color = get_theme_mod('diver_single_h4','#666');
    $head4colortxt = get_theme_mod('diver_single_h4_text','#666');
    $head5colortxt = get_theme_mod('diver_single_h5_text','#666');


    $diverh2style = get_theme_mod('diver_h2_style','box');
    $diverh3style = get_theme_mod('diver_h3_style','border');
    $diverh4style = get_theme_mod('diver_h4_style','mark1'); ?>

    <style>
        h2{color: <?php echo $head2colortxt; ?>;}
        h3{color:  <?php echo $head3colortxt; ?>;border:0;}
        h4{color:  <?php echo $head4colortxt; ?>}
        h5{color: <?php echo $head5colortxt; ?>}
    </style>

    <?php 

/*****************************************************

            h2

*****************************************************/

    switch ($diverh2style) { 
        case 'box': ?>
        <style>
        .content h2{background: <?php echo $head2color ?>;border-radius: 3px;}
        </style>
    <?php break;
    case 'boxw': ?>
        <style>
        .content h2{background: <?php echo $head2color ?>;margin-right: -40px;margin-left: -40px;padding: 10px 30px;}
        @media screen and (max-width: 1200px){
            .content h2{margin-left: -10px;margin-right: -10px;}
        }
        </style>
    <?php break;
        case 'voice': ?>
        <style>
    .content h2 {position: relative;background: <?php echo $head2color ?>;margin-bottom: 20px;border-radius: 5px;}
    .content h2:after {content: "";position: absolute;top: 100%;left: 30px;height: 0;width: 0;border: 15px solid transparent;border-top: 15px solid <?php echo $head2color ?>;}

    </style>
    <?php break;
    case 'double': ?>
        <style>
            .content h2{border-top:2px solid <?php echo $head2color ?>;border-bottom:2px solid <?php echo $head2color ?>;background: #fff;border-radius: 0}
        </style>    
    <?php break;
    case 'border': ?>
        <style>
            .content h2{border-bottom:2px solid <?php echo $head2color ?>;background: transparent;border-radius: 0}
        </style>    
    <?php break;
    case 'dash': ?>
        <style>
            .content h2{background:<?php echo $head2color ?>;box-shadow: 0px 0px 0px 5px <?php echo $head2color ?>;border: dashed 2px #fff;border-radius: 1px;margin: 30px 5px 15px;}
        </style>
    <?php break;
    case 'ribon1': ?>
        <style>
        .content h2{padding: 10px 40px;background: <?php echo $head2color ?>;margin-right: -50px;margin-left: -50px;box-shadow: 0 1px 3px #777;border-radius: 0}
        .content h2:after,.content h2:before {content: "";position: absolute;top: 100%;height: 0;width: 0;border: 5px solid transparent;border-top: 5px solid #666;}
        .content h2:after {left: 0;border-right: 5px solid #666;}
        .content h2:before {right: 0;border-left: 5px solid #666;}
        @media screen and (max-width: 1200px){
            .content h2{margin-left: -25px;margin-right: -25px;}
        }
        </style>
    <?php break;
    case 'ribon2': ?>
        <style>
            .content h2{padding: 10px 40px;margin-left: -50px;margin-right: 50px;background: <?php echo $head2color ?>;border-radius: 0}
            .content h2:before {content: "";position: absolute;top: 100%;height: 0;width: 0;border: 5px solid transparent;border-top: 5px solid #666;left: 0;border-right: 5px solid #666;}
            .content h2:after {content: "";position: absolute;top: 0;bottom:0;right: -45px;width: 0;border: 29px solid <?php echo $head2color ?>;border-right-color: transparent;}
            @media screen and (max-width: 1200px){
                .content h2{margin-left: -25px;}
            }
            @media screen and (max-width: 768px){
                .content h2:after{border: 25px solid <?php echo $head2color ?>;border-right-color: transparent;}
            }
        </style>
    <?php break;
     case 'mark1': ?>
        <style>
        .content h2 {padding-left:35px;border-bottom: 2px solid <?php echo $head2color ?>;border-radius: 0;background: transparent;}
        .content h2::after {position: absolute;bottom: 1em;left: 5px;z-index: 2;content: '';width: 15px;height: 15px;background-color: <?php echo $head2color ?>;-webkit-transform: rotate(45deg);transform: rotate(45deg);}       
        </style>
    <?php break;
     case 'mark2': ?>
        <style>
        .content h2 {padding-left:40px;border-bottom: 2px solid <?php echo $head2color ?>;border-radius: 0;background: transparent;}
        .content h2::before,.content h2::after {position: absolute;content: '';border-radius: 100%}
        .content h2::before {top: .7em;left: .2em;z-index: 2;width: 25px;height: 25px;background: <?php echo $head2color ?>;opacity: .5;}
        .content h2::after {top: 1.2em;left: .7em;width: 15px;height: 15px;background: <?php echo $head2color ?>;opacity: .5;}
        </style>
    <?php break;
    case 'postit': ?>
        <style>
        .content h2 {-webkit-background: linear-gradient(-155deg, rgba(0, 0, 0, 0) 1.5em, <?php echo $head2color ?> 0%);background: linear-gradient(-155deg, rgba(0, 0, 0, 0) 1.5em, <?php echo $head2color ?> 0%);}
        .content h2:after {position: absolute;top: 0;right: 0;content: '';width: 1.65507em;height: 3.5493em;background: -webkit-linear-gradient(to left bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, .2));background: linear-gradient(to left bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, .2) 0%, rgba(0, 0, 0, .3));border-bottom-left-radius: 6px;box-shadow: -.2em .2em .3em -.1em rgba(0, 0, 0, .15);-webkit-transform: translateY(-1.89424em) rotate(-40deg);transform: translateY(-1.89424em) rotate(-40deg);-webkit-transform-origin: bottom right;transform-origin: bottom right;}
        </style>
    <?php break;
    case 'tag': ?>
        <style>
        .content h2 {background:<?php echo $head2color ?>;line-height: 1.3;vertical-align: middle;border-radius: 25px 0px 0px 25px;margin-left: -10px;}
        .content h2:before {content: '●';color: <?php echo $head2colortxt; ?>;margin-right: 8px;}
        </style>
    <?php break;
    case 'stripe': ?>
    <style>
            .content h2 {background: repeating-linear-gradient(30deg, #fff, #fff 5px, <?php echo $head2color ?> 0px, <?php echo $head2color ?> 10px);}

    </style>
    <?php break;
    }

/*****************************************************

            h3
            
*****************************************************/
    switch ($diverh3style) { 
        case 'box': ?>
        <style>
            .content h3{background: <?php echo $head3color ?>;border-radius: 5px;}
        </style>
    <?php break;
    case 'boxw': ?>
        <style>
            .content h3{padding: 10px 25px;background: <?php echo $head3color ?>;margin-right: -40px;margin-left: -40px;}
            @media screen and (max-width: 1200px){
                .content h3{margin-left: -10px;margin-right: -10px;}
            }
        </style>
    <?php break;
        case 'voice': ?>
        <style>
    .content h3 {position: relative;background: <?php echo $head3color ?>;margin-bottom: 20px;border-radius: 5px;}
    .content h3:after {content: "";position: absolute;top: 100%;left: 30px;height: 0;width: 0;border: 15px solid transparent;border-top: 15px solid <?php echo $head3color ?>;}

    </style>
    <?php break;
    case 'double': ?>
        <style>
            .content h3{border-top:2px solid <?php echo $head3color ?>;border-bottom:2px solid <?php echo $head3color ?>;background: #fff;border-radius: 0}
        </style>    
    <?php break;
    case 'dash': ?>
        <style>
            .content h3{background:<?php echo $head3color ?>;box-shadow: 0px 0px 0px 5px <?php echo $head3color ?>;border: dashed 2px #fff;border-radius: 1px;margin: 20px 5px;}
        </style>
    <?php break;
    case 'border': ?>
        <style>
            .content h3{border-bottom:2px solid <?php echo $head3color ?>;background: #fff;border-radius: 0}
        </style>    
    <?php break;
    case 'ribon1': ?>
        <style>
        .content h3{padding: 10px 35px;background: <?php echo $head3color ?>;margin-right: -50px;margin-left: -50px;box-shadow: 0 1px 3px #777;border-radius: 0}
        .content h3:after,h3:before {content: "";position: absolute;top: 100%;height: 0;width: 0;border: 5px solid transparent;border-top: 5px solid #666;}
        .content h3:after {left: 0;border-right: 5px solid #666;}
        .content h3:before {right: 0;border-left: 5px solid #666;}
        @media screen and (max-width: 1200px){
                .content h3{margin-left: -25px;margin-right: -25px;}
        }
        </style>
    <?php break;
    case 'ribon2': ?>
        <style>
            .content h3{padding: 10px 35px;margin-left: -50px;margin-right: 50px;background: <?php echo $head3color ?>;border-radius: 0}
            .content h3:before {content: "";position: absolute;top: 100%;height: 0;width: 0;border: 5px solid transparent;border-top: 5px solid #666;left: 0;border-right: 5px solid #666;}
            .content h3:after {content: "";position: absolute;top: 0;bottom:0;right: -45px;width: 0;border: 28px solid <?php echo $head3color ?>;border-right-color: transparent;}
            @media screen and (max-width: 1200px){
                .content h3{margin-left: -25px;}
            }
            @media screen and (max-width: 768px){
                .content h3:after{border: 26px solid <?php echo $head3color ?>;border-right-color: transparent;}
            }
        </style>
    <?php break;
     case 'mark1': ?>
        <style>
        .content h3 {padding-left:30px;border-bottom: 2px solid <?php echo $head3color ?>;border-radius: 0;}
        .content h3::after {position: absolute;bottom: .8em;left: 5px;z-index: 2;content: '';width: 13px;height: 13px;background-color: <?php echo $head3color ?>;-webkit-transform: rotate(45deg);transform: rotate(45deg);}       
        </style>
    <?php break;
     case 'mark2': ?>
        <style>
        .content h3 {padding-left:40px;border-bottom: 2px solid <?php echo $head3color ?>;}
        .content h3:before,.content h3:after {position: absolute;content: '';border-radius: 100%}
        .content h3:before {top: .6em;left: .2em;z-index: 2;width: 21px;height: 21px;background: <?php echo $head3color ?>;opacity: .5;}
        .content h3:after {top: 1.1em;left: .7em;width: 13px;height: 13px;background: <?php echo $head3color ?>;opacity: .5;}
        </style>
    <?php break;
    case 'postit': ?>
        <style>
        .content h3 {-webkit-background: linear-gradient(-155deg, rgba(0, 0, 0, 0) 1.5em, <?php echo $head3color ?> 0%);background: linear-gradient(-155deg, rgba(0, 0, 0, 0) 1.5em, <?php echo $head3color ?> 0%);}
        .content h3:after {position: absolute;top: 0;right: 0;content: '';width: 1.65507em;height: 3.5493em;background: -webkit-linear-gradient(to left bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, .2));background: linear-gradient(to left bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, .2) 0%, rgba(0, 0, 0, .3));border-bottom-left-radius: 6px;box-shadow: -.2em .2em .3em -.1em rgba(0, 0, 0, .15);-webkit-transform: translateY(-1.89424em) rotate(-40deg);transform: translateY(-1.89424em) rotate(-40deg);-webkit-transform-origin: bottom right;transform-origin: bottom right;}
        </style>
    <?php break;
    case 'tag': ?>
        <style>
        .content h3 {background:<?php echo $head3color; ?>;line-height: 1.3;vertical-align: middle;border-radius: 25px 0px 0px 25px;}
        .content h3:before {content: '●';color: <?php echo $head3colortxt; ?>;margin-right: 8px;}
        </style>
    <?php break;
        case 'stripe': ?>
    <style>
            .content h3 {background: repeating-linear-gradient(30deg, #fff, #fff 5px, <?php echo $head3color ?> 5px, <?php echo $head3color ?> 9px);}
    </style>
    <?php break;
    }

/*****************************************************

            h4
            
*****************************************************/
    switch ($diverh4style) { 
        case 'box': ?>   
        <style> 
            .content h4 {background: <?php echo $head4color ?>;}
        </style>
    <?php break;
    case 'boxw': ?>   
        <style> 
            .content h4 {padding: 10px 30px;background: <?php echo $head4color ?>;margin-right: -40px;margin-left: -40px;}
             @media screen and (max-width: 1200px){
                .content h4{margin-left: -15px;margin-right: -15px;}
            }
        </style>
    <?php break;
        case 'voice': ?>
        <style>
    .content h4 {position: relative;background: <?php echo $head4color ?>;margin-bottom: 20px;border-radius: 3px;}
    .content h4:after {content: "";position: absolute;top: 100%;left: 30px;height: 0;width: 0;border: 10px solid transparent;border-top: 10px solid <?php echo $head4color ?>;}
    </style>
    <?php break;
    case 'double': ?>
        <style>
            .content h4{border-top:2px solid <?php echo $head4color ?>;border-bottom:2px solid <?php echo $head4color ?>;background: #fff;border-radius: 0}
        </style>    
    <?php break;
    case 'dash': ?>
        <style>
            .content h4{background:<?php echo $head4color ?>;box-shadow: 0px 0px 0px 5px <?php echo $head4color ?>;border: dashed 2px #fff;border-radius: 1px;margin: 20px 5px;}
        </style>
    <?php break;
    case 'border': ?>
        <style>
            .content h4{border-bottom:2px solid <?php echo $head4color ?>;background: #fff;border-radius: 0}
        </style>    
    <?php break;
    case 'ribon1': ?>
        <style>
        .content h4{padding: 10px 40px;background: <?php echo $head4color ?>;margin-right: -50px;margin-left: -50px;box-shadow: 0 1px 3px #777;border-radius: 0}
        .content h4:after,h4:before {content: "";position: absolute;top: 100%;height: 0;width: 0;border: 5px solid transparent;border-top: 5px solid #666;}
        .content h4:after {left: 0;border-right: 5px solid #666;}
        .content h4:before {right: 0;border-left: 5px solid #666;}
        @media screen and (max-width: 1200px){
            .content h4{margin-left: -25px;margin-right: -25px;}
        }
        </style>
    <?php break;
    case 'ribon2': ?>
        <style>
            .content h4{padding: 10px 40px;margin-left: -50px;margin-right: 50px;background: <?php echo $head4color ?>;border-radius: 0}
            .content h4:before {content: "";position: absolute;top: 100%;height: 0;width: 0;border: 5px solid transparent;border-top: 5px solid #666;left: 0;border-right: 5px solid #666;}
            .content h4:after {content: "";position: absolute;top: 0;bottom:0;right: -45px;width: 0;border: 27px solid <?php echo $head4color ?>;border-right-color: transparent;}
            @media screen and (max-width: 1200px){
                .content h4{margin-left: -25px;}
            }
            @media screen and (max-width: 768px){
                .content h4:after{border: 27px solid <?php echo $head4color ?>;border-right-color: transparent;}
            }
        </style>
    <?php break;
     case 'mark1': ?>
        <style>
        .content h4 {padding-left:30px;border-bottom: 2px solid <?php echo $head4color ?>;border-radius: 0;}
        .content h4::after {position: absolute;top:.8em;left: .4em;z-index: 2;content: '';width: 10px;height: 10px;background-color: <?php echo $head4color ?>;-webkit-transform: rotate(45deg);transform: rotate(45deg);}
        </style>
    <?php break;
     case 'mark2': ?>
        <style>
        .content h4 {padding-left:40px;border-bottom: 2px solid <?php echo $head4color ?>;}
        .content h4:before,h4:after {position: absolute;content: '';border-radius: 100%}
        .content h4:before {top: .4em;left: .2em;z-index: 2;width: 21px;height: 21px;background: <?php echo $head4color ?>;opacity: .5;}
        .content h4:after {top: 1em;left: .7em;width: 13px;height: 13px;background: <?php echo $head4color ?>;}
        </style>
    <?php break;
    case 'postit': ?>
        <style>
        .content h4 {-webkit-background: linear-gradient(-155deg, rgba(0, 0, 0, 0) 1.5em, <?php echo $head4color ?> 0%);background: linear-gradient(-155deg, rgba(0, 0, 0, 0) 1.5em, <?php echo $head4color ?> 0%);}
        .content h4:after {position: absolute;top: 0;right: 0;content: '';width: 1.65507em;height: 3.5493em;background: -webkit-linear-gradient(to left bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, .2));background: linear-gradient(to left bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, .2) 0%, rgba(0, 0, 0, .3));border-bottom-left-radius: 6px;box-shadow: -.2em .2em .3em -.1em rgba(0, 0, 0, .15);-webkit-transform: translateY(-1.89424em) rotate(-40deg);transform: translateY(-1.89424em) rotate(-40deg);-webkit-transform-origin: bottom right;transform-origin: bottom right;}
        </style>
    <?php break;
    case 'tag': ?>
        <style>
        .content h4 {background:<?php echo $head4color; ?>;line-height: 1.3;vertical-align: middle;border-radius: 25px 0px 0px 25px;}
        .content h4:before {content: '●';color: <?php echo $head4colortxt; ?>;margin-right: 8px;}
        </style>
    <?php break;
    case 'stripe': ?>
    <style>
            .content h4 {background: repeating-linear-gradient(30deg, #fff, #fff 4px, <?php echo $head4color ?> 3px, <?php echo $head4color ?> 7px);}
    </style>
    <?php break;
    }

/*****************************************************

            main title
            
*****************************************************/

    $main_inner_title = get_theme_mod('main_inner_title','box');
    $main_inner_title_color = get_theme_mod('main_inner_title_color','#eee');
    $main_inner_title_text = get_theme_mod('main_inner_title_text','#333');
    $main_inner_title_bg = get_theme_mod('main_inner_title_bg','#fff');
    ?>
    <style>
        .wrap-post-title,.wrap-post-title a{color: <?php echo $main_inner_title_text; ?>;}
    </style>

    <?php
    switch ($main_inner_title) {
        case 'box': ?>   
            <style>
            .wrap-post-title,.widget .wrap-post-title{background:<?php echo $main_inner_title_bg; ?>;}
            </style>
        <?php break;
        case 'postit': ?>   
            <style>
            .wrap-post-title{background:<?php echo $main_inner_title_bg; ?>;border-left: solid 7px <?php echo $main_inner_title_color; ?>;border-bottom: solid 3px #d7d7d7;}
            </style>
        <?php break;
        case 'tag': ?>   
            <style>
            .wrap-post-title{background:<?php echo $main_inner_title_bg; ?>;line-height: 1.3;vertical-align: middle;border-radius: 25px 0px 0px 25px;margin-left: -10px;}
            .wrap-post-title:before {content: '●';color: <?php echo $main_inner_title_color; ?>;margin-right: 8px;}
            @media screen and (max-width:768px){
                .wrap-post-title{margin-left: 0px;}
            }
            </style>
        <?php break;
        case 'inline': ?>   
            <style>
            .wrap-post-title{padding: 25px 160px;background: none;box-shadow: none;width: 95%;text-align: center;margin:0 auto;}
            .wrap-post-title:before, .wrap-post-title:after{content: '';position: absolute;top: 48%;display: inline-block;width: 150px;height: 4px;border-top: solid 2px <?php echo $main_inner_title_color; ?>;border-bottom: solid 2px <?php echo $main_inner_title_color; ?>;}
            .wrap-post-title:before {left:0;}
            .wrap-post-title:after {right: 0;}
            .wrap-post-title-inner{display: none;}
            @media screen and (max-width:599px){
                .wrap-post-title{padding:25px 60px;}
                .wrap-post-title:before, .wrap-post-title:after{width: 55px;}
            }
            </style>
        <?php break;
        case 'dash': ?>   
            <style>
            .wrap-post-title{background: <?php echo $main_inner_title_bg; ?>;box-shadow: 0px 0px 0px 5px <?php echo $main_inner_title_bg; ?>;border: dashed 2px <?php echo $main_inner_title_color; ?>;margin: 10px 5px;}
            </style>
        <?php break;
        case 'borders': ?>
            <style>
            .wrap-post-title{text-align: center;background: none;box-shadow: none;border:none;padding-top: 10px;padding-bottom:15px; margin:20px 0;}
            .wrap-post-title:before {content: '';position: absolute;bottom: 3px;display: inline-block;width: 60px;height: 5px;left: 50%;-moz-transform: translateX(-50%);-webkit-transform: translateX(-50%);-ms-transform: translateX(-50%);transform: translateX(-50%);background-color: <?php echo $main_inner_title_color; ?>;border-radius: 2px;}
            </style>
        <?php break;
        case 'balloon': ?>
            <style>
                .wrap-post-title{background:<?php echo $main_inner_title_bg; ?>;margin-top: 15px;margin-bottom: 15px;}
                .wrap-post-title:before {position: absolute;content: '';top: 100%;left: 30px;border: 10px solid transparent;border-top: 10px solid <?php echo $main_inner_title_bg; ?>;width: 0;height: 0;}
            </style>
        <?php break;
        case 'rich': ?>
            <style>
                .wrap-post-title{border-top: 3px solid <?php echo $main_inner_title_color; ?>;background: -webkit-linear-gradient(top, #fff 0%, <?php echo $main_inner_title_bg; ?> 100%); background: linear-gradient(to bottom, #fff 0%, <?php echo $main_inner_title_bg; ?> 100%);}
            </style>
        <?php break;
    }

/*****************************************************

            widget title
            
*****************************************************/
    $widgettitlebackground = get_theme_mod( 'background-widgettitle', '#004363');
    $widgettitletext = get_theme_mod('text-widgettitle','#fff');

    $widget_title_style = get_theme_mod('diver_widget_title_style','box');
    $widget_title_color = get_theme_mod('diver_widget_title_color','#eee');
    $widget_title_text = get_theme_mod('diver_widget_title_text',$widgettitletext);
    $widget_title_bg = get_theme_mod('diver_widget_title_bg',$widgettitlebackground); ?>

    <style>
        .widgettitle{color: <?php echo $widget_title_text; ?>;}
    </style>

<?php
    switch ($widget_title_style) {
        case 'box': ?>   
            <style>
            .widgettitle{background:<?php echo $widget_title_bg; ?>;}
            </style>
        <?php break;
        case 'border': ?>   
            <style>
            .widgettitle{background:<?php echo $widget_title_bg; ?>;border-bottom:2px solid <?php echo $widget_title_color; ?>;}
            </style>
        <?php break;
        case 'tag': ?>   
            <style>
            .widgettitle{background:<?php echo $widget_title_bg; ?>;vertical-align: middle;border-radius: 18px 0px 0px 18px;margin-left: -25px;}
            .widgettitle:before {content: '●';color: <?php echo $widget_title_color; ?>;margin-right: 8px;}
            </style>
        <?php break;
        case 'dash': ?>   
            <style>
            .widgettitle{background: <?php echo $widget_title_bg; ?>;box-shadow: 0px 0px 0px 5px <?php echo $widget_title_bg; ?>;border: dashed 2px <?php echo $widget_title_color; ?>;margin: 15px -5px;margin-top: -10px;}
            </style>
        <?php break;
        case 'rich': ?>
            <style>
                .widgettitle{border-bottom: 3px solid <?php echo $widget_title_color; ?>;background: -webkit-linear-gradient(top, #fff 0%, <?php echo $widget_title_bg; ?> 100%); background: linear-gradient(to bottom, #fff 0%, <?php echo $widget_title_bg; ?> 100%);}
            </style>
        <?php break;
        case 'ribon': ?>
            <style>
                .widgettitle{padding:8px 25px;background: <?php echo $widget_title_bg ?>;margin-right: -20px;margin-left: -20px;box-shadow: 0 1px 3px #777;border-radius: 0}
                .widgettitle:after,.widgettitle:before {content: "";position: absolute;top: 100%;height: 0;width: 0;border: 5px solid transparent;border-top: 5px solid #666;}
                .widgettitle:after {left: 0;border-right: 5px solid #666;}
                .widgettitle:before {right: 0;border-left: 5px solid #666;}
            </style>
        <?php break;
        case 'ribon2': ?>
        <style>
            .widgettitle{margin-left: -20px;background: <?php echo $widget_title_bg ?>;border-radius: 0;box-shadow: 0 1px 3px #777}
            .widgettitle:before {content: "";position: absolute;top: 100%;height: 0;width: 0;border: 5px solid transparent;border-top: 5px solid #666;left: 0;border-right: 5px solid #666;}
            .widgettitle:after {content: "";position: absolute;top: 0;bottom:0;right: -15px;width: 0;border: 18px solid <?php echo $widget_title_bg ?>;border-right-color: transparent;border-width: 20px 15px 20px 0;}
            @media screen and (max-width: 768px){
                .widgettitle{
                    margin-right: 0;
                }
                .widgettitle:after{
                    right: -15px;
                }
            }
        </style>
    <?php break;
    case 'postit': ?>
        <style>
            .widgettitle{border-left: 10px solid <?php echo $widget_title_color ?>;background: <?php echo $widget_title_bg ?>;border-bottom: 2px solid #ccc;}
        </style>
    <?php break;
    case 'stripe': ?>
    <style>
            .widgettitle {background: repeating-linear-gradient(45deg, <?php echo $widget_title_color ?>, <?php echo $widget_title_color ?> 3px, <?php echo $widget_title_bg ?> 3px, <?php echo $widget_title_bg ?> 6px);}
    </style>
    <?php break;
    }

    $design_css = ob_get_contents();
    ob_end_clean();

    echo minify_css($design_css);
}
add_action( 'wp_footer', 'diver_design_option2_css');
?>