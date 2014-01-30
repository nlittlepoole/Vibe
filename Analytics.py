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
today = datetime.datetime.now()
cur.execute("SELECT Count(id),SUM(totalAnswers) FROM user") #python determines if there are any transactions to record
all = cur.fetchall()
profile=str(all[0][0]);
answers=str(all[0][1]);
cur.execute("SELECT Count(*) FROM user WHERE Active=1")
active = str(cur.fetchall()[0][0])
cur.execute("SELECT COUNT(*) FROM user WHERE DATE_SUB(CURDATE(),INTERVAL 30 MINUTE) <=STR_TO_DATE(LastLogin, '%Y-%m-%d %H:%i:%s')")
online=str(cur.fetchall()[0][0])
cur.execute("SELECT Count(*) FROM directory")
communities=str(cur.fetchall()[0][0])
cur.execute("SELECT Name,Users,UID FROM directory  ORDER BY Users DESC Limit 10")
lists=cur.fetchall()
largest=""
now=time.strftime("%Y-%m-%d %H:%M" )
print now
for community in lists:
    largest=largest+community[0]+"##"+community[2]+"##"+str(community[1])+"##"
query="INSERT INTO analytics (Active, Online,Community, Largest, Profile, Answers,Date) VALUES ('" + active + "','" +online+ "','"+communities+ "','" +largest+ "','"+profile+ "','"+answers+ "','"+now+"')"
cur.execute(query)
cur.connection.commit()
db.close()
end_time = time.time()
print("Elapsed time was %g seconds" % (end_time - start_time))
