// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.php',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			fontFamily: {
				aeonik: ['Aeonik'],
				helvetica: ['Helvetica'],
				neuegrotesk: ['Neue Grotesk'],
				oswald: ['Oswald'],
			},
			colors: {
				anjblack: '#101010',
				anjwhite: '#F2F0EF',
			},
		},
		//Screen sizes
		screens: {
			xs: '300px',
			ss: '620px',
			sm: '768px',
			md: '1024px',
			lg: '1440px',
			xl: '1650px',
			xxl: '1920px',
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),

		// Add Tailwind Typography.
		require('@tailwindcss/typography'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),
	],
};
