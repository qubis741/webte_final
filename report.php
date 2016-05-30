<h3><span class="red"><?php echo getContentText('report','h3');?></span></h3>
<div class="flexBox contact">

<div style="padding-right: 8px;">

    <p>
        Webová stránka je naštýlovaná pomocou css pre-procesora Less, menu aj jazyková lokalizácia sa načítava z xml súboru. Verzionovací systém je GIT.
    </p>
    <p>
        Aktuality funguju na principe vkladania dat do databazy.<br/>
        Data su zadavane cez formular na stranke Aktuality(News).<br/>
        Stranka vyuziva na nacitavanie dat dynamicky selekt a podla jazyka zvoleneho na stranke nacita data.<br/><br/>

        RSS sa tvori z dat , nacitavanych z databazy.<br/>
        Z tychto dat sa vytvori RSS XML strukturovane podla RSS XML formatu.<br/><br/>

        NewsLetters umoznuje odosielanie noviniek pomocou emailu.<br/>
        Pre odoberanie sa clovek prihlasi cez formular a nasledne musi overit registraciu cez mail.<br/>
        Odoberatel moze kedykolvek zrusit odoberanie.
    </p>
    <p>
        Vytovrenie stránky pre prihlasovanie sa do administrátorskej časti webstránky.<br/>
        Prihlásnie a overenie mena a hesla používateľa do administrátorkej časti.<br/>
        Pridávanie aktualít (článkov) do databázy administrátorom.<br/>
        Lokalizácia používateľov ktorí navštívili stránku podľa ich IP adresy.<br/>
        Štatistika krajín z ktorých sa používatelia prihlasovali.<br/>
        Tabuľka všetkých unikátnych návštev webstránky s mestom a štátom odkiaľ prišli.<br/><br/>

        Prihlásenie je robené cez session, do premennej $_SESSION['session_username'] sa uloží meno prihláseného používateľa. Ak je táto premenná nastavená, znamená to že je prihlásený.<br/>
        Heslo je ulozene v tvare zasifrovaneho stringu pomocou php funkcie crypt().<br/><br/>

        Aktuality sa pridávajú pomocou formulára, kam sa zadajú nadpisy a texty v slovenskom a anglickom jazyku.<br/>
        Pri pridaní novej aktuality sa táto aktualita rozošle všetkým odberatelom na zadaný email v databáze.<br/>
        Poznámka: Posielanie mailu pri pridaní aktuality môže trvať dlho (niekoľko minút). Pri pridaní aktuality treba počkať kým stránka dobehne a napíše že bola aktualita pridaná.<br/><br/>

        Lokalizácia používateľov je vykonávaná pomocou služby <a href="http://www.geoplugin.net/">http://www.geoplugin.net/</a> ktorá zistí potrebné informácie. Tieto informácie sú následne vložené do databázy.<br/>
        Pri vypisovaní štatistiky a tabuľky návštev sa tieto informácie vyberú z databázy a naplní sa nimi obsah stránky.<br/>
    </p>
    <p>
        <a href="./log.txt" target="_blank" class="redButton">Git log</a>
    </p>
</div>
