<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>YouView</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
<script type="text/javascript" src="join.js"></script>
<link rel="stylesheet" href="join.css" />
</head>
<body>
<div id="main_header">
<p align="right"><a href="login.php" style="color:#F6F6F6; text-decoration:none">로그인</a>&nbsp;<a href="join.php" style="color:#F6F6F6; text-decoration:none">회원가입</a></p>
<header>
   <h1> YouView </h1>
</header>
</div>

<div class="userEL4506626">
 <div class="container full-width">
  <div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
      <h3 class="head_title" data-edit="true" data-selector="h3.head_title" ><span class="fsize22" ><strong><a class="menu" href="홈.html">홈</a><a class="menu" href="채널.html">채널</a><a class="menu" href="동영상.html">동영상</a><a class="menu" href="리뷰.html">리뷰</a></strong></span></h3>
 <br><br>
   <hr data-border="true" data-selector="hr" data-title="선 색상">
   </div> 
  </div>
 </div>
</div>
<div id="wrap">
    <div id="container">
        <h1 class="title">회원가입</h1>
        <form name="signUp" action="memberSave.php" method="post" onsubmit="return checkSubmit()">
            <div class="line">
                <p>아이디</p>
                <div class="inputArea">
                    <input type="text" name="memberId" class="memberId" />
                </div>
            </div>
            <div class="line">
                <p>비밀번호</p>
                <div class="inputArea">
                    <input type="password" name="memberPw" class="memberPw" />
                </div>
            </div>
            <div class="line">
                <p>비밀번호 확인</p>
                <div class="inputArea">
                    <input type="password" name="memberPw2" class="memberPw2"  />
                    <div class="memberPw2Comment comment"></div>
                </div>
            </div>
            <div class="line">
                <p>닉네임</p>
                <div class="inputArea">
                    <input type="text" name="memberNickName" class="memberNickName"  />
                </div>
            </div>
            <div class="line">
                <input type="submit" value="가입하기" class="submit" />
            </div>
        </form>
 
        <div class="formCheck">
            <input type="hidden" name="pw2Check" class="pwCheck2" />
        </div>
    </div>
</div>
</body>
</html>
