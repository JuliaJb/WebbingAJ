<?php

namespace Manager;

class PostManager extends \W\Manager\Manager
{
	//Get a set of posts filtered by Category
	public function get_post_by_filter($cat)
	{

		$sql = "SELECT U.firstname, U.lastname, P.* FROM users AS u, posts AS P WHERE P.category like :category AND P.id_user = U.id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":category", $cat);
		$sth->execute();

		return $sth->fetchAll();
	}

	//Get the post and author of a single post
	public function get_post_and_author($id)
	{
		$sql = "SELECT U.firstname, U.lastname, P.* FROM users AS u, posts AS P WHERE P.id = :id AND P.id_user = U.id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();

		return $sth->fetchAll();
	}

	//Get the post and author of a single post
	public function search($kwrd)
	{
		$sql = "SELECT * FROM `posts` WHERE `message` like :kwrd or `titre` like :kwrd";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":kwrd", "%$kwrd%");
		$sth->execute();

		return $sth->fetchAll();
	}

}