@extends('layouts.app')

@section('content')
    <h1>Add new book</h1>
    <form action="/store" method="post" class="form">
        @csrf
        @if(count($errors) > 0)
            <p class="error">{{$errors->first()}}</p>
        @endif
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>
        <div>
            <label for="author">Author</label>
            <select id="author" name="author">
                @foreach($authors as $author)
                <option>{{$author->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="publisher">Publisher Name</label>
            <select id="publisher" name="publisher">
                @foreach($publishers as $publisher)
                    <option>{{$publisher->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Publish Year</label>
            <input type="text" name="publish_year" value="{{ old('publish_year') }}">
        </div>
        <div>
            <button><a href="/index"  class="btn">Cancel</a></button>
            <button type="submit" name="add_new_record" class="btn">Add</button>
        </div>
    </form>
@stop
