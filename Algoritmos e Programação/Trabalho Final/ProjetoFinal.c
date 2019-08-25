#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <math.h>
	
typedef struct{
	char nome[100], CPF[100];
	int matricula, turma;
	double notas[3];
}Aluno;	

typedef struct{
	int codigo, hora, fase, quantAluno;
	char disciplina[100], dia[100];
	Aluno aluno[100];
}Turma;

void cadastraTurma(Turma turma[]){
	int i, n;
	system("clear");
	printf("Digite quantas turma deseja cadastrar: ");	
	scanf("%d", &n);
	system("clear");
	for(i=0;i<n;i++){
		turma[i].codigo=i+1;
		__fpurge(stdin);
		printf("Digite o componente curricular ministrado: ");
		fgets(turma[i].disciplina, 100, stdin);
		printf("Digite a fase: ");
		scanf("%d", &turma[i].fase);
		__fpurge(stdin);
		printf("Digite o dia das aulas: ");
		scanf("%s", turma[i].dia);
		printf("Digite o horario inicial da aula: ");
		scanf("%d", &turma[i].hora);
		system("clear");
	}
}
int validarCPF(char cpf[]){
    int i, j, digito1 = 0, digito2 = 0;
    if(strlen(cpf) != 11)
        return 0;
    else if((strcmp(cpf,"00000000000") == 0) || (strcmp(cpf,"11111111111") == 0) || (strcmp(cpf,"22222222222") == 0) ||
            (strcmp(cpf,"33333333333") == 0) || (strcmp(cpf,"44444444444") == 0) || (strcmp(cpf,"55555555555") == 0) ||
            (strcmp(cpf,"66666666666") == 0) || (strcmp(cpf,"77777777777") == 0) || (strcmp(cpf,"88888888888") == 0) ||
            (strcmp(cpf,"99999999999") == 0))
        return 0;
    else
    {
        for(i = 0, j = 10; i < strlen(cpf)-2; i++, j--)
            digito1 += (cpf[i]-48) * j;
        digito1 %= 11;
        if(digito1 < 2)
            digito1 = 0;
        else
            digito1 = 11 - digito1;
        if((cpf[9]-48) != digito1)
            return 0; 
        else
        {
            for(i = 0, j = 11; i < strlen(cpf)-1; i++, j--)
                    digito2 += (cpf[i]-48) * j;
        digito2 %= 11;
        if(digito2 < 2)
            digito2 = 0;
        else
            digito2 = 11 - digito2;
        if((cpf[10]-48) != digito2)
            return 0;
        }
    }
    return 1;
}

void cadastraAluno(Turma turma[]){
	int i, j, k, l;
	system("clear");
	printf("Quantos alunos você quer cadastrar: ");
	scanf("%d", &i);
	system("clear");
	printf("Digite a turma em que o aluno será cadastrado: ");
	scanf("%d", &k);
	system("clear");
	for(j=0;j<i;j++){
		system("clear");
		__fpurge(stdin);
		turma[k-1].quantAluno=i;
		printf("Digite o nome do aluno: ");
		fgets(turma[k-1].aluno[j].nome, 100, stdin);
		printf("Digite a matricula: ");
		scanf("%d", &turma[k-1].aluno[j].matricula);
		turma[k-1].aluno[j].turma=k;
		printf("Digite o CPF do aluno: ");
		do{
			scanf("%s", turma[k-1].aluno[j].CPF);
			if(validarCPF(turma[k-1].aluno[j].CPF)==1){
				l=1;
				break;}
			else if(validarCPF(turma[k-1].aluno[j].CPF)==0)
				printf("CPF invalido. Digite novamente: ");
				l=0;		
			
		}while(l==0);
	}
	system("clear");
}
void inserirNotas(Turma turma[]){
	int i, j;
	system("clear");
	printf("Digite a turma do aluno: ");
	scanf("%d", &i);
	system("clear");
	for(j=0;j<turma[i-1].quantAluno;j++){
		__fpurge(stdin);
		printf("Aluno: %s", turma[i-1].aluno[j].nome);
		printf("Nota da NP1: ");
		scanf("%lf", &turma[i-1].aluno[j].notas[0]);
	}
	for(j=0;j<turma[i-1].quantAluno;j++){
		__fpurge(stdin);
		printf("Aluno: %s", turma[i-1].aluno[j].nome);
		printf("Nota da NP2: ");
		scanf("%lf", &turma[i-1].aluno[j].notas[1]);		
	}
	system("clear");
}
void calcularMedias(Turma turma[]){
	int i, j;
	double peso1, peso2;
	system("clear");
	printf("Digite a turma para ser calculada: ");
	scanf("%d", &i);
	system("clear");
	printf("Digite o peso da NP1: ");
	scanf("%lf", &peso1);
	printf("Digite o peso da NP2: ");
	scanf("%lf", &peso2);
	for(j=0;j<turma[i-1].quantAluno;j++){
		turma[i-1].aluno[j].notas[2]=((turma[i-1].aluno[j].notas[0]*(peso1/100.0))+(turma[i-1].aluno[j].notas[1]*(peso2/100.0)));
		printf("%.2lf\n", turma[i-1].aluno[j].notas[2]);
	}
}
void fecharTurma(Turma turma[]){
	int i, j;
	system("clear");
	printf("Digite a turma a ser fechada: ");
	scanf("%d", &i);
	system("clear");
	for(j=0;j<turma[i-1].quantAluno;j++){
		if(turma[i-1].aluno[j].notas[2]>=6){
			printf("Aluno: %s", turma[i-1].aluno[j].nome);
			printf("Nota Final: %.1lf\n", turma[i-1].aluno[j].notas[2]);
			printf("Aprovado!\n");
		}
	}
	for(j=0;j<turma[i-1].quantAluno;j++){
		if(turma[i-1].aluno[j].notas[2]<6){
			printf("Aluno: %s", turma[i-1].aluno[j].nome);
			printf("Nota Final: %.1lf\n", turma[i-1].aluno[j].notas[2]);
			printf("Reprovado!\n");
		}
	}
	getchar();
	printf("Aperte Enter para sair\n");
	getchar();
}

