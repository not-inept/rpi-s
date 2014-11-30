'''
Mark Blanco
RPI-SURVIVAL
15 October 2014
Web Systems Development
Description:
This python script is meant to list the locations found in 
morning mail events and output how many times they appear.

'''


# NOTE: This code is written for Python 2.7 and 3.4
# NOTE: The print statements should be changed to outputs to a log file or something...
import operator

try:                                # Compatibility check for python 3.4 vs 2.7
    from urllib.parse import *
    from urllib.request import *
    from urllib.error import *
except ImportError:                 # Version 2.7 or earlier
    from urllib2 import *
    
import xml.etree.ElementTree as ET

events = open('locations.txt', 'w')    # Output file
data_output = []
data = urlopen('http://morningmail.rpi.edu/rss').read()# Retrieve data in XML form
root = ET.fromstring(data)          # Creates data tree with variable pointing to root from XML string
places = {}
i = 7
upper_bound = 107
while i < upper_bound:            # The first item is at index 7, all tags before are just 'fluff'
    while(1):
        try:
            details = root[0][i][2].text.split('<br/>') # parse description and get date & loc                  # Date
            location = details[1].strip()               # location
            description = details[2].strip()            # description
            if location not in places:
                places[location] = 1
            else:
                places[location] += 1
            break
        except:
            i+=1
            upper_bound+=1
            if upper_bound > 10000:
                break
    i+=1
    if upper_bound > 10000:
        break
sorted_places = sorted(places.items(), key = operator.itemgetter(1))
for item in sorted_places:
    events.write(item[0]+': '+str(item[1])+'\n')
events.close()