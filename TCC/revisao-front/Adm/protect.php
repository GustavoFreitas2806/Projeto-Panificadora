<?php
if (!isset($_SESSION)) {
    session_start();    

}

// var_dump($_SESSION);

if (!isset($_SESSION['usuario']) || !isset($_SESSION['email']) ) {
    // die("Você não pode acessar essa página sem login. <p><a href=\"login.php\">Clique aqui para acessar</a></p>");
    header("Location: login.php");
}
?>