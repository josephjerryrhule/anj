<?php

/**
 * Bootstraps the theme class
 * 
 * @package anj
 */

namespace ANJ\Inc;

use ANJ\Inc\Traits\Singleton;

class ANJ
{

  use Singleton;

  protected function __construct()
  {
    assets::get_instance();
    customizer::get_instance();
    elementor::get_instance();
  }

  protected function setup_hooks()
  {
    //Silence is Golden
  }
}
