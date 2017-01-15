<?php

namespace Controller;

use \W\Controller\Controller;

class PhotoController extends Controller
{



	public function photo()
	{
		
		$manager = new \Manager\PhotoManager();
		$managerUser = new \Manager\UserManager();

		$invites = $managerUser->findAll($orderBy = "1", $orderDir = "ASC");


		$maxsize = 1048576;
		$erreurPhoto = [];
		$maxwidth = "";
		$maxheight = "";


		if (isset($_POST['poster'])) 
		{

			if ($_FILES['photo']['error'] > 0)
			{
				$erreurPhoto['erreur'] = "Erreur lors du transfert";
			}


			// type d'erreur
			// UPLOAD_ERR_NO_FILE : fichier manquant.
			// UPLOAD_ERR_INI_SIZE : fichier dépassant la taille maximale autorisée par PHP.
			// UPLOAD_ERR_FORM_SIZE : fichier dépassant la taille maximale autorisée par le formulaire.
			// UPLOAD_ERR_PARTIAL : fichier transféré partiellement.


			// TAILLE DU FICHIER

			if ($_FILES['photo']['size'] > $maxsize) 
			{
				$erreurPhoto['size'] = "Le fichier est trop gros";
			}


			// TYPE DU FICHIER

			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
			//1. strrchr renvoie l'extension avec le point (« . »).
			//2. substr(chaine,1) ignore le premier caractère de chaine.
			//3. strtolower met l'extension en minuscules.
			$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );

			if ( !in_array($extension_upload,$extensions_valides) ) 
			{
				$erreurPhoto['extension'] = "mauvaise extension";
			}

			// DIMENSION DU FICHIER

			// $image_sizes = getimagesize($_FILES['photo']['tmp_name']);

			// if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) 
			// {
			// 	$erreurPhoto['dimension'] = "Image trop grande";
			// }

			// DEPLACEMENT FICHIER

			if (empty($erreurPhoto)) {
			

				$file = md5(uniqid(rand(), true));
				$nom = "{$file}.{$extension_upload}";
				$dossier = "assets/photo/{$file}.{$extension_upload}";
				$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$dossier);

				if ($resultat) 
				{

					$data = [
						'filename' => $_FILES['photo']['name'],
						'filesize' => $_FILES['photo']['size'],
						'category' => "category",
						'finalname' => $nom,
						'user_id' => $_SESSION['id'],
					];
						
					$insertPhoto = $manager->insert($data);

				}

			}

			$result = $manager->getPhotos($orderBy = "1", $orderDir = "DESC");

			$this->show('default/photo', ['result' => $result, 'erreurPhoto' => $erreurPhoto, 'invites' => $invites]);

			
		}

		if ( isset($_GET['firstname']) && isset($_GET['lastname']) ) 
		{
			$firstname = $_GET['firstname'];
			$lastname = $_GET['lastname'];
			$result = $manager->getPhotosByNames($firstname, $lastname);

			$this->show('default/photo', ['result' => $result, 'invites' => $invites]);
		}


		$result = $manager->getPhotos($orderBy = "1", $orderDir = "DESC");


		$this->show('default/photo', ['result' => $result, 'invites' => $invites]);
	}





}