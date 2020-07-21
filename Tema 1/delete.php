<?php
if(isset($_GET['delete_id'])){
    deleteRecord($_GET['delete_id']);
}
function deleteRecord($id) : void{
    global $conn;
    $id = intval($id);
    $sql = "DELETE FROM books WHERE id=".$id.";";
    if($conn->exec($sql)){
        header('location: index.php');
    }else{
        echo "Database error";
    }
    $conn = null;
}