<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class WP_Depoiments {
    public static $instance;

	public function __construct() {
		add_action('init', array($this, 'custom_post_register'));
  }

  public static function get_instance() {
    if (!isset(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }
  
  public static function custom_post_register() {
    register_post_type(
      'wp_depoiments',
      array(
        'labels'         => array(
          'name'          => 'Depoimentos',
          'singular_name' => 'Depoimento'
        ),
        'public'            => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true,
        'rest_base'         => 'depoimentos/item',
        'menu_icon'         => 'dashicons-format-quote',
        'capability_type'   => 'post',
        'has_archive'       => false,
        'menu_position'     => 5,
        'rewrite'           => array('slug'	=> 'depoimentos', 'with_front'	=> false),
        'supports'          => array('title', 'editor')
      )
    );
  }


	public static function get_infor($post_id) {
		$infor = array();

    $infor['avatar'] = get_field('depoiments__avatar', $post_id);
		$infor['name'] = get_field('depoiments__name', $post_id);
		$infor['role'] = get_field('depoiments__role', $post_id);
    $infor['text'] = get_post_field('post_content', $post_id);
		$infor['quote'] = __REL_THEME__ . '/images/quote.svg';;

		return $infor;
	}

	
	public static function the_list () {
		$out = '';

		$args = array(
			'posts_per_page' => -1,
			'post_type'  	   => 'wp_depoiments', 
      'post_status'    => 'publish'
		);

		$depoiments = new WP_Query( $args );

		if ( $depoiments->have_posts() ) :
      while ( $depoiments->have_posts() ) : $depoiments->the_post();
        $attr = self::get_infor(get_the_ID());
        $out .= WP_MyFunctions::get_component_template('depoiments-item_content', $attr);
      endwhile;
		endif;

		wp_reset_postdata();
		
    return $out;
	}
}
WP_Depoiments::get_instance();