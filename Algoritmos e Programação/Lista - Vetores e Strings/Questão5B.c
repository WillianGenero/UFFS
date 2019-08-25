//Essa questão está complicada, lixo de memória.
#include<stdio.h>
#include<string.h>

void copiarString(char palavra[500], char palavra2[500]){
	int j;
	for(j=0;j<strlen(palavra);j++)
		palavra2[j]=palavra[j];
}
int main(){
    char palavra[500],copia[500];

	printf("Digite uma palavra: ");
	scanf(" %s",palavra);

	copiarString(palavra,copia);
	printf("\n%s\n", copia);

	return 0;
}
