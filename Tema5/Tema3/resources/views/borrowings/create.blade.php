@extends('layouts.app')

@section('content')
    <h1>Available Books</h1>
    <table>
        <tr>
            <th>Nr.Crt.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher Name</th>
            <th>Publish Year</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
        </tr>
        <?php $nrCrt = 0; ?>
        @foreach($available_books as $book)
            <tr>
                <?php $nrCrt++; ?>
                <td>{{$nrCrt}}</td>
                <td>{{$book->title}}</td>
                <td><a href="/author/{{$book->author_id}}">{{$book->author->name}}</a></td>
                <td><a href="/publisher/{{$book->publisher_id}}">{{$book->publisher->name}}</a></td>
                <td>{{$book->publish_year}}</td>
                <td>{{$book->created_at}}</td>
                <td>{{$book->updated_at}}</td>
                <td>
                    <form action="/storeBorrowing" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user_id}}"/>
                        <input type="hidden" name="book_id" value="{{$book->id}}"/>
                        <button type="submit">Add to borrowings</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <button><a href="/user/{{$user_id}}"  class="btn">Cancel</a></button>
@stop
