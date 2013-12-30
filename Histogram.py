import MySQLdb
import time
db = MySQLdb.connect(host="127.0.0.1",
                     port=3306, # your host, usually localhost
                     user="Vibosphere", # your username
                     passwd="Carman4ever!", # your password
                     db="Vibosphere") # name of the data base

cur = db.cursor()
start_time = time.time()
cur.execute("SELECT Attribute FROM question") #python determines if there are any transactions to record
attributes = cur.fetchall()
#print attributes
for attribute in attributes:
    cur.execute("SELECT COUNT(id) FROM user")
    count= cur.fetchall()
    cur.execute("SELECT AVG(" +attribute[0]+"), STD("+attribute[0]+") FROM user WHERE "+attribute[0]+"_Total>0")
    stats=cur.fetchall()
    print stats
    avg=-1
    dev=-1
    if stats[0][0]:
        avg=stats[0][0]
    if stats[0][1]:
        dev=stats[0][1]
    cur.execute("SELECT * FROM global WHERE Attribute='"+attribute[0]+"'")
    exists=cur.fetchall()
    #print exists
    if exists:
        query="UPDATE global SET Average="+str(avg)+",Deviation="+str(dev) +" WHERE Attribute='"+attribute[0]+"'"
        #print query
        cur.execute(query)
        cur.connection.commit()
    else:
        query="INSERT INTO global (Attribute, Average, Deviation) VALUES ('"+attribute[0]+"',"+str(avg)+","+str(dev)+")"
        #print query
        cur.execute(query) 
        cur.connection.commit()
##cur.execute("SELECT COUNT(id) FROM user")
##query="ALTER TABLE transaction AUTO_INCREMENT = 1" #resets transaction tables id counter to 1
##cur.execute(query)
##cur.connection.commit()
db.close()
end_time = time.time()
print("Elapsed time was %g seconds" % (end_time - start_time))
