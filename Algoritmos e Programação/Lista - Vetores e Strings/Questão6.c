#include <stdio.h>
#include <string.h>
int main(){
    char ge[]="Gerente, gerente", eng[]="Engenheiro", tec[]="Tecnico", cargo[100];
    double sal=0, dif=0, aux=1;
    printf("Digite o cargo do funcionario: \n");
    scanf("%s", cargo);
    printf("Digite o salario: \n");
    scanf("%lf", &sal);
    if (strcmp(cargo, ge)==0)
        printf("Salario antigo: %.2lf\nSalario novo: %.2lf\nDiferenca: %.2lf\n", sal, sal*1.1, (sal*1.1)-sal);
    else if(strcmp(cargo, eng)==0)
        printf("Salario antigo: %.2lf\nSalario novo: %.2lf\nDiferenca: %.2lf\n", sal, sal*1.2, (sal*1.2)-sal);
    else if(strcmp(cargo, tec)==0)
        printf("Salario antigo: %.2lf\nSalario novo: %.2lf\nDiferenca: %.2lf\n", sal, sal*1.3, (sal*1.3)-sal);
    else
        printf("Salario antigo: %.2lf\nSalario novo: %.2lf\nDiferenca: %.2lf\n", sal, sal*1.4, (sal*1.4)-sal);


    return 0;
}
