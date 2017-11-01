#!/usr/bin/python
import re
import string

alpha=list(string.ascii_uppercase)
print "Enter the word to be encrypted: "
encrypt=raw_input()

print "Enter the Key: "
key=raw_input()

def encryptTable(encrypt, key):
    matrix = [[0 for x in range(5)] for y in range(5)]
    i=0
    j=0
    count=0
    inArray=0
    for data in encrypt:
        if(i < 5 and j < 5):
            if(data not in matrix):
                matrix[i][j]=data
                j+=1
        elif(j >= 5):
            j=0
            i+=1
            if(data not in matrix):
                matrix[i][j]=data
                j+=1
        elif(i > 5):
            break
    for alphabet in alpha:
        if(i >=5 and j >=5):
            break
        elif(j >= 5 and alphabet != 'J'):
            j=0
            i+=1
            for row, column in enumerate(matrix):
                for rows, columns in enumerate(column):
                    if alphabet == columns:
                        inArray=1
                        break
            if(inArray!=1):
                matrix[i][j]=alphabet
                j+=1
            inArray=0
        elif(j >=5):
            j=0
            i+=1
        elif(alphabet != 'J'):
            for row, column in enumerate(matrix):
                for rows, columns in enumerate(column):
                    if alphabet == columns:
                        inArray=1
                        break
            if(inArray!=1):
                matrix[i][j]=alphabet
                j+=1
            inArray=0
        elif(alphabet=='J'):
            j=j
    return matrix

matrix=encryptTable(encrypt, key)
for item in matrix:
    print item
    
