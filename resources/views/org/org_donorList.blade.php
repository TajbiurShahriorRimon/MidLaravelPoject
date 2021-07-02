<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/org_dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/org_donorlist.css')}}">
    <title>list</title>
</head>
<body>
    @include('org.navbar')
    <center>
        <h2>Donor list</h2>
        <br>
        <table border="0">
            <tr>
                <td><b>Donor ID</b></td>
                <td><b>Amount</b></td>
                <td><b>Date</b></td>
            </tr>
            @foreach ($donor as $user)
            <tr>
                <td>{{$user['userId']}}</td>
                <td>{{$user['Amount']}}</td>
                <td>{{$user['date']}}</td>
            </tr>
        @endforeach
        </table>
       
        
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>