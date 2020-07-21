<?php
require "delete.php";
function table_content(){
    global $conn;
    $lines = "";

    $stmt = $conn->prepare("SELECT * FROM books");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    $nrCrt = 0;
    foreach($results as $result) {
        $nrCrt ++;
        $id = $result['id'];
        $title = $result['title'];
        $author = $result['author_name'];
        $publisher = $result['publisher_name'];
        $publish_year = $result['publish_year'];
        $created_at = $result['created_at'];
        $updated_at = $result['updated_at'];
        $lines = $lines."<tr><td>$nrCrt</td><td>$title</td><td>$author</td><td>$publisher</td><td>$publish_year</td>
                         <td>$created_at</td><td>$updated_at</td>";
        $lines = $lines."<td><a href=\"edit.php?id=$id\" class=\"btn\">edit</a></td>
                         <td><a href=\"index.php?delete_id=$id\" class=\"btn\">delete</a></td></tr>";
    }
    $conn = null;
    return $lines;
}
