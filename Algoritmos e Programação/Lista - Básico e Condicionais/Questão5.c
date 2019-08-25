#include <stdio.h>
int main(){
    double peso;
    printf("Digite seu peso em kilogramas: \n");
    scanf("%lf", &peso);
    printf("Peso: %lf kg \nPeso 2: %lf gramas", peso, peso*1.12*1000);
    return 0;
}
