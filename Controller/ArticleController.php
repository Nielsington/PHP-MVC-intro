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
        $articles = $this->getArticles();

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
        foreach ($rawArticles as $rawArticle) {
            $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date'], $rawArticle['id']);
        }

        return $articles;
    }

    public function show()
    {
        // TODO: this can be used for a detail page
        $article = $this->getOneArticle();
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
}