<?php

require_once 'controller/Classes/autoloader.php';
autoloader::register();

$article = new Article();
$article->layoutCreateAdmin();