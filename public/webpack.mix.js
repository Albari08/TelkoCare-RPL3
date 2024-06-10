let mix = require('laravel-mix');

mix.js('src/app.js', 'public/js')
   .react()
   .sass('resources/sass/app.scss', 'public/css')
   .postCss('resources/css/style.css', 'public/css', [])
   .version();
