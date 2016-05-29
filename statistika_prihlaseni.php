<?php
	
	if(!isset($_SESSION)) {
		session_start();
	}
	
	if(!isset($_SESSION['session_username'])) {
		header("Location: login.php");
	}
	
	require_once 'db_connect.php';
	
?>

<?php
require_once 'admin_header.php';
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
	<h3>Štatistika prihlásení</h3>
		<div class="statistika_container">
			<div id="krajiny">
				<table id="navstevy">
					<tr><th>Krajina</th><th>Zástava</th><th>Počet návštevníkov</th></tr>
					<?php
						$query = "SELECT stat, COUNT(stat) as pocet FROM Navstevy_stranok GROUP BY stat";
						$stmnt = $pdo->prepare($query);
						$stmnt->execute();
						
						$results = $stmnt->fetchAll();
						
						foreach($results as $row) {
							
							$vlajka = "http://www.geonames.org/flags/x/" . strtolower($row['stat']) . ".gif";
							$stat = $row['stat'];
							echo "<tr><td>" . $row['stat'] . "</td><td class='vlajka_td'><a href='navstevy_mesta.php?stat=$stat'><image class='vlajka' src='$vlajka'></a></td><td class='align_right_td'>" . $row['pocet'] . "</td></tr>";
						}					
					?>
				</table>
			</div>
			<div id="ip_adresy">
				<table id="navstevy">
					<tr><th>Ip adresa</th><th>Štát</th><th>Mesto</th></tr>
					<?php
						$query = "SELECT ip_adresa, stat, mesto FROM Navstevy_stranok";
						$stmnt = $pdo->prepare($query);
						$stmnt->execute();
						
						$results = $stmnt->fetchAll();
						
						foreach($results as $row) {
							
							$vlajka = "http://www.geonames.org/flags/x/" . strtolower($row['stat']) . ".gif";
							$stat = $row['stat'];
							echo "<tr><td>" . $row['ip_adresa'] . "</td><td>" . $row['stat'] . "</td><td>" . $row['mesto'] . "</td></tr>";
						}					
					?>
				</table>
			
			
			</div>
		</div>
    </div>
</div>

<?php
    require_once 'footer.php';
?>
