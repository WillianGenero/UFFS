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
	struct nodo *next;
	struct nodo *prev;
} tpNodo;

typedef struct lista{
	int nItens;
	tpNodo *first;
	tpNodo *last;
} tpLista;

tpLista *NovaLista(){
	tpLista *Lista = malloc(sizeof(tpLista));
	Lista->first = NULL;
	Lista->last = NULL;
	Lista->nItens = 0;
	return Lista;
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
		printf("\n");
		NovoNodo->next=NULL;
		NovoNodo->prev=NULL;
		list->first=NovoNodo;
		list->last=NovoNodo;
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
		printf("\n");
		list->last->next=NovoNodo;
		NovoNodo->next=NULL;
		NovoNodo->prev=list->last;
		list->last=NovoNodo;
		}
	return list;
}

int pop(tpLista *list){
	int codigo;
	tpNodo *Nodo = list->first;//Começa verificar pelo inicio.
	tpNodo *Nodo2 = list->last;
	//remover 0 elemento
	if(list->nItens==0){
		printf("Lista Vazia!\n\n");
		return 1;
	}
	//remover 1 elemento
	if(list->nItens==1){
		list->first=NULL;
		list->last=NULL;
		list->nItens--;
		return 1;
	}
	//remover com mais elementos
	//se o primeiro é pra ser removido
	printf("Digite o código do produto: ");
	scanf("%d", &codigo);
	if(Nodo->produto.codigo==codigo && Nodo->prev==NULL){
		list->first = Nodo->next;
		Nodo->next->prev=NULL;
		//free(Nodo2);
		list->nItens--;
		free(Nodo);
		return 1;
	}
	//balaca pra remover o ultimo
	else if(Nodo2->produto.codigo==codigo && Nodo2->next == NULL){
		list->last=Nodo2->prev;
		Nodo2->prev->next=NULL;
		list->nItens--;
		free(Nodo2);
		return 1;
	}
	//remover elementos do meio
	else{
		for( ; Nodo->next!=NULL ; Nodo=Nodo->next){
			if(Nodo->produto.codigo==codigo){
				Nodo->next->prev = Nodo->prev;
				Nodo->prev->next = Nodo->next;
				free(Nodo);
				list->nItens--;
				return 1;
			}
		}
	}
	return 1;
}
tpLista *insertionSort(tpLista *list){
	tpNodo *fora, *dentro, *andar;
	if(list->nItens==0){
		printf("Lista vazia!\n\n");
		return list;
	}
	for(andar=list->first->next ; andar!=NULL ; andar=andar->next){
		for(dentro=andar->prev ; dentro!=NULL ; dentro=dentro->prev){
			if(fora->produto.codigo < dentro->next->produto.codigo){
				fora=andar;
				//Ultimo e primeiro
				if(fora==list->last && dentro==list->first){
					list->last = fora->prev;
					fora->prev->next = NULL;
					dentro->prev = fora;
					fora->next = dentro;
					fora->prev = NULL;
					list->first = fora;
				}
				//Meio p/ Primeiro
				else if(dentro==list->first){
					fora->next->prev = fora->prev;
					fora->prev->next = fora->next;
					fora->next = dentro;
					fora->prev = NULL;
					dentro->prev = fora;
					list->first = fora;
				}
				//Ultimo p/ Meio
				else if(fora==list->last){
					fora->prev->next = 	NULL;
					list->last = fora->prev;
					dentro->next->prev = fora;
					fora->next = dentro->next;
					fora->prev = dentro;
					dentro->next = fora;
				}
				//Meio p/ meio
				else{
					fora->prev->next = fora->next;
					fora->next->prev = fora->prev;
					dentro->next->prev = fora;
					fora->next = dentro->next;
					fora->prev = dentro;
					dentro->next = fora;
				}	
			}
		}	
	}
	return list;
}

