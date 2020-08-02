<?php
include "includes/cabecalho.php";
?>

	<!-- area central com 3 colunas -->
	<div class="container">
		<?php
		include "includes/menu_lateral.php";
		?>		

		<section class="col-2">
	 	<h2>Identifique-se</h2>
			<form class="login" action="verificacao.php" method="post">
				<div class="form-item">
					<label for="login" class="label-alinhado">Login:</label>
					<input type="text" id="login" name="login">
				</div>
				<div class="form-item">
					<label for="senha" class="label-alinhado">Senha:</label>
					<input type="password" id="senha" name="senha">				
				</div>
				<div class="msg-erro" id="msg-senha">
				  <?php
			        if(isset($_GET['erro'])){
			          if($_GET['erro'] == 1)
			            echo "Login incorreto";
			          elseif($_GET['erro'] == 2)
			            echo "Senha incorreta";
			        }
			        ?>	
			    </div>
			    <div class="form-item">
			    	<label for="senha" class="label-alinhado"></label>
					<input type="submit" id="botao" value="Entrar">
				</div>
			</form>
			<div class="teste">
				<p><a href="cad_cliente.php"><br>Quero me Cadastrar</p></a>
				<p><a href="#">Esqueci minha senha</a></p>
			</div>					
		</section>
	</div>
	<!-- fim area central -->
<?php
include "includes/rodape.php";
?>
