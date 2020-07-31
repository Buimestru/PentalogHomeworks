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
<form method="post" action="/updateAuthor/{{$author->id}}">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{$author->name}}">
    </div>
    <div>
        <label>Nationality</label>
        <input type="text" name="nationality" value="{{$author->nationality}}">
    </div>
    <div>
        <label>Born Date</label>
        <input type="date" name="born_date" value="{{$author->born_date}}">
    </div>
    <div>
        <label>Born Country</label>
        <input type="text" name="born_country" value="{{$author->born_country}}">
    </div>
    <div>
        <label>Death Date</label>
        <input type="date" name="death_date" value="{{$author->death_date}}">
    </div>
    <div>
        <label>Death Country</label>
        <input type="text" name="death_country" value="{{$author->death_country}}">
    </div>
    <div>
        <button><a href="/authors" class="btn">Cancel</a></button>
        <button class="btn" type="submit" name="edit_a_record">Edit</button>
    </div>
</form>
</body>
</html>
