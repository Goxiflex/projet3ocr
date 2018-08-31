<?php
Class ArticleManager extends Database {
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

	public function setPostId($articleId) 
	{
		$this->postId = $articleId;
	}
}
?>