<!DOCTYPE html>
<html>
<head>
    <title>Edit page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Edit a record</h1>
<form method="post" action="update">
    <input type="hidden" name="id" value="<?php echo $book->id;?>"/>
    <div>
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $book->title ?>" required>
    </div>
    <div>
        <label>Author</label>
        <input type="text" name="author" value="<?php echo $book->author->name ?>" required>
    </div>
    <div>
        <label>Publisher Name</label>
        <input type="text" name="publisher" value="<?php echo $book->publisher->name ?>" required>
    </div>
    <div>
        <label>Publish Year</label>
        <input type="text" name="publish_year" value="<?php echo $book->publish_year ?>" required>
    </div>
    <div>
        <button><a href="index" class="btn">Cancel</button>
        <button class="btn" type="submit" name="edit_a_record">Edit</button>
    </div>
</form>
</body>
</html>
