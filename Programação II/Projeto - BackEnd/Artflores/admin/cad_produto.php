<?php
	include '../includes/conexao.php';
	@session_start();
	if(!isset($_SESSION['nome']))
		header("Location: ../admin/index.php");
	if(isset($_POST['cadastrar'])){
		$erros = array();
		$nomePop = addslashes($_POST['nomePop']);
		$preco = $_POST['preco'];
		$imagem = (empty($_FILES['imagem']['name']))? 'NULL' : "'{$_FILES['imagem']['name']}'";
		$estoque = isset($_POST['estoque']) ? $_POST['estoque'] : '';
		$categoria = isset($_POST['categ']) ? $_POST['categ'] : '';

# Resolver erros dos dados principais.
		if(empty($nomePop))
			$erros[] = 'O nome do produto não pode ser vazio.';
		if(!is_numeric($preco))
			$erros[] = 'Preço inválido.';
		if($preco <= 0)
			$erros[] = 'Preço deve ser maior que 0.';
# Resolver cada categoria e seus erros.
		if($categoria == 'planta'){
			$nomeCient = addslashes($_POST['nomeCient']);
			$alturaP = addslashes($_POST['alturaP']);
			$tipoPlanta = $_POST['tipoPlanta'];
			$condicao = addslashes($_POST['condicao']);
			if(empty($alturaP))
				$erros[] = 'Altura inválida.';
			if(empty($tipoPlanta))
				$erros[] = 'Selecione um tipo.';
			if(!is_numeric($alturaP))
				$erros[] = 'A altura deve ser um número.';
		}elseif($categoria == 'decorativo'){
			$alturaD = addslashes($_POST['altura']);
			$larguraD = addslashes($_POST['largura']);
			$comprimD = addslashes($_POST['comprim']);
			if(empty($alturaD))
				$erros[] = 'Altura inválida.';
			if(empty($larguraD))
				$erros[] = 'Largura inválida.';
			if(empty($comprimD))
				$erros[] = 'Comprimento inválido.';
			if(!is_numeric($alturaD))
				$erros[] = 'A altura deve ser um número.';
			if(!is_numeric($larguraD))
				$erros[] = 'A largura deve ser um número.';
			if(!is_numeric($comprimD))
				$erros[] = 'O comprimento deve ser um número.';
		}elseif($categoria == 'piso'){
			$qnt_cap = addslashes($_POST['qnt-cap']);
			if(empty($qnt_cap))
				$erros[] = 'Quantidade/Capacidade inválida.';
		}
		if(count($erros)==0){
			$sqlP = "insert into produto (preco, nomePopular, imagem, estoque) values
			 ($preco, '$nomePop', $imagem, $estoque);";
			$resultado = mysqli_query($conexao, $sqlP);
			if($resultado){
				if($categoria == 'planta'){
					if($imagem <> 'NULL'){
						$destino = "../img/plantas/".$_FILES['imagem']['name'];
						if(!move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)){
							$erros[] = "Falha no upload do arquivo";
						}
					}
					$sql = "select codigo from produto order by codigo desc limit 1;";
					$resultado = mysqli_query($conexao, $sql);
					$idProduto = mysqli_fetch_array($resultado)[0];
					$sqlS = "insert into planta (codProduto, tipo, nomeCient, altura, condicoes)
							values ($idProduto, '$tipoPlanta', '$nomeCient', $alturaP, '$condicao');";
					$resultado = mysqli_query($conexao, $sqlS);
					if($resultado)
						$mensagem = "O produto <strong>$nomePop</strong> foi inserido com sucesso";
					else{
						$mensagem = "Erro. O produto não pôde ser cadastrado. ";
						$mensagem .= mysqli_error($conexao);
					}
				}elseif($categoria == 'decorativo'){
					if($imagem <> 'NULL'){
						$destino = "../img/decorativos/".$_FILES['imagem']['name'];
						if(!move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)){
							$erros[] = "Falha no upload do arquivo";
						}
					}
					$sql = "select codigo from produto order by codigo desc limit 1;";
					$resultado = mysqli_query($conexao, $sql);
					$idProduto = mysqli_fetch_array($resultado)[0];
					$sqlS = "insert into decorativo (codProduto, altura, largura, comprim) values 
					($idProduto, $alturaD, $larguraD, $comprimD);";
					$resultado = mysqli_query($conexao, $sqlS);
					if($resultado)
						$mensagem = "O produto <strong>$nomePop</strong> foi inserido com sucesso";
					else{
						$mensagem = "Erro. O produto não pôde ser cadastrado. ";
						$mensagem .= mysqli_error($conexao);
					}
				}elseif($categoria == 'piso'){
					if($imagem <> 'NULL'){
						$destino = "../img/pisos/".$_FILES['imagem']['name'];
						if(!move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)){
							$erros[] = "Falha no upload do arquivo";
						}
					}				
					$sql = "select codigo from produto order by codigo desc limit 1;";
					$resultado = mysqli_query($conexao, $sql);
					$idProduto = mysqli_fetch_array($resultado)[0];
					$sqlS = "insert into piso (codProduto, qnt_capac) values ($idProduto, '$qnt_cap');";
					$resultado = mysqli_query($conexao, $sqlS);
					if($resultado)
						$mensagem = "O produto <strong>$nomePop</strong> foi inserido com sucesso";
					else{
						$mensagem = "Erro. O produto não pôde ser cadastrado. ";
						$mensagem .= mysqli_error($conexao);
					}
				}
			}
		}
	}


	include '../includes/cabecalhoADM.php';
