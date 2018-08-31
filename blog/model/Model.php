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

	public function ArticleCall() {
		$articlemanager = new ArticleManager();
		$article = new Article();
		$article->hydrate($articlemanager->getPost($this->table, $this->parameter));
		return $article;
	}
	
}