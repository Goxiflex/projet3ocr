<?php
require_once 'controller/Classes/autoloader.php';
autoloader::register();

$database = new Database ('billet');
$post = $database->getPost('1');

$article = New Article();
$article->layout($post);


