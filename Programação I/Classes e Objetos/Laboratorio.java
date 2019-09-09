class Laboratorio{
	String nomeFantasia, razaoSocial, endereco;
	int CNPJ, inscricaoEstadual, telefone;

	public Laboratorio(String nomeFantasia, String razaoSocial, String endereco, int CNPJ, int inscricaoEstadual, int telefone){
		this.nomeFantasia = nomeFantasia;
		this.razaoSocial = razaoSocial;
		this.endereco = endereco;
		this.CNPJ = CNPJ;
		this.inscricaoEstadual = inscricaoEstadual;
		this.telefone = telefone;
	}

	void mostrarLab(){
		System.out.println("\n\tInformações do Laboratório");
		System.out.println("Laboratório: " + this.nomeFantasia);
		System.out.println("Razão social: " + this.razaoSocial);
		System.out.println("Endereço: " + this.endereco);
		System.out.println("CNPJ: " + this.CNPJ);
		System.out.println("Inscrição estadual: " + this.inscricaoEstadual);
		System.out.println("Telefone: " + this.telefone);
	}
}