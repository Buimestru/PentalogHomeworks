<!DOCTYPE html>
<html>
<head>
    <title>Create page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Add new publisher</h1>
<form action="/storePublisher" method="post" class="form">
    @csrf
    @if(count($errors) > 0)
        <p class="error">{{$errors->first()}}</p>
    @endif
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" {{old('name')}}>
    </div>
    <div>
        <label for="status">Status</label>
        <input list="option" type="text" name="status" id="status" value="{{old('status')}}">
        <datalist id="option">
            <option>Active</option>
            <option>Inactive</option>
        </datalist>
    </div>
    <div>
        <label for="foundation_year">Foundation Year</label>
        <input type="text" name="foundation_year" id="foundation_year" value="{{old('foundation_year')}}">
    </div>
    <div>
        <label for="origin_country">Origin Country</label>
        <input type="text" name="origin_country" id="origin_country" value="{{old('origin_country')}}">
    </div>
    <div>
    <button><a href="/publishers"  class="btn">Cancel</a></button>
    <button type="submit" name="add_new_record" class="btn">Add</button>
    </div>
</form>
</body>
</html>
