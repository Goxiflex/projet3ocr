<?php
Class ArticleManager 
{
	public static function articleCall($table, $id) {
		$database = new Database;
		$article = new Article;
		$article->hydrate($database->getPost($table, $id));	
		return $article;
	}

	public static function articlesCall($table) {
		$database = new Database;
		$articles = array();
		$i=0;
		foreach($database->getAll($table) as $dataArticle) {
			$article[$i] = new Article;
			$article[$i]->hydrate($dataArticle);
			$articles[$i] =  $article[$i];
			$i++;
		}
		return $articles;
	}

	public static function articleUpdate($table){	
		$article = new Article();
		$article->hydrateArray($_POST);
		$database = new Database();
		return $database->updatePost($table, $article->getId(), $article->getAuteur(), $article->getTitre(), $article->getContenu(), date('Y-m-d H:i:s',$article->getDateCreation())); //A voir s'il faut utiliser le getId ou le paramètre envoyé par le contrôleur
	}

	public static function articleInsert($table){
		$article = new Article();
		$article->hydrateArray($_POST);
		$database = new Database();
		return $database->insertPost($table, $article->getAuteur(), $article->getTitre(), $article->getContenu());
	}

	public static function articleDelete($table, $id){
		$database = new Database();
		return $database->deletePost($table, $id);
	}
}
