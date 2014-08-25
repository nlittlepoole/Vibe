import wordcloud,sys, urllib2
import MySQLdb

# connect to database
db = MySQLdb.connect(host="79afe5225f7fd454174526fe4108092758d4e751.rackspaceclouddb.com",
                     port=3306, # your host, usually localhost
                     user="nlittlepoole", # your username
                     passwd="Carman4ever!", # your password
                     db="VibeSocial") # name of the data base

# get UID (from argument)
uid = sys.argv[1]

# return all Vibes and scores for that user
cur = db.cursor()
cur.execute("SELECT Vibe, Score FROM Vibes WHERE UID = " + uid)
vibes = cur.fetchall()
db.close()

# grab all the pairs and create paragraph out of them
text = ''
for vibe in vibes:
	word = str(vibe[0])
	count = int(vibe[1])

	# paragraph implementation
	while count > 0:
		text = text + " "+ word
		count = count - 1
if text == '':
	text = "N/A"

# separate into a list of words and frequencies
words = wordcloud.process_text(text)

# compute positions of words
elements = wordcloud.fit_words(words)

# draw the positioned words to a PNG file
wordcloud.draw(elements, '/var/www/api/Vibe/view/cloud/' + uid + '.png')