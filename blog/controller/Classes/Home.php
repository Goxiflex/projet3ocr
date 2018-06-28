<?php 

class Home {
	public function __construct() {
		require 'Model/model.php';
		require 'View/Adds/header.php';
		require 'View/home.php';
		require 'View/Adds/footer.php';
	}


}