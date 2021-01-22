<?php
function main_settings($wp_customize) {
 
    $wp_customize->add_section( 'main_settings', array(
    'title'          => 'メイン設定',
    'priority'       => 20,
    ) );

    /****** header nav style **********/
    $wp_customize->add_setting('nav_style', array(
        'default'        => 'in',
    ));
    $wp_customize->add_control( 'nav_style', array(
        'settings' => 'nav_style',
        'label'   => 'ナビゲーション設定',
        'description' => 'ナビゲーションメニューの位置を設定します。',
        'section' => 'main_settings',
        'type'    => 'radio',
        'choices'    => array(
            'in' => 'ロゴと並列',
            'only' => 'メニュー独立',
        ),        ));

    /******  manu style **********/
    $wp_customize->add_setting('nav_hover_style', array(
        'default'        => 'slide',
    ));
    $wp_customize->add_control( 'nav_hover_style', array(
        'settings' => 'nav_hover_style',
        'description' => 'ナビゲーションドロップダウンエフェクト',
        'section' => 'main_settings',
        'type'    => 'select',
        'choices'    => array(
            'none' => 'エフェクトなし',
            'fade' => 'フェード',
            'toptobottom' => '上から',
            'slide' => 'スライド',
            'open' => '展開',
    ),        ));


 /****** header **********/
    $wp_customize->add_setting('fix_header_menu', array(
        'default'        => 'main',
    ));
    $wp_customize->add_control( 'fix_header_menu', array(
        'settings' => 'fix_header_menu',
        'label'   => '固定ヘッダー設定',
        'description' => '固定ヘッダーで表示するメニュー',
        'section' => 'main_settings',
        'type'    => 'radio',
        'choices'    => array(
            'main' => 'メインメニュー',
            'widget' => 'ウィジェット',
        ),        ));

    $wp_customize->add_setting('fix_header', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'fix_header', array(
        'settings' => 'fix_header',
        'label'   => '固定ヘッダーを表示する',
        'section' => 'main_settings',
        'type'     => 'checkbox'
        ));

    $wp_customize->add_setting('mini_header', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'mini_header', array(
        'settings' => 'mini_header',
        'label'   => 'ミニヘッダーを表示する',
        'section' => 'main_settings',
        'type'     => 'checkbox'
    ));

    /****** article title **********/
    $wp_customize->add_setting('article_title', array(
        'default'        => '新着記事',
    ));
    $wp_customize->add_control( 'article_title', array(
        'settings' => 'article_title',
        'label'   => '記事一覧設定',
        'description'   => '記事一覧のタイトルを設定します。未入力だと非表示になります。',
        'section' => 'main_settings',
    ));

    /******  sort **********/
    $wp_customize->add_setting('post_sort', array(
        'default'        => 'published',
    ));
    $wp_customize->add_control( 'post_sort', array(
        'settings' => 'post_sort',
        'description' => '記事一覧の並び替えを行います。',
        'section' => 'main_settings',
        'type'    => 'radio',
        'choices'    => array(
            'published' => '公開日順',
            'modified' => '更新日順',
        ),        ));

    /******  category **********/
    $wp_customize->add_setting('post_category', array(
        'default'        => '1',
    ));
    $wp_customize->add_control( 'post_category', array(
        'settings' => 'post_category',
        'description' => '記事一覧で優先表示するカテゴリーを選びます。',
        'section' => 'main_settings',
        'type'    => 'radio',
        'choices'    => array(
            '0' => '親カテゴリー',
            '1' => '子カテゴリー',
        ),        ));

    /****** date **********/
    $wp_customize->add_setting('post_date', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'post_date', array(
        'settings' => 'post_date',
        'label'   => '日付を表示する',
        'section' => 'main_settings',
        'type'     => 'checkbox'
        ));

    /****** author **********/
    $wp_customize->add_setting('post_author', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'post_author', array(
        'settings' => 'post_author',
        'label'   => '作成者(author)を表示する',
        'section' => 'main_settings',
        'type'     => 'checkbox'
        ));

    /****** tag **********/
    $wp_customize->add_setting('post_tag', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'post_tag', array(
        'settings' => 'post_tag',
        'label'   => 'タグを表示する',
        'section' => 'main_settings',
        'type'     => 'checkbox'
        ));

    /****** excerpt **********/
    $wp_customize->add_setting('post_excerpt_count', array(
        'default'        => 160,
    ));
    $wp_customize->add_control( 'post_excerpt_count', array(
        'settings' => 'post_excerpt_count',
        'label'   => '抜粋文字数',
        'section' => 'main_settings',
        'type'     => 'number'
        ));


    /****** sticky title **********/
    $wp_customize->add_setting('sticky_title', array(
        'default'        => '固定記事',
    ));
    $wp_customize->add_control( 'sticky_title', array(
        'settings' => 'sticky_title',
        'label'   => '固定記事',
        'description'   => '固定記事一覧のタイトルを設定します。未入力だと非表示になります。',
        'section' => 'main_settings',
    ));

    /****** pickup post **********/
    $wp_customize->add_setting('pickup_slider_title', array(
        'default'        => '',
    ));
    $wp_customize->add_control( 'pickup_slider_title', array(
        'settings' => 'pickup_slider_title',
        'label'   => 'スライダー記事',
        'description'   => 'スライダータイトルを設定します。未入力だと非表示になります。',
        'section' => 'main_settings',
    ));

    $wp_customize->add_setting('pickup_tag', array(
        'default'        => 'pickup',
    ));
    $wp_customize->add_control( 'pickup_tag', array(
        'settings' => 'pickup_tag',
        'description' => 'ここで設定したタグが含まれている記事が、トップページのスライダーで表示されます。(デフォルト:pickup)',
        'section' => 'main_settings',
        ));

    $wp_customize->add_setting('pickup_img', array(
        'default'        => false,
    ));
    $wp_customize->add_control( 'pickup_img', array(
        'settings' => 'pickup_img',
        'label'   => 'スライダーをアイキャッチ画像のみの表示にする',
        'section' => 'main_settings',
        'type'     => 'checkbox'
    ));

    $wp_customize->add_setting('pickup_top_hidden', array(
        'default'        => false,
    ));
    $wp_customize->add_control( 'pickup_top_hidden', array(
        'settings' => 'pickup_top_hidden',
        'label'   => 'トップページで非表示にする',
        'section' => 'main_settings',
        'type'     => 'checkbox'
    ));


    /****** pickup category **********/
    $args = array(
                'orderby' => 'order',
                'order' => 'ASC',
                'hide_empty' => false
        );
    $cat_all = get_categories($args);
    $cat_array = array();
    $cat_array['none'] = '---';
    foreach($cat_all as $value):
        $cat_array[$value->slug] = $value->name;
    endforeach;
    $wp_customize->add_setting('pickup_cat',array('default'=>'none'));
    $wp_customize->add_control( 'pickup_cat', array(
        'settings' => 'pickup_cat',
        'label'   => 'ピックアップカテゴリー',
        'description' => 'ここで設定したカテゴリー記事が、トップページ上部に表示されます。(投稿が0件のカテゴリーは表示されません。)',
        'section' => 'main_settings',
        'type'    => 'select',
        'choices'    => $cat_array,
        ));

    $wp_customize->add_setting('pickup_cat_sort', array(
        'default'        => 'date',
    ));
    $wp_customize->add_control( 'pickup_cat_sort', array(
        'settings' => 'pickup_cat_sort',
        'description' => 'ピックアップカテゴリーの並び替えを行います。',
        'section' => 'main_settings',
        'type'    => 'radio',
        'choices'    => array(
            'date' => '公開日順',
            'modified' => '更新日順',
        ),
    ));

    /****** pickup category num **********/
    $wp_customize->add_setting('pickup_cat_num', array(
        'default'        => 5,
    ));
    $wp_customize->add_control( 'pickup_cat_num', array(
        'settings' => 'pickup_cat_num',
        'description'   => 'ピックアップカテゴリー表示数',
        'section' => 'main_settings',
        'type'     => 'number'
        ));


    /****** new label **********/
    $wp_customize->add_setting('newlabeltitle', array(
        'default'        => 'NEW!',
    ));
    $wp_customize->add_control( 'newlabeltitle', array(
        'settings' => 'newlabeltitle',
        'label'   => 'newラベル設定',
        'description' => 'newラベルタイトル(長すぎるとスタイル崩れの原因になります。)',
        'section' => 'main_settings',
        ));
    
    $wp_customize->add_setting('newlabel', array(
        'default'        => '24',
    ));
    $wp_customize->add_control( 'newlabel', array(
        'settings' => 'newlabel',
        'description' => '表示期間設定。投稿してからNewラベルを表示させる時間を入力してください。(表示させない場合:0 ,１日の場合:24)',
        'section' => 'main_settings',
        ));


    $wp_customize->add_setting('breadcrumb_set_post', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'breadcrumb_set_post', array(
        'settings' => 'breadcrumb_set_post',
        'label'   => '投稿ページにパンくず表示',
        'section' => 'main_settings',
        'type'     => 'checkbox'
        ));

    $wp_customize->add_setting('breadcrumb_set_page', array(
        'default'        => false,
    ));
    $wp_customize->add_control( 'breadcrumb_set_page', array(
        'settings' => 'breadcrumb_set_page',
        'label'   => '固定ページにパンくず表示',
        'section' => 'main_settings',
        'type'     => 'checkbox'
        ));

    /****** pagetopscroll **********/
    $wp_customize->add_setting('pagetopscroll', array(
        'default'        => false,
    ));
    $wp_customize->add_control( 'pagetopscroll', array(
        'settings' => 'pagetopscroll',
        'label'   => 'ページ上部にスクロールさせるボタン(右下の)を表示',
        'section' => 'main_settings',
        'type'     => 'checkbox'
    ));

    /****** 背景画像 **********/
    $wp_customize->add_setting( 'diver_background_image',array('default' => get_template_directory_uri().'/images/background.jpg'));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diver_background_image', array(
        'label'        => __( '背景画像を設定します。', 'diver_background_image' ),
        'section'    => 'main_settings',
        'settings'   => 'diver_background_image',
    ) ) );

}
add_action('customize_register', 'main_settings');

