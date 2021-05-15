<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class WP_Shortcode {

	public static function the_content_filter($content) {
		$block = join("|", array('row', 'column', 'container', 'video_full', 'installation', 'installation_step', 'video_thumb', 'banner', 'about', 'about_item', 'video', 'video_item', 'testimonials', 'testimonials_item', 'accordion', 'accordion_item'));
		$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
		return $rep;
	}

	public static function sc_container($atts, $content = null) {
		$out = '';

		$a = shortcode_atts( array(
			'class' => '',
			'bg'	=> 'inherit',
			'row' 	=> false
		), $atts );

		$out .= "<section class='section ".$a['class']." shortcode_component'>";
			$out .= "<div class='container'>";
				$out .= ($a['row']) ? '<div class="row align-items-center">': '';
					$out .= do_shortcode($content);
				$out .= ($a['row']) ? '</div>': '';
			$out .= "</div>";
		$out .= "</section>";

    	return $out;
	}


	public static function sc_row($atts, $content = null) {
		$out = '';

		$a = shortcode_atts( array(
			'class' => '',
			'row' => false
		), $atts );

		$out .= '<div class="row align-items-center '.$a['class'].'">';
			$out .= do_shortcode($content);
		$out .= '</div>';

		return $out;
	}

	public static function sc_column($atts, $content = null) {
		$out = '';

		$a = shortcode_atts( array(
      'class' => '',
    ), $atts );

		$out .= '<div class="col-12 '.$a['class'].'">';
			$out .= do_shortcode($content);
		$out .= '</div>';

		return $out;
	}


	public static function sc_page_menu($atts, $content = null) {
		$out = '';
		$id = get_the_ID();

		$a = shortcode_atts( array(
			'id' => 'page_menu',
		), $atts );
		
		$out .= '<nav class="product-nav" id="'.$a['id'].'">';
			$out .= "<ul class='list-nav'>";
				$out .= do_shortcode($content);
			$out .= '</ul>';
		$out .= '</nav>';

		return $out;
	}

	public static function sc_page_menu_item($atts, $content = null) {
		$out = '';

		$a = shortcode_atts( array(
			'key' => '01',
			'label' => '',
			'href' => 'javascript:void(0);'
		), $atts );

		if (empty($a['label'])) {
			$a['label'] = 'page_nav_label_' . $a['key'];
		}
		
		$out .= '<a class="list-nav_item" id="list-nav_item_'.$a['key'].'" href="#'.$a['key'].'">';
			$out .= '<span class="mark"></span><span class="text">'. __($a['label'], 'gaia-i18n') . '</span>';
		$out .= '</a>';

		return $out;
	}

	public static function sc_container_step($atts, $content = null) {
		$out = '';

		$a = shortcode_atts( array(
			'id' => 'installation',
		), $atts );

		$out .= "<section class='section product-installation_container shortcode_component' id='".$a['id']."'>";
			$out .= "<div class='container'>";
				$out .= do_shortcode($content);
			$out .= "</div>";
		$out .= "</section>";

		return $out;
	}

	public static function sc_column_step($atts) {
		$out = '';
		$id = get_the_ID();

		$a = shortcode_atts( array(
			'title' => sprintf('P%s_step_{1}_title', $id),
			'text' => sprintf('P%s_step_{1}_text', $id),
			'image' => '',
			'number' => '01.',
			'position' => 'left'
    ), $atts );

		$out .= '<div class="product-installation_step disposition-'.$a['position'].'">';
			$out .= WP_MyFunctions::get_component_template('shortcodes/product_installation_step', $a);
		$out .= '</div>';

		return $out;
	}

	public static function sc_column_video($atts) {
		$out = '';
		$id = get_the_ID();

		$a = shortcode_atts( array(
			'id' => 'videos',
			'class' => 'col-md-4',
			'title' => sprintf('P%s_video_title', $id),
			'video' => '',
			'image' => '',
			'position' => 'left'
    ), $atts );

		$out .= '<div class="product-column_video '.$a['class'].'" id="'.$a['id'].'">';
			$out .= WP_MyFunctions::get_component_template('shortcodes/product_videos', $a);
		$out .= '</div>';

		return $out;
	}

	public static function sc_banner($atts) {
		$out = '';
		$id = get_the_ID();

		$a = shortcode_atts( array(
			'id' => 'banner',
			'text' => sprintf('P%s_banner_text', $id),
			'link' => 'javascript:void(0)',
			'background' => ''
		), $atts );
		
		$out .= '<section class="product-banner" id="'.$a['id'].'">';
			$out .= WP_MyFunctions::get_component_template('shortcodes/product_banner', $a);
		$out .= '</section>';

		return $out;
	}

	public static function sc_video_full($atts) {
		$out = '';
		$id = get_the_ID();
		$lang_sufix = WP_MyTheme::get_html_lang();

		$a = shortcode_atts( array(
			'id' => 'video_full',
			'title' => sprintf('P%s_video_full_title', $id),
			'text' => sprintf('P%s_video_full_text', $id),
			'link_en' => 'javascript:void(0)',
			'link_es' => 'javascript:void(0)',
			'background' => ''
		), $atts );
		
		$a['link'] = $a['link_' . $lang_sufix];

		$out .= '<section class="product-video_full" id="'.$a['id'].'" lang="'.$lang_sufix.'">';
			$out .= WP_MyFunctions::get_component_template('shortcodes/product_video_full', $a);
		$out .= '</section>';

		return $out;
	}

	public static function sc_payment_section($atts) {
		$out = '';
		$id = get_the_ID();

		$a = shortcode_atts( array(
			'id' => 'product-payment',
			'product_id' => $id,
			'title' => sprintf('P%s_payment_title', $id),
			'text' => sprintf('P%s_payment_text', $id),
			'link' => 'javascript:void(0)',
			'background' => '',
			'paypal_img' => __REL_THEME__ . '/images/paypal-cards.png'
		), $atts );

		$infor = SC_ProductItem::get_shortcode_infor($a['product_id']);

		$attr = array_merge($a, $infor);

		$out .= '<section class="product-payment" id="'.$attr['id'].'">';
			$out .= WP_MyFunctions::get_component_template('shortcodes/product_payment', $attr);
		$out .= '</section>';

		return $out;
	}

	public static function sc_about_container($atts, $content = null) {
		$out = '';

		$a = shortcode_atts( array(
			'id' => 'about',
			'title' => 'about',
		), $atts );
		
		
		$out .= "<section class='section about_container shortcode_component' id='".$a['id']."'>";
			$out .= "<div class='container'>";
				$out .= '<div class="section-head text-center">';
					$out .= '<h2>';
						$out .= '<hr style="">';
							$out .= __($a['title'], 'gaia-i18n');
					$out .= '</h2>';
				$out .= '</div>';
				$out .= '<div class="row">';
					$out .= do_shortcode($content);
				$out .= "</div>";
			$out .= "</div>";
		$out .= "</section>";

		return $out;
	}

	public static function sc_about_item($atts) {
		$out = '';

		$a = shortcode_atts( array(
			'title' => 'about_title',
			'description' => 'about_description',
			'image' => '',
		), $atts );


		$out .= '<div class="col-md-4">';
			$out .= WP_MyFunctions::get_component_template('shortcodes/about_card', $a);
		$out .= '</div>';

		return $out;
	}

	public static function sc_video_container($atts, $content = null) {
		$out = '';

		$a = shortcode_atts( array(
			'id' => 'viedos',
			'title' => 'viedos',
		), $atts );
		
		
		$out .= "<section class='section videos_container shortcode_component' id='".$a['id']."'>";
			$out .= "<div class='container'>";
				$out .= '<div class="row">';
					$out .= do_shortcode($content);
				$out .= "</div>";
			$out .= "</div>";
		$out .= "</section>";

		return $out;
	}

	public static function sc_videos_item($atts) {
		$out = '';

		$a = shortcode_atts( array(
			'title' => 'video_design',
			'video' => 'javascript:void(0);',
			'image' => '',
		), $atts );

		$out .= '<div class="col-md-4">';
			$out .= WP_MyFunctions::get_component_template('shortcodes/video_card', $a);
		$out .= '</div>';

		return $out;
	}

	public static function sc_testimonials_container($atts, $content = null) {
		$out = '';

		$a = shortcode_atts( array(
			'id' => 'testimonials',
			'title' => 'testimonials',
		), $atts );
		
		
		$out .= "<section class='section testimonials_container shortcode_component' id='".$a['id']."'>";
			$out .= "<div class='container'>";
				$out .= '<div class="section-head testimonials-title section-head_center">';
					$out .= '<h2>';
						$out .= __($a['title'], 'gaia-i18n');
					$out .= '</h2>';
				$out .= '</div>';
				$out .= '<div class="row justify-content-center align-items-center">';
					$out .= do_shortcode($content);
				$out .= "</div>";
			$out .= "</div>";
		$out .= "</section>";

		return $out;
	}

	public static function sc_testimonials_item($atts) {
		$out = '';

		$a = shortcode_atts( array(
			'name' => 'helen',
			'description' => 'description_helen',
			'image' => '',
		), $atts );

		$out .= '<div class="col-md-10">';
			$out .= WP_MyFunctions::get_component_template('shortcodes/testimonials_item', $a);
		$out .= '</div>';

		return $out;
	}

	public static function sc_accordion_container($atts, $content = null) {
		$out = '';

		$a = shortcode_atts( array(
			'id' => 'asked-questions',
			'title' => 'Frequently Asked Questions',
		), $atts );
		
		
		$out .= "<section class='section asked-questions_container shortcode_component' id='".$a['id']."'>";
			$out .= "<div class='container'>";
				$out .= '<div class="section-head section-head_center asked-questions-title">';
					$out .= '<h2>';
						$out .= __($a['title'], 'gaia-i18n');
					$out .= '</h2>';
				$out .= '</div>';
				$out .= "<div class='accordion-container'>";
					$out .= '<div class="row justify-content-center align-items-center">';
						$out .= do_shortcode($content);
					$out .= "</div>";
				$out .= "</div>";
			$out .= "</div>";
		$out .= "</section>";

		return $out;
	}

	public static function sc_accordion_item($atts) {
		$out = '';

		$a = shortcode_atts( array(
			'key' => 1,
			'title' => '',
			'content' => '',
		), $atts );

		if (empty($a['title'])) {
			$a['title'] = 'question_'. $a['key'];
		}
		
		if (empty($a['content'])) {
			$a['content'] = 'content_' . $a['key'];
		}

		$out .= '<div class="col-md-12">';
			$out .= WP_MyFunctions::get_component_template('shortcodes/accordion_item', $a);
		$out .= '</div>';

		return $out;
	}


}
add_filter( "the_content", array('WP_Shortcode','the_content_filter'));

add_shortcode( 'row', array('WP_Shortcode','sc_row'));
add_shortcode( 'column', array('WP_Shortcode','sc_column'));
add_shortcode( 'container', array('WP_Shortcode','sc_container'));