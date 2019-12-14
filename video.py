import requests
from bs4 import BeautifulSoup
from urllib.request import urlopen
import pymysql

url = 'https://watchin.today/ko/trending/south-korea/201949' #워칭투데이

response = requests.get(url)
source = response.text
soup = BeautifulSoup(source, 'html.parser')

conn = pymysql.connect(host='localhost', user='root', password='1234', db='YouView', charset='utf8')
cur = conn.cursor()
cur.execute("USE YouView")

#subscribers = soup.select("body > main > div > div.content-grid.main > div > div > div > a > div.chart-item-data > div.meta > span.c-subscribe")
titles=soup.select("body > main > div > div > div.grid-item.base > div > div > div.trendings-item > a > div.trendings-video-data > div.v-title ") #영상제목 
categorys=soup.select("body > main > div > div > div.grid-item.base > div > div > div.trendings-item > a > div.trendings-video-data > div.v-category ") #카테고리 
views=soup.select("body > main > div > div > div.grid-item.base > div > div > div.trendings-item > a > div.trendings-video-data > div.meta>span.v-view") #조회수 
channels=soup.select("body > main > div > div > div.grid-item.base > div > div > div.trendings-item > a.trendings-channel ") #영상제목  

 
try:
   
   for i in range(0,60):
      
    print(i, titles[i].text , channels[i].text , categorys[i].text , views[i].text)     
    cur.execute("INSERT video VALUES (%s, %s,%s,%s,%s)", (i+100, titles[i].text, channels[i].text, categorys[i].text, views[i].text))
    conn.commit() 
  
finally:
  print("끝")
  cur.close()
  conn.close()
