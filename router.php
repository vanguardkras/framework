<?php

/*
 * Add routes for you application here
 */

use Service\Router;

$router = new Router;

$router->add('/', 'MainController/main');
$router->add('about', 'MainController/about');
$router->add('downloads', 'MainController/downloads');
$router->add('downloaded', 'MainController/downloaded');
$router->add('purchase', 'MainController/purchase');
$router->add('order', 'MainController/order');
$router->add('blogs', 'MainController/blogs');
$router->add('blog', 'MainController/blog');


$router->get();