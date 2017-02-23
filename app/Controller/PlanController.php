<?php

namespace Controller;

use \W\Controller\Controller;

class PlanController extends Controller
{

	public function plan()
	{
		$manager = new \Manager\UserManager();

		if ( isset($_SESSION) && isset($_SESSION['firstname']) && isset($_SESSION['lastname']) ) {
			$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);
			if (empty($_SESSION["lastname"]) || empty($_SESSION["firstname"]) || $profil['admin'] !== '1') {
				$this->redirectToRoute('home');
			}
		}
		else {
			$this->redirectToRoute('login');
		}
		
		$invites = $manager->findAll($orderBy = "1", $orderDir = "ASC");

		$fichierJson = fopen("assets/json/data.json", "w");
		fwrite($fichierJson, json_encode($invites));
		fclose($fichierJson);

		$json = [];
		if(isset($_POST['planTable'])){


			$json = $_POST['planTable'];

			for ($i=0; $i <= 64; $i++) { 
				$id = $manager->checkInscription($json[$i]['guestL'], $json[$i]['guestF']);


				$data = [
						'seat' => $json[$i]['place'],
					];
						
					$result = $manager->update($data, $id['id']);
			}


		}




		$this->show('default/plan');
	}




}