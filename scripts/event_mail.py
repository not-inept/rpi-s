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
import os
import sys

try:                                # Compatibility check for python 3.4 vs 2.7
    from urllib.parse import *
    from urllib.request import *
    from urllib.error import *
except ImportError:                 # Version 2.7 or earlier
    from urllib2 import *
    
import xml.etree.ElementTree as ET

try:
    import sql                      # importing python-sql library now
except ImportError:
    try:
        print("The python-sql-0.4 library was not installed! Installing now.")
        os.system("../resources/python-sql-0.4/setup.py install")
    except:
        print("Something went terribly wrong in installing the sql library. I think human intervention is needed...")
        print("Program exited: unsuccessful library import.")
        sys.exit()

print("All libraries were successfully imported! Retrieving morning mail...")


data = urlopen('http://morningmail.rpi.edu/rss').read()# Retrieve data in XML form
root = ET.fromstring(data)          # Creates data tree with variable pointing to root from XML string
i = 7
upper_bound = 17
while i < upper_bound:            # The first item is at index 7, all tags before are just 'fluff'
    while(1):
        try:
            print(i, upper_bound)
            info = str(11-upper_bound+i)+". "+root[0][i][0].text+'\n'# For now, printing title of event
            details = root[0][i][2].text.split('<br/>') # parse description and get date & loc
            info += "     "+details[0].strip()+'\n'     # Date
            info += "     "+details[1].strip()+'\n'     # Time
            break
        except:
            i+=1
            upper_bound+=1
    print(info)
    i+=1