<?php
//comandos
session_start();


if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
$_SESSION["loggedin"] = false;
}
session_destroy();
exit();

//http://localhost/esqueletoHTMLTCC_20/AdicionarProfessor.html
?>