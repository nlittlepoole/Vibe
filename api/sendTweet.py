import tweepy, sys
import requests
import simplejson as json

tweet = str(sys.argv[3])
url = str(sys.argv[2])
user = str(sys.argv[1])
#enter the corresponding information from your Twitter application:
ACCESS_KEY = '2658347198-pA2na530L78WvwSAfpXfUkhOfInmxUIePf5qsc3'#keep the quotes, replace this with your consumer key
ACCESS_SECRET = 'vPNdOPZnXsU9Vl5tJ3YFpqr30vtVIhkUfYdim587nDBMP'#keep the quotes, replace this with your consumer secret key
CONSUMER_KEY = 't6k0VxPwu6RFoUBMr3r7nxRCT'#keep the quotes, replace this with your access token
CONSUMER_SECRET = 'bjX8wtT1ubxJDWH0q2oFoZnhUJcCBJqyicHChtGpHENEqX9JfZ'#keep the quotes, replace this with your access token secret
auth = tweepy.OAuthHandler(CONSUMER_KEY, CONSUMER_SECRET)
auth.set_access_token(ACCESS_KEY, ACCESS_SECRET)

# Shorten URL
gUrl = 'https://www.googleapis.com/urlshortener/v1/url?fields=id'
data = json.dumps({'longUrl': url})
r = requests.post(gUrl, data, headers={'Content-Type': 'application/json'})
url = json.loads( r.text).get('id').replace('http://','')

# Trim and combine tweet
cut=128 - len(user) - len(url )
tweet = user + " " + tweet[0:cut] + "... " +url

#print tweet
api = tweepy.API(auth)
api.update_status(tweet)