
<!DOCTYPE HTML>
<html>
	<head>
	<title>Titre 1 </title>
	<?php require 'Adds/head.php';?>
	</head>
	<body>
	<?php require 'Adds/header.php';?>
<section class="container">
		<h2><?php echo $message ?></h2> 
			<?php 
				if($context == 'front')
				{
					echo '<a href="'. PATH.'/'.$params[0].'"><button class="btn btn-secondary"> Revenir à l\'article</button></a>';
				}
				elseif ($context == 'admin') 
				{
					echo '<a href="'. PATH.'/'.$context.'"><button class="btn btn-secondary"> Revenir au panneau admin</button></a>';
				}
			?>
			<a href="<?= PATH; ?>"><button class="btn btn-warning"> Revenir à la page d'accueil</button></a>
</section>		
	<?php require 'Adds/footer.php';?>
	</body>
</html>

