<?php

session_start();

include("../cfg.php");

if (isset($_SESSION['logged_in'])) {
    // display edit page

    if (isset($_POST['matka'], $_POST['nazwa'], $_POST['id'])){
        $category_name = $_POST['nazwa'];
        $parent_id = $_POST['matka'];
        $id = $_POST['id'];

        if (empty($category_name) or empty($parent_id) or empty($id)){
            $error = 'Uzupełnij puste pola';
        } else {
            $query = "UPDATE category_list SET nazwa='$category_name', matka='$parent_id' WHERE id=$id LIMIT 1";
            $result = mysqli_query($con, $query) or die(mysql_error());
        }

    }

	if (isset($_POST['product_id'], $_POST['name'], $_POST['description'], $_POST['netto_price'], $_POST['vat'], $_POST['stock'], $_POST['category'], $_POST['status'], $_POST['size'], $_POST['image'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['name'];
		$product_description = $_POST['description'];
		$product_netto_price = $_POST['netto_price'];
		$product_vat = $_POST['vat'];
		$product_stock = $_POST['stock'];
		$product_category = $_POST['category'];
		$product_status = $_POST['status'];
		$product_size = $_POST['size'];
		$product_image = $_POST['image'];

        if (empty($product_id) or empty($product_name) or empty($product_description)  or empty($product_netto_price) or empty($product_vat) or empty($product_stock) or empty($product_category) or empty($product_status) or empty($product_size) or empty($product_image)){
            $error = 'Uzupełnij puste pola';
        } else {
            $query = "UPDATE product_list SET name='$product_name', description='$product_description', modify_date=current_timestamp(), netto_price='$product_netto_price', vat='$product_vat', stock='$product_stock', category='$product_category', status='$product_status', size='$product_size', image='$product_image' WHERE id='$product_id' LIMIT 1";
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
            <h1 class="film">Edytuj kategorię</h1>
            <div class="email-container">

            <?php if (isset($error)) { ?>
				<small style="color: #aa0000;"><?php echo $error; ?></small>
			<?php } ?>

			    <form action="edit.php" method="post" autocomplete="off">
                    <input type="number" name="id" placeholder="ID">
                    <input type="text" name="matka" placeholder="ID kategorii głównej">
                    <input type="text" name="nazwa" placeholder="Nazwa kategorii">
                    <br><br>
                    <input type="submit" value="Edytuj"/>
                </form>
            </div>
			<br>
				<br>
				<h1 class="film">Edytuj produkt</h1>
				<div class="email-container">

            	<?php if (isset($error)) { ?>
					<small style="color: #aa0000;"><?php echo $error; ?></small>
				<?php } ?>

				<form action="edit.php" method="post" autocomplete="off">
                    <input type="text" name="product_id" placeholder="ID produktu">
                    <input type="text" name="name" placeholder="Nazwa">
					<input type="text" name="description" placeholder="Opis">
					<input type="text" name="netto_price" placeholder="Cena netto">
					<input type="text" name="vat" placeholder="VAT">
					<input type="text" name="stock" placeholder="Sztuki w magazynie">
					<input type="text" name="category" placeholder="Kategoria">
					<input type="text" name="status" placeholder="Dostępność - 1 lub 0">
					<input type="text" name="size" placeholder="Gabaryt">
					<input type="text" name="image" placeholder="Zdjęcie">
                    <br><br>
                    <input type="submit" value="Edytuj"/>
                </form>
            </div>
			<br>
			<br>
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