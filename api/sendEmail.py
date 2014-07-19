import MySQLdb
import smtplib
import sys
import string
server = smtplib.SMTP('smtp.gmail.com:587')
server.ehlo()
server.starttls()
server.login("govibellc@gmail.com","Carman4ever!") 

email=sys.argv[1]
uid=sys.argv[2]
status=sys.argv[3]
#print 'Content-Type: text/plain'
#print
HOST = "smtp.secureserver.net"
FROM= "notify@go-vibe.com"
TO= email
SUBJECT = "You've got Vibes!"
BODY = "Hey, Someone has posted about you on vibe \n They said: "+status + "\n go to http://api.go-vibe.com/index.php?ref="+uid +" to see more"
body = string.join((
    "From: %s" % FROM,
    "To: %s" % TO,
    "Subject: %s" % SUBJECT,
    "",
    BODY), "\r\n")
print body
server.sendmail(FROM, [TO], body)
server.quit()

