
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pl" />
		<meta name="Author" content="Dominika Jabłońska" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Filmy oscarowe</title>
	</head>
	<body>
	<?php
    
 $nr_indeksu = '155445';
 $nrGrupy = '1';
 echo 'Dominika Jablonska '.$nr_indeksu.' grupa '.$nrGrupy.'<br/> <br/>';
 echo 'Zastosowanie metody include() <br />';
 
 echo 'Metoda include(), require_once() <br /> <br/>';
 
 include 'empty.php';
 
 echo 'if, else, elseif, switch <br /> <br/>';
 
 $a = '1';
 $b = '2';
 
if ($a > $b) {
    echo "a is bigger than b <br/><br/>";
} elseif ($a == $b) {
    echo "a is equal to b <br/><br/>";
} else {
    echo "a is smaller than b <br/><br/>";
}

switch ($a) {
    case 0:
        echo "a equals 0 <br/><br/>";
        break;
    case 1:
        echo "a equals 1 <br/><br/>";
        break;
    case 2:
        echo "a equals 2 <br/><br/>";
        break;
}

 echo 'while(), for() <br /> <br/>';
 
 $i = 1;
 while ($i <= 10) {
    echo $i++.'<br/>'; 
 }

 for ($i = 1; $i <= 15; $i++) {
    echo $i.'<br/>';
 }
 
 echo '$_GET, $_POST, $_SESSION <br /> <br/>';
 
 echo 'Witaj na'.$_GET['id'].'<br/><br/>';
?>
	</body>
</html>