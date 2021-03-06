'''
Mark Blanco
RPI-SURVIVAL
15 October 2014
Web Systems Development
Description:
This python script is meant to retrieve, filter, and store morning mail-based events for the online RPI survival game.

'''


# NOTE: This code is written for Python 2.7 and 3.4
# NOTE: The print statements should be changed to outputs to a log file or something...
import json
from httplib import *

try:                                # Compatibility check for python 3.4 vs 2.7
    from urllib.parse import *
    from urllib.request import *
    from urllib.error import *
except ImportError:                 # Version 2.7 or earlier
    from urllib2 import *
    
import xml.etree.ElementTree as ET

def look_for_place(data):
    areas = {'armory': '3,2,2', 'empac':'3,2,1', 'russel sage dining hall': '3,1,2', 'commons dining hall': '4,1,1','jec': '3,1,2', 'campus': '1,1,2', 'cii': '3,1,2', 'dcc': '3,1,2', 'evac': '2,2,2', 'sage lab': '3,1,2', 'cbis': '3,2,2', 'chapel and cultural center': '2,2,1', 'union': '3,1,2'}
    months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december']
    compare = ['armory','empac','russel sage dining hall','commons dining hall','jec','campus','cii','dcc','ecav','sage lab','cbis','chapel and cultural center','union']

    i = -1
    for item in months:
        if item in data[1][0].strip().lower():
            i = 0
            break
        if item in data[1][1].strip().lower():
            i = 1
            break
    if i == -1:
        raise Exception("Month not found...")

    for place in compare:
        if place in data[2].lower():
            return {'description':description,'title': title,'date': ' '.join(data[1][i:i+3]), 'location': place, 'areaID':areas[place]}

    raise Exception("Item not found...")

events = open('events.json', 'w')    # Output file
data_output = []
data = urlopen('http://morningmail.rpi.edu/rss').read()# Retrieve data in XML form
root = ET.fromstring(data)          # Creates data tree with variable pointing to root from XML string
i = 7
upper_bound = 37                  # This is enough to read all available events
while i < upper_bound:            # The first item is at index 7, all tags before are just 'fluff'
    while(1):
        try:
            details = root[0][i][2].text.split('<br/>') # parse description and get date & loc
            title = root[0][i][0].text                  # title of event
            date = details[0].strip().replace(',','').split()   # process Date
            location = details[1].strip()               # location
            description = details[2].strip()            # description
            data_output.append(look_for_place( (title, date, location, description) ))
            break
        except Exception as e:
            print e
            print 'incrementing!'
            i+=1
            upper_bound+=1
            if upper_bound > 1000:
                break
    i+=1
    if upper_bound > 1000:
        break

json.dump(data_output,events,sort_keys = False,indent=4)
events.close()

# now call the updateDB php script to add the new data:
data = urlopen('http://localhost/rpi-s/resources/py/updateDB.php').read()# Retrieve data in XML form
'''conn = HTTPConnection('localhost/rpi-s/resources/py/updateDB.php', 80)
conn.request("POST", '')
response = conn.getresponse()
print(response.status)
print(response.read())
conn.close()'''
print data