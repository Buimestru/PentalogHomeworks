<!DOCTYPE html>
<html>
<head>
    <title>Create page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Add new book</h1>
<form action="store" method="post">

    <div>
        <label>Title</label>
        <input type="text" name="title" required>
    </div>
    <div>
        <label>Author</label>
        <input type="text" name="author" required>
    </div>
    <div>
        <label>Publisher Name</label>
        <input type="text" name="publisher" required>
    </div>
    <div>
        <label>Publish Year</label>
        <input type="text" name="publish_year" required>
    </div>
    <div>
        <button><a href="index"  class="btn">Cancel</button>
        <button type="submit" name="add_new_record" class="btn">Add</button>
    </div>
</form>
</body>
</html>
