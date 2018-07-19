<?php 

class Article {
	public function __construct() {
		require 'view/Adds/head.php';
		require 'View/Adds/header.php';
		
	}

	public function layout($post) {
		require 'View/articleLayout.php';
	}	

	public function __destruct () {
		require 'view/Adds/footer.php';
	}


}