<?php 

class Category {
	public function __construct() {
		require 'view/Adds/head.php';
		require 'view/Adds/header.php';		
	}

	public function layout($articlesList)
	{
		require 'view/categoryLayout.php';
	}


	public function layoutAdmin($articlesList)
	{
		require 'view/categoryLayoutAdmin.php';
	}

	public function __destruct () {
		require 'view/Adds/footer.php';
	}


}