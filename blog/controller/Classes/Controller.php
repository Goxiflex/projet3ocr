<?php 

class Controller {
	private $parameters = array();


	public function __construct($params) {
		$this->setParameters($params);
	}

	public function setParameters($params) {
		$this->parameters = $params;
	}

	public function getParameters() {
		return $this->parameters;
	}

	public function modelArticleCall($table) {
		$articlemanager = new ArticleManager();
		$article = new Article();
		$article->hydrate($articlemanager->getPost($table, $this->parameters[0]));
		return $article;
	}

	public function modelArticlesListCall($table) {
		$articlemanager = new ArticleManager();
		$articlesList = $articlemanager->getAll($table);
		return $articlesList;
	}

	public function modelArticleInsert($table){
		$article = new Article();
		$article->hydrateArray($_POST);
		$articlemanager = new ArticleManager();
		return $articlemanager->insertPost($table, $article->getAuteur(), $article->getTitre(), $article->getContenu());
	}

	public function modelArticleUpdate($table){	
		$article = new Article();
		$article->hydrateArray($_POST);
		$articlemanager = new ArticleManager();
		return $articlemanager->updatePost($table, $article->getId(), $article->getAuteur(), $article->getTitre(), $article->getContenu(), date('Y-m-d H:i:s',$article->getDateCreation()));
	}

	public function modelArticleDelete($table){
		$articlemanager = new ArticleManager();
		try
		{
			$articlemanager->getPost($table, $this->parameters[0]);
				if (!isset($_POST['confirm']))
					{
						return file_get_contents('view\articleDeleteLayout.php');
					}
				elseif ($_POST['confirm'] === 'Oui') 
					{
						return $articlemanager->deletePost($table, $post->id);
					}
				elseif ($_POST['confirm'] === 'Non')
					{
						return 'Article non supprimé';
					}
				else 
					{
						return 'Erreur';
					}
		}
		catch (Exception $e) 
		{
					require 'View/404.php';
		}
	}

	public function modelCommentsingleCall($table) {
		$comment = new Comment();
		$commentmanager = new CommentManager();
		$comment->hydrateComment($commentmanager->getComment($table, $this->parameters[1]));
		return $comment;
	}

	public function modelCommentInsert($table) {
		$comment = new Comment();
		$comment->hydrateArrayComment($_POST);
		$commentmanager = new CommentManager();
		return $commentmanager->insertComment($table, $comment->getAuteur(), $comment->getBilletId(), $comment->getContenu());
	}

	public function modelCommentCall($table, $sort) {
		$comments = array();
		$commentmanager = new CommentManager();
		$i=0;
		foreach ($commentmanager->getComments($table, $this->parameters[0], $sort) as $datacomment) {
			$comment[$i] = new Comment;
			$comment[$i]->hydrateComment($datacomment);
			$comments[$i] = $comment[$i];
			$i++;
		}
		return $comments;
	}

	public function modelCommentReport($table){
		$comment = new Comment;
		$comment->hydrateArrayComment($_POST);
		$commentmanager = new CommentManager();
		return $commentmanager->reportComment($table, $comment->getReported(), $comment->getId());
	}

	public function modelCommentUpdate($table) {

		$comment = new Comment;
		$comment->hydrateArrayComment($_POST);
		$commentmanager = new CommentManager();
		return $commentmanager->updateComment($table, $comment->getAuteur(), $comment->getContenu(), (int)$comment->getReported(), date('Y-m-d H:i:s' ,$comment->getDateCreation()), $comment->getId());

	}

	public function modelCommentDelete($table){
		$commentmanager = new CommentManager();	
		try
		{
			$commentmanager->getComment($table, $this->parameters[1]);
				if (!isset($_POST['confirm']))
					{
						return file_get_contents('view\commentDeleteLayout.php');
					}
				elseif ($_POST['confirm'] === 'Oui') 
					{
						return $commentmanager->deletePost($table, $this->parameters[1]);
					}
				elseif ($_POST['confirm'] === 'Non')
					{
						return 'Commentaire non supprimé';
					}
				else 
					{
						return 'Erreur';
					}
		}
		catch (Exception $e) 
		{
				return 'Une erreur est survenu : '. $e->getMessage() ;
		}
	}

	public function layoutArticle($article, $comments) {
		require 'view/articleLayout.php';
	}

	public function layoutHome($articlesList) {
		require 'view/homeLayout.php';
	}

	public function layoutAdmin($articlesList){
		require 'view/adminLayout.php';
	}

	public function layoutAdminEdit($article){
		require 'view/articleEditLayout.php';
	}

	public static function layoutAdminCreate(){
		require 'view/articleCreateLayout.php';
	}

	public static function layoutDeleteAdmin() {
		require 'view/articleDeleteLayout.php';
	}

	public function layoutAdminComments($article, $comments, $params){
		require 'view/commentsListLayout.php';
	}

	public function layoutAdminComment($comment, $params) {
		require 'view/commentAdminLayout.php';
	}

	public function layoutAction($message, $params, $context){
		require 'View/actionLayout.php';
	}	
}