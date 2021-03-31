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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').sourceMaps();

mix.js('resources/js/set-editor-flashcard-manager.js', 'public/js/set-editor-flashcard-manager.js');
mix.js('resources/js/set-editor-metadata.js', 'public/js/set-editor-metadata.js');
mix.js('resources/js/study-mode-viewer.js', 'public/js/study-mode-viewer.js');
mix.js('resources/js/test-mode-viewer.js', 'public/js/test-mode-viewer.js');
mix.js('resources/js/charts.js', 'public/js/charts.js');

//mix.postCss('resources/css/charts.css', 'public/css');
