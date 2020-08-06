<!DOCTYPE html>
<html>
<head>
    <title>Main page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Borrowing History</h1>
<table>
    <tr>
        <th>Nr.Crt.</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>Book Title</th>
        <th>Book Author</th>
        <th>Borrowed At</th>
        <th>Borrowed Until</th>
        <th>Returned At</th>
        <th></th>
    </tr>
    <?php $nrCrt = 0; ?>
    @foreach($borrowings as $borrowing)
        <tr>
            <?php $nrCrt++; ?>
            <td>{{$nrCrt}}</td>
            <td>{{$borrowing->user->name}}</td>
            <td>{{$borrowing->user->email}}</td>
            <td>{{$borrowing->book->title}}</td>
            <td>{{$borrowing->book->author->name}}</td>
            <td>{{$borrowing->borrowed_at}}</td>
            <td>{{$borrowing->borrowed_until}}</td>
            <td>{{$borrowing->returned_at}}</td>
            <td>
                @if($borrowing->returned_at === null)
                    <form method="POST" action="/updateBorrowing/{{$borrowing->id}}">
                    @method('PUT')
                    @csrf
                        <button type="submit">Add to returned</button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
</table>
<br>
<button><a href="/index"  class="btn">Cancel</a></button>
</body>
</html>
