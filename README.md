1876425 최지원 
오픈소스플랫폼 19-2 기말프로젝트 저장소입니다.
유튜브 동영상 랭킹조회/리뷰 앱을 만듭니다. 

----------------------------------------
12.03 커밋내용
channel.html 과 그에 쓰인 이미지들 삭제
새 channel.php 업로드,그에 따른 channel.css 수정 

image.py과 channel.py업로드
채널순, 조회순은 url만 바꿔주면 되고 만약 프라이머리 키 중복 에러가 뜨면 i+100으로 insert해주고 mysql에서 -100하면 됩니다

위 과정 전에 테이블 구축이 돼어있어야 하는데 아직 저희 db연동 전이라...

채널 테이블은 
CREATE TABLE channels_sub(
  channelSeq int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  channelName varchar(30) NOT NULL,
  subscriber varchar(30) NOT NULL,
  view varchar(30) NOT NULL,
  category varchar(30) NOT NULL      
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
그리고 한글로 저장해야 하므로 
ALTER DATABASE YouView CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
ALTER TABLE channels CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE channels CHANGE channelName channelName VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE channels CHANGE subscriber subscirber VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE channels CHANGE view view VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE channels CHANGE category category VARCHAR(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

이미지 테이블은 
CREATE TABLE image_view(
  img varchar(500) NOT NULL 
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
입니다 

12월 17일 커밋내용
필요없어진 파일들,내가 맡지 않은 부분들 제거
완전히 달라진 채널부분 새로 올리고, 동영상부분 추가 
channels.php와 channels.php ,video.php와 video2.php 작업함 
channels_specific.php파일은, channels.php에서 db의 어떤 테이블, 몇번째에 등록된 채널인지 정보를 넘기고 이를 기반으로 channels_specific에 필요 변수를 생성하는 것까지 하고 미완인 채로 파일 넘김.

