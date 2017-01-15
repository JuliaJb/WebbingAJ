<?php

namespace Controller;

use \W\Controller\Controller;

class TestController extends Controller
{

	//show test
	public function test()
	{
		$m = new \Manager\UserManager();

		$rid = $_SESSION['id'];

		$roles = $m->get_user_roles($rid);

		$this->show('default/test', ['roles'=> $roles ]);
	}



}