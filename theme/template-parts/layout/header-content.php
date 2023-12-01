<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anj
 */
$logo = get_theme_mod('header-logo');
$mblogo = get_theme_mod('header-mblogo');
?>

<header id="masthead">

	<div class="anjpreloader-area w-full h-[100dvh] bg-black fixed top-0 z-10 translate-y-0 transition-all duration-300 ease-linear opacity-100">
		<div class="p-[45px_16px] md:p-[45px_80.38px_266px] flex flex-col justify-end h-full">
			<div class="anjpreloader-countarea font-oswald text-[72px] md:text-[156.471px] leading-[187.765px] -tracking-[6.6px] md:-tracking-[12.518px] text-right">
				<span class="anjpreloader-counttext">
					<?php echo __('00', 'anj'); ?>
				</span>
				<span class="text-[32px] md:text-[78.235px] -tracking-[6.259px] leading-[93.882px]">
					<?php echo __('%', 'anj'); ?>
				</span>
			</div>
		</div>
	</div>

	<nav id="site-navigation" aria-label="<?php esc_attr_e('Main Navigation', 'anj'); ?>">

		<div class="w-full flex items-center justify-between p-4 pr-4 pt-[35px] pb-[65px] md:pl-[172px] md:pr-[80px] md:pt-[45px] md:pb-[109px] bg-transparent relative">
			<div class="max-w-[50px] md:max-w-[183px]">
				<a href="/" class="w-full">
					<img src="<?php echo esc_url($logo); ?>" alt="Logo" class="w-full md:block hidden" />
					<img src="<?php echo esc_url($mblogo); ?>" alt="Logo" class="w-full md:hidden">
				</a>
			</div>

			<div class="relative font-neuegrotesk text-[14px] flex flex-col items-center">
				<div class="absolute top-0 w-[24px] h-[4px] rounded-sm bg-[#F2F2F2] anj-workpill-glow"></div>
				<div class="anj-workpill-area w-[94px] rounded-xl border border-[#F2F2F21A] p-[6px_7px] backdrop-blur-[7.5px] relative z-[1]">
					<div class="rounded-md bg-[#F2F2F20D] p-[9px_23.55px]">
						<?php echo __('Work', 'anj'); ?>
					</div>
				</div>
			</div>

			<div class="anjnavitems-area md:block hidden">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id' => 'primary-menu',
						'menu_class' => 'flex anj-menu items-center text-white gap-[30px] text-[14px] font-medium leading-[13.653px] font-neuegrotesk',
						'items_wrap' => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
					)
				);
				?>
			</div>

			<div class="anjnavitems-area mobile md:hidden relative">
				<div class="anjham relative z-[1]">
					<svg class="open transition-all duration-300 ease-in-out" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect width="48" height="48" rx="24" fill="#171717" />
						<path d="M33.2 16.7998H14V18.7198H33.2V16.7998Z" fill="#A7A7A7" />
						<path d="M33.2 23.2001H14V25.1201H33.2V23.2001Z" fill="#A7A7A7" />
						<path d="M33.2 29.6H14V31.52H33.2V29.6Z" fill="#A7A7A7" />
					</svg>

					<svg class="close absolute top-0 opacity-0 transition-all duration-300 ease-in-out" width="49" height="50" viewBox="0 0 49 50" fill="none" xmlns="http://www.w3.org/2000/svg">
						<rect y="0.496216" width="49.0078" height="49.0078" rx="24" fill="#171717" />
						<path fill-rule="evenodd" clip-rule="evenodd" d="M30.5872 33.6683C31.1619 34.243 32.0936 34.243 32.6683 33.6683C33.243 33.0936 33.243 32.1619 32.6683 31.5872L26.1319 25.0508L32.6686 18.5142C33.2433 17.9395 33.2433 17.0077 32.6686 16.4331C32.0939 15.8584 31.1622 15.8584 30.5875 16.4331L24.0508 22.9698L17.5121 16.431C16.9374 15.8563 16.0057 15.8563 15.431 16.431C14.8563 17.0057 14.8563 17.9374 15.431 18.5121L21.9698 25.0508L15.4314 31.5892C14.8567 32.1639 14.8567 33.0956 15.4314 33.6703C16.006 34.245 16.9378 34.245 17.5125 33.6703L24.0508 27.1319L30.5872 33.6683Z" fill="#A7A7A7" />
					</svg>

				</div>

				<div class="w-[153px] h-[93px] anjmobilenav-items -translate-y-[10%] absolute right-0 rounded-xl mt-[7.5px] p-[20.5px_41px_20.5px_19px] transition-all duration-300 ease-in-out opacity-0">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id' => 'primary-menu',
							'menu_class' => 'flex flex-col anj-mbmenu text-white text-[14px] gap-[17px] font-medium leading-[13.653px] font-neuegrotesk',
							'items_wrap' => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
						)
					);
					?>
				</div>
			</div>
		</div>

	</nav><!-- #site-navigation -->

</header><!-- #masthead -->