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
<?php
   include 'header.php';
?>
<div>
    <div class="wrap">
        <!--<a href="<?php /*echo $URL_ROOT; */?>?page=kontakt">Kontakt</a>-->
        <?php
        switch($page) {
            case 'kontakt':
                echo 'kontakt';
                break;
            default:
                echo 'Content';
                break;
        }
        ?>
    </div>
</div>

<?php
    include 'footer.php';
?>
