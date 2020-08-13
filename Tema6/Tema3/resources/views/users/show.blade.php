@extends('layouts.app')

@section('content')
    <h1>{{$user->name}}</h1>
    <h3>Email: {{$user->email}}</h3>
    <h3>Address: {{$user->address}}</h3>
    <h2>Borrowing History</h2>
    <table>
        <tr>
            <th>Nr.Crt.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Borrowed At</th>
            <th>Borrowed Until</th>
            <th>Returned At</th>
        </tr>
        <?php $nrCrt = 0; ?>
        @foreach($user->borrowedBooks as $borrowedBook)
            <tr>
                <?php $nrCrt++; ?>
                    <td>{{$nrCrt}}</td>
                    <td>{{$borrowedBook->title}}</td>
                    <td>{{$borrowedBook->author->name}}</td>
                    <td>{{$borrowedBook->publisher->name}}</td>
                    <td>{{$borrowedBook->pivot->borrowed_at}}</td>
                    <td>{{$borrowedBook->pivot->borrowed_until}}</td>
                    <td>{{$borrowedBook->pivot->returned_at}}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <button><a href="/users"  class="btn">Cancel</a></button>
    @auth('web')
    <button><a href="/createBorrowing/{{$user->id}}" class="btn">availableBooks</a></button>
    @endauth
@stop
