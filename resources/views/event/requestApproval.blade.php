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
    <title>Document</title>
</head>
<body>
<div align="center">
    @foreach($events as $event)
        <form action="" method="post">
            <table align="center">
                <tr>
                    <td>
                        <img src="https://image.shutterstock.com/image-photo/creative-ideas-bring-money-white-260nw-1610211523.jpg" alt="" height="200" width="300">
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>{{$event['title']}} <input type="text" hidden name="eventTitle" value="{{$event['title']}}"></h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: #237fab">Target Amount: </label><strong>{{$event['targetAmount']}}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>commission: </strong> <input type="text" name="commission">
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Select Manager</strong>
                        <select name="managerUserId">
                            @foreach($managers as $manager)
                                <option value="{{$manager['userId']}}" name="{{$manager['userId']}}">{{$manager['userName']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: #ab237e">Requested Starting date: </label><strong>{{$event['startDate']}}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: #393c06">Choose Starting date: </label><input type="date" name="startDate">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: #ab237e">Requested Closing date: </label><strong>{{$event['endDate']}}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="color: #393c06">Choose Ending date: </label><input type="date" name="endDate">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>
                        <input type="submit" class="btn btn-success" value="Accept Event">
                        <a href="/eventDetails" class="btn btn-info">Check Details</a>
                        <a href="" style="color: lightskyblue" class="btn btn-danger">Remove Event</a>
                    </td>
                </tr>
            </table>
        </form>
        <hr>
        <br>
    @endforeach
</div>
</body>
</html>
