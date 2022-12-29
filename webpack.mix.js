// webpack.mix.js

let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'dist').setPublicPath('dist');
