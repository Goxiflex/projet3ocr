<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>		<section>
		<h1><?php  echo $billet->getTitre()  ?></h1>
				<div>Ecrit par <?php  echo $billet->getAuteur()  ?> le <?php  echo $billet->getDateCreation()  ?> </div> 
				<p>Contenu : <?php  echo $billet->getContenu()  ?>
				</p>
		
			<h2>Commentaires de cet article : </h2>
			<div>
					<?php
						foreach ($comments as $key => $comment) {
					?>								
						<div>
							<h5> <?php echo $comment->getAuteur()?> </h5>
							<span>Le <?php echo date('d m Y',strtotime($comment->getDateCreation())); ?> </span>
							<p><?php echo $comment->getContenu(); ?> </p>
							<p>
								<form method="POST" action="<?php echo $billet->getId();?>/reportcomment/<?php echo $comment->getId()?>">
									<input type="hidden" name="id" value="<?php echo $comment->getId(); ?>">
									<input type="hidden" name="reported" value="1">
									<button type="submit">Reporter ce commentaire</button>
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
