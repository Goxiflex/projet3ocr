<?php 

class Database {

	protected $db_name;
	protected $db_user;
	protected $db_pass;
	protected $db_host;
	protected $pdo;

	public function __construct() 
	{
		$this->db_name = DBNAME;
		$this->db_user = DBUSER;
		$this->db_pass = DBPASS;
		$this->db_host = DBHOST;
	}	

	protected function getPDO()
	{
		if($this->pdo === null) {
		$pdo = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.';charset=utf8', ''.$this->db_user.'',  ''.$this->db_pass.'', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$this->pdo = $pdo;	
		}

		return $this->pdo;
	}

	
	public function getAll($table)
	{
		try 
		{
			$req = $this->getPDO()->query('SELECT * FROM '. $table .'');
			$datas = $req->fetchAll(PDO::FETCH_OBJ);
			return $datas;
		}
		catch (Exception $e) 
		{
			return $e->getMessage();
		}	
	}

	public function getPost($table, $id) 
	{
		try
		{
			$req = $this->getPDO()->query('SELECT * FROM '. $table .' WHERE id = '. $id .'');
			$datasPost = $req->fetch(PDO::FETCH_OBJ);
			return $datasPost;
		}
		catch (Exception $e)
		{
			return 'Article non affiché suite à l\'erreur :'. $e->getMessage();
		}
	}

		public function deletePost($table, $postId)
	{
		try 
		{
			$this->getPDO()->query('DELETE FROM '. $table .' WHERE id='. $postId .' ');
			return 'Supprimé avec succés';
		}
		catch (Exception $e)
		{
			return 'Erreur, non supprimé suite à l\'erreur: '.$e->getMessage(); 
		}
	}	
	
	/* Comment functions */

		public function insertComment($table, $commentAuteur, $billetId, $commentContent)
	{
		try 
		{
			$this->getPDO()->query('INSERT INTO '. $table .' SET auteur="'. $commentAuteur .'", billetid="'. $billetId .'", contenu="'. $commentContent .'" ');
			return 'Commentaire posté avec succés'; 
		}
		catch (Exception $e)
		{
			return 'Commentaire non créé suite à l\'erreur :'.$e->getMessage(); 
		}
	}

	public function getComment($table, $id) // à suppr (utiliser getPost)
	{
		try
		{
			$req = $this->getPDO()->query('SELECT * FROM '. $table .' WHERE id = '. $id);
			$datasComment = $req->fetch(PDO::FETCH_OBJ);
			return $datasComment;
		}
		catch (Exception $e)
		{
			return 'Commentaire non affiché suite à l\'erreur :'. $e->getMessage();
		}
	}

	public function getComments($table, $billetId, $order) 
	{
		try
		{
			$req = $this->getPDO()->query('SELECT * FROM '. $table .' WHERE billetid = '. $billetId .' ORDER BY '. $order .' ASC');
			$datasComments = $req->fetchAll(PDO::FETCH_OBJ);
			return $datasComments;
		}
		catch (Exception $e)
		{
			return 'Commentaire non affiché suite à l\'erreur :'. $e->getMessage();
		}
	}

	public function reportComment($table, $reported, $id)
	{
		try
		{
			$this->getPDO()->query('UPDATE '. $table .' SET reported='. $reported .'  WHERE id = '. $id .' ');
			return 'article reporté avec succés';
		}
		catch (Exception $e)
		{
			return 'article non reporté suite à l\'erreur :'. $e->getMessage();
		}
	}

	public function updateComment($table, $auteur, $contenu, $reported, $dateCreation, $id)
	{
		try
		{
			$this->getPDO()->query('UPDATE '. $table .' SET auteur="'. $auteur .'", contenu="'. $contenu .'", reported="'. $reported .'", dateCreation="'.  $dateCreation .'" WHERE id="'. $id .'"');
			return 'article modifié avec succés';
		}
		catch (Exception $e)
		{
			return 'article non modifié suite à l\'erreur :'. $e->getMessage();
		}
	}

	/* Article functions */

		public function updatePost($table, $postId, $postAuteur, $postTitre, $postContenu, $postDateCreation) 
	{		
		try 
		{
			$this->getPDO()->query('UPDATE '. $table .' SET auteur="'. $postAuteur .'", titre="'. $postTitre .'", contenu="'. $postContenu .'", dateCreation="'. $postDateCreation .'" WHERE id='. $postId .' ');

			return 'Article modifié avec succés'; 
		}
		catch (Exception $e) 
		{
			return 'Article non modifié suite à l\'erreur :'.$e->getMessage(); 
		}
	}

	public function insertPost($table, $postAuteur, $postTitre, $postContenu)
	{
		try 
		{
			$this->getPDO()->query('INSERT INTO '. $table .' SET auteur="'. $postAuteur .'", titre="'. $postTitre .'", contenu="'. $postContenu .'" ');
			return 'Article créé avec succés'; 
		}
		catch (Exception $e)
		{
			return 'Article non créé suite à l\'erreur :'.$e->getMessage();
		}
	}

}