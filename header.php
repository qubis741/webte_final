<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/general.css">
   <!-- <link rel="stylesheet" href="./css/content.css">-->
</head>
<body>

<div class="header" id="respoTrigger">
    <div class="wrap">
        <div class="respoHead flexBox">
            <a href="index.php" class="logo">

            </a>
            <div class="menuOn">

            </div>
        </div>
        <div class="respoBg"></div>
        <ul class="nav flexBox">
            <li class="logo">
                <div class="menuOff">
                </div>
            </li>
            <?php
             $menu = simplexml_load_file('./menu.xml');
            foreach($menu->level_1->stuff as $lvl1){
                $out = '';
               if(isset($lvl1->level_2)){
                   $out = '<li class="sub">
                   <a >'.$lvl1->$lang.'</a>
                   <ul class="submenu">';
                   foreach($lvl1->level_2->stuff as $lvl2){
                       $out.= '<li><a href="?page='.$lvl2->link.'">'.$lvl2->$lang.'</a></li>';
                   }
                    $out.= '</ul></li>';

               }
                else {
                    $out = '<li><a href="?page='.$lvl1->link.'">'.$lvl1->$lang.'</a></li>';
                }
                echo $out;
            }
            ?>
        </ul>
        <div class="langs">
            <a href="?lang=sk">SK</a> |
            <a href="?lang=en">ENG</a>
        </div>
    </div>
</div>