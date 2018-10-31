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

	public function displayArticle($table, $complementaryTable) {
		return View::layoutArticle(ArticleManager::articleCall($table, $this->parameters[0]), CommentManager::commentsCall($complementaryTable, $this->parameters[0], 'dateCreation'));
	}

	public function displayArticleEdit($table) {
		return View::layoutArticleEdit(ArticleManager::articleCall($table, $this->parameters[0]));
	}

	public function displayArticleEdited($table) {
		return View::layoutAction(ArticleManager::articleUpdate($table), $this->parameters[0], 'admin');
	}

	public function displayArticleCreated($table) {
		return View::layoutAction(ArticleManager::articleInsert($table), '', 'admin');
	}

	public function displayArticleDelete($table) {
		try 
		{
			if (!isset($_POST['confirm']))
				{
					return View::layoutAction(file_get_contents('view\template\articleDeleteLayout.php'), $this->parameters, 'admin');
				}
			elseif ($_POST['confirm'] === 'Oui') 
				{
					return View::layoutAction(ArticleManager::articleDelete($table, $this->parameters[0]), $this->parameters[0], 'admin');
				}
			elseif ($_POST['confirm'] === 'Non') 
				{
					return View::layoutAction('article non supprimé', $this->parameters[0], 'admin');
				}
			else
				{
					return View::layoutAction('Erreur', $this->parameters[0], 'admin');
				}
		}
		catch (Exception $e)
		{
			return View::layoutAction('Une erreur est survenu : '. $e->getMessage(), $this->parameters[0], 'admin') ;
		}
	}

	public function displayArticlesList($table) {
		return View::layoutHome(ArticleManager::articlesCall($table));
	}

	public function displayAdmin($table) {
		return View::layoutAdmin(ArticleManager::articlesCall($table));
	}

	public function displayCommentInsert($table) {
		return View::layoutAction(CommentManager::commentInsert($table), $this->parameters[0], 'front');
	}

	public function displayCommentReport($table) {
		return View::layoutAction(CommentManager::commentReport($table, $this->parameters[1]), $this->parameters[0], 'front');
	}

	public function displayCommentsList($table, $complementaryTable) {
		return View::layoutCommentsAdmin(ArticleManager::articleCall($table, $this->parameters[0]), CommentManager::commentsCall($complementaryTable, $this->parameters[0], 'dateCreation'));
	}

	public function displayCommentDelete($table){
		try
		{
				if (!isset($_POST['confirm']))
					{
						return View::layoutAction(file_get_contents('view\template\commentDeleteLayout.php'), $this->parameters[0], 'admin') ;
					}
				elseif ($_POST['confirm'] === 'Oui') 
					{
						return View::layoutAction(CommentManager::commentDelete($table, $this->parameters[1]), $this->parameters[0], 'admin');
					}
				elseif ($_POST['confirm'] === 'Non')
					{
						return View::layoutAction('Commentaire non supprimé', $this->parameters[0], 'admin');
					}
				else 
					{
						return View::layoutAction('Erreur', $this->parameters[0], 'admin');
					}
		}
		catch (Exception $e) 
		{
				return View::layoutAction('Une erreur est survenu : '. $e->getMessage(), $this->parameters[0], 'admin') ;
		}
	}

	public function displayCommentModify($table){
		return View::layoutCommentAdmin(CommentManager::commentCall($table, $this->parameters[1]), $this->parameters[1]);
	}

	public function displayCommentModified($table){
		return View::layoutAction(CommentManager::commentUpdate($table), $this->parameters[0], 'admin');
	}

	public static function displayAdminCreate(){
		return View::layoutArticleCreate();
	}

	public function displayConnectionUser($table){
		if (isset($_POST['email'])) {
			return View::layoutConnection(UserManager::userMatch($table, $_POST['email']));
		}
		else {

			return View::layoutConnection('');
		}
	}

	public static function logCheck() {
		if ($_SESSION['logged'] !== TRUE ) {
			header('Location: '.PATH.'/connect');
		}
	}

	public static function disconnect() {

			if (isset($_SESSION['logged']) && $_SESSION['logged'] === TRUE) {
				session_destroy();
				return View::layoutConnection('Vous avez été déconnecté');
			}
			else {
				return View::layoutConnection('Veuillez vous connecter');
			}
	}
}

