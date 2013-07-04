<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Lukáš Tomek (info@lukastomek.cz)" />
    <meta name="copyright" content="2008 LT WebDevelopment (www.lukastomek.cz)" />
    <meta name="description" content=""  />
    <meta name="keywords" content="" />
    <meta name="language" content="cs" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/default.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/msie.css" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
    <link rel="shortcut icon" href="" />
  </head>
  <body>
    <!-- Accessibility items - do not remove !!! -->
    <ul class="noscreen">
      <li><a href="#content">Přeskočit na obsah</a></li>
      <li><a href="#mainMenu">Přeskočit na menu</a></li>
    </ul>

    <hr class="hidden" />

    <!-- View -  -->
    <div id="view">
      <!-- Header (logotype, search, menus) -->
      <div id="head">
        <h1 id="logotype">Logotype</h1>
        <form action="" method="post" id="searchForm">
          <fieldset>
            <legend class="hidden">Vyhledávání</legend>
            <input type="text" name="" value="Vyhledávání" class="button" />
            <input type="submit" value="Hledej" class="submit" />
          </fieldset>
        </form>
      </div><!-- // Header -->
      
      <hr class="hidden" />
      
      <!-- Main content -->
      <div id="content">
        <p class="navi"><a href="">Hlavní strana</a> &gt; <a href="">Podstrana</a> &gt; Jiná podstrana</p>
        <a href="" id="printPage">Tiskni stranu</a>
        
        <!-- Left content part -->
        <div id="contentBlock">
          <h2 class="subheader biggest">Georgia nadpis - dodatek</h2>
          
          <div class="item first">
            <h3 class="subheader"><a href="">Nadpis nejnovějšího příspěvku</a></h3>
            <span class="date">05. 04.</span>
            <div class="in">
              <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img-left.jpg" width="115" height="79" alt="" class="left" />
              <p>Phasellus lacus nisi, ullamcorper at, sollicitudin in, gravida vitae, dolor. Vivamus semper lacus id libero. Nam blandit. Donec orci. Pellentesque ultricies. Donec non nunc lobortis dui posuere cursus. In scelerisque nisi a mi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
            </div>
          </div><!-- // Item -->
          
          <div class="item">
            <h3 class="subheader"><a href="">Nadpis o trochu staršího příspěvku</a></h3>
            <span class="date">02. 04.</span>
            <div class="in">
              <a href=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img1.jpg" width="118" height="94" alt="" class="fl" /></a>
              <a href=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img2.jpg" width="129" height="94" alt="" class="fl" /></a>
              <a href=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img3.jpg" width="128" height="94" alt="" class="fl" /></a>
              <a href=""><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/img4.jpg" width="128" height="94" alt="" class="fl" /></a>
              <p>Phasellus lacus nisi, ullamcorper at, sollicitudin in, gravida vitae, dolor. Vivamus semper lacus id libero. Nam blandit. Donec orci. Pellentesque ultricies. Donec non nunc lobortis dui posuere cursus. In scelerisque nisi a mi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
            </div>
          </div><!-- // Item -->
          
          <div class="item last">
            <h3 class="subheader"><a href="">Nadpis o trochu staršího příspěvku 2</a></h3>
            <span class="date">28. 03.</span>
            <div class="in">
              <p>Phasellus lacus nisi, ullamcorper at, sollicitudin in, gravida vitae, dolor. Vivamus semper lacus id libero. Nam blandit. Donec orci. Pellentesque ultricies. Donec non nunc lobortis dui posuere cursus. In scelerisque nisi a mi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
            </div>
          </div><!-- // Item -->
        </div><!-- // ContentBlock -->
        
        <hr class="hidden" />
        
        <!-- Right sidebox -->
        <div id="rightBlock">
          <div class="box submenu">
            <h3 class="subheader">Kategorie</h3>
            <div class="in">
              <ul>
                <li><a href="">Tiskové portfolio</a></li>
                <li><a href="">Microsites a mini weby</a></li>
                <li><strong>Celé kampaně</strong></li>
                <li><a href="">Nerealizovaný design</a></li>
              </ul>
            </div>
          </div><!-- // Box -->
          
          <div class="box contact">
            <h3 class="subheader">Kontaktujte nás</h3>
            <div class="in">
              <h4 class="phone">Tel: +420 121 565 909</h4>
              <address>Nám. T.G.M. 637, 468 51, Smržovka<br />IČ: 672 08 690<br />DIČ: CZ7311042519<br />č.ú.: 415146001/2400 (eBanka a.s., Na Příkopě 19, 117 19 Praha 1)</address>
              <a href="" class="more ico ico-more">Najdi na mapě</a>
            </div>
          </div><!-- // Box -->
          
          <div class="box rss">
            <h4><a href="">RSS Kanál - <strong>Odebírat</strong></a></h4>
          </div><!-- // Box -->
        </div><!-- // RightBlock -->
      </div><!-- // Content -->
      
      <hr class="hidden noprint" />
      
      <!-- Main menu and submenu -->
      <div id="menu">
      </div><!-- // Menu -->
      
      <hr class="hidden noprint" />
      
     <!-- Web footer -->
            <div id="foot">
        <ul class="support">
          <li><a href="http://www.afrodita.name" title="AfroDita hry online, hry zdarma">AfroDita hry online</a></li>
          <li class="hotmix"><span class="fl">support by</span> <a href="http://www.hotmix.cz">Hotmix.cz<span></span></a></li>
          <li class="lt"><a href="http://www.lukastomek.cz">LT WebDevelopment<span></span></a></li>

        </ul>        <ul class="menu">
          <li><a href="">Hlavní strana</a></li>
          <li><a href="">Podstrana</a></li>
          <li><a href="">Jiná podstrana</a></li>
          <li><a href="">Kontakty</a></li>
        </ul>

        <p class="copy small">Copyright 2008 - Jméno firmy</p>
      </div><!-- // Foot -->

    </div><!-- // View -->

  </body>
</html>
