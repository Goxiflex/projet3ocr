<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>
<div class="container">
<h1>Bienvenue sur le blog de Jean Forteroche</h1>
<div>Vous trouverez ici les derniers articles de ce blog</div>

	
<?php
foreach($billetList as $post)
{
?>	
	<div class="container">
		<h3 class="row"><?php echo $post->titre ?></h3> 
		<p class="row font-weight-bold">De l'auteur <?php echo $post->auteur ?> créé le <?php echo $post->dateCreation ?></p>
		<div class="row">
			<p class="col-8">
			<?php echo substr($post->contenu, '0', '200').'<a href="'.PATH.'/'.$post->id.'">[...] lire la suite</a>'; ?>
			</p>

		</div>
		<hr/>
	</div>

<?php
}
?>

</div>
<?php
	require 'Adds/footer.php';
?>
