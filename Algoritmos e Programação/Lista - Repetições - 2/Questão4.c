#include <stdio.h>
#include <math.h>
int main(void){
    int num=1, aux;
    while(num>=1){
        printf("\nDigite um numero (Para sair digite 0): ");
        scanf("%d", &num);
        aux = sqrt(num);
            if(sqrt(num) == aux){
                printf("\n%d e um quadrado perfeito\n", num);
            }   else{
                printf("\n%d nao e um quadrado perfeito\n", num);
        }
    }
return 0;
}
