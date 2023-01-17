<?php
    include ("cfg.php");
    require "cart.php";

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
        <!-- image hover animation -->
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
                <a href="shop.php">Sklep</a>
                <a href="admin/index.php">Zaloguj</a>
                <!-- button changing between light mode and dark mode -->
				<button class="menu" onclick="myFunction()">Jasny/Ciemny</button>
			</div>
		</header>
		<main>
            <?php 

            cart(); ?>
            <br>
            <h1 class="film">Produkty</h2>
            <?php
            products();

            ?>
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
                    <!-- date script for footer -->
					<script src="js/timedate.js" defer></script>
				</div>
	</body>
</html>