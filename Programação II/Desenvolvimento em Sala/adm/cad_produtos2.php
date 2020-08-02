<?php
include "../includes/conexao.php";

if (isset($_POST['cadastrar'])){
	$nome = $_POST['nome'];
	$fabricante = ($_POST['fabricante'] == 0)? 'NULL' : $_POST['fabricante'];
	$imagem = !empty($_FILES['arquivo']['name']) ? "'{$_FILES['arquivo']['name']}'" : 'NULL';
	if(!move_uploaded_file($_FILES['arquivo']['tmp_name'], "../img/produtos/{$_FILES['arquivo']['name']}"))
		echo "erro";
	else
		echo "sucesso";

	$descricao = $_POST['descricao'];
	$tensao = $_POST['tensao'];
	$catMarcenaria = isset($_POST['marcenaria']) ? 1 : 0;
	$catJardinagem = isset($_POST['jardinagem']) ? 1 : 0;
	$catLimpeza = isset($_POST['limpeza']) ? 1 : 0;
	$catEscritorio = isset($_POST['escritorio']) ? 1 : 0;
	$catMecanica = isset($_POST['mecanica']) ? 1 : 0;
	$catOutros = isset($_POST['outros']) ? 1 : 0;
	$quantidade = $_POST['quantidade'];
	$valor = $_POST['valor'];
	$desconto = $_POST['desconto'];
	
	echo $sql = "INSERT INTO produto (nome, idFabricante, imagem, descricao, tensao, catMarcenaria, catJardinagem, catLimpeza, catEscritorio, catMecanica, catOutros, qtde, valor, desconto) VALUES ('$nome', $fabricante, $imagem, '$descricao', $tensao, $catMarcenaria, $catJardinagem, $catLimpeza, $catEscritorio, $catMecanica, $catOutros, $quantidade, $valor, $desconto)";
	$resultado = mysqli_query($conexao, $sql);
	if($resultado){
		$mensagem = "O produto <strong>$nome</strong> foi inserido com sucesso!";
	}
	else{
 		$mensagem = "Erro. O produto não pôde ser cadastrado.<br>";
      	$mensagem .= mysqli_error($conexao); // para debug!	
    }
 
}

?>

	<?php
	include "cabecalhoAdm.php";
	?>
		<div class="container">
			<main>
				<h2>Cadastro de Produtos</h2>
				<?php
				if (isset($mensagem)){
					echo $mensagem;
					echo "<br><br><br><a href=\"cad_produtos.php\">Voltar para o cadastro</a><br><br><br>";
				}
				else
				{
					?>
				
				<form action="" method="post" id="form-cadastro" enctype="multipart/form-data">
					<div>
						<fieldset>
							<legend><strong>Dados do Produto</strong></legend>
							<div class="form-item">
								<label for="nome" class="label-alinhado">Nome:</label>
								<input type="text" id="nome" name="nome" size="50" required autofocus>								
							</div>
							
							<div class="form-item">
								<label for="fabricante" class="label-alinhado">Fabricante:</label>
									<select name="fabricante" id="fabricante">
										<option value="0">Não informado</option>
										<?php
										$sql = "select * from fabricante order by nome";
										$resultado = mysqli_query($conexao, $sql);
										while($row = mysqli_fetch_array($resultado)){
											echo "<option value = \"{$row['id']}\">{$row['nome']}</option>";
										}
										?>
									</select>
							</div>
							
							<div class="form-item">
								<label for="arquivo" class="label-alinhado">Selecione uma imagem:</label>
								<input type="file" name="arquivo" id="arquivo">
							</div>

							<div class="form-item">
								<label for="desc" class="label-alinhado">Descrição:</label>
								<textarea name="descricao" rows="5" cols="30" id="desc"></textarea>
							</div>
							<div class="form-item">
								<label class="label-alinhado">Tensão: </label>
								<label><input type="radio" name="tensao" value="110" id="volt110">110v</label>
								<label><input type="radio" name="tensao" value="220" id="volt220">220v</label>							
								<label><input type="radio" name="tensao" value="0" id="voltNone" checked>Não se aplica</label>
							</div>
							<div class="form-item">
								<label class="label-alinhado">Categorias:</label>
								<label><input type="checkbox" id="marcenaria" name="marcenaria">Marcenaria</label>
								<label><input type="checkbox" id="jardinagem" name="jardinagem">Jardinagem</label>
								<label><input type="checkbox" id="limpeza" name="limpeza">Limpeza</label>
								<label><input type="checkbox" id="escritorio" name="escritorio">Escritório</label>
								<label><input type="checkbox" id="mecanica" name="mecanica">Mecânica</label>
								<label><input type="checkbox" id="outros" name="outros">Outros</label>
							</div>						
						</fieldset>
						<fieldset>
							<legend><strong>Dados da locação</strong></legend>
							<div class="form-item">
								<label for="qntDis" class="label-alinhado">Quantidade Disponível:</label>
								<input type="number" id="quantidade" name="quantidade" value="1" min="1">
							</div>
							<div class="form-item">
								<label for="valor" class="label-alinhado">Valor da locação:</label>
								<input type="text" id="valor" name="valor" placeholder="0.00">
							</div>
							<div class="form-item">
								<label for="desconto" class="label-alinhado">Desconto promocional:</label>
								<input type="text" id="desconto" name="desconto" value="0.00">
							</div>
							<div class="form-item">						
								<label for="total" class="label-alinhado">Total (R$):</label>
								<div id="total">0.00</div>
							</div>

							<div class="form-item">
						    	<label class="label-alinhado"></label>
						    	<input type="submit" id="botao" value="Cadastrar" name="cadastrar">
						    	<input type="reset" value="Limpar">
						    </div>						
						</fieldset>
					</div>
				</form>
				<?php
			}
			?>
			</main>	
			<aside>
				<ul class='itens'>
					<li>Total de Produtos: 
				<?php
				$sql = "select count(*) from produto";
				$resultado = mysqli_query($conexao, $sql);
				$total = mysqli_fetch_array($resultado);
				echo $total[0];
				?>
					</li>
					<li>Locados: -</li>
					<li>Disponíveis: -</li>
				</ul>
			</aside>
		
		</div>
		<section class="ultimos">
			<h4>Últimos produtos cadastrados:</h4>
			<table>
				<tr>
					<th>Nome</th>
					<th>Fabricante</th>
					<th>Valor da locação</th>
				</tr>
				<?php
				mysqli_free_result($resultado);
				include "../includes/functions.php";
				$sql = "select produto.nome as produto, fabricante.nome, produto.valor, produto.desconto from produto left outer join fabricante on fabricante.id = produto.idFabricante order by produto.id desc limit 3";
				$resultado = mysqli_query($conexao, $sql);
				while($prod = mysqli_fetch_array($resultado)){
				?>				
				<tr>
					<td><?=$prod[0];?></td>
					<td><?=$prod[1];?></td>
					<td><?=formataPreco($prod[2], $prod[3]);?></td>
				</tr>
				<?
			}
			?>
			</table>
		</section>

	<?php
		include "rodapeAdm.php";
	?>