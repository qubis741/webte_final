<?php
//include 'config.php';
$URL_ROOT = "http://".$_SERVER['SERVER_NAME'].'/final';
if(isset($_GET['page'])){
        $page = $_GET['page'];
}
else {
        $page = '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final zadanie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="<?php echo $URL_ROOT; ?>/css/style.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
<?php
   // include 'menu.php';
?>
<div>
    <div class="wrap">
        <a href="<?php echo $URL_ROOT; ?>?page=kontakt">Kontakt</a>
        <?php
        switch($page) {
            case 'kontakt':
                echo 'kontakt';
                break;
            default:
                echo 'nic';
                break;
        }
        ?>
    </div>
</div>

<?php
    //include 'footer.php';
?>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="<?= $URL_ROOT?>/js/script.js"></script>
</body>
</html>