<?php

/**
 * Showcase GSAP Animation Elementor Widget Addon
 * 
 * @package anj
 */

namespace ANJ\Inc\Widgets;

use Elementor\Widget_Base;

class showcase extends Widget_Base
{

  public function get_name()
  {
    return 'showcase';
  }

  public function get_title()
  {
    return __('Showcase', 'anj');
  }

  public function get_icon()
  {
    return 'eicon-elementor';
  }

  public function get_categories()
  {
    return ['anj', 'basic'];
  }

  public function register_controls()
  {
    $this->start_controls_section(
      'content',
      [
        'label' => __('Content', 'anj'),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $repeater = new \Elementor\Repeater();

    $repeater->add_control(
      'title',
      [
        'label' => __('Title', 'anj'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'placeholder' => __('Add title here', 'anj'),
        'default' => __('Title', 'anj'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'excerpt',
      [
        'label' => __('Excerpt', 'anj'),
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'placeholder' => __('Add excerpt here', 'anj'),
        'default' => __('Excerpt', 'anj')
      ]
    );

    $repeater->add_control(
      'domain',
      [
        'label' => __('Domain', 'anj'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'placeholder' => __('https://example.com', 'anj'),
        'default' => __('https://example.com', 'anj'),
        'label_block' => true,
      ]
    );

    $repeater->add_control(
      'image',
      [
        'label' => esc_html__('Choose gif', 'anj'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
      ]
    );

    $this->add_control(
      'list',
      [
        'label' => __('Showcase List', 'anj'),
        'type' => \Elementor\Controls_Manager::REPEATER,
        'fields' => $repeater->get_controls(),
        'default' => [
          [
            'list_title' => __('Title #1', 'anj'),
          ],
          [
            'list_title' => __('Title #2', 'anj'),
          ],
          [
            'list_title' => __('Title #3', 'anj'),
          ],
        ],
        'title_field' => '{{{ title }}}'
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $list = $settings['list'];
    $browserframe = ANJ_DIR_URI . '/inc/assets/browserframe.svg';
    $browserframehover = ANJ_DIR_URI . '/inc/assets/browserframehover.svg';
    if ($list) :
?>
      <div class="anjshowcase-section relative w-full flex flex-col items-center gap-[60px] md:gap-[50px]">
        <?php
        foreach ($list as $index => $item) :
          $title = $item['title'];
          $excerpt = $item['excerpt'];
          $domain = $item['domain'];
          $image = $item['image']['url'];
        ?>
          <a href="<?php echo esc_url($domain); ?>" target="_blank">
            <div class="max-w-full relative group cursor-pointer anjshowcase-item-<?php echo $index; ?>">
              <img src="<?php echo esc_url($browserframe); ?>" alt="Google Chrome Browser Frame" class="!w-full opacity-100 transition-all duration-300 ease-in-out group-hover:opacity-0" />
              <img src="<?php echo esc_url($browserframehover); ?>" alt="Google Chrome Browser Frame" class="!w-full absolute top-0 transition-all duration-300 ease-in-out group-hover:opacity-100 opacity-0" />
              <div class="absolute top-[23.67px] left-[44.37px] md:top-[74.42px] md:left-[131.61px] text-anjwhite anjdomain-area text-[3.408px] md:text-[10.11px] tracking-[0.181px] font-normal">
                <span><?php echo __($domain, 'anj'); ?></span>
              </div>
              <div class="absolute top-[35.18px] md:top-[125.13px] left-[26.29px] md:left-[36.13px] text-anjwhite anjtitle-area md:text-left text-center max-w-full font-neuegrotesk">
                <h2 class="text-[12px] md:text-[32px] font-semibold underline">
                  <a href="<?php echo esc_url($domain); ?>" target="_blank">
                    <?php echo __($title, 'anj'); ?>
                  </a>
                </h2>
                <p class="text-[#ccc] text-[8px] md:text-[18px] tracking-[0.36px] leading-[19.8px] font-light">
                  <?php echo __($excerpt, 'anj'); ?>
                </p>
              </div>
              <div class="absolute top-[97.03px] left-[47.89px] md:top-[288.12px] md:left-[141.57px] anjanimatedimage-area h-[135px] md:h-[400.795px] overflow-clip">
                <div class="max-w-[233.563px] md:max-w-[722.525px]">
                  <img src="<?php echo esc_url($image); ?>" alt="<?php echo $title; ?>" class="!w-full" />
                </div>
              </div>
            </div>
          </a>
        <?php
        endforeach;
        ?>
      </div>

      <script>
        // Output the data from PHP into a JavaScript variable
        var showcaseData = <?php echo json_encode($list); ?>;
      </script>
<?php
    endif;
  }
}
