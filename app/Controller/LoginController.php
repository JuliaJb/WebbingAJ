<?php

namespace Controller;

use \W\Controller\Controller;

class LoginController extends Controller
{

	public function login()
	{
		$manager = new \Manager\UserManager();

		// AU CLIC SUR BOUTON D'INSCRIPTION
		
		if (isset($_POST['inscription'])) 
		{
			$errors = [];	
			
			// CONTROLE DES CHAMPS DU FORMULAIRE D'INSCRIPTION

			if (empty($_POST['prenom'])) {
				$errors['prenom'] = "Veuillez renseigner votre prénom";
			}


			if (empty($_POST['nom'])) {
				$errors['nom'] = "Veuillez renseigner votre nom";
			}

			// CONTROLE DE L'EXISTENCE DU USER

			$lastnameLower = strtolower($_POST['nom']);
			$firstnameLower = strtolower($_POST['prenom']);

			$users = $manager->checkInscription($lastnameLower, $firstnameLower);


			if ( !empty($_POST['prenom']) && !empty($_POST['nom']) ) 
			{
				if (!$users) 
				{
				$errors['combinaison'] = "Cette combinaison de nom et prénom n'existe pas, vérifiez bien l'orthographe. Votre nom et prénom sont les mêmes qu'indiqué sur l'enveloppe du faire part.";
				}
				else if($users) 
				{
					
					$_SESSION["lastname"] = ucfirst($_POST['nom']);
					$_SESSION["firstname"] = ucfirst($_POST['prenom']);		

					$this->redirectToRoute('profil');

				}

			}

			$this->show('default/login', ['errors' => $errors]);

		}

		// AU CLIC SUR BOUTON DE CONNEXION

		if (isset($_POST['connexion'])) 
		{
			$errorsCo = [];	
			
			// CONTROLE DES CHAMPS DU FORMULAIRE D'INSCRIPTION

			if (empty($_POST['email'])) {
				$errorsCo['email'] = "Veuillez renseigner votre email";
			}


			if (empty($_POST['password'])) {
				$errorsCo['password'] = "Veuillez renseigner votre mot de passe";
			}

			// CONTROLE DE L'EXISTENCE DU USER

			// tester si email dans bdd
			// récupérer mot de passe selon email
			// tester input avec mot de passe

	        $isemailExist = $manager->checkEmailExist($_POST['email']);

	        if( !empty($isemailExist) ) {
	        	$hash = $isemailExist['password'];
	        	if( password_verify($_POST['password'], $hash) ){

	        		$_SESSION["lastname"] = $isemailExist['lastname'];
					$_SESSION["firstname"] = $isemailExist['firstname'];
					$_SESSION["id"] = $isemailExist['id'];

					$this->redirectToRoute('home');
	        	}
	        	else {
	        		$errorsCo['connexion'] = "Votre mot de passe n'est pas correct.";
	        	}
	        }
	        else {
	        	$errorsCo['connexion'] = "Votre email n'est pas correct.";
	        }


			$this->show('default/login', ['errorsCo' => $errorsCo]);

		}

		// AFFICHAGE DE LA PAGE LOGIN QUOI QU'IL ARRIVE

		$this->show('default/login');


	}

	public function profil()
	{

		$manager = new \Manager\UserManager();

		if ( !isset($_SESSION['firstname']) && !isset($_SESSION['lastname']) ) {
			$this->redirectToRoute('login');
		}

		$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);


