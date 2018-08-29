<?php 

$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];


// Paramètres URL
define('HOST', 'http://'.$host.'/');
define('ROOT', $root.'/');
define('PATH', HOST.'php/projet3ocr/blog');


// Paramètres DB
define('DBNAME', 'blog_projet3' );
define('DBUSER', 'root');
define('DBPASS', '');
define('DBHOST', 'localhost');



?>