<!DOCTYPE html>
<html>
<head>
    <title>Edit page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Edit a record</h1>
<form method="POST" action="/updateUser/{{$user->id}}" class="form">
    @method('PUT')
    @csrf
    @if(count($errors) > 0)
        <p class="error">{{$errors->first()}}</p>
    @endif
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{$user->name}}">
    </div>
    <div>
        <label>Nationality</label>
        <input type="text" name="email" value="{{$user->email}}">
    </div>
    <div>
        <label>Born Date</label>
        <input type="text" name="address" value="{{$user->address}}">
    </div>
    <div>
        <button><a href="/users" class="btn">Cancel</a></button>
        <button class="btn" type="submit" name="edit_a_record">Edit</button>
    </div>
</form>
</body>
</html>
