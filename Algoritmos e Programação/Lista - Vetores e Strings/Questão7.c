//Estou com um problema de lixo de memória aqui, que resulta na palavra inversa errada.
#include <stdio.h>
#include <string.h>
int main(){
	char palavra[1000], inversa[1000];
	int i, j;
	printf("Digite uma palavra: \n");
	scanf("%s", palavra);

	for(j=0, i=strlen(palavra)-1;i>=0;i--,j++)
		inversa[j]=palavra[i];
	if(strcmp(palavra,inversa)==0)
		printf("E um palindromo\n");

	else
		printf("Nao e um palindromo\n", palavra);
return 0;
}
