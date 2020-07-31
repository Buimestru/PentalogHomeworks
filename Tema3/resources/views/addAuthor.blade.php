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
<h1>Add new author</h1>
<form action="/storeAuthor" method="post">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <label>Nationality</label>
        <input type="text" name="nationality">
    </div>
    <div>
        <label>Born Date</label>
        <input type="date" name="born_date">
    </div>
    <div>
        <label>Born Country</label>
        <input type="text" name="born_country">
    </div>
    <div>
        <label>Death Date</label>
        <input type="date" name="death_date">
    </div>
    <div>
        <label>Death Country</label>
        <input type="text" name="death_country">
    </div>
        <button><a href="/authors"  class="btn">Cancel</a></button>
        <button type="submit" name="add_new_record" class="btn">Add</button>
    </div>
</form>
</body>
</html>
