<?php

session_start();
include ("cfg.php");
$page = 'shop.php';

if (isset($_GET['add'])){
    $stock = mysqli_query($con, 'SELECT id, stock FROM product_list WHERE id='.mysqli_real_escape_string($con, (int)$_GET['add']));
    while ($stock_row = mysqli_fetch_assoc($stock)){
        if ($stock_row['stock'] != $_SESSION['cart_'.(int)$_GET['add']]){
            $_SESSION['cart_'.(int)$_GET['add']] += '1';
            
        }
    }
    header('Location: '.$page);
}

if (isset($_GET['remove'])){
    $_SESSION['cart_'.(int)$_GET['remove']]--;
    header('Location:'.$page);
}

if (isset($_GET['delete'])){
    $_SESSION['cart_'.(int)$_GET['delete']] = '0';
    header('Location:'.$page);
}

function products(){

    include ("cfg.php");
    $query = "SELECT id, name, description, netto_price, vat, category, image FROM product_list WHERE stock > 0 ORDER BY id DESC";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 0) {
        echo "There are no products to display";
    }
    else {
        while ($row = mysqli_fetch_assoc($result)){
            $price = $row['netto_price'] + ($row['netto_price'] * $row['vat'] * 0.01);
            echo '<img class="posters" src="'.$row['image'].'"/>';
            echo '<p class="text">'.$row['name'].'<br />'.$row['description'].'<br />'.'<br />'.number_format($price, 2).' PLN'.'<br />'.'<button><a href="cart.php?add='.$row['id'].'">Dodaj</a>'.'</button></p>';
        }
    }
}

function cart(){
    include ("cfg.php");
    $total = '0';
    ?>
        <p class="text2">
    <?php
    foreach($_SESSION as $name => $value){
        if ($value>0) {
            
            if (substr($name, 0, 5) == 'cart_'){
                $id = substr($name, 5, (strlen($name) - 5));
                $result = mysqli_query($con, 'SELECT id, name, netto_price, vat FROM product_list WHERE id='.mysqli_real_escape_string($con, (int)$id));

                
                while ($row = mysqli_fetch_assoc($result)){
                    $price = $row['netto_price'] + ($row['netto_price'] * $row['vat'] * 0.01);
                    $sub = $price * $value;
                    echo $row['name'].' - '.$value.' x '.number_format($price, 2).' PLN = '.number_format($sub, 2).' PLN'.'    '.'<button><a href="cart.php?remove='.$id.'">-</a></button>'.'    '.'<button><a href="cart.php?add='.$id.'">+</a></button>'.'    '.'<button><a href="cart.php?delete='.$id.'">Usuń</a></button>'.'<br />'.'<br />';
                    
                }
            }
            
            $total += $sub;
            
        }
        
    }
    if ($total == 0) {
        echo "Pusty koszyk";
    }
    else {
        echo 'Suma: '.number_format($total, 2).' PLN';
    }
}
?>
    </p>
<?php

?>
