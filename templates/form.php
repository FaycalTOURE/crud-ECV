<!-- templates/show.php -->
<?php $title = $title_header ?>

<?php
    if($update_mode && isset($_POST['submit'])){
        if (isset($_POST)) {
            // Current
            $movie = array_merge($_POST, array('movieID' => intval($movie['movieID'])));

            foreach ($movie as $key => $line){
                $movie[$key] = trim($line);
            }

            // New with class to prevent
            $current_movie = new MovieClass($movie);
            $current_movie->setID($movie['movieID']);
            $current_movie->setMovieReleaseDate(date(trim($movie['movieReleaseDate'])));

            $moviesManager->update_movie($current_movie);
        }
    }else{
        if (isset($_POST['submit']) && isset($_POST)) {

            foreach ($_POST as $key => $line){
                $_POST[$key] = trim($line);
            }

            // New with class to prevent
            $current_movie = new MovieClass($_POST);
            $moviesManager->add_movie($current_movie);
        }
    }
?>

<?php ob_start() ?>

<form method="post" name="clientForm" class="needs-validation" novalidate>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="movieTitle">Titre</label>
            <input type="text" class="form-control"  name="movieTitle" id="movieTitle" value="<? if(isset($movie['movieTitle'])) : ?><?=trim($movie['movieTitle']); ?> <? endif; ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="movieDesc">Description</label>
            <input type="text" class="form-control" name="movieDesc" id="movieDesc" value="<? if(isset($movie['movieDesc'])) : ?> <?= trim($movie['movieDesc']); ?> <? endif; ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="movieRating">Note</label>
            <input type="text" class="form-control"  name="movieRating" id="movieRating" value="<? if(isset($movie['movieRating'])) : ?><?=trim($movie['movieRating']); ?> <? endif; ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="movieReleaseDate">Date</label>
            <input type="text" placeholder="1994-10-14" class="form-control" name="movieReleaseDate" id="movieReleaseDate" value="<? if(isset($movie['movieReleaseDate'])) : ?> <?= trim($movie['movieReleaseDate']); ?> <? endif; ?>" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="movieRuntime">Temps diffusion</label>
            <div class="input-group">
                <input type="text" name="movieRuntime" class="form-control" value="<? if(isset($movie['movieRuntime'])) : ?> <?= trim($movie['movieRuntime']); ?> <? endif; ?>" id="movieRuntime" required>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <label for="movieCertificate">Certificat</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="glyphicon glyphicon-phone">Phone</span>
                    </span>
                </div>
                <input type="movieCertificate" name="movieCertificate" value="<? if(isset($movie['movieCertificate'])) : ?> <?= trim($movie['movieCertificate']); ?> <? endif; ?>" class="form-control" id="movieCertificate" required>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" name="submit" type="submit">Sauvegarder</button>
</form>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>