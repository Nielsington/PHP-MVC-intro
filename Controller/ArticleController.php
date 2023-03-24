<?php

declare(strict_types = 1);

class ArticleController
{

    private databaseManager $databaseManager;

    public function __construct($databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }
    public function index()
    {
        // Load all required data
        $articles = $this->getArticles()[0];

        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        $database = $this->databaseManager->connection;
        $query = $database->query("SELECT * FROM articles");
        $rawArticles = $query->fetchAll();

        $articles = [];
        $ids = [];
        foreach ($rawArticles as $rawArticle) {
            $ids[] = $rawArticle['id'];
            $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date'], $rawArticle['id']);
        }

        return array($articles, $ids);
    }

    public function show()
    {
        $article = $this->getOneArticle();
        $ids = $this->getArticles()[1];
        $currentId = array_search($article->id, $ids);
        require './View/articles/show.php';
    }

    private function getOneArticle()
    {
        $id = $_GET["id"];
        $database = $this->databaseManager->connection;
        $query = $database->query("SELECT * FROM articles WHERE id=$id");
        $rawArticle = $query->fetch();
        $oneArticle = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date'], $rawArticle['id']);
    
        return $oneArticle;
    }

    public function getUrl()
    {
        return '?page=articles-show&id=';
    }
}