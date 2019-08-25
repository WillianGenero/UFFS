#include <stdio.h>
#include <math.h>
int main(void){
    int num=1, media=0;
    while(num != 0){
        printf("Digite um numero(Para sair digite 0): ");
        scanf("%d", &num);
        if(num % 3 == 0){
            media+=num;
        }
    }
    printf("Media: %d\n", media/3);
return 0;
}
