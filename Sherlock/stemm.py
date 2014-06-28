import sys
import csv
import vibe
file=open(sys.argv[1],'rb')
reader=csv.reader(file)
vibes={}
for post in reader:
    print post[0]
    temp=vibe.getVibes(post[0])
    for thing in temp:
        vibes[thing]=1
    print temp
file.close()
f = open('vibes.txt','w')
for word in vibes.keys():
    f.write(word+'\n')
f.close()
