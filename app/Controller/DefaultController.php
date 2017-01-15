<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{


	public function home()
	{
		$manager = new \Manager\UserManager();

		$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);

		
		if (isset($_POST['valid_home_Ma'])) {
			$data = [
					'rsvpMa' => $_POST['rsvpMa'],
				];
					
			$result = $manager->update($data, $_SESSION['id']);

			$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);

			$this->show('default/home', ['profil' => $profil]);

		}

		if (isset($_POST['valid_home_Fr'])) {
			$data = [
					'rsvpFr' => $_POST['rsvpFr'],
				];
					
			$result = $manager->update($data, $_SESSION['id']);

			$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);

			$this->show('default/home', ['profil' => $profil]);

		}

		if (isset($_POST['valid_home_Vin'])) {
			$data = [
					'rsvpVin' => $_POST['rsvpVin'],
				];
					
			$result = $manager->update($data, $_SESSION['id']);

			$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);

			$this->show('default/home', ['profil' => $profil]);

		}

		$this->show('default/home', ['profil' => $profil]);
	}




	public function info_france()
	{
		
		$this->show('default/info_france');
	}

	public function info_maurice()
	{
		
		$this->show('default/info_maurice');
	}

	public function deconnexion()
	{
		unset($_SESSION);

		$this->redirectToRoute('login');

	}

}