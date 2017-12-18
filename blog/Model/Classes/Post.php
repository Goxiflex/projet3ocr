<?php

class Post

{
			  /* Formulaire de création */
			public function input($inputName)
			{
				echo '<p>'. ucfirst($inputName) .'<br /><input name="'. $inputName .'" type="text"	/></p>';
			}
			
			public function textarea($textareaName)
			{	
				echo '<p>'. ucfirst($textareaName) .'<br /><textarea name="'. $textareaName .'" ></textarea></p>';
			}
			
			public function submit()
			{
				echo '<p><button type="submit"> Envoyer</button></p>';
			}
		  

}