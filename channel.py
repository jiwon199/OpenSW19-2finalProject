import requests
from bs4 import BeautifulSoup
from urllib.request import urlopen
import pymysql

num = 1

url = 'https://watchin.today/ko/charts/channel/country/south-korea' #워칭투데이

response = requests.get(url)
source = response.text
soup = BeautifulSoup(source, 'html.parser')

conn = pymysql.connect(host='localhost', user='root', password='1234', db='YouView', charset='utf8')
cur = conn.cursor()
cur.execute("USE YouView")
 
#subscribers = soup.select("body > main > div > div.content-grid.main > div:nth-child(1) > div > div > a > div.chart-item-data > div.meta > span.c-subscribe")
names = soup.select("body > main > div > div.content-grid.main > div > div > div > a > div.chart-item-data > div.c-title") #채널명
subscribers = soup.select("body > main > div > div.content-grid.main > div > div > div > a > div.chart-item-data > div.meta > span.c-subscribe") #구독자 수
views = soup.select("body > main > div > div.content-grid.main > div > div > div > a > div.chart-item-data > div.meta > span.c-view") #조회수
categories = soup.select("body > main > div > div.content-grid.main > div > div > div > a > div.chart-item-data > div.meta > span.c-category") #카테고리


try: 
  for i in range(0,53):     
      print(names[i].text,subscribers[i].text ,views[i].text,categories[i].text)     
      cur.execute("INSERT INTO channels_sub VALUES (%s,%s,%s,%s,%s)", (i+100,names[i].text , subscribers[i].text , views[i].text , categories[i].text))
      conn.commit() 
       
finally:
  cur.close()
  conn.close()
