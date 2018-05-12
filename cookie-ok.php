<?php
// Infos
// https://www.php-einfach.de/php-tutorial/php-sessions/#Ueberpruefen_ob_Session-Variable_registriert_ist 
// http://php.net/manual/de/function.setcookie.php
// oder einfach https://cookieconsent.insites.com/download/
// ab REDAXO 5.X https://github.com/FriendsOfREDAXO/cookie_consent

//Tipp zum einbetten von Google Fonts
// https://google-webfonts-helper.herokuapp.com/fonts/give-you-glory?subsets=latin
$info = '';
$style = '';
$PHP_SELF = '';
$readClosed = ''; 


// !!! Nicht vergessen den Link zur Datenschutzerklährung anpassen. !!! \\\
$pfad = '/'; // '.$PHP_SELF.'
$pfadRex4 = 'index.php?article_id=24'; // " . $_SERVER[".$PHP_SELF."] . "  // <!-- redaxo://24 -->
$pfadRex5 = rex_getUrl(1); // .rex::getServer().$PHP_SELF.'

// Info Text mit Button über Cookie 
$info_de = '<form action="'.$PHP_SELF.'" method="post">
<div class="cookieMaster">Diese Website verwendet Cookies. Durch die fortgesetzte Nutzung stimmen Sie dem Einsatz von Cookies auf unserer Websites zu.  <a href="redaxo://24">Weitere Informationen</a> <input type="submit" name="read_and_close" class="cookiebutton" value="OK" />
</div>
</form>';


// weitere Sprachen 
$info_engl = '
<form action="'.$PHP_SELF.'" method="post">
<div class="cookieMaster">This website uses cookies to ensure you get the best experience on our website.
<a href="redaxo://24">Privacy Policy</a> <input type="submit" name="read_and_close" class="cookiebutton" value="OK" />
</div>
</form>';

// REX 4 
if ($REX['CUR_CLANG']==0){  // REX 4
	// rex_clang::getCurrentId() // REX 5
	$info = $info_de;
	} else { 
	$info = $info_engl;
}      

// Aktions abhängige Styles
$style = '<style>
.container {
	}
</style>';


// Wenn der Button OK geklickt worden ist:
// $readClosed = $_POST["read_and_close"];
$readClosed = isset($_POST["read_and_close"]);


if ($readClosed == 'OK') {
	// Setzen des Cookies => cookies-ok 
	// setcookie("cookiesok","cookies-ok", time()+60*60*24*30); // time für einen Monat
	// cookie Name / Zeit für einen Monat / Pfad / HTTPS-Verbindung >> , $secure = TRUE
	setcookie("cookiesok","cookies-ok", time()+60*60*24*30, $path = "/" ); 
	$info = ''; 
	$style = '';
}
// Wenn das Cookie cookies-ok gesetzt wurde, Indo heraus nehmen
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
