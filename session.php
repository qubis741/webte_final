<?php
if(!isset($_SESSION['langSet']))
    $_SESSION['lang'] = 'sk';
else{
    if(isset($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'];
        $_SESSION['langSet'] = 1;
    }
}
?>