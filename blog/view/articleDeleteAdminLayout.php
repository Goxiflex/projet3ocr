<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>
<p>Êtes vous sûr de supprimer l'article ?</p>

<form method="post" action="delete">
<div><input type="submit" name="confirm" value="Oui"> <input type="submit" name="confirm" value="Non"></div>
</form>
<?php
	require 'Adds/footer.php';
?>
