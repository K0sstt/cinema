<?php

namespace app\models;

use app\core\Model;
use app\lib\Db;

class Search extends Model {

	public function search($title) {
		$result = $this->db->row('SELECT films.id, films.title, films.year, formats.format
									FROM films, formats
									WHERE films.title = "'.$title.'" AND films.format_id = formats.id');
		return $result;
	}

	public function getActors() {
		$result = $this->db->row('SELECT films.title, actors.id, actors.first_name, actors.last_name
									FROM films, actors, films_actors
									WHERE films.id = films_actors.film_id AND actors.id = films_actors.actor_id');
		return $result;
	}

	public function getFormats() {
		$result = $this->db->row('SELECT *
									FROM formats');
		return $result;
	}

}