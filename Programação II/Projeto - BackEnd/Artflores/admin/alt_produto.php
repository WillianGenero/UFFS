<?php
	@session_start();
	if(!isset($_SESSION['nome']))
		header("Location: ../admin/index.php");
	include '../includes/cabecalhoADM.php';
?>
<div class="alterar" align="center">
	<h2 class="title">Produtos</h2>
	<table>
		<tr>
			<th>Nome</th>
			<th>Preço</th>
			<th>Estoque</th>
			<th>Operação</th>
		</tr>
		<?php
			include '../includes/conexao.php';
			$sql = "select * from produto";
			$rest = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($rest)==0){
				?>
				<tr>
					<td colspan="4">Nenhum produto encontrado.</td>
				</tr>
				<?php
			}else{
				while($produto = mysqli_fetch_array($rest)){
					?>
					<tr>
						<td><?=$produto['nomePopular'];?></td>
						<td><?=$produto['preco'];?></td>
						<td><?=($produto['estoque'])==0 ? "Disponível" : "Indisponível";?></td>
						<td> <a href="alt_prod.php?id=<?=$produto['codigo'];?>"><img src="../img/outros/editar.png" style="width: 30px;"></a>
							 <a href="exc.php?id=<?=$produto['codigo'];?>"> <img src="../img/outros/excluir.jpg" style="width: 30px;"></a>
						</td>
					</tr>
				<?php
				}
			}

				?>


	</table>
</div>

<?php
	include '../includes/footerADM.php';
?>