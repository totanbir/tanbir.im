const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
	'public/fontend/css/bootstrap.css',
	'public/fontend/css/animate.css',
	'public/fontend/css/icomoon.css',
	'public/fontend/css/magnific-popup.css',
	'public/fontend/css/flexslider.css',
	'public/fontend/css/owl.carousel.min.css',
	'public/fontend/css/owl.theme.default.min.css',
	'public/fontend/css/social-sharing-buttons.css',
	'public/fontend/fonts/flaticon/font/flaticon.css',
	'public/fontend/css/style.css'
	], 'public/css/app.css');


mix.scripts([
	'public/fontend/js/jquery.easing.1.3.js',
	'public/fontend/js/bootstrap.min.js',
	'public/fontend/js/jquery.waypoints.min.js',
	'public/fontend/js/jquery.flexslider-min.js',
	'public/fontend/js/owl.carousel.min.js',
	'public/fontend/js/jquery.magnific-popup.min.js',
	'public/fontend/js/magnific-popup-options.js',
	'public/fontend/js/main.js',
	'public/fontend/js/modernizr-2.6.2.min.js',
	'public/fontend/js/jquery.nicescroll.min.js'
	], 'public/js/app.js');

if(mix.inProduction()) {
	mix.version();
}