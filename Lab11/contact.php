<?php


// display contact form
function PokazKontakt(){
    echo '
    <div class="email-container">
    <form action="contact.php" method="post" autocomplete="off">
        <input type="email" name="email" id="fname" maxlength="64" placeholder="jkowalski@email.pl">
        <input type="text" name="subject" placeholder="Temat">
        <textarea id="message" name="message" placeholder="Moja wiadomość" style="height:200px"></textarea>
        <input type="submit" value="Wyślij"/>
    </form>
    </div>';

    if (isset($_POST['message'])){
        // send mail to the address
        WyslijMailaKontakt("domij1210@gmail.com");
    }
}

// send email to recipient
function WyslijMailaKontakt ($odbiorca)
{
    if (empty($_POST['message']) || empty($_POST['subject']) || empty($_POST['email']))
    {
        echo '[nie_wypelniles_pola]';
    }
    else
    {

        $mail['subject'] = $_POST['subject'];
        $mail['body'] =  $_POST['message'];
        $mail['sender'] = $_POST['email'];
        $mail['reciptient'] = $odbiorca;

        $header = "From: Formularz kontaktowy <". $mail['sender']."\n";
        $header .= "MIME-Version: 1.0\ncontent-Type: text/plain; charset=utf-8\ncontent-Transfer-Encoding:";
        $header .= "X-Sender: <". $mail['sender'].">\n";
        $header .= "X-Mailer: PRapwww mail 1.2\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <". $mail['sender'].">\n";

        mail($mail['reciptient'], $mail['subject'], $mail['body'], $header);
        echo '[wiadomosc_wyslana]';
    }
}

// send admin password to email

function PrzypomnijHaslo($odbiorca){
    include "cfg.php";
    $mail['subject'] = "Hasło do panelu admina";
    $mail['body'] =  $pass;
    $mail['sender'] = "twoje_haslo@gmail.com";
    $mail['reciptient'] = $odbiorca;

    $header = "From: Haslo do panelu <". $mail['sender']."\n";
    $header .= "MIME-Version: 1.0\ncontent-Type: text/plain; charset=utf-8\ncontent-Transfer-Encoding:";
    $header .= "X-Sender: <". $mail['sender'].">\n";
    $header .= "X-Mailer: PRapwww mail 1.2\n";
    $header .= "X-Priority: 3\n";
    $header .= "Return-Path: <". $mail['sender'].">\n";

    mail($mail['reciptient'], $mail['subject'], $mail['body'], $header);
    echo '[haslo wyslane na email:'.$mail["reciptient"].']';

}
?>
