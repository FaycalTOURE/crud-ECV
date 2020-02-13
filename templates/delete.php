<!-- templates/delete.php -->
<?php $title = $movie['movieTitle'] ?>

<?php ob_start() ?>

<? if (isset($movie)) :?>
    <?php
        $moviesManager->delete_movie($movie['movieID']);
    ?>
<? endif; ?>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>