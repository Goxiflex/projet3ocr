
<?php 
	require 'Adds/head.php';
	require 'Adds/header.php';
?>	
<section class="container mb-5">
	<h1>Edition des commentaires</h1> 
	<p>de l'article <?php echo '<span class="font-weight-bold">'.$billet->getTitre().'</span> rédigé par <span class="font-weight-bold">'. $billet->getAuteur() .'</span> le <span class="font-weight-bold">'.$billet->getDateCreation() .'</span>';?></p>
	<div class="container">
		<h2 class="mb-2">Commentaire(s) ayant été reporté(s) :</h2>
		<?php
			foreach ($comments as $comment) {
				if ($comment->getReported() === true) {
				?>
				<div class="container row p-2 shadow border mb-4 ">
					<div class="col-9">
						<h3>Auteur : <?php echo $comment->getAuteur(); ?></h3>
						<p>Ecrit le : <?php echo $comment->getDateCreation(); ?>  <span class="badge badge-warning text-right">Ce commentaire a été reporté par un utilisateur</span></p>
						<p>Contenu : <?php echo $comment->getContenu(); ?></p>
					</div>
					
					<div class="col-3 pt-2 text-right">	
						<a href="<?php echo PATH.'/admin/'. $params['0'] .'/deletecomment/'.$comment->getId();  ?>"><button class="btn btn-danger">Supprimer</button></a>
						<a href="<?php echo PATH.'/admin/'. $params['0'] .'/modifycomment/'.$comment->getId();  ?>"><button class="btn btn-warning">Modifier</button></a>
					</div>
					
				</div>	
				<hr/>
				<?php	
				}
			}
		?>
	</div>
	<div class="container">
		<h2>Commentaire(s) n'ayant pas été reporté(s)</h2>
		<?php
			foreach ($comments as $comment) {
				if ($comment->getReported() === false) {
		?>		
					<div class="container row p-2 shadow border mb-4 ">
					<div class="col-9">
						<h3>Auteur : <?php echo $comment->getAuteur(); ?></h3>
						<p>Ecrit le : <?php echo $comment->getDateCreation(); ?></p>
						<p>Contenu : <?php echo $comment->getContenu(); ?></p>
					</div>
					
					<div class="col-3 pt-2 text-right">	
						<a href="<?php echo PATH.'/admin/'. $params['0'] .'/deletecomment/'.$comment->getId();  ?>"><button class="btn btn-danger">Supprimer</button></a>
						<a href="<?php echo PATH.'/admin/'. $params['0'] .'/modifycomment/'.$comment->getId();  ?>"><button class="btn btn-warning">Modifier</button></a>
					</div>
					
				</div>	
				<hr/>
		<?php		
				}
			}
		?>
	</div>	
	<a href="<?php echo PATH.'/admin'?>"><button class="btn btn-secondary">Revenir à la liste des articles</button></a>
</section>	


<?php
	require 'Adds/footer.php';
?>
