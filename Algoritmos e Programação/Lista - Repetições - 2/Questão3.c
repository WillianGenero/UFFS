#include <stdio.h>
int main(void){
    double num=0, soma=0, media=0, qnt=0;
    while(num>=0){
        printf("Digite um numero(Para sair digite -1): ");
        scanf("%lf", &num);
        if(num>=0){
            qnt++;
            soma+=num;
        }
    }
        media=soma/qnt;
        printf("\nSomatorio: %.2lf\nMedia: %.2lf\nTotal de Valores: %.0lf\n", soma, media, qnt + 1);

return 0;
}
