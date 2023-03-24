<?php require 'View/includes/header.php'?>

<?php 
    global $databaseManager; 
    $url = (new ArticleController($databaseManager))->getUrl();
?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li><a href="<?=$url.$article->id?>"><?=$article->title?></a> (<?= $article->formatPublishDate() ?>)</li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'?>