<?php
add_action( 'enqueue_block_editor_assets','custom_enqueue_block_editor_assets' );

function custom_enqueue_block_editor_assets() {
    wp_enqueue_script('block-button',get_template_directory_uri().'/lib/functions/editor/gutenberg/button/block.js',array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor','wp-rich-text','wp-format-library','wp-i18n','wp-compose'));
    wp_enqueue_script('block-frame',get_template_directory_uri().'/lib/functions/editor/gutenberg/frame/block.js',array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor','wp-rich-text','wp-format-library','wp-i18n','wp-compose'));
    wp_enqueue_script('block-headline',get_template_directory_uri().'/lib/functions/editor/gutenberg/headline/block.js',array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor','wp-rich-text','wp-format-library','wp-i18n','wp-compose'));
    wp_enqueue_script('block-voice',get_template_directory_uri().'/lib/functions/editor/gutenberg/voice/block.js',array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor','wp-rich-text','wp-format-library','wp-i18n','wp-compose'));
    // wp_enqueue_script('block-balloon',get_template_directory_uri().'/lib/functions/editor/gutenberg/balloon/block.js',array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor','wp-rich-text','wp-format-library','wp-i18n','wp-compose'));
    // wp_enqueue_script('block-designlist',get_template_directory_uri().'/lib/functions/editor/gutenberg/designlist/block.js',[ 'wp-blocks', 'wp-element' ]);
    wp_enqueue_script('block-icon',get_template_directory_uri().'/lib/functions/editor/gutenberg/icon/block.js',array( 'wp-blocks', 'wp-element' ));
    wp_enqueue_script('block-iconbox',get_template_directory_uri().'/lib/functions/editor/gutenberg/iconbox/block.js',array( 'wp-blocks', 'wp-element' ));
    wp_enqueue_script('block-section',get_template_directory_uri().'/lib/functions/editor/gutenberg/section/block.js',array( 'wp-blocks', 'wp-element' ));
    wp_enqueue_script('block-toggle',get_template_directory_uri().'/lib/functions/editor/gutenberg/toggle/block.js',array( 'wp-blocks', 'wp-element' ));
    wp_enqueue_script('block-toggle-item',get_template_directory_uri().'/lib/functions/editor/gutenberg/toggle/item/block.js',array( 'wp-blocks', 'wp-element' ));

    wp_enqueue_script('block-star',get_template_directory_uri().'/lib/functions/editor/gutenberg/star/block.js',array( 'wp-blocks', 'wp-element' ));
    wp_enqueue_script('block-article-posts',get_template_directory_uri().'/lib/functions/editor/gutenberg/article-post/block.js',array( 'wp-blocks', 'wp-element' ));
    wp_enqueue_script('block-qanda',get_template_directory_uri().'/lib/functions/editor/gutenberg/qanda/block.js',array( 'wp-blocks', 'wp-element' ));
    wp_enqueue_script('block-qanda-item',get_template_directory_uri().'/lib/functions/editor/gutenberg/qanda/item/block.js',array( 'wp-blocks', 'wp-element' ));

    wp_enqueue_style( 'my-editor-style', get_template_directory_uri().'/editor-style.css');

    // wp_enqueue_script('metabox-titlehid',get_template_directory_uri().'/lib/functions/editor/gutenberg/metabox/titlehid.js',array('wp-element','wp-edit-post','wp-components','wp-data','wp-plugins'));

    $voice_icon[] = '';
    $count = 0;
    while ($count < get_option('voice_icon_count')){
        $voice_icon[] =  get_option('icon'.$count.'-uploader_img');
        $count++;
    }
    wp_localize_script( 'block-voice', 'my_script_vars', array('icon'  => $voice_icon,));


    $args = array(
    'orderby' => 'order',
    'order' => 'ASC',
    'hide_empty' => false,
    'get' => 'all'
            );

    $defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 0,
        'echo'                => 1,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'name',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories' ),
        'style'               => 'list',
        'taxonomy'            => 'category',
        'title_li'            => __( 'Categories' ),
        'use_desc_for_title'  => 1,
    );

    $r = wp_parse_args( $args, $defaults );
    $cat_all = get_categories($r);
    wp_localize_script( 'block-article-posts', 'category_all', $cat_all);

};

add_filter( 'block_categories','_block_categories');
function _block_categories( $categories ) {
    $categories[] = array(
        'slug'  => 'auxiliary',
        'title' => '入力補助',
    );

    return $categories;
}

function mytheme_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => 'light blue',
            'slug' => 'light-blue',
            'color' => '#70b8f1',
        ),
        array(
            'name' => 'light red',
            'slug' => 'light-red',
            'color' => '#ff8178',
        ),   
        array(
            'name' => 'light green',
            'slug' => 'light-green',
            'color' => '#2ac113',
        ),
        array(
            'name' => 'light yellow',
            'slug' => 'light-yellow',
            'color' => '#ffe822',
        ),
        array(
            'name' => 'light orange',
            'slug' => 'light-orange',
            'color' => '#ffa30d',
        ),
        array(
            'name' => 'blue',
            'slug' => 'blue',
            'color' => '#00f',
        ),
        array(
            'name' => 'red',
            'slug' => 'red',
            'color' => '#f00',
        ),   
        array(
            'name' => 'purple',
            'slug' => 'purple',
            'color' => '#674970',
        ),
        array(
            'name' => 'gray',
            'slug' => 'gray',
            'color' => '#ccc',
        ),
        array(
            'name' => 'black',
            'slug' => 'black',
            'color' => '#000',
        ),
        array(
            'name' => 'white',
            'slug' => 'white',
            'color' => '#fff',
        ),
    ) );

}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );

