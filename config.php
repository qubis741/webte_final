<?php
	$user = 'setnicka';
	$pass = 'setnicka1';
	$host = 'localhost';
	$dbname = 'prvadb';
//news
$link = @mysql_connect('localhost', 'kovacik1', '123456');
if(!$link){
	echo('Error connecting to the database: ' . mysql_error());
	exit();
}
$db = @mysql_selectdb('final');
if(!$db){
	echo('Error selecting database: ' . mysql_error());
	exit();
}
mysql_set_charset('utf8');
//news
?>