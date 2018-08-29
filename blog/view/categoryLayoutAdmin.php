<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>
<h1>Administration des artucles du blog</h1>
<div>Vous pouvez ici créer, modifier ou supprimer des articles</div>
<ul>
	
<?php
foreach($billetList as $post){
	echo '<li>'. $post->titre .' de l\'auteur '. $post->auteur .' créé le '. $post->dateCreation .'</a>
	<a href="admin/'. $post->id .'/edit"><button>Editer</button></a>
	<a href="admin/'. $post->id .'/delete"><button>Supprimer</button></a></li>';
}
?>
</ul>

<p><a href="<?= PATH; ?>/admin/create"><button>Créer un article </button></a></p>
<?php
	require 'Adds/footer.php';
?>
