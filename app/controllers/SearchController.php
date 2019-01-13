<?php

namespace app\controllers;

use app\core\Controller;

class SearchController extends Controller {

	public function indexAction() {

		$film = $this->model->search(trim($_POST['search']));
		$film = $film[0];
		$actors = $this->model->getActors();
		$formats = $this->model->getFormats();
		
		$vars = [
			'film' => $film,
			'actors' => $actors,
			'formats' => $formats
		];
		$this->view->render($vars); 
	}

}