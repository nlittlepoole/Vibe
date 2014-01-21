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
query="UPDATE user SET fiveblockComrade = 0, fiveblockPal=0,fiveblockAdvocate=0,fiveblockComrade=0,fiveblockMotherTeresa=0"
cur.execute(query)
cur.connection.commit()
##cur.execute("SELECT COUNT(id) FROM user")
##query="ALTER TABLE transaction AUTO_INCREMENT = 1" #resets transaction tables id counter to 1
##cur.execute(query)
##cur.connection.commit()
db.close()
end_time = time.time()
print("Elapsed time was %g seconds" % (end_time - start_time))
