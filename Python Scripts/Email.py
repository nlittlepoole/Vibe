import MySQLdb
import time
import datetime
import smtplib
import string, sys
import cgitb
db = MySQLdb.connect(host="127.0.0.1",
                     port=3306, # your host, usually localhost
                     user="Vibosphere", # your username
                     passwd="Carman4ever!", # your password
                     db="Vibosphere") # name of the data base

cur = db.cursor()
start_time = time.time()
sys.stderr = sys.stdout 
query="SELECT Name,Email,newAnswers FROM user WHERE newAnswers>0 AND nullif(Email,'') IS NOT NULL;"
cur.execute(query) #python determines if there are any transactions to record
data=cur.fetchall()
db.close()
print data
for person in data:
	server = smtplib.SMTP('smtp.gmail.com:587')
	server.ehlo()
	server.starttls()
	server.login("govibellc@gmail.com","Carman4ever!") 
	name=person[0]
	email=person[1]
	newAnswers=person[2]
	#print 'Content-Type: text/plain'
	#print
	HOST = "smtp.secureserver.net"
	FROM= "info@go-vibe.com"
	TO= email
	SUBJECT = "You've got Vibes!"
	BODY = "Hey "+name+" , you have " + str(newAnswers) + " new answers about you!"
	body = string.join((
	    "From: %s" % FROM,
	    "To: %s" % TO,
	    "Subject: %s" % SUBJECT,
	    "",
	    BODY), "\r\n")
	print body
	server.sendmail(FROM, [TO], body)
	server.quit()
end_time = time.time()
print("Elapsed time was %g seconds" % (end_time - start_time))
