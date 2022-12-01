<?php 

$servidor = "yourserveraqui";
$db = "yourdatabaseaqui";
$senha = "";
$login = "youruseraqui";

$conexao = new mysqli ($servidor, $login,$senha, $db);

if ($conexao->connect_error) {
  die("Conexao falhou: " . $conexao->connect_error);
}
//echo "Conexao bem sucedida";

?>