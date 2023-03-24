<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here ?>

<section>
    <h1><?= $article->title ?></h1>
    <p><?= $article->formatPublishDate() ?></p>
    <p><?= $article->description ?></p>

    <a href="?page=articles-show&id=<?= $ids[$currentId-1] ?>">Previous article</a>
    <a href="?page=articles-show&id=<?= $ids[$currentId+1] ?>">Next article</a>
</section>

<?php require 'View/includes/footer.php'?>