<!DOCTYPE html>
<html>
<head>
    <title>Edit page</title>
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
<h1>Edit a record</h1>
<form method="post" action="/updatePublisher/{{$publisher->id}}">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{$publisher->name}}">
    </div>
    <div>
        <label>Status</label>
        <input list="status" type="text" name="status" value="{{$publisher->status}}">
        <datalist id="status">
            <option>Active</option>
            <option>Inactive</option>
        </datalist>
    </div>
    <div>
        <label>Foundation Year</label>
        <input type="text" name="foundation_year" value="{{$publisher->foundation_year}}">
    </div>
    <div>
        <label>Origin Country</label>
        <input type="text" name="origin_country" value="{{$publisher->origin_country}}">
    </div>
    <div>
        <button><a href="/publishers" class="btn">Cancel</a></button>
        <button class="btn" type="submit" name="edit_a_record">Edit</button>
    </div>
</form>
</body>
</html>
