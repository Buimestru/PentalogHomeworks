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
<h1>Authors</h1>
<table>
    <tr>
        <th>Nr.Crt.</th>
        <th>Name</th>
        <th>Nationality</th>
        <th>Lifetime</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th></th>
        <th></th>
    </tr>
    <?php $nrCrt = 0; ?>
    @foreach ($authors as $author)
        <tr>
            <?php $nrCrt++; ?>
            <td>{{$nrCrt}}</td>
                <td><a href="/author/{{$author->id}}">{{$author->name}}</a></td>
                <td>{{$author->nationality}}</td>
                <td>{{$author->born_date}} {{$author->born_country}} -
                @if (! is_null($author->death_date))
                    {{$author->death_date}} {{$author->death_country}}
                    @else
                    present
                @endif
                </td>
                <td>{{$author->created_at}}</td>
                <td>{{$author->updated_at}}</td>
            <td><a href="/editAuthor/{{$author->id}}">Edit</a></td>
            <td><a href="/deleteAuthor/{{$author->id}}">Delete</a></td>
        </tr>
    @endforeach
</table>
<br>
<button><a href="/index"  class="btn">Cancel</a></button>
<button class="align_right"><a href="/addAuthor" class="btn">add a new record</a></button>
</body>
</html>
