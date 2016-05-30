<?php
require_once 'config.php';
if(isset($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
}
if(isset($_SESSION['lang']))
    $lang = $_SESSION['lang'];
else
    $lang = 'sk';

$langText = simplexml_load_file('langs.xml');

function getContentText($page,$element){
    global $langText, $lang;
    return $langText->$page->$element->$lang;
}

function createRSS(){

    global $langText, $lang;

    $handle = fopen("rss.xml", "w");

    $rssNews = mysql_query("SELECT headline". $lang ." headline,text". $lang ." text FROM news order by timestamp desc");
    mysql_set_charset('utf8');

    if (mysql_num_rows($rssNews) > 0 ){
        $data = '<?xml version="1.0" encoding="UTF-8" ?>';
                $data .= '<rss version="2.0">';
                        $data .= '<channel>';
                            $data .= '<title>Aktuality</title>';
                            $data .= '<link>http://147.175.98.168/final/?page=news</link>';
                            $data .= '<description>RSS aktuality</description>';
    while($row = mysql_fetch_object($rssNews))
    {
        
                    $data .= '<item>';
                        $data .= '<title>'. $row->headline .'</title>';
                        $data .= '<link>http://147.175.98.168/final/?page=news</link>';
                        $data .= '<description>'.$row->text.'</description>';
                    $data .= '</item>';
                
    }
                $data .= '</channel>';
        $data .= '</rss> ';
    }

    fwrite($handle,$data);
    fclose($handle);

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

            $dataSK = '<?xml version="1.0" encoding="UTF-8" ?>';
            $dataSK .= '<rss version="2.0">';
                    $dataSK .= '<channel>';
                        $dataSK .= '<title>Aktuality</title>';
                        $dataSK .= '<link>http://147.175.98.168/final/?page=news</link>';
                        $dataSK .= '<description>RSS aktuality</description>';
                        $dataSK .= '<item>';
                            $dataSK .= '<title>'. $newssSK->headlineSK .'</title>';
                            $dataSK .= '<link>http://147.175.98.168/final/?page=news</link>';
                            $dataSK .= '<description>'.$newssSK->textSK.'</description>';
                        $dataSK .= '</item>';
                    $dataSK .= '</channel>';
            $dataSK .= '</rss> ';

            $messg1 =  "<br><br><p>Odoberanie mozete zrusit kliknutim na tento link:</p> ";
            $messg1 .=  "<a href='http://147.175.98.168/final/?page=news&zmail=" .  $row->email . "'> Zrusenie</a></body></html>";
            mail($row->email,$newssSK->headlineSK,$newssSK->textSK . $messg1,"Content-type: text/html; charset=utf8");
        }


    }
    
    if (mysql_num_rows($subsEN) > 0 ){
        while($row = mysql_fetch_object($subsEN))
        {
            $newssEN = mysql_fetch_object($newsEN);

            $dataEN = '<?xml version="1.0" encoding="UTF-8" ?>';
            $dataEN .= '<rss version="2.0">';
                    $dataEN .= '<channel>';
                        $dataEN .= '<title>Aktuality</title>';
                        $dataEN .= '<link>http://147.175.98.168/final/?page=news</link>';
                        $dataEN .= '<description>RSS aktuality</description>';
                        $dataEN .= '<item>';
                            $dataEN .= '<title>'. $newssEN->headlineEN .'</title>';
                            $dataEN .= '<link>http://147.175.98.168/final/?page=news</link>';
                            $dataEN .= '<description>'.$newssEN->textEN.'</description>';
                        $dataEN .= '</item>';
                    $dataEN .= '</channel>';
            $dataEN .= '</rss> ';

            $messg2 =  "<br><br><p>Odoberanie mozete zrusit kliknutim na tento link:</p> ";
            $messg2 .= "<a href='http://147.175.98.168/final/?page=news&zmail=" .  $row->email . "'> Zrusenie</a></body></html>";
            mail($row->email,$newssEN->headlineEN,$newssEN->textEN . $messg2,"Content-type: text/html; charset=utf8");
        }
    }

}
?><?php
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