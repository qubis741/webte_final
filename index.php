<?php
include 'config.php';
include 'session.php';
$URL_ROOT = "http://".$_SERVER['SERVER_NAME'].'/final';
if(isset($_GET['page'])){
        $page = $_GET['page'];
}
else {
        $page = '';
}
?>
<?php
   include 'header.php';
?>
<div>
    <div class="wrap">
        <?php
        /*switch($page) {
            case 'kontakt':
                echo 'kontakt';
                break;
            default:
                echo 'Content';
                break;
        }*/
        ?>
    </div>
</div>

<?php
    include 'footer.php';
?>
