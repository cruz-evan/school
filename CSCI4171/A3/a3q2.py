#!/usr/bin/python
import re

# Open the route table
print "Enter the router file name without a .txt ending:"
routertable=raw_input()
with open(routertable+'.txt', 'r') as myfile:
    data=myfile.read()

# Open the destination packets file
print "Enter the destination file name without a .txt ending:"
destFile=raw_input()
with open(destFile+'.txt', 'r') as myfile:
    packets=myfile.read()
print '\n'

# Puts the route table into a 2d array
def makeTable(tableString):
    table=[]
    table.append([])
    track=0
    dataString=''
    listCount=0
    # While there is still data in the file it will organize the information into the array
    for data in tableString:
        
        #Ensures that Network Specific and Host Specific are placed in properly 
        if(dataString=='Network' or dataString=='Host'):
            dataString=dataString+data
            
        #if the character is a space it will append whatever is in the dataString
        #since data is seperated by a space it will be put into the 2d array properly
        elif(data==' '):
            table[listCount].append(dataString)
            dataString=''
            
        #if there is a new line reset the dataString
        elif(data=='\n'):
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
    return table

def sendPackets(packetString, FDBtable):
    source=''
    classCount=0
    destination=''
    Aclass=''
    Bclass=''
    Cclass=''
    hop=''
    flag=''
    interface=''
    #Gets all of the classes of the destination address
    for data in packetString:

        #if there is a new line there is a new ip address 
        if(data=='\n'):
            for ip in source:

                #Gets the C class Address by looking if the class count is 2
                #(3 .'s) and if the current character is a .
                #adds all of the destination string and one 0
                if(ip=='.' and classCount==2):
                    Cclass=destination+ip+'0'
                    destination=destination+ip
                    classCount=0
                #Gets the B class Address
                elif(ip=='.' and classCount==1):
                    Bclass=destination+ip+'0.0'
                    destination=destination+ip
                    classCount=2
                #Gets the A class Address
                elif(ip=='.' and classCount==0):
                    Aclass=destination+ip+'0.0.0'
                    destination=destination+ip
                    classCount=1
                #destination ip slowly comes together so that classes can be found
                else:
                    destination=destination+ip

            #gets each data entry in the 2d array of the forrwarding database
            for row, column in enumerate(FDBtable):
                for rows, columns in enumerate(column):
                    #Determines which class matches the destination ip
                    #And gets the matching hop, flag and interface
                    if(destination==columns and column[3]=='Host Specific'):
                        hop=column[2]
                        flag=column[3]
                        interface=column[4]
                    elif(Cclass==columns):
                        hop=column[2]
                        flag=column[3]
                        interface=column[4]
                    elif(Bclass==columns):
                        hop=column[2]
                        flag=column[3]
                        interface=column[4]
                    elif(Aclass==columns):
                        hop=columns[2]
                        flag=column[3]
                        interface=column[4]
            print ('Packet with destination address '+source+
            ' will be forwarded to '+hop+' out on interface '+interface) 
            source=''
            destination=''
            Aclass=''
            Bclass=''
            Cclass=''
            hop=''
            flag=''
            interface=''
        #if there is not a new line append the characters to the source string to form an ip address
        else:
            source=source+data
            
    for ip in source:
        
        #Gets the C class Address by looking if the class count is 2
        #(3 .'s) and if the current character is a .
        #adds all of the destination string and one 0
        if(ip=='.' and classCount==2):
            Cclass=destination+ip+'0'
            destination=destination+ip
            classCount=0
        #Gets the B class Address
        elif(ip=='.' and classCount==1):
            Bclass=destination+ip+'0.0'
            destination=destination+ip
            classCount=2
        #Gets the A class Address
        elif(ip=='.' and classCount==0):
            Aclass=destination+ip+'0.0.0'
            destination=destination+ip
            classCount=1
        #destination ip slowly comes together so that classes can be found
        else:
            destination=destination+ip

    #gets each data entry in the 2d array of the forrwarding database       
    for row, column in enumerate(FDBtable):
        for rows, columns in enumerate(column):
            #Determines which class matches the destination ip
            #And gets the matching hop, flag and interface
            if(source==columns and column[3]=='Host Specific'):
                hop=column[2]
                flag=column[3]
                interface=column[4]
            if(Cclass==columns):
                hop=column[2]
                flag=column[3]
                interface=column[4]
            elif(Bclass==columns):
                hop=column[2]
                flag=column[3]
                interface=column[4]
            elif(Aclass==columns):
                hop=columns[2]
                flag=column[3]
                interface=column[4]
    print ('Packet with destination address '+source+
    ' will be forwarded to '+hop+' out on interface '+interface) 
            
    

table=makeTable(data)
sendPackets(packets, table)
