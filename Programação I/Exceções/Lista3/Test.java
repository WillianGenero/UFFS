import java.util.*;
public class Test{

	public void run(){
		Scanner entrada = new Scanner(System.in);
		int vetor[];
		System.out.printf("\33[2J");
		try{
			System.out.printf("Digite o tamanho do vetor: ");
			int tamanho = entrada.nextInt();
			if(tamanho < 0)
				throw new NegativeArraySizeException();
			vetor = new int[tamanho];
			System.out.printf("Digite %d valores: ", tamanho);
			for(int i=0 ; i<tamanho ; i++)
				vetor[i] = entrada.nextInt();
		}catch(NegativeArraySizeException e){
			System.out.printf("\33[2J");
			System.out.println("Erro Fatal! Tamanho do vetor negativo!");
			System.out.println("Criamos um vetor para ti.");
			vetor = new int[1];
			vetor[0] = 5;
			for(int j=0 ; j<1 ; j++)
				System.out.println("Conteúdo: " + vetor[j]);
		}catch(Exception e){
			System.out.println("Erro Fatal! Aconteceu um erro!");
		}
	}
}	