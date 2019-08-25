#include <stdio.h>
int main(){
    int N, i;
    printf("Digite o tamanho do vetor: \n");
    scanf("%d", &N);
    int sal[N];
    for(i=0;i<N;i++){
        printf("Digite um numero: \n");
        scanf("%d", &sal[i]);
    }
    for(i=0;i<N;i++){
        if(sal[i]<1000)
            sal[i]*=1.1;
    }
    printf("Novos valores: \n");
    for(i=0;i<N;i++)
        printf("%d  ", sal[i]);
    printf("\n");


    return 0;
}
