<!DOCTYPE html>
<html>
<head>
    <title>Main page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>{{$publisher->name}}</h1>
<h2>Status: {{$publisher->status}}</h2>
<h2>Foundation Year: {{$publisher->foundation_year}}</h2>
<h2>Origin Country: {{$publisher->origin_country}}</h2>
<table>
    <tr>
        <th>Nr.Crt.</th>
        <th>Title</th>
        <th>Author Name</th>
        <th>Publish Year</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th></th>
        <th></th>
    </tr>
    <?php $nrCrt = 0; ?>
    @foreach($publisher->books as $book)
        <tr>
            <?php $nrCrt++; ?>
            <td>{{$nrCrt}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author->name}}</td>
            <td>{{$book->publish_year}}</td>
            <td>{{$book->created_at}}</td>
            <td>{{$book->updated_at}}</td>
            <td><a href="/edit/{{$book->id}}">Edit</a></td>
            <td><form action="/delete/{{$book->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<br>
<button><a href="/publishers"  class="btn">Cancel</a></button>
</body>
</html>
