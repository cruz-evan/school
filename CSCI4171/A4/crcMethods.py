import random
def crcSender(binString, divString):
    degree=len(str(divString))-1
    i=0
    intBinString=int(binString, 2)
    intDivString=int(divString, 2)

    divise=intBinString%intDivString
    print divise
    if(len(bin(divise)[2:].zfill(degree)) > degree):
        return(bin(divise)[-degree:].zfill(degree))
    else:
        return(bin(divise)[2:].zfill(degree))

def crcReciever(binString, divString):
    degree=len(str(divString))-1
    intBinString=int(binString, 2)
    intDivString=int(divString, 2)

    divise=intBinString%intDivString
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
        print bin(divise)[2:].zfill(degree)
        return 'error'

bits='1000100110'
standPoly='1101'
realBits='1000100'
crc=crcSender(str(bits), standPoly)
crcSent=realBits+crc
print crcReciever(str(crcSent), standPoly)
