<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  'lib/gallery.php',         // Custom [gallery] modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * Custom includes
 */
//define( 'ACF_LITE', true );
require_once locate_template('/plugins/roots-rewrites/roots-rewrites.php');    // rewrite asset urls
require_once locate_template('/plugins/wp-h5bp-htaccess/wp-h5bp-htaccess.php');     // wordpress htaccess according to H5BP
require_once locate_template('/plugins/soil/soil.php');     // wordpress htaccess according to H5BP
  add_theme_support('soil-clean-up');
  add_theme_support('soil-relative-urls');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-disable-trackbacks');
