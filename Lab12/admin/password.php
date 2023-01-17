<?php

session_start();

include("../cfg.php");
include("../contact.php");

?>

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pl" />
		<meta name="Author" content="Dominika Jabłońska" />
		<title>Filmy oscarowe</title>
		<link rel="stylesheet" href="../css/styles.css">
		<script src="../js/kolorujtlo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
		<!-- image hover animation -->
        <script src="../js/animation.js"></script>
	</head>
	<body>
		<header>
			<div class="navbar">
				<a href="../index.php">Home</a>
				<!-- button changing between light mode and dark mode -->
				<button class="menu" onclick="myFunction()">Jasny/Ciemny</button>
			</div>
		</header>
		<main>
            <h1 class="film">Przypomnienie hasła</h1>
            <div class="email-container">
            <?php
     
                if(isset($_POST['button1'])) {
                    PrzypomnijHaslo("domij1210@gmail.com");
                }
            ?>
			    <form method="post">
                    <input type="submit" name="button1" value="Przypomnij"/>
                </form>
            </div>
		</main>
				<div class="sticky-footer">
					&copy; <span class ="yearJS"></span> Dominika Jabłońska
					<!-- date script for footer -->
					<script src="../js/timedate.js" defer></script>
				</div>
	</body>
</html>
