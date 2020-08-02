document.getElementById('atenDomes').onclick = function(){
	document.getElementById('exibirField').style.display = 'flex';
//	document.getElementById('cidade').disabled = true;
};
document.getElementById('atenOnline').onclick = function(){
	document.getElementById('exibirField').style.display = 'none';
};

document.getElementById('form-contato').onsubmit = validaCadastro;
function validaCadastro(){
	var contErro = 0;

	var nome = document.getElementById('nome');
	var erro_nome = document.getElementById('msg-nome');
	if((nome.value == '') || (nome.value.indexOf(' ') == -1)){
		contErro+=1;
		erro_nome.innerHTML = 'Por favor, digite seu nome completo';

	}else{
		erro_nome.style.display = 'none';
	}

	var email = document.getElementById('email');
	var erro_email = document.getElementById('msg-email');
	if((email.value == '')||(email.value.indexOf('@')==-1)){
		contErro+=1;
		erro_email.innerHTML = 'Por favor, digite seu email';
	}else{
		erro_email.style.display = 'none';
	}

	var telefone = document.getElementById('telefone');
	var erro_telefone = document.getElementById('msg-telefone');
	if(telefone.value == ''){
		contErro+=1;
		erro_telefone.innerHTML = 'Por favor, digite seu telefone';
	}else{
		erro_telefone.style.display = 'none';
	}

	var atenO = document.getElementById('atenOnline');
	var atenD = document.getElementById('atenDomes');
	var erro_atend = document.getElementById('msg-atend');
	if(!atenO.checked & !atenD.checked){
		contErro+=1;
		erro_atend.innerHTML = 'Por favor, selecione o atendimento desejado';
		erro_atend.style.display = 'block';
	}else{
		erro_atend.style.display = 'none';
	}
if(atenD.checked){
	var cidade = document.getElementById('cidade');
	var erro_cidade = document.getElementById('msg-cidade');
	if(cidade.value == ''){
		contErro+=1;
		erro_cidade.innerHTML = 'Por favor, selecione sua cidade';
		erro_cidade.style.display = 'block';
	}else{
		erro_cidade.style.display = 'none';
	}


	var bairro = document.getElementById('bairro');
	var erro_bairro = document.getElementById('msg-bairro');
	if(bairro.value == ''){
		contErro+=1;
		erro_bairro.innerHTML = 'Por favor, digite seu bairro';
		erro_bairro.style.display = 'block';
	}else{
		erro_bairro.style.display = 'none';
	}

	var endereco = document.getElementById('endereco');
	var erro_endereco = document.getElementById('msg-endereco');
	if(endereco.value == ''){
		contErro+=1;
		erro_endereco.innerHTML = 'Por favor, digite seu endereco';
		erro_endereco.style.display = 'block';
	}else{
		erro_endereco.style.display = 'none';
	}

	var num = document.getElementById('num');
	var erro_num = document.getElementById('msg-num');
	if(num.value == ''){
		contErro+=1;
		erro_num.innerHTML = 'Por favor, digite o número';
		erro_num.style.display = 'block';
	}else{
		erro_num.style.display = 'none';
	}
}

	if(contErro>0){
		return false;
	}else if(contErro==0){
		alert('Cadastro efetuado com sucesso.');
		return false;
	}
}