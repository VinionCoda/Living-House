#!/usr/bin/python

import MFRC522
import signal
import MySQLdb,roomOne, datetime,time
from collections import Counter

db = MySQLdb.connect("localhost","root","belabour","belabour")
sql = db.cursor()

continue_reading = True
MIFAREReader = MFRC522.MFRC522()



lightOn = False

try:
    log = open("log.txt","a")
except IOError, err:
    print "["+localtime+"]: "+ err
except:
    print "["+localtime+"]: Unknown error"



now = datetime.datetime.now()
day = now.strftime("%d")
localtime = now.strftime("%Y-%m-%d %H:%M")

def intellisence():
    
    active_hours = avgUse(datetime.datetime.now().strftime("%d"))
    if active_hours <= int(datetime.datetime.now().strftime("%H")) :
         roomOne.mediumOn()
         roomOne.lightsOn()
    if low_hours >= avgUse(datetime.datetime.now().strftime("%d")):
        roomOne.lightsOff()
        roomOne.mediumOff()
    

def logInsert(uid,time,day,status):
    try:
        statement = "INSERT INTO userlog (userID,date,day,status) VALUES ('"+uid+"'','"+time+"',"+day+",'"+status+"')"
        sql.execute(statement)
        db.commit()
    except MySQLdb.DatabaseError, err:
        log.write("["+localtime+"]: "+err+"\n")
        db.rollback


def readUserPermission(uid):
    statement = "SELECT accessType FROM user  WHERE userID= '"+uid+"'"
    sql.execute(statement)
    result = sql.fetchone()
    result=result[0]
    print result
    if result == 'high':
        roomOne.allOn()
    elif result == 'medium':
        roomOne.mediumOn()
        roomOne.lowOn()
    else:
        roomOne.lowOn()

def offPermission(uid):
    statement = "SELECT accessType FROM user  WHERE userID= '"+uid+"'"
    sql.execute(statement)
    result = sql.fetchone()
    result=result[0]
    print result
    if result == 'high':
        roomOne.allOff()
    elif result == 'medium':
        roomOne.mediumOn()
        roomOne.lowOff()
    

def avgUse(day,uID=None):
    if uID is None:
        #decision on user based hours frequency
        query = "select date from userlog where day ="+str(day)+" and userId ='"+str(uID)+"'"
        sql.execute(query)
        results = sql.fetchall()

        data = Counter(results)     
        data.most_common()                  #mode of times dicionary
        row = data.keys()           
        date_time = row[0]                  #tuple of date time objects
        return date_time[0].time()          #datetme string
    else:
        #decision general hours frequency
        query = "select date from userlog"
        sql.execute(query)
        results = sql.fetchall()

        data = Counter(results)     
        data.most_common()                  #mode of times dicionary
        row = data.keys()           
        date_time = row[0]                  #tuple of date time objects
        return date_time[0].time()          #datetme string

def lowUse(day,uID=None):

    #decision low hours frequency
    query = "select date from userlog where day="+str(day)+" and status = 'exit'"
    sql.execute(query)
    results = sql.fetchall()

    data = Counter(results)     
    data.most_common()                  #mode of times dicionary
    row = data.keys()           
    date_time = row[0]                  #tuple of date time objects
    return date_time[0].time()          #datetme string

def endRead(signal, frame):            #ends program keyboardinterupt (ctrl+c)
  global continue_reading
  continue_reading = False
  log.close()
  print "Ctrl+C captured, ending read."
  MIFAREReader.GPIO_CLEEN()

def decision(time):
    if time.hour <= datetime.datetime.now().time().hour:
        roomOne.lowOn()



#keyboard terminate (crlt+c)   
signal.signal(signal.SIGINT, endRead)

while continue_reading:

    now = datetime.datetime.now()
    day = now.strftime("%d")
    localtime = now.strftime("%Y-%m-%d %H:%M")

    #PREDICTIVE USAGE
    
    intellisence()

    #card reading
    (status,TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)
    
    if status == MIFAREReader.MI_OK:
        print "Card detected"
        (status,backData) = MIFAREReader.MFRC522_Anticoll()
        
    if status == MIFAREReader.MI_OK:
        uID = str(backData[0])+""+str(backData[1])+""+str(backData[2])+""+str(backData[3])+""+str(backData[4])
        print str(backData)
    
        
        #lghts activity and permissions
        if lightOn == False:
            roomOne.lightsOn(uID)
            print "lights on "+str(lightOn)
            print "members: "+str(roomOne.members)
            logInsert(str(uID),localtime,day,'enter')       #database log update
            readUserPermission(uid)
            
        elif uID in roomOne.members:
            roomOne.members.remove(uID)
            print "you exited the room"
            print "members: "+str(roomOne.members)
            logInsert(str(uID),localtime,day,'exit')       #database log update
            offPermission()
            
            if len(roomOne.members)==0:
                time.sleep(2)
                roomOne.lightsOff(uID)
                print "lights off"
                print "members: "+str(roomOne.members)
                roomOne.off()
                
        elif len(roomOne.members)>0:
            print "someone is in this room"
            roomOne.members.append(uID)
            print "members: "+str(roomOne.members)
            readUserPermission(uid)
            
        elif lightOn == True:
            roomOne.lightsOff(uID)
            print "lights off"
            print "members: "+str(roomOne.members)

    
        
        lightOn = roomOne.ll()                              #refresh light status    
        log.write("["+localtime+"]: "+str(uID)+"\n")        #log file update
    
        print str(uID)+ ": ave time of use: "+ str(avgUse(day,uID)) #console status
        decision(avgUse(day,uID))

        
