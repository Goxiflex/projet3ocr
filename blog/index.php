<?php
require_once 'Controller/Classes/autoloader.php';
autoloader::register();

$uri = new URI($_SERVER['REQUEST_URI']);

var_dump($uri);

$router = new Router($uri);
$router->add('(\w+)/(\d+)', function($category, $id){echo $category .':'. $id;}); //article
$router->add('(\w+)', function($category){echo $category;}); //catégorie
/*
$router->add('', //fonction anonyme à rajouter ); //Home
$router->add('admin', // fonction anonyme à rajouter ); //admin menu
$router->add('admin/(\w+)/', // fonction anonyme à rajouter ); //admin catégorie
$router->add('admin/(\w+)/(\d+)', // fonction anonyme à rajouter ); //admin article

*/

$router->run();

var_dump($router);
?>
