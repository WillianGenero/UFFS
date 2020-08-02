<?php
  include "../includes/conexao.php";
  $login = $_POST["login"];
  if($login != 'artflores')
    header("Location: index.php?erro=1");
  else{
    $user = 'ArtFlores';
    $senhaDigitada = $_POST['senha'];
    if($senhaDigitada == 'senhasecreta'){
      session_start();
      $_SESSION["nome"] = 'ArtFlores';
			header("Location: cad_produto.php");
    }else{
      header("Location: index.php?erro=2");
    }
  }
 ?>