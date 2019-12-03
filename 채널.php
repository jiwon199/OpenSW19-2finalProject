<html>
<head>
<meta charset="utf-8">
<link rel = "stylesheet" href = "channel.css">
<title> YouView </title>
</head>
<body>
<form action="채널.php" method="post">

<div id="main_header">
<p align="right" ><a href="login.hmtl" style="color:#F6F6F6; text-decoration:none">로그인</a>&nbsp;<a href="join.html" style="color:#F6F6F6;text-decoration:none">회원가입</a></p>
<header>
   <h1> YouView </h1>
</header>
</div>
 
<div class="userEL4506626">
 <div class="container full-width">
  <div class="row">
 

   <div class="col-xs-12 col-sm-12 col-md-12">
    <h3 class="head_title" data-edit="true" data-selector="h3.head_title" ><span class="fsize22" ><strong><a class="menu" href="홈.html">홈</a><a class="menu" href="channel.php">채널</a><a class="menu" href="동영상.html">동영상</a><a class="menu" href="리뷰.html">리뷰</a></strong></span></h3>
    

    <br>	 
<br>
   <hr data-border="true" data-selector="hr" data-title="선 색상">
   
 </div>
 
 
  
 </div>

  </div>
 </div>
</div>

  
<table class="noBordertable">
 <tr>
 <td>정렬 <select name="sort">
<option value="a">조회순</option>
<option value="b">구독순</option>
<td>필터링 <input type="text" name="filter" size="20" maxlength="20" /></td>
</select></td>
<td>카테고리 <select name="find2">
<option value="a">전체</option>
 </select></td>
<td><input type="submit" value="정렬하기" class="Submit"></td>
</tr>
 
</table>
 
    <table class="mainT">                  
          <thead>
          <th>사진</th> 
          <th>채널명</th>
           <th>정보</th> 
         </thead>    
      <tbody>
         <?php  
         
           $sort = (isset($_POST['sort']) && $_POST['sort']) ? $_POST['sort'] : NULL;
           $filter = (isset($_POST['filter']) && $_POST['filter']) ? $_POST['filter'] : NULL;
           $conn = mysqli_connect("localhost", "root", 1234);
           $status=mysqli_select_db($conn, "YouView"); 
           
           
           if($sort=='a') { $jb_result = mysqli_query($conn, "SELECT * FROM channels_view");  $jb_result2 = mysqli_query($conn, "SELECT * FROM image_view");  }
           else { $jb_result = mysqli_query($conn, "SELECT * FROM channels_sub");   $jb_result2 = mysqli_query($conn, "SELECT * FROM image_sub"); }
           
 
          while( $jb_row = mysqli_fetch_array( $jb_result ) and $jb_row2 = mysqli_fetch_array( $jb_result2 )) {
            if( $jb_row[ 'channelName' ]!=$filter) {          
             
           $m=$jb_row2[ 'img' ];
            
          // echo $m; 
            
            echo "<tr><td><img src= $m></td>";
            echo '<td>' . $jb_row[ 'channelName' ] . '</td><td>'. $jb_row[ 'subscriber' ] . '<br /> ' . $jb_row[ 'view' ] . '<br />' . $jb_row[ 'category' ] . '</td></tr>';
           
            }
          }         
        ?>
      </tbody>
    </table>

</body>
</html>
