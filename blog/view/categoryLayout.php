<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>
<h1>Home du blog</h1>
<div>Vous trouverez ici les derniers articles de ce blog</div>
<ul>
	
<?php
foreach($billetList as $post){
	echo '<li><a href="'.$post->id.'"> '. $post->titre .' de l\'auteur '. $post->auteur .' créé le '. $post->dateCreation .'</a></li>';
}
?>

</ul>
<?php
	require 'Adds/footer.php';
?>
