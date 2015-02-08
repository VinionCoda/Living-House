import MFRC522,sys,MySQLdb

db = MySQLdb.connect("localhost","root","belabour","test2")
sql = db.cursor()

MIFAREReader = MFRC522.MFRC522()
reading = True

name= sys.argsv[1]

while reading:
    
    (status,TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)
    if status == MIFAREReader.MI_OK:
        print 'newCard'
        (status,backData) = MIFAREReader.MFRC522_Anticoll()
    if status == MIFAREReader.MI_OK:
        uID = str(backData[0])+""+str(backData[1])+""+str(backData[2])+""+str(backData[3])+""+str(backData[4])
        reading = False
        MIFAREReader.GPIO_CLEEN()
       try:
            statement = "UPDATE user SET userID ="+uID+" WHERE name ="+name
            sql.execute(statement)
            db.commit()
        except MySQLdb.DatabaseError, err:
            log.write("["+localtime+"]: "+err+"\n")
            db.rollback 
         
