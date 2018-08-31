<?php
Class Comment extends Post 
{
	protected $billetId;
	protected $reported;

	public function getBilletId()
		 {
			  return $this->billetId;
		 }

	public function getReported()
		 {
			  return (bool) $this->reported;
		 }	
		  
	public function setBilletId($billetId)  // A voir si cette fonction a un intérêt, sachant que l'ID est automatique incrémanté par la BDD
		 {
			 $billetId = (int) $billetId;
			  
			 if ($billetId > 0)
			 {
				  $this->billetId = $billetId;
			 }  
			 else
			 {
				  echo 'l\'id n\'est pas valide';
			 }
		 }

	public function setReported($reported)	
		{
			$this->reported = (bool) $reported;
		}

	public function hydrateComment($donnees)	
		{
			 if (isset($donnees->id))
			 {
				  $this->setId($donnees->id);
			 }

			 if (isset($donnees->billetid))
			 {
				  $this->setBilletId($donnees->billetid);
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

			 if (isset($donnees->reported))	  
			 {
			 	  $this->setReported($donnees->reported);
			 }
		}	

	public function hydrateArrayComment(array $donnees)	
		{
			 if (isset($donnees['id']))
			 {
				  $this->setId($donnees['id']);
			 }

			 if (isset($donnees['billetid']))
			 {
				  $this->setBilletId($donnees['billetid']);
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

			 if (isset($donnees['reported']))	  
			 {
			 	  $this->setReported($donnees['reported']);
			 }
		}
}