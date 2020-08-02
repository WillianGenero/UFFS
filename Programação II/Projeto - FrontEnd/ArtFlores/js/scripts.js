document.getElementById("exibirMenu").onclick = function(){
	var menu = document.getElementsByClassName("menu-opcoes")[0];
	if(menu.style.display == 'block')
		menu.style.display = 'none';
	else
		menu.style.display = 'block';
};
