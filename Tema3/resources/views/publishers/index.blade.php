<!DOCTYPE html>
<html>
<head>
    <title>Main page</title>
    <link rel="stylesheet" href="/css/style.css">
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
            <td><form action="/deletePublisher/{{$publisher->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<br>
<button><a href="/index"  class="btn">Cancel</a></button>
<button class="align_right"><a href="/createPublisher" class="btn">add a new record</a></button>
</body>
</html>
