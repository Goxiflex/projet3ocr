
<!DOCTYPE HTML>
<html>
	<head>
	<title>Titre 1 </title>
	<?php require 'Adds/head.php';?>
	</head>
	<?php require 'Adds/header.php';?>
		<section class="container bg-light opacity">
			<h1>Me connecter à l'espace Admin</h1>
			<form method="POST" action="connect">
				<p>
					<label>Email</label>
					<input type="text" name="email" />
				</p>
				<p>
					<label>Mot de passe</label>
					<input type="password" name="password" />
				</p>
				<p>
					<button>Me connecter</button>
				</p>
			<?php 
				if(isset($message)) {
						echo '<p class="text-danger">'. $message .'</p>';
				}
			?>	

			</form>
		
		</section>
		<?php require 'Adds/footer.php';?>
	</body>
</html>