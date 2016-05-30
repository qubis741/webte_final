<?php


	if(!isset($_SESSION)) {
		session_start();
	}
	
	if(isset($_SESSION['session_username'])) {
		header("Location: admin.php");
	}
	
	
	if(isset($_POST['login'])) {
		include_once("db_connect.php");
		$session_username = $_POST['session_username'];
		$query = "SELECT * FROM admin WHERE username='{$session_username}' LIMIT 1";
		$stmnt = $pdo->prepare($query);
		$stmnt->execute();
		$row = $stmnt->fetch();
		
		$db_password = $row['password'];
		$id = $row['id'];
		$meno = $row['meno'];
		$priezvisko = $row['priezvisko'];
		
		$password = $_POST['password'];		
		
		if(crypt($password, "$2a$07") == $db_password) {
			$_SESSION['session_username'] = $session_username;
			$_SESSION['id'] = $id;
			$_SESSION['meno'] = $meno;
			$_SESSION['priezvisko'] = $priezvisko;
			$_SESSION['type'] = 'reg';
			
			//$query = "INSERT INTO Prihlasenia (pouzivatel_id, typ, cas) VALUES ({$id}, 'reg', NOW())";
			//$pdo->query($query);
			
			
			
			
			header("Location: admin.php");			
		} else {
			echo "Zadali ste nesprávne prihlasovacie údaje";
		}
	}

?>

<?php
//require_once 'config.php';
require_once 'global.php';
require_once 'db_connect.php';
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
        <h3>Prihlásenie</h3>
		<form action="login.php" method="post" enctype="multipart/form-data">
			<input placeholder="Prihlasovacie meno" class="login" name="session_username" type="text" class="login_input" autofocus><br />
			<input placeholder="Heslo" class="login" name="password" type="password" class="login_input"><br />
			<input name="login" class="login" type="submit" value="Prihlásiť" class="login_button">
		</form>
        
    </div>
</div>

<?php
    require_once 'footer.php';
?>
