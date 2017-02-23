<?php

namespace Controller;

use \W\Controller\Controller;

class AdminController extends Controller
{


	public function admin()
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
		

		// STATISTIQUES
		$nbInvites = $manager->guestCount();
		$yesGuestCountMaurice = $manager->yesGuestCountMaurice();
		$noGuestCountMaurice = $manager->noGuestCountMaurice();
		$yesGuestCountFrance = $manager->yesGuestCountFrance();
		$noGuestCountFrance = $manager->noGuestCountFrance();
		// LISTE INVITE
		$invites = $manager->findAll($orderBy = "1", $orderDir = "ASC");
		// LISTE MAURICE
		$invitesOuiMa = $manager->yesAnswerMaurice();
		$invitesNonMa = $manager->noAnswerMaurice();
		// LISTE FRANCE
		$invitesOuiFr = $manager->yesAnswerFrance();
		$invitesNonFr = $manager->noAnswerFrance();
		// MUSIC
		$listMusic = $manager->get_music();
		// FOOD
		$listFood = $manager->get_food();
		

		$isvisible = "novisible";

		
		$this->show('admin/admin', [
				'nbInvites' => $nbInvites,
				'yesGuestCountMaurice' => $yesGuestCountMaurice,
				'noGuestCountMaurice' => $noGuestCountMaurice,
				'yesGuestCountFrance' => $yesGuestCountFrance,
				'noGuestCountFrance' => $noGuestCountFrance,
				'invites' => $invites,
				'invitesOuiMa' => $invitesOuiMa,
				'invitesNonMa' => $invitesNonMa,
				'invitesOuiFr' => $invitesOuiFr,
				'invitesNonFr' => $invitesNonFr,
				'isvisible' => $isvisible,
				'listMusic' => $listMusic,
				'listFood' => $listFood
			]);
	}



	public function ajouter_invite() 
	{
		$imanager = new \Manager\UserManager();

		if ( isset($_SESSION) && isset($_SESSION['firstname']) && isset($_SESSION['lastname']) ) {
			$profil = $imanager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);
			if (empty($_SESSION["lastname"]) || empty($_SESSION["firstname"]) || $profil['admin'] !== '1') {
				$this->redirectToRoute('home');
			}
		}
		else {
			$this->redirectToRoute('login');
		}

		$visiclass = "novisible";
		$new_user = [];
		//Id of the newly created user
		$upId = 0;

		//Gestion d'etapes :
		if (isset($_POST['btn_ajouter']))
		{
			$errors = [];
			//Gestion d'erreurs
			if (empty($_POST['inp_firstname']))
			{
				$errors['firstname'] = "Vous devez indiquer le Prénom de votre invité.";
			}
			
			if (empty($_POST['inp_lastname']))
			{
				$errors['lastname'] = "Vous devez indiquer le Nom de votre invité.";
			}

			//Insert User, depending on errors : 
			if (empty($errors))
			{
				$data = [
				'lastname' => $_POST['inp_lastname'],
				'firstname' => $_POST['inp_firstname']
				];

				$new_user = $imanager->insert($data);

				//This ID will be used to update Roles
				$upId = $new_user['id'];

				$visiclass = "visible-inline";

				$this->show('admin/ajouter_invite', ['visiclass' => $visiclass, 'new_user' => $new_user, 'upId' => $upId ]);

			}
			else 
			{
				$this->show('admin/ajouter_invite', ['errors' => $errors,]);
	
			}

		}

		if (isset($_POST['btnAddGuest']))
		{
			$visiclass = "visible-inline";

			$c_errors = [];

			//Gestion d'Erreurs
			if (!isset($_POST['invitFr']))
			{
				$c_errors['invitFr'] = "Vous devez indiquer si la personne est invité en France";
			}

			if (!isset($_POST['invitMa']))
			{
				$c_errors['invitMa'] = "Vous devez indiquer si la personne est invité à l'Île Maurice";
			}

			if (!isset($_POST['bachelor']))
			{
				$c_errors['bachelor'] = "Vous devez indiquer si la personne est invité à l'EVG'";
			}

			if (!isset($_POST['bachelorette']))
			{
				$c_errors['bachelorette'] = "Vous devez indiquer si la personne est invité à l'EVJF'";
			}


			//If there are errors
			if (!empty($c_errors))
			{
				$visiclass = "visible-inline";
				$this->show('admin/ajouter_invite', ['c_errors' => $c_errors, 'visiclass' => 
				$visiclass, 'new_user'=> $new_user ]);
			}
			
			//Insert Roles in DB
			else
			{
				
				//Update Data into users table in DB:
				$updata =[
					'invitFr' => $_POST['invitFr'],
					'invitMa' => $_POST['invitMa']
				];

				$upId = $_POST['upId'];

				$updated = $imanager->update($updata, $upId);

				//Insert Roles into roles_users table in DB :

				$rmanager = new \Manager\Roles_UserManager();
				$r_surprise = $rmanager->insert_user_role($upId, 6);
				$new_roles = [];

				if ($_POST['invitFr'] == 1 )
				{
					$r_france = $rmanager->insert_user_role($upId, 2);
					$new_roles[] = $r_france;
				}

				if ($_POST['invitMa'] == 1 )
				{
					$r_maurice = $rmanager->insert_user_role($upId, 3);
					$new_roles[] = $r_maurice;

				}

				if ($_POST['bachelor'] == 1 )
				{
					$r_bachelor = $rmanager->insert_user_role($upId, 4);
					$new_roles[] = $r_bachelor;
				}

				if ($_POST['bachelorette'] == 1 )
				{
					$r_bachelorette = $rmanager->insert_user_role($upId, 5);
					$new_roles[] = $r_bachelorette;
				}

				$this->redirectToRoute('ajouter_invite');
			}
		}


		$this->show('admin/ajouter_invite', ['visiclass' => $visiclass, 'new_user'=> $new_user]);
	}





	// ******** FIN AJOUT INVITE **********


	public function profil_invites()
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
		$isvisible = "novisible";

		// AU CLIC SUR LE BOUTON OK
		if (isset($_POST['btnAdminNames'])) {
			$isvisible = "visible";
				
			$profilGuest = $manager->findGuestByNames($_POST['firstname'], $_POST['lastname']);
				
			$this->show('admin/profil_invites', 
				[
					'invites' => $invites, 
					'profilGuest' => $profilGuest,
					'isvisible' => $isvisible
				]);	
		}
		// AU CLIC SUR LE BOUTON ENREGISTRER MODIFICATIONS
		if (isset($_POST['btnAdminProfile'])) {

			if (!empty($_POST['password'])) {
				$data = [
					'email' => $_POST['email'],
					'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
					'children' => $_POST['enfants'],
					'diet' => $_POST['regime'],
					'aliments' => $_POST['aliment_specs'],
					'rsvpMa' => $_POST['rsvpMa'],
					'rsvpFr' => $_POST['rsvpFr'],
					'invitFr' => $_POST['invitFr'],
					'invitMa' => $_POST['invitMa'],
					'bachelor' => $_POST['bachelor'],
					'bachelorette' => $_POST['bachelorette'],
					'admin' => $_POST['admin'],
					'marie' => $_POST['marie'],
				];
			}
			else {
				$data = [
					'email' => $_POST['email'],
					'children' => $_POST['enfants'],
					'diet' => $_POST['regime'],
					'aliments' => $_POST['aliment_specs'],
					'rsvpMa' => $_POST['rsvpMa'],
					'rsvpFr' => $_POST['rsvpFr'],
					'invitFr' => $_POST['invitFr'],
					'invitMa' => $_POST['invitMa'],
					'bachelor' => $_POST['bachelor'],
					'bachelorette' => $_POST['bachelorette'],
					'admin' => $_POST['admin'],
					'marie' => $_POST['marie'],
				];
			}
					
			$result = $manager->update($data, $_POST['id']);

			$message = "Le profil a bien été modifié !";
			$this->show('admin/profil_invites', ['invites' => $invites, 'isvisible' => $isvisible, 'message' => $message]);
		}
		$this->show('admin/profil_invites', ['invites' => $invites, 'isvisible' => $isvisible]);
	}

	

}
