import java.util.*;
public class Test{

	public void run(){
		Mate contas = new Mate();
		Scanner entrada = new Scanner(System.in);
		double resultado;
		System.out.printf("\33[2J");
		System.out.printf("Digite um valor: ");
		double a = entrada.nextDouble();
		System.out.printf("\33[2J");
		System.out.printf("Digite um valor: ");
		double b = entrada.nextDouble();
		System.out.printf("\33[2J");
		System.out.println("1- Somar");
		System.out.println("2- Subtrair");
		System.out.println("3- Dividir");
		System.out.println("4- Multiplicar");
		int op = entrada.nextInt();
		try{
			switch(op){
				case 1:
					resultado = contas.somar(a, b);
					break;
				case 2:
					resultado = contas.subtrair(a, b);
					break;
				case 3:
					resultado = contas.dividir(a, b);
					break;
				case 4:
					resultado = contas.multiplicar(a, b);
					break;
			}
			System.out.println("Resultado = "+ resultado);
		}catch(ParamZeroException e){
			System.out.println("Erro Fatal! Um parâmetro é zero!");
			return;
		}catch(ResultadoZeroException e){
			System.out.println("Erro Fatal! O resultado é zero!");
			return;
		}catch(Exception e){
			System.out.println("Deu algum erro!");
		}

	}
}	