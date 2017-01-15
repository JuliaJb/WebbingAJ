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
		$sql = "SELECT users.email FROM " . $this->table . " INNER JOIN roles_users ON roles_users.id_user = users.id INNER JOIN roles ON roles_users.id_role = roles.id WHERE roles_users.id_role = 3";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}


	public function get_emails_france()
	{

		$sql = "SELECT users.email FROM " . $this->table . " INNER JOIN roles_users ON roles_users.id_user = users.id INNER JOIN roles ON roles_users.id_role = roles.id WHERE roles_users.id_role = 2";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();

	}

	public function get_user_roles($rid)
	{
		$sql = "SELECT U.id, RU.id_role FROM users as U, roles_users as RU WHERE U.id = :rid AND U.id = RU.id_user";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":rid", $rid);
		$sth->execute();

		$raw_result = $sth->fetchAll();
		$roles = array();

		foreach ($raw_result as $key => $value) 
		{
			switch ($value['id_role']) 
			{
			 	case 1:
			 		$roles[] = "Admin";
			 		break;
			 	case 2:
			 		$roles[] = "France";
			 		break;
		 		case 3:
			 		$roles[] = "Maurice";
			 		break;
			 	case 4:
			 		$roles[] = "Bachelor";
			 		break;
			 	case 5:
			 		$roles[] = "Bachelorette";
			 		break;
			 	case 6:
			 		$roles[] = "Surprise";
			 		break;
			 	case 7:
			 		$roles[] = "Marie";
			 		break;
			 	default:
			 		$roles[] = "None";
			 		break;
			}
		}

		return $roles;
	}

}
