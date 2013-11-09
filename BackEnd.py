
import MySQLdb

db = MySQLdb.connect(host="127.0.0.1",
                     port=3306, # your host, usually localhost
                     user="Vibosphere", # your username
                     passwd="Carman4ever!", # your password
                     db="Vibosphere") # name of the data base

# you must create a Cursor object. It will let
#  you execute all the query you need
cur = db.cursor() 

# Use all the SQL you like
cur.execute("SELECT COUNT(id) FROM transaction") #python determines if there are any transactions to record
count = cur.fetchall() 

while count[0][0] != 0:
    print count[0][0]
    cur.execute("SELECT * FROM transaction LIMIT 1")
    row = cur.fetchall() 
    #print row
    user1=row[0][1]
    #print user1
    user2=row[0][2]
    #print user2
    attribute=row[0][3]
    #print attribute
    score=float(row[0][4])
    #print score
    comment=row[0][5]
    #print comment
    query="SELECT * FROM user WHERE UID=" + user2
    cur.execute(query)
    exists=cur.fetchall()
    #print exists
    if exists:
        query="SELECT " +attribute + ","+ attribute+"_Total FROM user WHERE UID=" + user2
        cur.execute(query)
        raw=cur.fetchall()
        previous= raw[0][0]
        #print previous
        previous_score=0
        previous_comment=''
        total=int(raw[0][1])
        #print previous_score
        
        #Sets the previous score to the same score as the input if the user has never had an answer for this before
        #essentially makes the input score weighted against itself

        if previous is None:
            previous_score=float(0)
            #print previous_score
        else:
            previous_list=previous.split('&&')
            #print previous_list
            previous_score=float(previous_list[0])
            previous_list.pop(0)
            for comments in previous_list:
                previous_comment=comments +'&&' + previous_comment
            comment=previous_comment+comment
        score=(score+(previous_score*total))/(total+1)
        score="%.2f" % score
        score=str(score)+'&&'+str(comment)
        #print score

        query="UPDATE user SET " + attribute + "=" +"'"+ score+ "' , " + attribute + "_Total="+attribute+"_Total + 1 WHERE UID="+ user2
        #print query
        cur.execute(query)
        cur.connection.commit()
    else:
        score=str(score);
        query="INSERT INTO user (UID, ACTIVE, " + attribute + "," + attribute + "_Total) VALUES (" + user2 + ",0," +"'"+ score+'&&'+comment +"',1)"
        print query
        cur.execute(query)
        cur.connection.commit()
        
    cur.execute("DELETE FROM transaction LIMIT 1")#deletes transaction now that it is recorded
    cur.connection.commit()
    cur.execute("SELECT COUNT(id) FROM transaction") #python determines if there are any transactions to record
    count = cur.fetchall()
    exists=None;


    
query="ALTER TABLE transaction AUTO_INCREMENT = 1" #resets transaction tables id counter to 1
cur.execute(query)
cur.connection.commit()
db.close()
