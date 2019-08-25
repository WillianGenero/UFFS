#include <stdio.h>

void verificaContrato(idade){
	if(idade<18)
		printf("Precisa ser jovem aprendiz\n");
	else
		printf("Pode ser funcionario efetivo\n");
	}
void aumentaSalario(salario, aumento){
	
}

int main(){
	int	idade, tempo, op;
	double salario, aumento;
	char nome[20];
	printf("Digite seu nome: \n");
	scanf("%s", nome);
	printf("Digite sua idade: \n");
	scanf("%d", &idade);
	printf("Digite seu tempo de contrato em ano(s): \n");
	scanf("%d", &tempo);
	printf("Digite o seu salario: \n");
	scanf("%lf", &salario);
	printf("Digite o valor do aumento: \n");
	scanf("%lf", &aumento);
	
	system("clear");
	
		printf("\t\tMENU\n");
		printf("Digite 1 caso queira verificar o contrato\n");
		
		scanf("%d", &op);
	switch (op){
		case 1: 
				verificaContrato(idade);
				break;
		
	}	
		
	return 0;
}
