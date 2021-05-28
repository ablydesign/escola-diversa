<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class WP_Documentaries {
  public static $instance;
  public static $destaques;

	public function __construct() {
		add_action('init', array($this, 'custom_post_register'));
    add_shortcode( 'video_destaque', array($this,'video_destaque'));
  }

  public static function get_instance() {
    if (!isset(self::$instance)) {
      self::$instance = new self();
    }
    return self::$instance;
  }
  
  public static function custom_post_register() {
    register_post_type(
      'wp_documentaries',
      array(
        'labels'         => array(
          'name'          => 'Documentário',
          'singular_name' => 'Documentário'
        ),
        'public'            => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true,
        'rest_base'         => 'documentario/item',
        'menu_icon'         => 'dashicons-format-video',
        'capability_type'   => 'post',
        'has_archive'       => false,
        'menu_position'     => 5,
        'rewrite'           => array('slug'	=> 'documentario', 'with_front'	=> false),
        'supports'          => array('title', 'editor', 'page-attributes')
      )
    );
  }


	public static function get_infor($post_id, $i = 0) {
		$infor = array();
    $youtube   = get_field('documentaries_youtube_link', $post_id);

    $infor['title']     = get_post_field('post_title', $post_id);
    $infor['thumb']     = get_field('documentaries_banner', $post_id);
    $infor['excerpts']  = get_field('documentaries_resumo', $post_id);
		$infor['file']      = get_field('documentaries_arquivo_compactado', $post_id);
    $infor['youtube']   = (empty($youtube)) ? 'javascript:void(0)' : $youtube;
    $infor['permalink'] = get_permalink($post_id);
    $infor['class']     = ($i % 2 == 0) ? 'even' : 'odd';
    $infor['class_options']  = (empty($infor['thumb'])) ? 'no-thumb' : 'has-thumb';
    $infor['anchor']    = get_field('documentaries_anchora', $post_id);

    $infor['class_link'] = 'ga-download-episodio' . $i;

		return $infor;
	}

	
	public static function the_list () {
		$out = '';

		$args = array(
			'posts_per_page' => -1,
			'post_type'  	   => 'wp_documentaries', 
      'post_status'    => 'publish',
      'post__not_in'   => self::$destaques
		);

		$documentaries = new WP_Query( $args );
    $i = 1;

		if ( $documentaries->have_posts() ) :
      while ( $documentaries->have_posts() ) : $documentaries->the_post();
          $attr = self::get_infor(get_the_ID(), $i);
          $attr['class'] .= " col-md-6";
          $out .= WP_MyFunctions::get_component_template('documentaries-item_content', $attr);
          ++$i;
      endwhile;
		endif;

		wp_reset_postdata();
		
    echo $out;
	}

  public static function the_page_video_destaque($page_id) {
		$out = '';

    $destaque = get_field('documentaries_page__destaque', $page_id);

    self::$destaques = array($destaque); 

    $attr = self::get_infor($destaque, 0);

    $attr['class'] = "col-md-12";
    $attr['class_link'] = "ga-download-principal";

    $out .= WP_MyFunctions::get_component_template('documentaries-item_destaque', $attr);

    echo $out;
  }


  public static function the_page_title ($page_id) {
    $out = '';

    $title = get_field('documentaries_page__subtitle', $page_id);

    $out .= '<div class="page-title">';
      $out .= '<h1>'.$title.'</h1>';
    $out .= '</div>';

    echo $out;
  }

  public static function the_page_image($page_id) {
    $out = '';

    $image = get_field('documentaries_page__banner', $page_id);
    $title = get_post_field('post_title', $post_id);

    $out .= '<div class="page-image" style="background-image: url('.$image.')">';
      $out .= '<img src="'.$image.'" alt="Escola + Diversa - '.$title.'"/>';
    $out .= '</div>';

    echo $out;
  }
  
}
WP_Documentaries::get_instance();