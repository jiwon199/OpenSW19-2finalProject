# OpenSW19-2finalProject
오픈소스플랫폼 13팀 기말 프로젝트 저장소

1871007 김소원

12/15에 지금까지 올렸던 파일 중 사용하지 않는 파일을 삭제하였습니다.


review.php는 로그인이 안 된 상태로 home에서 menu나 more 버튼을 통해 리뷰 페이지로 이동하면 이 창으로 이동합니다.
현재까지 작성된 모든 리뷰를 최신 리뷰부터 보여줍니다.

review2.php는 로그인이 된 상태로 리뷰 페이지로 이동할 경우 이 페이지로 이동합니다.

review_register.php는 리뷰를 작성한 다음 리뷰를 등록하고, 지금까지 작성된 리뷰를 모두 보여줍니다.

review_search_result.php는 리뷰 페이지에서 원하는 검색어를 입력한 후 검색하면 이 페이지를 통해서 검색어에 대한 결과를 보여줍니다.

review_search_result2.php는 로그인이 된 상태로 리뷰 페이지에서 원하는 검색어를 입력한 후 검색하면 
이 페이지를 통해서 검색어에 대한 결과를 보여줍니다.

write_review.html는 리뷰를 작성하는 창입니다. 사용자가 작성해야하는 부분은 1.채널 이름 2.리뷰 제목 3.리뷰 내용 4.태그 5.별점이고 
1,2,3을 작성하지 않을 경우 칸을 모두 채우라는 경고창이 화면에 뜹니다.

review db 구축
CREATE TABLE reviews( channelName char(50) NOT NULL , NickName CHAR(20) NOT NULL ,  Title text NOT NULL , Content text NOT NULL , date datetime NOT NULL , star_one tinyint(4) NOT NULL , star_two tinyint(4) NOT NULL , star_three tinyint(4) NOT NULL , star_four tinyint(4) NOT NULL , star_avg tinyint(4) NOT NULL , tag_one char(10) , tag_two char(10) , tag_three char(10) );
