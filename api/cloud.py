import wordcloud,sys, urllib2


uid=sys.argv[1]

# Read the whole text.
text="This is a super important test of our cloud functionality using a test way of doing a thing in our cloud"
# Separate into a list of (word, frequency).
words = wordcloud.process_text(text)
# Compute the position of the words.
elements = wordcloud.fit_words(words)
# Draw the positioned words to a PNG file.
wordcloud.draw(elements, '/var/www/niger/Vibe/view/cloud/'+uid+'.png')