import nltk
from nltk.collocations import *
bigram_measures = nltk.collocations.BigramAssocMeasures()

# change this to read in your data
finder = BigramCollocationFinder.from_words(
   nltk.corpus.webtext.words('test copy.txt'))
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
print test
test=[x for t in test for x in t]
test=[thing for thing in test if thing.lower() in english ]
print test