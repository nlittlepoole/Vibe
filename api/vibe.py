import nltk
from nltk.collocations import *
from random import randrange
bigram_measures = nltk.collocations.BigramAssocMeasures()
import os
import sys

status=sys.argv[1]
direct='/root/nltk_data/corpora/webtext/'
path='output'+str(randrange(10000))+'.txt'
output=open(direct+path,'w')
output.write(status)
output.close()

# change this to read in your data
finder = BigramCollocationFinder.from_words(
   nltk.corpus.webtext.words(path))
ignored_words = nltk.corpus.stopwords.words('english')
english=[]
with open('adjectives.txt') as f:
    english = [line.rstrip() for line in f]
finder.apply_word_filter(lambda w: len(w) < 3 or w.lower() in ignored_words)
# only bigrams that appear 3+ times
finder.apply_freq_filter(1)

# return the 5 n-grams with the highest PMI
# or (w.lower not in english
test=finder.nbest(bigram_measures.pmi, 10)
test=[x for t in test for x in t]
test=[thing for thing in test if thing.lower() in english ]
for vibe in test:
  print vibe
os.remove(direct+path)