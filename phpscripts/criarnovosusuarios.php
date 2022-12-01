<?php 
require 'novo.php';

$nome= $_POST["nomeUser"];
$cpf = $_POST["cpfUser"];
$cad=$_POST["CadUser"];

$queryDel = "DELETE FROM usuario_cetam WHERE usuario='$nome' AND cpf='$cpf'";

$queryInCoord = "INSERT INTO usuario_cetam(usuario, cpf, tipo, senha) VALUES ('$nome','$cpf', '1', '12345')";

$queryInCommon = "INSERT INTO usuario_cetam(usuario, cpf, tipo, senha) VALUES ('$nome','$cpf', '2', '12345')";

if(isset($cad) && $cad == 1){
	$conexao->query($queryInCoord);
	//echo "coordenador cadastrado";
	echo "<script type='application/javascript'>
                alert('Coordenador Cadastrado');
                window.location = 'http://localhost:80/esqueletoHTMLTCC_20/AdicionarNovosUsers.html';

                </script>";

	//header("location: http://localhost:80/esqueletoHTMLTCC_20/AdicionarNovosUsers.html");
}

if(isset($cad) && $cad == 2){
	$conexao->query($queryInCommon);
	echo "<script type='application/javascript'>
                alert('Usuario comum Cadastrado');
                window.location = 'http://localhost:80/esqueletoHTMLTCC_20/AdicionarNovosUsers.html';

                </script>";
}

if(isset($cad) && $cad == 3){
	echo "<script type='application/javascript'>
                alert('Usuario Deletado');
                window.location = 'http://localhost:80/esqueletoHTMLTCC_20/AdicionarNovosUsers.html';

                </script>";
}

?>