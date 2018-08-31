<?php 

Class Post {
  protected $id;
  protected $auteur;
  protected $dateCreation;
  protected $contenu;
  
		 public function getId()
		 {
			  return $this->id;
		 }	  

		 public function getAuteur()
		 {
			  return $this->auteur;
		 }
		  
		 public function getDateCreation()
		 {
			  return $this->dateCreation;
		 }
		  
		 public function getContenu()
		 {
			  return $this->contenu;
		 }
  
		 public function setId($id)
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
		  
		 public function setDateCreation($dateCreation)
		 {		
		 		if (!is_int($this->dateCreation))
		 		{ 
					$this->dateCreation = strtotime($dateCreation);
				}
				else
				{
					$this->dateCreation = $dateCreation;
				}
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
}
