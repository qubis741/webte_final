<?php
    /////////rss///////////////
    $doc = new DomDocument();

    $rss = $doc->createElement('rss');
    $rss->setAttribute("version", "2.0");
    $chanel = $doc->createElement('channel');

    $c_language = $doc->createElement('language');
    $c_title = $doc->createElement('title');
    $c_text = $doc->createElement('text');

    $doc->appendChild($rss);
    $rss->appendChild($channel);
    $channel->appendChild($c_language);
    $channel->appendChild($c_title);
    $channel->appendChild($c_text);

    $item = $doc->createElement('item');
    $i_title = $doc->createElement('title');


    echo $doc->saveXML();

?>