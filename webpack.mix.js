const mix = require('laravel-mix');
const globImporter = require('node-sass-glob-importer');

mix.js('resources/js/index.js', 'public/js')
   .sass('resources/scss/main.scss', 'public/css', {
      sassOptions: {
         importer: globImporter()
      }
   })
