@extends('layouts.app')

@section('content')
    <h1>Add new author</h1>
    <form action="/storeAuthor" method="post" class="form">
        @csrf
        @if(count($errors) > 0)
            <p class="error">{{$errors->first()}}</p>
        @endif
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{old('name')}}">
        </div>
        <div>
            <label>Nationality</label>
            <input type="text" name="nationality" value="{{old('nationality')}}">
        </div>
        <div>
            <label>Born Date</label>
            <input type="date" name="born_date" value="{{old('born_date')}}">
        </div>
        <div>
            <label>Born Country</label>
            <input type="text" name="born_country" value="{{old('born_country')}}">
        </div>
        <div>
            <label>Death Date</label>
            <input type="date" name="death_date" value="{{old('death_date')}}">
        </div>
        <div>
            <label>Death Country</label>
            <input type="text" name="death_country" value="{{old('death_country')}}">
        </div>
        <div>
            <button><a href="/authors"  class="btn">Cancel</a></button>
            <button type="submit" name="add_new_record" class="btn">Add</button>
        </div>
    </form>
@stop
