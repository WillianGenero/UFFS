#include <stdio.h>
int main(){
    int N, i, j, posicao=1, primo=0, k;
    printf("Digite um valor: \n");
    scanf("%d", &N);
        for(i=1; i<=N ; i++){
            for(j=1 ; j<=N ; j++){
                for(k=1 ; k<=posicao ; k++){
                    if(posicao%k==0)
                        primo++;
                }
            if(primo==2)
                printf("#");
            else
                printf("_");
            primo=0;
            posicao++;
            }
            printf("\n");
        }
    return 0;
}
