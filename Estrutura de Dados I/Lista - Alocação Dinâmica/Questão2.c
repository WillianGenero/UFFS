#include <stdio.h>
#include <stdlib.h>
#include <string.h>
typedef struct{
char nome[50];
char endereco[100];
int matricula;
} estudante;
int main(void){
	int num, i; 
	printf("Digite o número de posições: ");
	scanf("%d", &num);
	estudante * p = (int *)calloc(num, sizeof(estudante));
	if(!p)
		printf("Memória Insuficiente.\n");
	for(i=0;i<num;i++){
		__fpurge(stdin);
		printf("Digite o %dº nome: ",i+1);
		fgets((p+i)->nome,50,stdin);
		printf("Digite o %dº endereço: ",i+1);
		fgets((p+i)->endereco,50,stdin);
		printf("Digite a %dº matricula: ",i+1);
		scanf("%d", &(p+i)->matricula);
		__fpurge(stdin);
	}
	for(i=0;i<num;i++){
		printf("\nPosição:  %p\n", (p+i));
		printf("Nome: %s", (p+i)->nome);
		printf("Endereço: %s", (p+i)->endereco);
		printf("Matricula: %d\n", (p+i)->matricula);
	}
	free(p);	
	return 0;
}
