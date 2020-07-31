<!DOCTYPE html>
<html>
<head>
    <title>Main page</title>
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

        .align_right{
            float: right;
        }
    </style>
</head>
<body>
<h1>Publishers</h1>
<table>
    <tr>
        <th>Nr.Crt.</th>
        <th>Name</th>
        <th>Status</th>
        <th>Foundation Year</th>
        <th>Origin Country</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th></th>
        <th></th>
    </tr>
    <?php $nrCrt = 0; ?>
    @foreach ($publishers as $publisher)
        <tr>
            <?php $nrCrt++; ?>
            <td>{{$nrCrt}}</td>
            <td><a href="/publisher/{{$publisher->id}}">{{$publisher->name}}</a></td>
            <td>{{$publisher->status}}</td>
            <td>{{$publisher->foundation_year}}</td>
                <td>{{$publisher->origin_country}}</td>
                <td>{{$publisher->created_at}}</td>
            <td>{{$publisher->updated_at}}</td>
            <td><a href="/editPublisher/{{$publisher->id}}">Edit</a></td>
            <td><a href="/deletePublisher/{{$publisher->id}}">Delete</a></td>
        </tr>
    @endforeach
</table>
<br>
<button><a href="/index"  class="btn">Cancel</a></button>
<button class="align_right"><a href="/addPublisher" class="btn">add a new record</a></button>
</body>
</html>
