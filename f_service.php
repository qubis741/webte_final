<h3 class="contentHeading"><span class="red"><?php echo getContentText('f_service','h3');?></span></h3>
<p>Služba je vytvorená prostredníctvom JSON-RPC, pre výpočet je potrebné zadať API kľúč (abc123), zadať rozsah pre os x, pre ktore sa ma hodnota vypočítať a samozrejem funkciu, pre ktorú bude tento výpočet urobený.
	Následne stačí stlačiť tlačidlo pre výpočet hodnôt, resp. pre výpočet derivácie. Záleží od toho, ktoré hodnoty potrebujete.</p>
<form method="POST">
  Zadajte výraz:<br>
  <input type="text" name="expression" value="x+3"><br>
   Zadajte API kľúč:<br>
  <input type="text" name="API" ><br>
   Zadajte začiatočnú súradnicu:<br>
  <input type="number" name="x1" value="0"><br>
  Zadajte poslednú súradnicu:<br>
  <input type="number" name="x2" value="20"><br>  
  <input type="submit" name="Submitt"value="Vypočítaj hodnoty">
  <input type="submit" name="Submittt"value="Vypočítaj deriváciu">
</form>

 


<?php 			
		require_once 'json-rpc/jsonRPCClient.php';
		$fnc = new jsonRPCClient('http://147.175.98.168/final/json-rpc/server.php');	

	
	if (!empty($_POST['Submitt'])) {
		$expression = $_POST['expression'];
		$x1= $_POST['x1'];
		$x2 = $_POST['x2'];
		$api = $_POST['API'];
		
		$result = $fnc->pocitajJSON($api, $x1, $x2, $expression);
			echo "Arr1: result is: ";
	
	}
	
	if (!empty($_POST['Submittt'])) {
		$expression = $_POST['expression'];
		$x1= $_POST['x1'];
		$x2 = $_POST['x2'];
		$api = $_POST['API'];
		
		$result = $fnc->pocitajJSONderivacia($api, $x1, $x2, $expression);
			echo "Arr1: result is: ";
	
	}
		
	if(isset($result )) {
		if(!isset($_SESSION)) {
			session_start();
		}
					$_SESSION['csv'] = $result;
					print_r($result);
					
	}
	
	
	if (!empty($_POST['Submit'])) {
		
		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename="export.csv";');
		session_start();
		$arr = $_SESSION['csv'];

		$file = fopen('php://output',"w");

		foreach ($arr as $line)
		  {
		  fputcsv($file,explode(' ',$line));
		  }

		fclose($file);
		session_destroy();

	} 
		
			
?>




<form method="POST">
  Exportujte do CSV:<br>
  <input type="submit" name="Submit"value="Export">
</form>