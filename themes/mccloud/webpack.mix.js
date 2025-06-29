const mix = require('laravel-mix');
const path = require('path');

mix
	.js(path.resolve(__dirname, 'assets/js/app.js'), 'assets/dist')
	.sass(path.resolve(__dirname, 'assets/sass/styles.scss'), 'assets/dist/app.css')
	.options({
		processCssUrls: false,
	})
	.autoload({
		jquery: ['$', 'window.jQuery'],
	})
	.sourceMaps();
