<?php
if ( !defined('ABSPATH') ) {
  exit;
}

define('WDI_VERSION', '1.4.12');
define('WDI_IS_FREE', TRUE);
define('WDI_PREFIX', 'wdi');
define('WDI_DIR', WP_PLUGIN_DIR . "/" . plugin_basename(dirname(__FILE__)));
define('WDI_URL', plugins_url(plugin_basename(dirname(__FILE__))));
define('WDI_MAIN_FILE', plugin_basename(__FILE__));
define('WDI_META', '_wdi_instagram_meta');
define('WDI_OPT', 'wdi_instagram_options');
define('WDI_FSN', 'wdi_feed_settings');
define('WDI_TSN', 'wdi_theme_settings');
define('WDI_FEED_TABLE', 'wdi_feeds');
define('WDI_THEME_TABLE', 'wdi_themes');
define('WDI_MINIFY', TRUE);