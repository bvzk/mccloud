const mix = require('laravel-mix');

mix
	.js('assets/js/app.js', 'assets/dist')
	.sass('assets/sass/styles.scss', 'assets/dist/app.css')
	.options({
		processCssUrls: false,
	})
	.sourceMaps();
