<?php
// create.php
require_once './autoloader.php';
require_once './database.php';

$update_mode = false;
$moviesManager = new MovieManager($db);
$genres = new GenreManager($db);

$movie = null;
$title_header = 'Ajouter un film';

require 'templates/form.php';
