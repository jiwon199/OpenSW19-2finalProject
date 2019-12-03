import requests
from bs4 import BeautifulSoup
from urllib.request import urlopen
import pymysql


url = 'https://kr.socialerus.com/ranking/index.html?sort=&rank=&term=&cate=12' #소셜러스_엔터테인먼트

response = requests.get(url)
source = response.text
soup = BeautifulSoup(source, 'html.parser')

conn = pymysql.connect(host='localhost', user='root', password='jd2263xn', db='YouView', charset='utf8')
cur = conn.cursor()
cur.execute("USE YouView")

names = soup.select("#content > div.inner > div.ranking_cont > ul.list_ranking > li > a > div.ranking_info > div.ranking_txt > span.title") #채널명
subscribers = soup.select("#content > div.inner > div.ranking_cont > ul.list_ranking > li > a > div.ranking_data > ul > li:nth-child(1) > span.num") #구독자 수
views = soup.select("#content > div.inner > div.ranking_cont > ul.list_ranking > li> a > div.ranking_data > ul > li:nth-child(2) > span.num") #조회수

#categories = soup.select("body > main > div > div.content-grid.main > div > div > div > a > div.chart-item-data > div.meta > span.c-category")
#카테고리

i = 1;

for name in names:
    print(i, name.text)
    i = i+1
    if i==11:
        break

#for category in categories:
#    print(category.text)

for view in views:
    print(view.text)
    i = i+1;
    if i==11 : 
        break

for subs in subscribers:
    print(subs.text)
    i=i+1
    if i==11:
        break

try:
    for i in range(1,11):
        print(names[i-1].text, subscribers[i-1].text, views[i-1].text, "푸드/쿠킹")
        cur.execute("INSERT INTO channels VALUES (%s,%s,%s,%s,%s)", (i+20, names[i-1].text , subscribers[i-1].text , views[i-1].text , "푸드/쿠킹"))
        conn.commit() 

finally:
    cur.close()
    conn.close()
