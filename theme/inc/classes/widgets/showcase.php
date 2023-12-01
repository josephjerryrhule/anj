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

    $repeater->add_control(
      'defimage',
      [
        'label' => esc_html__('Choose Thumbnail', 'anj'),
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
      <div class="anjshowcase-section relative w-full flex flex-col items-center gap-[40px] md:gap-[48px]">
        <?php
        foreach ($list as $index => $item) :
          $title = $item['title'];
          $excerpt = $item['excerpt'];
          $domain = $item['domain'];
          $image = $item['image']['url'];
          $thumbnail = $item['defimage']['url'];
        ?>
          <div class="max-w-full w-full relative group cursor-pointer anjshowcase-item rounded-3xl border border-[#F2F2F20D] bg-[#F2F2F20A] overflow-clip p-2">
            <div class="absolute top-0 bg-linearshowcase w-full h-[1px]"></div>

            <div class="w-full rounded-2xl border border-[#3d3d3d] relative p-[37px_33px_0px] bg-linearshowcasecontainer overflow-clip">
              <div class="absolute top-0 bg-linearshowcase w-full h-[1px]"></div>
              <div class="w-full flex items-start justify-between">
                <div class="flex flex-col text-[#F2F2F2] font-neuegrotesk gap-[11px]">
                  <h2 class="font-neuegrotesk text-[12px] md:text-[24px] font-medium leading-6">
                    <?php echo __($title, 'anj'); ?>
                  </h2>
                  <p class="text-[13.477px] md:text-base font-normal text-[#F2F2F2CC]">
                    <?php echo __($excerpt, 'anj'); ?>
                  </p>
                </div>
                <span>
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_412_55615)">
                      <g clip-path="url(#clip1_412_55615)">
                        <path d="M18.6997 23.9344L17.2663 22.5344L22.8663 16.9344H5.33301V14.9344H22.8663L17.233 9.30103L18.6663 7.90103L26.6997 15.9344L18.6997 23.9344Z" fill="#F2F2F2" />
                      </g>
                    </g>
                    <defs>
                      <clipPath id="clip0_412_55615">
                        <rect width="32" height="32" fill="white" />
                      </clipPath>
                      <clipPath id="clip1_412_55615">
                        <rect width="32" height="32" fill="white" />
                      </clipPath>
                    </defs>
                  </svg>
                </span>
              </div>

              <div class="p-[31px_24px_0px] md:p-[65px_81.11px_0px] flex items-center justify-center">
                <style>
                  .anjshowcase-item:hover .anj-gif-<?php echo $index; ?> {
                    content: url('<?php echo esc_url($image); ?>');
                  }
                </style>
                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo $title; ?>" class="max-w-full !h-full md:!h-[559px] object-cover w-full object-top anj-gif-<?php echo $index; ?>" />
              </div>
            </div>
          </div>
        <?php
        endforeach;
        ?>
      </div>

      <script>
        document.addEventListener('DOMContentLoaded', () => {
          const gifs = document.querySelectorAll('.anj-gif-<?php echo $index; ?>');

          gifs.forEach((gif) => {
            gif.addEventListener('mouseleave', () => {
              gif.src = gif.src; // This will reset the GIF animation on mouse leave
            });
          });
        });
      </script>
<?php
    endif;
  }
}
