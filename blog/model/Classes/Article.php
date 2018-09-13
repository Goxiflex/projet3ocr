<?php	

class Article extends Post
{
	protected $titre;

	public function getTitre()
		 {
			  return $this->titre;
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
		   
}


