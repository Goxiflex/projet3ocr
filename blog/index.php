<?php

require_once 'config.php';
require_once 'controller/Classes/Autoloader.php';
autoloader::register();
session_start();

$uri = new Uri($_SERVER['REQUEST_URI']);
$router = new Router($uri);

$router->add('^$', function($params)
	{
		$controller = new Controller($params);
		$controller->displayArticlesList('billet');	
	});	

$router->add('(\d+)', function($params)
 	{
		$controller = new Controller($params);
		$controller->displayArticle('billet','comment');
 	});

$router->add('(\d+)/commentpost', function($params)
	{
		$controller = new Controller($params);
		$controller->displayCommentInsert('comment');
	});

$router->add('(\d+)/reportcomment/(\d+)', function($params) 
	{
		$controller = new Controller($params);
		$controller->displayCommentReport('comment');
	});
	
$router->add('admin', function($params)
	{
		$controller = new Controller($params);
		Controller::logCheck();
		$controller->displayAdmin('billet');
	});

$router->add('admin/(\d+)/edit', function($params)
	{
		$controller = new Controller($params);
		Controller::logCheck();
		$controller->displayArticleEdit('billet');
	});

$router->add('admin/(\d+)/articleModification.php', function($params)
	{
		$controller = new Controller($params);
		Controller::logCheck();
		$controller->displayArticleEdited('billet');
	});

$router->add('admin/(\d+)/comments', function($params)
	{
		$controller = new Controller($params);
		Controller::logCheck();
		$controller->displayCommentsList('billet', 'comment');
	});

$router->add('admin/(\d+)/deletecomment/(\d+)', function($params){
		$controller = new Controller($params);
		Controller::logCheck();
		$controller->displayCommentDelete('comment');
	}); 

$router->add('admin/(\d+)/modifycomment/(\d+)', function($params){
		$controller = new Controller($params);
		Controller::logCheck();
		$controller->displayCommentModify('comment');
	});

$router->add('admin/(\d+)/modifycomment/commentModification.php', function($params)
	{
		$controller = new Controller($params);
		Controller::logCheck();
		$controller->displayCommentModified('comment');
	});

$router->add('admin/create', function()
	{
		Controller::logCheck();
		Controller::displayAdminCreate();
	});

$router->add('admin/articleCreated.php', function($params)
	{
		$controller = new Controller($params);
		Controller::logCheck();
		$controller->displayArticleCreated('billet');
	});

$router->add('admin/(\d+)/delete', function($params)
	{
		$controller = new Controller($params);
		Controller::logCheck();
		$controller->displayArticleDelete('billet');
	});

$router->add('connect', function($params)
	{
		$controller = new Controller($params);
		$controller->displayConnectionUser('user');
	});

$router->add('disconnect', function($params) 
	{
		Controller::disconnect();
	});


$router->run();
?>
