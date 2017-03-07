const { mix } = require('laravel-mix');
const browserSyncPlugin = require('browser-sync-webpack-plugin');

mix.webpackConfig({
  plugins: [
    new browserSyncPlugin({
      files: [
        '**/app.css'
      ],
      proxy: 'laravel-54.dev'
    }, {
      reload: false
    })
  ]
})

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
