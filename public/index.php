<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Hadirizaldi\PhpMvc\App\Router;


// menambahkan router
Router::add('GET', '/', 'HomeController', 'index');
Router::add('GET', '/hello', 'HelloController', 'hello');
Router::add('GET', '/world', 'WorldController', 'world');

//untuk melihat router yang didaftarkan
// var_dump(Router::getRoutes());

Router::run();
