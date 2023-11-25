<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Anj
 */
$logo = get_theme_mod('header-logo');
?>

<header id="masthead">

	<div class="anjpreloader-area w-full h-[100dvh] bg-black fixed top-0 z-10 translate-y-0 transition-all duration-300 ease-linear opacity-100">
		<div class="p-[45px_16px] md:p-[45px_80.38px_266px] flex flex-col justify-between h-full">
			<div class="logo max-w-[50px]">
				<img src="<?php echo esc_url($logo) ?>" alt="Logo" class="w-full" />
			</div>

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

		<div class="w-full flex items-center justify-center pt-[35px] pb-[65px] md:pt-[45px] md:pb-[109px] bg-transparent relative">
			<div class="max-w-[50px]">
				<a href="/" class="w-full">
					<img src="<?php echo esc_url($logo); ?>" alt="Logo" class="w-full" />
				</a>
			</div>
		</div>

	</nav><!-- #site-navigation -->

</header><!-- #masthead -->