public class Peixe extends Animal{
	private String caracteristica;
	Peixe(String nome, String caracteristica, int comprimento, double velocidade){
		super(nome, comprimento, 0, "Cinzento", "Mar", velocidade);
		this.caracteristica = caracteristica;
	}
	void setCaracteristica(String caracteristica){
		this.caracteristica = caracteristica;
	}
	String getCaracteristica(){
		return this.caracteristica;
	}
	@Override
	void dados( ){
	System.out.println("-------------\nAnimal: "+getNome()+"\nComprimento: "+getComprimento()+" cm"+"\nPatas: "+this.getPatas()+"\nCor: "+this.getCor()+"\nAmbiente: "+this.getAmbiente()+"\nVelocidade: "+this.getVelocidade()+" m/s"+"\nCaracterísticas: "+this.caracteristica);
	}
}