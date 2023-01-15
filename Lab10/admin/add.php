<?php

session_start();

include("../cfg.php");

if (isset($_SESSION['logged_in'])) {
    // display add page

    if (isset($_POST['title'], $_POST['content'], $_POST['status'])){
        $page_title = $_POST['title'];
        $page_content = $_POST['content'];
        $status = $_POST['status'];

        if (empty($page_title) or empty($page_content)){
            $error = 'Uzupełnij puste pola';
        } else {
            $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ( '$page_title', '$page_content', '$status') LIMIT 1";
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
            <h1 class="film">Dodaj podstronę</h1>
            <div class="email-container">

            <?php if (isset($error)) { ?>
				<small style="color: #aa0000;"><?php echo $error; ?></small>
			<?php } ?>

			    <form action="add.php" method="post" autocomplete="off">
                    <input type="text" name="title" placeholder="Tytuł">
                    <textarea rows="15" cols="20" placeholder="Zawartość" name="content"></textarea>
				    <input type='checkbox' checked='checked' name='status' id='status'  value=1>
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