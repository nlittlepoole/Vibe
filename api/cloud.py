import wordcloud,sys, urllib2
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
cur.execute("SELECT Vibe, Score FROM Vibes WHERE UID = " + uid)
vibes = cur.fetchall()
db.close()

#Create paragraph of text for vibes
text = ''
for vibe in vibes:
	word = str(vibe[0])
	count = int(vibe[1])
	while count > 0:
		text = text + " "+ word
		count = count - 1
if text == '':
	text = "N/A"

# Separate into a list of (word, frequency).
words = wordcloud.process_text(text)
# Compute the position of the words.
elements = wordcloud.fit_words(words)
# Draw the positioned words to a PNG file.
wordcloud.draw(elements, '/var/www/niger/Vibe/view/cloud/' + uid + '.png')