void exibirTurma(Turma turma[]){
	int i;
	system("clear");
	printf("Digite a turma a ser exibida: ");
	scanf("%d", &i);
	printf("Código da turma: %d\n", turma[i-1].codigo);
	printf("Disciplina: %s", turma[i-1].disciplina);
	printf("Fase: %d\n", turma[i-1].fase);
	printf("Horario: %s as %d\n", turma[i-1].dia, turma[i-1].hora);
	printf("Quantidade de alunos: %d\n\n", turma[i-1].quantAluno);
}
void exibirAlunos(Turma turma[]){
	int i, j;
	system("clear");
	printf("Digite a turma que quer ser exibida: ");
	scanf("%d", &i);
	system("clear");
	for(j=0;j<turma[i-1].quantAluno;j++){
		printf("Aluno: %s", turma[i-1].aluno[j].nome);
		printf("Matricula: %d\n", turma[i-1].aluno[j].matricula);
		printf("CPF: %s\n\n", turma[i-1].aluno[j].CPF);
	}
}
void exibirNotasParciais(Turma turma[]){
	int i, j;
	system("clear");
	printf("Digite a turma que quer ser exibida: ");
	scanf("%d", &i);
	system("clear");
	for(j=0;j<turma[i-1].quantAluno;j++){
		printf("Aluno: %s", turma[i-1].aluno[j].nome);
		printf("Nota de NP1: %.1lf\n", turma[i-1].aluno[j].notas[0]);
		printf("Nota de NP2: %.1lf\n\n", turma[i-1].aluno[j].notas[1]);
	}
}
void exibirNotasFinais(Turma turma[]){
	int i, j;
	system("clear");
	printf("Digite a turma que quer ser exibida: ");
	scanf("%d", &i);
	system("clear");
	for(j=0;j<turma[i-1].quantAluno;j++){
		printf("Aluno: %s", turma[i-1].aluno[j].nome);
		printf("Nota Final: %.1lf\n\n", turma[i-1].aluno[j].notas[2]);
	}
}

int main(){
	int op, ex;
	Turma t1[100];
	do{
	system("clear");
    printf("\t\tMENU\n");
    printf("1: Cadastrar Turma\n");
    printf("2: Cadastrar Alunos\n");
    printf("3: Exibir\n");
    printf("4: Inserir Notas Parciais\n");
    printf("5: Calcular Medias\n");
    printf("6: Fechar Diário\n");
    printf("0: Sair\n");
    scanf("%d", &op);
	switch (op){
		case 1:
            cadastraTurma(t1);
            break;
		case 2:
			cadastraAluno(t1);
			break;
        case 3:
			do{
				printf("1: Exibir Turma\n");
				printf("2: Exibir Alunos\n");
				printf("3: Exibir Notas Parciais\n");
				printf("4: Exibir Notas Finais\n");
				printf("5: Sair\n");
				scanf("%d", &ex);
				switch (ex){
					case 1:
						exibirTurma(t1);
						break;
					case 2:
						exibirAlunos(t1);
						break;
					case 3:
						exibirNotasParciais(t1);
						break;
					case 4:
						exibirNotasFinais(t1);
						break;
					default:
						system("clear");
						break;
				}
			}while(ex!=5);
			break;
		case 4:
			inserirNotas(t1);
			break;
		case 5:
			calcularMedias(t1);
			break;
		case 6:
			fecharTurma(t1);
			break;
		default:
			printf("Operação Invalida\n");
			break;
		}
    }while(op!=0);
	return 0;
}
