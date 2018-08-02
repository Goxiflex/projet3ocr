<?php 

class Database {

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;
	private $postId;


	public function __construct($db_name, $db_user='root', $db_pass='', $db_host = 'localhost') {
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
	}

	private function getPDO(){
		if($this->pdo === null) {
		$pdo = new PDO('mysql:host=localhost;dbname=blog_projet3;charset=utf8', 'root',  '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$this->pdo = $pdo;	
		}

		return $this->pdo;
	}

	public function getAll(){
		$req = $this->getPDO()->query('SELECT * FROM billet');
		$datas = $req->fetchAll(PDO::FETCH_OBJ);

		return $datas;
	}

	public function getPost($postId) {
		$req = $this->getPDO()->query('SELECT * FROM billet WHERE id = '. $postId .'');
		$datasPost = $req->fetch(PDO::FETCH_OBJ);
		return $datasPost;
	}

	public function updatePost($postId, $postAuteur, $postTitre, $postContenu, $postDateCreation) {
		/* $req = $this->getPDO()->query('UPDATE billet SET auteur="'. $postAuteur .'", titre="'. $postTitre .'", contenu="'. $postContenu .'", dateCreation="'. $postDateCreation .'" WHERE id='. $postId .' '); */
		if ($this->getPDO()->query('UPDATE billet SET auteur="'. $postAuteur .'", titre="'. $postTitre .'", contenu="'. $postContenu .'", dateCreation="'. $postDateCreation .'" WHERE id='. $postId .' '))
		{
			echo 'Article modifié avec succés'; //Certainement à remplacer par un appel de Layout voire un retour au controller / router
		}
		else 
		{
			echo 'Article non modifié';  //Certainement à remplacer par un appel de Layout voire un retour au controller / router
		}
	}

	public function insertPost($postAuteur, $postTitre, $postContenu)
	{
		if ($this->getPDO()->query('INSERT INTO billet SET auteur="'. $postAuteur .'", titre="'. $postTitre .'", contenu="'. $postContenu .'" '))
		{
			echo 'Article créé avec succés'; //Certainement à remplacer par un appel de Layout voire un retour au controller / router
		}
		else 
		{
			echo 'Article non créé';  //Certainement à remplacer par un appel de Layout voire un retour au controller / router
		}
	}

	public function deletePost($postId)
	{
		if ($this->getPDO()->query('DELETE FROM billet WHERE id='. $postId .' '))
		{
			echo 'Article supprimé avec succés'; //Certainement à remplacer par un appel de Layout voire un retour au controller / router
		}
		else 
		{
			echo 'Erreur, article non supprimé';  //Certainement à remplacer par un appel de Layout voire un retour au controller / router
		}
	}	

	public function setPostId($articleId) {
		$this->postId = $articleId;
	}

}