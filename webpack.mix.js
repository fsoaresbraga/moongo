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
    'resources/js/jquery.3.6.min.js',
    'resources/js/bootstrap.min.js',
    'resources/js/jquery-ui.min.js',
    'resources/js/sweetalert2.all.js',
    'resources/js/cliplab.min.js',
    'resources/js/functions.js',
    'resources/js/main.js',
    'resources/js/products.js',
    'resources/js/cart.js',
    'resources/js/checkout.js',
], 'public/mobile/js/core.js').version();

mix.styles([
    'resources/css/bootstrap.min.css',
    'resources/css/magnific.min.css',
    'resources/css/jquery-ui.min.css',
    'resources/css/fontawesome.min.css',
    'resources/css/sweetalert2.css',
    'resources/css/responsive.css',
    'resources/css/style.css',

], 'public/mobile/css/core.css').version();

mix.copyDirectory(['resources/css/webfonts/'],
    'public/mobile/webfonts/');



 
