#include <stdio.h>
int main(void){
    int i=1, ii=1;
    while(i<=3){
        while(ii<=10){
            printf("%d x %d = %d\n", i, ii, i * ii);
            ii++;
        }
        printf("\n");
        i++;
        ii=1;
    }
    printf("\n");
return 0;
}
