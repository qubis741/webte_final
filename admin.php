<?php
	session_start();
	
	if(!isset($_SESSION['session_username'])) {
		header("Location: login.php");
	}
	
	require_once 'db_connect.php';
	
	if(isset($_POST['nadpis_sk'])) {

		if(!empty($_POST['nadpis_sk']) && !empty($_POST['text_sk']) && !empty($_POST['nadpis_en']) && !empty($_POST['text_en'])) {
			
			$nadpis_sk = $_POST['nadpis_sk'];
			$text_sk = $_POST['text_sk'];
			$nadpis_en = $_POST['nadpis_en'];
			$text_en = $_POST['text_en'];
			
			$query = "INSERT INTO aktuality (nadpis_sk, text_sk, nadpis_en, text_en) VALUES ('$nadpis_sk', '$text_sk', '$nadpis_en', '$text_en')";
			$stmnt = $pdo->prepare($query);
			$stmnt->execute();
			
		} else {
			echo "Vyplnte prosim vsetky polozky";
		}
		
	}

	
	

?>

<?php
require_once 'config.php';
require_once 'global.php';

$URL_ROOT = "http://".$_SERVER['SERVER_NAME'].'/final';
if(isset($_GET['page'])){
        $page = $_GET['page'];
}
else {
        $page = '';
}
?>
<?php
require_once 'admin_header.php';
?>
<div>
    <div class="wrap">
		<div class="pridanie">
			<form id='pridaj_aktualitu' action="#" method="POST">
				<label><span class="left_text">Nadpis SK: </span><input type='text' id='nadpis_sk' name='nadpis_sk' /></label><br />
				<label><span class="left_text">Text SK: </span><textarea id='text_sk' name='text_sk'></textarea></label><br />
				<label><span class="left_text">Nadpis EN: </span><input type='text' id='nadpis_en' name='nadpis_en' /></label><br />
				<label><span class="left_text">Text EN: </span><textarea id='text_en' name='text_en'></textarea></label><br />
				<label><button id="pridaj_aktualitu_submit">Pridať</button></label>
			</form>
		</div>
    </div>
</div>

<?php
    require_once 'footer.php';
?>
