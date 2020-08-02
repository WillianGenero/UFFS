function carregaCidade(){
  	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(this.responseText != ""){
				document.getElementById("cidade").innerHTML = "<option value=''>Selecione</option>";
				document.getElementById("cidade").innerHTML += this.responseText;
				document.getElementById("cidade").disabled = "";
			}
			else{
				document.getElementById("cidade").innerHTML = "<option value=''>Selecione o estado</option>";
				document.getElementById("cidade").disabled = "disabled";
			}					
		}
	};
	regiao = document.getElementById("regiao").value;
	xhttp.open("GET", "ajax/buscaCidades.php?regiao=" + regiao, true);
	xhttp.send();
}
