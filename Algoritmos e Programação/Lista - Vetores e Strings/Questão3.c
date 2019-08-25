#include <stdio.h>
int main(){
    int num[6], i, j, aux=0;
    for(i=0;i<6;i++){
        printf("Digite um valor: \n");
        scanf("%d", &num[i]);
    }
    for(i=0;i<6;i++){
        for(j=i+1;j<7;j++){
            if(num[i] > num[j]){
                aux = num[i];
                num[i] = num[j];
                num[j] = aux;
            }
        }
    }
    if((num[0] + num[5] == num[1] + num[4]) && (num[2] + num[3] == num[1] + num[4]) && (num[2] + num[3] == num[0] + num[5]))
        printf("\nE uma sequencia balanceada. \n");
    else
        printf("\nNao e uma sequencia balanceada. \n");

    return 0;
}
