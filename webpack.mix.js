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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);
mix.styles('resources/css/menu.css','public/css/menu.css')
mix.styles('resources/css/carousel.css','public/css/carousel.css')
mix.js('resources/js/menu.js','public/js');
if (mix.inProduction()) {
    mix.version();
}
