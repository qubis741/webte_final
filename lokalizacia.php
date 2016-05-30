<?PHP

require_once("db_connect.php");

$location = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));

if(empty($location['geoplugin_city'])) {
	$location['geoplugin_city'] = "Nelokalizované mestá a vidiek";
}

require_once("navstevy_stranok.php");

?>