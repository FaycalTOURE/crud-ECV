<?php
// show.php
require_once './autoloader.php';
require_once './database.php';


$moviesManager = new MovieManager($db);
$genres = new GenreManager($db);

$movie = $moviesManager->get_movie_by_id($_GET['id']);
$title_header = $movie['movieTitle'];

require 'templates/show.php';
