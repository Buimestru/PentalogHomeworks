@extends('layouts.app')

@section('content')
    <h1>Edit a record</h1>
    <form method="post" action="/update/{{$book->id}}" class="form">
        @method('PUT')
        @csrf
        @if(count($errors) > 0)
            <p class="error">{{$errors->first()}}</p>
        @endif
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{$book->title}}">
        </div>
        <div>
            <label for="author">Author</label>
            <select id="author" name="author">
                @foreach($authors as $author)
                    @if($author->name === $book->author->name)
                        <option selected>{{$book->author->name}}</option>
                    @else
                        <option>{{$author->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div>
            <label for="publisher">Publisher Name</label>
            <select id="publisher" name="publisher">
                @foreach($publishers as $publisher)
                    @if($publisher->name === $book->publisher->name)
                        <option selected>{{$book->publisher->name}}</option>
                    @else
                        <option>{{$publisher->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div>
            <label>Publish Year</label>
            <input type="text" name="publish_year" value="{{$book->publish_year}}">
        </div>
        <div>
            <button><a href="/index" class="btn">Cancel</a></button>
            <button class="btn" type="submit" name="edit_a_record">Edit</button>
        </div>
    </form>
@endsection
