#include <stdio.h>
int main(void){
    int A, B=1, aux=A;
        printf("Digite um numero: \n");
        scanf("%d", &A);

    while(B!=0){
        printf("\nDigite um numero(Para sair digite 0); ");
        scanf("%d", &B);
            if(A>=B){
                A=A;
                B=B;
            }
            else{
                A=B;
                B=aux;
            }
    }
    printf("\nO maior e: %d\n", A);
return 0;
}
