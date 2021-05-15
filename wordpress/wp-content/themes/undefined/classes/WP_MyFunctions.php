<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class WP_MyFunctions {

	public static $instance;
 	public static $theme_url;
	public static $theme_path;

	public function __construct() {
		self::$theme_path	= get_template_directory();
		self::$theme_url	= get_template_directory_uri();

		add_action( 'init', array($this, 'wp_function_clear' ));
		add_action( 'init', array($this, 'wp_load_textdomain'));

		add_action( 'after_setup_theme', array($this, 'wp_function_setup' ));
		add_action( 'after_switch_theme', array($this, 'flush_rewrite' ));
		add_action( 'wp_dashboard_setup', array($this, 'admin_remove_dashboard_widgets' ));
		add_action( 'admin_bar_menu', array($this, 'remove_wp_logo'), 999);

		add_filter( 'upload_mimes', array($this, 'add_mime_types' ));

		add_filter( 'site_transient_update_plugins',  array($this,'filter_plugin_updates' ));
		add_filter( 'option_active_plugins', array($this,'disabled_plugins_frontend' ));


		add_filter( 'body_class', array($this,'add_slug_body_class'));

		add_filter( 'the_generator', '__return_false' );
		add_filter( 'the_generator', '__return_empty_string');
		add_filter(	'the_generator', array($this, 'generator_version_removal'));

		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'wp_generator');
	}


	public static function get_instance(){
		if(!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function get_component_template( $component_name, $attr = null ) {
		$html = '';
		if ( ! $attr ) {
			$attr = array();
		}
		ob_start();
			$theme_path = get_template_directory();
			require( $theme_path . '/componentes/'. $component_name . '.php');
			$html .= ob_get_contents();
		ob_end_clean();
		return $html;
	}

	public static function the_component_template( $component_name, $attr = null ) {
		echo self::get_component_template($component_name, $attr);
	}

	public function wp_function_clear() {
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
   	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
	}

	public function admin_remove_dashboard_widgets() {
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );

		remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );
	}

	public function remove_wp_logo($wp_admin_bar) {
		$wp_admin_bar->remove_node( 'wp-logo' );
	}

	public static function remove_image_size_custom () {
		remove_image_size('thumbnail');
		remove_image_size('medium');
		remove_image_size('large');
		remove_image_size('medium_large');
	}

	public static function add_mime_types($mimes) {
		$mimes['svg']  = 'image/svg+xml';
  	$mimes['svgz'] = 'image/svg+xml';
		return $mimes;
	}

	public static function remove_image_size_default_custom ($sizes) {
		if (isset($sizes['thumbnail']))
			unset( $sizes['thumbnail']);

		if (isset($sizes['medium']))
			unset( $sizes['medium']);

		if (isset($sizes['large']))
			unset( $sizes['large']);

		if (isset($sizes['medium_large']))
			unset( $sizes['medium_large']);

		return $sizes;
	}

	public static function wp_load_textdomain() {
		load_script_textdomain('load-gaia-i18n', 'gaia-i18n', get_template_directory() . '/languages' );
	}

	public static function wp_function_setup() {
		load_theme_textdomain( 'gaia-i18n', get_template_directory() . '/languages' );

		add_theme_support( 'post-thumbnails');
		add_theme_support( 'menus' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-formats', array( 'default', 'aside' ) );

		register_sidebars(array( 'name' => 'Blog', 'id' => 'blog-sidebar', ) );

		register_nav_menus(
			array(
				'primary' => __( 'Menu Principal', 'vertice-lang' ),
				'footer' => __( 'Menu Foooter', 'vertice-lang' )
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		if (!current_user_can('administrator') && !is_admin()) {
			show_admin_bar(false);
		}
	}//close natio_setup()

	public function generator_version_removal() {
  	return '';
	}

	public function flush_rewrite() {
		flush_rewrite_rules();
	}//flush_rewrite()

	public function add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;
			$classes[] = $post->post_name;
		}
		return $classes;
	}

	public function filter_plugin_updates( $value ) {
		if (isset($value->response['advanced-custom-fields-pro-master/acf.php'])) {
			unset( $value->response['advanced-custom-fields-pro-master/acf.php'] );
		}
		if (isset($value->response['advanced-custom-fields-pro/acf.php'])) {
			unset( $value->response['advanced-custom-fields-pro/acf.php'] );
		}
	  return $value;
	}

	function disabled_plugins_frontend( $plugins ) {
		$url = htmlspecialchars(trim($_SERVER['REQUEST_URI'],'/'));
		$regex = '/blog/m';
		if (preg_match($regex, $url)) {
			$key = array_search( 'zopim-live-chat/zopim.php' , $plugins );
      if ( false !== $key ) {
				unset( $plugins[$key] );
			}
		}
		return $plugins;
	}

	public static function add_styles(){
		wp_enqueue_style( 'theme-css-font', (self::$theme_url . '/fonts/all.css'), array(), filemtime(self::$theme_path . '/fonts/all.css') );
		wp_enqueue_style( 'theme-css-main', (self::$theme_url . '/css/main.min.css'), array(), filemtime(self::$theme_path . '/css/main.min.css') );
		wp_enqueue_style( 'theme-css', get_stylesheet_uri(),  array(), filemtime( get_stylesheet_directory() ) );
	}

	public static function add_script(){
		wp_enqueue_script('jquery');
		
		wp_register_script('theme-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array('jquery'), '3.5.1', true);
		wp_enqueue_script('theme-gsap');
		
		wp_register_script('theme-scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js', array('theme-gsap'), '3.5.1', true);
		wp_enqueue_script('theme-scroll-trigger');

		wp_register_script('theme-globals', self::$theme_url . '/js/plugins.globals.min.js',  array(), filemtime(  self::$theme_path  . '/js/plugins.globals.min.js'), true);
		wp_enqueue_script('theme-globals');

		wp_register_script('theme-plugins', self::$theme_url . '/js/plugins.min.js',  array(), filemtime(  self::$theme_path  . '/js/plugins.min.js'), true);
		wp_enqueue_script('theme-plugins');

		wp_register_script('theme-main', self::$theme_url . '/js/main.js', array('theme-plugins'), filemtime( self::$theme_path . '/js/main.js'), true);
		wp_enqueue_script('theme-main');


		wp_localize_script('theme-main', 'WP', 
			array(
				'ajax_url' => admin_url('admin-ajax.php'),
				'nonce' => wp_create_nonce('ajax-nonce')
			)
		);

		if (is_page(15)) {
			wp_localize_script('theme-main', 'WP_LANG', WP_StringTranslate::load());
		}
	}
}

WP_MyFunctions::get_instance();