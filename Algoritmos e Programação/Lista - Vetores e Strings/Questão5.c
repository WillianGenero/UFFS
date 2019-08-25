#include <stdio.h>
#include <string.h>
int contador(char* palavra2){
    int caractere=0;
    while(palavra2[caractere] != '\0')
        caractere++;
    return caractere;
}
int main(){
    int i;
    char palavra[100];
    printf("Digite uma palavra: \n");
    scanf("%s", palavra);
    i = contador(palavra);
    printf("A palavra tem %d letras\n", i);
    return 0;
}
