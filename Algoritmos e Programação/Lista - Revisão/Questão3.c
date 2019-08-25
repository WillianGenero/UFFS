#include <stdio.h>
int main(){
    int A=1, B, D, POSI=1;
    printf("Digite um numero: \n");
    scanf("%d", &D);
    for(B=1 ; B<=D ; B++){
        for(A=1 ; A<=B ; A++){
            printf("%d ", POSI);
            POSI++;
        }
        printf("\n");
    }
    return 0;
}
