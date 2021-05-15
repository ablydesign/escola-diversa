<?php
/**
 * Class
 */
 define('__THEMEPATH__', get_template_directory());
 define('__REL_THEME__', wp_make_link_relative(get_template_directory_uri()));

 require_once (__THEMEPATH__ . '/classes/WP_Application.php');
 require_once (__THEMEPATH__ . '/classes/WP_MyFunctions.php');
 require_once (__THEMEPATH__ . '/classes/WP_MyTheme.php');
 require_once (__THEMEPATH__ . '/classes/WP_Custom.php');
 require_once (__THEMEPATH__ . '/classes/WP_Shortcode.php');
 require_once (__THEMEPATH__ . '/classes/WP_Depoiments.php');
 require_once (__THEMEPATH__ . '/classes/WP_Documentaries.php');
 require_once (__THEMEPATH__ . '/classes/WP_Activities.php');
 require_once (__THEMEPATH__ . '/classes/WP_Ideas.php');
 require_once (__THEMEPATH__ . '/classes/WP_CustomBlocks.php');

 @ini_set( 'upload_max_size' , '64M' );
 @ini_set( 'post_max_size', '64M');
 @ini_set( 'max_execution_time', '300' );