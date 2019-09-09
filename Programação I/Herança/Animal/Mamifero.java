public class Mamifero extends Animal{
	private String alimento;
	Mamifero(String nome, String cor, String alimento,int comprimento, double velocidade, int patas){
		super(nome, comprimento, patas, cor, "Terra", velocidade);
		this.alimento = alimento;
	}
	void setAlimento(String alimento){
		this.alimento = alimento;
	}
	String getAlimento(){
		return this.alimento;
	}
	@Override
	void dados(){
		System.out.println("-------------\nAnimal: "+getNome()+"\nComprimento: "+getComprimento()+" cm"+"\nPatas: "+this.getPatas()+"\nCor: "+this.getCor()+"\nAmbiente: "+this.getAmbiente()+"\nVelocidade: "+this.getVelocidade()+" m/s"+"\nAlimento: "+this.alimento+"\n-------------------");
	}
}