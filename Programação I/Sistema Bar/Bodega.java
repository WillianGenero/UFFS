import java.util.*;
class Bodega{
	void run(){
		Scanner entrada = new Scanner(System.in);
		int operacao=0,confirma=0, geraID=3, numBebida=0, numClientes=0, aumento=0, indice, qntVenda=0;
		Empresa emp = new Empresa("Bodega do Tião", "89765359000163");
		emp.registra("Jorge", "07945120940", "Gerente", 0, 984057413, 19, 1292);
		emp.registra("Denilson", "01235171892", "Segurança", 1, 999103547, 27, 2087);
		emp.registra("Rebeca", "02891026550", "Bar-man", 2, 999358742, 21, 1705);
		System.out.printf("\33[2J");
		do{
			System.out.println("\t" + emp.nome);
			System.out.printf("1: Listar bebidas.\n");
			System.out.printf("2: Vender bebida.\n");
			System.out.printf("3: Cadastrar bebida.\n");
			System.out.printf("4: Cadastrar funcionário.\n");
			System.out.printf("5: Cadastrar cliente.\n");
			System.out.printf("6: Listar dados dos funcionários.\n");
			System.out.println("7: Listar clientes.");
			System.out.printf("8: Comprar bebida.\n");
			System.out.printf("9: Sair!\n");
			operacao = entrada.nextInt();	
			switch(operacao){
			case 1:
				System.out.printf("\33[2J");
				System.out.println("\t>>MENU DE BEBIDAS<<");
				emp.consultarMenu();
				break;
			case 2:
				System.out.printf("\33[2J");
				System.out.printf("Quantidade da venda: ");
				qntVenda = entrada.nextInt();
				System.out.printf("Índice da bebida: ");
				indice = entrada.nextInt();
				emp.venderBebida(qntVenda, indice);
				break;
			case 3:
				System.out.printf("\33[2J");
				System.out.printf("\t>>REGISTRO DE BEBIDAS<<\n");
				int numero = numBebida;
				System.out.printf("Nome: ");
				String nome = entrada.next();
				System.out.printf("Volume (ml): ");
				int volume = entrada.nextInt();
				System.out.printf("Quantidade em Estoque: ");
				int qntEst = entrada.nextInt();
				System.out.printf("Teor alcoólico: ");
				double teor = entrada.nextDouble();
				System.out.printf("Preço: ");
				double preco = entrada.nextDouble();
				Bebida beb = new Bebida(nome, volume, qntEst, numero, teor, preco);
				emp.cadastraBebida(beb);
				numBebida++;
				System.out.printf("\33[2J");
				break;
			case 4:
				System.out.printf("\33[2J");
				System.out.println("\t>>REGISTRO DE FUNCIONÁRIO<<");
				System.out.printf("Nome: ");
				String nome2 = entrada.next();
				System.out.printf("CPF: ");
				String aCPF = entrada.next();
				System.out.printf("Função: ");
				String funcao = entrada.next();
				System.out.printf("Telefone: ");
				int telefone = entrada.nextInt();
				System.out.printf("Idade: ");
				int idade = entrada.nextInt();
				System.out.printf("Salário: ");
				double salario = entrada.nextDouble();
				int ID = geraID;
				Funcionario func = new Funcionario(nome2, aCPF, funcao, ID, telefone, idade, salario);
				emp.cadastraFuncionario(func);
				geraID++;
				System.out.printf("\33[2J");
				break;
			case 5:
				boolean venderFiado;
				System.out.printf("\33[2J");
				System.out.printf("\t>>REGISTRO DE CLIENTES<<\n");
				int ID2 = numClientes;
				System.out.printf("Nome: ");
				String nome3 = entrada.next();
				System.out.printf("CPF: ");
				String bCPF = entrada.next();
				System.out.printf("Compra fiado? (1/0): ");
				int fiado = entrada.nextInt();
				if(fiado == 1)
					venderFiado = true;
				else
					venderFiado = false;
				Cliente brow = new Cliente(nome3, bCPF, ID2, venderFiado);
				emp.cadastrarCliente(brow);
				numClientes++;
				System.out.printf("\33[2J");
				break;
			case 6:
				System.out.printf("\33[2J");
				System.out.println("\t>>DADOS DOS FUNCIONÁRIOS<<");
				emp.consultarFuncionario();
				break;
			case 7:
				System.out.printf("\33[2J");
				System.out.println("\t>>LISTA DE CLIENTES<<");
				emp.consultarClientes();
				break;
			case 8:
				System.out.printf("\33[2J");
				System.out.printf("Quantidade a ser adicionada no estoque: ");
				aumento = entrada.nextInt();
				System.out.printf("Índice da bebida: ");
				indice = entrada.nextInt();
				emp.aumentarEstoque(aumento, indice);
				break;
			}
		}while(operacao!=9);
	}
}