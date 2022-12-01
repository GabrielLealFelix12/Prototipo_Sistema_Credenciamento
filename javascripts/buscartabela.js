
var nomeprofessor = document.getElementById("nomeprofessor"); 
var disciplina =  document.getElementById("discprofessor");
var tabela = document.getElementById("tabela_resultado");


document.getElementById("busc_botao").addEventListener("click", function(event){
  event.preventDefault();
});

function TabelaResult() {
  const busca = { nomeprof: nomeprofessor.value, disciplinaprof: disciplina.value };
 const pedido = JSON.stringify(busca);

  const xhttp = new XMLHttpRequest();
 xhttp.onload = function() {
    
      tabela.innerHTML = this.responseText;
      const cells = document.querySelectorAll('tr');
    for (var i = 1; i < cells.length; i++) {
      cells[i].addEventListener('click', function () {
      mostrarTabela();
      var modal = document.getElementById("myModal");
      var span = document.getElementsByClassName("close")[0];
      
      modal.style.display = "block";
      
      span.onclick = function() { modal.style.display = "none";}
      
      window.onclick = function(event) { 
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
      
    });
      
    }
  }
    

  
  xhttp.open("POST", "http://localhost:80/esqueletoHTMLTCC_20/phpscripts/comandos2.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("x= " + pedido);

}


function mostrarTabela() {
 var table = document.getElementsByTagName("table")[0];
 var tbody = table.getElementsByTagName("tbody")[0];
 
 var nome = document.querySelectorAll("input[name=add_prof]");
 var cpf = document.querySelectorAll("input[name=cp_f]");
 var rg = document.querySelectorAll("input[name=r_g]");
var disc = document.querySelectorAll("input[name=dis_c]");
var dpv = document.querySelectorAll("input[name=dpv_prof]");


 tbody.onclick = function (e) {
    e = e || window.event;
    var data = [];
    var target = e.srcElement || e.target;
    while (target && target.nodeName !== "TR") {
        target = target.parentNode;
    }
    if (target) {
        var cells = target.getElementsByTagName("td");
        for (var i = 0; i < cells.length; i++) {
            data.push(cells[i].innerHTML);
        }
    }

    nome[0].value=data[0];
    cpf[0].value=data[2];
    rg[0].value=data[3];
    disc[0].value=data[1];

};
}