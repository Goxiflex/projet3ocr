<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>
<section class="container">

<p>Êtes vous sûr de supprimer l'article ?</p>

<form method="post" action="delete">
<div><input class="btn btn-success" type="submit" name="confirm" value="Oui"> <input class="btn btn-danger" type="submit" name="confirm" value="Non"></div>
</form>

</section>
<?php
	require 'Adds/footer.php';
?>
