<?php

function PokazPodstrone ($id){

    require "cfg.php";

    $id_clear = htmlspecialchars($id);

    $query = "SELECT * FROM page_list WHERE id=($id_clear) LIMIT 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (empty($row['id'])){
        $web = '[nie_znaleziono_strony]';
    } else {
        $web = $row['page_content'];
    }

    return $web;
}

?>