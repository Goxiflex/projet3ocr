<?php 

$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];


/* Definition du HOST et du ROOT */

define('HOST', 'http://'.$host.'/');
define('ROOT', $root.'/');

echo '<pre>'. print_r($_SERVER) .'</pre>';

echo HOST.'<br />';
echo ROOT.'<br />';

define('CONTROLLER', HOST.'php/projet3ocr/blog/controller/');
define('MODEL', HOST.'php/projet3ocr/blog/model/');
define('VIEW', HOST.'php/projet3ocr/blog/view/');

echo CONTROLLER.'<br />';
echo MODEL.'<br />';
echo VIEW.'<br />';


?>