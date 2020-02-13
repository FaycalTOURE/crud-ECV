<?php

// update.php
require_once './autoloader.php';
require_once './database.php';

$update_mode = true;

$moviesManager = new MovieManager($db);
$genres = new GenreManager($db);

$movie = $moviesManager->get_movie_by_id($_GET['id']);
$title_header = 'Modifier : ' .  $movie['movieTitle'];

require 'templates/form.php';
