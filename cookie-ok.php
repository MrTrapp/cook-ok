<?php
// Infos
// https://www.php-einfach.de/php-tutorial/php-sessions/#Ueberpruefen_ob_Session-Variable_registriert_ist 
// http://php.net/manual/de/function.setcookie.php
	
// Info Text mit Button über Cookie 
// !!! Nicht vergessen den Link zur Datenschutzerklährung anpassen. !!! \\\
$info = '<form action="'.$PHP_SELF.'" method="post">
<div class="cookieMaster">Diese Website verwendet Cookies. Durch die fortgesetzte Nutzung stimmen Sie dem Einsatz von Cookies auf unserer Websites zu.  <a href="index.php?article_id=1">Weitere Informationen</a> <input type="submit" name="read_and_close" class="cookiebutton" value="OK" />
</div>
</form>';

/*
// weitere Sprachen müsste man selber einbauen
$info_engl = 'This website uses cookies to ensure you get the best experience on our website 
Privacy Policy';
*/

// Aktions abhängige Styles
$style = '<style>
.container {
	}
</style>';


// Wenn der Button OK geklickt worden ist:
$readClosed = $_POST["read_and_close"];

if ($readClosed == 'OK') {
	// Setzen des Cookies => cookies-ok 
	setcookie ("cookiesok","cookies-ok");// ("cookie[ok]", "cookies-ok");
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