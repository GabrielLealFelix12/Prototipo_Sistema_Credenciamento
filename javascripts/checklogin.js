/*
function loadDoc(){
console.log("pain");
}

*/
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    
    var resposta = this.responseText;
    if (resposta === "logado"){
      return true;
    }else{
      window.location = "http://localhost:80/esqueletoHTMLTCC_20/login.html"
    };

  };
  
  xhttp.open("POST", "http://localhost:80/esqueletoHTMLTCC_20/phpscripts/checagem.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();
}

function SaidaPage() {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Saindo...");
    }
  };
  xhttp.open("POST", "http://localhost:80/esqueletoHTMLTCC_20/phpscripts/sair.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();
}
