<?php
/**
 * Gutenberg Additions.
 */

if ( ! function_exists( 'jgtstork_gutenberg_setup' ) ) :
	// Add theme support for Gutenberg editor
	function jgtstork_gutenberg_setup() {
		// Wide alignment
		add_theme_support( 'align-wide' );

		// Block color palettes
		$primary_color = jgtstork_get_option( 'primary_color', '#3366c8' );
		$secondary_color = jgtstork_get_option( 'secondary_color', '#ff5148' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html_x( 'Primary', 'Name of the primary color in the Gutenberg palette', 'stork' ),
				'slug'  => 'primary',
				'color' => $primary_color,
			),
			array(
				'name'  => esc_html_x( 'Secondary', 'Name of the secondary color in the Gutenberg palette', 'stork' ),
				'slug'  => 'secondary',
				'color' => $secondary_color,
			),
			array(
				'name'  => esc_html_x( 'Black', 'Name of the black color in the Gutenberg palette', 'stork' ),
				'slug'  => 'black',
				'color' => '#1f1f1f',
			),
			array(
				'name'  => esc_html_x( 'Dark Gray', 'Name of the dark gray color in the Gutenberg palette', 'stork' ),
				'slug'  => 'dark-gray',
				'color' => '#333333',
			),
			array(
				'name'  => esc_html_x( 'Gray', 'Name of the gray color in the Gutenberg palette', 'stork' ),
				'slug'  => 'gray',
				'color' => '#6e6e6e',
			),
			array(
				'name'  => esc_html_x( 'Light Gray', 'Name of the light gray color in the Gutenberg palette', 'stork' ),
				'slug'  => 'light-gray',
				'color' => '#d9d9d9',
			),
			array(
				'name'  => esc_html_x( 'Light Gray', 'Name of the light gray color in the Gutenberg palette', 'stork' ),
				'slug'  => 'light-gray',
				'color' => '#d9d9d9',
			),
		) );

		// Block font sizes
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name'      => esc_html_x( 'Small', 'Name of the small font size in Gutenberg', 'stork' ),
				'shortName' => esc_html_x( 'S', 'Short name of the small font size in the Gutenberg editor', 'stork' ),
				'size'      => 16,
				'slug'      => 'small',
			),
			array(
				'name'      => esc_html_x( 'regular', 'Name of the regular font size in Gutenberg', 'stork' ),
				'shortName' => esc_html_x( 'M', 'Short name of the regular font size in the Gutenberg editor', 'stork' ),
				'size'      => 18,
				'slug'      => 'regular',
			),
			array(
				'name'      => esc_html_x( 'Large', 'Name of the large font size in Gutenberg', 'stork' ),
				'shortName' => esc_html_x( 'L', 'Short name of the large font size in the Gutenberg editor', 'stork' ),
				'size'      => 22,
				'slug'      => 'large',
			),
			array(
				'name'      => esc_html_x( 'Larger', 'Name of the larger font size in Gutenberg', 'stork' ),
				'shortName' => esc_html_x( 'XL', 'Short name of the larger font size in the Gutenberg editor', 'stork' ),
				'size'      => 28,
				'slug'      => 'larger',
			),
		) );
	}
endif;
add_action( 'after_setup_theme', 'jgtstork_gutenberg_setup' );

/**
 * Enqueue block editor style
 */
function jgtstork_block_editor_styles() {
	wp_register_style( 'jgtstork-block-editor-fonts', jgtstork_font_url(), false, '1.6.0', 'all' );
	wp_enqueue_style( 'jgtstork-block-editor-styles', get_theme_file_uri( '/css/gutenberg-editor-style.css' ), array( 'jgtstork-block-editor-fonts' ), '1.6.0', 'all' );
}

add_action( 'enqueue_block_editor_assets', 'jgtstork_block_editor_styles' );


