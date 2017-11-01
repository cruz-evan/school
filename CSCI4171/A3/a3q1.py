#!/usr/bin/python
# Open the table file
with open('a3q1table.txt', 'r') as myfile:
    ports=myfile.readline().strip()
    data=myfile.read()

#open the packets file
with open('a3q1packets.txt', 'r') as myfile:
    packets=myfile.read()

#Puts the table file into a 2d array
def makeTable(tableString):
    table=[]
    table.append([])
    track=0
    listCount=0
    for data in tableString:
        if(track==0):
            table[listCount].append(data)
            track=1
        elif(track==1):
            track=2
        elif(track==2):
            table[listCount].append(data)
            table.append([])
            listCount=listCount+1
            track=3
        else:
            track=0
    return table

#A method to determine what the source, destination and arrival ports are 
def sendPackets(packetString, FDBtable):
    track=0
    listCount=0
    source=''
    dest=''
    portArrive=''
    for data in packetString:
        if(track==0):
            source=data
            track=1
        elif(track==1):
            track=2      
        elif(track==2):
            dest=data
            track=3
        elif(track==3):
            track=4
        elif(track==4):
            portArrive=data
            #gets the info on what will happen to a packet
            print packetMessage(source, dest, portArrive, FDBtable)
            track=5
        else:
            track=0

#A method to get the packet message 
def packetMessage(source, dest, port, FDBtable):
    portSource=''
    portDest=''
    #gets the individual info in the 2d FDBtable array
    for row, column in enumerate(FDBtable):
        for rows, columns in enumerate(column):
            #if the source is equal to the data set the port source to column[1] which is the port #
            if(source==columns):
                portSource=column[1]
            #if the destination is equal to the data set the port source to column[1]
            elif(dest==columns):
                portDest=column[1]
    #If the source port is equal to the destination port
    #the hosts are on the same side of the HUB, discard the frame
    if(portSource==portDest):
        return source+' '+dest+' '+port+' Packet discarded'
    #If the destination host is not in the table broadcast the frame 
    elif(portDest==''):
        return source+' '+dest+' '+port+' Frame broadcast on all out ports'
    #If the hosts are in the table send frame to the given destination port
    elif(portSource==port and portDest!=portSource):
        return source+' '+dest+' '+port+' Frame sent on port '+portDest
    #If the source host is not in the table and the destination is not cannot send
    elif(portSource=='' and portDest==''):
        return source+' '+dest+' '+port+' Frame could not be sent'
    #else if there is a new source host update the table with the port
    #Send on destination port
    else:
        table.append([source, port])
        return source+' '+dest+' '+port+' FDB updated; Frame sent on port '+portDest

table=makeTable(data)
sendPackets(packets, table)
