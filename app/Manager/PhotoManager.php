<?php
namespace Manager;

class PhotoManager extends \W\Manager\Manager {

	public function getPhotos()
	{

		$sql = "SELECT U.firstname, U.lastname, P.* FROM users AS U, photos AS P WHERE P.user_id = U.id";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function getPhotosByNames($firstname, $lastname)
	{

		$sql = "SELECT * FROM users AS U, photos AS P WHERE P.user_id = U.id AND U.lastname = :lastname AND U.firstname = :firstname";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":lastname", $lastname);
		$sth->bindValue(":firstname", $firstname);
		$sth->execute();

		return $sth->fetchAll();

	}


}
