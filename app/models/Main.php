<?php

namespace app\models;

use app\core\Model;
use app\lib\Db;

class Main extends Model {

	public function getFilms() {
		$result = $this->db->row('SELECT films.id, films.title, films.year, formats.format, GROUP_CONCAT(actors.first_name, " ", actors.last_name) AS actors
									FROM films
									INNER JOIN formats ON films.format_id = formats.id
									INNER JOIN films_actors ON films.id = films_actors.film_id
									INNER JOIN actors ON actors.id = films_actors.actor_id
									GROUP BY films.id');
		return $result;
	}

	public function getFilm($id) {
		$result = $this->db->row('SELECT films.title, films.year, films.format_id
									FROM films
									WHERE films.id = '.$id);
		return $result;
	}

	public function getActors() {
		$result = $this->db->row('SELECT films.title, actors.id, actors.first_name, actors.last_name
									FROM films, actors, films_actors
									WHERE films.id = films_actors.film_id AND actors.id = films_actors.actor_id');
		return $result;
	}

	public function getActorsByFilm($id) {
		$result = $this->db->row('SELECT actors.id, actors.first_name, actors.last_name
									FROM actors
									INNER JOIN films_actors ON films_actors.film_id = '.$id.' AND films_actors.actor_id = actors.id');
		return $result;
	}

	public function getFormats() {
		$result = $this->db->row('SELECT *
									FROM formats');
		return $result;
	}

	public function add($params) {
		$this->db->query('INSERT INTO films(title, year, format_id) VALUES (:title, :year, :format_id)', $params);
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

?>