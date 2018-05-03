<?php
// Infos
// https://www.php-einfach.de/php-tutorial/php-sessions/#Ueberpruefen_ob_Session-Variable_registriert_ist 
// http://php.net/manual/de/function.setcookie.php
// https://cookieconsent.insites.com/download/
// ab REDAXO 5.X https://github.com/FriendsOfREDAXO/cookie_consent
// REX_TEMPLATE[X]   // Cookies-OK

//Tipp zum einbetten von Google-Fonts
// https://google-webfonts-helper.herokuapp.com/fonts/give-you-glory?subsets=latin
$info = '';
$style = '';
$PHP_SELF = '';
$readClosed = ''; 


// !!! Nicht vergessen den Link zur Datenschutzerklährung anpassen. !!! \\\
$pfad = '/'; // '.$PHP_SELF.'
$pfadRex4 = 'index.php?article_id=1'; // " . $_SERVER[".$PHP_SELF."] . "
$pfadRex5 = rex_getUrl(1); // .rex::getServer().$PHP_SELF.'
$pfadModal = '#" class="x" data-toggle="modal" data-target="#datenschutz';


// Info Text mit Button über Cookie 
$info = '<form action="'.$PHP_SELF.'" method="post">
<div class="cookieMaster">Diese Website verwendet Cookies. Durch die fortgesetzte Nutzung stimmen Sie dem Einsatz von Cookies auf unserer Websites zu.  <a href="'.$pfadRex5.'">Weitere Informationen</a> <input type="submit" name="read_and_close" class="cookiebutton" value="OK" />
</div>
</form>';

/*
// weitere Sprachen müsste man selber einbauen
$info_engl = 'This website uses cookies to ensure you get the best experience on our website 
Privacy Policy';
*/

// Aktions abhängige Styles
$style = '<style>

</style>';


// Wenn der Button OK geklickt worden ist:
$readClosed = isset($_POST["read_and_close"]);


if ($readClosed == 'OK') {
	// Setzen des Cookies => cookies-ok 
	setcookie("cookiesok","cookies-ok", time()+60*60*24*30); // time für einen Monat
	$info = ''; 
	$style = '';
}
// Wenn das Cookie cookies-ok gesetzt wurde, Info heraus nehmen
if (isset($_COOKIE['cookiesok']) == true ) {
	$info = '';
	$style = '';
}
// AUSGABE
echo $info.$style;

/*
// Test 
echo '<br><br><h1>Button click : '.$readClosed.' <br> COOKIE: '.htmlspecialchars($_COOKIE["cookiesok"]).'</h1>';
echo $_COOKIE['cookie-ok'];
*/

/*
<!-- Modal für REX 5 und Bootstrap 4 -->
<div id="datenschutz" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Datenschutz</h4>
      </div><!-- modal-header //-->
      <div class="modal-body">
	  <?php
		  $footer1 = new rex_article_content(14);
		  echo $footer1->getArticle(); // ->getArticle(1)
	  
	  ?>
      </div><!-- modal-body  //-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div><!-- modal-footer  //-->
    </div><!-- modal-content  //-->

  </div><!-- modal-dialog //-->
</div><!--  modal fade //-->
*/

// eigene Styles
?>
<style>
.cookieMaster {
	top: 0;
	z-index: 1000;
	font-size: 16px;
	background-color: black;
	color: white;
	text-align: center;
	padding: 14px;
	width: 100%;
	display: block;
    margin-bottom: 30px;
}

.cookieMaster a {
	color: whitesmoke;
	text-decoration: underline;
	margin-right: 6px;
	margin-left: 6px;
}

.cookieMaster a:hover {
	color: white;
	text-decoration: underline;
}
input.cookiebutton,
a.cookiebutton {
	color: white;
	text-decoration: none;
	background-color: #ff6b00;
	padding: 6px;
	text-align: center;
	border-style: none;
	width: 40px !important;
	height: 30px !important;
}
input.cookiebutton:hover,
a.cookiebutton:hover {
	color: white;
	text-decoration: none;
	background-color: #d70000;
}
</style>
