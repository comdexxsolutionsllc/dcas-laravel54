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


mix.js('resources/assets/js/app.js', 'public/js').sass('resources/assets/sass/app.scss', 'public/css');

/*
 |  .copy('Modules/Chat/Assets/js/components/*.vue', 'resources/assets/js/components/')
 |  .copy('Modules/Chat/Assets/js/*.js', 'resources/assets/js/')
 |  .copy('../.bashrc', 'utility_files/')
 |  .sourceMaps()
 |	.combine(['Modules/Chat/Assets/css/*.css'], 'public/css/chat-vendor.*.css')
 |    	.version(['css/app.css', 'js/app.js']);
 | 	.version(['css/chat-vendor.css'])
 */
