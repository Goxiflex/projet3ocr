<?php
require_once 'config.php';
require_once 'controller/Classes/autoloader.php';
autoloader::register();

$uri = new URI($_SERVER['REQUEST_URI']);
$router = new Router($uri);

$router->add('(\d+)', function($params)
 	{	
		$controller = new Controller($params);
		$controller->layoutArticle($controller->modelArticleCall('billet'), $controller->modelCommentCall('comment', 'dateCreation'));
 	});

$router->add('^$', function($params)
	{
		$controller = new Controller($params);
		$controller->layoutHome($controller->modelArticlesListCall('billet'));	
	});

$router->add('(\d+)/commentpost', function($params)
	{
		$controller = new Controller($params);
		$controller->layoutAction($controller->modelCommentInsert('comment'), $params, 'front');
	});

$router->add('(\d+)/reportcomment/(\d+)', function($params) 
	{
		$controller = new Controller($params);
		$controller->layoutAction($controller->modelCommentReport('comment'), $params, 'front');
	});

$router->add('admin', function($params)
	{
		$controller = new Controller($params);
		$controller->layoutAdmin($controller->modelArticlesListCall('billet'));
	});

$router->add('admin/(\d+)/edit', function($params)
	{
		$controller = new Controller($params);
		$controller->layoutAdminEdit($controller->modelArticleCall('billet'));
	});

$router->add('admin/(\d+)/articleModification.php', function($params)
	{
		$controller = new Controller($params);
		$controller->layoutAction($controller->modelArticleUpdate('billet'), $params, 'admin');
	});

$router->add('admin/(\d+)/comments', function($params)
	{
		$controller = new Controller($params);
		$controller->layoutAdminComments($controller->modelArticleCall('billet'),$controller->modelCommentCall('comment', 'dateCreation'), $params);
	});

$router->add('admin/(\d+)/deletecomment/(\d+)', function($params){
		$controller = new Controller($params);
		$controller->layoutAction($controller->modelCommentDelete('comment'), $params, 'admin');
	});

$router->add('admin/(\d+)/modifycomment/(\d+)', function($params){
		$controller = new Controller($params);
		$contoller->layoutAdminComment();
	});


$router->add('admin/create', function()
	{
		Controller::layoutAdminCreate();
	});

$router->add('admin/articleCreated.php', function($params)
	{
		$controller = new Controller($params);
		$controller->layoutAction($controller->modelArticleInsert('billet'), $params, 'admin');
	});

$router->add('admin/(\d+)/delete', function($params)
	{
		$controller = new Controller($params);
		$controller->layoutAction($controller->modelArticleDelete('billet'), $params, 'admin');
	});

$router->run();
?>
