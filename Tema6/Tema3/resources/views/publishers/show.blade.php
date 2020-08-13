@extends('layouts.app')

@section('content')
    <h1>{{$publisher->name}}</h1>
    <h3>Status: {{$publisher->status}}</h3>
    <h3>Foundation Year: {{$publisher->foundation_year}}</h3>
    <h3>Origin Country: {{$publisher->origin_country}}</h3>
    <table>
        <tr>
            <th>Nr.Crt.</th>
            <th>Title</th>
            <th>Author Name</th>
            <th>Publish Year</th>
            @auth('admin')
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
            <th></th>
            @endauth
        </tr>
        <?php $nrCrt = 0; ?>
        @foreach($publisher->books as $book)
            <tr>
                <?php $nrCrt++; ?>
                <td>{{$nrCrt}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author->name}}</td>
                <td>{{$book->publish_year}}</td>
                    @auth('admin')
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
    <button><a href="/publishers"  class="btn">Cancel</a></button>
@stop