void *selectionSort(tpLista *list){
	tpNodo *achar, *menor, *troca, *aux, *andar, *auxnext;
	if(list->nItens == 0)
		printf("Lista Vazia!\n\n");
	for(andar=list->first ; andar!=NULL ; andar=andar->next){
		menor=andar;
		//Procurar o menor..
		for(achar=andar ; achar!=NULL ; achar=achar->next){
			if(achar->produto.codigo < menor->produto.codigo)
				menor = achar;
		}
		if(andar != menor){
			//Se forem os últimos..
			if(menor==list->last && andar==list->first){
				troca = andar;
				list->first = menor;
				list->last = troca;
				menor->prev->next = troca;
				troca->next->prev = menor;
				menor->next = troca->next;
				troca->prev = menor->prev;
				menor->prev = NULL;
				troca->next = NULL;
			}	
			//Trocar é o primeiro e estão juntos..
			else if(andar==list->first && menor==andar->next){
				troca = andar;
				list->first = menor;
				troca->prev = menor;
				troca->next = menor->next;
				menor->next->prev = troca;
				menor->next = troca;
				menor->prev = NULL;
			}	
			//Menor é o último e estão juntos..
			else if(menor==list->last && andar==list->last->prev){
				troca = andar;
				troca->prev->next = menor;
				menor->prev = troca->prev;
				menor->next = troca;
				troca->next = NULL;
				troca->prev = menor;
				list->last = troca;
			}
			//Trocar é o primeiro e estão separados..
			else if(andar==list->first){
				troca = andar;
				auxnext = menor->next;
				aux = menor->prev;
				list->first = troca->next->prev = menor;
				menor->next = troca->next;
				troca->prev = aux;
				troca->next = auxnext;
				aux->next = troca;
				auxnext->prev = troca;
				menor->prev = NULL;
			}		
			//Menor é o último e estão separados..
			else if(menor==list->last){
				troca = andar;
				aux = troca->prev;
				auxnext = troca->next;
				list->last = menor->prev->next = troca;
				troca->prev = menor->prev;
				troca->next = NULL;
				menor->next = auxnext;
				menor->prev = aux;
				aux->next = menor;
				auxnext->prev = menor;
			}
			//Estão no meio e juntos..
			else if(menor==andar->next){
				troca = andar;
				menor->next->prev = troca;
				troca->prev->next = menor;
				troca->next = menor->next;
				menor->prev = troca->prev;
				menor->next = troca;
				troca->prev = menor;
			}
			//Estão no meio e separados..
			else{
				troca = andar;
				aux = menor->prev;
				auxnext = menor->next;
				menor->next = troca->next;
				menor->prev = troca->prev;
				menor->next->prev = menor;
				menor->prev->next = menor;
				troca->next = auxnext;
				troca->prev = aux;
				aux->next = troca;
				auxnext->prev = troca;
			}
		andar = menor;
		}
	}
	return list;
}

void display(tpLista *list){
	tpNodo *ver;
	if(list->nItens==0)
		printf("Lista Vazia!\n\n");
	else{
		for(ver=list->first ; ver!=NULL ; ver=ver->next){
			printf("Código: %d\n", ver->produto.codigo);
			printf("Nome: %s", ver->produto.nome);
			printf("Preço: %.2f\n\n", ver->produto.preco);
		}
	}
}

int main(){
	int op;
	tpLista *list = NovaLista();
	do{
		printf("\tMENU\n");
		printf("0: Sair\n");
		printf("1: Inserir produto\n");
		printf("2: Retirar produto\n");
		printf("3: Listar produtos\n");
		printf("4: Ordenar por Insertion Sort\n");
		printf("5: Ordenar por Selection Sort\n");
		scanf("%d", &op);
		system("clear");
		switch(op){
			case 1:
				system("clear");
				list = push_fim(list);
				break;
			case 2:
				system("clear");
				pop(list);
				break;
			case 3:
				system("clear");
				display(list);
				break;
			case 4:
				system("clear");
				insertionSort(list);
				break;
			case 5:
				system("clear");
				selectionSort(list);
				break;
		}
		
	}while(op!=0);
	return 0;
}
