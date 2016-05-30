<?php
require_once 'admin_header.php';
require_once 'global.php';
?>

<?php
	if(!isset($_SESSION)) {
		session_start();
	}
	//session_start();
	
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
			
			$query = "INSERT INTO news (headlineSK, textSK, headlineEN, textEN) VALUES (:nadpis_sk, :text_sk, :nadpis_en, :text_en)";
			$stmnt = $pdo->prepare($query);
			$stmnt->bindParam(':nadpis_sk', $nadpis_sk, PDO::PARAM_STR);
			$stmnt->bindParam(':text_sk', $text_sk, PDO::PARAM_STR);
			$stmnt->bindParam(':nadpis_en', $nadpis_en, PDO::PARAM_STR);
			$stmnt->bindParam(':text_en', $text_en, PDO::PARAM_STR);
			$stmnt->execute();
			
			sendNewsToSubs();
			
			echo "Článok pridaný";
			
		} else {
			echo "Vyplňte prosím všetky položky";
		}
		
	}

	
	

?>

<?php
//require_once 'config.php';
require_once 'global.php';
require_once 'lokalizacia.php';

$URL_ROOT = "http://".$_SERVER['SERVER_NAME'].'/final';
if(isset($_GET['page'])){
        $page = $_GET['page'];
}
else {
        $page = '';
}
?>

<div>
    <div class="wrap">
	<h3>Pridanie článku</h3>
		<div class="pridanie">
			<form id='pridaj_aktualitu' action="#" method="POST">
				<div>
					<div id='sk_container'>
						<label><span class="left_text">Nadpis SK: </span><input type='text' id='nadpis_sk' name='nadpis_sk' /></label><br />
						<label><span class="left_text">Text SK: </span><textarea class="pridanie_textarea" id='text_sk' name='text_sk'></textarea></label><br />
					</div>
					<div>
						<label><span class="left_text">Nadpis EN: </span><input type='text' id='nadpis_en' name='nadpis_en' /></label><br />
						<label><span class="left_text">Text EN: </span><textarea class="pridanie_textarea" id='text_en' name='text_en'></textarea></label><br />
					</div>
				</div>
				<label><button id="pridaj_aktualitu_submit">Pridať</button></label>
			</form>
		</div>
    </div>
</div>

<?php
    require_once 'footer.php';
?>
