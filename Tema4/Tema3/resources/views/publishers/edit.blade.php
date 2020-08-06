<!DOCTYPE html>
<html>
<head>
    <title>Edit page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Edit a record</h1>
<form method="POST" action="/updatePublisher/{{$publisher->id}}" class="form">
    @method('PUT')
    @csrf
    @if(count($errors) > 0)
        <p class="error">{{$errors->first()}}</p>
    @endif
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{$publisher->name}}">
    </div>
    <div>
        <label>Status</label>
        <input list="status" type="text" name="status" value="{{$publisher->status}}">
        <datalist id="status">
            <option>Active</option>
            <option>Inactive</option>
        </datalist>
    </div>
    <div>
        <label>Foundation Year</label>
        <input type="text" name="foundation_year" value="{{$publisher->foundation_year}}">
    </div>
    <div>
        <label>Origin Country</label>
        <input type="text" name="origin_country" value="{{$publisher->origin_country}}">
    </div>
    <div>
        <button><a href="/publishers" class="btn">Cancel</a></button>
        <button class="btn" type="submit" name="edit_a_record">Edit</button>
    </div>
</form>
</body>
</html>
