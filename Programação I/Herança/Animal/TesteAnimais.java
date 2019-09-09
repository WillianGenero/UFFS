import java.util.*;
class TesteAnimais{
	void run(){
		Scanner entrada = new Scanner(System.in);
		int operacao = 0;
		System.out.printf("\33[2J");
		Animal novo = new Animal("Camelo", 150, 4, "Amarelo", "Terra", 2.0);
		Peixe peixe = new Peixe("Tubarão", "Barbatanas e cauda", 300, 1.5);
		Mamifero mamifero = new Mamifero("Urso-do-Canadá", "Vermelho", "Mel", 180, 0.5, 4);
		novo.dados();
		peixe.dados();
		mamifero.dados();
	}
}