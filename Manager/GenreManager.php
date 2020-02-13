<?php

class GenreManager
{
    private $db;
    private $current_table_name = 'genre';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add_movie(GenreClass $movie)
    {
        $q = $this->db->prepare('INSERT INTO ' . $this->current_table_name . '(genreID, genreType, genreDesc) VALUES(:genreID, :genreType, :genreDesc)');

        $q->bindValue(':genreID', $movie->getID());
        $q->bindValue(':genreType', $movie->getMovieTitle());
        $q->bindValue(':genreDesc', $movie->getMovieDesc());

        $movie->hydrate([
            'genreId' => $this->db->lastInsertId()
        ]);

        $q->execute();
    }

    public function count_movie()
    {
        return $this->db->query('SELECT COUNT(*) FROM ' .$this->current_table_name)->fetchColumn();
    }

    public function update_movie(MovieClass $movie)
    {
        $q = $this->db->prepare('UPDATE '.$this->current_table_name.' SET genreId = :genreId, genreType = :genreType, genreDesc = :genreDesc WHERE genreID = :genreID');

        $q->bindValue(':genreID', $movie->getID());
        $q->bindValue(':genreType', $movie->getMovieTitle());
        $q->bindValue(':genreDesc', $movie->getMovieDesc());

        $q->execute();
    }

    public function delete_movie(GenreClass $movie)
    {
        $this->db->exec('DELETE FROM ' .$this->current_table_name. ' WHERE genreID = '.$movie->getID());
    }

    public function get_all_movies()
    {
        $result = $this->db->query('SELECT *  FROM '.$this->current_table_name);

        $clients = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $clients[] = $row;
        }
        return $clients;
    }

    public function get_movie_by_id(MovieClass $movie)
    {
        $q = $this->db->prepare('SELECT * FROM ' .$this->current_table_name. ' WHERE genreID = :genreID');
        $q->bindValue(':genreID', $movie->getId(), PDO::PARAM_INT);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}