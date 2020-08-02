<?php
	include '../includes/conexao.php';
	@session_start();
	if(!isset($_SESSION['nome']))
		header("Location: ../admin/index.php");
	if(isset($_POST['atualizar'])){
		$erros = array();
		$nomePop = addslashes($_POST['nomePop']);
		$preco = $_POST['preco'];
		$imagem = (empty($_FILES['imagem']['name']))? 'imagem' : "'{$_FILES['imagem']['name']}'";
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
			$sqlP = "update produto set preco=$preco, nomePopular='$nomePop', imagem=$imagem, estoque=$estoque where codigo={$_GET['id']}";
			$resultado = mysqli_query($conexao, $sqlP);
			if($resultado){
				if($categoria == 'planta'){
					if($imagem <> 'NULL'){
						$destino = "../img/plantas/".$_FILES['imagem']['name'];
						if(!move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)){
							$erros[] = "Falha no upload do arquivo";
						}
					}
					$sqlS = "update planta set tipo='$tipoPlanta', nomeCient='$nomeCient', altura=$alturaP, condicoes='$condicao' where codProduto={$_GET['id']}";
					$resultado = mysqli_query($conexao, $sqlS);
					if($resultado)
						$mensagem = "O produto <strong>$nomePop</strong> foi alterado com sucesso";
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
					$sqlS = "update decorativo set altura=$alturaD, largura=$larguraD, comprim=$comprimD where codProduto={$_GET['id']};";
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
					$sqlS = "update piso set qnt_capac='$qnt_cap' where codProduto={$_GET['id']};";
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
	}else{
		$sql = "select
					codProduto,
					tipo,
					nomeCient,
					altura,
					condicoes,
					0 as largura,
					0 as comprim,
				    '' as qnt_capac,
					'planta' as tipoT
				from planta
				where codProduto={$_GET['id']}
				union all
				select 
					codProduto,
					'' as tipo,
					'' as nomeCient,
					altura,
					'' as condicoes,
					largura,
					comprim,
				    '' as qnt_capac,
					'decorativo' as tipoT
				from decorativo
				where codProduto={$_GET['id']}
				union all
				select 
					codProduto,
					'' as tipo,
					'' as nomeCient,
					'' as altura,
					'' as condicoes,
					'' as largura,
					'' as comprim,
				    qnt_capac,
					'piso' as tipoT
				from piso
				where codProduto={$_GET['id']}";
		$rest = mysqli_query($conexao, $sql);
		$infoEs = mysqli_fetch_array($rest);
		$sql = "select * from produto where codigo={$_GET['id']}";
		$rest = mysqli_query($conexao, $sql);
		$infoP = mysqli_fetch_array($rest);
	}
	include '../includes/cabecalhoADM.php';
?>
<div class="container">
	<main>
		<?php
			if (isset($mensagem))
				echo "<h2 style='height:500px;'>$mensagem</h2><br><br>";
			else{ // carrega form
				if(isset($erros)){
					echo "<ul>";
					foreach ($erros as $erro)
						echo "<li style='color: red;'>$erro</li>";
					echo "</ul>";
				}
		?>
		<h2 class="title">Alterar Produto</h2>	
		<form action="" method="post" id="cad-produto" enctype="multipart/form-data">
			<div>
				<fieldset>
					<legend><strong>Dados Principais</strong></legend>
					<div class="cadItem">
						<label for="nomePop" class="cadAlinhado">Nome Popular: </label>
						<input type="text" name="nomePop" id="nomePop" size="50" autofocus value="<?=isset($_POST['nomePop'])? $_POST['nomePop'] : $infoP['nomePopular']?>">
					</div>
					<div class="cadItem">
						<label for="preco" class="cadAlinhado">Preço: </label>
						<input type="text" name="preco" id="preco" value="<?=isset($_POST['preco'])? $_POST['preco'] : $infoP['preco'] ?>">
					</div>
					<div class="cadItem">
						<label for="imagem" class="cadAlinhado">Selecione a imagem: </label>
						<input type="file" name="imagem" id="imagem">
						<small><em>*Não altere para manter a imagem atual.</em></small>
					</div>
					<div class="cadItem">
						<label class="cadAlinhado">Estoque: </label>
						<?php
							if(isset($_POST['estoque']))
								$estoque = $_POST['estoque'];
							else
								$estoque = $infoP['estoque'];
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
								$catego = $infoEs['tipoT'];
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
						<input type="text" name="nomeCient" id="nomeCient" size="50" autofocus value="<?=isset($_POST['nomeCient']) ? $_POST['nomeCient'] : $infoEs['nomeCient'];?>">
					</div>
					<div class="cadItem">
						<label for="alturaP" class="cadAlinhado">Altura (cm): </label>
						<input type="text" name="alturaP" id="alturaP" value="<?=isset($_POST['alturaP']) ? $_POST['alturaP'] : $infoEs['altura'];?>">
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
									}else{
										if($infoEs['tipo'] == $registro['sigla'])
											echo "selected";
									}

									echo ">{$registro['nome']}</option>";
								}
							?>
						</select>
					</div>
					<div class="cadItem">
						<label for="condicao" class="cadAlinhado">Condições: </label>
						<textarea name="condicao" id="condicao" rows="5" cols="30"><?=isset($_POST['condicao'])? $_POST['condicao'] : $infoEs['condicoes'];?></textarea>
					</div>
				</fieldset>
				<fieldset id="exibirDeco">
					<legend><strong>Dados para Decorativos</strong></legend>
					<div class="cadItem">
						<label for="altura" class="cadAlinhado">Altura (cm): </label>
						<input type="text" name="altura" id="altura" value="<?=isset($_POST['altura']) ? $_POST['altura'] : $infoEs['altura']?>">
					</div>
					<div class="cadItem">
						<label for="largura" class="cadAlinhado">Largura (cm): </label>
						<input type="text" name="largura" id="largura" value="<?=isset($_POST['largura']) ? $_POST['largura'] : $infoEs['largura'];?>">
					</div>
					<div class="cadItem">
						<label for="comprim" class="cadAlinhado">Comprimento (cm): </label>
						<input type="text" name="comprim" id="comprim" value="<?=isset($_POST['comprim']) ? $_POST['comprim'] : $infoEs['comprim'];?>">
					</div>		
				</fieldset>
				<fieldset id="exibirPiso">
					<legend><strong>Dados para Pisos</strong></legend>
					<div class="cadItem">
						<label for="qnt-cap" class="cadAlinhado">Quantidade/Capacidade (L/Kg/m): </label>
						<input type="text" name="qnt-cap" id="qnt-cap" placeholder="45 Kg" value="<?=isset($_POST['qnt-cap']) ? $_POST['qnt-cap'] : $infoEs['qnt_capac']?>">
					</div>
				</fieldset>
				<div class="cadItem">
					<label class="cadAlinhado"></label>
					<input type="submit" id="botao" value="Atualizar" name="atualizar">
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