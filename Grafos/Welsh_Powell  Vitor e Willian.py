grau = []
grauOrdem = []
corVertice = []
valorTestado = []

#Grafo do trabalho
	   #A, B, C, D, E, F, G, H, I, J, K
mat = [[0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0], #A
	   [1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0], #B
	   [0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0], #C
	   [0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1], #D
	   [0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1], #E
	   [0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0], #F
	   [0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1], #G
	   [1, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1], #H
	   [0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0], #I
	   [0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1], #J
	   [0, 0, 0, 1, 1, 0, 1, 1, 0, 1, 0]] #K
def procGrau():										# Está função serve unicamente para calcular o grau de cada vértice
	for i in range(len(mat)):
		cont = 0
		for j in range(len(mat)):
			if mat[i][j] == 1:
				cont+=1
		grauOrdem.append(cont)
		grau.append(cont)
		grauOrdem.sort()
		grauOrdem.reverse()
def procMaior(x):									# Está função é usada para procurar o vértice que contém o maior grau a ser pintado
	for i in range(len(grau)):
		milagre = 0
		if(grauOrdem[x] == grau[i]):	
			for j in range(len(valorTestado)):		# Para corrigir um problema de não mudar o vértice quando mais de um vértice tem o mesmo grau
				if(i==valorTestado[j]):
					milagre = 1
			if milagre == 0:						# Se o vértice i ainda não foi testado ele irá para o algoritmo
				return i
			else:									# Se ele já foi testado para tal cor, então é pulado
				continue
def completaCor():									# Aqui é inicializada as cores dos vértices como 0
	for i in range(len(mat)):
		corVertice.append(0)			
def welshPowell():							
	cond = cores = 1
	for i in range(len(mat)):						# Ando toda a matriz na ordem de graus dos vértices para pintar maior de cada cor nova.
		valorTestado.clear()
		maior = procMaior(i)
		if corVertice[maior] == 0:					# Se o vértice ainda não foi pintado então é feito agora
			corVertice[maior] = cores
			grau[maior] = 0							# Zerar significa que o vértice já foi pintado, então não devo verificá-lo nos próximos laços
			grauOrdem[i] = 0
			valorTestado.append(maior)
		for j in range(i+1, len(mat)):				# Aqui será pintado os próximos vértices.
			prox = procMaior(j)
			valorTestado.append(prox)
			cond=1
			for k in range(len(mat)):				
				if (mat[prox][k]==1 and corVertice[k]==cores):		# Se o vértice a ser pintado se liga com alguém que tem a mesma cor que ele não pinta
					cond=0
			if cond==1 and corVertice[prox]==0:		# Se estiver tudo certo, pinta.
				corVertice[prox]=cores
				grau[prox] = 0
				grauOrdem[j] = 0
		cores+=1

print('\n'*30)		
procGrau()
print('Graus de cada vértice: ', grau)
print('Graus ordenados:       ', grauOrdem)
completaCor()
welshPowell()
print('Cores Finais:          ',corVertice)