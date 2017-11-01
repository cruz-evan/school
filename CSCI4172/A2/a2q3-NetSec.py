#!/usr/bin/python
import re
import socket

# Open the ACL table
print "Enter the ACL table file name without a .txt ending:"
acltable=raw_input()
with open(acltable+'.txt', 'r') as myfile:
    data=myfile.read()

print "Enter the packet table file name without a .txt ending:"
packsend=raw_input()
with open(packsend+'.txt', 'r') as myfile:
    sender=myfile.read()

def valid_ip(address):
    try: 
        socket.inet_aton(address)
        return True
    except:
        return False

# Puts the ACL table into a 2d array
def makeTable(tableString):
    table=[]
    table.append([])
    track=0
    dataString=''
    listCount=0
    # While there is still data in the file it will organize the information into the array
    for data in tableString:
        
        #Ensures that access-list numbers are placed in properly 
        if(dataString=='access-list'):
            dataString=dataString+data
        elif(dataString=='access-group'):
            dataString=dataString+data
            
        #if the character is a space it will append whatever is in the dataString
        #since data is seperated by a space it will be put into the 2d array properly
        elif(data==' '):
            table[listCount].append(dataString)
            dataString=''
            
        #if there is a new line reset the dataString
        elif(data=='\n'):
            if(valid_ip(dataString)):
                table[listCount].append(dataString)
                dataString=''
                table.append([])
                listCount=listCount+1
            dataString=''
            
        #if none of those match add the character to the dataString
        else:
            dataString=dataString+data
            #if the dataString matchs S0, S1... so on or E0, E1... so on add the
            #interface to the table and append another empty array to the table
            if(re.match("S[0-9][0-9]*", dataString) or re.match("E[0-9][0-9]*", dataString)):
                table[listCount].append(dataString)
                dataString=''
                table.append([])
                listCount=listCount+1
    if(dataString!=''):
        table[listCount].append(dataString)
    return table

def sendPacket(packetString):
    table=[]
    table.append([])
    track=0
    dataString=''
    listCount=0
    # While there is still data in the file it will organize the information into the array
    for data in packetString:
        #if the character is a space it will append whatever is in the dataString
        #since data is seperated by a space it will be put into the 2d array properly
        if(data==' '):
            table[listCount].append(dataString)
            dataString=''
            
        #if there is a new line reset the dataString
        elif(data=='\n'):
            if(valid_ip(dataString)):
                table[listCount].append(dataString)
                dataString=''
                table.append([])
                listCount=listCount+1
            dataString=''
        #if none of those match add the character to the dataString
        else:
            dataString=dataString+data
    if(dataString!=''):
        table[listCount].append(dataString)
    return table

def aclPackets(tableString, packetString):
    accessList=''
    state=''
    ipNum=''
    mask=''
    source=''
    classCount=0
    Aclass=''
    Bclass=''
    Cclass=''
    unMask=''
    #Gets all of the packet data to be analyzied 
    for row1, column1 in enumerate(packetString):
        for rows1, columns1 in enumerate(column1):
            source=column1[0]
            destination=column1[1]
        #gets all of the access-control list information
        for row, column in enumerate(tableString):
            for rows, columns in enumerate(column):
                accessList=column[0]
                state=column[1]
                ipNum=column[2]
                mask=column[3]

            for ip in source:
                #Gets the C class Address by looking if the class count is 2
                #(3 .'s) and if the current character is a .
                #adds all of the destination string and one 0
                if(ip=='.' and classCount==2):
                    Cclass=unMask+ip+'0'
                    unMask=unMask+ip
                    classCount=0
                #Gets the B class Address
                elif(ip=='.' and classCount==1):
                    Bclass=unMask+ip+'0.0'
                    unMask=unMask+ip
                    classCount=2
                #Gets the A class Address
                elif(ip=='.' and classCount==0):
                    Aclass=unMask+ip+'0.0.0'
                    unMask=unMask+ip
                    classCount=1
                #destination ip slowly comes together so that classes can be found
                else:
                    unMask=unMask+ip
        
            #if the mask is 0.0.0.0 and the ipNumber in the ACL is equal to the IP number submitted by the packed this will determine if the packet is admitted or denied
            if(mask=='0.0.0.0' and ipNum==unMask):
                if(state=='deny'):
                    print source+' '+destination+' denied'
                else:
                    print source+' '+destination+' permited'
                Aclass=''
                Bclass=''
                Cclass=''
                unMask=''
                break
            #if the mask is 0.0.0.255 and the ipNumber in the ACL is equal to the C class IP number submitted by the packed this will determine if the packet is admitted or denied
            elif(mask=='0.0.0.255' and ipNum==Cclass):
                if(state=='deny'):
                    print source+' '+destination+' denied'
                else:
                    print source+' '+destination+' permited'
                Aclass=''
                Bclass=''
                Cclass=''
                unMask=''
                break
            #if the mask is 0.0.255.255 and the ipNumber in the ACL is equal to the B class IP number submitted by the packed this will determine if the packet is admitted or denied
            elif(mask=='0.0.255.255' and ipNum==Bclass):
                if(state=='deny'):
                    print source+' '+destination+' denied'
                else:
                    print source+' '+destination+' permited'
                Aclass=''
                Bclass=''
                Cclass=''
                unMask=''
                break
            #if the mask is 0.255.255.255 and the ipNumber in the ACL is equal to the A class IP number submitted by the packed this will determine if the packet is admitted or denied
            elif(mask=='0.255.255.255' and ipNum==Aclass):
                if(state=='deny'):
                    print source+' '+destination+' denied'
                else:
                    print source+' '+destination+' permited'
                Aclass=''
                Bclass=''
                Cclass=''
                unMask=''
                break
            #If it does not match any of these if will reset the fields for the next packet and determine wheter or not the packet can be permited by
            #checking if all other packets not in the ACL are denied or permitted
            else:
                if(ipNum=='any' or mask=='any'):
                    if(state=='deny'):
                        print source+' '+destination+' denied'
                    else:
                        print source+' '+destination+' permited'
                Aclass=''
                Bclass=''
                Cclass=''
                unMask=''
    

table=makeTable(data)
packets=sendPacket(sender)
aclPackets(table, packets)
