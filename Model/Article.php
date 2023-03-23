<?php

declare(strict_types=1);

class Article
{
    public string $title;
    public ?string $description;
    public ?string $publishDate;
    public int $id;

    public function __construct(string $title, ?string $description, ?string $publishDate, int $id)
    {
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
        $this->id = $id;
    }

    public function formatPublishDate($format = 'd-m-Y  H:i:s A')
    {
        $formatDate = date($format, strtotime($this->publishDate));
        return $formatDate;

    }
}