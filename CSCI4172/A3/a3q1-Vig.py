#!/usr/bin/python
import re
import string

alpha=list(string.ascii_uppercase)
print "Enter the word to be encrypted: "
encrypt=raw_input()

print "Enter the Key: "
key=raw_input()

#Fills the key with more iterations of the characters in the key if
#the key is shorter than the encrypt string
if(len(key) < len(encrypt)):
    i=len(key)
    keySpot=0
    while(i < len(encrypt)):
        if(keySpot == len(key)):
            keySpot=0
        key=key+key[keySpot]
        i+=1
        
#A function to encrypt the cipher       
def encryptVig(encrypt, key):
    encryptString=''
    count=0
    #For each character in encrypt find the coresponding encryption character using the key
    for data in encrypt:
        locationRow=string.uppercase.index(data)
        locationColumn=string.uppercase.index(key[count])
        count+=1
        #Takes the addition of the key and data and adds them together and subtracts 26
        #This gives the location of the encrypted character
        location=locationRow+locationColumn
        location=location-26
        encryptString=encryptString+alpha[location]
    return encryptString

#Decrypts the string similar to encryption
def decryptVig(decrypt, key):
    decryptString=''
    count=0
    for data in decrypt:
        locationSection=string.uppercase.index(data)
        locationColumn=string.uppercase.index(key[count])
        count+=1
        location=locationSection-locationColumn
        decryptString=decryptString+alpha[location]
    return decryptString

encrypted=encryptVig(encrypt, key)    
print "ENCRYPTED: "+encrypted
print "DECRYPTED: "+decryptVig(encrypted, key)
