import java.util.*;
public class Test{

	public static int somarVetor(int vetor[], int a, int b) throws Exception{
		int soma1 = 0,  soma2 = 0;
		if(a<0 || b>10)
			throw new IntervaloException();
		else{
			for(int j=0 ; j<10 ; j++)
				soma1 += vetor[j];
			if(soma1 == 0)
				throw new VetorVazioException();
			else{
				for(int k=a ; k<b ; k++)
					soma2 += vetor[k];
				return soma2;
			}
		}
	}

	public void run(){
		Scanner entrada = new Scanner(System.in);
		int vetor[] = new int[10];
		System.out.printf("\33[2J");
		System.out.println("Digite 10 valores: ");
		for(int i=0 ; i<10 ; i++)
			vetor[i] = entrada.nextInt();
		try{
			System.out.printf("1 Limite: ");
			int lim1 = entrada.nextInt();
			System.out.printf("2 Limite: ");
			int lim2 = entrada.nextInt();
			int resultado = this.somarVetor(vetor, lim1, lim2);
			System.out.println("Resultado = "+ resultado);
		}catch(VetorVazioException e){
			System.out.println("Erro Fatal! Vetor vazio!");
		}catch(IntervaloException e){
			System.out.println("Erro Fatal! Intervalo inválido!");
		}catch(Exception e){
			System.out.println("Erro Fatal! Aconteceu um erro!");
		}
	}
}	