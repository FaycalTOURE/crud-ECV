<!-- templates/show.php -->
<?php $title = $movie['movieTitle'] ?>

<?php ob_start() ?>
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Titre : <?= $movie['movieTitle'] ?>, <?= $movie['movieDesc'] ?></h5>
        <p class="card-text">Description : <?= $movie['movieDesc'] ?></p>
        <p class="card-text">Temps de diffusion : <?= $movie['movieRuntime'] ?></p>
        <p class="card-text">Certificate : <?= $movie['movieCertificate'] ?></p>
        <p class="card-text">Note : <?= $movie['movieRating'] ?></p>
        <p class="card-text">Date affichage : <?= $movie['movieReleaseDate'] ?></p>
        <a href="update.php?id=<?= $movie['movieID'] ?>" class="btn btn-primary">Modifier</a>
        <a href="delete.php?id=<?= $movie['movieID'] ?>" class="btn btn-danger">Supprimer</a>
    </div>
</div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>