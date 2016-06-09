var elixir = require('laravel-elixir');

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
    mix.sass([
        "../vendor/bootstrap/dist/css/bootstrap.min.css",

        'app.scss'
    ], 'public/assets/css/app.css');

    mix.coffee([
        'app.coffee'
    ], 'public/assets/js/app.js');

    mix.scripts([
        "../vendor/jquery/dist/jquery.min.js",
    ], 'public/assets/js/vendor.js');

});
