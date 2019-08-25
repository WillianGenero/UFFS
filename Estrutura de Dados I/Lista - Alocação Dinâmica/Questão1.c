#include <stdio.h>
#include <stdlib.h>

int main(void){
	int num, i; 
	printf("Digite o número de posições: ");
	scanf("%d", &num);
	int *p = (int *)calloc(num, sizeof(int));
	if(!p){
		printf("Memória Insuficiente./n");
	}
	for(i=0;i<num;i++){
		printf("Digite o %dº valor: ", i+1);
		scanf("%d", p+i);
	}
	for(i=0;i<num;i++){
		printf("O valor na posição %p é: %d\n", p+i, *(p+i));
	}
	free(p);
	return 0;
}
