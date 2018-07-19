<?php 

class Category {
	public function __construct() {
		require 'view/Adds/head.php';
		require 'view/Adds/header.php';
		require 'view/categoryLayout.php';
		
	}

	public function __destruct () {
		require 'view/Adds/footer.php';
	}


}