class Medicamento{
	String nome;
	double precoVenda, valorCompra;
	boolean receitaObrigatoria;
	int qtdEstoque;
	Laboratorio lab;
	Data dat = new Data();

	void vender(boolean receitaObrigatoria, int qntCompra){
		if(qntCompra <= qtdEstoque){
			qtdEstoque -= qntCompra;
			valorCompra = precoVenda*qntCompra;
			System.out.println("Compra realizada com sucesso!");
			System.out.printf("Valor da compra: %.2f\n", valorCompra);
		}
		else
			System.out.println("Quantidade em estoque insuficiente!");
	}

	void reajustarPrecoVenda(double percentual){
		this.precoVenda += this.precoVenda * percentual;
		System.out.printf("Novo Valor: R$ %.2f", this.precoVenda);
	}

	void mostrar(){
		System.out.println("\tInformações do Medicamento");
		System.out.println("Nome do medicamento: " + nome);
		System.out.println("Valor R$: " + precoVenda);
		System.out.println("Quantidade em estoque: " + qtdEstoque);
		System.out.println("Data de validade: " + dat.mostra());
		System.out.println("Laboratorio: " + lab.nomeFantasia);
	}
}