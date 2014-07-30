# this sends out a tweet notification if the person provided a twitter handle

import tweepy, sys
import requests
import simplejson as json

user = str(sys.argv[1])
url = str(sys.argv[2])
tweet = str(sys.argv[3])

# enter corresponding info from twitter app
ACCESS_KEY = '2658347198-pA2na530L78WvwSAfpXfUkhOfInmxUIePf5qsc3'		# consumer key
ACCESS_SECRET = 'vPNdOPZnXsU9Vl5tJ3YFpqr30vtVIhkUfYdim587nDBMP' 		# consumer secret key
CONSUMER_KEY = 't6k0VxPwu6RFoUBMr3r7nxRCT' 								# access token
CONSUMER_SECRET = 'bjX8wtT1ubxJDWH0q2oFoZnhUJcCBJqyicHChtGpHENEqX9JfZ' 	# access token secret

auth = tweepy.OAuthHandler(CONSUMER_KEY, CONSUMER_SECRET)
auth.set_access_token(ACCESS_KEY, ACCESS_SECRET)

# shorten URL
gUrl 	= 'https://www.googleapis.com/urlshortener/v1/url?fields=id'
data 	= json.dumps({'longUrl': url})
r 		= requests.post(gUrl, data, headers={'Content-Type': 'application/json'})
url 	= json.loads( r.text).get('id').replace('http://','')

# trim and combine tweet
cut = 128 - len(user) - len(url)
tweet = user + " " + tweet[0:cut] + "... " + url

# print tweet
api = tweepy.API(auth)
api.update_status(tweet)