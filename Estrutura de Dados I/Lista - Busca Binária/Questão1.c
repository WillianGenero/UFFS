#include <stdio.h>

int busca(int v[], int n, int inicio, int fim){
	int meio;
	while(inicio <= fim){
		meio = (inicio+fim)/2;
		if(v[meio] == n)
			return meio;
		else if(v[meio] < n)
			return busca(v, n, meio + 1, fim);
		else
			return busca(v, n, inicio, meio-1);
	}
	return -1;
}

void bubble_sort(int vetor[10]){
	int i, j, k, aux;
	for(i=0 ; i<10 ; i++){
		printf("Digite o %d valor: ", i+1);
		scanf("%d", &vetor[i]);
	}
	for (k = 9; k > 0; k--) {
        for (j = 0; j < k; j++) {
            if (vetor[j] > vetor[j + 1]) {
                aux = vetor[j];
                vetor[j] = vetor[j + 1];
                vetor[j + 1] = aux;
            }
        }
    }
	for(i=0 ; i<10 ; i++)
		printf("Valor: %d\n", vetor[i]);
}

int main(){
	int v[10], n, pos;
	bubble_sort(v);
	printf("Qual o elemento a ser buscado?: ");
	scanf("%d", &n);
	pos = busca(v, n, 0, 10);
	printf("Posição do valor %d no vetor: %d\n", n, pos);		
	return 0;
}
