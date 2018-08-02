<?php
require_once 'config.php';
require_once 'controller/Classes/autoloader.php';
autoloader::register();

$uri = new URI($_SERVER['REQUEST_URI']);


$router = new Router($uri);

var_dump($uri);

$router->add('admin', function(){require 'Controller/adminController.php';});
$router->add('admin/create', function(){require 'Controller/articleCreationController.php';});
$router->add('admin/articleCreated.php', function($params){require 'Controller/articleCreatedController.php';}); //Creation

$router->add('(\w+)/(\d+)', function($params){require 'Controller/articleController.php';}); //article
$router->add('(\w+)', function(){require 'Controller/categoryController.php';}); //catégorie
$router->add('^$', function(){require 'Controller/homeController.php';}); //Home

$router->add('(\w+)/(\d+)/edit', function($params){require 'Controller/articleEditController.php';}); //article admin
$router->add('(\w+)/(\d+)/articleModification.php', function($params){require 'Controller/articleModificationController.php';}); //Modification
$router->add('(\w+)/(\d+)/delete', function($params){require 'Controller/articleDeleteController.php';});

/*
$router->add('admin', // fonction anonyme à rajouter ); //admin menu
$router->add('admin/(\w+)/', // fonction anonyme à rajouter ); //admin catégorie
$router->add('admin/(\w+)/(\d+)', // fonction anonyme à rajouter ); //admin article

*/
$router->run();

?>
