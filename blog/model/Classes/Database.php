<?php 

class Database {

	protected $db_name;
	protected $db_user;
	protected $db_pass;
	protected $db_host;
	protected $pdo;
	protected $postId;
	


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

	public function getPost($table, $postId) 
	{
		try
		{
			$req = $this->getPDO()->query('SELECT * FROM '. $table .' WHERE id = '. $postId .'');
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
	


}