#include <stdio.h>
int main(void){
    double Sal, Prest, Aux;
    printf("Digite o valor do seu salario e o da parcela do emprestimo\n");
    scanf("%lf %lf", &Sal, &Prest);
    Aux = Sal * 0.30;
    if (Aux >= Prest){
            printf("Emprestimo pode ser concedido\n");
    }
    else if(Aux<Prest){
        printf("Emprestimo nao pode ser concedido\n");
    }
    return 0;
}
