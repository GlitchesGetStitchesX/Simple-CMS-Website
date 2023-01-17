<?php

session_start();

include ('../cfg.php');

if (isset($_SESSION	['logged_in'])) {
	// display index

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
				<a href="index.php">Home</a>
				<a href="add.php">Dodaj</a>
				<a href="delete.php">Usuń</a>
				<a href="edit.php">Edytuj</a>
				<a href="logout.php">Wyloguj</a>
				<!-- button changing between light mode and dark mode -->
				<button class="menu" onclick="myFunction()">Jasny/Ciemny</button>
			</div>
		</header>
		<main>
            <h1 class="film">Witaj</h1>
			<p class="text">Pamiętaj o wylogowaniu się z panelu.<br><br> W przypadku problemów, skontaktuj się z administratorem.</p>

			<h2 class="film">Podstrony</h2>
			<br>
			<br>
			<?php
				$query = "SELECT * FROM page_list LIMIT 100";
				$result = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($result)){
					?>
					<form>
  						<button formaction="edit.php">Edytuj</button>
  						<button formaction="delete.php">Usuń</button>
					</form>
					<p class="text">
						
					<?php
					echo 'ID: '.$row['id'].' <br />'.' <br />'.'Tytył: '.$row['page_title'].' <br />';
					?>
					</p>
					<?php
				}
			?>

		</main>
				<div class="sticky-footer">
					&copy; <span class ="yearJS"></span> Dominika Jabłońska
					<!-- date script for footer -->
					<script src="../js/timedate.js" defer></script>
				</div>
	</body>
</html>

	<?php
} else {
	// display login
	if (isset($_POST['username'], $_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (empty($username) or empty ($password)) {
			$error = 'Wszystkie pola są wymagane';
		}
		else {

    		$query = "SELECT * FROM user_list WHERE user_name='$username' AND user_password='".md5($password)."'";
			$result = mysqli_query($con, $query) or die(mysql_error());
			$rows = mysqli_num_rows($result);
        	
			if($rows==1){
	    		$_SESSION['username'] = $username;

				$_SESSION['logged_in'] = true;
				header('Location: index.php');
				exit();
		} else {
			$error = 'Incorrect details!';
		}
	}
}
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
            <h1 class="film">Login</h1>
			<br>
			<div class="email-container">

			<?php if (isset($error)) { ?>
				<small style="color: #aa0000;"><?php echo $error; ?></small>
			<?php } ?>

			<form action="index.php" method="post" autocomplete="off"> 
				<input type="text" name = "username" placeholder="Login">
				<input type="password" name="password" placeholder="Hasło">
				<input type="submit" value="Zaloguj się"/>
			</form>
			</div>
			<br>
			<br>
			<br>
			<button onclick="window.location.href='password.php'">Przypomnij hasło</button>
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
					<script src="../js/timedate.js" defer></script>
				</div>
	</body>
</html>

	<?php

}


?>

