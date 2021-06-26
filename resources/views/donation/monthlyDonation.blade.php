<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script type="text/javascript" src="../../js/jQuery/jquery-3.6.0.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <title>Document</title>
</head>
<body>
<script>
    $(document).ready(function () {
        //the following variable will be assigned the whole url string
        //var urlString = window.location;
        //creating a url type object. this object will help us get the data from the url string that we have passed in the url
        //var url = new URL(urlString);
        //var year = url.searchParams.get('year');
        var year = '2020';
        var dps = [];

        var chart = new CanvasJS.Chart("chartLineMonthSalesForYear", {
            animationEnabled: true,
            title: {
                text: "Monthly Sales"
            },
            data: [{
                type: "line",
                legendMarkerColor: "grey",
                yValueFormatString: "##0.00\" \"",
                indexLabel: "{label} {y}",
                dataPoints: dps
            }]
        });

        chart.render();

        $.getJSON("{{$data}}", function(data) {
            chart.data[0].set("dataPoints", data);
        });
    })
</script>
</body>
</html>
