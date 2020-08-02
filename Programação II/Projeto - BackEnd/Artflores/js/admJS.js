document.getElementById('planta').onclick = function(){
	document.getElementById('exibirPlanta').style.display = 'flex';
	document.getElementById('exibirDeco').style.display = 'none';
	document.getElementById('exibirPiso').style.display = 'none';
};
document.getElementById('decorativo').onclick = function(){
	document.getElementById('exibirDeco').style.display = 'flex';
	document.getElementById('exibirPlanta').style.display = 'none';
	document.getElementById('exibirPiso').style.display = 'none';
};
document.getElementById('piso').onclick = function(){
	document.getElementById('exibirPiso').style.display = 'flex';
	document.getElementById('exibirPlanta').style.display = 'none';
	document.getElementById('exibirDeco').style.display = 'none';
};
