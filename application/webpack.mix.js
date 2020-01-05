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

mix.autoload({
    jquery: ['$', 'window.jQuery']
}); 


// Regular styling (non-print)
mix.js(['resources/js/cookie.js','resources/js/main.js'], 'public/js/app.js')
.sass('resources/sass/app.scss', 'public/css');


// Print styling only
mix.sass('resources/sass/print.scss', 'public/css/print.css');
