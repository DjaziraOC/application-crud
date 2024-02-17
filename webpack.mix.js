const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
   
mix.sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css/bootstrap.css')
   .js('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/js/bootstrap.js');
