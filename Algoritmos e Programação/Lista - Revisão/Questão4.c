#include <stdio.h>
int main(void){
    int A=1, B, D, POSI=1;
    printf("Digite um numero: \n");
    scanf("%d", &D);
    for(B=1 ; B<=D ; B++){
        for(A=1; A<=B ; A++){
            if(POSI%2==0)
                printf("P");
            else
                printf("Q");
            POSI++;
        }
        printf("\n");
    }
    return 0;
}
