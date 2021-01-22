<?php
//カスタムロゴ
function icon_settings($wp_customize) {
    // Logo upload
    $wp_customize->add_section( 'diver_logo_section' , array(
	    'title'       => __( 'サイトロゴ・アイコン'),
	    'priority'    => 60,
	) );

	$wp_customize->add_setting( 'diver_logo');
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diver_logo', array(
		'label'        => __( 'ロゴ画像をアップロード 推奨：250×60px', 'diver_logo' ),
		'section'    => 'diver_logo_section',
		'settings'   => 'diver_logo',
	) ) );

//icon
	$wp_customize->add_setting( 'diver_favicon');
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diver_favicon', array(
		'label'        => __( 'ファビコン（.png）をアップロード 推奨：32×32px', 'diver_favicon' ),
		'section'    => 'diver_logo_section',
		'settings'   => 'diver_favicon',
	) ) );
	$wp_customize->add_setting( 'diver_favicon_ie');
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diver_favicon_ie', array(
		'label'        => __( 'IE用ファビコン（.ico）をアップロード 推奨：16×16px', 'diver_favicon_ie' ),
		'section'    => 'diver_logo_section',
		'settings'   => 'diver_favicon_ie',
	) ) );
	$wp_customize->add_setting( 'diver_appleicon');
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diver_appleicon', array(
		'label'        => __( 'アップルタッチアイコンをアップロード 推奨：144 x 144px', 'diver_appleicon' ),
		'section'    => 'diver_logo_section',
		'settings'   => 'diver_appleicon',
	) ) );
}
add_action('customize_register', 'icon_settings');
?>