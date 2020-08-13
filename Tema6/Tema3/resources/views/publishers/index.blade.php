@extends('layouts.app')

@section('content')
    <h1>Publishers</h1>
    <table>
        <tr>
            <th>Nr.Crt.</th>
            <th>Name</th>
            <th>Status</th>
            <th>Foundation Year</th>
            <th>Origin Country</th>
            @auth('admin')
            <th>Created at</th>
            <th>Updated at</th>
            <th></th>
            <th></th>
            @endauth
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
                    @auth('admin')
                    <td>{{$publisher->created_at}}</td>
                <td>{{$publisher->updated_at}}</td>
                <td><a href="/editPublisher/{{$publisher->id}}">Edit</a></td>
                <td><form action="/deletePublisher/{{$publisher->id}}" method="POST">
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
    <button class="align_right"><a href="/createPublisher" class="btn">add a new record</a></button>
    @endauth
@stop
