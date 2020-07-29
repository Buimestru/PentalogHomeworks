<?php

class Controller
{
    protected PDO $pdo;
    protected QueryBuilder $query;

    public function __construct()
    {
        $this->pdo = DatabaseConnection::connection();
        $this->query = new QueryBuilder($this->pdo);
    }

    public function index()
    {
        $books = $this->query->selectAll('books', 'Book');
        require 'views' . DIRECTORY_SEPARATOR . 'index.view.php';
    }

    public function create()
    {
        require 'views' . DIRECTORY_SEPARATOR . 'create.view.php';
    }

    public function store()
    {
        $inputData['title'] = $_POST['title'];
        $inputData['author'] = $_POST['author'];
        $inputData['publisher'] = $_POST['publisher'];
        $inputData['publish_year'] = $_POST['publish_year'];

        $this->query->insert($inputData);

        header("Location: index");
    }

    public function edit()
    {
        $id = intval($_GET['id']);
        $book = $this->query->selectById($id, 'books', 'Book');
        require 'views' . DIRECTORY_SEPARATOR . 'edit.view.php';
    }

    public function update()
    {
        $updateData['id'] = intval($_POST['id']);
        $updateData['title'] = $_POST['title'];
        $updateData['author'] = $_POST['author'];
        $updateData['publisher'] = $_POST['publisher'];
        $updateData['publish_year'] = $_POST['publish_year'];

        $this->query->updateById($updateData);

        header("Location: index");

    }

    public function delete()
    {
        $id = intval($_GET['id']);
        $this->query->deleteById($id);

        header("Location: index");
    }
}