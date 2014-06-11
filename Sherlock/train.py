import csv
import sys
from random import randrange
file=open(sys.argv[1],'rb')
reader=csv.reader(file)
vibes={}
for post in reader:
    row=[]
    input=''
    if ":" in post[0]:
        row.append(post[0].split(":")[1].strip())
    else:
        row.append(post[0])
    print post
    while input!='n':
        input=raw_input('Vibes:')
        if input!='n':
            row.append(input)
        if vibes.has_key(input):
            vibes[input]=vibes[input]+1
        else:
             vibes[input]=1
    print row
    with open("training.csv", "a") as f:
        writer = csv.writer(f)
        writer.writerow(row)
    f.close()
    with open("vibes.csv", "a") as f:
        writer = csv.writer(f)
        for key, value in vibes.items():
            writer.writerow([key, value])
    f.close()
file.close()