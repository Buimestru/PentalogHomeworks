<!DOCTYPE html>
<html>
<head>
    <title>Create page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Add new user</h1>
<form action="/storeUser" method="post" class="form">
    @csrf
    @if(count($errors) > 0)
        <p class="error">{{$errors->first()}}</p>
    @endif
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{old('name')}}">
    </div>
    <div>
        <label>Email</label>
        <input type="text" name="email" value="{{old('email')}}">
    </div>
    <div>
        <label>Address</label>
        <input type="text" name="address" value="{{old('address')}}">
    </div>
        <button><a href="/users"  class="btn">Cancel</a></button>
        <button type="submit" name="add_new_record" class="btn">Add</button>
    </div>
</form>
</body>
</html>
