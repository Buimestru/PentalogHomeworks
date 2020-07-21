<?php
require "update.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Edit a record</h1>
    <?php $record_id = $_GET['id']; $recordDetails = getRecordDetails($record_id); ?>
    <form method="post" action="update.php?record_id=<?php echo $record_id ?>">

        <div>
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $recordDetails['title'] ?>" required>
        </div>
        <div>
            <label>Author</label>
            <input type="text" name="author" value="<?php echo $recordDetails['author_name'] ?>" required>
        </div>
        <div>
            <label>Publisher Name</label>
            <input type="text" name="publisher" value="<?php echo $recordDetails['publisher_name'] ?>" required>
        </div>
        <div>
            <label>Publish Year</label>
            <input type="text" name="publish_year" value="<?php echo $recordDetails['publish_year'] ?>" required>
        </div>
        <div>
            <button><a href="index.php" class="btn">Cancel</button>
            <button class="btn" type="submit" name="edit_a_record">Edit</button>
        </div>
    </form>
</body>
</html>
