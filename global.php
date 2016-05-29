<?php
if(isset($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
}
if(isset($_SESSION['lang']))
    $lang = $_SESSION['lang'];
else
    $lang = 'sk';

$langText = simplexml_load_file('./langs.xml');
function getContentText($page,$element){
    global $langText, $lang;
    return $langText->$page->$element->$lang;
}

function sendNewsToSubs(){


	$newsSK = mysql_query("SELECT headlineSK,textSK FROM news order by timestamp desc limit 1");
	$subsSK = mysql_query("SELECT email FROM subscribers WHERE jazyk = 'SK' AND verification = 1");

	$newsEN = mysql_query("SELECT headlineEN,textEN FROM news order by timestamp desc limit 1");
	$subsEN = mysql_query("SELECT email FROM subscribers WHERE jazyk = 'EN' AND verification = 1");


	if (mysql_num_rows($subsSK) > 0 ){
    	while($row = mysql_fetch_object($subsSK))
    	{
    		$newssSK = mysql_fetch_object($newsSK);

		    $messg1 =  "<br><br><p>Odoberanie mozete zrusit kliknutim na tento link:</p> ";
		    $messg1 = $messg1 . "<a href='http://147.175.98.168/final/?page=news&zmail=" .  $row->email . "'> Zrusenie</a></body></html>";
			mail($row->email,$newssSK->headlineSK,$newssSK->textSK . $messg1,"Content-type: text/html; charset=utf8");
    	}
    }
    
    if (mysql_num_rows($subsEN) > 0 ){
    	while($row = mysql_fetch_object($subsEN))
    	{
    		$newssEN = mysql_fetch_object($newsEN);

		    $messg2 =  "<br><br><p>Odoberanie mozete zrusit kliknutim na tento link:</p> ";
		    $messg2 = $messg2 . "<a href='http://147.175.98.168/final/?page=news&zmail=" .  $row->email . "'> Zrusenie</a></body></html>";
			mail($row->email,$newssEN->headlineEN,$newssEN->textEN . $messg2,"Content-type: text/html; charset=utf8");
    	}
    }
}
?>