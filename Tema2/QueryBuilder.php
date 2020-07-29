<?php

class QueryBuilder
{
    protected ?PDO $connection = null;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function __destruct() {
        $this->connection = null;
    }

    public function selectAll(string $table, string $class) {
        $statement = $this->connection->prepare("SELECT * FROM " . $table);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, "$class");
    }

    public function selectById(int $id, string $table, string $class) {
        $statement = $this->connection->prepare("SELECT * FROM " . $table . " WHERE `id` = ?");
        $statement->execute([$id]);
        $result = $statement->fetchAll(PDO::FETCH_CLASS, "$class")[0];

        return $result;
    }

    public function insertIfNotExistsAndReturnId($name, $table): int {
        $statement = $this->connection->prepare("SELECT id FROM " . $table . " WHERE trim(name)=trim(:r_name)");
        $statement->bindParam(':r_name', $name);
        $statement->execute();
        $id = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($id) === 0) {
            $statement = $this->connection->prepare("INSERT INTO " . $table . " VALUES (NULL, :r_name)");
            $statement->bindParam(':r_name', $name);
            $statement->execute();
            $statement = $this->connection->prepare("SELECT id FROM " . $table . " WHERE trim(name)=trim(:r_name)");
            $statement->bindParam(':r_name', $name);
            $statement->execute();
            $id = $statement->fetchAll(PDO::FETCH_ASSOC);
            $id = intval($id[0]['id']);
        } else {
            $id = intval($id[0]['id']);
        }
        return $id;
    }

    public function insert(array $parameters) {
        // If the author name is not in the table we will add it
        $author_id = $this->insertIfNotExistsAndReturnId($parameters['author'], 'authors');

        // If the publisher name is not in the table we will add it
        $publisher_id = $this->insertIfNotExistsAndReturnId($parameters['publisher'], 'publishers');

        $statement = $this->connection->prepare("INSERT INTO `books` VALUES 
                                        (NULL, :title, :author_id, :publisher_id, :publish_year, CURRENT_TIMESTAMP , NULL)");

        $statement->bindParam(':title', $parameters['title']);
        $statement->bindParam(':author_id', $author_id);
        $statement->bindParam(':publisher_id', $publisher_id);
        $statement->bindParam(':publish_year', $parameters['publish_year']);

        $statement->execute();
    }

    public function updateById(array $parameters) {

        // If the author name is not in the table we will add it
        $author_id = $this->insertIfNotExistsAndReturnId($parameters['author'], 'authors');

        // If the publisher name is not in the table we will add it
        $publisher_id = $this->insertIfNotExistsAndReturnId($parameters['publisher'], 'publishers');

        $statement = $this->connection->prepare("
            UPDATE `books` 
                SET 
                    `title` = :title, 
                    `author_id` = :author_id,
                    `publisher_id` = :publisher_id, 
                    `publish_year` = :publish_year, 
                    `updated_at` = CURRENT_TIMESTAMP 
                WHERE 
                    `id` = :id
            ");

        $statement->bindParam(':id', $parameters['id']);
        $statement->bindParam(':title', $parameters['title']);
        $statement->bindParam(':author_id', $author_id);
        $statement->bindParam(':publisher_id', $publisher_id);
        $statement->bindParam(':publish_year', $parameters['publish_year']);

        $statement->execute();
    }

    public function deleteById(int $id) {
        $statement = $this->connection->prepare("DELETE FROM `books` WHERE `id` = :id");
        $statement->bindParam(':id', $id);

        $statement->execute();
    }
}