<?php

namespace Manager;

class Roles_UserManager extends \W\Manager\Manager
{
	public function get_user_roles()
	{

		$sql = "SELECT id_role FROM " . $this->table . " WHERE id_user = :id_user";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_user", $_SESSION['id']);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function insert_user_role($id, $role)
	{
		$sql = "INSERT INTO `roles_users` (`id_user`, `id_role`) VALUES (:id, :role)";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->bindValue(":role", $role);
		$sth->execute();

	}

	public function isThisUserRoleExist($idUser, $idRole)
	{

		$sql = "SELECT id_user, id_role FROM " . $this->table . " WHERE id_user = :idUser AND id_role = :idRole";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":idUser", $idUser);
		$sth->bindValue(":idRole", $idRole);
		$sth->execute();

		return $sth->fetchAll();
	}

}