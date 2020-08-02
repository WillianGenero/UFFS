<?php
	@session_start();
	if(!isset($_SESSION['nome']))
		header("Location: ../admin/index.php");
	include '../includes/cabecalhoADM.php';
?>
<div class="alterar" align="center">
	<h2 class="title">Clientes</h2>
	<table>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Telefone</th>
			<th>Cidade</th>
			<th>Endereço</th>			
			<th>Orçamento Realizado?</th>
		</tr>
		<?php
			include '../includes/conexao.php';
			$sql = "select * from atend natural left join atendDom";
			$rest = mysqli_query($conexao, $sql);
			if(mysqli_num_rows($rest)==0){
				?>
				<tr>
					<td colspan="4">Nenhum orçamento solicitado.</td>
				</tr>
				<?php
			}else{
				while($produto = mysqli_fetch_array($rest)){
					?>
					<tr>
						<td><?=$produto['nome'];?></td>
						<td><?=$produto['email'];?></td>
						<td><?=$produto['tel1'];?></td>
						<td><?=$produto['cidade'];?></td>
						<td><?=$produto['ende'];?></td>						
						<td><a href="exc.php?idA=<?=$produto['codAtend'];?>"><img src="../img/outros/sim.jpeg" style="width: 30px;"></a></td>
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