<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Floricultura ArtFlores</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/jpg" href="../img/logo.jpeg">
		<link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Marck+Script" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/admCSS.css">
		<link rel="stylesheet" type="text/css" href="../css/headerADM.css">
	</head>
	<body>		
		<header>
			<div id="areaSup">
				<h2 class="nomes">Floricultura ArtFlores</h2>
				<h2 class="nomes">Área Administrativa</h2>
			</div>
			<nav class="menu">
				<p id="exibirMenu">&#9776; Menu</p>
				<ul class="menu-opcoes">
					<li> <a href="cad_produto.php">Cadastro de Produtos</a> </li>
					<li> <a href="alt_produto.php">Alterar/Excluir Produtos</a> </li>
					<li> <a href="clientes.php">Clientes</a></li>
<!--					<li> <a href="#"></a> </li> -->
				</ul>
			</nav>

		</header>
