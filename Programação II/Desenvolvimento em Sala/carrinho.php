<?php
include "includes/cabecalho.php";
?>
	<!-- area central com 3 colunas -->
	<div class="container">
		
		<?php
			include "includes/menu_lateral.php";
		?>
		<section class="col-2">	
			<?php
			include "includes/functions.php";
			if(!isset($_SESSION['carrinho'])){
				echo "<h2>Seu carrinho está vazio.";
			}
			else{
				?>
					<h2>Meu carrinho</h2>
					<div class="itemCarrinho">
						<span class="produtoCarrinho"><strong>Produto</strong></span>
						<span class="qtdeCarrinho"><strong>Quantidade</strong></span>
						<span class="precoCarrinho"><strong>Valor</strong></span>
					</div>
				<?php
					$total = 0;
					foreach($_SESSION['carrinho'] as $id => $item){
						?>
						<div class="itemCarrinho">
							<span class="produtoCarrinho"><?=$item['nome'];?></span>
							<input type="number" min="1" value="<?=$item['quantidade'];?>" style="width: 5em;" onchange="atualizaQuantidade(<?=$id;?>,this.value, <?=$item['valorFinal'];?>)">
							<span class="precoCarrinho" id="preco<?=$id;?>"><?=formataPreco($item['valorFinal']);?></span>
							<span class="excluirCarrinho"><a href="excluiCarrinho.php?id=<?=$id;?>" title="excluir item">X</a></span>
							</div>						
						<?php
						$total += ($item['quantidade'] * $item['valorFinal']);
					}
					?>
					<div class="itemCarrinho total">
						<span>Total:</span>
						<span class="precoCarrinho"><strong id="precoTotal"><?=formataPreco($total);?></strong></span>
					</div>
					<div class="botoes">
						<a href="index.php"><button>Continuar comprando</button></a>
						<a href="fecharPedido.php"><button>Finalizar pedido</button></a>
					</div>
					<?php
			}
			?>
										
		</section>
	
	<?php
	include "includes/mais_pedidos.php";
	?>	
	<!-- fim area central -->
<?php
include "includes/rodape.php";
?>	
