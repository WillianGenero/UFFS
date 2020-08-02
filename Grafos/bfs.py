class Vertice:
    def __init__(self,nome,cor,dist):
        self.nome=nome
        self.cor=cor
        self.dist=dist
        self.vant=None
        self.vizinhos=[]

def visita_nodo(nodo, fila, nodo_final):
    #se descomentar essa parada ele para quando acha o destino
    '''if nodo_final==nodo:
            return
        if nodo.vizinhos.__contains__(nodo_final):
            fila.clear()
            fila.append(nodo_final)'''
    for x in nodo.vizinhos:
        if x.cor=='b':
            x.cor='c'
            x.dist=(nodo.dist+1)
            x.vant=nodo
            fila.append(x)
            
def printa_nodo(nodo):
    print('vértice: {}, cor: {}, distancia: {}, anterior: {}'.format(nodo.nome, nodo.cor, nodo.dist, nodo.vant.nome if nodo.vant else "none"))

a = Vertice('a','b',0)
b = Vertice('b','b',0)
c = Vertice('c','b',0)
d = Vertice('d','b',0)
e = Vertice('e','b',0)
f = Vertice('f','b',0)
g = Vertice('g','b',0)
h = Vertice('h','b',0)
i = Vertice('i','b',0)
j = Vertice('j','b',0)
k = Vertice('k','b',0)
l = Vertice('l','b',0)
m = Vertice('m','b',0)
n = Vertice('n','b',0)
o = Vertice('o','b',0)
p = Vertice('p','b',0)
q = Vertice('q','b',0)
r = Vertice('r','b',0)
s = Vertice('s','b',0)
t = Vertice('t','b',0)
z = Vertice('z','b',0)

a.vizinhos.append(b) 
a.vizinhos.append(k) 
b.vizinhos.append(a) 
b.vizinhos.append(c) 
b.vizinhos.append(d) 
c.vizinhos.append(b) 
c.vizinhos.append(e)
d.vizinhos.append(e) 
d.vizinhos.append(b) 
d.vizinhos.append(l) 
e.vizinhos.append(c) 
e.vizinhos.append(d) 
e.vizinhos.append(f) 
e.vizinhos.append(g)
f.vizinhos.append(e) 
f.vizinhos.append(h)
g.vizinhos.append(i) 
g.vizinhos.append(e)       
h.vizinhos.append(f) 
h.vizinhos.append(i) 
h.vizinhos.append(j)
i.vizinhos.append(g) 
i.vizinhos.append(h) 
i.vizinhos.append(j) 
j.vizinhos.append(h) 
j.vizinhos.append(i) 
j.vizinhos.append(z) 
k.vizinhos.append(a)
k.vizinhos.append(l) 
k.vizinhos.append(m) 
k.vizinhos.append(n)
l.vizinhos.append(k) 
l.vizinhos.append(d) 
l.vizinhos.append(o) 
m.vizinhos.append(k) 
m.vizinhos.append(o)
n.vizinhos.append(k) 
n.vizinhos.append(o) 
o.vizinhos.append(l) 
o.vizinhos.append(m) 
o.vizinhos.append(n) 
o.vizinhos.append(p) 
o.vizinhos.append(r)
p.vizinhos.append(o) 
p.vizinhos.append(q) 
r.vizinhos.append(o) 
r.vizinhos.append(q) 
q.vizinhos.append(p) 
q.vizinhos.append(r) 
q.vizinhos.append(s) 
q.vizinhos.append(t)
s.vizinhos.append(q) 
s.vizinhos.append(t) 
s.vizinhos.append(z) 
t.vizinhos.append(q) 
t.vizinhos.append(s) 
t.vizinhos.append(z) 
z.vizinhos.append(j) 
z.vizinhos.append(s) 
z.vizinhos.append(t)

#dicionário
grafo={'a': a,       'b': b,       'c': c,       'd': d,       'e': e,       'f': f,       'g': g,       'h': h,       'i': i,       'j': j,
       'j': j,       'k': k,       'l': l,       'm': m,       'n': n,       'o': o,       'p': p,       'q': q,       'r': r,       's': s,
       't': t,       'z': z}

fila=[]
fila.append(grafo[input('Digite o vértice inicial: ')])
nf=grafo[input('Digite o vértice final: ')]
print('\n'*35);

while True:
    if fila:
        visita_nodo(fila[0],fila,nf)
        fila[0].cor='p'
        fila.remove(fila[0])
    else:
        break

for i in grafo.keys():
    printa_nodo(grafo[i])

#backtracking
print('\n\nCaminho: ', end='')
while True:
    print(nf.nome, end='  ')
    nf = nf.vant
    if not nf:
        break
print();