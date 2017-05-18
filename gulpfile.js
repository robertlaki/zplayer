var elixir = require('laravel-elixir');
var bower = './bower_components/';
var gulp = require('gulp');

/*
|--------------------------------------------------------------------------
| Elixir Asset Management
|--------------------------------------------------------------------------
|
| Elixir provides a clean, fluent API for defining some basic Gulp tasks
| for your Laravel application. By default, we are compiling the Sass
| file for our application, as well as publishing vendor resources.
|
*/

elixir(function (mix) {
    mix.styles([
        bower + 'bootstrap/dist/css/bootstrap.min.css',
        bower + 'components-font-awesome/css/font-awesome.css',
    ], 'resources/assets/css/vendor.css');

    mix.scripts([
        bower + 'jquery/dist/jquery.min.js',
        bower + 'bootstrap/dist/js/bootstrap.min.js',
        bower + 'js-video-url-parser/dist/jsVideoUrlParser.min.js',
    ], 'resources/assets/js/vendor.js');

    mix.scripts([
        './resources/assets/js/app.js',
        './resources/assets/js/player/*.js',
    ], 'public/js/app.js');

    mix.sass('app.scss');
    mix.copy('resources/assets/css/vendor.css', 'public/css/vendor.css');
    mix.copy('resources/assets/js/vendor.js', 'public/js/vendor.js');
    mix.copy('resources/assets/fonts', 'public/fonts');
    mix.copy(bower + 'bootstrap/fonts', 'public/fonts/');
    mix.copy(bower + 'components-font-awesome/fonts', 'public/fonts/');

    mix.copy('resources/assets/img', 'public/img');

    mix.version([
        'css/vendor.css',
        'css/app.css',
        'js/vendor.js',
        'js/app.js',
    ]);
});

