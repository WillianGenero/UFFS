<?php
session_start();
$_SESSION['carrinho'][$_GET['id']]['quantidade'] = $_GET['quantidade']; // sobrescreve a quantidade
$total = 0;
foreach($_SESSION['carrinho'] as $produto){
$valorItem = $produto['quantidade'] * $produto['valorFinal'];
$total += $valorItem;
}
echo $total; // retorna o total geral do carrinho
?>