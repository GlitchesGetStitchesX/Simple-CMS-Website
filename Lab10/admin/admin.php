<?php

require "../cfg.php";
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$login = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if ( $action != "login" && $action != "logout" && !$login ) {
  login();
  exit;
}

function FormularzLogowania(){
    $wynik = '
    <h1>Panel CMS:</h1>
    <form method="post" name="LoginForm" enctype="multipart/form-data" action="index.php">
        <table>
            <tr>
                <td>[email]</td>
                <td><input type="text" name="login_email"/></td>
            </tr>
            <tr>
                <td>[haslo]</td>
                <td><input type="password" name="login_pass"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="x1_submit"  value="zaloguj"/></td>
            </tr>
        </table>
    </form>
    ';

    return $wynik;
}




function login() {

    $results = array();
    $results['pageTitle'] = "Admin Login | Widget News";
  
    if ( isset( $_POST['login'] ) ) {
  
      // User has posted the login form: attempt to log the user in
  
      if ( $_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD ) {
  
        // Login successful: Create a session and redirect to the admin homepage
        $_SESSION['username'] = ADMIN_USERNAME;
        header( "Location: admin.php" );
  
      } else {
  
        // Login failed: display an error message to the user
        $results['errorMessage'] = "Incorrect username or password. Please try again.";
      }
  
    }
  
  }
  
  
  function logout() {
    unset( $_SESSION['username'] );
    header( "Location: admin.php" );
  }

?>