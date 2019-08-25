#include <stdio.h>
int main(){
    char Nome[20], Sexo[10];
    int Idade;
    printf("Digite seu nome: \n");
    scanf("%s", &Nome);
    printf("Digite seu sexo: \n");
    scanf("%s", &Sexo);
    printf("Digite sua idade: \n");
    scanf("%d", &Idade);
    printf("\nNome: %s \nSexo: %s \nIdade: %d \n", Nome, Sexo, Idade);
    return 0;
}
