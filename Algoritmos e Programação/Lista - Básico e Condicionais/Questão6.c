#include <stdio.h>
#include <math.h>
int main(){
    double A, B, C;
    printf("Digite o valor de dois numeros: \n");
    scanf("%lf %lf", &A, &B);
    C = A - B;
    printf("Valor = %lf\n", pow(C,2));
    return 0;
}
