<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class WP_Application {

	public static $instance;

	public static function get_instance(){
		if(!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function saiba_mais_request() {
		echo WP_Custom::get_ajax_more_diversity_content($_REQUEST['ref']);
	}

	public static function get_ajax_link ($ref, $action) {
		return add_query_arg( array(
      'ref' => $ref,
      'security' => wp_create_nonce( 'ajax-security-nonce' ),
      'action' => $action,
    ), admin_url('admin-ajax.php'));
	}
	
}

add_action( 'wp_ajax_nopriv_saiba_mais_request', array('WP_Application', 'saiba_mais_request'));
add_action( 'wp_ajax_saiba_mais_request', array('WP_Application', 'saiba_mais_request'));