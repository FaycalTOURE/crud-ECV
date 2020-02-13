<!-- templates/list.php -->
<?php $title = 'List of Movies' ?>

<?php ob_start() ?>
<ul class="list-group">
    <?php foreach ($movies as $movie): ?>
        <li class="list-group-item">
            <a href="show.php?id=<?= $movie['movieID'] ?>">
                <?= $movie['movieTitle'] ?>
            </a>
        </li>
    <?php endforeach ?>
    <a href="create.php" class="btn btn-primary">Ajouter un nouveau film</a>
</ul>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>