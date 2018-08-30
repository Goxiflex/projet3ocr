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
		$database = new Database();
		$billet = new Billet();
		$billet->hydrate($database->getPost($table, $this->parameters[0]));
		return $billet;
	}

	public function modelArticlesListCall($table) {
		$database = new Database ();
		$billetList = $database->getAll($table);
		return $billetList;
	}

	public function modelArticleInsert($table){
		$billet = new Billet;
		$billet->hydrateArray($_POST);
		$database = new Database();
		$database->insertPost($table, $billet->getAuteur(), $billet->getTitre(), $billet->getContenu());
	}

	public function modelArticleUpdate($table){	
		$billet = new Billet;
		$billet->hydrateArray($_POST);
		$database = new Database();
		return $database->updatePost($table, $billet->getId(), $billet->getAuteur(), $billet->getTitre(), $billet->getContenu(), $billet->getDateCreation());
	}

	public function modelArticleDelete($table){
		$database = new Database();	
		try
		{
			$database->getPost($table, $this->parameters[0]);
				if (!isset($_POST['confirm']))
					{
						return file_get_contents('view\articleDeleteAdminLayout.php');
					}
				elseif ($_POST['confirm'] === 'Oui') 
					{
						return $database->deletePost($table, $post->id);
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

	public function modelCommentDelete($table){
		$commentmanager = new CommentManager();	
		try
		{
			$commentmanager->getComment($table, $this->parameters[1]);
				if (!isset($_POST['confirm']))
					{
						return file_get_contents('view\commentDeleteAdminLayout.php');
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

	public function layoutArticle($billet, $comments) {
		require 'View/articleLayout.php';
	}

	public function layoutHome($billetList) {
		require 'View/categoryLayout.php';
	}

	public function layoutAdmin($billetList){
		require 'View/categoryLayoutAdmin.php';
	}

	public function layoutAdminEdit($billet){
		require 'View/articleAdminLayout.php';
	}

	public static function layoutAdminCreate(){
		require 'View/articleCreateAdminLayout.php';
	}

	public static function layoutDeleteAdmin() {
		require 'View/articleDeleteAdminLayout.php';
	}

	public function layoutAdminComments($billet, $comments, $params){
		require 'view/commentsListAdminLayout.php';
	}

	public function layoutAdminComment($comments) {
		require 'view/commentAdminLayout.php';
	}

	public function layoutAction($message, $params, $context){
		require 'View/actionLayout.php';
	}	
}