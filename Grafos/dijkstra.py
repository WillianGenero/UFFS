class Vertice:
    def __init__(self,nome):
        self.nome=nome
        self.vant=None
        self.custo=5000

class Aresta:
    def __init__(self, nome, custo, a, b):
        self.nome=nome
        self.custo=custo
        self.vertices=[a,b]

class Caminho:
    def __init__(self, vertice, custo):
        self.vertice=vertice
        self.custo=custo

def descobre_arestas(atual,arestas,abertos):
    caminhos=[]
    for x in arestas:
        if x.vertices.__contains__(atual):
            for y in x.vertices:
                if y!=atual and abertos.__contains__(y):
                    caminhos.append(Caminho(y, x.custo))
    return caminhos

a=Vertice('a')
b=Vertice('b')
c=Vertice('c')
d=Vertice('d')
e=Vertice('e')
f=Vertice('f')
g=Vertice('g')

arestas=[
    Aresta('a1',  5,  a, d),
    Aresta('a2',  7,  a, b),
    Aresta('a3',  8,  b, c),
    Aresta('a4',  5,  c, e),
    Aresta('a5',  9,  d, b),
    Aresta('a6',  7,  b, e),
    Aresta('a7',  15, d, e),
    Aresta('a8',  6,  d, f),
    Aresta('a9',  8,  f, e),
    Aresta('a10', 11, f, g),
    Aresta('a11', 9,  e, g)
]

abertos=[a, b, c, d, e, f, g]

grafo={
    'a': a,
    'b': b,
    'c': c,
    'd': d,
    'e': e,
    'f': f,
    'g': g
}

atual=grafo[input('Digite o vértice inicial: ')]
nf=grafo[input('Digite o vértice final: ')]
atual.custo=0
abertos.remove(atual)
print('\n'*35);
while True:
    caminhos=descobre_arestas(atual,arestas,abertos)
    for x in caminhos:
        if x.custo+atual.custo < x.vertice.custo:
            x.vertice.custo = x.custo+atual.custo
            x.vertice.vant = atual
    if atual.custo:
        abertos.remove(atual)

    #acha o próximo vértice (menor custo)
    if abertos:
        m=5000
        n='vazio'
        for x in abertos:
            if x.custo < m:
                m=x.custo
                n=x.nome
        atual=grafo[n]
    else:
        break

#backtracking
while nf:
    print('Vértice:{} Custo:{} Anterior:{}'.format(nf.nome,nf.custo,nf.vant.nome if nf.vant else 'none'))
    nf = nf.vant