function diver_main_option_css(){
    ob_start();

    ?>
    <style>
        body{
            background-image:url('<?php echo get_theme_mod('diver_background_image'); ?>');
        }
    </style>
    <?php

    $navhover = get_theme_mod('nav_hover_style', 'slide');
        switch ($navhover) {
            case 'none': ?>
                <style>
                #onlynav ul ul,#nav_fixed #nav ul ul,.header-logo #nav ul ul {
                  display: none;
                }

                #onlynav ul li:hover > ul,#nav_fixed #nav ul li:hover > ul,.header-logo #nav ul li:hover > ul{
                    display: block;
                }
                </style>
            <?php break;
            case 'fade': ?>
                <style>
                #onlynav ul ul,#nav_fixed #nav ul ul,.header-logo #nav ul ul {
                  visibility: hidden;
                  opacity: 0;
                  transition: .4s ease-in-out;
                }
                #onlynav ul li:hover > ul,#nav_fixed #nav ul li:hover > ul,.header-logo #nav ul li:hover > ul{
                  visibility: visible;
                  opacity: 1;
                }
                </style>
            <?php break;
            case 'toptobottom': ?>
             <style>
             #onlynav ul ul,#nav_fixed #nav ul ul,.header-logo #nav ul ul {
                  visibility: hidden;
                  opacity: 0;
                  transition: .2s ease-in-out;
                  transform: translateY(-20px);
                }
                #onlynav ul li:hover > ul,#nav_fixed #nav ul li:hover > ul,.header-logo #nav ul li:hover > ul{
                  visibility: visible;
                  opacity: 1;
                  transform: translateY(0);
                }
            </style>
            <?php break;
             case 'slide': ?>
             <style>
             #onlynav ul ul,#nav_fixed #nav ul ul,.header-logo #nav ul ul {
              visibility: hidden;
              opacity: 0;
              transition: .2s ease-in-out;
              transform: translateY(10px);
            }
            #onlynav ul ul ul,#nav_fixed #nav ul ul ul,.header-logo #nav ul ul ul {
              transform: translateX(-20px) translateY(0);
            }
            #onlynav ul li:hover > ul,#nav_fixed #nav ul li:hover > ul,.header-logo #nav ul li:hover > ul{
              visibility: visible;
              opacity: 1;
              transform: translateY(0);
            }
            #onlynav ul ul li:hover > ul,#nav_fixed #nav ul ul li:hover > ul,.header-logo #nav ul ul li:hover > ul{
              transform: translateX(0) translateY(0);
            }
             
            </style>
            <?php break;
             case 'open': ?>
             <style>
             #onlynav ul li,#nav_fixed #nav ul li,.header-logo #nav ul ul {
              perspective: 300px;
            }
            #onlynav ul ul,#nav_fixed #nav ul ul,.header-logo #nav ul ul{
              visibility: hidden;
              opacity: 0;
              transition: .3s ease-in-out;
              transform: rotateX(-90deg) rotateY(0);
              transform-origin: 0 0;
            }
            #onlynav ul ul li,#nav_fixed #nav ul ul li,.header-logo #nav ul ul li {
              perspective: 1500px;
            }
            #onlynav ul ul ul,#nav_fixed #nav ul ul ul,.header-logo #nav ul ul ul{
              transform: rotateX(0) rotateY(-90deg);
            }
            #onlynav ul li:hover > ul,#nav_fixed #nav ul li:hover > ul,.header-logo #nav ul li:hover > ul{
              visibility: visible;
              opacity: 1;
              transform: rotateX(0) rotateY(0);
            }
            </style>
            <?php break;
        }

        $design_css = ob_get_contents();
        ob_end_clean();

        echo minify_css($design_css);

    }
    add_action( 'wp_head', 'diver_main_option_css');
?>