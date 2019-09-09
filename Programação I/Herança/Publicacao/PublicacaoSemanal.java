public class PublicacaoSemanal extends Publicacao{
	private double taxaEntrega;
	
	public PublicacaoSemanal(String nome, double preco, String editora, String cnpj){
		super(nome, preco, editora, cnpj);
	}
	@Override
	public void calcularAnuidade(){
		super.setValorAnuidade(getPrecoExemplar()* 52);
	}
	
	public void calcularTaxaEntrega(){
		this.taxaEntrega = getValorAnuidade() * 0.05;
	}
	@Override
	public void imprimirDados(){
		super.imprimirDados();
		System.out.printf("Taxa de entrega (R$): %.2f\n", this.taxaEntrega);
	}
}