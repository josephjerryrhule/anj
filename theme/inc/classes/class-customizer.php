<?php

/**
 * Customizer Settings
 * 
 * @package anj
 */


namespace ANJ\Inc;

use ANJ\Inc\Traits\Singleton;

class customizer
{

  use Singleton;

  protected function __construct()
  {
    $this->setup_hooks();
  }

  protected function setup_hooks()
  {
    add_action('customize_register', [$this, 'anj_customizer']);
  }

  public function anj_customizer($wp_customize)
  {
    $this->anj_customize($wp_customize);
  }

  protected function anj_customize($wp_customize)
  {
    //Add Header Panel

    $wp_customize->add_section(
      'header-section',
      [
        'title' => __('Header', 'anj'),
        'priority' => 2,
        'description' => __('Header Settings', 'anj')
      ]
    );

    $wp_customize->add_setting(
      'header-logo',
      [
        'default' => '',
        'transport' => 'refresh',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => [$this, 'sanitize_custom_url']
      ]
    );

    //Add Header Logo Control
    $wp_customize->add_control(
      new \WP_Customize_Image_Control(
        $wp_customize,
        'header-logo',
        [
          'label' => __('Logo', 'anj'),
          'section' => 'header-section',
          'settings' => 'header-logo',
          'width' => 100,
          'height' => 100,
        ]
      )
    );

    $wp_customize->add_setting(
      'header-mblogo',
      [
        'default' => '',
        'transport' => 'refresh',
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => [$this, 'sanitize_custom_url']
      ]
    );

    //Add Header Logo Control
    $wp_customize->add_control(
      new \WP_Customize_Image_Control(
        $wp_customize,
        'header-mblogo',
        [
          'label' => __('Mobile Logo', 'anj'),
          'section' => 'header-section',
          'settings' => 'header-mblogo',
          'width' => 100,
          'height' => 100,
        ]
      )
    );
  }

  public function sanitize_custom_url($input)
  {
    return filter_var($input, FILTER_SANITIZE_URL);
  }

  public function sanitize_custom_text($input)
  {
    return filter_var($input, FILTER_SANITIZE_STRING);
  }
}
