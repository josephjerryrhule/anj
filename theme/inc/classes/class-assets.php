<?php

/**
 * Enqueue Theme Styles, Scripts and Assets.
 * 
 * @package anj
 */

namespace ANJ\Inc;

use ANJ\Inc\Traits\Singleton;

class assets
{
  use Singleton;

  protected function __construct()
  {
    $this->setup_hooks();
  }

  protected function setup_hooks()
  {
    //Add Actions and Filters
    add_action('wp_enqueue_scripts', [$this, 'register_styles']);
    add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    add_action('upload_mimes', [$this, 'svg_upload'], 10, 1);
  }

  public function register_styles()
  {
    wp_register_style('font-style', ANJ_DIR_URI . '/fonts/fonts.css', [], '1.0', 'all');
    wp_register_style('anj-style', get_stylesheet_uri(), [], ANJ_VERSION);

    wp_enqueue_style('font-style');
    wp_enqueue_style('anj-style');
  }

  public function register_scripts()
  {
    wp_register_script('gsap-script', ANJ_DIR_URI . '/js/gsap.min.js', ['jquery'], '3.2.2', true);
    wp_register_script('scrolltrigger-script', ANJ_DIR_URI . '/js/scrolltrigger.min.js', ['gsap-script'], '3.2.2', true);
    wp_register_script('lenis-script', ANJ_DIR_URI . '/js/lenis.min.js', ['jquery'], '1.0.2', true);
    wp_register_script('anj-script', ANJ_DIR_URI . '/js/script.min.js', ['jquery'], ANJ_VERSION, true);

    wp_enqueue_script('gsap-script');
    wp_enqueue_script('scrolltrigger-script');
    wp_enqueue_script('lenis-script');
    wp_enqueue_script('anj-script');
  }

  public function svg_upload($upload_mimes)
  {
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
  }
}
