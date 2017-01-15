<?php

namespace Manager;

class ReponseManager extends \W\Manager\Manager
{
	public function get_post_reply($id_post)
	{

		$sql = "SELECT U.firstname, U.lastname, P.* FROM users AS u, reponses AS P WHERE id_post = :id_post AND P.id_user = U.id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_post", $id_post);
		$sth->execute();

		return $sth->fetchAll();
	}


}