#include <stdio.h>
int main(void){
    int quant, i=0;
    printf("Digite um numero: \n");
    scanf("%d", &quant);
    while(i<quant){
        printf("*");
        i=i+1;
    }
    printf("\n");
return 0;
}
