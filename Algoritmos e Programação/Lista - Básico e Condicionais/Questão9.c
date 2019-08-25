#include <stdio.h>
int main(void){
    double A, B;
    printf("Digite o valor de dois numeros\n");
    scanf("%lf %lf", &A, &B);
    if(A>B) {
        printf("A ordem crescente e: %lf %lf\n", B, A);
    }
        else {
                printf("A ordem crescente e: %lf %lf\n", A, B);
    }
return 0;
}
