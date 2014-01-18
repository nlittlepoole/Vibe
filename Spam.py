import MySQLdb
import time
import datetime
db = MySQLdb.connect(host="127.0.0.1",
                     port=3306, # your host, usually localhost
                     user="Vibosphere", # your username
                     passwd="Carman4ever!", # your password
                     db="Vibosphere") # name of the data base

cur = db.cursor()
start_time = time.time()
cur.execute("SELECT Spam,Disable,UID FROM user WHERE Spam IS NOT NULL") #python determines if there are any transactions to record
data = cur.fetchall()
for person in data:
    print person[1]
    if person[1]:
        disabled=datetime.datetime.strptime(person[1], "%Y-%m-%d")
        today = datetime.datetime.now()
        diff=(today-disabled).days
        if diff>15:
            query="UPDATE user SET Disable='', Spam='' WHERE UID='"+person[2]+"'"
            cur.execute(query)
            cur.connection.commit()
    else:
        spam=(person[0]).split('##')
        if(len(spam)>5):
            now=time.strftime("%Y-%m-%d")
            query="UPDATE user SET Disable='"+now+"' WHERE UID='"+person[2]+"'"
            cur.execute(query)
            cur.connection.commit()
##cur.execute("SELECT COUNT(id) FROM user")
##query="ALTER TABLE transaction AUTO_INCREMENT = 1" #resets transaction tables id counter to 1
##cur.execute(query)
##cur.connection.commit()
db.close()
end_time = time.time()
print("Elapsed time was %g seconds" % (end_time - start_time))
