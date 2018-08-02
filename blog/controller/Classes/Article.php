<?php 


class Article {
	public function __construct() {
		require 'view/Adds/head.php';
		require 'View/Adds/header.php';		
	}

	public function layout($billet) {
		require 'View/articleLayout.php';
	}

	public function layoutAdmin($billet) {
		require 'View/articleAdminLayout.php';
	}

	public function layoutCreateAdmin() {
		require 'view/articleCreateAdminLayout.php';
	}

	public function layoutDeleteAdmin() {
		require 'View/articleDeleteAdminLayout.php';
	}	

	public function __destruct () {
		require 'view/Adds/footer.php';
	}


}