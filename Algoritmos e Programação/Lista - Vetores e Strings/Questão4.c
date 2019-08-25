#include <stdio.h>
int main(){
    int i, vet[7], num, aux=0;
    for(i=0;i<7;i++){
        printf("Digite os valores do vetor: \n");
        scanf("%d", &vet[i]);
    }
    printf("Digite o valor a ser verificado: \n");
    scanf("%d", &num);
    for(i=0;i<7;i++){
        if(num==vet[i])
            aux=i;
    }
    if(aux!=0)
        printf("\nSe encontra na posicao: %d\n", aux+1);
    else
        printf("\nNao se encontra\n");

    return 0;
}
