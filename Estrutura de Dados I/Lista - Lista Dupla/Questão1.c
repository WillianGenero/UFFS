#include <stdio.h>
#include <stdlib.h>
#include <stdio_ext.h>

typedef struct produto{
	int codigo;
	char nome[20];
	float preco;
} tpProduto;

typedef struct nodo{
	tpProduto produto;
	struct nodo *prox;
	struct nodo *ant;
} tpNodo;

typedef struct lista{
	int nItens;
	tpNodo *prim;
	tpNodo *ult;
} tpLista;

tpLista *NovaLista(){
	tpLista *Lista = malloc(sizeof(tpLista));
	Lista->prim = NULL;
	Lista->ult = NULL;
	Lista->nItens = 0;
	return Lista;
}
tpLista *push_ini(tpLista *list){
	tpNodo *NovoNodo = malloc(sizeof(tpNodo));
	if(list->nItens==0){
		list->nItens++;
		printf("Digite o código: ");
		scanf("%d", &NovoNodo->produto.codigo);
		printf("Digite o nome: ");
		__fpurge(stdin);
		fgets(NovoNodo->produto.nome, 20, stdin);
		printf("Digite o preço: ");
		scanf("%f", &NovoNodo->produto.preco);
		NovoNodo->prox = NULL;
		NovoNodo->ant = NULL;		
		list->prim = NovoNodo;
		list->ult = NovoNodo;
		system("clear");
	}
	else{
		list->nItens++;
		printf("Digite o código: ");
		scanf("%d", &NovoNodo->produto.codigo);
		printf("Digite o nome: ");
		__fpurge(stdin);
		fgets(NovoNodo->produto.nome,20,stdin);
		printf("Digite o preço: ");
		scanf("%f", &NovoNodo->produto.preco);
		(list->prim)->ant = NovoNodo;
		NovoNodo->prox = list->prim;
		NovoNodo->ant = NULL;
		list->prim = NovoNodo;
	}
	return list;

}

tpLista *push_fim(tpLista *list){
	tpNodo *NovoNodo = malloc(sizeof(tpNodo));
	if(list->nItens==0){
		list->nItens++;
		printf("Digite o código: ");
		scanf("%d", &NovoNodo->produto.codigo);
		printf("Digite o nome: ");
		__fpurge(stdin);
		fgets(NovoNodo->produto.nome,20,stdin);
		printf("Digite o preço: ");
		scanf("%f",&NovoNodo->produto.preco);
		NovoNodo->prox=NULL;
		NovoNodo->ant=NULL;
		list->prim=NovoNodo;
		list->ult=NovoNodo;
	}
	else{
		list->nItens++;
		printf("Digite o código: ");
		scanf("%d", &NovoNodo->produto.codigo);
		printf("Digite o nome: ");
		__fpurge(stdin);
		fgets(NovoNodo->produto.nome,20,stdin);
		printf("Digite o preço: ");
		scanf("%f",&NovoNodo->produto.preco);
		list->ult->prox=NovoNodo;
		NovoNodo->prox=NULL;
		NovoNodo->ant=list->ult;
		list->ult=NovoNodo;
		}
	return list;
}

int pop(tpLista *list, int codigo){
	tpNodo *Nodo = list->prim;//Começa verificar pelo inicio.
	tpNodo *Nodo2 = list->ult;
	//remover 0 elemento
	if(list->nItens==0){
		printf("Lista Vazia!\n\n");
		return 1;
	}
	//remover 1 elemento
	if(list->nItens==1){
		list->prim=NULL;
		list->ult=NULL;
		list->nItens--;
		return 1;
	}
	//remover com mais elementos
	//se o primeiro é pra ser removido
	else if(Nodo->produto.codigo==codigo && Nodo->ant==NULL){
		list->prim = Nodo->prox;
		Nodo->prox->ant=NULL;
		//free(Nodo2);
		list->nItens--;
		free(Nodo);
		return 1;
	}
	//balaca pra remover o ultimo
	else if(Nodo2->produto.codigo==codigo && Nodo2->prox == NULL){
		list->ult=Nodo2->ant;
		Nodo2->ant->prox=NULL;
		list->nItens--;
		free(Nodo2);
		return 1;
	}
	//remover elementos do meio
	else{
		for( ; Nodo->prox!=NULL ; Nodo=Nodo->prox){
			if(Nodo->produto.codigo==codigo){
				Nodo->prox->ant = Nodo->ant;
				Nodo->ant->prox = Nodo->prox;
				free(Nodo);
				list->nItens--;
				return 1;
			}
		}
	}
}

void display1(tpLista *list){
	tpNodo *ver;
	if(list->nItens==0)
		printf("Lista Vazia!\n\n");
	else{
		for(ver=list->prim ; ver!=NULL ; ver=ver->prox){
			printf("Código: %d\n", ver->produto.codigo);
			printf("Nome: %s", ver->produto.nome);
			printf("Preço: %.2f\n\n", ver->produto.preco);
		}
	}
}

void display2(tpLista *list){
	tpNodo *ver;
	if(list->nItens==0)
		printf("Lista Vazia!\n\n");
	else{
		for(ver=list->ult ; ver!=NULL ; ver=ver->ant){
			printf("Código: %d\n", ver->produto.codigo);
			printf("Nome: %s", ver->produto.nome);
			printf("Preço: %.2f\n\n", ver->produto.preco);
		}
	}
}
void remover(tpLista* list){
	int codigo;
	printf("Digite o código do produto: ");
	scanf("%d", &codigo);
	pop(list, codigo);
}

int main(){
	int op;
	tpLista *list = NovaLista();
	do{
		printf("\tMENU\n");
		printf("0: Sair\n");
		printf("1: Inserir produto no início\n");
		printf("2: Inserir produto no fim\n");
		printf("3: Retirar produto\n");
		printf("4: Listar produtos ->\n");
		printf("5: Listar produtos <-\n");
		scanf("%d", &op);
		system("clear");
		switch(op){
			case 1:
				system("clear");
				list = push_ini(list);
				break;
			case 2:
				system("clear");
				list = push_fim(list);
				break;
			case 3:
				system("clear");
				remover(list);
				break;
			case 4:
				system("clear");
				display1(list);
				break;
			case 5:
				system("clear");
				display2(list);
				break;
		}
		
	}while(op!=0);
	return 0;
}
