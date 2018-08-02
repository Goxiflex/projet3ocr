<?php 


class Home {
	public function __construct() {
		require 'view/Adds/head.php';
		require 'View/Adds/header.php';
		require 'View/homeLayout.php';
		
	}

	public function __destruct(){
		require 'View/Adds/footer.php';
	}


}