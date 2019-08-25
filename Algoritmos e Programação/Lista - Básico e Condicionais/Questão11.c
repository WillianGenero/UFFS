#include <stdio.h>
int main(void){
    double Produto;
    printf("Digite o valor do produto: \n");
    scanf("%lf", &Produto);
    if(Produto<20){
        printf("Venda: %lf\n", Produto * 1.45);
    }
    else if(Produto>=20){
        printf("Venda: %lf\n", Produto * 1.30);
    }
return 0;
}
