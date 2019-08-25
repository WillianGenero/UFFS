#include <stdio.h>
int main(void){
    int A;
    printf("Digite um numero: \n");
    scanf("%d", &A);
        if(A % 3 == 0){
            printf("%d e multiplo de 3\n", A);
        }
            else
            {
                printf("%d nao e multiplo de 3\n", A);
            }
    return 0;
}
