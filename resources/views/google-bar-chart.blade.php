<!doctype html>
<html lang="en">
  <head>
    <title>Laravel 10 Google Bar Chart Example Tutorial - Tutsmake.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
</head>
  <body>
    <h2 style="text-align: center;">Laravel 10 Google Bar Charts Example Tutorial - Tutsmake.com</h2>
    <div class="container-fluid p-5">
    <div id="barchart_material" style="width: 100%; height: 500px;"></div>
    </div>
 
    <script type="text/javascript">
 
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
 
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Order Id', 'Price', 'Product Name'],
 
            @php
              foreach($orders as $order) {
                  echo "['".$order->id."', ".$order->price.", ".$order->Product_name."],";
              }
            @endphp
        ]);
 
        var options = {
          chart: {
            title: 'Bar Graph | Price',
            subtitle: 'Price, and Product Name: @php echo $orders[0]->created_at @endphp',
          },
          bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
 
</body>
</html>