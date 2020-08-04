<!DOCTYPE html>
<html>
<head>
    <title>Edit page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Edit a record</h1>
<form method="POST" action="/updateAuthor/{{$author->id}}" class="form">
    @method('PUT')
    @csrf
    @if(count($errors) > 0)
        <p class="error">{{$errors->first()}}</p>
    @endif
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{$author->name}}">
    </div>
    <div>
        <label>Nationality</label>
        <input type="text" name="nationality" value="{{$author->nationality}}">
    </div>
    <div>
        <label>Born Date</label>
        <input type="date" name="born_date" value="{{$author->born_date}}">
    </div>
    <div>
        <label>Born Country</label>
        <input type="text" name="born_country" value="{{$author->born_country}}">
    </div>
    <div>
        <label>Death Date</label>
        <input type="date" name="death_date" value="{{$author->death_date}}">
    </div>
    <div>
        <label>Death Country</label>
        <input type="text" name="death_country" value="{{$author->death_country}}">
    </div>
    <div>
        <button><a href="/authors" class="btn">Cancel</a></button>
        <button class="btn" type="submit" name="edit_a_record">Edit</button>
    </div>
</form>
</body>
</html>
