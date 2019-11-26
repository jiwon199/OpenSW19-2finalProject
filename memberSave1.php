<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>YouView</title>
    <link rel="stylesheet" href="join.css" />
</head>
<body>
<?php
 @$mysqli = new mysqli('localhost', 'meme', 'mememe', 'dbqb');
 
 if(mysqli_connect_errno()){
     echo "<p>Error: Could not connect to database.<br/>
     Please try again later.</p>";
     exit;
 }
 $ID=$_POST['memberId'];
 $PWD=md5($_POST['memberPw']);
 $NickName=$_POST['memberNickName'];
 $password2=$_POST['memberPw2'];

 $query="INSERT INTO youviewers VALUES (? ,? ,?)";
 $stmt=$mysqli->prepare($query);
 $stmt->bind_param('sss',$ID,$PWD,$NickName);
 $stmt->execute();

 if($stmt->affected_rows>0){

 }
 else{
     exit;
 }

 $mysql->close();
?>
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
<h1 align="center">회원가입이 완료되었습니다~~!</h1>
</body>
</html>
