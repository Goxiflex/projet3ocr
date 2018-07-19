<?php
require_once 'config.php';
require_once 'controller/Classes/autoloader.php';
autoloader::register();

$uri = new URI($_SERVER['REQUEST_URI']);

$router = new Router($uri);
$router->add('(\w+)/(\d+)', function(){require 'Controller/articleController.php';}); //article
$router->add('(\w+)', function(){require 'Controller/categoryController.php';}); //catégorie
$router->add('^$', function(){require 'Controller/homeController.php';}); //Home

/*
$router->add('admin', // fonction anonyme à rajouter ); //admin menu
$router->add('admin/(\w+)/', // fonction anonyme à rajouter ); //admin catégorie
$router->add('admin/(\w+)/(\d+)', // fonction anonyme à rajouter ); //admin article

*/

$router->run();

?>
