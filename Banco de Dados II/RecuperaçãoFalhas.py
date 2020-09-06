#Algoritmo de recovery para banco de dados. Desenvolvido por Vitor A. Apolinário e Willian B. Genero

import time
check = []                                                                      #Transações commitadas até Start CKPT
undo = []                                                                       #Transações que precisam de Undo
redo = []                                                                       #Transações que precisam de Redo
dict = {}                                                                       #Minhas variáveis
log = 'teste01'
def realizarREDO():                                                             #Função que realiza o REDO
    arq = open(log, 'r')
    for linha in arq:                                                           #Leio o log de cima pra baixo
        linhaSplit = linha.split(',')                                           #Splito quebrando nas ','
        if linhaSplit[0][2:] in redo:                                           #Vejo se a transação pertence ao REDO
            dict[linhaSplit[1]] = linhaSplit[3][:-2]                            #Salvo a variável com o valor novo (sem '>')
    print('\nVariáveis Pós-Redo: ', dict)
    arq.close()

def realizarUNDO():                                                             #Função que realiza o UNDO
    arq = open(log, 'r')
    linha = arq.readlines()
    for indice in range (0, len(linha)-1):                                      #Leio o arquivo de baixo para cima
        linhaSplit = linha[len(linha)-indice-1].split(',')                      #Quebro todas as linhas em ponto com ','
        if linhaSplit[0][2:] in undo:                                           #Vejo se a transação está no UNDO
            dict[linhaSplit[1]] = linhaSplit[2]                                 #Declaro a variável igual ao valor OLD
    print('\nVariáveis Pós-Undo: ', dict)
    arq.close()

def variaveis(str):                                                             #Pego todas as variáveis que estão na linha 1 do log
    while True:
        try:
            dict[str[0:str.index('=')]] = str[str.index('=')+1:str.index('|')-1]#Pego do início até o '='(Nome da variável) e = com o que tiver entre '=' e '|'
            str = str.lstrip(str[0:str.index('|')+1])                           #Removo o que estiver entre o início até '| '
        except ValueError:                                                      #.index() gera uma expection se não encontrada
            dict[str[0:str.index('=')]] = str[2:-1]                             #Aqui pego a última variável
            break
    print('Variáveis Log: ', dict)

def init():                                                                     #Basicamente busco checkpoints e classifico as transações
    print('\n'*25)                                                              #Limpo a tela
    arq = open(log, 'r')
    var = arq.readline()
    variaveis(var)
    for linha in arq:                                                           #Busco no log por CKPT e Transações e as classifico
        if 'Start CKPT' in linha:                                               #Salvo o que tem no redo ao check
            check.extend(redo)
        if 'End CKPT' in linha:                                                 #Se tiver 'End' removo as transações já salvas do redo
            flag = []                                                           #Lista igual a check para resolver problemas de +1 CKPT
            flag.extend(check)
            for x in flag:                                                      #Ando pela flag e removo os valores do REDO e do CKPT
                redo.remove(x)
                check.remove(x)
            del flag                                                            #Deleto tudo da flag pra garantir +1 CKPT
        if 'start T' in linha:
            undo.append(linha[8:-2])                                            #Pego tudo entre 'T' e '>'
        if 'commit T' in linha:
            redo.append(linha[9:-2])                                            #Pego tudo entre 'T' e '>'
            undo.remove(linha[9:-2])                                            #Pego tudo entre 'T' e '>'
    arq.close()
    realizarREDO()
    realizarUNDO()
inicio = time.time()
init()
print('\nUndo: ', undo)
print('Redo: ', redo)
fim = time.time()
print("\nTime: ", fim-inicio)
