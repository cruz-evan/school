#!/usr/bin/python
import re
import string

#List of words
ceaser=list(string.ascii_uppercase)

print "Enter the word to be encrypted: "
encrypt=raw_input()


print "Enter the ceaser cipher degree: "
degree=raw_input()

#encrypts the string
def encryptCeaser(encrypt, degree):
    encryptString=''
    #For each character it moves the character based on the degree
    for data in encrypt:
        location=string.uppercase.index(data)
        location=location+int(degree)
        #If the location is less than 0 it loops back around
        if(location < 0):
            location=location+26
        #If the location is greater than 25 it loops back around
        elif(location > 25):
            location=location-26
        encryptString=encryptString+ceaser[location]
    return encryptString

#Decrypts the string in a similar way as the decrypt
def decryptCeaser(encrypted, degree):
    encryptString=''
    for data in encrypted:
        location=string.uppercase.index(data)
        location=location-int(degree)
        if(location < 0):
            location=location+26
        elif(location > 25):
            location=location-26
        encryptString=encryptString+ceaser[location]
    return encryptString

encrypted=encryptCeaser(encrypt, degree)
print "ENCRYPTED:"+encrypted
print "DECRYPTED:"+decryptCeaser(encrypted, degree)


