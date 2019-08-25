#include <stdio.h>
int main(void){
    int num, i=0, ii=0;
    printf("Digite um numero: \n");
    scanf("%d", &num);
    while(ii<num){
            while(i<num){
            printf("*");
            i++;
            }
    printf("\n");
    ii++, i=0;
}
return 0;
}
