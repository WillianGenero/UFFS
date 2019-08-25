#include <stdio.h>
int	idade, tempo, op, boni, temp;
double salario, aumento, sal, aum;
char nome[5000];
void verificaContrato(){
	if(idade<18)
		printf("Precisa ser jovem aprendiz\n");
	else
		printf("Pode ser funcionario efetivo\n");
}
void aumentaSalario(){
    salario=(salario+(salario*(aumento/100)));
    printf("Novo salario: %.2lf\n", salario);
}
void exibeDados(){
    printf("\t\tDADOS\n");
    printf("Nome: %s", nome);
    printf("\nIdade: %d anos", idade);
    printf("\nTempo de trabalho: %d", tempo);
    printf("\nSalario antigo: %.2lf", sal+boni);
    printf("\nSalario novo: %.2lf", salario);
    printf("\nPorcentagem do aumento: %.1lf\n", aumento);
}
void bonificaSalario(){
    for(boni=0;tempo>=5;boni+=100,tempo-=5);
    printf("Valor da bonificacao: %d\n", boni);
    }
int main(){
	printf("Digite o nome do funcionario: ");
	gets(nome);
	printf("\nDigite a idade: ");
	scanf("%d", &idade);
	printf("\nDigite o tempo de contrato em ano(s): ");
	scanf("%d", &tempo);
	printf("\nDigite o salario: ");
	scanf("%lf", &salario);
	sal=salario;
	aum=aumento;
	temp=tempo;

	system("clear");
    do{
        printf("\n\t\tMENU\n");
        printf("Digite 1 caso queira verificar o contrato\n");
        printf("Digite 2 caso queira ver o valor do novo salario\n");
        printf("Digite 3 caso queira ver a ficha de dados\n");
        printf("Digite 4 caso queira ver o valor da bonificacao\n");
        printf("Digite 5 caso queira sair\n");
        scanf("%d", &op);
	switch (op){
		case 1:
            verificaContrato(idade);
            break;
        case 2:
		printf("\nDigite a porcentagem do aumento: ");
		scanf("%lf", &aumento);
            aumentaSalario(salario);
            break;
        case 3:
            exibeDados();
            break;
        case 4:
            bonificaSalario();
            break;
		default:
			printf("Operação Invalida");
			break;
	}
	
    }while(op!=5);
	return 0;
}
