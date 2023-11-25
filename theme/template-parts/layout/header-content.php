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