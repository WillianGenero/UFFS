#include <stdio.h>
int main(){
    int i, sal[10], aux;
    for(i=0 ; i<10 ; i++){
        printf("Digite um numero: \n");
        scanf("%d", &sal[i]);
    }
    for(i=0 ; i<10 ; i++){
        if(aux<sal[i])
            aux=sal[i];
    }
    printf("\nMaior: %d\n\n", aux);
    for(i=9 ; i>=0 ; i--){
        printf("%d\n", sal[i]);
    }
    return 0;
}
