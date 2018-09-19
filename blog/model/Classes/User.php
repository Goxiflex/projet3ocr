<?php 
Class User {
	private $id;
	private $email;
	private $password;

	public function setId($id) {
		$this->id = $id;
	}

	public function setEmail($email) {
		$this->email =$email;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getId() {
		return $this->id;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function hydrateUser($data) {
		 if (isset($data->id))
			 {
				  $this->setId($data->id);
			 }

		 if (isset($data->email))
			 {
				  $this->setEmail($data->email);
			 }	 

		 if (isset($data->password))
			 {
				  $this->setPassword($data->password);
			 }	 
	}

	public function hydrateArrayUser($data) {		
			 if (isset($data['id']))
			 {
				  $this->setId($data['id']);
			 }

			 if (isset($data['email']))
			 {
				  $this->setEmail($data['email']);
			 }
			  
			 if (isset($data['password']))
			 {
				  $this->setPassword($data['password']);
			 }
	}
}