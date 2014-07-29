import MySQLdb

# connect to database
db = MySQLdb.connect(host="79afe5225f7fd454174526fe4108092758d4e751.rackspaceclouddb.com",
                     port=3306, # your host, usually localhost
                     user="nlittlepoole", # your username
                     passwd="Carman4ever!", # your password
                     db="VibeSocial") # name of the data base
# Get user ID from argument
uid = sys.argv[1]

# Grab vibes for user
cur = db.cursor()
cur.execute("SELECT FROM Posts WHERE Type = 'Master' AND Timestamp < (NOW() - INTERVAL 1 DAY);")
pids= cur.fetchall()
for pid in pids:
	sql = "DELETE FROM Posts WHERE PID=' " +pid + "' ;"
	cur.execute( sql )
db.close()
