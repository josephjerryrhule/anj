<?php

/**
 * Enqueue Custom Elementor Widgets
 * 
 * @package anj
 */

namespace ANJ\Inc;

use ANJ\Inc\Traits\Singleton;
use ANJ\Inc\Widgets\showcase;

class elementor
{
  use Singleton;

  protected function __construct()
  {
    add_action('elementor/init', [$this, 'init']);
  }

  public function init()
  {
    add_action('elementor/elements/categories_registered', [$this, 'create_new_category']);
    add_action('elementor/widgets/register', [$this, 'init_widgets']);
  }

  public function create_new_category($elements_manager)
  {
    $elements_manager->add_category(
      'anj',
      [
        'title' => __('Anj', 'anj'),
      ]
    );
  }

  public function init_widgets($widgets_manager)
  {
    //Require Widgets
    require_once __DIR__ . '/widgets/showcase.php';

    //Instantiate Widgets
    $widgets_manager->register(new showcase());
  }
}
