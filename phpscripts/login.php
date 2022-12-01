<?php
// Initialize the session
session_start();
$_SESSION["loggedin"] = false;
 

/*
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: http://localhost:80/esqueletoHTMLTCC_20/index.html");
    exit();
}
 */

require_once "novo.php";
 
$usuario = $_POST["usuario"]; 
$senha = $_POST["senha"];
 
 $queril = "SELECT * FROM usuario_cetam WHERE usuario='$usuario'";
 $result = $conexao->query($queril);
        $row = $result->fetch_array();


        if ($senha == $row['senha'] && $row['tipo'] == 1) {
                $_SESSION["loggedin"] = true;
                header("location: http://localhost:80/esqueletoHTMLTCC_20/UserCoordenador.html");
            } 
        
        elseif($senha == $row['senha'] && $row['tipo'] == 2){
                $_SESSION["loggedin"] = true;
                header("location: http://localhost:80/esqueletoHTMLTCC_20/UserPadrao.html");
            }
        

        elseif($senha == $row['senha'] && $row['tipo'] == 4){
                $_SESSION["loggedin"] = true;
                header("location: http://localhost:80/esqueletoHTMLTCC_20/index.html");
            }

            else {
                echo "<script type='application/javascript'>
                alert('senha ou usuarios incorretos');
                window.location = 'http://localhost:80/esqueletoHTMLTCC_20/login.html';
                </script>";
                $_SESSION["loggedin"] = false;
            }
        
    
    
    
?>
    
    


 