		if (isset($_POST['btnCreateProfile'])) 
		{
			$errors = [];

			// CONTROLE DES CHAMPS DU FORMULAIRE D'INSCRIPTION

			if (empty($_POST['prenom'])) 
			{
				$errors['prenom'] = "Veuillez renseigner votre prénom.";
			}


			if (empty($_POST['nom'])) 
			{
				$errors['nom'] = "Veuillez renseigner votre nom.";
			}

			if (empty($_POST['email'])) 
			{
				$errors['email'] = "Veuillez renseigner votre email.";
			}

			if (empty($_POST['password'])) 
			{
				$errors['password'] = "Veuillez renseigner votre mot de passe.";
			}

			if (isset($profil) && $profil['invitFr'] == "1" && !isset($_POST['rsvpFr'])) 
			{
				$errors['rsvpFr'] = "Pouvez-vous nous indiquer votre venue. Vous pourrez modifier cette information par la suite.";
			}

			if (isset($profil) && $profil['invitMa'] == "1" && !isset($_POST['rsvpMa'])) 
			{
				$errors['rsvpMa'] = "Pouvez-vous nous indiquer votre venue. Vous pourrez modifier cette information par la suite.";
			}

			// if (!isset($_POST['diet'])) 
			// {
			// 	$errors['diet'] = "Veuillez renseigner si vous avez un régime alimentaire spécifique ou non.";
			// }

			// if (isset($_POST['diet']) && $_POST['diet'] == "1") 
			// {
			// 	if (empty($_POST['aliment_specs'])) 
			// 	{
			// 		$errors['aliment_specs'] = "Veuillez renseigner vos restrictions alimentaires";
			// 	}
			// }


			// if (!isset($_POST['enfants'])) 
			// {
			// 	$errors['enfants'] = "Veuillez renseigner si vous venez accompagner d'enfant(s)";
			// }

			// if (isset($_POST['enfants']) && $_POST['enfants'] == "1") 
			// {
			// 	if (empty($_POST['ChildFirstname1']) && empty($_POST['ChildLastname1'])) 
			// 	{
			// 		$errors['enfants_name'] = "Veuillez renseigner les prénoms de votre(vos) enfant(s).";
			// 	}
			// }



			if (empty($errors)) 
			{
				$lastnameLower = strtolower($_POST['nom']);
				$firstnameLower = strtolower($_POST['prenom']);

				$users = $manager->checkInscription($lastnameLower, $firstnameLower);

				if( isset($profil) && $profil['invitFr'] == "1" && $profil['invitMa'] == "1" ){
					$data = [
						'lastname' => $lastnameLower,
						'firstname' => $firstnameLower,
						'email' => $_POST['email'],
						'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
						'children' => $_POST['enfants'],
						'diet' => $_POST['diet'],
						'aliments' => $_POST['aliment_specs'],
						'ChildLastname1' => $_POST['child1Nom'],
						'ChildFirstname1' => $_POST['child1Prenom'],
						'ChildAge1' => $_POST['child1Age'],
						'ChildLastname2' => $_POST['child2Nom'],
						'ChildFirstname2' => $_POST['child2Prenom'],
						'ChildAge2' => $_POST['child2Age'],
						'ChildLastname3' => $_POST['child3Nom'],
						'ChildFirstname3' => $_POST['child3Prenom'],
						'ChildAge3' => $_POST['child3Age'],
						'rsvpFr' => $_POST['rsvpFr'],
						'rsvpMa' => $_POST['rsvpMa']
					];
					$result = $manager->update($data, $users['id']);
				}

				else if( isset($profil) && $profil['invitFr'] == "1" && $profil['invitMa'] == "0" ){
					$data = [
						'lastname' => $lastnameLower,
						'firstname' => $firstnameLower,
						'email' => $_POST['email'],
						'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
						'children' => $_POST['enfants'],
						'diet' => $_POST['diet'],
						'aliments' => $_POST['aliment_specs'],
						'ChildLastname1' => $_POST['child1Nom'],
						'ChildFirstname1' => $_POST['child1Prenom'],
						'ChildAge1' => $_POST['child1Age'],
						'ChildLastname2' => $_POST['child2Nom'],
						'ChildFirstname2' => $_POST['child2Prenom'],
						'ChildAge2' => $_POST['child2Age'],
						'ChildLastname3' => $_POST['child3Nom'],
						'ChildFirstname3' => $_POST['child3Prenom'],
						'ChildAge3' => $_POST['child3Age'],
						'rsvpFr' => $_POST['rsvpFr']
					];
					$result = $manager->update($data, $users['id']);
				}

				else if( isset($profil) && $profil['invitFr'] == "0" && $profil['invitMa'] == "1" ){
					$data = [
						'lastname' => $lastnameLower,
						'firstname' => $firstnameLower,
						'email' => $_POST['email'],
						'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
						'children' => $_POST['enfants'],
						'diet' => $_POST['diet'],
						'aliments' => $_POST['aliment_specs'],
						'ChildLastname1' => $_POST['child1Nom'],
						'ChildFirstname1' => $_POST['child1Prenom'],
						'ChildAge1' => $_POST['child1Age'],
						'ChildLastname2' => $_POST['child2Nom'],
						'ChildFirstname2' => $_POST['child2Prenom'],
						'ChildAge2' => $_POST['child2Age'],
						'ChildLastname3' => $_POST['child3Nom'],
						'ChildFirstname3' => $_POST['child3Prenom'],
						'ChildAge3' => $_POST['child3Age'],
						'rsvpMa' => $_POST['rsvpMa']
					];
					$result = $manager->update($data, $users['id']);
				}


				$this->redirectToRoute('home');
			}
			else
			{

				$this->show('default/profil', ['errors' => $errors, 'profil' => $profil]);
			}

		}

		// AFFICHAGE DE LA PAGE PROFIL QUOI QU'IL ARRIVE
		
