<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>User List</title>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <td>User Name</td>
                <td>Email</td>
                <td>Type</td>
                <td></td>
            </tr>
            </thead>

            <tbody>
            @foreach($result as $user)
                <tr style="background-color: #a0aec0">
                    <td>{{$user['userName']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['type']}}</td>
                    <td><a href="/user/profile/{{$user['userId']}}" class="btn btn-success">Check Profile</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
