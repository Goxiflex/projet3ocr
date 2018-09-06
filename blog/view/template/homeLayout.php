
<!DOCTYPE HTML>
<html>
	<head>
	<title>Titre 1 </title>
	<?php require 'Adds/head.php';?>
	</head>
	<body>
	<?php require 'Adds/header.php';?>

		<section class="container">
			<h1>Bienvenue sur le blog de Jean Forteroche</h1>
			<div>Vous trouverez ici les derniers articles de ce blog</div>
		
			<?php
			foreach($articles as $article)
			{
			?>	
				<div class="container">
					<h3 class="row"><?php echo $article->getTitre() ?></h3> 
					<p class="row font-weight-bold">De l'auteur <?php echo $article->getAuteur() ?> créé le <?php echo date('d/m/Y', $article->getDateCreation()) ?></p>
					<div class="row">
						<p class="col-8">
						<?php echo substr(strip_tags($article->getContenu()), '0', '200').'<a href="'.PATH.'/'.$article->getId().'">[...] lire la suite</a>'; ?>
						</p>

					</div>
					<hr/>
				</div>

			<?php
			}
			?>
		</section>
		<?php require 'Adds/footer.php';?>
	</body>
</html>

