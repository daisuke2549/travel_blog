<?php
// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'diver_flush_rewrite_rules' );

// Flush your rewrite rules
function diver_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// CTA
add_action( 'init', 'cta_settings' );
if (!function_exists('cta_settings')){
	function cta_settings() {
		register_post_type( 'cta', // 投稿タイプ名の定義
			array(
			'labels' => array(
				'name' => __( 'CTA','divercta' ), // 表示する投稿タイプ名
				'singular_name' => __( 'CTA','divercta' ),
				'all_items' => __( 'すべてのCTA', 'divercta' ), 
				'add_new' => __('新規追加', 'divercta'),
			    'add_new_item' => __('新規CTAを作成', 'divercta'), 
			    'edit_item' => __('CTAを編集する', 'divercta'),
			    'new_item' => __('新規CTA', 'divercta'),
			    'view_item' => __('CTAを表示する', 'divercta'),
			    'search_items' => __('CTAを検索', 'divercta'),
			    'not_found' =>  __('CTAはありません', 'divercta'),
			    'not_found_in_trash' => __('ゴミ箱にCTAはありません', 'divercta'), 
			),
			'public' => true,
			'show_in_rest' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => 'cta',
			'menu_position' =>20,
			'menu_icon' => 'dashicons-analytics',
			'supports'=>array(
				'title',
				'editor',
				'thumbnail',
				),
			)
		);
	}
}



// LP
add_action( 'init', 'lp_settings' );
if (!function_exists('lp_settings')){
	function lp_settings() {
		register_post_type( 'lp', // 投稿タイプ名の定義
			array(
			'labels' => array(
			'name' => __( 'LP' ), // 表示する投稿タイプ名
			'singular_name' => __( 'LP' ),
			'add_new' => __('新規追加', 'lp'),
		    'add_new_item' => __('新規LPを作成'), 
		    'edit_item' => __('LPを編集する'),
		    'new_item' => __('新規LP'),
		    'view_item' => __('LPを表示する'),
		    'search_items' => __('LPを検索'),
		    'not_found' =>  __('LPはありません'),
		    'not_found_in_trash' => __('ゴミ箱にLPはありません'), 

			),
			'public' => true,
			'show_in_rest' => true,
			'menu_position' =>20,
			'show_in_rest' => true,
			'menu_icon' =>'dashicons-welcome-write-blog',
			'supports'=>array(
				'title',  // 記事タイトル
			    'editor',  // 記事本文
				),
			)
		);
		flush_rewrite_rules( false );
	}
}

// 共通コンテンツ
add_action( 'init', 'common_settings' );
if (!function_exists('common_settings')){
	function common_settings() {
		register_post_type( 'common', // 投稿タイプ名の定義
			array(
			'labels' => array(
			'name' => __( '共通コンテンツ' ), // 表示する投稿タイプ名
			'singular_name' => __( '共通コンテンツ' ),
			'add_new' => __('新規追加', 'common'),
		    'add_new_item' => __('新規共通コンテンツを作成'), 
		    'edit_item' => __('共通コンテンツを編集する'),
		    'new_item' => __('新規共通コンテンツ'),
		    'view_item' => __('共通コンテンツを表示する'),
		    'search_items' => __('共通コンテンツを検索'),
		    'not_found' =>  __('共通コンテンツはありません'),
		    'not_found_in_trash' => __('ゴミ箱に共通コンテンツはありません'), 
			),
			'public' => true,
			'show_in_rest' => true,
			'menu_position' =>20,
			'menu_icon' =>'dashicons-portfolio',
			'supports'=>array(
				'title',  // 記事タイトル
			    'editor',  // 記事本文
				),
			)
		);
	}
}

// cat-page
add_action( 'init', 'category_settings' );
function category_settings() {
	register_post_type( 'cat-page', // 投稿タイプ名の定義
		array(
		'labels' => array(
		'name' => __( 'カテゴリーページ' ), // 表示する投稿タイプ名
		'singular_name' => __( 'cat-page' ),
		'add_new' => __('新規追加', 'cat-page'),
	    'add_new_item' => __('新規カテゴリーページを作成'), 
	    'edit_item' => __('カテゴリーページを編集する'),
	    'new_item' => __('新規カテゴリーページ'),
	    'view_item' => __('カテゴリーページを表示する'),
	    'search_items' => __('カテゴリーページを検索'),
	    'not_found' =>  __('カテゴリーページはありません'),
	    'not_found_in_trash' => __('ゴミ箱にカテゴリーページはありません'), 
		),
		'public' => true,
		'show_in_rest' => true,
		'menu_position' =>20,
		'capability_type' => 'page',
		'menu_icon' => 'dashicons-welcome-widgets-menus',
		'rewrite' => array('slug' => 'cat-page', 'with_front' => true ),
        'has_archive' => true,
		'supports'=>array(
			'title',  // 記事タイトル
		    'editor',  // 記事本文
			),
		)
	);
}

function add_custom_columns_name($columns) {
	$columns['category'] = 'カテゴリー';
    return $columns;
}
function add_custom_column($column, $post_id) {
	    if($column == 'category') {
        echo get_post_meta($post_id, 'catpage_post_slug', true);
    }
}
add_filter('manage_edit-cat-page_columns', 'add_custom_columns_name');
add_action('manage_posts_custom_column', 'add_custom_column', 10, 2);

function sort_column($columns){
	$columns = array(
		'title' => 'タイトル',
		'category' => 'カテゴリー',
		'date' => '日時'
	);
	return $columns;
}
add_filter( 'manage_cat-page_posts_columns', 'sort_column');


function add_common_posts_columns($columns) {

	$columns = array(
		'title' => 'タイトル',
		'postid' => 'ショートコード',
		'date' => '日時'
	);
	return $columns;
}
function add_common_posts_columns_list($column_name, $post_id) {
	if ( 'postid' == $column_name ) {
		echo '[common_content id="'.$post_id.'"]';
	}
}
add_filter( 'manage_edit-common_columns', 'add_common_posts_columns' );
add_action( 'manage_common_posts_custom_column', 'add_common_posts_columns_list', 10, 2 );
?>