<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class WP_MyTheme {
	public static $instance;

	public function __construct() {
		add_action( 'init', array( $this, 'inital_locale' ), 1);
		add_action( 'admin_menu', array( $this, 'add_page_theme' ) );

		add_filter( 'get_the_date', array($this, 'convert_to_time_ago' ), 10, 3 );
		add_filter( 'locale', array( $this, 'set_locale'), 999);

		add_filter( 'nav_menu_item_title', array( $this, 'translate_nav_menu_item_title'), 10, 4); 

		//add_filter('wpcf7_ajax_loader', array( $this, 'custom_loading_ajax_loader'));
	}

											
	public static function get_instance(){
		if(!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function get_icon($name){
		$html = '';
		ob_start();
			$theme_path = get_template_directory();
			require( $theme_path . '/images/'. $name . '.svg');
			$html .= ob_get_contents();
		ob_end_clean();
		return $html;
	}

	public function add_page_theme ()
	{
		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page(
				array(
					'page_title'    => __('Escola + Diversa Theme'),
					'menu_title'    => __('Escola + Diversa'),
					'position' 			=> 60, 
					'menu_slug'     => 'theme-ably-settings',
					'capability'    => 'manage_options',
					'redirect'      => false
				)
			);
		}
		if (function_exists('acf_add_options_sub_page')) :
			acf_add_options_sub_page(
				array(
					'page_title'	=> 'Caixa de Ferramentas',
					'menu_title' 	=> 'Caixa de Ferramentas',
					'menu_slug' 	=> 'tools-box',
					'capability' 	=> 'manage_options',
					'parent_slug' => 'theme-ably-settings'
				)
			);
			acf_add_options_sub_page(
				array(
					'page_title'	=> 'Escola +Diversa',
					'menu_title' 	=> 'Escola +Diversa',
					'menu_slug' 	=> 'school-diverse',
					'capability' 	=> 'manage_options',
					'parent_slug' => 'theme-ably-settings'
				)
			);
			acf_add_options_sub_page(
				array(
					'page_title'	=> 'Justificativa',
					'menu_title' 	=> 'Justificativa',
					'menu_slug' 	=> 'justification-home',
					'capability' 	=> 'manage_options',
					'parent_slug' => 'theme-ably-settings'
				)
			);
			acf_add_options_sub_page(
				array(
					'page_title'	=> 'Saiba Mais Diversidade',
					'menu_title' 	=> 'Saiba Mais Diversidade',
					'menu_slug' 	=> 'more-diversity',
					'capability' 	=> 'manage_options',
					'parent_slug' => 'theme-ably-settings'
				)
			);
			acf_add_options_sub_page(
				array(
					'page_title'	=> 'Apoio/Realização',
					'menu_title' 	=> 'Apoio/Realização',
					'menu_slug' 	=> 'support-realization',
					'capability' 	=> 'manage_options',
					'parent_slug' => 'theme-ably-settings'
				)
			);
			acf_add_options_sub_page(
				array(
					'page_title'	=> 'Contato',
					'menu_title' 	=> 'Contato',
					'menu_slug' 	=> 'contact',
					'capability' 	=> 'manage_options',
					'parent_slug' => 'theme-ably-settings'
				)
			);
		endif;
	}


	public function custom_loading_ajax_loader () {
		return "<div class='loading-content'><span class='ajax-loader'></span></div>";
	}

	public static function get_mobile_class() {
		return (wp_is_mobile()) ? 'mobile' : '';
	}


	public static function get_brand ($location = null) {
		$image = '';
		if ($location == 'icon') {
			$image = get_bloginfo('template_url') . '/images/favicon.png';
		} elseif ($location == 'menu') {
			$image = get_bloginfo('template_url') . '/images/escolamaisdiversa.png';
		} elseif ($location == 'ably') {
			$image = get_bloginfo('template_url') . '/images/ably.svg';
		} else {
			$image = get_bloginfo('template_url') . '/images/escolamaisdiversa.png';
		}

		return wp_make_link_relative($image);
	}


	public static function inital_locale() {

		if (isset($_REQUEST['lang'])) {
			$lang = $_REQUEST['lang'];
		}

		if (empty($lang)) {
			$lang = get_the_author_meta('admin_language', get_current_user_id());
		}

		if (empty($lang)) {
			$lang = self::get_cookie_lang();
		}

		if (!self::is_frontend_ajax())
			self::set_cookie($lang);
	}


	public static function set_cookie($lang) {
		$expiration = time()+60*60*24*30; // 1 ano
		unset($_COOKIE['wp_current_lang']); 
		setcookie('wp_current_lang', $lang, $expiration , "/");
		$_COOKIE['wp_current_lang'] = $lang;
	}


	public static function set_locale($locale){
		if (isset($_REQUEST['lang']))
			return $_REQUEST['lang'];

		$user_locale = get_the_author_meta('admin_language', get_current_user_id());
		if (!empty($user_locale))
			return $user_locale;

		if (!empty($_COOKIE['wp_current_lang']))
			return $_COOKIE['wp_current_lang'];

		if (is_admin())
			return $locale;
		
		return 'en_US';
	}


	public static function locale_label() {
		$user_locale = null;

		if (is_user_logged_in())
			$user_locale = get_the_author_meta('admin_language', get_current_user_id());

		$lang = empty($user_locale) ? self::get_cookie_lang() : $user_locale;

		if('en_US' === $lang)
			return 'EN';

		if('es_ES' === $lang)
			return 'ES';

		return 'EN';
	}


	public static function get_cookie_lang() {
		return empty($_COOKIE['wp_current_lang']) ? get_user_locale() : $_COOKIE['wp_current_lang'];
	}


	public static function get_class() {
		$class = 'gaia-bg';

		if (!is_front_page() && !is_singular('sc_product'))
			$class .= ' header-fixed';
		
		return $class;
	}


	public static function get_html_lang() {
		$lang = self::locale_label();

		if('EN' == $lang)
			return 'en';

		if('ES' == $lang)
			return 'es';

		return 'en';
	}


	public static function the_content_lang($post_id) {
		if (self::locale_label() == 'EN') {
			the_content();
		} else {
			$content = get_field('content_es', $post_id);
			echo apply_filters('the_content', $content);
		}
	}


	public static function the_shared ($post_ID, $text = true){
		$out = '';

		$link = get_permalink($post_ID);
		$title = get_the_title($post_ID);
		$id = '';

		$out .= '<div class="shared-container">';
			if ($text)
			{
				$id = '-02';
				$out .= '<p>Compartilhe:</p>';
			}
			$out .= '<nav class="" data-link="'.$link.'" data-title="'.$title.'" id="sharedjs'.$id.'">';
				$out .= '<a href="javascript" class="shared-email">E-mail</a>';
				$out .= '<a href="javascript" class="shared-linkedin">Linkedin</a>';
				$out .= '<a href="javascript" class="shared-facebook">Facebook</a>';
				$out .= '<a href="javascript" class="shared-twitter">Twitter</a>';
				$out .= '<a href="javascript" class="shared-googleplus">Google+</a>';
				$out .= '<a href="javascript" class="shared-pintrest">Pintrest</a>';
				$out .= '<a href="javascript" class="shared-whatsapp">WhatsApp</a>';
			$out .= '</nav>';
		$out .= '</div>';

		echo $out;
	}


	public static function the_select_lang_modal() {
		echo WP_MyFunctions::get_component_template('modal_lang');
	}


	public static function readonly($user_logged = false){
		return ($user_logged) ? 'readonly=true' : '';
	}


	public static function translate_nav_menu_item_title( $title, $item, $args, $depth ) {
		return __($title, 'gaia-i18n');
	}

	public static function is_frontend_ajax() {
		return defined( 'DOING_AJAX' ) && DOING_AJAX && false === strpos( wp_get_referer(), '/wp-admin/' );
	}

}
WP_MyTheme::get_instance();