		$this->show('default/profil', ['profil' => $profil]);

	}
	

	public function mon_profil()
	{
		$manager = new \Manager\UserManager();

		if ( !isset($_SESSION) && !isset($_SESSION['firstname']) && !isset($_SESSION['lastname']) ) {
			$this->redirectToRoute('login');
		}

		$profil = $manager->findGuestByNames($_SESSION['firstname'], $_SESSION['lastname']);


		if (isset($_POST['btnChangeProfile'])) 
		{
			$errors = [];


			// CONTROLE DES CHAMPS DU FORMULAIRE D'INSCRIPTION

			if (empty($_POST['prenom'])) 
			{
				$errors['prenom'] = "Veuillez renseigner votre prénom.";
			}


			if (empty($_POST['nom'])) 
			{
				$errors['nom'] = "Veuillez renseigner votre nom.";
			}

			if (empty($_POST['email'])) 
			{
				$errors['email'] = "Veuillez renseigner votre email.";
			}


			if (!isset($_POST['rsvpFr'])) 
			{
				$errors['rsvpFr'] = "Pouvez-vous nous indiquer votre venue.";
			}

			if (!isset($_POST['rsvpMa'])) 
			{
				$errors['rsvpMa'] = "Pouvez-vous nous indiquer votre venue.";
			}

			if (!isset($_POST['diet'])) 
			{
				$errors['diet'] = "Veuillez renseigner si vous avez un régime alimentaire spécifique ou non.";
			}

			if (isset($_POST['diet']) && $_POST['diet'] == "1") 
			{
				if (empty($_POST['aliment_specs'])) 
				{
					$errors['aliment_specs'] = "Veuillez renseigner vos restrictions alimentaires";
				}
			}


			if (!isset($_POST['enfants'])) 
			{
				$errors['enfants'] = "Veuillez renseigner si vous venez accompagner d'enfant(s).";
			}

			if (isset($_POST['enfants']) && $_POST['enfants'] == "1") 
			{
				if (empty($_POST['child1Prenom']) || empty($_POST['child1Nom'])) 
				{
					$errors['enfants_name'] = "Veuillez renseigner le(s) nom(s) et prénom(s) de votre(vos) enfant(s)";
				}
			}



			if (empty($errors)) 
			{
				if (!empty($_POST['password'])) {
					$data = [
						'lastname' => $_POST['nom'],
						'firstname' => $_POST['prenom'],
						'email' => $_POST['email'],
						'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
						'children' => $_POST['enfants'],
						'diet' => $_POST['diet'],
						'aliments' => $_POST['aliment_specs'],
						'musique' => $_POST['musique'],
						'rsvpMa' => $_POST['rsvpMa'],
						'rsvpFr' => $_POST['rsvpFr'],
						'rsvpFr' => $_POST['rsvpFr'],
						'ChildLastname1' => $_POST['child1Nom'],
						'ChildFirstname1' => $_POST['child1Prenom'],
						'ChildAge1' => $_POST['child1Age'],
						'ChildLastname2' => $_POST['child2Nom'],
						'ChildFirstname2' => $_POST['child2Prenom'],
						'ChildAge2' => $_POST['child2Age'],
						'ChildLastname3' => $_POST['child3Nom'],
						'ChildFirstname3' => $_POST['child3Prenom'],
						'ChildAge3' => $_POST['child3Age']
					];
				}
				else {
					$data = [
						'lastname' => $_POST['nom'],
						'firstname' => $_POST['prenom'],
						'email' => $_POST['email'],
						'children' => $_POST['enfants'],
						'diet' => $_POST['diet'],
						'aliments' => $_POST['aliment_specs'],
						'musique' => $_POST['musique'],
						'rsvpMa' => $_POST['rsvpMa'],
						'rsvpFr' => $_POST['rsvpFr'],
						'rsvpFr' => $_POST['rsvpFr'],
						'ChildLastname1' => $_POST['child1Nom'],
						'ChildFirstname1' => $_POST['child1Prenom'],
						'ChildAge1' => $_POST['child1Age'],
						'ChildLastname2' => $_POST['child2Nom'],
						'ChildFirstname2' => $_POST['child2Prenom'],
						'ChildAge2' => $_POST['child2Age'],
						'ChildLastname3' => $_POST['child3Nom'],
						'ChildFirstname3' => $_POST['child3Prenom'],
						'ChildAge3' => $_POST['child3Age']
					];
				}
					
				$result = $manager->update($data, $profil['id']);

				$_SESSION["lastname"] = $_POST['nom'];
				$_SESSION["firstname"] = $_POST['prenom'];


				$this->redirectToRoute('home');
			}
			else
			{

				$this->show('default/mon_profil', ['errors' => $errors, 'profil' => $profil]);
			}

		}

		// AFFICHAGE DE LA PAGE PROFIL QUOI QU'IL ARRIVE
		
		$this->show('default/mon_profil', ['profil' => $profil]);

	}


}