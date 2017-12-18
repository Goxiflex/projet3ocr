<?php

require 'classes/connexionBdd.php';
require 'classes/billet.php';
require 'classes/billetManager.php';

$form = new billet;

?>

<form method="POST" cible="#">
<?php /* Formulaire de création de l'article */
	echo $form->input('titre');
	echo $form->input('auteur');
	echo $form->input('metadesc');
	echo $form->input('metakey');
	echo $form->textarea('contenu');
	echo $form->submit();
?>
</form>

<?php	
	
var_dump($form);
var_dump($_POST);

/* Vérification de l'existence de POST puis affiche d'un message d'invitation à écrire ou de bonne complétion */

if($_POST)   /* Pour Stéphane : Impossible de faire fonctionner un isset sur la condition */
	{
	$form->hydrate($_POST);


	$articleManager = new billetManager($bdd);
	$articleManager->add($form);
	echo 'Les champs ont été correctement remplis';
	var_dump($form);
	}
	
else
	{
		echo 'Veuillez remplir les champs';
		
	}
?>
