//Algoritmo desenvolvido por Vitor Apolinário e Willian Genero.
//Funcionamento do Guloso (°ʖ°): 

#include<iostream>

using namespace std;

#define COL_NUM 5
#define LIN_NUM 5

int find_lower(int mat[][COL_NUM], int line){
	int lower = 0, lower_index=-1;

	for (int i = 0; i < COL_NUM; ++i){
		if((lower==0 && mat[line][i]>0)||(mat[line][i]>0 && mat[line][i]<lower)){
			lower = mat[line][i];
			lower_index = i;
		}
	}
	return lower_index;
}

void clear_column(int mat[][COL_NUM], int colunm){
	for (int i = 0; i < LIN_NUM; ++i)
		mat[i][colunm]=0;
}

void clear_line(int mat[][COL_NUM], int line){
	for (int j = 0; j < COL_NUM; ++j){
		mat[line][j] = 0;
	}
}

int greedy_adj(int adj[][COL_NUM], int line){
	int sum, lower_index;
	sum = lower_index = line = 0;

	do{
		lower_index = find_lower(adj,line);
		if(lower_index!=-1){
			cout << line+1 << "->" << lower_index+1 <<"=" << adj[line][lower_index] << endl;
			sum += adj[line][lower_index];
			clear_column(adj,lower_index);
			line = lower_index;
		}
	}while(lower_index!=-1);
	cout << "Total: " << sum << endl;
}

int greedy_inc(int inc[][COL_NUM],int line){
	int sum, lower_index, value;
	sum = lower_index = 0;
	do{
		lower_index = find_lower(inc,line);
		if(lower_index!=-1){
			sum += inc[line][lower_index];
			value = inc[line][lower_index]*(-1);
			cout << line+1 << "->" << lower_index+1 << " = " << inc[line][lower_index] << endl;
			clear_line(inc, line);
			for (int i = 0; i < LIN_NUM; ++i){
				if(value == inc[i][lower_index]){
					line=i;
					break;
				}
			}
		}
	}while(lower_index!=-1);
	cout << "Total: " << sum << endl;
}

int main(){
	// para escolher entre os casos "descomente" a matriz e a função 
	// equivalente, ajuste os "define's" de acordo com o tamanho da mesma
	
	int adj[][5] = {{0,30,0,0,20},{0,0,0,50,0},{15,10,0,5,0},{0,50,0,0,0},{0,0,10,30,0}};
	
	//int inc[][8] = {{20,0,0,0,0,-15,0,30},{0,0,0,50,0,0,-10,-30},{0,-10,5,0,0,15,10,0},{0,0,-5,50,-30,0,0,0},{-20,10,0,0,30,0,0,0}};
	
	//int adj[][7] = {{0,2,0,6,12,0,0},{0,0,1,0, 0,5,0},{0,0,0,0,0,0,40},{0,0,0,0,0, 4,0},{0,0,0,0,0,0,30},{0,0,0,0,0,0, 8},{0,0,0,0,0,0,0}};

	//int inc[][9] = {{2,6,12,0,0,0,0,0,0},{-2,0,0,1,5,0,0,0,0},{0,0,0,-1,0,0,0,40,0},{0,-6,0,0,0,4,0,0,0},{0,0,-12,0,0,0,30,0,0},{0,0,0,0,-5,-4,0,0,8},{0,0,0,0,0,0,-30,-40,-8}};

	greedy_adj(adj,0);
	//greedy_inc(inc,0);

	return 0;
}
