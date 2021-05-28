<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class WP_Custom {

  public static function get_banner_items_content($box_id) {
    $html = "";

    $key = 'banner_video_0'.$box_id.'__';

    $letter = get_field($key . 'letter', 'option');

    if (!empty($letter)) :

      $dafult_class = 'content-letter_'. $letter;
      $color = get_field($key . 'cor', 'option');
      $thumb = get_field($key . 'thumb', 'option');
      $youtube = get_field($key . 'link', 'option');
      $dafult_class .= (!empty($thumb)) ? ' has-thumb' : '';
      $dafult_class .= (!empty($youtube)) ? ' has-video' : '';

      $attr = array(
        'thumb' => $thumb,
        'titulo'=> get_field($key . 'titulo', 'option'),
        'rel'  => get_field($key . 'saibamais', 'option'),
        'link'  => get_field($key . 'link', 'option'),
        'color'  => $color,
        'letter'=> $letter,
        'count' => $box_id,
        'class' => $dafult_class
      );

      $html .= WP_MyFunctions::get_component_template('banner-item_content', $attr);
    
    endif;

    return $html;
  }

  public static function the_banner() {
    $html = "";
    $html .= '<div class="banner-home_accodrion '.WP_MyTheme::get_mobile_class().'" id="banner-home_accodrion">';
      for ($i=1; $i <= 8; $i++) { 
        $html .= self::get_banner_items_content($i);
      }
    $html .= '</div>';
    echo $html;
  }

  public static function the_banner_title() {
    $html = "";

    $titulo = get_field('banner_home__titulo', 'option');

    $html .= '<div class="row justify-content-center">';
      $html .= '<div class="col-md-12">';
        $html .= '<div class="banner-home_infor page-title center">';
          $html .= $titulo;
        $html .= '</div>';
      $html .= '</div>';
    $html .= '</div>';

    echo $html;
  }

  public static function get_tool_box_content($box_id) {
    $html = "";

    $key = 'tool_box_0'.$box_id.'__';
    $dafult_class = 'tool-box-'.$box_id;

    $attr = array(
      'image'=> get_field($key . 'icone', 'option'),
      'titulo'=> get_field($key . 'titulo', 'option'),
      'class'=> get_field($key . 'cor', 'option'),
      'link'=> get_field($key . 'link', 'option'),
      'dafult_class' => $dafult_class
    );

    $html .= '<div class="col-md-6">';
      $html .= WP_MyFunctions::get_component_template('tool-box_content', $attr);
    $html .= '</div>';

    return $html;
  }


  public static function the_tool_box() {
    $html = "";

    $titulo = get_field('tool_box__titulo', 'option');
    $content = get_field('tool_box__resumo', 'option');

    $html .= '<div class="row">';
      $html .= '<div class="col-md-12 col-lg-6 col-xl-4">';
        $html .= '<div class="tool-box_infor">';
          $html .= '<h2>'.$titulo.'</h2>';
          $html .= '<div class="tool-box_content">';
            $html .= $content;
          $html .= '</div>';
        $html .= '</div>';      
      $html .= '</div>';
      $html .= '<div class="col-md-12 col-lg-12  col-xl-8">';
        $html .= '<div class="row">';
          for ($i=1; $i <= 4; $i++) { 
            $html .= self::get_tool_box_content($i);
          }
        $html .= '</div>';
      $html .= '</div>';
    $html .= '</div>';

    echo $html;
  }

  public static function the_school_diverse() {
    $html = "";

    $titulo = get_field('school_diverse__titulo', 'option');
    $content = get_field('school_diverse__resumo', 'option');

    $image_1 = __REL_THEME__ . '/images/hand.png';
    $image_2 = __REL_THEME__ . '/images/purple-ball-opacity.png';
    $image_3 = __REL_THEME__ . '/images/heart.png';

    $html .= '<div class="school-diverse_container">';
      $html .= '<span class="image image-top-left" id="home_school-diverse-top-lef"><img src="'.$image_1.'" alt=""></span>';
      $html .= '<span class="image image-top-right" id="home_school-diverse-top-right"><img src="'.$image_2.'" alt=""></span>';
      $html .= '<div class="row justify-content-center">';
        $html .= '<div class="col-md-9 col-lg-6">';
          $html .= '<div class="school-diverse_infor">';
            $html .= '<h2>'.$titulo.'</h2>';
            $html .= '<div class="school-diverse_content">';
              $html .= $content;
            $html .= '</div>';
          $html .= '</div>';
        $html .= '</div>';
      $html .= '</div>';
      $html .= '<span class="image image-bottom-right" id="home_school-diverse-bottom-right"><img src="'.$image_3.'" alt=""></span>';
    $html .= '</div>';

    echo $html;
  }

  public static function get_justification_statistics() {
    $html = "";

    if( have_rows('justification_statistics__loop', 'option') ):
      $image = __REL_THEME__ . '/images/yellow-ball.svg';
      while( have_rows('justification_statistics__loop', 'option') ): the_row();
        $attr = array(
          'image' => $image,
          'percentual'=> get_sub_field('justification_statistics__percentual'),
          'resumo'=> get_sub_field('justification_statistics__resumo'),
          'size'=> get_sub_field('justification_statistics__tamanho')
        );
        $html .= WP_MyFunctions::get_component_template('justification-statistics_content', $attr);
      endwhile;
    endif;

    return $html;
  }

  public static function the_justification() {
    $html = "";

    $titulo = get_field('justification__titulo', 'option');
    $content = get_field('justification__resumo', 'option');

    $smille_1 = __REL_THEME__ . '/images/smille-left.svg';
    $smille_2 = __REL_THEME__ . '/images/smille-right.svg';

    $html .= '<div class="row justify-content-center relative-row">';
      $html .= '<span class="smille smille-top-left" id="home_justification-smille-top-left"><img src="'.$smille_1.'" alt=""></span>';
      $html .= '<span class="smille smille-top-right" id="home_justification-smille-top-right"><img src="'.$smille_2.'" alt=""></span>';
      $html .= '<div class="col-md-12 col-lg-8">';
        $html .= '<div class="justification_infor">';
          $html .= '<h2>'.$titulo.'</h2>';
          $html .= '<div class="justification_content">';
            $html .= $content;
          $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="justification_statistics">';
          $html .= self::get_justification_statistics();
        $html .= '</div>';
      $html .= '</div>';
    $html .= '</div>';

    echo $html;

  }

  public static function get_justification_files_content($box_id) {
    $html = "";

    $key = 'justification_files_0'.$box_id.'__';
    $attr = array(
      'titulo'=> get_field($key . 'titulo', 'option'),
      'arquivo'=> get_field($key . 'arquivo', 'option'),
      'class' => ($box_id % 2 == 0) ? 'odd' : 'even'
    );

    $html .= '<div class="col-md-6 col-lg-3 column custom-padding">';
      $html .= WP_MyFunctions::get_component_template('justification-files_content', $attr);
    $html .= '</div>';

    return $html;
  }


  public static function the_justification_files() {
    $html = "";

    $content = get_field('justification_files__resumo', 'option');

    $html .= '<div class="row justify-content-center">';
      $html .= '<div class="col-md-12">';
        $html .= '<div class="justification-files_infor">';
          $html .= '<div class="justification-files_content">';
            $html .= $content;
          $html .= '</div>';
        $html .= '</div>';      
      $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="row justify-content-center custom-margin">';
      for ($i=1; $i <= 4; $i++) :
        $html .= self::get_justification_files_content($i);
      endfor;
    $html .= '</div>';

    echo $html;
  }

  public static function get_more_diversity_content($box_id) {
    $html = "";

    $key = 'more_diversity_0'.$box_id.'__';

    $link = WP_Application::get_ajax_link('more_diversity_0'.$box_id, 'saiba_mais_request');

    $attr = array(
      'link' => $link,
      'image'=> get_field($key . 'icone', 'option'),
      'titulo'=> get_field($key . 'titulo', 'option'),
    );

    $html .= '<div class="col-md-6 col-lg-3 custom-padding column">';
      $html .= WP_MyFunctions::get_component_template('more-diversity_content', $attr);
    $html .= '</div>';

    return $html;
  }

  public static function get_ajax_more_diversity_content($key) {
    $html = "";

    $attr = array(
      'content' => apply_filters('the_content', get_field($key . '__content', 'option')),
      'image'   => get_field($key . '__icone', 'option'),
      'titulo'  => get_field($key . '__titulo', 'option'),
    );

  
    $html .= WP_MyFunctions::get_component_template('ajax-more-diversity_content', $attr);

    return $html;
  }

  public static function the_more_diversity() {
    $html = "";

    $titulo = get_field('more_diversity__titulo', 'option');
    $content = get_field('more_diversity__resumo', 'option');

    $html .= '<div class="row justify-content-center">';
      $html .= '<div class="col-md-12">';
        $html .= '<div class="more-diversity_infor">';
          $html .= '<h2>'.$titulo.'</h2>';
          $html .= '<div class="more-diversity_content">';
            $html .= $content;
          $html .= '</div>';
        $html .= '</div>';
      $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="more-diversity-box_content">';
      $html .= '<div class="row aling-items-center custom-margin">';
        for ($i=1; $i <= 4; $i++) { 
          $html .= self::get_more_diversity_content($i);
        }
      $html .= '</div>';
    $html .= '</div>';

    echo $html;
  }

  public static function the_depoiments_list() {
    $html = "";

    $html .= '<div class="row justify-content-center">';
      $html .= '<div class="col-md-12">';
        $html .= '<div class="depoiments_infor">';
          $html .= '<h2>Vozes das juventudes LGBTQIA+</h2>';
        $html .= '</div>';
      $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="depoiments_content">';
      $html .= '<div class="depoiments_slider" id="depoiments-init">';
        $html .= WP_Depoiments::the_list();
      $html .= '</div>';
    $html .= '</div>';

    echo $html;
  }

  public static function get_support_realization_content($box_id) {
    $html = "";

    $key = 'support_realization_0'.$box_id.'__';

    $attr = array(
      'image'=> get_field($key . 'brand', 'option'),
      'name'=> get_field($key . 'titulo', 'option'),
      'link'=> get_field($key . 'link', 'option'),
      'class' => 'item__0'.$box_id
    );

    $html .= '<div class="col-sm-4 no-padding">';
      $html .= WP_MyFunctions::get_component_template('support-realization_content', $attr);
    $html .= '</div>';

    return $html;
  }

  public static function the_support_realization() {
    $html = "";

    $html .= '<div class="row justify-content-center">';
      $html .= '<div class="col-md-12">';
        $html .= '<div class="support-realization_infor">';
          $html .= '<h5 class="btn btn-title">Apoio | Realização:</h5>';
        $html .= '</div>';
      $html .= '</div>';
    $html .= '</div>';
    $html .= '<div class="support-realization_content">';
      $html .= '<div class="row aling-items-center no-margin">';
        for ($i=1; $i <= 3; $i++) { 
          $html .= self::get_support_realization_content($i);
        }
      $html .= '</div>';
    $html .= '</div>';

    echo $html;
  }
  
  public static function the_contact() {
    $html = "";

    $icone = get_field('contact__icone', 'option');
    $titulo = get_field('contact__titulo', 'option');
    $content = get_field('contact__resumo', 'option');
    $phone1 = get_field('contact__phone_01', 'option');
    $phone2 = get_field('contact__phone_02', 'option');

    $html .= '<div class="row justify-content-between">';
      $html .= '<div class="col-md-12 col-lg-6">';
        $html .= '<div class="contact_infor">';
          $html .= '<div class="icone">';
            $html .= '<span class="icone-content"><img src="'.$icone.'" alt=""></span>';
          $html .= '</div>';
          $html .= '<h2>'.$titulo.'</h2>';
          $html .= '<div class="contact_content">';
            $html .= $content;
            $html .= '<div class="row">';
              $html .= '<div class="col-md-5">';
                $html .= '<div class="contact_content_phone">';
                  $html .= '<p>'.$phone1.'</p>';
                $html .= '</div>';
              $html .= '</div>';
              $html .= '<div class="col-md-5">';
                $html .= '<div class="contact_content_phone">';
                  $html .= '<p>'.$phone2.'</p>';
                $html .= '</div>';
              $html .= '</div>';
            $html .= '</div>';
          $html .= '</div>';
        $html .= '</div>';
      $html .= '</div>';
      $html .= '<div class="col-md-12 col-lg-5">';
        $html .= '<div class="contact_form">';
          $html .= do_shortcode('[contact-form-7 id="150" title="Contato"]');
        $html .= '</div>';
      $html .= '</div>';
    $html .= '</div>';
    
    echo $html;
  }


  public static function the_page_content ($page_id) {
    $out = '';

    $content = apply_filters('the_content', get_post_field('post_content', $post_id));

    $out .= '<div class="page-content">';
      $out .= do_shortcode($content);
    $out .= '</div>';

    echo $out;
  }


  public static function the_page_title ($page_id) {
    $out = '';

    $title = ( !empty(get_field('default_page__subtitle', $page_id) ) ) ? get_field('default_page__subtitle', $page_id) : get_post_field('post_title', $post_id);

    $out .= '<div class="page-title">';
      $out .= '<h1>'.$title.'</h1>';
    $out .= '</div>';

    echo $out;
  }


  public static function the_page_image($page_id) {
    $out = '';

    $image = get_field('default_page__banner', $page_id);
    $title = get_post_field('post_title', $post_id);

    

    $out .= '<div class="page-image" style="background-image: url('.$image.')">';
      $out .= '<img src="'.$image.'" alt="Escola + Diversa - '.$title.'"/>';
    $out .= '</div>';

    echo $out;
  }

  public static function the_page_file($page_id) {
    $out = '';

    $title = get_field('diversity_page__subtitle', $page_id);
    $file_1 = get_field('diversity_page__arquivo', $page_id);
    $file_2 = get_field('diversity_page__arquivo_jogo', $page_id);

    $out .= '<div class="page-file page-file_center">';
      $out .= '<div class="page-file_title">';
        $out .= '<h3>'.$title.'</h3>';
      $out .= '</div>';
      $out .= '<div class="page-file_button">';
        $out .= '<div class="row justify-content-center">';
          $out .= '<a href="'.$file_1.'" target="_blank" class="btn btn-download ga-download-jogo"><i class="bx bx-download"></i> <span>Download kit completo</span></a>';
        $out .= '</div>';
        /*
        $out .= '<div class="row justify-content-center">';
          $out .= '<a href="'.$file_2.'" target="_blank" class="btn btn-download outline"><i class="bx bx-download"></i> <span>Somente jogo</span></a>';
        $out .= '</div>';
        */
      $out .= '</div>';
    $out .= '</div>';

    echo $out;
  }
  
}
