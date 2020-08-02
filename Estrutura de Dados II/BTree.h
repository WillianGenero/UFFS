#include <stdio.h>
#include <stdlib.h>

/*
	k: Quantidade de chaves inseridas
	p: Quantidade de ponteiros inseridos
	leaf: Diz se a pg. é folha ou não
	**pointers: Vetor guarda o endereço das filhas
	*father: o "pai" da página atual
 */

typedef struct _page{
	int k, p, leaf;
	int *keys;
	struct _page **pointers;
	struct _page *father;
} TpPage;