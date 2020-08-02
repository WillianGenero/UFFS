<?php
include "cabecalhoAdm.php";
?>

<div class="container">
	<main>
		<h2>Relatório de Produtos</h2>
		<p>| <a href="cad_produtos.php">inserir novo</a> |</p>
		<table>
			<tr>
				<th>Nome <a href="?campo=nome&ordem=asc">&and;</a><a href="?campo=nome&ordem=desc">&or;</a></th>
				<th>Fabricante <a href="?campo=fabricante&ordem=asc">&and;</a><a href="?campo=fabricante&ordem=desc">&or;</a></th>
				<th>Valor da locação <a href="?campo=valorFinal&ordem=asc">&and;</a><a href="?campo=valorFinal&ordem=desc">&or;</a></th>
				<th>Ação</th>
			</tr>
			<?php
			include "../includes/conexao.php";
			include "../includes/functions.php";
			$sql = "select produto.id, produto.nome, valor, desconto, fabricante.nome as fabricante, (valor - desconto) as valorFinal from produto left join fabricante on produto.idFabricante = fabricante.id ";
			if(isset($_GET['campo']) & isset($_GET['ordem']))
				$sql .= " order by {$_GET['campo']} {$_GET['ordem']}";
			else
				$sql .= " order by nome asc";
			$resultado = mysqli_query($conexao, $sql);				
			if( mysqli_num_rows($resultado) == 0){
				?>
				<tr>
					<td colspan="4">Nenhum produto encontrado.</td>
				</tr>
				<?php	
			}
			else{
				while($prod = mysqli_fetch_array($resultado)){
					?>				
					<tr>
						<td><?=$prod['nome']; ?></td>
						<td><?=$prod['fabricante']; ?></td>
						<td><?=mostraPreco($prod['valor'], $prod['desconto']) ?></td>
						<td>| <a href="alterar_produto.php?id=<?=$prod['id'] ?>">alterar</a> | 
							  <a href="excluir_produto.php?id=<?=$prod['id'] ?>" onclick="return confirmaExclusao()">excluir</a> |</td>
					</tr>
					<?
				} // while
			} // else
			?>
			</table>
		</section>

	</main>	
	<?php
	include "asideAdm.php";
	?>
</div>

<?php
include "rodapeAdm.php";
?>
