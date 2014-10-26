<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

/**
** Function to add custom favicon in wordpress blog
**/
function add_favicon() {
  $favicon_path = get_template_directory_uri() . '/assets/img/favicon.ico';
  echo '<link rel="shortcut icon" href="' . $favicon_path . '" />';
}
add_action( 'wp_head', 'add_favicon' ); //front end
add_action( 'admin_head', 'add_favicon' ); //admin end



/**
   * short_content generator
   * @param  string $mycontent content string
   * @param  string $after
   * @param  int $length
   * @return string
   */

function short_content( $mycontent, $after = '', $length ) {

  $mycontent = strip_tags( $mycontent ); //stripout tags first

  if ( $mycontent ):
      $mycontent = strip_shortcodes( $mycontent );
      $mycontent = explode(' ',$mycontent , $length);

  else: //if no specified content string, automatically fetch content according to post id
      $mycontent = strip_tags( get_the_content() );
      $mycontent = explode(' ', $mycontent, $length);

  endif;

  if (count($mycontent)>=$length) :
     array_pop($mycontent);
      $mycontent = implode( ' ', $mycontent ). $after;

  else:
    $mycontent = implode( ' ', $mycontent );

  endif;

  return $mycontent;
}


/**
* ======== acf option page customization need to install ACF plugin ========/*
* */

if(function_exists('acf_add_options_page')) {

  acf_add_options_page();
  acf_add_options_sub_page( 'General Settings' );
  acf_add_options_sub_page( 'Home Page' );
  acf_add_options_sub_page( 'Sidebars' );
  acf_add_options_sub_page( 'Widgets' );
  acf_add_options_sub_page( 'Image Galley' );

}

/**
 * rename the acf option page title
 */
if( function_exists('acf_set_options_page_title') )
{
    acf_set_options_page_title( __('Theme Settings') );
}
