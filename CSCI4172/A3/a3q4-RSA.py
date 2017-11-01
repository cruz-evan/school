#!/usr/bin/python
import re
import string

alpha=list(string.ascii_uppercase)
print "Enter the m to be encrypted: "
m=raw_input()

print "Enter the prime value p: "
p=raw_input()

print "Enter the prime value q: "
q=raw_input()

#/Finds n
def findN(p,q):
    return p*q

#/Finds the smallest e by determining when (p-1)(q-1)mod e is not 0
def findE(p,q):
    relPrime=(p-1)*(q-1)
    e=2
    while(relPrime%e==0):
        e+=1
    return e

#/Finds the d value by finding when ed mod (p-1)(q-1) = 1
#/Does this by determining when a(p-1)(q-1)+1 mod e is 0 giving d where a increases by 1 each time
def findD(e, p, q):
    baseValue=(p-1)*(q-1)
    value=baseValue
    while((value+1) % e != 0):
        value=value+baseValue
    return (value+1)/e

#/Function for modular exponentiation
def encryptRSA(m, e, n):
    M = m
    E = e
    c = 1
    #If e is not 0 this will do modular expo
    while E > 0:
        if E % 2 == 0:
            M = (M * M) % n
            E = E/2
        else:
            c = (M * c) % n
            E = E - 1
    return c

# Does the same fuction as the ecrypt with different values
def decryptRSA(c, d, n):
    C = c
    D = d
    m = 1
    while D > 0:
        if D % 2 == 0:
            C = (C * C) % n
            D = D/2
        else:
            m = (C * m) % n
            D = D - 1
    return m

N=findN(int(p),int(q))
e=findE(int(p),int(q))
d=findD(e, int(p),int(q))
c=encryptRSA(int(m), e, N)
m=decryptRSA(c, d, N)
print "n: "+str(N)+"\ne: "+str(e)+"\nd: "+str(d)+"\nc: "+str(c)+"\nm: "+str(m)
