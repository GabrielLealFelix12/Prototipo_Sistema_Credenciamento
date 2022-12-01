<?php
//comandos
session_start();
 
require 'novo.php';
/*
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo "http://localhost:80/esqueletoHTMLTCC_20/AdicionarProfessor.html";
}else{
  echo "http://localhost:80/esqueletoHTMLTCC_20/login.html";
  session_destroy();
  exit();
}
*/

$nome_prof = $_POST["add_prof"];
$cpf_prof = $_POST["cp_f"];
$rg_prof = $_POST["r_g"];
$disc_prof = $_POST["dis_c"];
$dpv_prof = $_POST["dpv_prof"];
$comentario_prof = $_POST["comment"];
$comando = $_POST["atual"];
//$comando2 = $_POST["del"];


$cad_prof = "INSERT INTO professores(Nome, CPF, RG, Disciplinas, Viagens, Comentario) values ('$nome_prof','$cpf_prof','$rg_prof','$disc_prof','$dpv_prof','$comentario_prof')";

$del_prof =" DELETE FROM professores WHERE Nome = '$nome_prof' AND CPF = '$cpf_prof'";

$atual_prof = "UPDATE professores SET Nome = '$nome_prof', CPF = '$cpf_prof', RG = '$rg_prof', Disciplinas = '$disc_prof', Viagens = '$dpv_prof' WHERE meuid = ";

// disciplinas vs disciplina. Veja isso logo macho
// viagem vs viagens. Veja isso tbm. mano doido


if ($comando == "ENVIAR"){
if ($conexao->query($cad_prof) === TRUE) {
    header("location: http://localhost:80/esqueletoHTMLTCC_20/index.html");
} else {
  echo "Erro: " . $cad_prof . "<br>" . $conexao->error;
}
}



if ($comando == "ATUALIZAR"){
if ($conexao->query($atual_prof) === TRUE) {
  //echo "Mal Feito, feito";
    header("location: http://localhost:80/esqueletoHTMLTCC_20/index.html");
} else {
  echo "Erro: " . $cad_prof . "<br>" . $conexao->error;
}
}



if ($comando == "DELETAR"){
if ($conexao->query($del_prof) === TRUE) {
  //echo "Mal Feito, feito";
    header("location: http://localhost:80/esqueletoHTMLTCC_20/index.html");
} else {
  echo "Erro: " . $cad_prof . "<br>" . $conexao->error;
}
}
//http://localhost/esqueletoHTMLTCC_20/AdicionarProfessor.html
?>