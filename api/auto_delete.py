import MySQLdb

# connect to database                                                                                                                                                                                     
db = MySQLdb.connect(host="79afe5225f7fd454174526fe4108092758d4e751.rackspaceclouddb.com",
                     port=3306, # your host, usually localhost                                                                                                                                            
                     user="nlittlepoole", # your username                                                                                                                                                 
                     passwd="Carman4ever!", # your password                                                                                                                                               
                     db="VibeSocial") # name of the data base                                                                                                                                             

# Get all the expired Posts
cur = db.cursor()
cur.execute("SELECT PID FROM Posts WHERE Type = 'Master' AND Timestamp < (NOW() - INTERVAL 3 DAY);")
pids = cur.fetchall()

# Delete Posts and their comments
for pid in pids:
        sql = "DELETE FROM Posts WHERE PID='" +pid[0] + "' ;"
        cur.execute( sql )
        cur.connection.commit()
db.close()

