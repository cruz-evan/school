#!/usr/bin/python
# Open a file
with open('a2text.txt', 'r') as myfile:
    data=myfile.read()

# First changes the text file into a binary string, then puts a zero after 5 1's if such
# a case exists
def toStuff(wordString):
    binString="".join([format(ord(char),'#010b')[2:] for char in wordString])
    tracker=0
    stuffString=''
    for letter in binString:
        if letter == '1':
            tracker+=1
        elif letter =='0':
            tracker=0
        if tracker==6:
            stuffString=stuffString+letter+'0'
        else:
            stuffString=stuffString+letter
        
    return stuffString

#Removes the stuffed 0's and returns the stuffed binary string to the original
#It then decifers the binary string and returns it to text
def unStuff(binString):
    tracker=0
    unstuffString=''
    for letter in binString:
        if letter == '1':
            tracker+=1
        elif letter =='0':
            tracker=0
        if tracker==6:
            unstuffString=unstuffString
            tracker=0
        else:
            unstuffString=unstuffString+letter
    return "".join([chr(int(unstuffString[i:i+8],2)) for i in range(0,len(unstuffString),8)])
        

stuffed=toStuff(data)
acString=unStuff(stuffed)
print acString
myfile.close()
