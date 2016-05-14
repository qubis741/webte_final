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

?>