<?php
Class CommentManager 
{
	
	public static function commentsCall($table, $billetId, $sort) {
		$database = new Database();
		$comments = array();
		$i=0;
		foreach ($database->getComments($table, $billetId, $sort) as $dataComment) {
			$comment[$i] = new Comment;
			$comment[$i]->hydrateComment($dataComment);
			$comments[$i] = $comment[$i]; // A voir s'il y a besoin de rajouter un indice à $comments
			$i++;
		}
		return $comments;
	}

	public static function commentCall($table, $id) {
		$comment = new Comment();
		$database = new Database();
		$comment->hydrateComment($database->getPost($table, $id));	
		return $comment;
	}

	public static function commentInsert($table) {
		$gump = new Gump;
		$gump->validation_rules(array(
			'auteur'    => 'required|max_len,100|min_len,6',
			'contenu'       => 'required|max_len,3000|min_len,2'
		));
		$_POST = $gump->sanitize($_POST);
		$validated_data = $gump->run($_POST);

		if($validated_data === false) {
		return $gump->get_readable_errors(true);
		} 
		else {
		$comment = new Comment();
		$comment->hydrateArrayComment($_POST);
		$database = new Database();
		return $database->insertComment($table, $comment->getAuteur(), $comment->getBilletId(), $comment->getContenu());
		}
	}

	public static function commentUpdate($table) {
		$gump = new Gump;
		$gump->validation_rules(array(
			'auteur'    => 'required|max_len,100|min_len,6',
			'contenu'       => 'required|max_len,3000|min_len,2'
		));
		$_POST = $gump->sanitize($_POST);
		$validated_data = $gump->run($_POST);

		if($validated_data === false) {
		return $gump->get_readable_errors(true);
		} 
		else {
		$comment = new Comment;
		$comment->hydrateArrayComment($_POST);
		$database = new Database();
		return $database->updateComment($table, $comment->getAuteur(), $comment->getContenu(), (int)$comment->getReported(), date('Y-m-d H:i:s' ,$comment->getDateCreation()), $comment->getId());
		}
	}

	public static function commentReport($table, $id){
		$comment = new Comment;
		$comment->hydrateArrayComment($_POST);
		$database = new Database();
		return $database->reportComment($table, $comment->getReported(), $id);
	}
	
	public static function commentDelete($table, $id){
		$database = new Database();
		return $database->deletePost($table, $id);
	}
}
