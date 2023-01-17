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
				<button class="menu" onclick="myFunction()">Jasny/Ciemny</button>
			</div>
		</header>
		<main>
		<h1 class="film">Witaj</h1>
			<p class="text">Pamiętaj o wylogowaniu się z panelu.<br><br> W przypadku problemów, skontaktuj się z administratorem.</p>

			<h2 class="film">Kategorie</h2>
			<br>
			<br>
			<?php
				$query = "SELECT * FROM category_list WHERE matka = 0 LIMIT 100";
				$result = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($result)){
					$id=$row['id'];

					?>
					<p class="text">
						
					<?php
					echo 'Rodzaj przenośnika:'.'<br />'.'ID:'.$id.' <br />'.'Nazwa: '.$row['nazwa'];
					?>
					</p>
					<?php
				}
				?>

					<h2 class="film">Podkategorie</h2>
					<br>
					<?php
				
				$query = "SELECT * FROM category_list WHERE matka = 0 LIMIT 100";
				$result = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($result)){
					$id=$row['id'];
					$child_query = "SELECT * FROM category_list WHERE matka = $id";
					$child_result = mysqli_query($con, $child_query);

					?>
					<p class="text">
						
					<?php
					echo 'Rodzaj przenośnika:'.'<br />'.'ID:'.$id.' <br />'.'Nazwa: '.$row['nazwa'];


					while ($child_row = mysqli_fetch_array($child_result)){
						$child_id = $child_row['id'];
						$child_parent = $child_row['matka'];
						$child_name = $child_row['nazwa'];
						echo '<br />'.'Gatunek filmowy:'.'<br />'.'ID: '.$child_id.'<br />'.'Nazwa: '.$child_name;
					}
					?>
					</p>
					<?php
				}
				?>
			<h2 class="film">Produkty</h2>
				<br>
				<br>
			<?php
				$query = "SELECT * FROM product_list LIMIT 100";
				$result = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($result)){
					?>
					<p class="text">
						
					<?php
					$price = $row['netto_price'] + (0.01 * $row['vat'] * $row['netto_price']);
					echo 'ID: '.$row['id'].' <br />'.'Tytył: '.$row['name'].' <br />'.'Cena brutto: '.$price.'<br />'.'Sztuki:'.$row['stock'].' <br />'.'Kategoria: '.$row['category'].' <br />'.'Status: '.$row['status'].' <br />'.'Gabaryt: '.$row['size'];
					?>
					</p>
					<?php
				}
			?>

			</main>
					<div class="sticky-footer">
						&copy; <span class ="yearJS"></span> Dominika Jabłońska
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
			<script src="../js/animation.js"></script>
		</head>
		<body>
			<header>
				<div class="navbar">
					<a href="../index.php">Home</a>
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
				<button onclick="window.location.href='../admin/password.php'">Przypomnij hasło</button>
					
				
	
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
						<script src="../js/timedate.js" defer></script>
					</div>
		</body>
	</html>
	
		<?php
	
	}
	
	
	?>
	
	