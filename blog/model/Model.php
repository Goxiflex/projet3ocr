<?php

class Model {
	private $table;
	private $parameter;
	private $sort;

	/* Enregistrement des requêtes données au Model */
	public function __construct ($table, $parameter, $sort) {
		$this->setTable($table);
		$this->setParameter($parameter);
		$this->setSort($sort);
	}

	public function setTable($table) {
		$this->table = $table;
	}

	public function setParameter($parameter) {
		$this->parameter = $parameter;
	}

	public function setSort($sort) {
		$this->sort = $sort;
	}

	public function getTable() {
		return $this->table;
	}

	public function getParameter() {
		return $this->parameter;
	}

	public function getSort() {
		return $this->sort;
	}

	/* Fin de l'enregistrements */

	/* Article manipulation */

	public function articleCall() {
		$articleManager = new ArticleManager();
		$article = new Article();
		$article->hydrate($articleManager->getPost($this->table, $this->parameter));
		return $article;
	}

	public function articlesCall() {
		$articleManager = new ArticleManager();
		$articles = array();
		$i=0;
		foreach($articleManager->getAll($this->table) as $dataArticle) {
			$article[$i] = new Article;
			$article[$i]->hydrate($dataArticle);
			$articles[$i] =  $article[$i];
			$i++;
		}
		return $articles;
	}

	public function articleUpdate(){	
		$article = new Article();
		$article->hydrateArray($_POST);
		$articlemanager = new ArticleManager();
		return $articlemanager->updatePost($this->table, $article->getId(), $article->getAuteur(), $article->getTitre(), $article->getContenu(), date('Y-m-d H:i:s',$article->getDateCreation())); //A voir s'il faut utiliser le getId ou le paramètre envoyé par le contrôleur
	}

	public function articleInsert(){
		$article = new Article();
		$article->hydrateArray($_POST);
		$articlemanager = new ArticleManager();
		return $articlemanager->insertPost($this->table, $article->getAuteur(), $article->getTitre(), $article->getContenu());
	}

	public function articleDelete(){
		$articleManager = new ArticleManager();
		return $articleManager->deletePost($this->table, $this->parameter);
	}

	/* Comment Manipulation  */

	public function commentsCall() {
		$commentManager = new CommentManager();
		$comments = array();
		$i=0;
		foreach ($commentManager->getComments($this->table, $this->parameter, $this->sort) as $dataComment) {
			$comment[$i] = new Comment;
			$comment[$i]->hydrateComment($dataComment);
			$comments[$i] = $comment[$i];
			$i++;
		}
		return $comments;
	}

	public function commentCall() {
		$comment = new Comment();
		$commentmanager = new CommentManager();
		$comment->hydrateComment($commentmanager->getComment($this->table, $this->parameter));
		return $comment;
	}

	public function commentInsert() {
		$comment = new Comment();
		$comment->hydrateArrayComment($_POST);
		$commentmanager = new CommentManager();
		return $commentmanager->insertComment($this->table, $comment->getAuteur(), $this->parameter, $comment->getContenu());
	}

	public function commentUpdate() {
		$comment = new Comment;
		$comment->hydrateArrayComment($_POST);
		$commentmanager = new CommentManager();
		return $commentmanager->updateComment($this->table, $comment->getAuteur(), $comment->getContenu(), (int)$comment->getReported(), date('Y-m-d H:i:s' ,$comment->getDateCreation()), $comment->getId());
	}

	public function commentReport(){
		$comment = new Comment;
		$comment->hydrateArrayComment($_POST);
		$commentmanager = new CommentManager();
		return $commentmanager->reportComment($this->table, $comment->getReported(), $this->parameter);
	}
	
	public function commentDelete(){
		$commentManager = new CommentManager();
		return $commentManager->deletePost($this->table, $this->parameter);
	}
}