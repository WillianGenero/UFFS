<?php
	include "../includes/conexao.php";
	if(isset($_GET['id'])){
		if(is_numeric($_GET['id'])){
			$sql = "delete from produto where codigo={$_GET['id']}";
			$rest = mysqli_query($conexao, $sql);
			header("Location: alt_produto.php"); 
		}
	}
	if(isset($_GET['idA'])){
		if(is_numeric($_GET['idA'])){
			$sql = "delete from atend where codAtend={$_GET['idA']}";
			$rest = mysqli_query($conexao, $sql);
			header("Location: clientes.php"); 
		}
	}
?>

