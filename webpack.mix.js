const mix = require("laravel-mix");

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

// mix.js("resources/js/app.js", "public/assets/js/soft-ui-dashboard.js");
// mix.sass(
//     "resources/scss/soft-ui-dashboard.scss",
//     "public/assets/css/soft-ui-dashboard.css"
// );

mix.js('resources/js/app.js', 'public/js')
   .version()
   .sourceMaps();

mix.sass(
    "resources/scss/soft-ui-dashboard.scss",
    "public/assets/css/soft-ui-dashboard.css"
);
