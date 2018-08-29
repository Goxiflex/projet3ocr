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

$router->add('(\d+)/commentpost', function($params){
		$controller = new Controller($params);
		$controller->layoutAction($controller->modelCommentInsert('comment'), $params);
	});

$router->add('(\d+)/reportcomment/(\d+)', function($params) {
		$controller = new Controller($params);
		$controller->layoutAction($controller->modelCommentReport('comment'), $params);
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
		$controller->modelArticleUpdate('billet');
	});

$router->add('admin/create', function()
	{
		Controller::layoutAdminCreate();
	});

$router->add('admin/articleCreated.php', function($params)
	{
		$controller = new Controller($params);
		$controller->modelArticleInsert('billet');
	});

$router->add('admin/(\d+)/delete', function($params)
	{
		$controller = new Controller($params);
		$controller->modelArticleDelete('billet');
	});

$router->run();
?>
