<?php

require_once 'controller/Classes/autoloader.php';
autoloader::register();


$database = new Database ('billet');
$category = New Category ();
$category->layout($database->getAll());


