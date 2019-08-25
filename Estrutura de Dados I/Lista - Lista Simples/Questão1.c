#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdio_ext.h>
#define TAM 100

typedef struct produto{
int codigo;
char nome[TAM];
float preco;
}tp_produto;

typedef struct nodo{
tp_produto produto;
struct nodo *prox;
}tp_nodo;

tp_nodo *push(tp_nodo *p){
	tp_nodo *b = (tp_nodo *) malloc (sizeof(tp_nodo));
	printf("Digite o código: ");
	scanf("%d", &(b->produto.codigo));
	getchar();
	printf("Digite o nome: ");
	fgets(b->produto.nome,TAM,stdin);
	printf("Digite o preço: ");
	scanf("%f", &(b->produto.preco));
	printf("\n");
	b->prox = p;
	return b;
	free(b);
}
//inicio = p
//atual = a
//remover = b
tp_nodo* pop(tp_nodo *p, int codigo){
	tp_nodo *a = p;
	
	if(a == NULL || a->prox == NULL){
		a=p;
		free(a);
		return NULL;
	}	

	if(a->produto.codigo == codigo){
		p = a->prox;
		free(a);
		return p;
	}
	
	while(a->prox != NULL){
		if(a->prox->produto.codigo == codigo){
			tp_nodo *b = a->prox;
			a->prox = a->prox->prox;
			free(b);
		}
		if(a->prox == NULL){
			a=p;
			return a;
		}
		a = a->prox;
	}
	return p;
	free(a);
}

void display(tp_nodo *p){
	tp_nodo *u;
	for(u = p;u!=NULL;u=u->prox){
		printf("Codigo: %d\n", u->produto.codigo);
		printf("Nome: %s", u->produto.nome);
		printf("Preço: %.2f\n\n", u->produto.preco);
	}
	printf("\n");
}

int main(){
	int op;
	int codigo;
	tp_nodo *p = NULL;
	do{
		printf("\tMENU\n");
		printf("0: Sair\n");
		printf("1: Inserir produto\n");
		printf("2: Retirar produto\n");
		printf("3: Listar produtos\n");
		scanf("%d", &op);
		system("clear");
		switch(op){
			case 1:
				system("clear");
				p = push(p);
				break;
			case 2:
				system("clear");
				printf("Digite o código do produto que deseja remover: ");
				scanf("%d", &codigo);
				p=pop(p, codigo);
				break;
			case 3:
				system("clear");
				display(p);
				break;
		}
	}while(op!=0);
	free(p);
	return 0;
}
