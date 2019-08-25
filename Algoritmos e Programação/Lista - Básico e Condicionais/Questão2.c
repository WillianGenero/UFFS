#include <stdio.h>

int main(){
    int numero;
    printf("Digite um numero: \n");
    scanf("%d", &numero);
    printf("\nAntecessor: %d \nSucessor: %d\n", numero - 1, numero + 1);

    return 0;
}
