<?php
function cat_settings($wp_customize) {

	 require_once( get_template_directory().'/lib/assets/colorPicker/alpha-color-picker.php' );
 
	$wp_customize->add_section( 'cat-settings', array(
    'title'          => 'カテゴリー設定',
    'priority'       => 26,
	) );

	 /****** header **********/
    $wp_customize->add_setting('set_catpage_title', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'set_catpage_title', array(
        'settings' => 'set_catpage_title',
        'label'   => 'カテゴリーページタイトルを表示する',
        'section' => 'cat-settings',
        'type'     => 'checkbox'
        ));

    $wp_customize->add_setting('set_catpage_title_tag', array(
        'default'        => true,
    ));
    $wp_customize->add_control( 'set_catpage_title_tag', array(
        'settings' => 'set_catpage_title_tag',
        'label'   => 'カテゴリーページに関連タグを表示する',
        'section' => 'cat-settings',
        'type'     => 'checkbox'
    ));

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

	if ( !isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] )
		$r['pad_counts'] = true;

	if ( true == $r['hierarchical'] ) {
		$exclude_tree = array();

		if ( $r['exclude_tree'] ) {
			$exclude_tree = array_merge( $exclude_tree, wp_parse_id_list( $r['exclude_tree'] ) );
		}

		if ( $r['exclude'] ) {
			$exclude_tree = array_merge( $exclude_tree, wp_parse_id_list( $r['exclude'] ) );
		}

		$r['exclude_tree'] = $exclude_tree;
		$r['exclude'] = '';
	}

	if ( ! isset( $r['class'] ) )
		$r['class'] = ( 'category' == $r['taxonomy'] ) ? 'categories' : $r['taxonomy'];

	if ( ! taxonomy_exists( $r['taxonomy'] ) ) {
		return false;
	}

	$show_option_all = $r['show_option_all'];
	$show_option_none = $r['show_option_none'];

		$cat_all = get_categories( $r );
		foreach($cat_all as $value):
			$wp_customize->add_setting($value->slug, array(
		        'default'        => '#ccc'));
		    $wp_customize->add_control( new Customize_Alpha_Color_Control($wp_customize, $value->slug,array(
		        'settings' => $value->slug,
		        'label'   => $value->name,
		        'section' => 'cat-settings',
		        'show_opacity' => true, 
		        'palette' => array( 
		          'rgba(255,255,255,0.9)',
		        ),
			    )));
		endforeach;
}
add_action('customize_register', 'cat_settings');

function diver_customize_cat_css(){
	if(!get_theme_mod('set_catpage_title_tag',true)): ?>
        <style>
	        .catpage_content_wrap .catpage_inner_content{
	        	width: 100%;
	        	float: none;
	        }
        </style>
    <?php endif;

}
add_action( 'wp_head', 'diver_customize_cat_css');
?>