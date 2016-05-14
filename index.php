<?php
require_once 'config.php';
require_once 'global.php';
$URL_ROOT = "http://".$_SERVER['SERVER_NAME'].'/final';
if(isset($_GET['page'])){
        $page = $_GET['page'];
}
else {
        $page = '';
}
?>
<?php
require_once 'header.php';
?>
<div>
    <div class="wrap">
        <?php
        switch($page) {
            case 'kontakt':
                echo 'kontakt';
                break;
            default:
                require_once 'test.php';
                break;
        }
        ?>
    </div>
</div>

<?php
    require_once 'footer.php';
?>
