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
 
img_names = soup.find_all('img')
try:
    num=-3
    for img in img_names:
        num=num+1
        a=  img.get('data-src')
        b=str(a)
       
        cur.execute("INSERT INTO image_video VALUES (%s,%s)", (num ,b))   
        conn.commit()
        
        print(num)
        print(b)
    
finally:
    cur.close()
    conn.close()
 
 
print('끝');
       
