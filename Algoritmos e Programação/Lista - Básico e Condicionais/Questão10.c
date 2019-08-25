#include <stdio.h>
int main(void){
    double A, B, C;
    printf("Digite o tres numeros separados por enter \n");
    scanf("%lf %lf %lf", &A, &B, &C);
    if(A>B && A>C){
        printf("O maior numero e: %lf\n", A);
    }
    else if(B>A && B>C){
        printf("%O maior numero e: %lf\n", B);
    }
    else if(C>A && C>B){
        printf("O maior numero e: %lf\n", C);
    }
return 0;
}
