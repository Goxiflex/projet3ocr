<?php

class View {

	public static function layoutHome($articles) {
		require 'view/template/homeLayout.php';
	}

	public static function layoutArticle($article, $comments) {
		require 'view/template/articleLayout.php';
	}

	public static function layoutAdmin($articles) {
		require 'view/template/adminLayout.php';
	}

	public static function layoutArticleCreate(){
		require 'view/template/articleCreateLayout.php';
	}

	public static function layoutArticleEdit($article){
		require 'view/template/articleEditLayout.php';
	}

	public static function layoutCommentsAdmin($article, $comments){
		require 'view/template/commentsListLayout.php';
	}

	public static function layoutCommentAdmin($comment, $params) {
		require 'view/template/commentAdminLayout.php';
	}

	public static function layoutAction($message, $params, $context){
		require 'view/template/actionLayout.php';
	}	

	public static function layoutConnection($user) {
		require 'view/template/connect.php';
	}

	
}