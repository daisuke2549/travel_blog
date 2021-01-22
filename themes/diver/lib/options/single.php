<?php
function single_settings($wp_customize) {
 
	$wp_customize->add_section( 'single-settings', array(
    'title'          => '投稿ページ',
    'priority'       => 24,
	) );

    /****** published **********/
    $wp_customize->add_setting('single_published_date', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'single_published_date', array(
        'settings' => 'single_published_date',
        'label'   => '公開日を表示する',
        'section' => 'single-settings',
        'type'     => 'checkbox'
        ));

    /****** modified **********/
    $wp_customize->add_setting('single_modified_date', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'single_modified_date', array(
        'settings' => 'single_modified_date',
        'label'   => '更新日を表示する',
        'section' => 'single-settings',
        'type'     => 'checkbox'
        ));

    /****** time **********/
    $wp_customize->add_setting('single_finish_time', array(
        'default'        => false,
    ));
    $wp_customize->add_control( 'single_finish_time', array(
        'settings' => 'single_finish_time',
        'label'   => '読了時間を表示する',
        'section' => 'single-settings',
        'type'     => 'checkbox'
        ));

    /****** view 
    
    // $wp_customize->add_setting('single_post_views', array(
    //     'default'        => false,
    // ));
    // $wp_customize->add_control( 'single_post_views', array(
    //     'settings' => 'single_post_views',
    //     'label'   => 'PV数を表示する',
    //     'section' => 'single-settings',
    //     'type'     => 'checkbox'
    //     ));

    **********/

     /****** author **********/
    $wp_customize->add_setting('single_title_author', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'single_title_author', array(
        'settings' => 'single_title_author',
        'label'   => '作成者(タイトル直下)を表示する',
        'section' => 'single-settings',
        'type'     => 'checkbox'
        ));

     $wp_customize->add_setting('single_bottom_author', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'single_bottom_author', array(
        'settings' => 'single_bottom_author',
        'label'   => '作成者(記事直下)を表示する',
        'section' => 'single-settings',
        'type'     => 'checkbox'
        ));

     $wp_customize->add_setting('single_bottom_author_article', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'single_bottom_author_article', array(
        'settings' => 'single_bottom_author_article',
        'label'   => '作成者の最新記事を表示する',
        'section' => 'single-settings',
        'type'     => 'checkbox'
        ));

     $wp_customize->add_setting('single_bottom_navigationpost', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'single_bottom_navigationpost', array(
        'settings' => 'single_bottom_navigationpost',
        'label'   => '投稿の前後の記事を表示する',
        'section' => 'single-settings',
        'type'     => 'checkbox'
        ));



         /****** カテゴリー最新記事 **********/
    $wp_customize->add_setting('catnewpost', array(
        'default'        => 'top',
    ));
    $wp_customize->add_control( 'catnewpost', array(
        'settings' => 'catnewpost',
        'label'   => 'pickup記事表示',
        'description' => 'pickup記事の表示位置、表示/非表示を変更できます。',
        'section' => 'single-settings',
        'type'    => 'radio',
        'choices'    => array(
            'top' => '記事上(top)',
            'bottom' => '記事下(bottom)',
            'none' => '非表示(hidden)',
        ),        
    ));

    $wp_customize->add_setting('single_related_keyword', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'single_related_keyword', array(
        'settings' => 'single_related_keyword',
        'label'   => '関連キーワードを表示する',
        'section' => 'single-settings',
        'type'     => 'checkbox'
        ));

    /******  NEW POST **********/
    $wp_customize->add_setting('catnewpost_num', array(
        'default'        => 6,
    ));
    $wp_customize->add_control( 'catnewpost_num', array(
        'settings' => 'catnewpost_num',
        'label'   => '関連記事',
        'description' => '記事下で表示するカテゴリー関連記事数(0にすると非表示になります。)',
        'section' => 'single-settings',
        ));

    $wp_customize->add_setting('recommend_order', array(
        'default'        => 'date',
    ));
    $wp_customize->add_control( 'recommend_order', array(
        'settings' => 'recommend_order',
        'description' => '関連記事の取得条件',
        'section' => 'single-settings',
        'type'    => 'radio',
        'choices'    => array(
            'date' => '公開日順',
            'modified' => '更新日順',
            'rand' => 'ランダム',
        ),     
    ));

    /******  RECOMMEND **********/
    $wp_customize->add_setting('recommend_num', array(
        'default'        => 8,
    ));
    $wp_customize->add_control( 'recommend_num', array(
        'settings' => 'recommend_num',
        'label'   => 'おすすめ記事',
        'description' => '記事下で表示するおすすめ記事数(0にすると非表示になります。取得記事は全投稿からランダムです。)',
        'section' => 'single-settings',
        ));

    $wp_customize->add_setting('recommend_title', array(
        'default'        => 'おすすめの記事',
    ));
    $wp_customize->add_control( 'recommend_title', array(
        'settings' => 'recommend_title',
        'description' => 'おすすめ記事タイトル',
        'section' => 'single-settings',
    ));

    $wp_customize->add_setting('recommend_type', array(
        'default'        => '2column',
    ));
    $wp_customize->add_control( 'recommend_type', array(
        'settings' => 'recommend_type',
        'description' => 'おすすめ記事の表示スタイルを設定します。',
        'section' => 'single-settings',
        'type'    => 'radio',
        'choices'    => array(
            '2column' => '2カラム',
            '1column' => '1カラム',
        ),
    ));

    /******  コメント **********/
    $wp_customize->add_setting('comment_form_style', array('default'=>'none'));
    $wp_customize->add_control( 'comment_form_style', array(
        'settings' => 'comment_form_style',
        'label'   => 'コメント',
        'description' => 'コメントの表示スタイルを設定します。（facebookコメント欄を表示するには、SNS設定にてAppIdを設定してください。）',
        'section' => 'single-settings',
        'type'    => 'radio',
        'choices'    => array(
            'none' => '非表示',
            'facebook' => 'facebookコメント',
            'normal' => '通常コメント'
        ),     
    ));

    $wp_customize->add_setting('comment_list_title', array(
        'default'        => 'コメント一覧',
    ));
    $wp_customize->add_control( 'comment_list_title', array(
        'settings' => 'comment_list_title',
        'description' => 'コメント一覧のタイトルを設定します。',
        'section' => 'single-settings',
    ));

/****** big share **********/
    $wp_customize->add_setting('bigshare', array(
        'default'        => 'この記事が気に入ったら</br>フォローしよう',
    ));
    $wp_customize->add_control( 'bigshare', array(
        'settings' => 'bigshare',
        'label'   => '記事下facebookいいねボックス',
        'description' => '空白で保存するといいねボックスが非表示になります。(デフォルト:この記事が気に入ったら</br>フォローしよう)',
        'section' => 'single-settings',
        ));

    $wp_customize->add_setting('bigshare_sub', array(
        'default'        => '最新情報をお届けします',
    ));
    $wp_customize->add_control( 'bigshare_sub', array(
        'settings' => 'bigshare_sub',
        'description' => 'サブテキストを設定します。(デフォルト:最新情報をお届けします。)',
        'section' => 'single-settings',
        ));


    $wp_customize->add_setting('bigshare_tw', array(
        'default'        => 'Twitterでフォローしよう',
    ));
    $wp_customize->add_control( 'bigshare_tw', array(
        'settings' => 'bigshare_tw',
        'label'   => '記事下twitterボックス',
        'description' => '空白で保存するとtwitterboxが非表示になります。(デフォルト:Twitterでフォローしよう)',
        'section' => 'single-settings',
        ));

}
add_action('customize_register', 'single_settings');