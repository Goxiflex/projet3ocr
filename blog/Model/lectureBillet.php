<?php




require_once '../Controller/Classes/autoloader.php';
autoloader::register(); 

require 'Classes/BilletManager.php';

$billetManager = new BilletManager();

$billetManager->dbConnect();
$billetManager->billetRequest();
$billetManager->billetDisplay()

?>
