#include <stdio.h>
#include <stdlib.h>
#include <stdio_ext.h>
#include <string.h>

typedef struct _produto{
	char codigo[50];
	char nome[20];
	char preco[50];
}TpProduto;

void listarProdutos(FILE *arquivo){
	arquivo = fopen("produtos.txt", "rb");
	char linha[50];
	if(fgets(linha, 50, arquivo) == NULL)
		printf("Arquivo vazio!\n\n");
	else{
		printf("\tPRODUTOS\n");
		printf("%s", linha);
		while(fgets(linha, 50, arquivo) != NULL)
			printf("%s", linha);
		fclose(arquivo);
	}
}

void criarProduto(FILE *arquivo, TpProduto *produto){
	arquivo = fopen("produtos.txt", "ab");
	system("clear");
	fprintf(arquivo, "Código: ");
	printf("Código: ");
	__fpurge(stdin);
	fgets(produto->codigo, 50, stdin);
	fprintf(arquivo, "%s", produto->codigo);
	fprintf(arquivo, "Nome: ");
	printf("Nome: ");
	fgets(produto->nome, 50, stdin);
	fprintf(arquivo, "%s", produto->nome);
	fprintf(arquivo, "Preço: ");
	printf("Preco: ");
	fgets(produto->preco, 50, stdin);
	fprintf(arquivo, "%s\n", produto->preco);
	fclose(arquivo);
}

int main(){
	int op;
	FILE *Trab3_Arquivos;
	Trab3_Arquivos = fopen("produtos.txt", "wb");
	TpProduto *produto = (TpProduto *) malloc(sizeof(TpProduto));
	system("clear");
	do{
		printf("\tMENU\n");
		printf("1. Inserir um produto\n");
		printf("2. Listar os produtos\n");
		printf("0. Sair\n");
		printf("Digite a operação: ");
		scanf("%d", &op);
		switch(op){
			case 1:
				system("clear");
				criarProduto(Trab3_Arquivos, produto);
				system("clear");
				break;
			case 2:
				system("clear");
				listarProdutos(Trab3_Arquivos);
				break;
		}
	}while(op!=0);
	return 0;
}