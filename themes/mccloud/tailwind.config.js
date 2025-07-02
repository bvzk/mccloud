/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./*.{php,html,js}",
		"./template-parts/**/*.{php,html,js}",
		"./page-templates/**/*.{php,html,js}",
		"./inc/**/*.{php,html,js}",
		"./assets/src/**/*.{js,scss,php,html}"
	],
	theme: {
		extend: {
			colors: {
				customLightGray: '#d1d1d6',
				customLightBlue: '#E8F0FE',
			},
		},
	},
	plugins: [],
}
