import java.util.Scanner;
class Programa{
	public static void main(String[] args){
		Scanner entrada = new Scanner(System.in);
		Medicamento remedio = new Medicamento();
		Laboratorio lab = new Laboratorio("Camargo", "Camargo Company LTDA", "Chapecó", 12382138, 4651645, 998475512);
		remedio.lab = lab;
		int operacao=0, qtdCompra=0;
		double percentual=0;
		char verifica, verifica2;
		do{
			System.out.println("\n\n\tMENU");
			System.out.println("1: Cadastrar medicamento.");
			System.out.println("2: Vender produto.");
			System.out.println("3: Adicionar estoque.");
			System.out.println("4: Mostrar as informações do medicamento.");
			System.out.println("5: Mostrar as informações do laboratório.");
			System.out.println("6: Reajustar o preco de venda.");
			System.out.println("7: Sair.");
			operacao = entrada.nextInt();
			System.out.printf("\33[2J");
			switch(operacao){
				case 1:
					System.out.printf("Digite o nome do medicamento: ");
					remedio.nome = entrada.next();
					System.out.printf("Digite o valor do medicamento: ");
					remedio.precoVenda = entrada.nextDouble();
					System.out.printf("Digite a quantidade em estoque: ");
					remedio.qtdEstoque = entrada.nextInt();
					System.out.printf("A receita é obrigatória? (S/N): ");
					verifica = entrada.next().charAt(0);
					if(verifica=='S')
						remedio.receitaObrigatoria=true;
					else
						remedio.receitaObrigatoria=false;
					System.out.printf("Dia da data de validade: ");
					remedio.dat.dia = entrada.nextInt();
					System.out.printf("Mês da data de validade: ");
					remedio.dat.mes = entrada.nextInt();
					System.out.printf("Ano da data de validade: ");
					remedio.dat.ano = entrada.nextInt();
					break;
				case 2:
					if(remedio.receitaObrigatoria==true){
						System.out.println("Você possui a receita? (S/N): ");
						verifica2 = entrada.next().charAt(0);
						if(verifica2=='S'){
							System.out.printf("Digite a quantidade desejada: ");
							qtdCompra = entrada.nextInt();
							remedio.vender(remedio.receitaObrigatoria, qtdCompra);
						}
						else
							System.out.println("Você não possui receita médica!");
					}
					else{
						System.out.printf("Digite a quantidade desejada: ");
						qtdCompra = entrada.nextInt();
						remedio.vender(remedio.receitaObrigatoria, qtdCompra);
					}
					break;
				case 3:
					System.out.printf("Digite a quantidade a ser adicionada: ");
					remedio.qtdEstoque += entrada.nextInt();
					break;
				case 4:
					remedio.mostrar();
					break;
				case 5:
					lab.mostrarLab();
					break;
				case 6:
					System.out.println("Percentual a ser reajustado: ");
					percentual = entrada.nextDouble();
					percentual = (percentual/100);
					remedio.reajustarPrecoVenda(percentual);
					break;
			}
		}while(operacao!=7);
	}
}