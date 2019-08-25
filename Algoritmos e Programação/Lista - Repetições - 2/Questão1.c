#include <stdio.h>
int main(void){
    int picanha, i, costelinha=0;
    printf("Digite um numero: \n");
    scanf("%d", &picanha);
    for(i=1 ; i<picanha ; i++){
        if(picanha % i == 0){
            costelinha++;
        }
    }
    if(costelinha < 2){
        printf("%d E numero primo\n", picanha);
    } else {
    printf("%d Nao e primo\n", picanha);
        }

    return 0;
}
