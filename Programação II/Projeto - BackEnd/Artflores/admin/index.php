<?php
include "../includes/cabecalhoADM.php";
?>
	<div class="container">
	 	<div>
		 	<h2 class="title">Identifique-se</h2>
			<form class="login" action="verificacao.php" method="post">
				<div class="form-item">
					<label for="login" class="label-alinhado">Login:</label>
					<input type="text" id="login" name="login" autofocus>
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
				<input type="submit" id="botao" value="Entrar">
			</form>
		</div>
	</div>
<?php
include "../includes/footerADM.php";
?>
