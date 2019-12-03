import requests
from bs4 import BeautifulSoup
from urllib.request import urlopen
import pymysql

num = 1

url = 'https://watchin.today/ko/charts/channel/country/south-korea/most-viewed' #워칭투데이

response = requests.get(url)
source = response.text
soup = BeautifulSoup(source, 'html.parser')

conn = pymysql.connect(host='localhost', user='root', password='1234', db='YouView', charset='utf8')
cur = conn.cursor()
cur.execute("USE YouView")
 
img_names = soup.find_all('img')
try:
    for img in img_names:
        a=  img.get('data-src')
        b=str(a)
        cur.execute("INSERT INTO image_view VALUES (%s)",b)
        conn.commit() 
        print(b)
    
finally:
    cur.close()
    conn.close()
 
 
print('끝');
