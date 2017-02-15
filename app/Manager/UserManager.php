<?php
namespace Manager;

class UserManager extends \W\Manager\Manager {

	public function getNamesById($id)
	{

		$sql = "SELECT firstname, lastname FROM " . $this->table . " WHERE id = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();

		return $sth->fetch();

	}


	public function checkInscription($lastname, $firstname)
	{

		$sql = "SELECT * FROM " . $this->table . " WHERE lastname = :lastname AND firstname = :firstname";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":lastname", $lastname);
		$sth->bindValue(":firstname", $firstname);
		$sth->execute();

		return $sth->fetch();
	}

	public function checkConnexion($email, $password)
	{

		$sql = "SELECT * FROM " . $this->table . " WHERE email = :email AND password = :password";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":email", $email);
		$sth->bindValue(":password", $password);
		$sth->execute();

		return $sth->fetch();
	}

	public function yesAnswerMaurice()
	{

		$sql = "SELECT * FROM " . $this->table . " WHERE rsvpMa = :rsvpMa";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":rsvpMa", 1);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function noAnswerMaurice()
	{

		$sql = "SELECT * FROM " . $this->table . " WHERE rsvpMa = :rsvpMa";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":rsvpMa", 0);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function yesAnswerFrance()
	{

		$sql = "SELECT * FROM " . $this->table . " WHERE rsvpFr = :rsvpFr";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":rsvpFr", 1);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function noAnswerFrance()
	{

		$sql = "SELECT * FROM " . $this->table . " WHERE rsvpFr = :rsvpFr";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":rsvpFr", 0);
		$sth->execute();

		return $sth->fetchAll();
	}


	public function findGuestByNames($firstname, $lastname)
	{

		$sql = "SELECT * FROM " . $this->table . " WHERE firstname = :firstname AND lastname = :lastname";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":firstname", $firstname);
		$sth->bindValue(":lastname", $lastname);
		$sth->execute();

		return $sth->fetch();
	}

	public function guestCount()
	{
		$sql = "SELECT COUNT(*) as count FROM " . $this->table;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetch();
	}

	public function yesGuestCountMaurice()
	{
		$sql = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE rsvpMa = :rsvpMa";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":rsvpMa", "1");
		$sth->execute();

		return $sth->fetch();
	}

	public function noGuestCountMaurice()
	{
		$sql = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE rsvpMa = :rsvpMa";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":rsvpMa", "0");
		$sth->execute();

		return $sth->fetch();
	}

	public function yesGuestCountFrance()
	{
		$sql = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE rsvpFr = :rsvpFr";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":rsvpFr", "1");
		$sth->execute();

		return $sth->fetch();
	}

	public function noGuestCountFrance()
	{
		$sql = "SELECT COUNT(*) as count FROM " . $this->table . " WHERE rsvpFr = :rsvpFr";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":rsvpFr", "0");
		$sth->execute();

		return $sth->fetch();
	}


	public function get_emails_maurice()
	{
		$sql = "SELECT email FROM " . $this->table . " WHERE  invitMa = 1";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}


	public function get_emails_france()
	{

		$sql = "SELECT email FROM " . $this->table . " WHERE invitFr = 1";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();

	}

	public function get_music()
	{

		$sql = "SELECT musique FROM " . $this->table;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();

	}

	public function get_food()
	{

		$sql = "SELECT aliments, lastname, firstname FROM " . $this->table;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();

	}

}
