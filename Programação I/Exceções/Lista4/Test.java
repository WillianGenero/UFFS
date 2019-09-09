import java.util.*;
public class Test{

	public void run(){
		Scanner entrada = new Scanner(System.in);
		List<String> valores = new ArrayList<String>();
		System.out.printf("\33[2J");
		try{
			System.out.printf("Digite o tamanho da sua lista: ");
			int tamanho = entrada.nextInt();
			System.out.printf("\33[2J");
			System.out.println("Preencha sua lista: ");
			for(int i=0 ; i<tamanho ; i++){
				String conteudo = entrada.next();
				valores.add(conteudo);
			}
			System.out.printf("\33[2J");
			System.out.println("Digite a posição que deseja imprimir: ");
			int posicao = entrada.nextInt();
			if(posicao > tamanho)
				throw new ArrayIndexOutOfBoundsException();
			System.out.println("Conteúdo: "+valores.get(posicao));
		}catch(ArrayIndexOutOfBoundsException e){
			System.out.printf("\33[2J");
			System.out.println("Erro Fatal! Posição desejada é maior do que a lista!");
		}catch(Exception e){
			System.out.println("Erro Fatal! Aconteceu um erro!");
		}
	}
}	