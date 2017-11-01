#!/usr/bin/python
import re
import string

alpha=list(string.ascii_uppercase)
print "Enter the word to be encrypted: "
encrypt=raw_input()

print "Enter the key seperated by commas (ie: 3, 1, 2): "
key=raw_input()

#Creates the matrix 
def encryptTable(encrypt, key):
    table=[]
    table.append([])
    col=key
    tableCount=0
    count=0
    for data in encrypt:
        #/If the count is greater than the number of columns, a new
        #/row will be added so it doesnt go over the column amount
        if count >= col:
            table.append([])
            tableCount+=1
            count=0
        #/If the data isnt a space, the character is added to the array
        if(data != ' '):
            table[tableCount].append(data)
            count+=1
        #/If it is a space a % sign is added to the array
        else:
            table[tableCount].append('%')
            count+=1
    #/Fills the remaining spaces with % signs so the matrix is full
    while count != col:
        table[tableCount].append('%')
        count+=1
    return table

#/A function to encrypt the string based on the table
def encryptionDia(diagraphic, key, rows):
    encryptString=''
    row=0
    for data in key:
        if data != ',' and data != ' ':
            while row < rows:
                encryptString=encryptString+diagraphic[row][int(data)-1]
                row+=1
            row=0
    return encryptString

def decryptDia(encryptString, key, cols):
    table=[]
    table.append([])
    col=cols
    tableCount=0
    count=0
    
    row=0
    #/Creates a table 
    for data in encryptString:
        if count >= col:
            table.append([])
            tableCount+=1
            table[tableCount].append(data)
            count=1
        else:
            table[tableCount].append(data)
            count+=1
    rows=len(table)
    for data in key:
        if data != ',' and data != ' ':
                decryptString=decryptString+table[int(data)-1]
    
    return table
            

cols=0
for data in key:
    if data != ',' and data != ' ':
        cols +=1
matrix=encryptTable(encrypt, cols)
print matrix
encryptString=encryptionDia(matrix, key, len(matrix))
print "ENCRYPT: "+encryptString
table=encryptTable(encryptString, cols)
print encryptionDia(table, key, len(table))


