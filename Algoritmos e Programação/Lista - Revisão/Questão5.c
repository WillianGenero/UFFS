#include <stdio.h>
int main(void){
int val1, val2, i, cont=0, primo2;
    printf("Digite dois valores: \n");
    scanf("%d %d", &val1, &val2);
    primo2=-1;
    for( ; val1<=val2 ; val1++){
        for(i=1 ; i<=val1 ; i++){
            if(val1%i==0)
                cont++;
        }
        if(cont==2 && val1-primo2==2)
            printf("%d %d\n", primo2, val1);
        else if(cont==2)
            primo2=val1;
        cont=0;
    }
    return 0;
}
