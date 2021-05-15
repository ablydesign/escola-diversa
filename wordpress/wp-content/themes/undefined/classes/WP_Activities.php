<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class WP_Activities {
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
      'wp_activities',
      array(
        'labels'         => array(
          'name'          => 'Atividades',
          'singular_name' => 'Atividades'
        ),
        'public'            => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true,
        'rest_base'         => 'atividade/item',
        'menu_icon'         => 'dashicons-clipboard',
        'capability_type'   => 'post',
        'has_archive'       => false,
        'menu_position'     => 5,
        'rewrite'           => array('slug'	=> 'atividade', 'with_front'	=> false),
        'supports'          => array('title', 'editor', 'thumbnail', 'page-attributes', 'excerpt')
      )
    );
  }


	public static function get_infor($post_id, $i) {
		$infor = array();

    $infor['title']     = get_post_field('post_title', $post_id);
    $infor['excerpts']  = get_post_field('post_excerpt', $post_id);
    $infor['thumb']     = get_the_post_thumbnail_url($post_id, 'full');
    $infor['permalink'] = get_permalink($post_id);
    $infor['class']     = ($i % 2 == 0) ? 'even' : 'odd';
		return $infor;
	}

	
	public static function the_list () {
		$out = '';
    
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

		$args = array(
			'posts_per_page' => 6,
			'post_type'  	   => 'wp_activities', 
      'post_status'    => 'publish',
      'paged'          => $paged
		);

		$activities = new WP_Query( $args );
    $i = 1;

		if ( $activities->have_posts() ) :
      $out .= '<div class="row">';
        while ( $activities->have_posts() ) : $activities->the_post();
            $attr = self::get_infor(get_the_ID(), $i);
            $attr['class'] .= " col-md-4";
            $out .= WP_MyFunctions::get_component_template('activities-item_content', $attr);
            ++$i;
        endwhile;
      $out .= '</div>';
      $out .= '<div class="pagination">';
        $out .= '<div class="pagination-center">';
          $out .= wp_pagenavi( array( 'query' => $activities, 'echo' => false ) );
        $out .= '</div>';
      $out .= '</div>';
		endif;

		wp_reset_postdata();
		
    echo $out;
	}

  public static function the_page_title ($page_id) {
    $out = '';

    $title = get_field('activities_page__subtitle', $page_id);

    $out .= '<div class="page-title">';
      $out .= '<h1>'.$title.'</h1>';
    $out .= '</div>';

    echo $out;
  }

  public static function the_page_content ($page_id) {
    $out = '';

    $content = get_post_field('post_content', $post_id);

    $out .= '<div class="page-content">';
      $out .= do_shortcode($content);
    $out .= '</div>';

    echo $out;
  }

  public static function the_page_image($page_id) {
    $out = '';

    $image = get_field('activities_page__banner', $page_id);
    $title = get_post_field('post_title', $post_id);

    $out .= '<div class="page-image" style="background-image: url('.$image.')">';
      $out .= '<img src="'.$image.'" alt="Escola + Diversa - '.$title.'"/>';
    $out .= '</div>';

    echo $out;
  }
  
}
WP_Activities::get_instance();