<?php

/*  Classe billet */ 		

class Billet
{
  private $id;
  private $titre;
  private $auteur;
  private $dateCreation;
  private $dateReform;
  private $contenu;
  
  /*  Getters */
  
		 public function getId()
		 {
			  return $this->id;
		 }
		  
		 public function getTitre()
		 {
			  return $this->titre;
		 }
		  
		 public function getAuteur()
		 {
			  return $this->auteur;
		 }
		  
		 public function getDateCreation()
		 {
			  return $this->dateCreation;
		 }

		 public function getDateReform()
		 {	 	  
		 	  $this->dateReform = strtotime($this->getDateCreation());
		 	  $this->dateReform = date('Y-m-d', $this->dateReform);
		 	  return $this->dateReform;
		 }

		  public function getDateInt()
		 {	 	  
		 	  $dateInt = strtotime($this->getDateCreation());
		 	  return $dateInt;
		 }
		  
		 public function getContenu()
		 {
			  return $this->contenu;
		 }
  
 /*  Setters */  
  
		 public function setId($id)  // A voir si cette fonction a un intérêt, sachant que l'ID est automatique incrémanté par la BDD
		 {
			 $id = (int) $id;
			  
			 if ($id > 0)
			 {
				  $this->id = $id;
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
				  $this->titre = $titre;
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
				  $this->auteur = $auteur;
			 }  
			 else
			 {
				  echo 'l\'auteur n\'est pas valide';
			 }
		 }
		  
		 public function setDateCreation($dateCreation) // A voir si cette fonction a un intérêt étant donné qu'il y a un Current_TimeStamp. Peut-être pour antidater les articles.
		 {		  
				$this->dateCreation = $dateCreation;
		 }
		  
		 public function setContenu($contenu) 
		 {		  
			  if (is_string ($contenu))
			  {
				  $this->contenu = $contenu;
			  }  
			  else
			  {
				  echo 'le contenu n\'est pas valide';
			  }
		 }
		  
		  /*  Hydratation */

		 public function hydrate ($donnees)
		 {
			 if (isset($donnees->id))
			 {
				  $this->setId($donnees->id);
			 }
			  
			 if (isset($donnees->titre))
			 {
				  $this->setTitre($donnees->titre);
			 }
			  
			 if (isset($donnees->auteur))
			 {
				  $this->setAuteur($donnees->auteur);
			 }
			  			  
			 if (isset($donnees->dateCreation))
			 {
				  $this->setDateCreation($donnees->dateCreation);
			 }
			  
			 if (isset($donnees->contenu))
			 {
				  $this->setContenu($donnees->contenu);
			 }		  
		 }	

		  public function hydrateArray (array $donnees)
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


