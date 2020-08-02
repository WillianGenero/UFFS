function calculaTotal() {
  var valor = document.getElementById('valor');
  var desconto = document.getElementById('desconto');
  var total = document.getElementById('total');  

  var valor_total = parseFloat(valor.value) - parseFloat(desconto.value);
  total.innerHTML = valor_total;
}


function cadastroProduto() {
  if(document.getElementById('nome').value.length <= 0) {
    alert('O nome do produto está em branco');
    return false;
  }

  if(!marcenaria.checked & !jardinagem.checked & ! limpeza.checked & !escritorio.checked & !mecanica.checked & !outros.checked){
      alert('O produto deve pertencer a pelo menos uma categoria');
      return false;
  }

  if(parseFloat(total.innerText) <= 0) {
    alert('O valor final deve ser maior que zero');
    return false;
  }
}

function confirmaExclusao(){
  if(!confirm("Tem certeza que deseja excluir o este produto?")){
    return false;
  }
}

