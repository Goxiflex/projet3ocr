<?php 

Class UserManager {

	public static function userCall($table, $email) {
		$database = new Database();
		$user = new User();		
		$user->hydrateUser($database->getUser($table, $email));
		return $user;
	}

	public static function userMatch($table) {
		$gump = new Gump();
		$gump->validation_rules(array(
			'password'    => 'required|max_len,100|min_len,6',
			'email'       => 'required|valid_email'
		));

		$_POST = $gump->sanitize($_POST);
		$validated_data = $gump->run($_POST);

		if($validated_data === false) {
		echo $gump->get_readable_errors(true);
		} 
		else {
			$user = self::userCall($table, $_POST['email']);
			if ($user->getEmail()===$_POST['email'] && $_POST['password'] === $user->getPassword()) {		
				$_SESSION['id'] = $user->getId();
				$_SESSION['email'] = $user->getEmail();
				$_SESSION['logged'] = true;
				header('Location: http://localhost/php/projet3ocr/blog/admin');
				return 'Vous êtes connecté';
			}
			else
			{
				return 'Mauvais identifiant de connexion';
			}	
		}

		
	}
}