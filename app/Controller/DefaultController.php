<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{


	public function home()
	{
		if ( !isset($_SESSION['firstname']) && !isset($_SESSION['lastname']) ) {
			$this->redirectToRoute('login');
		}

		$manager = new \Manager\UserManager();

		$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);

		
		if (isset($_POST['valid_home_Ma'])) {
			$data = [
					'rsvpMa' => $_POST['rsvpMa'],
				];
					
			$result = $manager->update($data, $profil['id']);

			$this->show('default/home', ['profil' => $profil]);

		}

		if (isset($_POST['valid_home_Fr'])) {
			$data = [
					'rsvpFr' => $_POST['rsvpFr'],
				];
					
			$result = $manager->update($data, $profil['id']);

			$this->show('default/home', ['profil' => $profil]);

		}

		$this->show('default/home', ['profil' => $profil]);
	}




	public function info_france()
	{
		$manager = new \Manager\UserManager();

		if ( isset($_SESSION) && isset($_SESSION['firstname']) && isset($_SESSION['lastname']) ) {
			$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);
			if (empty($_SESSION["lastname"]) || empty($_SESSION["firstname"]) || $profil['invitFr'] !== '1') {
				$this->redirectToRoute('home');
			}
		}
		else {
			$this->redirectToRoute('login');
		}		

		
		$this->show('default/info_france');
	}

	public function info_maurice()
	{
		$manager = new \Manager\UserManager();

		if ( isset($_SESSION) && isset($_SESSION['firstname']) && isset($_SESSION['lastname']) ) {
			$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);
			if (empty($_SESSION["lastname"]) || empty($_SESSION["firstname"]) || $profil['invitMa'] !== '1') {
				$this->redirectToRoute('home');
			}
		}
		else {
			$this->redirectToRoute('login');
		}
		
		$this->show('default/info_maurice');
	}

	public function deconnexion()
	{
		session_unset();

		$this->redirectToRoute('login');

	}

}