#include <stdio.h>
#include <stdlib.h>

int* uniao(int *v1, int n1, int *v2, int n2){
	int i, j;
	int * v3 = calloc((n1+n2), sizeof(int));
	for(i=0;i<n1;i++){
		*(v3+i)=*(v1+i);
	}
	for(i=n1;i<n1+n2;i++){
		*(v3+i)=*(v2+j);
		j++;
	}
	return v3;
}
int main(void){
	int n1 = 4, i, n2 = 6, *v3;
	int v1[4] = {11, 13, 45, 7}, v2[6] = {24, 4, 16, 81, 10, 12};
	v3 = uniao(v1, n1, v2, n2);
	for(i=0;i<n1+n2;i++)
		printf("O valor na posição %p é: %d\n", &v3[i], v3[i]);
	free(v3);
	return 0;
}
