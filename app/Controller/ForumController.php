<?php

namespace Controller;

use \W\Controller\Controller;

class ForumController extends Controller
{
	
	//List all Forum Topics 
	public function post_list()
	{

		$manager = new \Manager\PostManager();

		$result = $manager->findAll();

		$this->show('forum/forum_admin', ['result' => $result]);

	}

	//Detail d'un Sujet
	public function post_detail($id)
	{
		$manager = new \Manager\PostManager();

		$post = $manager->get_post_and_author($id);


		//Afficher toutes les réponses : 
		$rs_manager = new \Manager\ReponseManager();

		$reponses = $rs_manager->get_post_reply($id);


		//INSERT Réponse à un sujet:
		$r_errors = array();

		if (isset($_POST['btn_f_reply']))
		{
			if(empty($_POST['inp_content']))
			{
				$r_errors['content'] = "Vous avez oublié votre réponse.";
			}
			else
			{

				$data = [
					'id_user' => $_SESSION['id'],
					'date_pub' => date('Y-m-d'),
					'id_post' => $id,
					'message' => $_POST['inp_content'],
				];

				$insert = $rs_manager->insert($data);

				$this->redirectToRoute('forum_detail', ['id'=> $id]);
			}		
		}

		$this->show('forum/forum_detail', ['post' => $post, 'reponses' => $reponses, 
			'r_errors'=> $r_errors]);

	}


	//Filtrer List par catégorie
	public function post_filter($cat)
	{
		$manager = new \Manager\PostManager();

		$filtered = $manager->get_post_by_filter($cat);

		$this->show('forum/forum_list', ['filtered' => $filtered]);
	}

	//Create a New Topic 
	public function post_create()
	{

		$errors = array();

		$manager = new \Manager\PostManager();

		if (isset($_POST['btn_f_create']))
		{
			if (empty($_POST['inp_title']))
			{
				$errors['title'] = "Vous avez oublié d'inclure le titre";
			}

			if(empty($_POST['inp_content']))
			{
				$errors['content'] = "Vous avez oublié d'inclure le contenu";
			}

			if(!isset($_POST['inp_category']))
			{
				$erros['category'] = "Vous devez indiquer une catégorie.";
			}	
		
			if (empty($errors))
			{
				$data = [
					'titre' => $_POST['inp_title'],
					'message' => $_POST['inp_content'],
					'id_user' => $_SESSION['id'],
					'date_publication' => date('Y-m-d'),
					'category' => $_POST['inp_category'],
				];

				$manager->insert($data, $stripTags = True);

				$this->redirectToRoute('filter', ['cat' => $_POST['inp_category']]);
			}

		}

		$this->show('forum/forum_create', ['errors' => $errors]);
	}

	//Update a Post
	public function post_update($id)
	{
		$manager = new \Manager\PostManager();

		$post = $manager->get_post_and_author($id);

		if (isset($_POST['btn_f_update'])) 
		{
			$errors = array();

			if (empty($_POST['inp_title']))
			{
				$errors['title'] = "Vous avez oublié d'inclure le titre";
			}

			if(empty($_POST['inp_content']))
			{
				$errors['content'] = "Vous avez oublié d'inclure le contenu";
			}

			if (empty($errors))
			{
				$data = [
					'titre' => $_POST['inp_title'],
					'message' => $_POST['inp_content'],
					'date_publication' => date('Y-m-d')
				];

				//update($data, $id)
				$manager->update($data, $id);

				$this->redirectToRoute('filter', ['cat' => $post[0]['category']]);
			}

		}

		$this->show('forum/forum_update', ['post' => $post, 'errors' => $errors]);
	}

	//Delete a Post
	public function post_delete($id)
	{
		$manager = new \Manager\PostManager();

		$post = $manager->get_post_and_author($id);

		if (isset($_POST['btn_f_delete'])) 
		{
			if($_POST['delete'] == 0 )
			{
				$this->redirectToRoute('forum_detail', ['id' => $id]);
			}

			if($_POST['delete'] == 1 )
			{
				$cat = $_SESSION['roles'][0];
				$manager->delete($id);
				$this->redirectToRoute('filter', ['cat' => $cat ]);
			}

		}

		$this->show('forum/forum_delete', ['post' => $post]);
	}

	public function search()
	{
		//Search Manager
		$smanager = new \Manager\PostManager();

		$kwrd = $_POST['inp_search'];
		$search_result = $smanager->search($kwrd);

		$this->show('forum/forum_search', ['search_result' => $search_result]);

	}

	//Répondre un sujet
	public function post_reply() 
	{
		return "ok";
	}


}