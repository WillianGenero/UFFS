#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdio_ext.h>
#define TAM 50

typedef struct _produto{
	int cod;
	char nome[TAM];
	float preco;
}tp_produto;

typedef struct _pilha{
	tp_produto *info;
	int topo;
}tp_pilha;

void push(tp_pilha *pilha, int num){
	if(pilha->topo==num-1)
		printf("Pilha Cheia!\n\n");
	else{
		(pilha->topo)++;
		__fpurge(stdin);
		printf("Digite o código do produto: ");
		scanf("%d", &((pilha->info+pilha->topo)->cod));
		__fpurge(stdin);
		printf("Digite o nome do produto: ");
		fgets(((pilha->info+pilha->topo)->nome),TAM,stdin);
		__fpurge(stdin);
		printf("Digite o preço do produto: ");
		scanf("%f", &((pilha->info+pilha->topo)->preco));
		printf("\n");
		system("clear");
	}
}
void pop(tp_pilha *pilha){
	if(pilha->topo==-1)
		printf("Pilha Vazia!\n\n");
	else{
		pilha->topo--;
		printf("Item Retirado!\n\n");
	}
}
void display(tp_pilha *pilha){
	int i;
	if(pilha->topo==-1)
		printf("Pilha Vazia!\n\n");
	else{
		for(i=pilha->topo;i>=0;i--){
			printf("\tProduto\n");
			printf("Código: %d\n", (pilha->info+i)->cod);
			printf("Nome: %s", (pilha->info+i)->nome);
			printf("Preço: %.2f\n\n", (pilha->info+i)->preco);
		}
	}
}
int main(){
	int op, quant;
	tp_pilha *p = (tp_pilha *) malloc (sizeof(tp_pilha));
	p->topo = -1;
	printf("Digite a quantidade de estruturas: ");
	scanf("%d", &quant);
	system("clear");
	p->info = (tp_produto *) malloc (quant * sizeof(tp_produto));
	do{	
		printf("\tMENU\n");
		printf("0: Sair\n");
		printf("1: Inserir Produto\n");
		printf("2: Retirar Produto \n");
		printf("3: Listar Produtos\n");
		scanf("%d", &op);
		switch(op){
			case 1:
				system("clear");
				push(p, quant);
				break;
			case 2:
				system("clear");
				pop(p);
				break;
			case 3:
				system("clear");
				display(p);
				break;
		}
	}while(op!=0);
	return 0;
}
