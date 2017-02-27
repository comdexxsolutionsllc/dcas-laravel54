const {mix} = require('laravel-mix');

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


mix.copy('Modules/Chat/Assets/js/components/*.vue', 'resources/assets/js/components/')
    .copy('Modules/Chat/Assets/js/*.js', 'resources/assets/js/')
    .copy('../.bashrc', 'utility_files/')
    .js('resources/assets/js/app.js', 'public/js')
    .sourceMaps()
    .sass('resources/assets/sass/app.scss', 'public/css')
    .version(['css/app.css', 'js/app.js']);
