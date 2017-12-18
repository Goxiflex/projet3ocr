<?php

/*  Classe billet */ 		

class Billet extends Post
{
  private $_id;
  private $_titre;
  private $_auteur;
  private $_metadesc;
  private $_metakey;
  private $_dateCreation;
  private $_contenu;
  
  /*  Getters */
  
		  public function getId()
		  {
			  return $this->_id;
		  }
		  
		  public function getTitre()
		  {
			  return $this->_titre;
		  }
		  
		  public function getAuteur()
		  {
			  return $this->_auteur;
		  }
		  
		  public function getMetadesc()
		  {
			  return $this->_metadesc;
		  }
		  
		  public function getMetakey()
		  {
			  return $this->_metakey;
		  }
		  
		  public function getDateCreation()
		  {
			  return $this->_dateCreation;
		  }
		  
		  public function getContenu()
		  {
			  return $this->_contenu;
		  }
  
 /*  Setters */  
  
		  public function setId($id)  // A voir si cette fonction a un intérêt, sachant que l'ID est automatique incrémanté par la BDD
		  {
			  $id = (int) $id;
			  
			  if ($id > 0)
			  {
				  $this->_id = $id;
			  }  
			  else
			  {
				  echo 'l\'id n\'est pas valide';
			  }
		  }
		  
		  public function setTitre($titre) 
		  {		  
			  if (is_string ($titre))
			  {
				  $this->_titre = $titre;
			  }  
			  else
			  {
				  echo 'le titre n\'est pas valide';
			  }
		  }
		  
		  
		   public function setAuteur($auteur) 
		  {		  
			  if (is_string ($auteur))
			  {
				  $this->_auteur = $auteur;
			  }  
			  else
			  {
				  echo 'l\'auteur n\'est pas valide';
			  }
		  }
		  
			public function setMetadesc($metadesc) 
		  {		  
			  if (is_string ($metadesc))
			  {
				  $this->_metadesc = $metadesc;
			  }  
			  else
			  {
				  echo 'la metadesc n\'est pas valide';
			  }
		  }
		  
		  	public function setMetakey($metakey) 
		  {		  
			  if (is_string ($metakey))
			  {
				  $this->_metakey = $metakey;
			  }  
			  else
			  {
				  echo 'la metadesc n\'est pas valide';
			  }
		  }
		  
		  	public function setDateCreation($dateCreation) // A voir si cette fonction a un intérêt étant donné qu'il y a un Current_TimeStamp. Peut-être pour antidater les articles.
		  {		  
				$this->_dateCreation = $dateCreation;
		  }
		  
		  	public function setContenu($contenu) 
		  {		  
			  if (is_string ($contenu))
			  {
				  $this->_contenu = $contenu;
			  }  
			  else
			  {
				  echo 'le contenu n\'est pas valide';
			  }
		  }
		  
		  /*  Hydratation */
		  
		  Public function hydrate (array $donnees)
		  {
			  if (isset($donnees['id']))
			  {
				  $this->setId($donnees['id']);
			  }
			  
			   if (isset($donnees['titre']))
			  {
				  $this->setTitre($donnees['titre']);
			  }
			  
			   if (isset($donnees['auteur']))
			  {
				  $this->setAuteur($donnees['auteur']);
			  }
			  
			   if (isset($donnees['metadesc']))
			  {
				  $this->setMetadesc($donnees['metadesc']);
			  }
			  
			   if (isset($donnees['metakey']))
			  {
				  $this->setMetakey($donnees['metakey']);
			  }
			  
			   if (isset($donnees['dateCreation']))
			  {
				  $this->setDateCreation($donnees['dateCreation']);
			  }
			  
			   if (isset($donnees['contenu']))
			  {
				  $this->setContenu($donnees['contenu']);
			  }		  
		  }
		  

			
			/*  Fin de la classe billet */
}

?>
