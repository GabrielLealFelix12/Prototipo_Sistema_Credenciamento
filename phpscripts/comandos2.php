<?php
//comandos

require 'novo.php';

header("Content-Type: application/json; charset=UTF-8");

/*
$nome_prof = $_POST["nomeprof"];

$disciplina = $_POST["disc"];
*/

$buscagem = json_decode($_POST["x"], false);

$nome_prof = $buscagem->nomeprof; 
$Disciplina = $buscagem->disciplinaprof; 

$sql = "Select Nome, Disciplinas, CPF, RG, Viagens, Comentario from Professores Where Nome='$nome_prof' AND Disciplinas='$Disciplina'";

$sql2 = "Select Nome, Disciplinas, CPF, RG, Viagens, Comentario from Professores Where Disciplinas='$Disciplina'";

$sql3 = "Select Nome, Disciplinas, CPF, RG, Viagens, Comentario from Professores Where Nome='$nome_prof'";

// disciplinas vs disciplina. Veja isso logo macho


/*
if ($conexao->query($sql) === TRUE) {
  echo "Mal Feito, feito";
} else {
  echo "Erro: " . $sql . "<br>" . $conexao->error;
}
*/

?>

<table>
  <tr>
    <td> Nome </td>
    <td> Disciplina </td>
    <td> CPF </td>
    <td> RG </td>
    <td> Viagens </td>
    <td> Comentário </td>

  </tr>
  
<?php
if($nome_prof == ""){
$result = $conexao->query($sql2);
}

elseif($nome_prof != "" && $Disciplina == "" ){
$result = $conexao->query($sql3);
}

else{
 $result = $conexao->query($sql);
}


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "Nome: " . $row["Nome"]. " - Disciplina: " . $row["Disciplina"] . "<br>";
     echo "<tr>";
     echo "<td>".$row["Nome"]."</td>";
     echo "<td>".$row["Disciplinas"]."</td>";
     echo "<td>".$row["CPF"]."</td>";
     echo "<td>".$row["RG"]."</td>";

     
     if ($row["Viagens"] == 1){
     echo "<td> Sim </td>"; 
     }

     
     if ($row["Viagens"] == 0){
     echo "<td> Não </td>"; 
     
     }
      echo "<td>".$row["Comentario"]."</td>";

    echo "<td> <img id='lupa' src='http://localhost:80/esqueletoHTMLTCC_20/imagens/lupa.png' width='50' height='50'> </td>";
     echo "</tr>";
  }
} else {
  echo "0 results";
}

//http://localhost/esqueletoHTMLTCC_20/AdicionarProfessor.html
?>

</table>
