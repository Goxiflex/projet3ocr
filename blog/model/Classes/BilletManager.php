<?php
Class BilletManager extends Database {
	protected $postId;
	
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
			return $e->getMessage();
		}
	}

	public function updatePost($table, $postId, $postAuteur, $postTitre, $postContenu, $postDateCreation) 
	{		
		if ($this->getPDO()->query('UPDATE '. $table .' SET auteur="'. $postAuteur .'", titre="'. $postTitre .'", contenu="'. $postContenu .'", dateCreation="'. $postDateCreation .'" WHERE id='. $postId .' '))
		{
			echo 'Article modifié avec succés'; 
		}
		else 
		{
			echo 'Article non modifié'; 
		}
	}

	public function insertPost($table, $postAuteur, $postTitre, $postContenu)
	{
		try 
		{
			$this->getPDO()->query('INSERT INTO '. $table .' SET auteur="'. $postAuteur .'", titre="'. $postTitre .'", contenu="'. $postContenu .'" ');
			echo 'Article créé avec succés'; 
		}
		catch (Exception $e)
		{
			echo 'Article non créé suite à l\'erreur :'.$e->getMessage();  //Certainement à remplacer par un appel de Layout voire un retour au controller / router
		}
	}

	public function deletePost($table, $postId)
	{
		if ($this->getPDO()->query('DELETE FROM '. $table .' WHERE id='. $postId .' '))
		{
			echo 'Article supprimé avec succés'; //Certainement à remplacer par un appel de Layout voire un retour au controller / router
		}
		else 
		{
			echo 'Erreur, article non supprimé';  //Certainement à remplacer par un appel de Layout voire un retour au controller / router
		}
	}	

	public function setPostId($articleId) 
	{
		$this->postId = $articleId;
	}

	
}
?>