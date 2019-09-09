import java.util.*;
public class Revista{
	void run(){
		Scanner entrada = new Scanner(System.in);
		System.out.printf("\33[2J");
		System.out.printf("Digite o nome: ");
		String nome = entrada.nextLine();
		System.out.printf("Digite o valor do exemplar: ");
		double preco = entrada.nextDouble();
		PublicacaoSemanal publicado = new PublicacaoSemanal(nome, preco, "Abril", "89488693000117");
		System.out.printf("\33[2J");
		publicado.calcularAnuidade();
		publicado.calcularTaxaEntrega();
		publicado.imprimirDados();
	}
}