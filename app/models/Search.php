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
	
	public function addActor($params, $film_id) {
		$this->db->query('INSERT INTO actors(first_name, last_name) VALUES (:first_name, :last_name)', $params);
		$ids = ['film_id' => $_POST['film_id'],
				'actor_id' => $this->db->lastInsertId()];
		$this->db->query('INSERT INTO films_actors(film_id, actor_id) VALUES (:film_id, :actor_id)', $ids);
	}

	public function update($query, $params) {
		$this->db->query('UPDATE '.$query['update'].' SET '.$query['set'].' WHERE '.$query['where'], $params);
	}

	public function delete($id) {
		$this->db->query('DELETE FROM films WHERE films.id = '.$id);
		$this->db->query('DELETE FROM films_actors WHERE films_actors.film_id = '.$id);
	}

	public function deleteActor($id) {
		$this->db->query('DELETE FROM actors WHERE actors.id = '.$id);
		$this->db->query('DELETE FROM films_actors WHERE films_actors.actor_id = '.$id);
	}

}