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
    <div class="wrap" style="padding: 16px 0;">
        <?php
        switch($page) {
            case 'home':
                require_once 'home.php';
                break;
            case 'app':
                require_once 'application.php';
                break;
            case 'f_service':
                require_once 'f_service.php';
                break;
            case 's_service':
                require_once 's_service.php';
                break;
            case 'news':
                require_once 'news.php';
                break;
            case 'report':
                require_once 'report.php';
                break;
            case 'contact':
                require_once 'contact.php';
                break;
            default:
                require_once 'home.php';
        }
        ?>
    </div>
</div>

<?php
    require_once 'footer.php';
?>
