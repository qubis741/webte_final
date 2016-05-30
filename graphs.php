<html>
  <head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </head>
  <body>
   

  <form method="POST" class="service">
    Zadajte výraz:<br>
    <input type="text" name="expression" value="x+3"><br>
    Zadajte API kľúč:<br>
    <input type="text" name="API" ><br>
    Zadajte začiatočnú súradnicu:<br>
    <input type="number" name="x1" value="0"><br>
    Zadajte poslednú súradnicu:<br>
    <input type="number" name="x2" value="20"><br>
    <input type="submit" name="Submitt"value="Vypočítaj hodnoty" class="redButton">
    <!--<input type="submit" name="Submittt"value="Vypočítaj deriváciu" class="redButton">-->
  </form>
  <a href="./export.csv" style="<?php if(empty($_POST['Submitt']) && empty($_POST['Submittt'])) echo 'display:none;'?> margin: 6px 0 ;" class="redButton">Exportujte do CSV</a>
  <div id="curve_chart" style="width: 900px; height: 500px"></div>
  <div id="curve_chart_2" style="width: 900px; height: 500px"></div>



<?php       
    require_once 'json-rpc/jsonRPCClient.php';
    $fnc = new jsonRPCClient('http://147.175.98.147/final_zaloha/json-rpc/server.php');

  
  if (!empty($_POST['Submitt'])) {
    $expression = $_POST['expression'];
    $x1= $_POST['x1'];
    $x2 = $_POST['x2'];
    $api = $_POST['API'];
    
    $result = $fnc->pocitajJSON($api, $x1, $x2, $expression);
    $result_d = $fnc->pocitajJSONderivacia($api, $x1, $x2, $expression);
    
    $x1_fnc = $x1;
    $x2_fnc = $x2;
    $file = fopen('./export.csv',"w");
    fputcsv($file,$result,";");
    fclose($file);

  }
?>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        //funkcionalita pre funkciu
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'X');
        data.addColumn('number', 'Funkcia');

        var x = [<?php 
          for ($i = 0; $i < sizeof($result); $i++) {
            if($i == sizeof($result) - 1)
              echo $result[$i];
            else
              echo $result[$i].",";
          }
        ?>];

        var options = {
          hAxis: {
            title: 'X - axis'
          },
          vAxis: {
            title: 'Y - axis'
          },
          title: 'Priebeh funkcie',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        var j = <?php echo $x1_fnc; ?>;
        for (var i = 0; i < x.length;i++) {
          if(j < <?php echo $x2_fnc; ?>){
            data.addRow([j,x[i]]);
            j = j + 0.1;
          }
        };
        chart.draw(data, options);

        //funkcionalita pre derivaciu
        var data1 = new google.visualization.DataTable();
        data1.addColumn('number', 'X');
        data1.addColumn('number', 'Funkcia');

        var x = [<?php 
          for ($i = 0; $i < sizeof($result_d); $i++) {
            if($i == sizeof($result_d) - 1)
              echo $result_d[$i];
            else
              echo $result_d[$i].",";
          }
        ?>];

        var options1 = {
          hAxis: {
            title: 'X - axis'
          },
          vAxis: {
            title: 'Y - axis'
          },
          title: 'Priebeh derivacie',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart1 = new google.visualization.LineChart(document.getElementById('curve_chart_2'));

        var j = <?php echo $x1_fnc; ?>;
        for (var i = 0; i < x.length;i++) {
          if(j < <?php echo $x2_fnc; ?>){
            data1.addRow([j,x[i]]);
            j = j + 0.1;
          }
        };
        chart1.draw(data1, options1);
      }
    </script>

  </body>
</html>
