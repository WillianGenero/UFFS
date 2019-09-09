public class Animal{
	private String nome;
	private int comprimento;
	private String cor;
	private String ambiente;
	private double velocidade;
	private int patas;
	public Animal(String nome, int comprimento, int patas, String cor, String ambiente, double velocidade){
		this.nome = nome;
		this.comprimento = comprimento;
		this.patas = patas;
		this.cor = cor;
		this.ambiente = ambiente;
		this.velocidade = velocidade;
	}
	void setNome(String nome){
		this.nome = nome;
	}
	void setComprimento(int comprimento){
		this.comprimento = comprimento;
	}
	void setPatas(int patas){
		this.patas = patas;
	}
	void setCor(String cor){
		this.cor = cor;
	}
	void setAmbiente(String ambiente){
		this.ambiente = ambiente;
	}
	void setVelocidade(double velocidade){
		this.velocidade = velocidade;
	}
	String getNome(){
		return this.nome;
	}
	int getComprimento(){
		return this.comprimento;
	}
	int getPatas(){
		return this.patas;
	}
	String getAmbiente(){
		return this.ambiente;
	}
	String getCor(){
		return this.cor;
	}
	double getVelocidade(){
		return this.velocidade;
	}
	void dados(){
		System.out.println("Zoo:\n-------------\nAnimal: "+this.nome+"\nComprimento: "+this.comprimento+" cm"+"\nPatas: "+this.patas+"\nCor: "+this.cor+"\nAmbiente: "+this.ambiente+"\nVelocidade: "+this.velocidade+" m/s");
	}
}