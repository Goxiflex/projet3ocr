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

	/* Nouveau format d'appel au contrôleur et à la vue. A voir si c'est la bonne pratique. */
	public function displayArticle($table, $complementaryTable) {
		$modelArticle = new Model($table, $this->parameters[0], '');
		$modelComments = new Model($complementaryTable, $this->parameters[0], 'dateCreation');
		return View::layoutArticle($modelArticle->articleCall(), $modelComments->commentsCall());		
	}

	public function displayArticleEdit($table) {
		$modelArticle = new Model($table, $this->parameters[0], '');
		return View::layoutArticleEdit($modelArticle->articleCall());
	}

	public function displayArticleEdited($table) {
		$modelArticle = new Model ($table, $this->parameters[0], '');
		return View::layoutAction($modelArticle->articleUpdate(), $this->parameters[0], 'admin');
	}

	public function displayArticleCreated($table) {
		$modelArticle = new Model ($table, '', '');
		return View::layoutAction($modelArticle->articleInsert(), '', 'admin');
	}

	public function displayArticleDelete($table) {
		$modelArticle = new Model ($table, $this->parameters[0], '');
		try 
		{
			if (!isset($_POST['confirm']))
				{
					return View::layoutAction(file_get_contents('view\template\articleDeleteLayout.php'), $this->parameters, 'admin');
				}
			elseif ($_POST['confirm'] === 'Oui') 
				{
					return View::layoutAction($modelArticle->articleDelete(), $this->parameters[0], 'admin');
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
		$modelArticle = new Model($table, '', '');
		return View::layoutHome($modelArticle->articlesCall());
	}

	public function displayAdmin($table) {
		$modelArticle = new Model($table, '', '');
		return View::layoutAdmin($modelArticle->articlesCall());
	}

	public function displayCommentInsert($table) {
		$modelComment = new Model($table, $this->parameters[0], '');
		return View::layoutAction($modelComment->commentInsert(), $this->parameters[0], 'front');
	}

	public function displayCommentReport($table) {
		$modelComment = new Model($table, $this->parameters[1], '');
		return View::layoutAction($modelComment->commentReport(), $this->parameters[0], 'front');
	}

	public function displayCommentsList($table, $complementaryTable) {
		$modelArticle = new Model ($table, $this->parameters[0], '');
		$modelComments = new Model ($complementaryTable, $this->parameters[0], 'dateCreation');
		return View::layoutCommentsAdmin($modelArticle->articleCall(), $modelComments->commentsCall());
	}

	public function displayCommentDelete($table){
		$modelComment = new Model ($table, $this->parameters[1], '')	;
		try
		{
				if (!isset($_POST['confirm']))
					{
						return View::layoutAction(file_get_contents('view\template\commentDeleteLayout.php'), $this->parameters[0], 'admin') ;
					}
				elseif ($_POST['confirm'] === 'Oui') 
					{
						return View::layoutAction($modelComment->commentDelete(), $this->parameters[0], 'admin');
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
		$modelComment = new Model ($table, $this->parameters[1], '');
		return View::layoutCommentAdmin($modelComment->CommentCall(), $this->parameters[1]);
	}

	public function displayCommentModified($table){
		$modelComment = new Model ($table, '', '');
		return View::layoutAction($modelComment->CommentUpdate(), $this->parameters[0], 'admin');
	}


	public static function displayAdminCreate(){
		return View::layoutArticleCreate();
	}
}