?>
<div class="container">
	<main>
		<h2 class="title">Cadastro de Produtos</h2>	
		<?php
			if (isset($mensagem))
				echo "<p>$mensagem</p><br><br>";
			else{ // carrega form
				if(isset($erros)){
					echo "<ul>";
					foreach ($erros as $erro)
						echo "<li style='color: red;'>$erro</li>";
					echo "</ul>";
				}
		?>
		<form action="" method="post" id="cad-produto" enctype="multipart/form-data">
			<div>
				<fieldset>
					<legend><strong>Dados Principais</strong></legend>
					<div class="cadItem">
						<label for="nomePop" class="cadAlinhado">Nome Popular: </label>
						<input type="text" name="nomePop" id="nomePop" size="50" autofocus value="<?=isset($_POST['nomePop'])? $_POST['nomePop'] : '' ?>">
					</div>
					<div class="cadItem">
						<label for="preco" class="cadAlinhado">Preço: </label>
						<input type="text" name="preco" id="preco" value="<?=isset($_POST['preco'])? $_POST['preco'] : '' ?>">
					</div>
					<div class="cadItem">
						<label for="imagem" class="cadAlinhado">Selecione a imagem: </label>
						<input type="file" name="imagem" id="imagem">
					</div>
					<div class="cadItem">
						<label class="cadAlinhado">Estoque: </label>
						<?php
							if(isset($_POST['estoque']))
								$estoque = $_POST['estoque'];
							else
								$estoque = 0;
						?>
						<label><input type="radio" name="estoque" id="estDis" value="0" <?= ($estoque == 0) ? "checked" : '' ?> >Disponível</label>
						<label><input type="radio" name="estoque" id="estInd" value="1" <?= ($estoque == 1) ? "checked" : '' ?> >Indisponível</label>
					</div>
					<div class="cadItem">
						<label for="categ class="cadAlinhado">Categoria: </label>
						<?php
							if(isset($_POST['categ']))
								$catego = $_POST['categ'];
							else
								$catego = '';
						?>
						<label><input type="radio" name="categ" id="planta" value="planta" <?= ($catego == "planta") ? "checked" : '' ?> >Planta</label>
						<label><input type="radio" name="categ" id="decorativo" value="decorativo" <?= ($catego == "decorativo") ? "checked" : '' ?> >Decorativo</label>
						<label><input type="radio" name="categ" id="piso" value="piso" <?= ($catego == "piso") ? "checked" : '' ?> >Piso</label>
					</div>					
				</fieldset>
				<fieldset id="exibirPlanta">
					<legend><strong>Dados para Plantas</strong></legend>
					<div class="cadItem">
						<label for="nomeCient" class="cadAlinhado">Nome Científico: </label>
						<input type="text" name="nomeCient" id="nomeCient" size="50" autofocus value="<?=isset($_POST['nomeCient']) ? $_POST['nomeCient'] : '';?>">
					</div>
					<div class="cadItem">
						<label for="alturaP" class="cadAlinhado">Altura (cm): </label>
						<input type="text" name="alturaP" id="alturaP" value="<?=isset($_POST['alturaP']) ? $_POST['alturaP'] : '';?>">
					</div>
					<div class="cadItem">
						<label for="tipoPlanta" class="cadAlinhado">Tipo: </label>
						<select name="tipoPlanta" id="tipoPlanta">
							<option value="">Selecione</option>
							<?php
								$sql = 'select * from tipoPlanta';
								$resultado = mysqli_query($conexao, $sql);
								while ($registro = mysqli_fetch_array($resultado)){	
									echo "<option value='{$registro['sigla']}'";
									if(isset($_POST['tipoPlanta'])){
										if($_POST['tipoPlanta'] == $registro['sigla'])  
										  echo " selected";	
									}	  
									echo ">{$registro['nome']}</option>";
								}
							?>
						</select>
					</div>
					<div class="cadItem">
						<label for="condicao" class="cadAlinhado">Condições: </label>
						<textarea name="condicao" id="condicao" rows="5" cols="30"><?=isset($_POST['condicao'])? $_POST['condicao'] : '';?></textarea>
					</div>
				</fieldset>
				<fieldset id="exibirDeco">
					<legend><strong>Dados para Decorativos</strong></legend>
					<div class="cadItem">
						<label for="altura" class="cadAlinhado">Altura (cm): </label>
						<input type="text" name="altura" id="altura" value="<?=isset($_POST['altura']) ? $_POST['altura'] : '';?>">
					</div>
					<div class="cadItem">
						<label for="largura" class="cadAlinhado">Largura (cm): </label>
						<input type="text" name="largura" id="largura" value="<?=isset($_POST['largura']) ? $_POST['largura'] : '';?>">
					</div>
					<div class="cadItem">
						<label for="comprim" class="cadAlinhado">Comprimento (cm): </label>
						<input type="text" name="comprim" id="comprim" value="<?=isset($_POST['comprim']) ? $_POST['comprim'] : '';?>">
					</div>		
				</fieldset>
				<fieldset id="exibirPiso">
					<legend><strong>Dados para Pisos</strong></legend>
					<div class="cadItem">
						<label for="qnt-cap" class="cadAlinhado">Quantidade/Capacidade (L/Kg/m): </label>
						<input type="text" name="qnt-cap" id="qnt-cap" placeholder="45 Kg" value="<?=isset($_POST['qnt-cap']) ? $_POST['qnt-cap'] : '';?>">
					</div>
				</fieldset>
				<div class="cadItem">
					<label class="cadAlinhado"></label>
					<input type="submit" id="botao" value="Cadastrar" name="cadastrar">
					<input type="reset" value="Limpar">
				</div>	
			</div>
		</form>
		<?php } ?>
	</main>
</div>
<script type="text/javascript" src="../js/admJS.js"></script>

<?php
	include '../includes/footerADM.php';
?>