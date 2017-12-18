<?php 

class BilletManager extends Manager
{
	private $_bdd;
	
	/*  Constructeur */
	
			public function __construct($bdd)
			{
				$this->setBdd($bdd);
			}
			
	/*  Setter BDD */
			
			public function setBdd($bdd)
			{
				$this->_bdd = $bdd;
			}
	
	/* Fonctions potentielles du manager */
	
			/* Ajout d'un billet dans la base de données */
			public function add(billet $article)
			{
				$querryAdd = $this->_bdd->prepare('INSERT INTO billet (titre, auteur, metadesc, metakey, contenu) VALUES (:titre, :auteur, :metadesc, :metakey, :contenu)');
				
				$querryAdd->bindValue(':titre', $article->getTitre());
				$querryAdd->bindValue(':auteur', $article->getAuteur());
				$querryAdd->bindValue(':metadesc', $article->getMetadesc());
				$querryAdd->bindValue(':metakey', $article->getMetakey());
				$querryAdd->bindValue(':contenu', $article->getContenu());
				
				$querryAdd->execute();
			}
			
			/* Suppression d'un billet dans la base de données */
			public function delete(billet $article)
			{
				$this->_bdd->exec('DELETE FROM billet WHERE id =' .$article->getId());
			}
			
			public function getPost($id)
			{
				
			}
			
			public function update(billet $article)
			{
				
			}
			
	
	
	
	/* Fin du Manager */
}
