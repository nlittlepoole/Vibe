import MySQLdb
import difflib,sys
db = MySQLdb.connect(host="79afe5225f7fd454174526fe4108092758d4e751.rackspaceclouddb.com",
                     port=3306, # your host, usually localhost                                                                                                                                           \
                                                                                                                                                                                                          
                     user="nlittlepoole", # your username                                                                                                                                                \
                                                                                                                                                                                                          
                     passwd="Carman4ever!", # your password                                                                                                                                              \
                                                                                                                                                                                                          
                     db="VibeSocial") # name of the data base                                                                                                                                            \
                                                                                                                                                                                                          

keyword = sys.argv[1]
uid=sys.argv[2]
# Get all names similar to user                                                                                                                                                                           
cur = db.cursor()
cur.execute("SELECT Name,A.UID FROM( Users JOIN (SELECT  UID From Located WHERE LID IN (SELECT LID FROM Located WHERE UID = '" + uid+"'))A on Users.UID = A.UID);")
pairs = dict(cur.fetchall() )
names = pairs.keys()
matches = difflib.get_close_matches(keyword, names,n=100)
for match in matches:
        print match,'||', pairs[match]

