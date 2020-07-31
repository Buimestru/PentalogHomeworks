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
    </style>
</head>
<body>
    <h1>{{$author->name}}</h1>
    <h2>Nationality: {{$author->nationality}}</h2>
    <h2>Born: {{$author->born_date}} {{$author->born_country}}</h2>
    @if (! is_null($author->death_date))
        <h2>Died: {{$author->death_date}} {{$author->death_country}}</h2>
    @endif
    <table>
        <tr>
            <th>Nr.Crt.</th>
            <th>Title</th>
            <th>Publisher Name</th>
            <th>Publish Year</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            <th></th>
        </tr>
        <?php $nrCrt = 0; ?>
        @foreach($author->books as $book)
            <tr>
                <?php $nrCrt++; ?>
                <td>{{$nrCrt}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->publisher->name}}</td>
                <td>{{$book->publish_year}}</td>
                <td>{{$book->created_at}}</td>
                <td>{{$book->updated_at}}</td>
                <td><a href="/edit?id={{$book->id}}">Edit</a></td>
                <td><a href="/delete?id={{$book->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>
    <br>
    <button><a href="/authors"  class="btn">Cancel</a></button>
</body>
</html>
