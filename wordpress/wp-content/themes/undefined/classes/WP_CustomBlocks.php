<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class WP_CustomBlocks {
  public static function acf_download_block() {
    if( function_exists('acf_register_block_type') ) {
        // register a testimonial block.
      acf_register_block_type(
        array(
          'name'              => 'Atividades - Download',
          'title'             => __('Atividades - Download'),
          'description'       => __('Adiciona um Block que tem um bodão de download'),
          'render_template'   => 'blocks/block-atividade-donwload.php',
        )
      );

      acf_register_block_type(
        array(
          'name'              => 'Atividades - Referencia',
          'title'             => __('Atividades - Referencia'),
          'description'       => __('Adiciona um Block que tem um bodão para uma modal de texto'),
          'render_template'   => 'blocks/block-atividade-referencia.php',
        )
      );
    }
  }
}

add_action('acf/init', array('WP_CustomBlocks', 'acf_download_block'));