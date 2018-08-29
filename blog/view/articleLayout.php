<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>		
		<section class="container">
		<h1><?php  echo $billet->getTitre()  ?></h1>
				<p class="font-weight-bold">Ecrit par <?php  echo $billet->getAuteur()  ?> le <?php  echo $billet->getDateCreation()  ?> </p> 
				<p>Contenu : <?php  echo $billet->getContenu()  ?>
				</p>
		
			<h2>Commentaires de cet article : </h2>
			<div class="col-10">
					<?php
						foreach ($comments as $key => $comment) {
					?>								
						<div>
							<h5> <?php echo $comment->getAuteur()?> </h5>
							<p><span class="font-weight-bold">Le <?php echo date('d/m/Y',strtotime($comment->getDateCreation())); ?>
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
								<form method="POST" action="<?php echo $billet->getId();?>/reportcomment/<?php echo $comment->getId()?>">
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
					<form method="POST" action="<?php echo $billet->getId(); ?>/commentpost">
						<p>
							<input type="hidden" name="billetid" value="<?php echo $billet->getId();?>">
							<label for="Auteur">Votre nom :</label><br/>
							<input type="text" name="auteur">
						</p>
						<p>	
							<label for="Auteur">Votre commentaire :</label><br/>
							<textarea type="text" name="contenu"></textarea>
						</p>
						<p>
							<button type="submit">Publier</button>
						</p>
					</form>	

				<div><a href="<?= PATH; ?>"> Revenir à la page d'accueil</a></div>
		</section>		
<?php
	require 'Adds/footer.php';
?>
