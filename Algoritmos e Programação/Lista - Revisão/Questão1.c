#include <stdio.h>
int main(void){
    int inf, i, sup, primo=0, aux;
    printf("Digite os dois limites: \n");
    scanf("%d %d", &inf, &sup);
    aux=inf;
    if(inf>sup){
        inf=sup;
        sup=aux;
    }
    for( ; inf<=sup ; inf++){

        for(i=1 ; i<=inf ; i++){
            if(inf % i == 0){
                primo++;
            }
        }
            if(primo == 2){
                printf("%d \n", inf);
            }
        primo=0;
    }
    return 0;
}

