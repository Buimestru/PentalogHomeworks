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
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 0 0 10px 10px;
        }

        div {
            margin: 10px 0 10px 0;
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
<h1>Add new publisher</h1>
<form action="/storePublisher" method="post">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="status">Status</label>
        <input list="option" type="text" name="status" id="status">
        <datalist id="option">
            <option>Active</option>
            <option>Inactive</option>
        </datalist>
    </div>
    <div>
        <label for="foundation_year">Foundation Year</label>
        <input type="text" name="foundation_year" id="foundation_year">
    </div>
    <div>
        <label for="origin_country">Origin Country</label>
        <input type="text" name="origin_country" id="origin_country">
    </div>
    <div>
    <button><a href="/publishers"  class="btn">Cancel</a></button>
    <button type="submit" name="add_new_record" class="btn">Add</button>
    </div>
</form>
</body>
</html>
