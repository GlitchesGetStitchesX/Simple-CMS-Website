<?php

session_start();

include("../cfg.php");

if (isset($_SESSION['logged_in'])) {
    // display add page

    if (isset($_POST['matka'], $_POST['nazwa'])){
        $category_name = $_POST['nazwa'];
        $parent_id = $_POST['matka'];

        if (empty($category_name) or empty($parent_id)){
            $error = 'Uzupełnij puste pola';
        } else {
            $query = "INSERT INTO category_list (category_name, parent_id) VALUES ( '$category_name', '$parent_id') LIMIT 1";
            $result = mysqli_query($con, $query) or die(mysql_error());
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
				<a href="index.php">Home</a>
				<a href="add.php">Dodaj</a>
				<a href="delete.php">Usuń</a>
				<a href="edit.php">Edytuj</a>
				<a href="logout.php">Wyloguj</a>
				<button class="menu" onclick="myFunction()">Jasny/Ciemny</button>
			</div>
		</header>
		<main>
            <h1 class="film">Dodaj kategorię</h1>
            <div class="email-container">

            <?php if (isset($error)) { ?>
				<small style="color: #aa0000;"><?php echo $error; ?></small>
			<?php } ?>

				<form action="edit.php" method="post" autocomplete="off">
                    <input type="text" name="matka" placeholder="ID kategorii głównej">
                    <input type="text" name="nazwa" placeholder="Nazwa kategorii">
                    <br><br>
                    <input type="submit" value="Dodaj"/>
                </form>
            </div>
		</main>
				<div class="sticky-footer">
					&copy; <span class ="yearJS"></span> Dominika Jabłońska
					<script src="../js/timedate.js" defer></script>
				</div>
	</body>
</html>

    <?php
} else {
    header('Location: index.php');
}

?>