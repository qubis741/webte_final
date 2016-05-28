
<?php


	$page = basename(__FILE__, '.php');


	if (isset($_POST['odoberanie'])) {		
		$query = "SELECT email FROM subscribers where email = '" . $_POST['mail'] . "'";
		echo "<br><br>";
		$m = mysql_fetch_object(mysql_query($query))->email;
		if(!$m){
			mysql_query("INSERT INTO subscribers (name,email,jazyk) VALUES ('" . $_POST['name'] . "','" . $_POST['mail'] . "','" . $_POST['jazyk'] . "')") ;
			echo "Odoberanie zaregistrovane<br>";
		    $msg = "Prosim potrvrdte odoberanie cez mail: " . "<a href='?page=aktuality&pmail=" . $_POST['mail'] . "'> Potvrdenie</a>";
		    $msg = $msg . "<br><br>Odoberanie mozete zrusit kliknutim na tento link: ";
		    $msg = $msg . "<a href='?page=aktuality&zmail=" . $_POST['mail'] . "'> Zrusenie</a>";
			mail($_POST['mail'],"Odoberanie noviniek",$msg);
		}
		else{
			echo "Odoberanie na tento mail je uz aktivne";
		}
	}

	if(isset($_GET['pmail'])){
		mysql_query("UPDATE subscribers SET verification = 1 where email = '" . $_GET['pmail'] . "'"); 
		echo "Odoberanie potvrdene";
	}

	if(isset($_GET['zmail'])){
		mysql_query("DELETE FROM subscribers where email = '" . $_GET['zmail'] . "'"); 
		echo "Odoberanie zrusene";
	}
?>

<h3><?php echo getContentText($page,'h3');?></h3>
<form id="odoberanie-box" method="post">
    <b>Odoberanie noviniek</b>
  	<br><br>
  	Meno:<br>
  	<input type="text" name="name"><br>
  	Email:<br>
  	<input type="text" name="mail"><br>
  	Jazyk:   
  	<select name="jazyk">
	    <option value="ENG">ENG</option>
	    <option value="SK">SK</option>
	</select>
	<br><br>
 	<input type="submit" value="Potvrd" name="odoberanie">
</form>
<br><br>
<div class='aktuality'>
<?php
	
	$query = "SELECT headline, text, timestamp FROM news ORDER BY timestamp DESC";
	$result = @mysql_query($query);
	if(!$result){
	   echo('Error selecting news: ' . mysql_error());
	   exit();
	}
	if (mysql_num_rows($result) > 0){
    	while($row = mysql_fetch_object($result))
    	{
    	?>
    		
   			<font size="-1"><span style="line-height: 0.2;"><h2><?php echo  $row->headline . "</h2><p>Čas pridania: " . $row->timestamp ; ?></p></span>
   			<div class="aktuality-box">
   				<div class="aktuality-text">
   					<p><?php echo $row->text; ?></p>
   				</div>
   			</div>
   			</font>
   			<br>
    	<?php
    	}
	}
	else{	
		?>
			<font size="-2">No news in the database</font>
		<?php
	}
	mysql_close($link); 
?>
<br>
</div>