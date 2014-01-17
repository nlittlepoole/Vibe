import MySQLdb
import time
db = MySQLdb.connect(host="127.0.0.1",
                     port=3306, # your host, usually localhost
                     user="Vibosphere", # your username
                     passwd="Carman4ever!", # your password
                     db="Vibosphere") # name of the data base

cur = db.cursor()
start_time = time.time()
cur.execute("SELECT * FROM communities") 
communities = cur.fetchall()
for community in communities:
    query="SELECT Count(*) FROM `user` WHERE `Communities` LIKE '%"+community[1]+ "%'"
    cur.execute(query)
    count=cur.fetchall()[0][0]
    if count>10:
        query="SELECT * FROM directory WHERE UID='"+community[1]+"'"
        cur.execute(query)
        if not cur.fetchall():
            query="INSERT INTO directory (UID, Name, Picture,Users) VALUES ('"+community[1] +"','"+community[2]+"','"+community[3]+"',"+str(count)+")"
            cur.execute(query)
            cur.connection.commit()
        else:
            query="UPDATE directory SET Users="+str(count)
            cur.execute(query)
            cur.connection.commit()
cur.execute("SELECT * FROM directory") 
communities = cur.fetchall()
for community in communities:
    cur.execute("SELECT Attribute FROM question") #python determines if there are any transactions to record
    attributes = cur.fetchall()
    for attribute in attributes:
        query=""
        cur.execute("SELECT AVG(" +attribute[0]+"), STD("+attribute[0]+") FROM user WHERE "+attribute[0]+"_Total>0 AND `Communities` LIKE '%"+community[2]+ "%'")
        stats=cur.fetchall()
        #print stats
        avg=-1
        dev=-1
        if stats[0][0]:
            avg=stats[0][0]
            avg="%.2f" % avg
        if stats[0][1]:
            dev=stats[0][1]
            dev="%.2f" % dev

        
        query="SELECT Name,UID FROM  `user` WHERE  `Communities` LIKE  '%"+community[1]+"%' AND Gender='male'  ORDER BY "+attribute[0]+"*("+attribute[0]+"_Total/("+attribute[0]+"_Total+5)) +"+str(avg) +"*(5/("+attribute[0]+"_Total+5))  DESC LIMIT 5"
        #print query
        cur.execute(query)
        leaders=cur.fetchall()
        boys=",Rank1='N/A',Rank2='N/A',Rank3='N/A',Rank4='N/A',Rank5='N/A'"
        now=time.strftime("%Y-%m-%d")
        if len(leaders)==5:
            boys=""
            count=1
            query="UPDATE `user` SET KingOfTheHill_progress=10, lastdateKingOfTheHill='"+now+"' WHERE UID='"+leaders[0][1]+"'"
            cur.execute(query)
            cur.connection.commit()
            for leader in leaders:
                boys=boys+",Rank"+str(count)+"='"+str(leader[0])+"'"
                query="UPDATE `user` SET Diva_progress=10 , lastdateDiva='"+now+"' WHERE UID='"+leader[1]+"'"
                #print query
                cur.execute(query)
                cur.connection.commit()
                count=count+1
        query="SELECT Name,UID FROM  `user` WHERE  `Communities` LIKE  '%"+community[1]+"%' AND Gender='female'  ORDER BY "+attribute[0]+"*("+attribute[0]+"_Total/("+attribute[0]+"_Total+5)) +"+str(avg) +"*(5/("+attribute[0]+"_Total+5))  DESC LIMIT 5"
        cur.execute(query)
        leaders=cur.fetchall()
        girls=",Rank6='N/A',Rank7='N/A',Rank8='N/A',Rank9='N/A',Rank10='N/A'"
        if len(leaders)==5:
            girls=""
            count=6
            query="UPDATE `user` SET KingOfTheHill_progress=10, lastdateDiva='"+now+"' WHERE UID='"+leaders[0][1]+"'"
            cur.execute(query)
            cur.connection.commit()
            for leader in leaders:
                boys=boys+",Rank"+str(count)+"='"+str(leader[0])+"'"
                query="UPDATE `user` SET Diva_progress=10 , lastdateKingOfTheHill='"+now+"' WHERE UID='"+leader[1]+"'"
                cur.execute(query)
                cur.connection.commit()
                count=count+1
        boys=boys+girls
        query="UPDATE `"+community[1]+"` SET Average="+str(avg)+",Deviation="+str(dev) + boys+" WHERE Attribute='"+attribute[0]+"'"
        cur.execute(query)
        cur.connection.commit()
        #query="SELECT UID FROM  `user` WHERE  `Communities` LIKE  '%Columbia University%' ORDER BY Attractiveness DESC LIMIT 5"
db.close()
end_time = time.time()
print("Elapsed time was %g seconds" % (end_time - start_time))
