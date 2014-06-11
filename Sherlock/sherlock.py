import csv,sys
import simplejson as json
import urllib

file=open("adjectives.txt",'rb')
vibes=[line.rstrip() for line in file]
file.close()
def getSyn(word,sign=1):
    url="http://words.bighugelabs.com/api/2/1ea761789266585f30e244621401f222/"+word+"/json"
    test=urllib.urlopen(url).read()
    data=json.loads(test)
    for key, value in data.items():
        if sign>0:
            result=[]
            if "rel" in value.keys():
                result.extend( value['rel'])
            if "syn" in value.keys():
                result.extend( value['syn'])
            return result
        else:
            if "ant" in value.keys():
                return value['ant']
            else:
                return []
def getVibe(word_list):
    i=0
    while i<len(word_list):
        matches=[]
        result=getSyn(word_list[i])
        for word in result:
            print word
            if word in vibes:
                matches.append(word)
            else:
                word_list.append(word)
        if len(matches)>0:
            return matches
        i=i+1
        print i
    return []
print getVibe(["hot","pretty","nice"])