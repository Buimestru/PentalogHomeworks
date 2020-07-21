<?php require "connection.php";
    require "display_content.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Main page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Book Records</h1>
    <table>
        <tr>
            <th>Nr.Crt.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher Name</th>
            <th>Publish Year</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            <th></th>
        </tr>
        <?php echo table_content(); ?>
    </table>
    <br>
    <button class="align_right"><a href="create.php" class="btn">add a new record</a></button>
</body>
</html>
