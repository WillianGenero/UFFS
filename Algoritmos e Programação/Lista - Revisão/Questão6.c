#include <stdio.h>
int main(){
    int quant=1, i, maior=1, menor, num;
    printf("Digite a quantidade de repeticoes: \n");
    scanf("%d", &num);
    for(i=1 ; i<=num ; i++){
            printf("Digite os valores: \n");
            scanf("%d", &menor);
            if(menor>maior){
                quant=1;
                maior=menor;
            }
            else if(menor==maior)
                quant++;
    }
        printf("Resposta: \n%d\n", quant);
    return 0;
}
