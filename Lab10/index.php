<?php
 error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$webpage = $_GET['idp'];

require "cfg.php";
require "contact.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pl" />
		<meta name="Author" content="Dominika Jabłońska" />
		<title>Filmy oscarowe</title>
		<link rel="stylesheet" href="css/styles.css">
		<script src="js/kolorujtlo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="js/animation.js"></script>
        
	</head>
	<body>
		<header>
			<div class="navbar">
				<a href="index.php">Home</a>
				<a href="index.php?idp=nominacje">Nominacje</a>
				<a href="index.php?idp=rekordy">Rekordy filmowe</a>
				<a href="index.php?idp=ciekawostki">Ciekawostki</a>
				<a href="index.php?idp=zasady">Zasady</a>
                <a href="index.php?idp=trailery">Trailery</a>
				<a href="index.php?idp=kontakt">Kontakt</a>
                <a href="admin/index.php">Zaloguj</a>
				<button class="menu" onclick="myFunction()">Jasny/Ciemny</button>
			</div>
		</header>
		<main>
            <?php
                require "showpage.php";

                if ($webpage == "nominacje"){
                    if (file_exists('html/filmy.html')){
                        echo PokazPodstrone("2");
                    }
                    else {
                        echo "The file does not exist";
                    }
                } else if ($webpage == "rekordy"){
                    if (file_exists('html/rekordy.html')){
                        echo PokazPodstrone("3");
                    }
                    else {
                        echo "The file does not exist";
                    }
                } else if ($webpage == "ciekawostki"){
                    if (file_exists('html/ciekawostki.html')){
                        echo PokazPodstrone("4");
                    }
                    else {
                        echo "The file does not exist";
                    }
                } else if ($webpage == "zasady"){
                    if (file_exists('html/zasady.html')){
                        echo PokazPodstrone("5");
                    }
                    else {
                        echo "The file does not exist";
                    }
                } else if ($webpage == "trailery"){
                    if (file_exists('html/trailery.html')){
                        echo PokazPodstrone("6");
                    }
                    else {
                        echo "The file does not exist";
                    }
                } else if ($webpage == "kontakt"){
                    if (file_exists('html/kontakt.html')){
                        echo PokazPodstrone("7");
                        PokazKontakt();
                    }
                    else {
                        echo "The file does not exist";
                    }
                } else {
                    if (file_exists('html/Main.html')){
                        echo PokazPodstrone("1");
                    }
                    else {
                        echo "The file does not exist";
                    }
                }
                ?>
                <script src="js/accordion.js"></script>
		</main>
                <div class="footer">
					<div class="footer-heading footer-1">
						<h2>OFICJALNE KONTA AKADEMII</h2>
						<li><a href="https://www.instagram.com/theacademy/">INSTAGRAM</a></li>
						<li><a href="https://www.facebook.com/TheAcademy/">FACEBOOK</a></li>
						<li><a href="https://www.oscars.org/">STRONA INTERNETOWA</a></li>
					</div>
				</div>
				<div class="sticky-footer">
					&copy; <span class ="yearJS"></span> Dominika Jabłońska
					<script src="js/timedate.js" defer></script>
				</div>
	</body>
</html>