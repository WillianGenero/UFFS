<?php
  include "includes/conexao.php";
  $login = $_POST["login"];
  $sql = "select id, nome, login, senha, endereco, bairro from cliente where login = '$login';";
  $resultado = mysqli_query($conexao, $sql);
  if(mysqli_num_rows($resultado) == 0){
    header("Location: login.php?erro=1");
  }else{
    $user = mysqli_fetch_array($resultado);
    $senha2 = md5($_POST["senha"]);
    if($user["senha"] == $senha2){
      session_start();
			$_SESSION["login"] = $login;
      $_SESSION["nome"] = $user["nome"];
      $_SESSION["id"] = $user["id"];
      $_SESSION["endereco"] = $user["endereco"].", ".$user['bairro'];
			header("Location: index.php");
    }else{
      header("Location: login.php?erro=2");
    }
  }
 ?>
