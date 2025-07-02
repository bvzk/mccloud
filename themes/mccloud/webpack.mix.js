const mix = require('laravel-mix');
const path = require('path');

mix
	.js(path.resolve(__dirname, 'assets/src/js/app.js'), 'assets/dist/app.js')
	// TODO: rebuild logic for css
	// .sass(path.resolve(__dirname, 'assets/src/sass/styles.scss'), 'assets/dist/app.css')
	.options({
		processCssUrls: false,
	})
	.autoload({
		jquery: ['$', 'window.jQuery'],
	})
	.sourceMaps();