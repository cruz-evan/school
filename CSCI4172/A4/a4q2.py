#!/usr/bin/python
import re
import random

print "Enter the prime value p: "
primeP=raw_input()
p=int(primeP)

print "Enter the prime value g: "
primeG=raw_input()
g=int(primeG)

#determine if p and g are prime
def isPrime(p,g):
    i=2
    if p == 1 or p==2 or g==1 or g==2:
        print "p or g cant be 1 or 2"
        return -1
    while i < p:
        if p % i == 0:
            print "p is not prime"
            return -1
        i+=1
    i=2
    while i < g:
        if g % i == 0:
            print "g is not prime"
            return -1
        i+=1

    return 0

#Gets a secret number in the range 2-128
def getSecretNum():
    s=random.randint(2,128)
    return s

prime=isPrime(p,g)
if prime == 0:
    Sa=getSecretNum()
    Sb=getSecretNum()
    
    #Finds Ta and Tb by doing g^Sa mod p and g^Sb mod p 
    Ta=pow(g, Sa, p)
    Tb=pow(g, Sb, p)
    
    #Gets the verifying numbers by doing Tb^Sa mod p and Ta^Sb mod p
    #If the secret numbers math then the person and server are verified 
    secret1=pow(Tb, Sa, p)
    secret2=pow(Ta, Sb, p)

    if secret1==secret2:
        print 'Sa: ' + str(Sa) + "\tTa: " +str(Ta) + "\tSecret: " +str(secret1)
        print 'Sb: ' + str(Sb) + "\tTb: " +str(Tb) + "\tSecret: " +str(secret2)
    else:
        print "Numbers not verified"
    
