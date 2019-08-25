#include <stdio.h>

int main(){
    double numero;
    printf("Digite um numero: \n");
    scanf("%lf", &numero);
    printf("Numero = %lf \nNumero ao quadrado = %lf", numero, pow(numero,2));
    return 0;
}
