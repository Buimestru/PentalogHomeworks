<?php


class Book
{
    public int $id;
    public string $title;
    public int $author_id;
    public int $publisher_id;
    public int $publish_year;
    public string $created_at;
    public ?string $updated_at;

    public Author $author;
    public Publisher $publisher;

    public function __construct()
    {
        $conn = DatabaseConnection::connection();
        $queryBuilder = new QueryBuilder($conn);
        $this->author = $queryBuilder->selectById($this->author_id, 'authors', 'Author');
        $this->publisher = $queryBuilder->selectById($this->publisher_id, 'publishers', 'Publisher');
    }
}