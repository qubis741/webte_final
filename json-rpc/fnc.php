<?php

class fnc {
	
	public function pocitajJSON($api, $x1, $x2, $exp) {
		global $apiKey;
		if ($api == $apiKey) {
			$str = str_replace("/"," ./",$exp);
			$str2 = str_replace("^"," .^",$str);
			
			$sum = (abs($x1) + abs($x2))*10;
			
			$cmd = "octave --q --eval 'x=linspace($x1,$x2,$sum);  printf(\"%f \", $str2)'";
			exec($cmd,$returned);
			
			
			$output = explode(" ", $returned[0]);
			
			
			return $output;
		}
		else
			return "Bad API key!";
	}
	
	
	public function pocitajJSONderivacia($api, $x1, $x2, $exp) {
		global $apiKey;
		
		if ($api == $apiKey) {
			$str = str_replace("/"," ./",$exp);
			$str2 = str_replace("^"," .^",$str);
			
			$sum = (abs($x1) + abs($x2))*10;
			
			$cmd = "octave --q --eval 'x=linspace($x1,$x2,$sum);  printf(\"%f \", diff($str2))'";
			exec($cmd,$returned);
			
			
			$output = explode(" ", $returned[0]);
			
			
			return $output;
		}
		else
			return "Bad API key!";
	}



}
?>