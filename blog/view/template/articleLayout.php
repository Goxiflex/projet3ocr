
<!DOCTYPE HTML>
<html>
	<head>
	<title>Titre 1 </title>
	<?php require 'Adds/head.php';?>
	</head>
	<body>
	<?php require 'Adds/header.php';?>
		<section class="container">
		<h1><?php  echo $article->getTitre()  ?></h1>
				<p class="font-weight-bold">Ecrit par <?php  echo $article->getAuteur()  ?> le <?php  echo date('d/m/Y', $article->getDateCreation())  ?> </p> 
				<p class="shadow-sm p-2">Contenu : <?php  echo $article->getContenu()  ?>
				</p>
		
			<h2>Commentaires de cet article : </h2>
			<div class="col-10 border border-light p-2">
					<?php
						foreach ($comments as $key => $comment) {
					?>								
						<div>
							<h5> <?php echo $comment->getAuteur()?> </h5>
							<p><span class="font-weight-bold">Le <?php echo date('d/m/Y',$comment->getDateCreation()); ?>
								<?php
									$reported = $comment->getReported();
									if ($reported === true)
									{
										echo'<span class="badge badge-warning text-right">Ce commentaire a été reporté, il est cours de modération</span>';
									}
								?>
							</span></p>
							<p class="ml-3"><?php echo $comment->getContenu(); ?> </p>
							<p>
								<form method="POST" action="<?php echo $article->getId();?>/reportcomment/<?php echo $comment->getId()?>">
									<input type="hidden" name="id" value="<?php echo $comment->getId(); ?>">
									<input type="hidden" name="reported" value="1">

								<?php
									if ($reported === false) 
									{	
									echo '<button class="btn btn-sm btn-outline-danger" type="submit">Reporter ce commentaire</button>';
									}
								?>	

								</form>
							</p>
						</div>							
					<?php
						}
					?>	
			</div>
				<h3>Poster un commentaire :</h3>
					<form method="POST" action="<?php echo $article->getId(); ?>/commentpost">
						<p class="col-6">
							<input type="hidden" name="billetid" value="<?php echo $article->getId();?>">
							<label for="Auteur">Votre nom :</label><br/>
							<input type="text" class="form-control" name="auteur">
						</p>
						<p class="col-6">	
							<label for="Auteur">Votre commentaire :</label><br/>
							<textarea type="text" class="form-control" name="contenu"></textarea>
						</p>
						<p>
							<button class="btn btn-success" type="submit">Publier</button>
						</p>
					</form>	

				<div><a href="<?= PATH; ?>"> Revenir à la page d'accueil</a></div>
		</section>		
<?php require 'Adds/footer.php';?>
	</body>
</html>
