@extends('layouts.app')

@section('content')
    <h1>Authors</h1>
    <table>
        <tr>
            <th>Nr.Crt.</th>
            <th>Name</th>
            <th>Nationality</th>
            <th>Lifetime</th>
            @auth('admin')
            <th>Created at</th>
            <th>Updated at</th>
            <th></th>
            <th></th>
            @endauth
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
                    @auth('admin')
                    <td>{{$author->created_at}}</td>
                    <td>{{$author->updated_at}}</td>
                    <td><a href="/editAuthor/{{$author->id}}">Edit</a></td>
                    <td><form action="/deleteAuthor/{{$author->id}}" method="POST">
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
    <button><a href="/index"  class="btn">Cancel</a></button>
    @auth('admin')
    <button class="align_right"><a href="/createAuthor" class="btn">add a new record</a></button>
    @endauth
@stop
