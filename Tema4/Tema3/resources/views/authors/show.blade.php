<!DOCTYPE html>
<html>
<head>
    <title>Main page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>{{$author->name}}</h1>
    <h3>Nationality: {{$author->nationality}}</h3>
    <h3>Born: {{$author->born_date}} {{$author->born_country}}</h3>
    @if (! is_null($author->death_date))
        <h3>Died: {{$author->death_date}} {{$author->death_country}}</h3>
    @endif
    <table>
        <tr>
            <th>Nr.Crt.</th>
            <th>Title</th>
            <th>Publisher Name</th>
            <th>Publish Year</th>
            @auth()
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            <th></th>
            @endauth
        </tr>
        <?php $nrCrt = 0; ?>
        @foreach($author->books as $book)
            <tr>
                <?php $nrCrt++; ?>
                <td>{{$nrCrt}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->publisher->name}}</td>
                <td>{{$book->publish_year}}</td>
                    @auth()
                <td>{{$book->created_at}}</td>
                <td>{{$book->updated_at}}</td>
                <td><a href="/edit/{{$book->id}}">Edit</a></td>
                <td><form action="/delete/{{$book->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>
                    @endauth
            </tr>
        @endforeach
    </table>
    <br>
    <button><a href="/authors"  class="btn">Cancel</a></button>
</body>
</html>
