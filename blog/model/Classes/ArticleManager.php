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
		$gump = new Gump;
		$gump->validation_rules(array(
			'auteur'    => 'required|max_len,100|min_len,6',
			'titre' => 'required|max_len,100|min_len,6' ,
			'contenu'       => 'required|max_len,3000|min_len,2'
		));
		$_POST = $gump->sanitize($_POST);
		$validated_data = $gump->run($_POST);

		if($validated_data === false) {
		return $gump->get_readable_errors(true);
		} 
		else {
		$article = new Article();
		$article->hydrateArray($_POST);
		$database = new Database();
		return $database->updatePost($table, $article->getId(), $article->getAuteur(), $article->getTitre(), $article->getContenu(), date('Y-m-d H:i:s',$article->getDateCreation())); 
		}
	}

	public static function articleInsert($table){
		$gump = new Gump;
		$gump->validation_rules(array(
			'auteur'    => 'required|max_len,100|min_len,6',
			'titre' => 'required|max_len,100|min_len,6' ,
			'contenu'       => 'required|max_len,3000|min_len,2'
		));
		$_POST = $gump->sanitize($_POST);
		$validated_data = $gump->run($_POST);

		if($validated_data === false) {
		return $gump->get_readable_errors(true);
		} 
		else {
		$article = new Article();
		$article->hydrateArray($_POST);
		$database = new Database();
		return $database->insertPost($table, $article->getAuteur(), $article->getTitre(), $article->getContenu());
		}
	}

	public static function articleDelete($table, $id){
		$database = new Database();
		return $database->deletePost($table, $id);
	}
}
