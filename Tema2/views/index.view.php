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
    <?php  $nrCrt = 0;
           foreach($books as $book):?>
        <tr>
            <td><?php $nrCrt++;  echo $nrCrt; ?></td>
            <td><?php echo $book->title;?></td>
            <td><?php echo $book->author->name;?></td>
            <td><?php echo $book->publisher->name;?></td>
            <td><?php echo $book->publish_year;?></td>
            <td><?php echo $book->created_at;?></td>
            <td><?php echo $book->updated_at;?></td>
            <td><a href="edit?id=<?php echo $book->id;?>">Edit</a></td>
            <td><a href="delete?id=<?php echo $book->id;?>">Delete</a></td>
        </tr>
    <?php endforeach;?>
</table>
<br>
<button class="align_right"><a href="create" class="btn">add a new record</a></button>
</body>
</html>
