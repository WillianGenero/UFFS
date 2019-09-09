public class Publicacao{
	private String nome;
	private double precoExemplar;
	protected double valorAnuidade;
	Editora editora = new Editora();

	public Publicacao(String nome, double preco, String editora, String cnpj){
		this.nome = nome;
		this.precoExemplar = preco;
		this.valorAnuidade = 0;
		this.editora.setNome(editora);
		this.editora.setCnpj(cnpj);
	}
	public void calcularAnuidade(){
		this.valorAnuidade = precoExemplar * 12;
	}
	public void setValorAnuidade(double valor){
		this.valorAnuidade = valor;
	}
	public double getValorAnuidade(){
		return this.valorAnuidade;
	}
	public double getPrecoExemplar(){
		return this.precoExemplar;
	}
	public String getNome(){
		return this.nome;
	}
	public void imprimirDados(){
		System.out.println("\tINFORMAÇÕES\n------------------------------\nEditora: "+editora.getNome()+"\nCNPJ: "+editora.getCnpj()+"\n------------------------------"+"\nNome: "+this.nome+ "\nPreço do exemplar (R$): "+this.precoExemplar+"\nValor da anuidade (R$): "+this.valorAnuidade);
	}
}