<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to your dashboard</h1>
    <table class="table">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$data->first_name}}</td>
                <td>{{$data->email}}</td>
                <td><a href="{{route('logout')}}">Log out</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>