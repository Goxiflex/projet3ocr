	<header class="container-fluid bg-info mb-3">
		<nav  class="container navbar navbar-expand-lg navbar-light  ">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link text-white" href="<?php echo PATH; ?>">Page d'accueil</a></li>
					<li class="nav-item"><a class="nav-link text-white" href="<?php echo PATH; ?>/admin">Page d'administration</a></li>
				<?php
					if(isset($_SESSION['logged']) && $_SESSION['logged']=== TRUE) {
						echo '<li class="nav-item"><a class="nav-link text-white" href=" '.PATH.'/disconnect">Deconnexion</a></li>';
					}
				?>
				</ul>	
		</nav>	
	</header>