<?php

class MovieManager
{
    private $db;
    private $current_table_name = 'movie';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add_movie(MovieClass $movie)
    {
        $movie->hydrate([
            'ID' => ($this->count_movie() + 1 ) // $this->db->lastInsertId()
        ]);

        $q = $this->db->prepare('INSERT INTO ' . $this->current_table_name . '(movieID, movieTitle, movieDesc, movieRuntime, movieCertificate, movieRating, movieReleaseDate) VALUES(:movieID, :movieTitle, :movieDesc, :movieRuntime, :movieCertificate, :movieRating, :movieReleaseDate)');

        $q->bindValue(':movieID', $movie->getID());
        $q->bindValue(':movieTitle', $movie->getMovieTitle());
        $q->bindValue(':movieDesc', $movie->getMovieDesc());
        $q->bindValue(':movieRuntime', $movie->getMovieRuntime());
        $q->bindValue(':movieCertificate', $movie->getMovieCertificate());
        $q->bindValue(':movieRating', $movie->getMovieRating());
        $q->bindValue(':movieReleaseDate', date("Y-m-d"));

        $q->execute();
    }

    public function count_movie()
    {
        return $this->db->query('SELECT COUNT(*) FROM ' . $this->current_table_name)->fetchColumn();
    }

    public function update_movie(MovieClass $movie)
    {
        $date =  new DateTime($movie->getMovieReleaseDate());
        $q = $this->db->prepare('UPDATE '. $this->current_table_name .' SET movieID = :movieID, movieTitle = :movieTitle, movieDesc = :movieDesc, movieRuntime = :movieRuntime, movieCertificate = :movieCertificate, movieRating = :movieRating, movieReleaseDate = :movieReleaseDate WHERE movieID = :movieID');

        $q->bindValue(':movieID', $movie->getID());
        $q->bindValue(':movieTitle', $movie->getMovieTitle());
        $q->bindValue(':movieDesc', $movie->getMovieDesc());
        $q->bindValue(':movieRuntime', $movie->getMovieRuntime());
        $q->bindValue(':movieCertificate', $movie->getMovieCertificate());
        $q->bindValue(':movieRating', $movie->getMovieRating());
        $q->bindValue(':movieReleaseDate', $date->format('Y-m-d'));

        $q->execute();
    }

    public function delete_movie($movieID)
    {
        $this->db->exec('DELETE FROM ' . $this->current_table_name. ' WHERE movieID ='.$movieID);
    }

    public function get_all_movies()
    {
        $result = $this->db->query('SELECT *  FROM '.$this->current_table_name);

        $movies = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $movies[] = $row;
        }
        return $movies;
    }

    public function get_movie_by_id($movieId)
    {
        $q = $this->db->prepare('SELECT * FROM ' . $this->current_table_name . ' WHERE movieID = :movieID');
        $q->bindValue(':movieID', $movieId, PDO::PARAM_INT);
        $q->execute();

        $row = $q->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}