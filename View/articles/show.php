<?php require 'View/includes/header.php'?>

<?php 
    global $databaseManager; 
    $url = (new ArticleController($databaseManager))->getUrl();
    $lastPage = count($ids)-1;

    if ($currentId === 0) {
        $previousPage = $ids[0];
        $nextPage = $ids[$currentId+1];
    } 
    elseif ($currentId === $lastPage) {
        $previousPage = $ids[$currentId-1];
        $nextPage = $ids[$lastPage];
    } 
    else {
        $previousPage = $ids[$currentId-1];
        $nextPage = $ids[$currentId+1];
    }
?>

<section>
    <h1><?= $article->title ?></h1>
    <p><?= $article->formatPublishDate() ?></p>
    <p><?= $article->description ?></p>

    <a href="<?= $url?> <?= $previousPage ?>">Previous article</a>
    <a href="<?= $url?> <?= $nextPage ?>">Next article</a>
</section>

<?php require 'View/includes/footer.php'?>