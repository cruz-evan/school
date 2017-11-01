#CRC
import random

#CRC handler for the sender
def crcSender(binString, divString):

    #changes the inputted binary string (M'x) and G(x) to their real numbers
    degree=len(str(divString))-1
    i=0
    intBinString=int(binString, 2)
    intDivString=int(divString, 2)

    #finds remainder
    divise=intBinString%intDivString

    #strips the 0b in the bin operation
    if(len(bin(divise)[2:].zfill(degree)) > degree):
        return(bin(divise)[-degree:].zfill(degree))
    else:
        return(bin(divise)[2:].zfill(degree))

#reciever handler 
def crcReciever(binString, divString):

    #converts the strings to their real numbers
    degree=len(str(divString))-1
    intBinString=int(binString, 2)
    intDivString=int(divString, 2)

    #finds remainder
    divise=intBinString%intDivString

    #if there is no remainder or the binary divise string matches the remainder
    #appended in the bin string no error
    #if the length of the remainder is longer than the degree ignore the first bit 
    if(len(bin(divise)[2:].zfill(degree)) > degree):
        if(bin(divise)[-degree:].zfill(degree) == bin(intBinString)[-degree:]):
            return 'no error'
        else:
            return 'error'
    elif(divise==0):
        return 'no error'
    elif(bin(divise)[2:].zfill(degree)== bin(intBinString)[-degree:]):
        return 'no error'
    elif(bin(divise)[2:].zfill(degree)== bin(intBinString)[-degree-1:]):
        return 'no error'
    else:
        return 'error'

def crcTest():
    poly=0
    i=0
    n=0
    errCount=0
    truCount=0
    bitCount=0
    bits=''
    crcPoly=''
    standPoly='100110000010001110110110111'
    #creates 1000 tests for a given Mx(bits), error(poly)
    while (n<1000):
        while (i < 12160):
            bits = bits+str(random.randint(0, 1))
            i=i+1
        while (poly <= 35):
            crcPoly=crcPoly+str(random.randint(0, 1))
            poly=poly+1
        while (bitCount< 32):
            bits = bits + '0'
            bitCount=bitCount+1
        realbits=bits
        #crc is found using standard polynomial and is appended to realbits
        crc=crcSender(str(bits), standPoly)
        crcSent=realbits+crc
        if(crcReciever(str(crcSent), crcPoly)=='error'):
            errCount=errCount+1
        else:
            truCount=truCount+1
        n=n+1
        poly=0
        bitCount=0
        bits=''
        crcPoly=''
        i=0
    print errCount
    print truCount

crcTest()

            
    
