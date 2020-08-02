<?php
	include '../includes/cabecalhoProduto.php';
	include '../includes/conexao.php';
?>
		<section class="container">
			<div class="lista-opcoes">
				
				<?php
					$sql = "select pr.codigo, pr.nomePopular, pr.preco, pr.imagem from produto pr join piso pi on pi.codProduto=pr.codigo";
					$rest = mysqli_query($conexao, $sql);
					if(mysqli_num_rows($rest) == 0)
						echo "<h2 style='height: 470px; padding: 20px;'>Nenhum produto foi encontrado!</h2>";
					else{
						while($produto = mysqli_fetch_array($rest)){
							?>
							<div class="produto">
								<figure>
									<img src="../img/pisos/<?=$produto['imagem'];?>" alt="Piso: <?=$produto['nomePopular'];?>">
									<figcaption><?=$produto['nomePopular'];?><span class="preco">R$ <?=$produto['preco'];?></span></figcaption>
								</figure>
							</div>
				<?php
						}
					}
				?>
			</div>
		</section>
<?php
	include '../includes/footerProduto.php';
?>