add_theme_support( 'align-wide' );
add_theme_support( 'responsive-embeds' );


register_block_type( 'dvaux/article-posts', array(
  'attributes' => array(
    'number' => array (
      'type' => 'number',
      'default' => '9'
    ),
    'posttype' => array (
      'type' => 'string',
      'default' => 'category'
    ),      
    'category' => array (
      'type' => 'string',
      'default' => 'none'
    ),
    'rank_period' => array(
      'type' => 'string',
      'default' => 'none'    
    ), 
    'layout' => array (
      'type' => 'string',
      'default' => 'grid'
    ), 
    'orderby' => array (
      'type' => 'string',
      'default' => 'post_date'
    ), 
    'order' => array (
      'type' => 'string',
      'default' => 'DESC'
    ), 
    'date_on' => array (
      'type' => 'boolean',
      'default' => true
    ),
    'cat_on' => array (
      'type' => 'boolean',
      'default' => true
    )
  ),
  'render_callback' => 'render_dvaux_article_posts',
));

function render_dvaux_article_posts($attributes){
    if($attributes['posttype'] == 'rank'){

        $VIEW_ID = get_option( 'diver_analytics_api_viewID');
        $keyfile = get_option('diver_analytics_api_key_url');

        if($VIEW_ID && $keyfile){
            return do_shortcode('[article num="'.$attributes['number'].'" layout="'.$attributes['layout'].'" rank="'.$attributes['rank_period'].'" date="'.$attributes['date_on'].'" cat_name="'.$attributes['cat_on'].'"]');
        }else{
            return "<div style='color: #f00;font-size: 13px;text-align: center;background: #fff0f0;
 padding: 1em;'>Google Analytics API設定に問題あります。";
        }
    }

    return do_shortcode('[article num="'.$attributes['number'].'" category="'.$attributes['category'].'" layout="'.$attributes['layout'].'" order="'.$attributes['order'].'" orderby="'.$attributes['orderby'].'" date="'.$attributes['date_on'].'" cat_name="'.$attributes['cat_on'].'"]');
}