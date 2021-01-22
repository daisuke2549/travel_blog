<?php
function mce_external_plugins_table($plugins) {
    $plugins['table'] = '//cdn.tinymce.com/4/plugins/table/plugin.min.js';
    $plugins['contextmenu'] = '//cdn.tinymce.com/4/plugins/contextmenu/plugin.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'mce_external_plugins_table' );

function mce_buttons_table($buttons) {
    array_push($buttons, "table","backcolor", "fontsizeselect", "cleanup","wp_page");
    return $buttons;
}
add_filter( 'mce_buttons', 'mce_buttons_table' );

function custom_editor_settings( $initArray ){
    
    $initArray['block_formats'] = "見出し2=h2; 見出し3=h3; 見出し4=h4; 見出し5=h5; 段落=p; グループ=div;";
    return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );


function register_button($buttons)
{
    $buttons[] = 'blockquote_link';
    return $buttons;
}
add_filter('mce_buttons', 'register_button');

function mce_plugin($plugin_array)
{
    $plugin_array['custom_button_script'] = get_template_directory_uri() . '/lib/functions/editor/editor_plugin.js';
    return $plugin_array;
}
add_filter('mce_external_plugins', 'mce_plugin');