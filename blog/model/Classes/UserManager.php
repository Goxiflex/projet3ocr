<?php 

Class UserManager {

	public static function userCall($table, $email) {
		$database = new Database();
		$user = new User();		
		$user->hydrateUser($database->getUser($table, $email));
		var_dump($user);
		return $user;
	}

	public static function userMatch($table) {
		$user = self::userCall($table, $_POST['email']);
		if ($user->getEmail()===$_POST['email'] && $_POST['password'] === $user->getPassword()) {		
			$_SESSION['id'] = $user->getId();
			$_SESSION['email'] = $user->getEmail();
			echo 'connecté';
		}
		else
		{
			echo 'Mauvais identifiant de connexion';
		}	
	}
}