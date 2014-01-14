
import MySQLdb
import time

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
start_time = time.time()
while count[0][0] != 0:
    #print count[0][0]
    cur.execute("SELECT * FROM transaction LIMIT 1")
    row = cur.fetchall() 
    #print row
    user1=row[0][1]
    #print user1
    user2=row[0][2]
    #print user2
    name=row[0][3]
    attribute=row[0][4]
    #print attribute
    score=row[0][5]
    modifier=0
    query="SELECT * FROM user WHERE UID=" + user2
    cur.execute(query)
    exists=cur.fetchall()
    if score:
        score=float(row[0][5])
    else:
        if exists:
            query="SELECT " +attribute + " FROM user WHERE UID=" + user2
            cur.execute(query)
            raw=cur.fetchall()
            score=float(raw[0][0])
        else:
            score=0
            modifier=1   
    #print exists
    #print score
    comment=row[0][6]
    #print comment
    keyword=row[0][7]
    newKeyword=""
    #print keyword

    query="UPDATE user SET Points=Points + 1 WHERE UID="+ user1
    cur.execute(query)
    cur.connection.commit()
    
    affiliation=row[0][8]
    gender=row[0][9]
    affiliations=affiliation.split('&&')
    for affiliate in affiliations:
        data=affiliate.split('||')
        if len(data[0])>1 and len(data[1])>1:
            query="SELECT COUNT(1) FROM communities WHERE UID='" + (data[1]) + "'"
            cur.execute(query)
            exist=cur.fetchall()
            if exist[0][0]>0:
                #print "exists"
                query="SELECT Average,Sum,Keywords FROM `"+data[1] +"` WHERE Attribute= '" + attribute + "';"
                cur.execute(query)
                old=cur.fetchall()
                communityKeyword=old[0][2]
                newcommunityKeyword=""
                if ((not "null" in keyword) and (communityKeyword)) and (keyword in communityKeyword):
                    communityKeywords=communityKeyword.split('&&')
                    found=False
                    for element in communityKeywords:
                        if keyword in element:
                            temp=element.split("(")
                            tmp=int(temp[0])+1
                            newcommunityKeyword=str(tmp)+"("+temp[1]+"&&"+newcommunityKeyword
                        else:
                            newcommunityKeyword=element+"&&" +newKeyword
                    newKeyword=newKeyword[:-2]
                elif not "null" in keyword:
                    newcommunityKeyword="1"+keyword
                else:
                    newcommunityKeyword=communityKeyword
                query="UPDATE `" + data[1] + "` SET Keywords='" +newcommunityKeyword+"' WHERE Attribute='"+ attribute + "';"
                cur.execute(query)
                cur.connection.commit()
            else:
                query="INSERT INTO communities (UID, Name, Picture) VALUES ('"+data[1] +"','" + data[0]+"','http://graph.facebook.com/"+data[1]+"/picture?width=600&height=600')"
                cur.execute(query)
                cur.connection.commit()
                query="CREATE TABLE IF NOT EXISTS `"+ data[1]+"` (  `ID` int(10) NOT NULL AUTO_INCREMENT,  `Attribute` varchar(255) NOT NULL,  `Keywords` varchar(255) NOT NULL,  `Average` float NOT NULL DEFAULT '0',  `Sum` int(10) NOT NULL DEFAULT '0',  `Squares` int(10) NOT NULL DEFAULT '0',  `Deviation` int(10) NOT NULL DEFAULT '0',  `Rank1` varchar(255) NOT NULL,  `Rank2` varchar(255) NOT NULL,  `Rank3` varchar(255) NOT NULL,  `Rank4` varchar(255) NOT NULL,  `Rank5` varchar(255) NOT NULL,  `Rank6` varchar(255) NOT NULL,  `Rank7` varchar(255) NOT NULL,  `Rank8` varchar(255) NOT NULL,  `Rank9` varchar(255) NOT NULL,  `Rank10` varchar(255) NOT NULL,  PRIMARY KEY (`ID`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;"
                cur.execute(query)
                cur.connection.commit()
                query= "INSERT INTO `" + data[1] + "`(`ID`, `Attribute`, `Keywords`, `Average`, `Sum`, `Squares`, `Deviation`, `Rank1`, `Rank2`, `Rank3`, `Rank4`, `Rank5`, `Rank6`, `Rank7`, `Rank8`, `Rank9`, `Rank10`) VALUES(1, 'Attractiveness', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(2, 'Affability', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(3, 'Intelligence', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(4, 'Style', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(5, 'Promiscuity', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(6, 'Humor', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(7, 'Confidence', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(8, 'Fun', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(9, 'Kindness', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(10, 'Honesty', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(11, 'Reliability', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(12, 'Happiness', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(13, 'Ambition', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', ''),(14, 'Humility', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '');"
                #print query
                cur.execute(query)
                cur.connection.commit()
                query="SELECT Average,Sum FROM `"+data[1] +"` WHERE Attribute= '" + attribute + "';"
                cur.execute(query)
                old=cur.fetchall()
                if not "null" in keyword:
                    query="UPDATE `" +data[1] + "` SET Keywords='" +str(1)+ keyword+"' WHERE Attribute='"+ attribute + "';"
                cur.execute(query)
                cur.connection.commit()
    if exists:
        query="SELECT " +attribute + ","+ attribute+"_Total,"+ attribute+"_Keywords,Comments FROM user WHERE UID=" + user2
        cur.execute(query)
        raw=cur.fetchall()
        previous_score=float(raw[0][0])
        previous_comment=raw[0][3]
        total=int(raw[0][1])
        previousKeyword=raw[0][2]
        if ((not "null" in keyword) and (previousKeyword)) and (keyword in previousKeyword):
            previousKeywords=previousKeyword.split('&&')
            found=False
            for element in previousKeywords:
                if keyword in element:
                    temp=element.split("(")
                    tmp=int(temp[0])+1
                    newKeyword=str(tmp)+"("+temp[1]+"&&"+newKeyword
                else:
                    newKeyword=element+"&&" +newKeyword
            newKeyword=newKeyword[:-2]
        elif not "null" in keyword:
            newKeyword="1"+keyword
        else:
            newKeyword=previousKeyword
        #print previous_scor
        #Sets the previous score to the same score as the input if the user has never had an answer for this before
        #essentially makes the input score weighted against itself
        previous_list=previous_comment.split('&&')
        #print previous_list
        if len(comment)>1:
            if len(previous_comment) >1:
                if len(previous_list)<9:
                    mtemp=len(previous_list)
                else:
                    mtemp=9
                temp=0;
                while temp<mtemp:
                    comment=comment +'&&' + previous_list[temp]
                    temp=temp+1
        else:
            comment=previous_comment
        if total+1-modifier>0:
            score=(score+(previous_score*total))/(total+1-modifier)
        score="%.2f" % score
        score=str(score)
        #print score
        if newKeyword:
            query="UPDATE user SET " + attribute + "=" +""+ score+ " , " + attribute + "_Total="+attribute+"_Total + 1-"+str(modifier)+" ," +attribute + "_Keywords='" +newKeyword + "',Comments='"+comment+"', Gender='"+gender+"' WHERE UID="+ user2
        #print query
        else:
            query="UPDATE user SET " + attribute + "=" +""+ score+ " , " + attribute + "_Total="+attribute+"_Total + 1-"+str(modifier)+",Comments='"+comment+"', Gender='"+gender+"' WHERE UID="+ user2
        cur.execute(query)
        cur.connection.commit()
    else:
        if not "null" in keyword:
            keyword="1"+keyword
        query="INSERT INTO user (UID, ACTIVE, " + attribute + "," + attribute + "_Total ," + attribute+ "_Keywords,Comments,Communities,Gender,Name) VALUES (" + user2 + ",0,"+ str(score)+","+str(1-modifier)+", '"+keyword+"','"+comment+"','"+affiliation+"','"+gender+"','"+name+"')"
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
end_time = time.time()
print("Elapsed time was %g seconds" % (end_time - start_time))
