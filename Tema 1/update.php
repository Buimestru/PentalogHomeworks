<?php
require  "connection.php";


if(isset($_GET['record_id'])){
    updateRecord($_GET['record_id']);
}

function getRecordDetails($id) : Array{
    global $conn;
    $id = intval($id);
    $stmt = $conn->prepare("SELECT * FROM books WHERE id=".$id.";");
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results = $stmt->fetchAll();
    $result = $results[0];
    $conn = null;
    return $result;
}

function updateRecord($id): void{
    global $conn;
    $id = intval($id);
    $title = text_validation($_POST['title']);
    $author = text_validation($_POST['author']);
    $publisher = text_validation($_POST['publisher']);
    $publish_year = year_validation($_POST['publish_year']);
    if(empty($title) or empty($author) or empty($publisher) or empty($publish_year)){
        echo "Please make sure that you have completed all fields";
    }else{
        $sql = "UPDATE books SET title='$title', author_name='$author', publisher_name='$publisher',
                publish_year=$publish_year, updated_at=CURRENT_TIMESTAMP WHERE id=".$id.";";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            header('location: index.php');
        }else{
            echo "Database error";
        }
    }
    $conn = null;
}
