<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller {
	
	public function indexAction() {
		$films = $this->model->getFilms();
		$actors = $this->model->getActors();
		$formats = $this->model->getFormats();
		$vars = [
			'films' => $films,
			'actors' => $actors,
			'formats' => $formats
		];
		$this->view->render($vars); 
	}

	public function addAction() {
		if($_POST['film']) {

			$films = $this->model->getFilms();
			$is_film = false;

			foreach($films as $film) {
				if($_POST == $film['title']) {
					$is_film = true;
				}
			}
			
			if($is_film) {
				$params = ['title' => $_POST['film'],
							'year' => $_POST['year'],
							'format_id' => $_POST['format_id']];
					
				$this->model->add($params);
			}
			
		}

		$this->view->redirect();
	}

	public function editAction() {
		
		if($_POST['button'] == 'update') {
			$film = [];
			$query = ['update' => '',
						'set' => '',
						'where' => ''];
			$params = [];

			$films = $this->model->getFilms();
			$actors = $this->model->getActors();
			$formats = $this->model->getFormats();

			foreach($films as $item) {
				if($item['id'] == $_POST['film_id']) {
					$film = $this->model->getFilm($item['id']);
					$film['actors'] = $this->model->getActorsByFilm($item['id']);
				}
			}

			if($film[0]['title'] != $_POST['film']) {
				$query = ['update' => 'film',
							'set' => 'film = :film',
							'where' => 'film.id = '.$_POST['film_id']];

				$params['film'] = $_POST['film'];
			}

			if($film[0]['year'] != $_POST['year']) {
				if($query['set'] != '') {
					$query['set'] .= ', year = :year';
				} else {
					$query = ['update' => 'film',
								'set' => 'year = :year',
								'where' => 'film.id = '.$_POST['film_id']];
				}

				$params['year'] = $_POST['year'];
			}

			if($film[0]['format_id'] != $_POST['format_id']) {
				if($query['set'] != '') {
					$query['set'] .= ', format_id = :format_id';
				} else {
					$query = ['update' => 'film',
								'set' => 'format_id = :format_id',
								'where' => 'film.id = '.$_POST['film_id']];
				}

				$params['format_id'] = $_POST['format_id'];
			}

			if($params != '') {
				$this->model->update($query, $params);
			}

			for($i = 0; $i < count($film['actors']); $i++) {
				if($film['actors'][$i]['first_name'] != $_POST['first_name_'.++$i]) {
					$query = ['update' => 'actors',
								'set' => 'first_name = :first_name',
								'where' => 'actors.id = '.$_POST['actor_id_'.++$i]];
				}

				if($film['actors'][$i]['last_name'] != $_POST['last_name_'.++$i]) {
					if($query['set'] == '') {
						$query = ['update' => 'actors',
								'set' => 'last_name = :last_name',
								'where' => 'actors.id = '.$_POST['actor_id_'.++$i]];

						$params['first_name'] = $_POST['first_name_'.++$i];
					} else {
						$query['set'] .= ', last_name = :last_name';

						$params['last_name'] = $_POST['last_name_'.++$i];
					}
				}

				if($query['set'] != '') {
					$this->model->update($query, $params);
					$query = ['update' => '',
								'set' => '',
								'where' => ''];
				}
			}

			if($_POST['new_first_name'] || $_POST['new_last_name']) {
				$params = ['first_name' => $_POST['new_first_name'],
							'last_name' => $_POST['new_last_name']];

				$this->model->addActor($params, $_POST['film_id']);
			}
			
		}

		if($_POST['button'] == 'delete') {
			$this->model->delete($_POST['film_id']);
		}

		if($_POST['button'] == 'delete_actor') {
			$this->model->deleteActor($_POST['delete_actor']);
		}

		$this->view->redirect();
		
	}

}

?>