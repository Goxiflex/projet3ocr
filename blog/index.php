<?php

require_once 'config.php';
require_once 'controller/Classes/Autoloader.php';
autoloader::register();

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
		$controller->displayAdmin('billet');
	});

$router->add('admin/(\d+)/edit', function($params)
	{
		$controller = new Controller($params);
		$controller->displayArticleEdit('billet');
	});

$router->add('admin/(\d+)/articleModification.php', function($params)
	{
		$controller = new Controller($params);
		$controller->displayArticleEdited('billet');
	});

$router->add('admin/(\d+)/comments', function($params)
	{
		$controller = new Controller($params);
		$controller->displayCommentsList('billet', 'comment');
	});

$router->add('admin/(\d+)/deletecomment/(\d+)', function($params){
		$controller = new Controller($params);
		$controller->displayCommentDelete('comment');
	}); 

$router->add('admin/(\d+)/modifycomment/(\d+)', function($params){
		$controller = new Controller($params);
		$controller->displayCommentModify('comment');
	});

$router->add('admin/(\d+)/modifycomment/commentModification.php', function($params)
	{
		$controller = new Controller($params);
		$controller->displayCommentModified('comment');
	});

$router->add('admin/create', function()
	{
		Controller::displayAdminCreate();
	});

$router->add('admin/articleCreated.php', function($params)
	{
		$controller = new Controller($params);
		$controller->displayArticleCreated('billet');
	});

$router->add('admin/(\d+)/delete', function($params)
	{
		$controller = new Controller($params);
		$controller->displayArticleDelete('billet');
	});


$router->run();
?>
