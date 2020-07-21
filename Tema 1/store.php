<?php
require "connection.php";
if(isset($_POST['add_new_record'])){
    add_new_record();
}

function add_new_record() : void{
    global $conn;
    $title = text_validation($_POST['title']);
    $author = text_validation($_POST['author']);
    $publisher = text_validation($_POST['publisher']);
    $publish_year = year_validation($_POST['publish_year']);
    if(empty($title) or empty($author) or empty($publisher) or empty($publish_year)){
        echo "Please make sure that you have completed all fields";
    }else{
        $sql = "INSERT INTO books VALUES
                    (null, '$title', '$author', '$publisher', $publish_year, CURRENT_TIMESTAMP , null)";
        if($conn->exec($sql)){
            header('location: index.php');
        }else{
            echo "Database error";
        }
    }
    $conn = null;
}
