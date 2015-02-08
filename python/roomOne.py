import MFRC522


    


rid = "1"
high = 5
medium = 16
low = 18
lights = 12

members = []



def lightsOn(uID):
    global lightOn
    lightOn = True
    
    MFRC522.GPIO.output(lights,0)
    members.append(uID)

def lightsOff(uID):    
    global lightOn
    if uID in members:    
        members.remove(uID)
    if (len(members)>0):
        print "room still in use"
    else:
        MFRC522.GPIO.output(lights,1)
        lightOn = False

def lowOn():
    MFRC522.GPIO.output(low,0)
    print 'lowOn'

def lowOff():
    MFRC522.GPIO.output(low,1)

def mediumOn():
    MFRC522.GPIO.output(medium,0)
    print 'mediumOn'

def mediumOff():
    MFRC522.GPIO.output(medium,1)

def highOn():
    MFRC522.GPIO.output(high,0)
    print 'highOn'

def highOff():
    MFRC522.GPIO.output(high,1)

def allOn():
    lowOn()
    mediumOn()
    highOn()

def allOff():
    lowOff()
    mediumOff()
    highOff()

def cleanUp():
    MFRC522.GPIO.output(high,1)
    MFRC522.GPIO.output(medium,1)
    MFRC522.GPIO.output(low,1)
    MFRC522.GPIO.output(lights,1)

def ll():
    global lightOn
    return lightOn
