<!DOCTYPE html>
<html>
<head>
    <title>Main page</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<h1>Users</h1>
<table>
    <tr>
        <th>Nr.Crt.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th></th>
        <th></th>
    </tr>
    <?php $nrCrt = 0; ?>
    @foreach ($users as $user)
        <tr>
            <?php $nrCrt++; ?>
            <td>{{$nrCrt}}</td>
                <td><a href="/user/{{$user->id}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
            <td><a href="/editUser/{{$user->id}}">Edit</a></td>
            <td><form action="/deleteUser/{{$user->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<br>
<button><a href="/index"  class="btn">Cancel</a></button>
<button class="align_right"><a href="/createUser" class="btn">add a new record</a></button>
</body>
</html>
