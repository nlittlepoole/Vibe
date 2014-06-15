import csv
import sys
import re
from stemming.porter2 import stem
import difflib
stemmed=''
#start replaceTwoOrMore
def replaceTwoOrMore(s):
    #look for 2 or more repetitions of character and replace with the character itself
    pattern = re.compile(r"(.)\1{1,}", re.DOTALL)
    return pattern.sub(r"\1\1", s)
#end

#start getStopWordList
def getStopWordList(stopWordListFileName):
    #read the stopwords file and build a list
    stopWords = []
    stopWords.append('AT_USER')
    stopWords.append('URL')

    fp = open(stopWordListFileName, 'r')
    line = fp.readline()
    while line:
        word = line.strip()
        stopWords.append(word)
        line = fp.readline()
    fp.close()
    return stopWords
#end
def processStatus(status):
    # process the statuss

    #Convert to lower case
    status = status.lower()
    #Convert www.* or https?://* to URL
    status = re.sub('((www\.[\s]+)|(https?://[^\s]+))','URL',status)
    #Convert @username to AT_USER
    status = re.sub('@[^\s]+','AT_USER',status)
    #Remove additional white spaces
    status = re.sub('[\s]+', ' ', status)
    #Replace #word with word
    status = re.sub(r'#([^\s]+)', r'\1', status)
    #Take out punctuation
    status=status.replace('.','')
    status=status.replace(',','')
    status=status.replace('!','')
    status=status.replace('?','')
    #trim
    status = status.strip('\'"')
    return status
#end
def vibeList():
    list=[]
    with open('adjectives.txt') as f:
        list = [line.rstrip() for line in f]
    f.close()
    return list
#end
def englishList():
    list=[]
    with open('wordlist.txt') as f:
        list = [line.rstrip() for line in f]
    f.close()
    return list
#end
def vibeDistance(word,a):
    if(a in word):
        return abs(len(stemmed)-len(word))
    else:
        return -1
def getVibe(word):
    stemmed=stem(word)
    words=vibeList()
    results=difflib.get_close_matches(stemmed, words,n=5,cutoff=.82)
    results=sorted([a for a in results if vibeDistance(a,stemmed)>=0],key=lambda x:vibeDistance(x,stemmed))
    if len(results)>0:
        return results[0]
    else:
        return ''
def getVibes(status):
    status=processStatus(status)
    stop=getStopWordList("stop.txt")
    list=englishList()
    map=vibeList()
    words=status.split(' ')
    vibes=[]
    for word in words:
        word=replaceTwoOrMore(word)
        if word in list and word not in stop:
            if word in map:
                vibe=word
            else:
                vibe=getVibe(word)
            if vibe!='':
                vibes.append(vibe)
    return vibes
if __name__ == '__main__':
    vibes= getVibes(sys.argv[1])
    for vibe in vibes:
        print vibe
