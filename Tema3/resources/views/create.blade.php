<!DOCTYPE html>
<html>
<head>
    <title>Create page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {background-color:#f5f5f5;}
        form {
            width: 40%;
            margin: 0px auto;
            padding: 20px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 0px 0px 10px 10px;
        }

        div {
            margin: 10px 0px 10px 0px;
        }

        div label {
            display: block;
            text-align: left;
            margin: 3px;
        }

        div input {
            height: 30px;
            width: 93%;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }

        h1 {
            text-align: center;
        }

        .btn{
            text-decoration-line: none;
        }

        a:visited{
            color: blue;
        }

        button{
            color: blue;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Add new book</h1>
<form action="/store" method="post">
    @csrf
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
        <button><a href="/index"  class="btn">Cancel</a></button>
        <button type="submit" name="add_new_record" class="btn">Add</button>
    </div>
</form>
</body>
</html>
