#include <stdio.h>
int main(void){
    int valor1, valor2, aux=0;
    printf("Digite os limites separados por um enter: \n");
    scanf("%d %d", &valor1, &valor2);
    printf("Limite inferior: %d\nLimite superior: %d\nPares: ", valor1, valor2);
    while(valor1 < valor2){
        if(valor1 % 2 == 0){
            printf("%d ", valor1);
        aux=aux + valor1;
        }
        valor1++;
    }
        printf("\nSoma: %d\n", aux);
return 0;
}
