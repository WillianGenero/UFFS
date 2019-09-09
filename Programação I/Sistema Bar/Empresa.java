import java.util.*;
class Empresa{
	String nome, CNPJ;
	List<Funcionario> bodegueiros = new ArrayList<Funcionario>();
	List<Bebida> menuBebidas = new ArrayList<Bebida>();
	List<Cliente> clientela = new ArrayList<Cliente>();
	
	public Empresa(String nome, String CNPJ){
		this.nome = nome;
		this.CNPJ = CNPJ;
	}

	void registra(String nome, String CPF, String funcao, int ID, int telefone, int idade, double salario){
		Funcionario trabalhador = new Funcionario();
		trabalhador.nome = nome;
		trabalhador.CPF = CPF;
		trabalhador.funcao = funcao;
		trabalhador.ID = ID;
		trabalhador.telefone = telefone;
		trabalhador.idade = idade;
		trabalhador.salario = salario;
		bodegueiros.add(trabalhador);
	}

	void cadastraFuncionario(Funcionario funci){
		bodegueiros.add(funci);
	}

	void consultarFuncionario(){
		Iterator<Funcionario> i = bodegueiros.iterator();
		while(i.hasNext()){
			Funcionario printar = i.next();
			System.out.println("Nome: " + printar.nome);
			System.out.println("CPF: " + printar.CPF);
			System.out.println("Função: " + printar.funcao);
			System.out.println("ID: " + printar.ID);
			System.out.println("Telefone: " + printar.telefone);
			System.out.println("Idade: " + printar.idade);
			System.out.printf("Salário: %.2f\n\n", printar.salario);		
		}
	}

	void cadastraBebida(Bebida nova){
		menuBebidas.add(nova);
	}

	void consultarMenu(){
		Iterator<Bebida> i = menuBebidas.iterator();
		while(i.hasNext()){
			Bebida printar = i.next();
			System.out.println("Número: " + printar.numero);
			System.out.println("Nome: " + printar.nome);
			System.out.println("Volume: " + printar.volume + "ml");
			System.out.println("Teor Alcoólico: " + printar.teor + "%");
			System.out.println("Quantidade em estoque: " + printar.qntEst);
			System.out.printf("Preço: %.2f\n\n", printar.preco);		
		}
	}

	void aumentarEstoque(int aumento, int indice){
		int achar = 0;
		Iterator<Bebida> i = menuBebidas.iterator();
		while(i.hasNext()){
			Bebida buscar = i.next();
			if(buscar.numero == indice){
				buscar.qntEst += aumento;
				System.out.println("Aumento de estoque realizado!\n\n");
				achar = 1;
			}
		}
		if(achar==0){
			System.out.printf("\33[2J");
			System.out.println("Bebida não encontrada!\nTente novamente!\n");
		}
	
	}

	void venderBebida(int qntVenda, int indice){
		int achar=0;
		Iterator<Bebida> i = menuBebidas.iterator();
		while(i.hasNext()){
			Bebida venda = i.next();
			if(venda.numero == indice){
				achar = 1;
				if(venda.qntEst<qntVenda)
					System.out.println("Quantidade em estoque insuficiente!\nVenda não realizada!");
				else{
					venda.qntEst-=qntVenda;
					double valorVenda = qntVenda * venda.preco;
					System.out.printf("Venda realizada!\nTotal da venda: %.2f\n\n", valorVenda);
				}
			}
		}
		if(achar == 0){
			System.out.printf("\33[2J");
			System.out.println("Bebida não encontrada!\nTente novamente!\n");	
		}
		
	}

	void cadastrarCliente(Cliente brother){
		clientela.add(brother);
	}

	void consultarClientes(){
		Iterator<Cliente> i = clientela.iterator();
		while(i.hasNext()){
			Cliente brother = i.next();
			System.out.println("Nome: " + brother.nome);
			System.out.println("ID: " + brother.ID);
			System.out.println("CPF: " + brother.CPF);
		}
	}
}