<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class WP_Ideas {
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
      'wp_ideas',
      array(
        'labels'         => array(
          'name'          => 'Idéias de Juventude',
          'singular_name' => 'Idéias de Juventude'
        ),
        'public'            => true,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true,
        'rest_base'         => 'ideias-juventude/item',
        'menu_icon'         => 'dashicons-thumbs-up',
        'capability_type'   => 'post',
        'has_archive'       => false,
        'menu_position'     => 5,
        'rewrite'           => array('slug'	=> 'ideias-juventude', 'with_front'	=> false),
        'supports'          => array('title', 'editor', 'thumbnail', 'excerpt')
      )
    );
  }


	public static function get_infor($post_id, $i) {
		$infor = array();

    $tipos = get_field('idea_post__tipo', $post_id);
    $atividades = get_field('idea_post__atividade', $post_id);

    $infor['artifacts'] = array();
    $other_class = " ";
    $tipos_values = array_column($tipos, 'value');

    if (in_array('aprensentacao', $tipos_values)) {
      $file = get_field('idea_post__apresentacao', $post_id);
      $other_class .= " apresentacao ";
      $infor['authors_icon'] = __REL_THEME__ . '/images/icon-autor.svg';
      $infor['artifacts'][] = array(
        'artifacts_tipo' => 'apresentacao',
        'artifacts_icon' => __REL_THEME__ . '/images/icon-artefact_apresentacao.png',
        'artifacts_text' => 'Ver Apresentação',
        'artifacts_name' => $file['filename'],
        'artifacts_url' => $file['url'],
        'artifacts_action' => "target='_blank'"
      );
    } else {
      $infor['authors_icon'] = __REL_THEME__ . '/images/icon-autor-single.svg';
      foreach($tipos as $t) {
        $value = $t['value'];
        $label = $t['label'];
        $other_class .= " " . $value;
        
        $file = '';
        if ($value == 'resultado') {
          $file = get_permalink($post_id);
          $action = "data-rel='".$value ."'";
        } else if ($value == 'audio') {
          $file = add_query_arg('audio', 'true', get_permalink($post_id));
          $action = "data-rel='".$value ."'";
        } else if ($value == 'video') {
          $file = get_field('idea_post__video', $post_id);
          $action = "data-fancybox='".$value ."'";
        }

        $infor['artifacts'][] = array(
          'artifacts_tipo' => $value,
          'artifacts_icon' => __REL_THEME__ . '/images/icon-artefact_'.$value.'.png',
          'artifacts_text' => $label,
          'artifacts_name' => '',
          'artifacts_url' => $file,
          'artifacts_action' => $action
        );
      } 
    }

    if (!empty($atividades)) {
      $infor['atividade']   = $atividades;
    }

    $infor['title']     = get_post_field('post_title', $post_id);
    $infor['permalink'] = get_permalink($post_id);
    $infor['authors']   = get_field('idea_post__autores', $post_id);
    $infor['class']     = ($i % 2 == 0) ? 'even' : 'odd';
    $infor['class']     .= $other_class;

		return $infor;
	}

	
	public static function the_list () {
		$out = '';
    
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

		$args = array(
			'posts_per_page' => 8,
			'post_type'  	   => 'wp_ideas', 
      'post_status'    => 'publish',
      'paged'          => $paged
		);

		$activities = new WP_Query( $args );
    $i = 1;

		if ( $activities->have_posts() ) :
      $out .= '<div class="row masonry-row" id="ideas-list_masonry">';
        while ( $activities->have_posts() ) : $activities->the_post();
            $attr = self::get_infor(get_the_ID(), $i);
            $attr['class'] .= " col-md-6";
            $out .= WP_MyFunctions::get_component_template('ideas-item_content', $attr);
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

    $title = get_field('ideas_page__subtitle', $page_id);

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

    $image = get_field('ideas_page__banner', $page_id);
    $title = get_post_field('post_title', $post_id);

    $out .= '<div class="page-image" style="background-image: url('.$image.')">';
      $out .= '<img src="'.$image.'" alt="Escola + Diversa - '.$title.'"/>';
    $out .= '</div>';

    echo $out;
  }
  
}
WP_Ideas::get_instance();