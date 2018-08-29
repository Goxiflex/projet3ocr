<?php
Class CommentManager extends Database 
{
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

	public function getAllComments($table, $billetId) 
	{
		/* Fonction pour afficher tous les commentaires */
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
}
