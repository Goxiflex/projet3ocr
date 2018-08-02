<?php
require_once 'controller/Classes/autoloader.php';
autoloader::register();

$database = new Database ('billet');
$post = $database->getPost($params['1']);

var_dump($post);
if ($post == true)
{
			if (!isset($_POST['confirm']))
			{
					$article = New Article();
					$article->layoutDeleteAdmin();
			}
			elseif ($_POST['confirm'] === 'Oui') 
			{
				$database->deletePost($post->id);
			}
			elseif ($_POST['confirm'] === 'Non')
			{
				echo '<p>il n\'est pas supprimé</p>
						<p><a href="'.PATH.'/admin">Revenir dans la liste des articles</a></p>';
			}
			else 
			{
				echo 'Erreur';
			}
}
else 
{
			require 'View/404.php';
}