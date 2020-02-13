<?php

require_once './autoloader.php';
require_once './database.php';


$moviesManager = new MovieManager($db);
$genres = new GenreManager($db);

$movies = $moviesManager->get_all_movies();

$title_header = 'BDD Vidéo-thèque';
require 'templates/list.php';