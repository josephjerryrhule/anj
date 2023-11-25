/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

jQuery(document).ready(($) => {
	// Wait for the page to fully load
	$(window).on('load', function () {
		// Add class 'anjtrans-up' to 'anjpreloader-area'
		$('.anjpreloader-area').addClass('anjtrans-up');
	});

	// Function to update the percentage
	function updatePercentage(percentage) {
		$('.anjpreloader-counttext').text(percentage);
	}

	// Simulate the loading process (you can replace this with your actual loading logic)
	$(document).ready(function () {
		var percentage = 0;
		var interval = setInterval(function () {
			updatePercentage(percentage);
			percentage++;
			if (percentage > 100) {
				clearInterval(interval);
				// Add class 'anjtrans-up' to 'anjpreloader-area' once the percentage reaches 100
				$('.anjpreloader-area').addClass('anjtrans-up');
			}
		}, 0.00001); // You can adjust the interval as needed
	});
});

gsap.registerPlugin(ScrollTrigger);

const lenis = new Lenis();

lenis.on('scroll', ScrollTrigger.update);

gsap.ticker.add((time) => {
	lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);

document.addEventListener('DOMContentLoaded', () => {
	const tl = gsap.timeline();

	showcaseData.forEach((item, index) => {
		tl.from('.anjshowcase-item-' + index, {
			scrollTrigger: {
				trigger: '.anjshowcase-item-' + index,
				start: 'top center',
				end: 'bottom center',
				scrub: true,
			},
			opacity: 0,
			y: 50,
		});
	});
});
