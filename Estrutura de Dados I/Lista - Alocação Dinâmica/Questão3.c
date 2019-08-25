#include <stdio.h>
#include <stdlib.h>

int main(){
	int i, aux=5, j;
	int * p = (int *)calloc(aux, sizeof(int));
	if(!p)
		printf("\nMemória Insuficiente!\n1");
	for(i=0;i<=aux;i++){
		if(i==aux){
			aux=aux+5;
			int *pNew = realloc(p, aux * sizeof(int));
			if(pNew)
				printf("Realocou!\n");
			p = pNew;
			//Não terá free pelo motivo de dar erro no código!
		}
		printf("Digite um valor: ");
		scanf("%d", (p+i));
		if(*(p+i)==0){
			break;
		}
	}
	printf("\n");
	for(j=0;j<=i;j++){
		printf("O valor na posição %p é: %d\n", p+j, *(p+j));
	}
	free(p);
	return 0;
}
