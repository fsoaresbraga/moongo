const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.scripts([
    'resources/passenger/js/jquery.3.6.min.js',
    'resources/passenger/js/bootstrap.min.js',
    'resources/passenger/js/jquery-ui.min.js',
    'resources/passenger/js/sweetalert2.all.js',
    'resources/passenger/js/cliplab.min.js',
    'resources/passenger/js/functions.js',
    'resources/passenger/js/main.js',
    'resources/passenger/js/products.js',
    'resources/passenger/js/cart.js',
    'resources/passenger/js/checkout.js',
], 'public/passenger/js/core.js').version();

mix.styles([
    'resources/passenger/css/bootstrap.min.css',
    'resources/passenger/css/magnific.min.css',
    'resources/passenger/css/jquery-ui.min.css',
    'resources/passenger/css/fontawesome.min.css',
    'resources/passenger/css/sweetalert2.css',
    'resources/passenger/css/responsive.css',
    'resources/passenger/css/style.css',

], 'public/passenger/css/core.css').version();

mix.copyDirectory(['resources/passenger/css/webfonts/'],
    'public/passenger/webfonts/');



mix.scripts([
    'resources/landingPage/js/jquery-2.2.4.js',
    'resources/landingPage/js/bootstrap.bundle.js',
    'resources/landingPage/js/aos.js',
    'resources/landingPage/js/glightbox.js',
    'resources/landingPage/js/jquery.mask.js',
    'resources/landingPage/js/purecounter_vanilla.js',
    'resources/landingPage/js/owl.carousel.js',
    'resources/landingPage/js/sweetalert2.js',
    'resources/landingPage/js/main.js',
], 'public/landingPage/js/core.js').version();

mix.styles([
    'resources/landingPage/css/bootstrap.css',
    'resources/landingPage/css/aos.css',
    'resources/landingPage/css/boxicons.css',
    'resources/landingPage/css/glightbox.css',
    'resources/landingPage/css/owl.carousel.css',
    'resources/landingPage/css/sweetalert2.css',
    'resources/landingPage/css/style.css',

], 'public/landingPage/css/core.css').version();

mix.copyDirectory(['resources/landingPage/fonts/'],
    'public/landingPage/fonts/');

 
