<?php
	include "includes/conexao.php";
	if(isset($_POST['cadastrar'])){
		$erros = array();
		$nome = trim(addslashes($_POST['nome']));
		$email = trim(addslashes($_POST['email']));
		$tel1 = trim(addslashes($_POST['telefone']));
		$tel2 = trim(addslashes($_POST['telefone2']));
		$atend = $_POST['atendimento'];
# Resolver erros com a tabela atendimento.
		if(empty($nome) || !strstr($nome, " "))
			$erros[] = "Digite seu nome completo";
		if(empty($email) || !(filter_var($email, FILTER_VALIDATE_EMAIL)))
           $erros[] = "Digite um email válido";
       	if(empty($tel1))
       		$erros[] = "Digite um telefone válido";
		
		if($atend == 'atenDomes'){
			$cidade = $_POST['cidade'];
			$bairro = trim(addslashes($_POST['bairro']));
			$endereco = trim(addslashes($_POST['endereco']));
# Resolver erros na tabela doméstica
			if(empty($cidade))
				$erros[] = "Cidade não pode ser vazia";
			if(empty($bairro))
				$erros[] = "Bairro não pode ser vazio";
			if(empty($endereco))
				$erros[] = "Endereço não pode ser vazio";
	    }
	    if(count($erros) == 0){
			$sqlP = "insert into atend (nome, email, tel1, tel2) values ('$nome', '$email', '$tel1', '$tel2')";
			$resultado = mysqli_query($conexao, $sqlP);
			if($resultado){
				if($atend == 'atenDomes'){
					$sql = "select codAtend from atend order by codAtend desc limit 1";
					$resultado = mysqli_query($conexao, $sql);
					$codAtend = mysqli_fetch_array($resultado)[0];
					$sqlS = "insert into atendDom (codAtend, cidade, ende, bairro) values
					 ($codAtend, '$cidade', '$endereco', '$bairro')";
					 $resultado = mysqli_query($conexao, $sqlS);
					 if($resultado)
					 	$mensagem = "$nome, seu pedido de orçamento foi cadastrado com sucesso.";
				}else
					$mensagem = "$nome, seu pedido de orçamento foi cadastrado com sucesso.";
			}
		}
	}


	include 'includes/cabecalhoInicial.php';
?>
	    <script src="js/cidades.js"></script>
		<section class="container-cont">
			<div id="contato">
				<h3 class='orcamento'>Solicite seu orçamento.</h3>
				<?php
					if (isset($mensagem))
						echo "<h3 style='height: 500px;'>$mensagem</h3>";
					else{ // carrega form
						if(isset($erros)){
							echo "<ul>";
							foreach ($erros as $erro)
								echo "<li style='color: red;'>$erro</li>";
							echo "</ul>";
						}
						echo "<br><br>";
				?>
				<form action="" method="post" id="form-contato" enctype="multipart/form-data">
					<div class="form-item">
						<label for="nome" class="label-alinhado">Nome:</label>
						<input type="text" id="nome" name="nome" size="30" placeholder="Fulano da Silva Rodrigues" value="<?=isset($_POST['nome']) ? $_POST['nome'] : ''?>">
						<span class="msg-erro" id="msg-nome"></span>
					</div>
					<div class="form-item">
						<label for="email" class="label-alinhado">Email:</label>
						<input type="email" id="email" name="email" placeholder="exemplo@exemplo.com.br" size="30" value="<?=isset($_POST['email']) ? $_POST['email'] : ''?>">
						<span class="msg-erro" id="msg-email"></span>
					</div>
					<div class="form-item">
						<label for="telefone" class="label-alinhado">Telefone Principal:</label>
						<input type="text" id="telefone" name="telefone" placeholder="XX XXXXX XXXX" size="30" value="<?=isset($_POST['telefone']) ? $_POST['telefone'] : ''?>">
						<span class="msg-erro" id="msg-telefone"></span>
					</div>
					<div class="form-item">
						<label for="telefone2" class="label-alinhado">Telefone Secundário:</label>
						<input type="text" id="telefone2" name="telefone2" placeholder="XX XXXXX XXXX" size="30" value="<?=isset($_POST['telefone2']) ? $_POST['telefone2'] : ''?>">
						<span class="msg-erro" id="msg-telefone2"></span>
					</div>
					<div class="form-item">
						<label for="atendi" class="label-alinhado">Atendimento:</label>
						<label><input type="radio" id="atenOnline" name="atendimento" value="atenOnline" checked>Online</label>
						<label><input type="radio" id="atenDomes" name="atendimento" value="atenDomes">Doméstico</label>
						<span class="msg-erro" id="msg-atend"></span>
					</div>
					<fieldset id="exibirField">
						<legend>Dados de Endereço</legend>
						<div class="form-item">
							<label>Região:
							<select name="regiao" id="regiao" onchange="carregaCidade()">
								<option value="">Selecione</option>
								<option value="CH">Chapecó</option>
								<option value="CO">Concórdia</option>
								<option value="XA">Xanxerê</option>
								<option value="NO">Nonoai</option>
							</select>
							<span class="msg-erro" id="msg-regiao"></span>
							</label>
						</div>
						<div class="form-item">
							<label for="cidade" class="label-alinhado">Cidade:</label>
							<select name="cidade" id="cidade" disabled="disabled">
								<option value="">Selecione a cidade</option>
							</select>
							<span class="msg-erro" id="msg-cidade"></span>
						</div>
						<div class="form-item">
							<label for="bairro" class="label-alinhado">Bairro:</label>
							<input type="text" id="bairro" name="bairro" size="30" placeholder="Ex: Centro" value="<?=isset($_POST['bairro']) ? $_POST['bairro'] : ''?>">
							<span class="msg-erro" id="msg-bairro"></span>
						</div>	
						<div class="form-item">
							<label for="endereco" class="label-alinhado">Endereço: </label>
							<input type="text" id="endereco" name="endereco" placeholder="Ex: Avenida Getúlio Gragas, 777 - E" size="30" value="<?=isset($_POST['endereco']) ? $_POST['endereco'] : ''?>">
							<span class="msg-erro" id="msg-endereco"></span>
						</div>
					</fieldset>
					<div class="form-item">
						<label class="label-alinhado"></label>
						<input type="submit" id="botao" value="Confirmar" name="cadastrar">
						<input type="reset" name="Limpar">
					</div>
				</form>
			</div>
			<div id="localizacao">
				<h3 class="orcamento">Se desejar, entre em contato conosco.</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1776.324554744595!2d-52.61257545983667!3d-27.07282169968494!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xae409cdb15e7cbc2!2sFloricultura+Artflores!5e0!3m2!1spt-BR!2sbr!4v1537450578163" width="400" height="300" style="border:0" allowfullscreen></iframe>
				
				<div id="nosso-contato">
					<p><strong>Endereço:</strong> Rua Quatorze de Agosto, 3435 - E. Bairro Líder - Chapecó - SC</p>
					<p><strong>Whatsapp:</strong> (49) 99922-4994</p>
					<p><strong>Telefone:</strong> (49) 2020-0377</p>
					<p><strong>Facebook:</strong> <a href=http://facebook.com/artfloreschapeco>facebook.com/artfloreschapeco</a></p>
				</div>
				<?php
					}
				?>
			</div>
		</section>
	<script src="js/contato.js"></script>
<?php
	include 'includes/footerInicial.php';
?>