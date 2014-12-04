try:                                # Compatibility check for python 3.4 vs 2.7
    from urllib.parse import *
    from urllib.request import *
    from urllib.error import *
except ImportError:                 # Version 2.7 or earlier
    from urllib2 import *

data = urlopen('http://localhost/rpi-s/resources/py/updatePlayers.php').read()# Retrieve data in XML form
'''conn = HTTPConnection('localhost/rpi-s/resources/py/updatePlayers.php', 80)
conn.request("POST", '')
response = conn.getresponse()
print(response.status)
print(response.read())
conn.close()'''